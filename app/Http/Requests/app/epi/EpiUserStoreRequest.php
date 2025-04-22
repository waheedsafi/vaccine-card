<?php

namespace App\Http\Requests\app\epi;

use Illuminate\Foundation\Http\FormRequest;

class EpiUserStoreRequest extends FormRequest
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
            "full_name" => ['required', "string", "min:3", "max:45"],
            "username" => ['required', "string", "min:3", "max:45"],
            "email" => ["required", "email"],
            "password" => ["required", "string", "min:8", "max:25"],
            "job_id" => ["required", 'exists:model_jobs,id'],
            "destination_id" => ["required", 'exists:destinations,id'],
            "gender_id" => ["required", 'exists:genders,id'],
            "province_id" => ["required", 'exists:provinces,id'],
            "status" => ["required"],
        ];
    }
}
