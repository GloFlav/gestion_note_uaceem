<?php

namespace App\Http\Controllers;

use App\Http\Requests\SousGroupeRequest;
use App\Models\Groupe;
use App\Models\Niveau;
use App\Models\SousGroupe;
use Illuminate\Http\Request;

class SousGroupeController extends Controller
{
    public function index(Request $request)
    {
        $key = $request->get('key') ?? "";
        $count = SousGroupe::where('design', 'like', '%' . $key . '%')->count();
        $sousgroupes = SousGroupe::where('design', 'like', '%' . $key . '%')->paginate(10);
        return view('dashboard.sous_groupes.liste_sous_groupes', compact('sousgroupes', 'count', 'key'));
    }

    public function create()
    {
        $groupes = Groupe::with('niveaux')->get();
        return view('dashboard.sous_groupes.add_sous_groupes', compact('groupes'));
    }

    public function store(SousGroupeRequest $request)
    {
        $validated = $request->validated();

        $sousgroupes = new SousGroupe();
        $sousgroupes->design = $validated['design'];
        $sousgroupes->description = $validated['description'];
        $sousgroupes->groupes_id = $validated['groupes_id'];
        $sousgroupes->save();
        return redirect()->route('dashboard.academique.sousgroupe.create')
                        ->with('success', 'Sous-groupe créé avec succès.');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $sousgroupes = SousGroupe::find($id);
        if ($sousgroupes) {
            $sousgroupes->delete();
            return redirect()->route('dashboard.academique.sousgroupe.index')
                ->with('success', 'Sous-groupes supprimé avec succès.');
        }
        return redirect()->route('dashboard.academique.sousgroupe.index')
            ->with('error.delete', 'Sous-groupes non trouvé');
    }

    public function edit(Request $request, String $id)
    {
        $groupes = Groupe::all();
        $sousgroupes = SousGroupe::with('groupe')->findOrFail($id);
        return view('dashboard.sous_groupes.edit_sous_groupes', compact('sousgroupes', 'groupes'));
    }

    public function update(SousGroupeRequest $request, String $id)
    {
        $sousgroupes = SousGroupe::findOrFail($id);
        $validated = $request->validated();

        $sousgroupes->design = $validated['design'];
        $sousgroupes->description = $validated['description'];
        $sousgroupes->groupes_id = $validated['groupes_id'];
        $sousgroupes->save();


        return redirect()->route('dashboard.academique.sousgroupe.edit', ['id' => $sousgroupes->id])
            ->with('success', 'Sous-groupes modifié avec succès.');
    }

    public function show(String $id)
    {
        $sousgroupes = SousGroupe::with('groupe')->findOrFail($id);
        return view('dashboard.sous_groupes.info_sous_groupes', compact('sousgroupes'));
    }
}
