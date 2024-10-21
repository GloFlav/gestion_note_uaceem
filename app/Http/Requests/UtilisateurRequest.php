<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UtilisateurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        $userId = $this->route('id');
        $rules = [
            'nom' => 'required|string|max:255',
            'password' => 'required|string|min:4',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('utilisateurs', 'username')
                    ->whereNull('deleted_at')->ignore($userId, 'id'),
            ],
            'role' => 'required|in:SI Admin,Caisse,Accueil,Agent,Scolarité,Etudiant,Inscription,CA,Caisse evenement',
            'status' => 'sometimes',
        ];
        if ($this->isMethod('post')) {
            $rules['password'] = 'required|string|min:4';
        } elseif ($this->isMethod('put')) {
            $rules['password'] = 'nullable|string|min:4';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le champ nom est obligatoire.',
            'nom.string' => 'Le champ nom doit être une chaîne de caractères.',
            'nom.max' => 'Le champ nom ne doit pas dépasser 255 caractères.',
            'password.required' => 'Le champ mot de passe est obligatoire.',
            'password.string' => 'Le champ mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le champ mot de passe doit contenir au moins 4 caractères.',
            'username.required' => 'Le champ nom d\'utilisateur est obligatoire.',
            'username.string' => 'Le champ nom d\'utilisateur doit être une chaîne de caractères.',
            'username.max' => 'Le champ nom d\'utilisateur ne doit pas dépasser 255 caractères.',
            'username.unique' => 'Le nom d\'utilisateur est déjà pris.',
            'role.required' => 'Le champ rôle est obligatoire.',
            'role.in' => 'Le champ rôle doit être l\'un des suivants: SI Admin, Caisse, CA, Accueil, Agent, Scolarité, Etudiant, Inscription, Caisse évenement, Recteur, Responsable Note',
        ];
    }
}
