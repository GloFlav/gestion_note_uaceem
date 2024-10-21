<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ParcoursRequest extends FormRequest
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
            'design' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'mention_id' => 'exists:mentions,id',
        ];
    }

    public function messages()
    {
        return [
            'design.required' => 'Le champ design est obligatoire.',
            'design.string' => 'Le champ design doit être une chaîne de caractères.',
            'design.max' => 'Le champ design ne doit pas dépasser 255 caractères.',
            'description.required' => 'Le champ description est obligatoire.',
            'description.string' => 'Le champ description doit être une chaîne de caractères.',
            'description.max' => 'Le champ description ne doit pas dépasser 255 caractères.',
            'mention_id.exists' => 'La mention sélectionnée n\'existe pas.',
        ];
    }
}
