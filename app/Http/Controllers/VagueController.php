<?php

namespace App\Http\Controllers;

use App\Http\Requests\VagueRequest;
use App\Models\Concours;
use App\Models\Vague;
use Illuminate\Http\Request;

class VagueController extends Controller
{
    public function index()
    {
        $vagues = Vague::with('concours')->get();
        return view('dashboard.vague.index', compact('vagues'));
    }

    public function create()
    {
        return view('dashboard.vague.create');
    }

    public function show($id)
    {
        $vagues = Vague::findOrFail($id);
        return view('dashboard.vague.show', compact('vagues'));
    }

    public function store(VagueRequest $request)
    {
        // Vérifier si le type de concours existe déjà ou le créer
        $concours = Concours::firstOrCreate(['type' => $request->type]);

        if (is_array($request->designation)) {
            foreach ($request->designation as $index => $designation) {
                Vague::create([
                    'concours_id' => $concours->id,
                    'designation' => $designation,
                    'deb_insc' => $request->deb_insc[$index],
                    'fin_insc' => $request->fin_insc[$index],
                    'deb_conc' => $request->deb_conc[$index],
                    'fin_conc' => $request->fin_conc[$index],
                    'commentaire' => $request->commentaire
                ]);
            }
            return redirect()->route('dashboard.vague.vague.index')
                ->with('success', 'Concours et ses vagues associées créées avec succès.');
        } else {
            // Gérer l'erreur ou afficher un message d'avertissement
            return back()->withErrors(['designation' => 'Les données envoyées ne sont pas sous forme de tableau.']);
        }
    }

    public function edit($id)
    {
        $vague = Vague::findOrFail($id);
        $concours = Concours::find($vague->concours_id);

        return view('dashboard.vague.edit', compact('vague', 'concours'));
    }

    public function update(Request $request, $id)
    {
        $vague = Vague::findOrFail($id);

        // Mise à jour du concours associé
        $concours = Concours::firstOrCreate(['type' => $request->type]);

        // Mise à jour des données de la vague
        $vague->update([
            'concours_id' => $concours->id,
            'designation' => $request->designation[0],
            'deb_conc' => $request->deb_conc[0],
            'fin_conc' => $request->fin_conc[0],
            'deb_insc' => $request->deb_insc[0],
            'fin_insc' => $request->fin_insc[0],
        ]);

        // Ajouter les nouvelles vagues basées sur les champs dynamiques
        for ($i = 1; $i < count($request->deb_conc); $i++) {
            Vague::create([
                'concours_id' => $concours->id,
                'designation' => $request->designation[$i],
                'deb_conc' => $request->deb_conc[$i],
                'fin_conc' => $request->fin_conc[$i],
                'deb_insc' => $request->deb_insc[$i],
                'fin_insc' => $request->fin_insc[$i],
            ]);
        }

        return redirect()->route('dashboard.vague.vague.index')
            ->with('success', 'Concours et ses vagues associées ont été mise à jour avec succès.');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $vague = Vague::find($id);

        if ($vague) {
            // Supprimer la vague sélectionnée
            $vague->delete();
            }

            return redirect()->route('dashboard.vague.vague.index')
                ->with('success', 'Concours et ses vagues associées ont été supprimés avec succès.');
    }
}
