<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidatRequest;
use App\Http\Requests\CandidatSIRequest;
use App\Models\Candidat;
use App\Models\Mention;
use App\Models\Concours;
use App\Models\Serie;
use App\Models\Vague;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CandidatController extends Controller
{
    public function create()
    {
        $series = Serie::all();
        $now = Carbon::now();

        // Get the most recent concours where the fin_insc date is in the future
        $vagues = Vague::with('concours')
            ->where('fin_insc', '>=', $now)
            ->first();

        if ($vagues && $vagues->deb_insc && !empty($vagues->designation)) {
            $series = Serie::with('mentions')->get();

            // Prepare data for the view
            $seriesData = [];
            foreach ($series as $serie) {
                $seriesData[] = [
                    'id' => $serie->id,
                    'design' => $serie->design,
                    'mentions' => $serie->mentions->map(function ($mention) {
                        return ['id' => $mention->id, 'name' => $mention->design];
                    })
                ];
            }

            return view('candidats.create', [
                'deb_insc' => $vagues->concours->deb_insc,
                'fin_insc' => $vagues->concours->fin_insc,
                'vague_designation' => $vagues->designation,
                'series' => $seriesData,
                'vagues' => $vagues
            ]);
        } elseif ($vagues && $vagues->deb_insc && empty($vagues->designation)) {
            $series = Serie::with('mentions')->get();

            $seriesData = [];
            foreach ($series as $serie) {
                $seriesData[] = [
                    'id' => $serie->id,
                    'design' => $serie->design,
                    'mentions' => $serie->mentions->map(function ($mention) {
                        return ['id' => $mention->id, 'name' => $mention->design];
                    })
                ];
            }

            return view('candidats.sansvague', [
                'deb_insc' => $vagues->concours->deb_insc,
                'fin_insc' => $vagues->concours->fin_insc,
                'series' => $seriesData,
                'vagues' => $vagues
            ]);
        } else {
            return view('candidats.sansconcours');
        }
    }
    public function createSI()
    {
        $series = Serie::all();
        $mentions = Mention::all();
        $now = Carbon::now();

        // Get the most recent concours where the fin_insc date is in the future
        $vagues = Vague::with('concours')
            ->where('fin_insc', '>=', $now)
            ->orderBy('deb_insc', 'desc')
            ->first();
        $series = Serie::with('mentions')->get();

        $seriesData = [];
        foreach ($series as $serie) {
            $seriesData[] = [
                'id' => $serie->id,
                'design' => $serie->design,
                'mentions' => $serie->mentions->map(function ($mention) {
                    return ['id' => $mention->id, 'name' => $mention->design];
                })
            ];
        }


        return view('dashboard.candidatsSI.createSI', compact('series', 'mentions', 'vagues'));
    }
    public function enregistre(CandidatRequest $request)
    {
        try {

            // Start a database transaction
            DB::beginTransaction();

            // Create a new Candidat object and assign validated data
            $candidat = new Candidat();
            $candidat->vagues_id = $request->vagues_id;
            $candidat->nom = $request->nom;
            $candidat->num_bacc = $request->num_bacc;
            $candidat->anne_bacc = $request->anne_bacc;
            $candidat->serie_id = $request->serie_id;
            $candidat->tel = $request->tel;
            $candidat->email = $request->email;
            $candidat->ref_mvola = $request->ref_mvola;
            $candidat->mode_inscription = 'en_ligne';

            // Find the Mention based on mention_id
            $mention = Mention::find($request->mention_id);

            if (!$mention) {
                throw new \Exception("Mention not found.");
            }

            // Assign the mention_id to the Candidat
            $candidat->mention_id = $mention->id;

            // Generate a unique concours number
            $codeMention = $mention->code;
            $currentYear = date("Y");
            $nextYear = date("Y", strtotime('+1 year'));

            // Extract the last two digits of the current and next year
            $currentYearShort = substr($currentYear, -2);
            $nextYearShort = substr($nextYear, -2);

            $numCandidat = Candidat::where('mention_id', $request->mention_id)
                ->whereYear('created_at', $currentYear)
                ->count() + 1;

            $numConcours = str_pad($numCandidat, 3, '0', STR_PAD_LEFT) . "/Conc{$codeMention}/IèA/{$currentYearShort}-{$nextYearShort}";
            $candidat->num_conc = $numConcours;


            // Save the Candidat object to the database
            $candidat->save();

            // Attach the mention to the serie in the mention_serie pivot table
            $serie = Serie::find($request->serie_id);

            if ($serie) {
                $serie->mentions()->syncWithoutDetaching([$mention->id]);
            } else {
                throw new \Exception("Serie not found.");
            }

            // Commit the transaction
            DB::commit();

            return redirect()->route('candidats.show', ['candidat' => $candidat->id])
                ->with('success', 'Inscription en concours bien réussi. Voici votre numéro de concours');
        } catch (\Exception $e) {
            // Rollback the transaction if there was an error
            DB::rollBack();

            return response()->json(['error' => 'Failed to create Candidat', 'details' => $e->getMessage()], 500);
        }
    }

    public function storeSI(CandidatSIRequest $request)
    {
        try {

            // Start a database transaction
            DB::beginTransaction();

            // Create a new Candidat object and assign validated data
            $candidat = new Candidat();
            $candidat->vagues_id = $request->vagues_id;
            $candidat->nom = $request->nom;
            $candidat->num_bacc = $request->num_bacc;
            $candidat->anne_bacc = $request->anne_bacc;
            $candidat->serie_id = $request->serie_id;
            $candidat->tel = $request->tel;
            $candidat->email = $request->email;
            $candidat->ref_mvola = $request->ref_mvola;
            $candidat->mode_inscription = 'en_local';

            // Find the Mention based on mention_id
            $mention = Mention::find($request->mention_id);

            if (!$mention) {
                throw new \Exception("Mention not found.");
            }

            // Assign the mention_id to the Candidat
            $candidat->mention_id = $mention->id;

            // Generate a unique concours number
            $codeMention = $mention->code;
            $currentYear = date("Y");
            $nextYear = date("Y", strtotime('+1 year'));

            // Extract the last two digits of the current and next year
            $currentYearShort = substr($currentYear, -2);
            $nextYearShort = substr($nextYear, -2);

            $numCandidat = Candidat::where('mention_id', $request->mention_id)
                ->whereYear('created_at', $currentYear)
                ->count() + 1;

            $numConcours = str_pad($numCandidat, 3, '0', STR_PAD_LEFT) . "/Conc{$codeMention}/IèA/{$currentYearShort}-{$nextYearShort}";
            $candidat->num_conc = $numConcours;


            // Save the Candidat object to the database
            $candidat->save();

            // Attach the mention to the serie in the mention_serie pivot table
            $serie = Serie::find($request->serie_id);

            if ($serie) {
                $serie->mentions()->syncWithoutDetaching([$mention->id]);
            } else {
                throw new \Exception("Serie not found.");
            }

            // Commit the transaction
            DB::commit();

            return redirect()->route('dashboard.candidatsSI.index', ['candidat' => $candidat->id])
                ->with('success', 'Inscription en concours bien réussi. Voici votre numéro de concours');
        } catch (\Exception $e) {
            // Rollback the transaction if there was an error
            DB::rollBack();

            return response()->json(['error' => 'Failed to create Candidat', 'details' => $e->getMessage()], 500);
        }
    }

    public function show($candidat)
    {
        $candidat = Candidat::findOrFail($candidat);
        return view('candidats.show', compact('candidat'));
    }
    public function showSI($id)
    {
        $candidat = Candidat::with('mention', 'serie')->findOrFail($id);
        return view('dashboard.candidatsSI.showSI', compact('candidat'));
    }
    public function edit($id)
    {
        $candidat = Candidat::findOrFail($id);
        $series = Serie::with('mentions')->get();
        $concours = Concours::all();
        $vagues = Vague::all();
        $mentions = Mention::all();
        $vagues_id = $candidat->vagues_id;
        return view('dashboard.candidatsSI.edit', compact('candidat', 'series', 'mentions', 'concours', 'vagues', 'vagues_id'));
    }

    // Met à jour les informations d'un candidat spécifique
    public function update(CandidatRequest $request, $id)
    {
        try {
            $candidat = Candidat::findOrFail($id);
            $candidat->vagues_id = $request->vagues_id;
            $candidat->nom = $request->nom;
            $candidat->num_bacc = $request->num_bacc;
            $candidat->anne_bacc = $request->anne_bacc;
            $candidat->serie_id = $request->serie_id;
            $candidat->mention_id = $request->mention_id;
            $candidat->num_conc = $request->num_conc;
            $candidat->tel = $request->tel;
            $candidat->email = $request->email;
            $candidat->ref_mvola = $request->ref_mvola;
            $candidat->commentaire = $request->commentaire;
            $candidat->save();

            $candidat->update($request->only([
                'nom',
                'num_bacc',
                'anne_bacc',
                'serie_id',
                'mention_id',
                'num_conc',
                'tel',
                'email',
                'ref_mvola',
                'commentaire',
                'vagues_id'
            ]));

            return redirect()->route('dashboard.candidatsSI.index')
                ->with('success', 'Candidat mis à jour avec succès.');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Échec de la mise à jour du candidat', 'details' => $e->getMessage()], 500);
        }
    }

    // Supprime un candidat spécifique
    public function delete(Request $request)
    {
        $id = $request->input('id');
        try {
            // Trouver le candidat par son ID
            $candidat = Candidat::findOrFail($id);

            // Supprimer le candidat
            $candidat->delete();

            // Rediriger avec un message de succès
            return redirect()->route('dashboard.candidatsSI.index')
                ->with('success', 'Candidat supprimé avec succès.');
        } catch (\Exception $e) {
            // Retourner une réponse JSON en cas d'échec
            return redirect()->route('dashboard.candidatsSI.index')
                ->with('error', 'Échec de la suppression du candidat : ' . $e->getMessage());
        }
    }

    // Liste tous les candidats
    public function index(Request $request)
    {
        $key = $request->get('key') ?? "";
        $count = Candidat::where('anne_bacc', 'like', '%' . $key . '%')
            ->orWhere('nom', 'like', '%' . $key . '%')
            ->orWhere('num_bacc', 'like', '%' . $key . '%')
            ->orWhere('num_conc', 'like', '%' . $key . '%')
            ->orWhere('tel', 'like', '%' . $key . '%')
            ->orWhere('email', 'like', '%' . $key . '%')
            ->orWhere('mode_inscription', 'like', '%' . $key . '%')
            ->orWhere('ref_mvola', 'like', '%' . $key . '%')
            ->whereNotNull('num_conc')->count();
        $candidats = Candidat::where('nom', 'like', '%' . $key . '%')
            ->orWhere('anne_bacc', 'like', '%' . $key . '%')->orWhere('tel', 'like', '%' . $key . '%')
            ->orWhere('email', 'like', '%' . $key . '%')
            ->orWhere('ref_mvola', 'like', '%' . $key . '%')
            ->orWhere('num_bacc', 'like', '%' . $key . '%')
            ->orWhere('num_conc', 'like', '%' . $key . '%')
            ->orWhere('mode_inscription', 'like', '%' . $key . '%')
            ->whereNotNull('num_conc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        // $candidats = Candidat::with('mention', 'serie')->get();
        return view('dashboard.candidatsSI.index', compact('candidats', 'key', 'count'));
    }
}
