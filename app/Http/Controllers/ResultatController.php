<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResultatRequest;
use App\Models\Candidat;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Mention;
use Illuminate\Support\Facades\Storage;
use App\Exports\CandidatExport;
use App\Models\Vague;
use ZipArchive;

class ResultatController extends Controller
{
    //
    public function index(Request $request)
    {
        $key = $request->query('key', '');

        // Default filter values
        $defaultFilters = [
            'all' => false,
            'admis' => false,
            'recale' => false,
            'pending' => false,
        ];

        if (!$request->hasAny(['all', 'admis', 'recale', 'pending'])) {
            $filter =  $request->session()->get('candidat_filters', [
                'all' => true,
                'admis' => true,
                'recale' => true,
                'pending' => true,
            ]);
        } else {
            $filter = array_merge($defaultFilters, $request->only(['all', 'admis', 'recale', 'pending']));
        }



        // Convert string values to boolean
        foreach ($filter as &$value) {
            $value = filter_var($value, FILTER_VALIDATE_BOOLEAN);
        }

        // Build the query
        $query = Candidat::query()->whereNotNull('num_conc')->with(['mention' => function ($query) {
            $query->withTrashed();
        }]);

        // Apply search filter
        if ($key) {
            $query->where(function ($q) use ($key) {
                $q->where('nom', 'like', "%$key%")
                    ->orWhere('num_conc', 'like', "%$key%");
            });
        }


        // Apply status filters
        if (!$filter['all']) {
            $query->where(function ($q) use ($filter) {
                if ($filter['admis']) {
                    $q->orWhere('status', 'admis');
                }
                if ($filter['recale']) {
                    $q->orWhere('status', 'recalé');
                }
                if ($filter['pending']) {
                    $q->orWhereNull('status');
                }
            });
        }

        // Get the total number of results after applying filters
        $totalResults = $query->count();

        // Paginate the results
        $candidats = $query->paginate(10);

        // Store filter values in session
        $request->session()->put('candidat_filters', $filter);

        return view(
            'dashboard.resultat.list_resultat',
            compact('key', 'filter', 'candidats', 'totalResults')
        );
    }

    public function update(Request $request, String $id)
    {
        $candidat = Candidat::findOrFail($id);
        $candidat->status = $request->input('status');
        $candidat->save();

        return response()->json(['message' => 'Candidat updated successfully']);
    }

    public function import(ResultatRequest $request)
    {
        $file = $request->file('results');
        try {
            // Load the Excel file
            $spreadsheet = IOFactory::load($file->getPathname());
        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            return redirect()->back()->with('error.import', 'Erreur lors de la lecture du fichier: ' . $e->getMessage());
        }

        $processedCount = 0;

        // Loop through each sheet
        foreach ($spreadsheet->getAllSheets() as $sheet) {
            // Get the header row
            $headerRow = $sheet->getRowIterator()->current();
            $headerCellIterator = $headerRow->getCellIterator();
            $headerCellIterator->setIterateOnlyExistingCells(true);
            $header = [];
            foreach ($headerCellIterator as $cell) {
                $header[] = $cell->getValue();
            }

            // Convert header values to lowercase for case-insensitive comparison
            // $lowercaseHeader = array_map('strtolower', $header);

            // Check if the header contains the required columns
            $requiredColumns = ['Numéro Concours', 'Nom et prénoms', 'Observation'];
            if (count(array_intersect($requiredColumns, $header)) === count($requiredColumns)) {
                // Get the column indices
                $numeroIndex = array_search('Numéro Concours', $header);
                $resultatIndex = array_search('Observation', $header);

                // Loop through each row in the sheet, starting from the second row
                foreach ($sheet->getRowIterator(2) as $row) {
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(true);
                    $rowData = [];
                    foreach ($cellIterator as $cell) {
                        $rowData[] = $cell->getValue();
                    }

                    // Get the values from the required columns
                    $numero = trim($rowData[$numeroIndex] ?? '');
                    $resultat = strtolower(trim($rowData[$resultatIndex] ?? ''));

                    if (!empty($numero) && !empty($resultat)) {
                        // Find the candidate by num_conc and update the status
                        $candidate = Candidat::where('num_conc', $numero)->first();
                        if ($candidate) {
                            if ($resultat === 'admis') {
                                $candidate->status = 'admis';
                            } elseif (in_array($resultat, ['recalé', 'non admis'])) {
                                $candidate->status = 'recalé';
                            }
                            $candidate->save();
                            $processedCount++;
                        }
                    }
                }
            }
        }

        return redirect()->back()->with('success', "Fichier traité avec succès. $processedCount candidat(s) mis à jour.");
    }

    public function publish(String $id)
    {
        $candidats = Candidat::where('vagues_id', $id)->whereNull('status')->get();
        $count = $candidats->count();
        $displayString = '';
        if ($count) {
            for ($i = 0; $i < min(3, $count); $i++) {
                $candidat = $candidats[$i];
                $displayString .= $candidat->num . ' ' . $candidat->nom;
                if (
                    $i < 2 && $i < $count - 1
                ) {
                    $displayString .= ', ';
                } elseif ($i == 2 && $count > 3) {
                    $displayString .= ' et ' . ($count - 3) . ' autre';
                }
            }
            $displayString .= $count == 1 ? " n'a pas encore de résultat definie" : " n'ont pas encore de résultat definie";
            return redirect()->back()->with('error.publish', $displayString);
        }
        $vague = Vague::findOrFail($id);
        $vague->is_published = true;
        $vague->save();

        return redirect()->back()->with('success', 'Résultat publié avec succès!');
    }

    public function unpublish(String $id)
    {
        $vague = Vague::findOrFail($id);
        $vague->is_published = false;
        $vague->save();

        return redirect()->back()->with('success', 'Résultat retiré avec succès!');
    }

    public function indexConcours(Request $request, String $id)
    {
        $key = $request->query('key', '');
        // Default filter values
        $defaultFilters = [
            'all' => false,
            'admis' => false,
            'recale' => false,
            'pending' => false,
        ];

        if (!$request->hasAny(['all', 'admis', 'recale', 'pending'])) {
            $filter =  $request->session()->get('candidat_concours_filters', [
                'all' => true,
                'admis' => true,
                'recale' => true,
                'pending' => true,
            ]);
        } else {
            $filter = array_merge($defaultFilters, $request->only(['all', 'admis', 'recale', 'pending']));
        }



        // Convert string values to boolean
        foreach ($filter as &$value) {
            $value = filter_var($value, FILTER_VALIDATE_BOOLEAN);
        }

        // Build the query
        $query = Candidat::query()->whereNotNull('num_conc')->with(['mention' => function ($query) {
            $query->withTrashed();
        }])->where('vagues_id', $id);

        // Apply search filter
        if ($key) {
            $query->where(function ($q) use ($key) {
                $q->where('nom', 'like', "%$key%")
                    ->orWhere('num_conc', 'like', "%$key%");
            });
        }


        // Apply status filters
        if (!$filter['all']) {
            $query->where(function ($q) use ($filter) {
                if ($filter['admis']) {
                    $q->orWhere('status', 'admis');
                }
                if ($filter['recale']) {
                    $q->orWhere('status', 'recalé');
                }
                if ($filter['pending']) {
                    $q->orWhereNull('status');
                }
            });
        }

        // Get the total number of results after applying filters
        $totalResults = $query->count();

        // Paginate the results
        $candidats = $query->paginate(20);

        // Store filter values in session
        $request->session()->put('candidat_concours_filters', $filter);

        $is_published = Vague::findOrFail($id)->is_published;

        return view(
            'dashboard.resultat.list_resultat_concours',
            compact('key', 'filter', 'candidats', 'totalResults', 'id', 'is_published')
        );
    }

    public function export(String $id)
    {
        $mentions = Mention::all();
        $zipFile = 'candidats.zip';
        $zip = new ZipArchive;
        $zip->open(storage_path('app/' . $zipFile), ZipArchive::CREATE);

        foreach ($mentions as $mention) {
            $fileName = str_replace(" ", "_", $mention->design) . '.xlsx';
            Excel::store(new CandidatExport($mention->id, $id), $fileName, 'local');
            $zip->addFile(storage_path('app/' . $fileName), $fileName);
        }
        $zip->close();
        foreach ($mentions as $mention) {
            $fileName = str_replace(" ", "_", $mention->design) . '.xlsx';
            Storage::delete($fileName);
        }
        return response()->download(storage_path('app/' . $zipFile))->deleteFileAfterSend(true);
    }
}
