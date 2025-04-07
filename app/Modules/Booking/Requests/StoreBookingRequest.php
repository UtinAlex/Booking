<?php

namespace App\Modules\Booking\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookingRequest extends FormRequest
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
            'userId' => 'required|integer|exists:users,id',
            'resourcesId' => 'required|integer|exists:resources,id',
            'startTime' => 'required|string|max:255|date_format:Y-m-d\TH:i:sP|after:now',
            'endTime' => 'required|string|max:255|date_format:Y-m-d\TH:i:sP|after:now',
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
