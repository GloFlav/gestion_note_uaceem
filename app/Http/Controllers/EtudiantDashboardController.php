<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtudiantRequest;
use App\Models\Candidat;
use App\Models\Etudiant;
use App\Models\Matricule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EtudiantDashboardController extends Controller
{
    public function index()
    {
        // Get the currently authenticated utilisateur
        $utilisateur = Auth::user();

        // Access the related etudiant data
        $etudiants = $utilisateur->etudiant()->select('id','photo','username')
                                            ->first();

        return view('dashboard.etudiant.index', compact('etudiants'));
    }

    public function show($etudiant)
    {
        $etudiants = Etudiant::with('candidat')->findOrFail($etudiant);
        $matricule = Matricule::with('etudiant')->findOrFail($etudiant);
        return view('dashboard.etudiant.show', compact('etudiants','matricule'));
    }

    public function update(EtudiantRequest $request, $id)
    {
        // Find the related Candidat
        $candidat = Candidat::find($request->candidat_id);

        // Update Candidat's email if it's null
        if (!$candidat->email && $request->has('email')) {
            $candidat->email = $request->email;
            $candidat->save();
        }

        // Find the existing Etudiant by ID
        $etudiant = Etudiant::findOrFail($id);

        // Update the fields except 'password' and 'photo'
        $etudiant->fill($request->except(['password', 'photo']));

        // Update password only if provided
        if ($request->filled('password')) {
            $etudiant->password = Hash::make($request->password);
        }

        // Check if a photo file is uploaded
        if ($request->hasFile('photo')) {
            // Save the new image in the 'photos' directory and update the path
            $path = $request->file('photo')->store('photos', 'public');
            $etudiant->photo = $path;
        }

        // Save the updated Etudiant
        $etudiant->save();

        // Update the Matricule with the updated Etudiant ID
        $matricule = Matricule::find($request->matricule);
        $matricule->etudiant_id = $etudiant->id;
        $matricule->save();

        if($etudiant && $matricule)
        {
            // Redirect or return success response
            return redirect()->route('dashboard.etudiant.etudiant.show', ['etudiant' => $etudiant->id])
                            ->with('success', 'Votre profile est mis à jour.');
        }
        else
        {
            return back()->with('error','Veuillez vérifier que les champs sont bien rempli ou les données entrer sont bien compatible.');
        }
    }

}
