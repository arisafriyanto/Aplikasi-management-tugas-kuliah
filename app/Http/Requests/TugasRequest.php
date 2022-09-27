<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TugasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tugas' => 'required|min:3|max:100',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
            'file_tugas' => 'file|mimes:pdf|max:20048',
            'keterangan_tugas' => 'required|min:3|max:200',
        ];
    }
}
