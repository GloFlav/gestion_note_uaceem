<?php

namespace App\Http\Controllers;

use App\Http\Requests\UtilisateurRequest;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $key = $request->get('key') ?? "";
        $count = Utilisateur::where('username', 'like', '%' . $key . '%')
            ->orWhere('nom', 'like', '%' . $key . '%')->count();
        $utilisateurs = Utilisateur::where('username', 'like', '%' . $key . '%')
            ->orWhere('nom', 'like', '%' . $key . '%')
            ->paginate(10);
        return view('dashboard.user.liste_user', compact('utilisateurs', 'count', 'key'));
    }
    public function create()
    {
        return view('dashboard.user.add_user');
    }
    public function store(UtilisateurRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        Utilisateur::create($validated);
        return redirect()->route('dashboard.user.create')
            ->with('success', 'Utilisateur créé avec succès.');
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $utilisateur = Utilisateur::find($id);
        if ($utilisateur) {
            $utilisateur->delete();
            return redirect()->route('dashboard.user.index')
                ->with('success', 'Utilisateur supprimé avec succès.');
        }
        return redirect()->route('dashboard.user.index')
            ->with('error.delete', 'Utilisateur non trouvé');
    }

    public function edit(Request $request, String $id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        return view('dashboard.user.edit_user', compact('utilisateur'));
    }

    public function update(UtilisateurRequest $request, String $id)
    {
        $utilisateur = Utilisateur::find($id);
        if ($utilisateur) {
            $utilisateur->nom = $request->input('nom');
            $utilisateur->username = $request->input('username');
            $utilisateur->role = $request->input('role');
            if ($request->input('status'))
                $utilisateur->status = 0;
            else
                $utilisateur->status = 1;
            $utilisateur->save();

            return redirect()->route('dashboard.user.edit', ['id' => $utilisateur->id])
                ->with('success', 'Utilisateur modifié avec succès.');
        }
        return abort(404);
    }

    public function show(String $id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        return view('dashboard.user.info_user', compact('utilisateur'));
    }

    public function reset(Request $request, String $id)
    {
        $rules = [
            'password' => [
                'required',
                'string',
                'min:4',
            ],
        ];

        $messages = [
            'password.required' => 'Le mot de passe est requis.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $utilisateur = Utilisateur::findOrFail($id);

        $utilisateur->password = Hash::make($request->input('password'));
        $utilisateur->password_changed = false;
        $utilisateur->save();

        return redirect()->route('dashboard.user.edit', ['id' => $utilisateur->id])
            ->with('success', 'Mot de passe réinitialisé avec succès.');
    }
}
