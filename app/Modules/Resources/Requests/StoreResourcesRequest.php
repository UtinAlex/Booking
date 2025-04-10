<?php

namespace App\Modules\Resources\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResourcesRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        if ($this->isJson()) {
            $response = response()->json($validator->errors(), 422);
            throw new \Illuminate\Validation\ValidationException($validator, $response);
        }
        
        parent::failedValidation($validator);
    }
}
