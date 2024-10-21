<?php

namespace App\Http\Controllers;

use App\Http\Requests\MentionRequest;
use App\Models\Mention;
use App\Models\Serie;
use Illuminate\Http\Request;

class MentionController extends Controller
{
    //
    public function index(Request $request)
    {
        $key = $request->get('key') ?? "";
        $count = Mention::where('design', 'like', '%' . $key . '%')
            ->orWhere('code', 'like', '%' . $key . '%')->count();
        $mentions = Mention::where('design', 'like', '%' . $key . '%')
            ->orWhere('code', 'like', '%' . $key . '%')->paginate(10);
        return view('dashboard.mention.liste_mention', compact('mentions', 'count', 'key'));
    }
    public function create()
    {
        $series = Serie::all();
        return view('dashboard.mention.add_mention', compact('series'));
    }
    public function store(MentionRequest $request)
    {
        $validated = $request->validated();

        $mention = new Mention();
        $mention->design = $validated['design'];
        $mention->code = $validated['code'];
        $mention->description = $validated['description'];
        $mention->save();
        $mention->series()->attach($validated['series']);
        return redirect()->route('dashboard.academique.mention.create')
            ->with('success', 'Mention créé avec succès.');
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $mention = Mention::find($id);
        if ($mention) {
            $mention->delete();
            return redirect()->route('dashboard.academique.mention.index')
                ->with('success', 'Mention supprimé avec succès.');
        }
        return redirect()->route('dashboard.academique.mention.index')
            ->with('error.delete', 'Mention non trouvé');
    }

    public function edit(Request $request, String $id)
    {
        $series = Serie::all();
        $mention = Mention::with('series')->findOrFail($id);
        return view('dashboard.mention.edit_mention', compact('mention', 'series'));
    }

    public function update(MentionRequest $request, String $id)
    {
        $mention = Mention::findOrFail($id);
        $validated = $request->validated();

        $mention->design = $validated['design'];
        $mention->code = $validated['code'];
        $mention->description = $validated['description'];
        $mention->save();

        $mention->series()->sync($validated['series']);

        return redirect()->route('dashboard.academique.mention.edit', ['id' => $mention->id])
            ->with('success', 'Mention modifié avec succès.');
    }

    public function show(String $id)
    {
        $mention = Mention::with('series')->findOrFail($id);
        return view('dashboard.mention.info_mention', compact('mention'));
    }
}
