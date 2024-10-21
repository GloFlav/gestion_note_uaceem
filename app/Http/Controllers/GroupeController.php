<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupeRequest;
use App\Models\Groupe;
use App\Models\Niveau;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    //
    public function index(Request $request)
    {
        $key = $request->get('key') ?? "";
        $count = Groupe::where('design', 'like', '%' . $key . '%')->count();
        $groupes = Groupe::where('design', 'like', '%' . $key . '%')->paginate(10);
        return view('dashboard.groupes.liste_groupes', compact('groupes', 'count', 'key'));
    }

    public function create()
    {
        $niveaux = Niveau::with('parcours')->get();
        return view('dashboard.groupes.add_groupes', compact('niveaux'));
    }

    public function store(GroupeRequest $request)
    {
        $validated = $request->validated();

        $groupes = new Groupe();
        $groupes->design = $validated['design'];
        $groupes->description = $validated['description'];
        $groupes->niveaux_id = $validated['niveaux_id'];
        $groupes->save();
        return redirect()->route('dashboard.academique.groupe.create')
            ->with('success', 'Groupe créé avec succès.');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $groupes = Groupe::find($id);
        if ($groupes) {
            $groupes->delete();
            return redirect()->route('dashboard.academique.groupe.index')
                ->with('success', 'Groupes supprimé avec succès.');
        }
        return redirect()->route('dashboard.academique.groupe.index')
            ->with('error.delete', 'Groupes non trouvé');
    }

    public function edit(Request $request, String $id)
    {
        $niveaux = Niveau::all();
        $groupes = Groupe::with('niveaux')->findOrFail($id);
        return view('dashboard.groupes.edit_groupes', compact('groupes', 'niveaux'));
    }

    public function update(GroupeRequest $request, String $id)
    {
        $groupes = Groupe::findOrFail($id);
        $validated = $request->validated();

        $groupes->design = $validated['design'];
        $groupes->description = $validated['description'];
        $groupes->niveaux_id = $validated['niveaux_id'];
        $groupes->save();


        return redirect()->route('dashboard.academique.groupe.edit', ['id' => $groupes->id])
            ->with('success', 'Groupes modifié avec succès.');
    }

    public function show(String $id)
    {
        $groupes = Groupe::with('niveaux')->findOrFail($id);
        return view('dashboard.groupes.info_groupes', compact('groupes'));
    }
}
