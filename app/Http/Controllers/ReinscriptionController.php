<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Matricule;
use Illuminate\Http\Request;

class ReinscriptionController extends Controller
{
    public function index(Request $request)
    {
        $key = $request->get('key') ?? "";

        $count = Etudiant::where(function ($query) use ($key) {
            $query->where('nom', 'like', "%$key%");
        })
            ->count();
        $etudiants = Etudiant::where(function ($query) use ($key) {
            $query->where('nom', 'like', "%$key%");
        })
            ->with('payement','matriculeInfo')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.caisse.reinscription.index', compact('etudiants', 'count', 'key'));
    }
}
