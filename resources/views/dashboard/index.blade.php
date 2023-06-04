@php
    $myAds = $ads;
    $title = 'Your Account - Buy and Sell online for free with Kahustle.com Classifieds Ads';
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

                        <div class="accountWrapper mt-20 mb-24">

                            <div class="userProfile mb-24">

                                @if (Auth::user()->getFirstMediaUrl('profile_image'))
                                    <div class="recentImg">
                                        <img style="max-width:70px;"
                                            src="{{ Auth::user()->getFirstMediaUrl('profile_image') }}"
                                            alt="user avatar">
                                    </div>
                                @else
                                    <div class="recentImg">
                                        <img style="max-width:70px;" src="/assets/img/gallery/avatar.jpg"
                                            alt="user avatar">
                                    </div>
                                @endif

                                <div class="recentCaption">
                                    <div class="cap">
                                        <h5><a href="#" class="featureTittle">{{ Auth::user()->name }}</a></h5>
                                        <p class="featureCap">Member since
                                            {{ date('M Y', strtotime(Auth::user()->created_at)) }}
                                        </p>
                                    </div>
                                    <div class="btn-wrapper">
                                        <a href="{{ route('dashboard.profile') }}"
                                            class="custom_button_one btn_size_medium trasition_medium">Edit
                                            Profile</a>
                                    </div>
                                </div>
                            </div>

                            <div class="infoSingle">
                                <ul class="listing">
                                    <li class="listItem"><i class="las la-map-marker-alt icon"></i>
                                        @if (Auth::user()->location)
                                            {{ Auth::user()->location }}
                                        @else
                                            Location Not Set
                                        @endif
                                    </li>
                                    <li class="listItem"><i class="lar la-envelope-open icon"></i><a
                                            href="#">{{ Auth::user()->email }}</a>
                                    </li>
                                    <li class="listItem"><i
                                            class="las la-phone icon"></i>{{ Auth::user()->phone_number }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="myListing">

                            @foreach ($listings as $listing)
                                <div class="singleFlexitem mb-24 wow fadeInUp social">
                                    <div class="listCap">
                                        <div class="recentImg">
                                            <img style="width: 255px; height:206px; object-fit: cover;"
                                                src="{{ $listing->getFirstMediaUrl('listings') }}" alt="images">
                                        </div>
                                        <div class="recentCaption">
                                            <h5><a href="{{ route('listing.show', ['slug' => $listing->slug]) }}"
                                                    class="featureTittle">{{ $listing['title'] }}</a>
                                            </h5>

                                            </p>
                                            @if ($listing->user->location)
                                                <p class="featureCap">{{ $listing->user->location }} · <strong
                                                        class="subCap">{{ $listing->updated_at->diffForHumans(['parts' => 1]) }}</strong>
                                                @else
                                                <p class="featureCap">Location Not Set · <strong
                                                        class="subCap">{{ $listing->updated_at->diffForHumans(['parts' => 1]) }}</strong>
                                            @endif
                                            <span class="featurePricing">Ksh
                                                {{ number_format($listing['price']) }}</span>
                                            <div class="btn-wrapper">
                                                <span class="latest_badge">Latest</span>
                                                <span class="premium_badge">Trending</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper mb-20">
                                        <a href="{{ route('dashboard.edit', ['slug' => $listing->slug]) }}"
                                            class="custom_button_one btn_size_medium trasition_medium"><i
                                                class="lar la-edit"></i> Edit</a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>

</x-app-layout>
