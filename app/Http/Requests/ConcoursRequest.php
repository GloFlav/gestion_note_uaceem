<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConcoursRequest extends FormRequest
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
            'type' => 'required|string|max:60',
            'deb_insc' => ['required','date',
                            Rule::unique('concours')->ignore($id)],
            'fin_insc' => ['nullable','date',
                            Rule::unique('concours')->ignore($id)],
            'deb_conc' => ['required','date',
                            Rule::unique('concours')->ignore($id)],
            'fin_conc' => ['nullable','date',
                            Rule::unique('concours')->ignore($id)]
        ];
    }

    public function messages()
    {
        return[
           'type.required' => 'Veuillez remplir ce champ.',
           'deb_insc.required' => 'Veuillez remplir ce champ.',
           'deb_insc.unique' => 'Cette date est déjà utilisée.',
           'fin_insc.unique' => 'Cette date est déjà utilisée.',
           'deb_conc.required' => 'Veuillez remplir ce champ.',
           'deb_conc.unique' => 'Cette date est déjà utilisée.',
           'fin_conc.unique' => 'Cette date est déjà utilisée.',
        ];
    }
}
