<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ResultatRequest extends FormRequest
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
            'results' => 'required|file|mimes:xlsx,xls,csv|max:5120', // 5MB = 5120KB
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'results.required' => 'Le fichier est requis.',
            'results.file' => 'Le fichier doit être un fichier valide.',
            'results.mimes' => 'Le fichier doit être de type .xlsx, .xls ou .csv.',
            'results.max' => 'Le fichier ne doit pas dépasser 5MB.',
        ];
    }
}
