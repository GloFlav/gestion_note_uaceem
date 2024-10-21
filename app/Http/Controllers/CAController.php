<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayementRequest;
use App\Models\Candidat;
use App\Models\Payement;
use Illuminate\Http\Request;

class CAController extends Controller
{
    public function index(Request $request)
    {
        $key = $request->get('key') ?? "";

        $count = Candidat::where(function($query) use ($key) {
            $query->where('nom','like',"%$key%")
                ->where('mode_inscription', 'like', 'local');
                })
                ->count();
        $candidats = Candidat::where(function($query) use ($key) {
                    $query->where('nom', 'like', "%$key%")
                          ->where('mode_inscription', 'local');
                    })
                    ->with('payement')
                    ->paginate(10);

        return view('dashboard.CA.index', compact('candidats','count', 'key'));
    }

    public function affiche($candidat)
    {
        $candidats = Candidat::findOrFail($candidat);
        return view('dashboard.CA.show', compact('candidats'));
    }

    public function show($candidat)
    {
        $candidats = Candidat::findOrFail($candidat);
        return view('dashboard.CA.create', compact('candidats'));
    }

    public function regarder($candidat)
    {
        $candidats = Candidat::with('payement')->findOrFail($candidat);
        return view('dashboard.CA.edit', compact('candidats'));
    }

    public function enregistre(PayementRequest $request, $id)
    {
            $candidats = new Payement();
            $candidats->candidat_id = $id;
            $candidats->date = $request->date;
            $candidats->type = $request->type;
            $candidats->montant = $request->montant;
            $candidats->mode = $request->mode;
            $candidats->commentaire = $request->commentaire;
            // Ajouter le préfixe à la référence
            $reference = $request->reference . '/CandACEEM';
            $candidats->reference = $reference;

            $candidats->save();

            if($candidats)
            {
                return redirect()->route('dashboard.candidataceem.index')
                                ->with('success', 'Payement bien effectuer.');
            }
            else
            {
                return back()->with('error','Veuillez vérifier que les champs sont bien rempli ou les données entrer sont bien compatible.');
            }
    }

    public function update(PayementRequest $request, $id)
    {
            $payement = Payement::findOrFail($id);

            $request->validate([
                'montant' => 'required|numeric|min:0',
            ]);

            if ($payement) {
                $payement->date = $request->date;
                $payement->type = $request->type;
                $payement->montant = $request->input('montant');
                $payement->mode = $request->mode;
                $payement->reference = $request->reference;
                $payement->commentaire = $request->commentaire;
                $payement->save();
            }

            if($payement)
            {
                return redirect()->route('dashboard.candidataceem.index')
                                ->with('success', 'Payement mis à jour avec succès.');
            }
            else
            {
                return back()->with('error','Veuillez vérifier que les champs sont bien remplis ou que les données sont bien compatibles.');
            }

    }
}
