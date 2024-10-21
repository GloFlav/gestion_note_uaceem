<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CandidatRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            'nom' => 'required|string|max:255',
            'num_bacc' => 'required|string|max:255',
            'anne_bacc' => 'required',
            'serie_id' => 'required|integer',
            'mention_id' => 'required|integer',
            'tel' => ['required', 'regex:/^(034|033|032|038|037)[0-9]{7}$/'],
            'email' => ['required','string','email', 'max:255',Rule::unique('candidats')->ignore($id)],
            'ref_mvola' => 'required|string|max:255',

        ];
    }
    public function messages()
    {
        return[
           'nom.required' => 'Veuillez remplir ce champ.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',
            'nom.max' => 'Le champ nom ne doit pas dépasser 255 caractères.',
            'anne_bacc.required'=>'Veuillez remplir ce champ.',
            'serie_id.required'=>'Veuillez remplir ce champ.',
            'mention_id.required'=>'Veuillez remplir ce champ.',
            'tel.required' => 'Le numéro de téléphone est obligatoire.',
            'tel.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'tel.regex'=>'Le numéro de téléphone fourni doit être un numéro valide.',
            'tel.max' => 'Le champ téléphone ne doit pas dépasser 20 caractères.',
            'email.required' => 'Le champ email est obligatoire.',
            'email.string' => 'L\'email doit être une chaîne de caractères.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.max' => 'Le champ email ne doit pas dépasser 255 caractères.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'ref_mvola.required' => 'Veuillez remplir ce champ.',
            'ref_mvola.string' => 'La référence MVola doit être une chaîne de caractères.',
            'ref_mvola.max' => 'Le champ référence MVola ne doit pas dépasser 255 caractères.',
            'commentaire.required' => 'Veuillez remplir ce champ.',
            'commentaire.string' => 'La commentaire doit être une chaîne de caractères.',
            'commentaire.max' => 'Le champ nom ne doit pas dépasser 255 caractères.',

        ];
    }
}
