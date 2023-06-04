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
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'location' => ['string', 'max:30'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'profile_image' => ['nullable', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'location' => 'Please choose a shorter name for the location',
            'profile_image.*.mimes' => 'Profile Photo must be .jpg, .jpeg or .png',
            'profile_image.*.max' => 'Profile Photo must 2MB or less',
        ];
    }
}
