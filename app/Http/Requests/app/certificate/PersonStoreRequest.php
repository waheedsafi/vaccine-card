<?php

namespace App\Http\Requests\app\certificate;

use Illuminate\Foundation\Http\FormRequest;

class PersonStoreRequest extends FormRequest
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

    public function rules()
    {
        return [
            'district_id' => 'required|integer',
            'province_id' => 'required|integer',
            'area' => 'required|string',
            'passport_number' => 'required|string|unique:people,passport_number',
            'full_name' => 'required|string',
            'father_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'phone' => 'required|string',
            'gender_id' => 'required|in:1,2',
            'nationality_id' => 'required|integer',
            'vaccines' => 'required|array',
            'vaccines.*.registration_date' => 'required|date',
            'vaccines.*.volume' => 'required|string',
            'vaccines.*.page' => 'required|string',
            'vaccines.*.vaccine_center_id' => 'required|integer|exists:vaccine_centers,id',
            'vaccines.*.vaccine_type_id' => 'required|integer|exists:vaccine_types,id',
            'vaccines.*.doses' => 'required|array',
            'vaccines.*.doses.*.batch_number' => 'required|string',
            'vaccines.*.doses.*.vaccine_date' => 'required|date',
        ];
    }
}
