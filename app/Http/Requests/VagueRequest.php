<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VagueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'designation' => 'required|array',
            'designation.*' => 'required|string',
            'deb_conc' => 'required|array',
            'deb_conc.*' => 'required|date',
            'fin_conc' => 'required|array',
            'fin_conc.*' => 'required|date',
            'deb_insc' => 'required|array',
            'deb_insc.*' => 'required|date',
            'fin_insc' => 'required|array',
            'fin_insc.*' => 'required|date',
        ];
    }
}
