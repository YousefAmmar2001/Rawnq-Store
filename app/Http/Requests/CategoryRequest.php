<?php

namespace App\Http\Requests;

use App\Rules\Filter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route('category')->id ?? null;
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('categories', 'name')->ignore($id),
                // function ($attribute, $value, $fails) {
                //     if (strtolower($value) == 'admin') {
                //         $fails('This name is forbidden!');
                //     }
                // },
                // new Filter(['user', 'admin', 'test', 'forbidden']),
                'filter:user,admin,test,forbidden',
            ],
            'parent_id' => 'nullable|integer|exists:categories,id',
            'description' => 'nullable|string|min:3',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048|dimensions:min_width=100,min_height=100',
            'status' => 'required|in:active,archived',
        ];
    }
}
