<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MentionRequest extends FormRequest
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
            'code' => 'required|string|max:255|unique:mentions,code,' . $this->route('id'),
            'description' => 'required|string',
            'series' => 'required|array|min:1',
            'series.*' => 'exists:series,id',
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
            'code.required' => 'Le champ code est obligatoire.',
            'code.string' => 'Le champ code doit être une chaîne de caractères.',
            'code.max' => 'Le champ code ne doit pas dépasser 255 caractères.',
            'code.unique' => 'Le code doit être unique.',
            'series.required' => 'Le champ series est obligatoire.',
            'series.array' => 'Le champ series doit être un tableau.',
            'series.min' => 'Le champ series doit contenir au moins un élément.',
            'series.*.exists' => 'L\'élément sélectionné dans le champ series n\'existe pas.',
        ];
    }
}
