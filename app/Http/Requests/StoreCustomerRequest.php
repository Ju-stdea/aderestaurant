<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use App\Models\Customer;

class StoreCustomerRequest extends FormRequest
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
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'mobile' => 'nullable|regex:/^[0-9]{10,15}$/|unique:users,mobile',
            'country' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:50',
            'pincode' => 'nullable|regex:/^[0-9]{5,10}$/',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Customer::class],
            'password' => ['required', 'confirmed', 'min:6', Rules\Password::defaults()],
        ];
    }
}
