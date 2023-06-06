<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListingStoreRequest extends FormRequest
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
            'location' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1024'],
            'is_negotiable' => ['nullable', 'string', 'max:1'],
            'images' => ['required', 'array', 'max:10'],
            'images.*' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'images.max' => 'Max number of images is 10',
            'images.*.mimes' => 'Profile Photo must be .jpg, .jpeg or .png',
            'images.*.max' => 'Profile Photo must 2MB or less',
            'images' => 'Please upload images for your ad',
            'category_id' => 'Please select a category'
        ];
    }
}
