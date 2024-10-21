<?php

namespace App\Http\Requests;

use App\Models\Candidat;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InscriptionLocalRequest extends FormRequest
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
            'nom' => 'required|string|min:2|max:80|regex:/^[a-zA-ZÀ-ÿ\s\-]+$/u',
            // 'num_bacc' => ['required','string','min:6','max:12', Rule::unique('candidats')->ignore($id)],
            'num_bacc' => [
                'required',
                'string',
                'min:4',
                'max:12',
                function ($attribute, $value, $fail) {
                    $vagueId = $this->input('vagues_id');
                    $id = $this->route('id');

                    $query = Candidat::where('num_bacc', $value)
                        ->where('vagues_id', $vagueId);
                    if ($id) {
                        $query->where('id', '<>', $id);
                    }

                    if ($query->exists()) {
                        $fail("Le numéro du Bacclauréat est déja utilisé");
                    }
                }
            ],
            'anne_bacc' => 'required|integer',
            'serie_id' => 'required|integer',
            'mention_id' => 'required|integer',
            'tel' => ['required', 'regex:/^(034|033|032|037|038)[0-9]{7}$/', function ($attribute, $value, $fail) {
                $vagueId = $this->input('vagues_id');
                $id = $this->route('id');

                $query = Candidat::where('tel', $value)
                    ->where('vagues_id', $vagueId);
                if ($id) {
                    $query->where('id', '<>', $id);
                }

                if ($query->exists()) {
                    $fail("Le numéro de téléphone est déja utilisé");
                }
            }],
            'email' => ['nullable', 'email', 'max:60', function ($attribute, $value, $fail) {
                if ($value) {

                    $vagueId = $this->input('vagues_id');
                    $id = $this->route('id');

                    $query = Candidat::where('email', $value)
                        ->where('vagues_id', $vagueId);
                    if ($id) {
                        $query->where('id', '<>', $id);
                    }

                    if ($query->exists()) {
                        $fail("L'adresse E-mail est déja utilisé");
                    }
                }
            }],
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Veuillez remplir ce champ.',
            'nom.min' => 'Le champ nom ne doit pas dépasser 2 caractères.',
            'nom.max' => 'Le champ nom ne doit pas dépasser 80 caractères.',
            'num_bacc.required' => 'Veuillez remplir ce champ.',
            'num_bacc.min' => 'Le champ numéro du BACC doit avoir 4 caractères minimum.',
            'num_bacc.max' => 'Le champ numéro du BACC ne doit pas dépasser 12 caractères.',
            'anne_bacc.required' => 'Veuillez remplir ce champ',
            'anne_bacc.integer' => 'Le champ année du BACC doit être votre année du BACC',
            'serie_id.required' => 'Veuillez remplir ce champ.',
            'serie_id.integer' => 'Veuillez remplir ce champ.',
            'mention_id.required' => 'Veuillez remplir ce champ.',
            'mention_id.integer' => 'Veuillez remplir ce champ.',
            'tel.required' => 'Veuillez remplir ce champ.',
            'tel.regex' => 'Le numéro doit être commencer avec 034, 033, 032, or 038 suivi de 07 chiffres après.',
            'email.required' => 'Veuillez remplir ce champ.',
            'email.email' => 'Veuillez entrer un adresse E-mail comme "example@gmail.com".',
            'email.unique' => 'Cet email est déjà utilisé. Essayer un autre.'
        ];
    }
}
