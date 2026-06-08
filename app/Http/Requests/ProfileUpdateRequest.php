<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthday' => ['nullable', 'date', 'before:today'],
            'gender' => ['in:male,female'],
            'street_address' => ['nullable'],
            'city' => ['nullable', 'string'],
            'state' => ['nullable', 'string'],
            'postal_code' => ['nullable', 'string'],
            'country' => ['required', 'string', 'size:2'],
            'locale' => ['nullable', 'string', 'size:2'],
        ];
    }
}
