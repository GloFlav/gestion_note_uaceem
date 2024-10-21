<?php

namespace App\Http\Controllers;

use App\Models\Matricule;
use Illuminate\Http\Request;

class MatriculeController extends Controller
{
    public function index()
    {
        return view('matricule.index');
    }

    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'design' => 'required|string',
        ]);

        $matricule = Matricule::where('design', $validatedData['design'])->first();

        if ($matricule) {
            // Redirection vers la page d'inscription si la valeur existe
            return redirect()->route('etudiant.index', ['matricule' => $matricule->id]);
        } else {
            // Retourne une erreur si la valeur n'existe pas
            return back()->with('error', 'Le format de la valeur entrée n\'est pas valide ou elle n\'existe pas.');
        }
    }
}
