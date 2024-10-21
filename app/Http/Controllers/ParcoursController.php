<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParcoursRequest;
use App\Models\Mention;
use App\Models\Parcours;
use Illuminate\Http\Request;

class ParcoursController extends Controller
{
    //
    public function index(Request $request)
    {
        $key = $request->get('key') ?? "";
        $count = Parcours::where('design', 'like', '%' . $key . '%')
            ->orWhere('description', 'like', '%' . $key . '%')->count();
        $parcours = Parcours::where('design', 'like', '%' . $key . '%')
            ->orWhere('description', 'like', '%' . $key . '%')->paginate(10);
        return view('dashboard.parcours.liste_parcours', compact('parcours', 'count', 'key'));
    }
    public function create()
    {
        $mentions = Mention::all();
        return view('dashboard.parcours.add_parcours', compact('mentions'));
    }
    public function store(ParcoursRequest $request)
    {
        $validated = $request->validated();

        $parcours = new Parcours();
        $parcours->design = $validated['design'];
        $parcours->description = $validated['description'];
        $parcours->mention_id = $validated['mention_id'];
        $parcours->save();
        return redirect()->route('dashboard.academique.parcours.create')
            ->with('success', 'Parcours créé avec succès.');
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $parcours = Parcours::find($id);
        if ($parcours) {
            $parcours->delete();
            return redirect()->route('dashboard.academique.parcours.index')
                ->with('success', 'Parcours supprimé avec succès.');
        }
        return redirect()->route('dashboard.academique.parcours.index')
            ->with('error.delete', 'Parcours non trouvé');
    }

    public function edit(Request $request, String $id)
    {
        $mentions = Mention::all();
        $parcours = Parcours::with('mention')->findOrFail($id);
        return view('dashboard.parcours.edit_parcours', compact('parcours', 'mentions'));
    }

    public function update(ParcoursRequest $request, String $id)
    {
        $parcours = Parcours::findOrFail($id);
        $validated = $request->validated();

        $parcours->design = $validated['design'];
        $parcours->description = $validated['description'];
        $parcours->mention_id = $validated['mention_id'];
        $parcours->save();


        return redirect()->route('dashboard.academique.parcours.edit', ['id' => $parcours->id])
            ->with('success', 'Parcours modifié avec succès.');
    }

    public function show(String $id)
    {
        $parcours = Parcours::with('mention')->findOrFail($id);
        return view('dashboard.parcours.info_parcours', compact('parcours'));
    }
}
