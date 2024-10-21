<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class NiveauRequest extends FormRequest
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
    public function rules()
    {
        return [
            'design' => 'required|in:L1,L2,L3,M1,M2',
            'description' => 'nullable|string|max:255',
            'parcours_id' => 'required|exists:parcours,id',
        ];
    }

    public function messages()
    {
        return [
            'design.required' => 'Le champ design est obligatoire.',
            'design.in' => 'Le champ design doit être l\'une des valeurs suivantes: L1, L2, L3, M1, M2.',
            'description.max' => 'Le champ description ne doit pas dépasser 255 caractères.',
            'parcours_id.required' => 'Le parcours est requis.',
            'parcours_id.exists' => 'Le parcours sélectionné n\'existe pas.',
        ];
    }
}
