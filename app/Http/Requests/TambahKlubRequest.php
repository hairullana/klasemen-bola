<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TambahKlubRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => ['required', 'min:5', 'unique:klub,nama'],
            'kota' => ['required', 'min:4'],
        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama Klub',
            'kota' => 'Kota Klub',
        ];
    }
}
