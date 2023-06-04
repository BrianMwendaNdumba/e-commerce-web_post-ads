@php
    $title = 'Register - Buy and Sell online for free with Kahustle.com Classifieds Ads';
@endphp

<x-app-layout :title="$title">

    <main>

        <div class="loginArea login_section">
            <div class="container">

                <div class="login-Wrapper">

                    <div class="heading_title">
                        <h1>Create An Account</h1>
                        <p>To get started, please create an account by filling out the form below. Once you've
                            registered, you'll be able to post your own ads, save your favorite listings, and much more.
                        </p>
                    </div>

                    <form class="row" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="col-md-12">
                            <label class="infoTitle" id="email">Email* </label>
                            <x-basic-input required autofocus autocomplete="email" :name="__('email')" :type="__('email')"
                                :placeholder="__('Your email address')" />
                        </div>

                        <div class="col-md-12">
                            <label class="infoTitle" id="name">Your Name</label>
                            <x-basic-input required autocomplete="name" :name="__('name')" :placeholder="__('Your full name')" />
                        </div>

                        <div class="col-md-12">
                            <label class="infoTitle" id="phone_number">Phone Number</label>
                            <x-basic-input required autocomplete="tel" :name="__('phone_number')" :type="__('tel')"
                                :placeholder="__('Your phone number')" />
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

                            <p class="terms_register mb-10">By continuing, you agree to our <a href=""
                                    class="link_underline">Terms and
                                    conditions</a></p>

                            <div class="btn-wrapper text-center">
                                <button type="submit" class="cmn-btn4 w-100 mb-30">Register</button>
                                <p class="sinUp"><span>Already have an account?</span><a href="{{ route('login') }}"
                                        class="singApp">Login Here</a></p>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </main>

</x-app-layout>
