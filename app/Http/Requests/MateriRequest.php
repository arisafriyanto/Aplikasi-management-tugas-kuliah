<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MateriRequest extends FormRequest
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
            'materi' => 'required|max:100|min:3',
            'keterangan_materi' => 'required|min:3|max:200',
            'file_materi' => 'file|mimes:pdf|max:20048'
        ];
    }
}
