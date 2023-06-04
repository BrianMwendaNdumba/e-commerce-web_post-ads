@php
    $title = 'Profile - Buy and Sell online for free with Kahustle.com Classifieds Ads';
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
                                <h6 class="fw-bold">Profile Information</h6>
                                <p>Update your account's profile information.</p>
                            </div>

                            <div class="listingDetails-Wrapper">
                                {{-- email revalidation not enabled for now --}}
                                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                    @csrf
                                </form>

                                <form method="POST" action="{{ route('profile.update') }}" class="listingDetails"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="row">

                                        <div class="col-lg-8 mb-20">
                                            <label class="infoTitle" id="profile_image">Profile Image</label>
                                            @if ($user->getFirstMediaUrl('profile_image'))
                                                <div class="recentImg mb-20">
                                                    <img style="max-width:75px;border-radius:12px"
                                                        src="{{ $user->getFirstMediaUrl('profile_image') }}"
                                                        alt="user avatar">
                                                </div>
                                            @else
                                                <div class="recentImg mb-20">
                                                    <img style="max-width:75px;border-radius:12px"
                                                        src="/assets/img/gallery/avatar.jpg" alt="user avatar">
                                                </div>
                                            @endif
                                            <input type="file" name="profile_image" id="profile_image"
                                                accept="image/png, image/jpeg">
                                        </div>

                                        <div class="col-lg-8">
                                            <label class="infoTitle" id="title">Name</label>
                                            <x-basic-input required value="{{ $user->name }}" :name="__('name')"
                                                :placeholder="__('Full Name')" />
                                        </div>

                                        <div class="col-lg-8">
                                            <label class="infoTitle" id="email">Email</label>
                                            <x-basic-input required :name="__('email')" value="{{ $user->email }}"
                                                :placeholder="__('Email address')" :type="__('email')" />
                                        </div>

                                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                            <div>
                                                <p>
                                                    {{ __('Your email address is unverified.') }}
                                                    <button form="send-verification">
                                                        {{ __('Click here to re-send the verification email.') }}
                                                    </button>
                                                </p>

                                                @if (session('status') === 'verification-link-sent')
                                                    <p>
                                                        {{ __('A new verification link has been sent to your email address.') }}
                                                    </p>
                                                @endif
                                            </div>
                                        @endif

                                        <div class="col-lg-8">
                                            <label class="infoTitle" id="location">Location</label>
                                            <x-basic-input required :name="__('location')" value="{{ $user->location }}"
                                                :placeholder="__('Your location')" />
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
