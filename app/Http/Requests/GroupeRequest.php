<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GroupeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->role == "SI Admin";
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'design' => 'required|string|max:80',
            'description' => 'required|string|max:100',
            'niveaux_id' => 'exists:niveaux,id',
        ];
    }

    public function messages()
    {
        return [
            'design.required' => 'Le champ designation est obligatoire.',
            'design.string' => 'Le champ design doit être une chaîne de caractères.',
            'design.max' => 'Le champ design ne doit pas dépasser 80 caractères.',
            'description.required' => 'Le champ description est obligatoire.',
            'description.string' => 'Le champ description doit être une chaîne de caractères.',
            'description.max' => 'Le champ description ne doit pas dépasser 100 caractères.',
            'niveaux_id.exists' => 'Le niveau sélectionnée n\'existe pas.',
        ];
    }
}
