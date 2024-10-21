<?php

namespace App\Http\Controllers;

use App\Http\Requests\InscriptionLocalRequest;
use App\Models\Candidat;
use App\Models\Mention;
use App\Models\Serie;
use App\Models\Vague;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InscriptionlocalController extends Controller
{
    public function index()
    {
        $now = Carbon::now();

        // Get the most recent concours where the fin_insc date is in the future
        $vague = Vague::with('concours')
            ->where('fin_insc', '>=', $now)
            ->first();

        if ($vague && $vague->deb_insc) {
            $series = Serie::with('mentions')->get();

            // Préparation des données pour la vue
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

            return view('inscription-local.index', [
                'vague' => $vague,
                'deb_insc' => $vague->deb_insc,
                'fin_insc' => $vague->fin_insc,
                'deb_conc' => $vague->deb_conc,
                'fin_conc' => $vague->fin_conc,
                'type' => $vague->concours->type ?? null,
                'series' => $seriesData
            ]);
        } else {
            return view('inscription-local.sansconcours');
        }
    }

    public function store(InscriptionLocalRequest $request)
    {

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

        $numCandidat = Candidat::where(
            'mention_id',
            $candidat->mention_id
        )
            ->whereNotNull('num_conc')
            ->whereHas(
                'vague',
                function ($query) use ($candidat) {
                    $query->where('concours_id', $candidat->vague->concours_id);
                }

            )
            ->orderBy('num_conc', 'desc')->first();
        if ($numCandidat) {
            $parts = explode('/', $numCandidat->num_conc);
            $extractedPart = $parts[0];
            $number = intval($extractedPart) + 1;
        } else
            $number = 1;

        $numConcours = str_pad($number, 3, '0', STR_PAD_LEFT) . "/Conc{$codeMention}/IèA/{$currentYearShort}-{$nextYearShort}";
        $candidat->num_conc = $numConcours;
        $candidat->save();



        // Save the Candidat object to the database
        $candidat->save();

        if ($candidat) {
            // Attach the mention to the serie in the mention_serie pivot table
            $serie = Serie::find($request->serie_id);

            if ($serie) {
                $serie->mentions()->syncWithoutDetaching([$mention->id]);
            } else {
                throw new \Exception("Serie not found.");
            }

            // Commit the transaction
            DB::commit();

            return redirect()->route('inscription.numeroconcours', ['candidat' => $candidat->id])
                ->with('success', 'Inscription en concours bien réussi. Voici votre numéro de concours');
        } else {
            return back()->with('error', 'Veuillez vérifiez qu\'il manque rien dans le champ ou votre donnée entrer n\'est pas compatible dans le champ.');
        }
    }

    public function show($candidat)
    {
        $candidats = Candidat::findOrFail($candidat);
        return view('inscription-local.numeroconcours', compact('candidats'));
    }
}
