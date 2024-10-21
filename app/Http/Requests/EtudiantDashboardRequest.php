<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtudiantDashboardRequest extends FormRequest
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
        $id = $this->route('etudiant'); // Retrieve the Etudiant ID from the route

        return [
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // Limit to 10 MB
            'date_nais' => 'required|date',
            'lieu_nais' => 'required|string|max:80',
            'num_cin' => 'nullable|string|max:20|unique:etudiants,num_cin,' . $id,
            'date_cin' => 'nullable|date',
            'lieu_cin' => 'nullable|string|max:80',
            'adresse' => 'required|string|max:80',
            'quartier' => 'nullable|string|max:80',
            'facebook' => 'nullable|string|max:80',
            'etablissement_origine' => 'required|string|max:60',
            'email_parent' => 'nullable|email|max:80',
            'nom_parent' => 'required|string|max:80',
            'adresse_parent' => 'required|string|max:80',
            'profession_parent' => 'required|string|max:80',
            'tel_parent' => [
                'required',
                'string',
                'regex:/^(032|033|034|037|038|039)[0-9]{7}$/',
                'max:20',
            ],
            'num_mvola' => [
                'nullable',
                'string',
                'regex:/^(034|038)[0-9]{7}$/',
                'max:20',
            ],
            'province_parent' => 'required|string|max:80',
            'nom_parent_2' => 'nullable|string|max:255',
            'profession_parent_2' => 'nullable|string|max:255',
            'tel_parent_2' => [
                'nullable',
                'string',
                'regex:/^(032|033|034|037|038|039)[0-9]{7}$/',
                'max:20',
            ],
            'centre_interet' => 'required|string|max:255',
            'username' => 'required|string|max:80|unique:etudiants,username,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ];
    }
}
