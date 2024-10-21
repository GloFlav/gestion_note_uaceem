<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    //
    public function login()
    {
        if (Auth::user()) {
            $user = Auth::user();
            // Vérifier le rôle de l'utilisateur pour rediriger vers la page appropriée
            switch ($user->role) {
                case 'SI Admin':
                    return to_route('dashboard.dashboard.index');
                case 'Caisse':
                    return to_route('dashboard.payement.payement.local.index');
                case 'CA':
                    return to_route('dashboard.candidataceem.index');
                case 'Accueil':
                    return to_route('dashboard.acceuil.acceuil.matricule');
                case 'Inscription':
                    return to_route('inscription.index');
                case 'Scolarité':
                    return to_route('dashboard.convocation.index');
                case 'Etudiant':
                    return to_route('dashboard.etudiant.index');
                case 'Caisse evenement':
                    return to_route('dashboard.event.event.index');
                default:
                    // Redirection par défaut si le rôle ne correspond à aucune condition
                    return to_route('index');
            }
        };
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        // Validation des données de connexion
        $credentials = $request->only('username', 'password');

        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password'], 'status' => 1, 'deleted_at' => null])) {
            // L'utilisateur est authentifié avec succès

            // Récupérer l'utilisateur authentifié
            $user = Auth::user();

            // Vérifier le rôle de l'utilisateur pour rediriger vers la page appropriée
            switch ($user->role) {
                case 'SI Admin':
                    return redirect()->intended(route('dashboard.dashboard.index'));
                case 'Caisse':
                    return redirect()->intended(route('dashboard.payement.payement.local.index'));
                case 'CA':
                    return redirect()->intended(route('dashboard.candidataceem.index'));
                case 'Accueil':
                    return redirect()->intended(route('dashboard.acceuil.acceuil.matricule'));
                case 'Inscription':
                    return redirect()->intended(route('inscription.index'));
                case 'Scolarité':
                    return redirect()->intended(route('dashboard.convocation.index'));
                case 'Etudiant':
                    return redirect()->intended(route('dashboard.etudiant.etudiant.index'));
                case 'Caisse evenement':
                    return redirect()->intended(route('dashboard.event.event.index'));
                default:
                    // Redirection par défaut si le rôle ne correspond à aucune condition
                    return redirect()->intended(route('index'));
            }
        } else {
            session()->flash('error.login', "Nom d'utilisateur ou mot de passe incorrect. Veuillez réessayer.");
            return to_route('login')->onlyInput('username');
        }
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login');
    }

    public function setPassword()
    {
        if (Auth::check() && Auth::user()->password_changed)
            // return to_route('dashboard.home');
            switch (Auth::user()->role) {
                case 'SI Admin':
                    return to_route('dashboard.dashboard.index');
                case 'Caisse':
                    return to_route('dashboard.payement.payement.local.index');
                case 'CA':
                    return to_route('dashboard.candidataceem.index');
                case 'Accueil':
                    return to_route('dashboard.acceuil.acceuil.matricule');
                case 'Inscription':
                    return to_route('inscription.index');
                case 'Scolarité':
                    return to_route('dashboard.convocation.index');
                case 'Etudiant':
                    return to_route('dashboard.etudiant.index');
                case 'Caisse evenement':
                    return to_route('dashboard.event.event.index');
                default:
                    // Redirection par défaut si le rôle ne correspond à aucune condition
                    return to_route('index');
            }
        return view('auth.change_password');
    }

    public function doSetPassword(Request $request)
    {
        $rules = [
            'password' => [
                'required',
                'string',
                'min:8',
            ],
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }
        $utilisateur = Utilisateur::findOrFail(Auth::user()->id);
        $utilisateur->password = Hash::make($request->input('password'));
        $utilisateur->password_changed = true;
        $utilisateur->save();
        // return redirect()->intended(route('dashboard.home'));
        switch ($utilisateur->role) {
            case 'SI Admin':
                return to_route('dashboard.dashboard.index');
            case 'Caisse':
                return to_route('dashboard.payement.payement.local.index');
            case 'CA':
                return to_route('dashboard.candidataceem.index');
            case 'Accueil':
                return to_route('dashboard.acceuil.acceuil.matricule');
            case 'Inscription':
                return to_route('inscription.index');
            case 'Scolarité':
                return to_route('dashboard.convocation.index');
            case 'Etudiant':
                return to_route('dashboard.etudiant.index');
            case 'Caisse evenement':
                return to_route('dashboard.event.event.index');
            default:
                // Redirection par défaut si le rôle ne correspond à aucune condition
                return to_route('index');
        }
    }
}
