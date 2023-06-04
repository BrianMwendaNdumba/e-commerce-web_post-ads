<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListingUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'string', 'max:2'],
            'title' => ['required', 'string', 'max:80'],
            'condition' => ['nullable', 'string', 'max:10'],
            'price' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1024'],
            'is_negotiable' => ['nullable', 'string', 'max:1'],
            'images' => ['nullable', 'array', 'max:10'],
            'preloaded' => ['nullable'],
            'images.*' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
