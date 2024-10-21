<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PayementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'montant' => 'required|numeric|min:0|max:9999999999.99', // Validation pour un decimal(10,2)
            'reference' => [
                    'required',
                    'string',
                    'max:80',
                    Rule::unique('payements')->ignore($this->route('id')) // Ignore l'enregistrement actuel lors de l'unicité
        ]
        ];
    }
    public function messages()
    {
        return [
            'reference.required' => 'Veuillez remplir ce champ.',
            'reference.unique' => 'Ce réference est déjà utilisé.'
        ];
    }

    protected function prepareForValidation()
    {
        // Supprimer les espaces avant validation
        $this->merge([
            'montant' => str_replace(' ', '', $this->montant),
        ]);
    }
}
