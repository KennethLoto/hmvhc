<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPatientsInfoRequest extends FormRequest
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
            // Personal Information
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'lastName' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:10',

            // Address
            'province' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'street' => 'nullable|string|max:255',

            // Contact Information
            'contactNumber' => 'required|regex:/^9\d{8}$/|digits:9',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->patientsInfo->id,
        ];
    }
}
