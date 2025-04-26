<?php

namespace App\Http\Requests\app\certificate;

use Illuminate\Support\Facades\Log;
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

    public function prepareForValidation(): void
    {
        if ($this->has('vaccines') && is_string($this->vaccines)) {
            $decodedVaccines = json_decode($this->vaccines, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                Log::error('Invalid JSON in vaccines field', ['vaccines' => $this->vaccines]);
                abort(422, 'Invalid JSON format in vaccines.');
            }

            // Optional cleanup: remove unwanted fields
            foreach ($decodedVaccines as &$vaccine) {
                unset($vaccine['id']);

                if (isset($vaccine['doses']) && is_array($vaccine['doses'])) {
                    // Flatten if deeply nested
                    if (isset($vaccine['doses'][0]) && is_array($vaccine['doses'][0]) && isset($vaccine['doses'][0][0])) {
                        $vaccine['doses'] = array_merge(...$vaccine['doses']);
                    }

                    foreach ($vaccine['doses'] as &$dose) {
                        unset($dose['id'], $dose['added_by']);
                    }
                }
            }

            $this->merge([
                'vaccines' => $decodedVaccines,
            ]);
        }
    }


    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'contact' => 'nullable|string|max:50',
            'passport_number' => 'nullable|string|max:50',
            'gender_id' => 'required|integer|exists:genders,id',
            'province_id' => 'required|integer|exists:provinces,id',
            'district_id' => 'required|integer|exists:districts,id',
            'nationality_id' => 'required|integer|exists:nationalities,id',
            'travel_type_id' => 'required|integer|exists:travel_types,id',
            'destina_country_id' => 'required|integer|exists:countries,id',

            'vaccines' => 'required|array|min:1',
            'vaccines.*.vaccine_type_id' => 'required|integer|exists:vaccine_types,id',
            'vaccines.*.registration_number' => 'required|string|max:100',
            'vaccines.*.volume' => 'required|string|max:50',
            'vaccines.*.page' => 'required|string|max:50',
            'vaccines.*.registration_date' => 'required|date',
            'vaccines.*.vaccine_center_id' => 'required|integer|exists:vaccine_centers,id',

            'vaccines.*.doses' => 'required|array|min:1',
            'vaccines.*.doses.*.dose' => 'required|string|max:50',
            'vaccines.*.doses.*.batch_number' => 'required|string|max:50',
            'vaccines.*.doses.*.vaccine_date' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'vaccines.required' => 'Vaccines data is required.',
            'vaccines.*.doses.required' => 'Each vaccine must have at least one dose.',
        ];
    }
}
