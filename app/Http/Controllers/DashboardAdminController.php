<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Concours;
use App\Models\Mention;
use App\Models\Niveau;
use App\Models\Parcours;
use App\Models\Serie;
use App\Models\Utilisateur;
use App\Models\Vague;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $countuser = Utilisateur::count();
        $countmention = Mention::count();
        $countparcours = Parcours::count();
        $countniveaux = Niveau::count();
        $countserie = Serie::count();
        $countvagues = Vague::count();
        $countcandidats = Candidat::count();
        return view('dashboard.dashboard.index', compact('countuser','countmention','countparcours','countniveaux','countserie','countvagues','countcandidats'));
    }
}
