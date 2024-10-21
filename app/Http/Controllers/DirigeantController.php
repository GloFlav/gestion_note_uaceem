<?php

namespace App\Http\Controllers;
use App\Models\Candidat;
use App\Models\Payement;
use Illuminate\Http\Request;

class DirigeantController extends Controller
{
    public function index()
    {
        $candidat = Candidat::all();

        $totalcand = Candidat:: count();
        $totalcandel = Candidat::where('mode_inscription','=', 'en_ligne')->count();
        $totalcandlo = Candidat::where('mode_inscription','=','local')->count();
        $totalCA = Payement::where('reference',' like','CandACEEM')->count();
        return view('dirigeant.index' , compact('totalcand','totalcandel','totalcandlo','totalCA')); // Affiche la vue "index" dans le dossier "dirigeants"
    }
}
