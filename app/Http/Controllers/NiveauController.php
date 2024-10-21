<?php

namespace App\Http\Controllers;

use App\Http\Requests\NiveauRequest;
use App\Models\Niveau;
use App\Models\Parcours;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    //
    public function index(Request $request)
    {
        $key = $request->get('key') ?? "";
        $count = Niveau::where('design', 'like', '%' . $key . '%')->count();
        $niveaux = Niveau::where('design', 'like', '%' . $key . '%')->paginate(10);
        return view('dashboard.niveau.liste_niveau', compact('niveaux', 'count', 'key'));
    }
    public function create()
    {
        $parcours = Parcours::with('niveaux')->with('mention')->get();
        $niveauxTaken = $parcours->mapWithKeys(function ($parcours) {
            return [
                $parcours->id => $parcours->niveaux->pluck('design')->toArray()
            ];
        });
        return view('dashboard.niveau.add_niveau', compact('parcours', 'niveauxTaken'));
    }
    public function store(NiveauRequest $request)
    {
        $validated = $request->validated();

        $niveau = new Niveau();
        $niveau->design = $validated['design'];
        if ($validated['description'])
            $niveau->description = $validated['description'];

        $niveau->parcours_id = $validated['parcours_id'];
        $niveau->save();
        return redirect()->route('dashboard.academique.niveau.create')
            ->with('success', 'Niveau créé avec succès.');
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $niveau = Niveau::find($id);
        if ($niveau) {
            $niveau->delete();
            return redirect()->route('dashboard.academique.niveau.index')
                ->with('success', 'Niveau supprimé avec succès.');
        }
        return redirect()->route('dashboard.academique.niveau.index')
            ->with('error.delete', 'Niveau non trouvé');
    }

    public function edit(Request $request, String $id)
    {
        $parcours = Parcours::with('niveaux')->with('mention')->get();
        $niveauxTaken = $parcours->mapWithKeys(function ($parcours) {
            return [
                $parcours->id => $parcours->niveaux->pluck('design')->toArray()
            ];
        });
        $niveau = Niveau::findOrFail($id);
        return view('dashboard.niveau.edit_niveau', compact('niveau', 'parcours', 'niveauxTaken'));
    }

    public function update(NiveauRequest $request, String $id)
    {
        $validated = $request->validated();

        $niveau = Niveau::findOrFail($id);
        $niveau->design = $validated['design'];
        if ($validated['description'])
            $niveau->description = $validated['description'];
        else
            $niveau->description = "";

        $niveau->parcours_id = $validated['parcours_id'];
        $niveau->save();

        return redirect()->route('dashboard.academique.niveau.edit', ['id' => $niveau->id])
            ->with('success', 'Niveau modifié avec succès.');
    }

    public function show(String $id)
    {
        $niveau = Niveau::with('parcours')->findOrFail($id);
        return view('dashboard.niveau.info_niveau', compact('niveau'));
    }
}
