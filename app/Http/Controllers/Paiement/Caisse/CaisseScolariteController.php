<?php

namespace App\Http\Controllers\Paiement\Caisse;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CaisseScolariteController extends Controller
{
    public function index(Request $request) {
        return view("dashboard.caisse.paiement.scolarite.index");
    }
}
