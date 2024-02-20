<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            // 'contact' => 'required',
            // 'email' => 'required',
            // 'gender' => 'required',
            // 'year' => 'required',
            // 'month' => 'required',
            // 'date' => 'required',
            // 'street_no' => 'required',
            // 'street_address' => 'required',
            // 'city' => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'contact' => 'required|numeric',
            'email' => 'required|email|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'year' => 'required|numeric|min:1900',
            'month' => 'required|numeric|between:1,12',
            'date' => 'required|numeric|between:1,31',
            'street_no' => 'required|numeric',
            'street_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'contact' => 'Contact Number',
            'email' => 'E-Mail',
            'gender' => 'Gender',
            'year' => 'Year',
            'month' => 'Month',
            'date' => 'Date',
            'street_no' => 'Street No',
            'street_address' => 'Street Address',
            'city' => 'City',
        ];
    }
}
