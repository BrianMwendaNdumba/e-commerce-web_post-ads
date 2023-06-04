@php
    $title = 'Your Favourite Ads - Buy and Sell online for free with Kahustle.com Classifieds Ads';
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

                        <div class="promoteAds mt-20">

                            @forelse ($favourites as $favourite)
                                <div class="singlePromoteAds mb-24  wow fadeInUp social"
                                    data-wow-delay="0.{{ $loop->iteration }}s">
                                    <div class="asadshhf">
                                        <div class="adsImg">
                                            <img src="{{ $favourite->listing->getFirstMediaUrl('listings') }}"
                                                alt="images">
                                        </div>
                                        <div class="adsCaption">
                                            <h5><a href="{{ route('listing.show', ['slug' => $favourite->listing->slug]) }}"
                                                    class="adsTittle">{{ $favourite->listing->title }}</a>
                                            </h5>
                                            <p class="adsPera"><strong
                                                    class="subCap">{{ $favourite->listing->updated_at->diffForHumans(['parts' => 1]) }}</strong>
                                                <span class="adsPricing">Ksh {{ $favourite->listing->price }}</span>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper mb-20">
                                        <a href="{{ route('listing.show', ['slug' => $favourite->listing->slug]) }}"
                                            class="cmn-btn-outline5"><i class="las la-eye icon"></i>View</a>
                                    </div>
                                </div>
                            @empty
                                <div class="singlePromoteAds mb-24  wow fadeInUp social" data-wow-delay="0.0s">
                                    <div class="asadshhf">
                                        <div class="adsCaption">
                                            <h5>You haven't liked any ads yet
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforelse



                        </div>

                    </div>


                </div>
            </div>
        </div>

    </main>

</x-app-layout>
