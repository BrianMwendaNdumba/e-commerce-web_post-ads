<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function profile(Request $request): View
    {
        return view('dashboard.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Display the user's password form.
     */
    public function security(Request $request): View
    {
        return view('dashboard.security', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->safe()->only('profile_image')) {
            $request->user()->clearMediaCollection('profile_image');
            $request->user()->addMedia($request->safe()->only('profile_image')['profile_image'])->toMediaCollection('profile_image');
        }

        $request->user()->save();

        return Redirect::route('dashboard.profile')->with('success', 'Updated successfully');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
