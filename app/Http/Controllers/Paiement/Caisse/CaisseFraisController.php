<?php

namespace App\Http\Controllers\Paiement\Caisse;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CaisseFraisController extends Controller
{
    public function index(Request $request) {
        return view("dashboard.caisse.paiement.frais.index");
    }
}
