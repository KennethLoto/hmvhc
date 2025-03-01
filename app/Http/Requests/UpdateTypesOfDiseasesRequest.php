<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypesOfDiseasesRequest extends FormRequest
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
            'nameOfDisease' => 'required|string|max:255',
            'shortDescription' => 'required|string|max:255',
            'category' => 'nullable|string|min:3',
            'new_category' => 'nullable|string|min:3',
        ];
    }
}
