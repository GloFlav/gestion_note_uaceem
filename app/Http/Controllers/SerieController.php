<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerieRequest;
use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    //
    public function index(Request $request)
    {
        $key = $request->get('key') ?? "";
        $count = Serie::where('design', 'like', '%' . $key . '%')->count();
        $series = Serie::where('design', 'like', '%' . $key . '%')->paginate(10);
        return view('dashboard.serie.liste_serie', compact('series', 'count', 'key'));
    }
    public function create()
    {
        return view('dashboard.serie.add_serie');
    }
    public function store(SerieRequest $request)
    {
        Serie::create($request->validated());
        return redirect()->route('dashboard.academique.serie.create')
            ->with('success', 'Série créé avec succès.');
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $serie = Serie::find($id);
        if ($serie) {
            $serie->delete();
            return redirect()->route('dashboard.academique.serie.index')
                ->with('success', 'Série supprimé avec succès.');
        }
        return redirect()->route('dashboard.academique.serie.index')
            ->with('error.delete', 'Série non trouvé');
    }

    public function edit(Request $request, String $id)
    {
        $serie = Serie::findOrFail($id);
        return view('dashboard.serie.edit_serie', compact('serie'));
    }

    public function update(SerieRequest $request, String $id)
    {
        $serie = Serie::find($id);
        if ($serie) {
            $serie->design = $request->input('design');
            $serie->save();

            return redirect()->route('dashboard.academique.serie.edit', ['id' => $serie->id])
                ->with('success', 'Série modifié avec succès.');
        }
        return abort(404);
    }

    public function show(String $id)
    {
        $serie = Serie::findOrFail($id);
        return view('dashboard.serie.info_serie', compact('serie'));
    }
}
