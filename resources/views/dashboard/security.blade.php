@php
    $title = 'Security - Buy and Sell online for free with Kahustle.com Classifieds Ads';
@endphp

<x-app-layout :title="$title">

    <main>

        <div class="myAccout section-padding2 myaccount_section_padding">
            <div class="container">
                <div class="row">

                    <x-dashboard-sidebar />

                    <div class="col-xxl-9 col-xl-9 col-lg-8 col-md-7">

                        <x-dashboard-breadcrumbs />

                        <div class="mt-20 mb-20">
                            @if (session()->has('success'))
                                <div class="status_success">
                                    <h4><i class="las la-check-circle icon"></i> Success!</h4>
                                    <p>{{ session()->get('success') }}</p>
                                </div>
                            @endif

                            @if (session()->has('error'))
                                <div class="status_error">
                                    <h4><i class="las la-exclamation-circle icon"></i> Error!</h4>
                                    <p>{{ session()->get('success') }}</p>
                                </div>
                            @endif
                        </div>

                        <div class="pt-10 pb-10">
                            <div class="pt-20 pb-10">
                                <h6 class="fw-bold">Update Password</h6>
                                <p>Ensure your account is using a long, random password to stay secure.</p>
                            </div>

                            <div class="listingDetails-Wrapper">

                                <form method="POST" action="{{ route('password.update') }}" class="listingDetails">
                                    @csrf
                                    @method('put')

                                    <div class="row">
                                        <div class="col-lg-8">
                                            <label class="infoTitle" id="current_password">Current Password</label>
                                            <x-basic-input required autocomplete="current-password" :name="__('current_password')"
                                                :type="__('password')" :placeholder="__('Your password')" />
                                        </div>

                                        <div class="col-lg-8">
                                            <label class="infoTitle" id="password">New Password</label>
                                            <x-basic-input required autocomplete="new-password" :name="__('password')"
                                                :type="__('password')" :placeholder="__('Your new password')" />
                                        </div>

                                        <div class="col-lg-8">
                                            <label class="infoTitle" id="password_confirmation">Confirm New
                                                Password</label>
                                            <x-basic-input required autocomplete="new-password" :name="__('password_confirmation')"
                                                :type="__('password')" :placeholder="__('Confirm your new password')" />
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="btn-wrapper">
                                                <button type="submit"
                                                    class="custom_button_one btn_size_large trasition_medium">Save</button>
                                            </div>
                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>

</x-app-layout>
