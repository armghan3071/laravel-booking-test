<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
        $method = $this->method();
        if($method === "PUT"){
            return [
                "name" => ['required'],
                "email" => ['required', 'email', Rule::unique('customers', 'email')->ignore($this->customer)],
                "address" => ['required'],
                "city" => ['required'],
                "province" => ['required'],
                "cap" => ['required'],
            ];
        }
        if($method === 'PATCH'){
            return [
                "name" => ['sometimes', 'required'],
                "email" => ['sometimes', 'required', 'email', Rule::unique('customers', 'email')->ignore($this->customer)],
                "address" => ['sometimes', 'required'],
                "city" => ['sometimes', 'required'],
                "province" => ['sometimes', 'required'],
                "cap" => ['sometimes', 'required'],
            ];
        }
    }
}
