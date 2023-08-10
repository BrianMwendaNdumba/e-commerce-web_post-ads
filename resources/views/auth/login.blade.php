@php
    $title = 'Login - Buy and Sell online for free with Kahustle.com Classifieds Ads';
@endphp

<x-app-layout :title="$title">

    <div class="loginArea login_section">
        <div class="container">

            <div class="login-Wrapper">

                <div class="heading_title">
                    <h1>Welcome Back</h1>
                    <p>Please enter your login information to access your account</p>
                    <x-auth-session-status :status="session('status')" />
                </div>

                <form class="row" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="col-md-12">
                        <label class="infoTitle" id="email">Email* </label>
                        <x-basic-input required autofocus autocomplete="email" :name="__('email')" :type="__('email')"
                            :placeholder="__('Your email address')" />
                    </div>

                    <div class="col-md-12">
                        <label class="infoTitle" id="password">Password</label>
                        <x-basic-input required autocomplete="current-password" :name="__('password')" :type="__('password')"
                            :placeholder="__('Your password')" />
                    </div>

                    @if (Route::has('password.request'))
                        <div class="col-md-12">
                            <a class="forgot_password" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    @endif

                    <div class="col-sm-12">

                        <div class="btn-wrapper text-center mt-10">
                            <button type="submit" class="cmn-btn4 w-100 mb-30">Login</button>
                        </div>

                        <input id="remember_me" type="checkbox" checked class="d-none" name="remember">
                    </div>
                </form>

                <div class="row">
                    <p class="mb-20 text-center">Or login with:</p>
                    <div class="social-login-buttons" style="display: flex; justify-content: space-between">
                        <a href="{{ route('auth.social.google.redirect') }}" class="btn"
                            style="background-color: #DB4437; color: #fff; width: 100%">Google</a>
                    </div>
                    <p class="sinUp  text-center mt-4">
                        <span>Don't have an account?</span><a href="{{ route('register') }}" class="singApp">Register
                            Here</a>
                    </p>
                </div>

            </div>

        </div>

    </div>

</x-app-layout>
