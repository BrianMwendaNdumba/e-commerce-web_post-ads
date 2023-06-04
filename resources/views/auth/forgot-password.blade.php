@php
    $title = 'Forgot Password - Buy and Sell online for free with Kahustle.com Classifieds Ads';
@endphp

<x-app-layout :title="$title">

    <div class="loginArea login_section">
        <div class="container">

            <div class="login-Wrapper">

                <div class="heading_title forgot_password_text">
                    <h1>Password Reset</h1>
                    <p>Forgot your password? No problem. Enter your email address to get a
                        password reset link</p>
                    <x-auth-session-status :status="session('status')" />
                </div>

                <form class="row" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="col-md-12">
                        <label class="infoTitle" id="email">Email* </label>
                        <x-basic-input required autofocus autocomplete="email" :name="__('email')" :type="__('email')"
                            :placeholder="__('Your email address')" />
                    </div>

                    <div class="col-sm-12">

                        <div class="btn-wrapper text-center mt-10">
                            <button type="submit" class="cmn-btn4 w-100 mb-30">Submit</button>
                        </div>

                    </div>
                </form>

            </div>

        </div>

    </div>


</x-app-layout>
