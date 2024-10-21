<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Concours;
use App\Models\Etudiant;
use App\Models\Matricule;
use App\Models\Serie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AcceuilController extends Controller
{
    public function index(Request $request)
    {
        $key = $request->get('key') ?? "";

        $candidats = Candidat::where('nom', 'like', "%$key%")
            ->where('status', 'admis')
            ->with('matricule')
            ->paginate(10);
        return view('dashboard.acceuil.index', compact('candidats','key'));
    }

    public function matricule(Request $request)
    {
        $key = $request->get('key') ?? "";

        $count = Candidat::where('nom', 'like', "%$key%")
                ->where('status','admis')
                ->with('matricule')
                ->count();
        $candidats = Candidat::where('nom', 'like', "%$key%")
            ->where('status', 'admis')
            ->with('matricule')
            ->paginate(10);

        return view('dashboard.acceuil.matricule', compact('candidats', 'count','key'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'candidat_id' => 'required|exists:candidats,id',
        ]);

        // Retrieve the Candidat and Mention
        $candidat = Candidat::findOrFail($request->candidat_id);
        $mention = $candidat->mention; // Assuming 'mention' is the relation on 'Candidat'

        // Generate the 'NN' part
        $existingMatricules = Matricule::whereHas('candidat', function($query) use ($mention) {
            $query->where('mention_id', $mention->id);
        })->count();

        $incrementedNumber = str_pad($existingMatricules + 1, 3, '0', STR_PAD_LEFT);

        // Combine to form the full matricule
        $matricule = $incrementedNumber . '/' . $mention->code . '/IèA';

        // Save the matricule
        $newMatricule = new Matricule();
        $newMatricule->design = $matricule;
        $newMatricule->candidat_id = $candidat->id;
        $newMatricule->save();

        return redirect()->route('dashboard.acceuil.acceuil.matricule')
                        ->with('success', 'Matricule généré avec succès.');
    }
}
