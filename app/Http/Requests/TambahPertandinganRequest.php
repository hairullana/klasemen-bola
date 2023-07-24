<?php

namespace App\Http\Requests;

use App\Rules\ValidasiKlubTandang;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TambahPertandinganRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'jenis' => ['required', Rule::in(['Single', 'Multiple'])],
        ];
        

        if ($this->jenis == 'Single') {
            $rules['klub_kandang'] = ['required', 'exists:klub,nama'];
            $rules['goal_kandang'] = ['required', 'numeric', 'min:0'];
            $rules['klub_tandang'] = ['required', 'exists:klub,nama', new ValidasiKlubTandang($this->klub_kandang)];
            $rules['goal_tandang'] = ['required', 'numeric', 'min:0'];
        } else if ($this->jenis == 'Multiple') {
            $rules['klub_kandang'] = ['required', 'array', 'min:1'];
            $rules['goal_kandang'] = ['required', 'array', 'min:1'];
            $rules['klub_tandang'] = ['required', 'array', 'min:1', new ValidasiKlubTandang($this->klub_kandang)];
            $rules['goal_tandang'] = ['required', 'array', 'min:1'];
            $rules['klub_kandang.*'] = ['required', 'exists:klub,nama'];
            $rules['goal_kandang.*'] = ['required', 'numeric', 'min:0'];
            $rules['klub_tandang.*'] = ['required', 'exists:klub,nama'];
            $rules['goal_tandang.*'] = ['required', 'numeric', 'min:0'];
        }

        return $rules;
    }

    public function attributes(): array
    {
        return [
            'jenis' => 'Jenis Pertandingan',
            'klub_kandang' => 'Klub Kandang',
            'goal_kandang' => 'Skor Kandang',
            'klub_tandang' => 'Klub Tandang',
            'goal_tandang' => 'Skor Tandang',
            'klub_kandang.*' => 'Klub Kandang',
            'goal_kandang.*' => 'Skor Kandang',
            'klub_tandang.*' => 'Klub Tandang',
            'goal_tandang.*' => 'Skor Tandang'
        ];
    }
}
