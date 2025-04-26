<?php

namespace App\Http\Requests\app\certificate;

use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;

class PersonStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    public function prepareForValidation()
    {
        if ($this->has('vaccines') && is_string($this->vaccines)) {
            $decodedVaccines = json_decode($this->vaccines, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                Log::error('Invalid JSON in vaccines field', ['vaccines' => $this->vaccines]);
            } else {
                // Flatten the doses array inside each vaccine
                foreach ($decodedVaccines as &$vaccine) {
                    if (isset($vaccine['doses']) && is_array($vaccine['doses'])) {
                        // Flatten if nested like [[{...}]]
                        $flattened = [];
                        foreach ($vaccine['doses'] as $doseGroup) {
                            if (is_array($doseGroup)) {
                                $flattened = array_merge($flattened, $doseGroup);
                            }
                        }
                        $vaccine['doses'] = $flattened;
                    }
                }

                $this->merge([
                    'vaccines' => $decodedVaccines,
                ]);
            }
        }
    }

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
            'passport_number' => 'required|string|unique:people,passport_number',
            'full_name' => 'required|string',
            'father_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender_id' => 'required|in:1,2',
            'nationality_id' => 'required|integer',
            'travel_type_id' => 'required|integer',
            'destina_country_id' => 'required|integer',

            'vaccines' => 'required|array',
            'vaccines.*.registration_number' => 'required|string',
            'vaccines.*.registration_date' => 'required|date',
            'vaccines.*.volume' => 'required|string',
            'vaccines.*.page' => 'required|string',
            'vaccines.*.vaccine_center_id' => 'required|integer|exists:vaccine_centers,id',
            'vaccines.*.vaccine_type_id' => 'required|integer|exists:vaccine_types,id',

            'vaccines.*.doses' => 'required|array',
            'vaccines.*.doses.*.dose' => 'required|string',
            'vaccines.*.doses.*.batch_number' => 'required|string',
            'vaccines.*.doses.*.vaccine_date' => 'required|date',
            'vaccines.*.doses.*.added_by' => 'required|string', // Assuming you need this field too
        ];
    }
}
