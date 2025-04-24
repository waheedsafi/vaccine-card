<?php

namespace App\Http\Requests\app\certificate;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonInfoRequest extends FormRequest
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
        return [
            'id' => 'required|numeric|exists:people,id',
            'district_id' => 'required|integer|exists:districts,id',
            'province_id' => 'required|integer|exists:provinces,id',
            'full_name' => 'required|string',
            'father_name' => 'required|string',
            'date_of_birth' => 'required',
            'passport_number' => 'required|string',
            'gender_id' => 'required|numeric',
            'nationality_id' => 'required|numeric|exists:nationalities,id',
        ];
    }
}
