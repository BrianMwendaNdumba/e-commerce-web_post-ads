@php
    $title = 'Reset password - Buy and Sell online for free with Kahustle.com Classifieds Ads';
@endphp

<x-app-layout :title="$title">

    <div class="loginArea login_section">
        <div class="container">

            <div class="login-Wrapper">

                <div class="heading_title">
                    <h1>Password Reset</h1>
                    <p>Please enter your new password</p>
                </div>

                <form class="row" method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <input type="hidden" class="d-none" name="token" value="{{ $request->route('token') }}">

                    <div class="col-md-12">
                        <label class="infoTitle" id="email">Email* </label>
                        <x-basic-input required value="{{ old('email', $request->email) }}" autofocus
                            autocomplete="email" :name="__('email')" :type="__('email')" :placeholder="__('Your email address')" />
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <label class="infoTitle" id="password">Password</label>
                        <x-basic-input required autocomplete="new-password" :name="__('password')" :type="__('password')"
                            :placeholder="__('Your password')" />
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <label class="infoTitle" id="password_confirmation">Confirm Password</label>
                        <x-basic-input required autocomplete="new-password" :name="__('password_confirmation')" :type="__('password')"
                            :placeholder="__('Confirm your password')" />
                    </div>

                    <div class="col-sm-12">

                        <div class="btn-wrapper text-center mt-10">
                            <button type="submit" class="cmn-btn4 w-100 mb-30">Reset Password</button>
                        </div>

                    </div>
                </form>

            </div>

        </div>

    </div>

</x-app-layout>
