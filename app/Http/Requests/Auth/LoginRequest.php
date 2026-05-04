<?php

namespace App\Http\Requests\Auth;

use App\ApiResponse;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
    use ApiResponse;

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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('errors.Email Required'),
            'email.email' => __('errors.Email Email'),
            'password.required' => __('errors.Password Required'),
            'password.min' => __('errors.Password Min', ['min' => 8]),
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->errorValidation($validator->errors()));
    }
}
