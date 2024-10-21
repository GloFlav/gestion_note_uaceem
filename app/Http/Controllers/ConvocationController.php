<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;

class ConvocationController extends Controller
{
    //

    public function index(Request $request)
    {
        $key = $request->query('key', '');
        $defaultFilters = [
            'all' => false,
            'paye' => false,
            'non_paye' => false,
        ];

        if (!$request->hasAny(['all', 'paye', 'non_paye'])) {
            $filter =  $request->session()->get('candidat_conv_filters', [
                'all' => true,
                'paye' => true,
                'non_paye' => true,
            ]);
        } else {
            $filter = array_merge($defaultFilters, $request->only(['all', 'paye', 'non_paye']));
        }

        foreach ($filter as &$value) {
            $value = filter_var($value, FILTER_VALIDATE_BOOLEAN);
        }

        $query = Candidat::query()->with(['mention' => function ($query) {
            $query->withTrashed();
        }, 'payement']);

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
                if ($filter['paye']) {
                    $q->whereHas('payement', function ($query) {
                        $query->whereNotNull('reference');
                    });
                }
                if ($filter['non_paye']) {
                    $q->whereDoesntHave('payement')
                        ->orWhereHas('payement', function ($query) {
                            $query->whereNull('reference');
                        });
                }
            });
        }
        $query->orderBy('id', 'desc');

        $totalResults = $query->count();

        // Paginate the results
        $candidats = $query->paginate(10);

        $request->session()->put('candidat_filters_conv', $filter);

        return view('dashboard.convocation.list_convocation', compact('key', 'candidats', 'totalResults'));
    }

    public function print(Request $request)
    {
        $selectedNumeros = explode(',', $request->input('selected_numeros'));

        $candidats = Candidat::whereIn('num_conc', $selectedNumeros)
            ->with(['mention', 'payement', 'vague', 'vague.concours'])
            ->whereHas('payement', function ($query) {
                $query->whereNotNull('reference');
            })
            ->get();
        $pdf = PDF::loadView('convocation', compact('candidats'));
        $name = 'convocation_';
        $name .= ($candidats->count() == 1 ? (str_replace(' ', '_', $candidats[0]->nom) . "_") : "");
        $name .= time() . '.pdf';

        return $pdf->download($name);
    }
}
