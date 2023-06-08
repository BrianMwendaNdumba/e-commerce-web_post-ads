<?php

namespace App\Http\Requests;

use App\Rules\ImageFilterRule;
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
        $category = $this->input('category_id');

        return [
            'category_id' => ['required', 'string', 'max:2'],
            'title' => ['required', 'string', 'max:80'],
            'condition' => ['nullable', 'string', 'max:30'],
            'mileage' => ['nullable', 'string', 'max:255'],
            'engine' => ['nullable', 'string', 'max:30'],
            'price' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'description' => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($category) {
                    $maxCharacters = ($category == 1) ? 2000 : (($category == 5) ? 3500 : 1024);
                    if (strlen($value) > $maxCharacters) {
                        $fail("The $attribute may not exceed $maxCharacters characters for the selected category.");
                    }
                },
            ],
            'is_negotiable' => ['nullable', 'string', 'max:1'],
            'images' => ['required', 'array', 'max:5'],
        ];
    }

    public function messages()
    {
        return [
            'images.max' => 'Max number of images is 5',
            'images.*.mimes' => 'Profile Photo must be .jpg, or .jpeg',
            'images.*.max' => 'Profile Photo must 2MB or less',
            'images' => 'Please upload images for your ad',
            'category_id' => 'Please select a category'
        ];
    }
}
