<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePixTransferRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'description' => $this->description ?? '',
        ]);
    }

    public function rules()
    {
        return [
            'key' => 'required|uuid',
            'amount' => 'required|numeric',
            'description' => 'nullable|string'
        ];
    }
}
