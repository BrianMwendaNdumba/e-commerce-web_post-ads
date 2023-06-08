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
        $category = $this->input('category_id');

        $descriptionMax = ($category == 1) ? 2000 : (($category == 5) ? 3500 : 1024);

        return [
            'category_id' => ['required', 'string', 'max:2'],
            'title' => ['required', 'string', 'max:80'],
            'condition' => ['nullable', 'string', 'max:30'],
            'mileage' => ['nullable', 'string', 'max:255'],
            'engine' => ['nullable', 'string', 'max:30'],
            'price' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:' . $descriptionMax],
            'is_negotiable' => ['nullable', 'string', 'max:1'],
            'images' => ['nullable', 'array', 'max:5'],
            'preloaded' => ['nullable'],
            'images.*' => 'nullable|mimes:jpg,jpeg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'description.max' => 'The :attribute may not exceed :max characters for the selected category.',
        ];
    }
}
