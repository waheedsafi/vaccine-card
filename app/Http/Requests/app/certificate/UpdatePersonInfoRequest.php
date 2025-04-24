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
            'id' => 'required',
            'full_name' => 'required',
            'father_name' => 'required',
            'date_of_birth' => 'required',
            'passport_number' => 'required',
            'gender_id' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'nationality_id' => 'required',
        ];
    }
}
