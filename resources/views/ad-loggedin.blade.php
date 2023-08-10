@php
    $title = $listing->title . ' - Buy and Sell online for free with Kahustle.com Classifieds Ads';
@endphp

<x-app-layout :title="$title">

    <main>

        <div class="proDetails pt-40">

            <div class="container">

                {{-- breadcrumbs --}}
                <div class="row mb-40">
                    <div class="col-sm-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('ads') }}">ads</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('listing.show', ['slug' => $listing->slug]) }}">{{ $listing->title }}</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                {{-- breadcrumbs --}}

                <div class="row">
                    <div class="col-xl-7 col-lg-12">
                        {{-- ad gallery --}}
                        <div class="product-view-wrap" id="myTabContent">
                            <div class="shop-details-gallery-slider global-slick-init slider-inner-margin sliderArrow"
                                data-asnavfor=".shop-details-gallery-nav" data-infinite="true" data-arrows="true"
                                data-dots="false" data-slidestoshow="1" data-swipetoslide="false" data-fade="true"
                                data-autoplay="false" data-autoplayspeed="2500"
                                data-prevarrow="<div class=&quot;prev-icon&quot;><i class=&quot;las la-angle-left&quot;></i></div>"
                                data-nextarrow="<div class=&quot;next-icon&quot;><i class=&quot;las la-angle-right&quot;></i></div>"
                                data-responsive="[{&quot;breakpoint&quot;: 1800,&quot;settings&quot;: {&quot;slidesToShow&quot;: 1}},{&quot;breakpoint&quot;: 1600,&quot;settings&quot;: {&quot;slidesToShow&quot;: 1}},{&quot;breakpoint&quot;: 1400,&quot;settings&quot;: {&quot;slidesToShow&quot;: 1}},{&quot;breakpoint&quot;: 1200,&quot;settings&quot;: {&quot;slidesToShow&quot;: 1}},{&quot;breakpoint&quot;: 991,&quot;settings&quot;: {&quot;slidesToShow&quot;: 1}},{&quot;breakpoint&quot;: 768, &quot;settings&quot;: {&quot;slidesToShow&quot;: 1}},{&quot;breakpoint&quot;: 576, &quot;settings&quot;: {&quot;slidesToShow&quot;: 1}}]">

                                @foreach ($listing->getMedia('listings') as $image)
                                    <div class="single-main-image">
                                        <a class="long-img">
                                            <img src="{{ $image->getUrl() }}" class="img-fluid" alt="image"
                                                style="height: 100%; width: 100%; object-fit: cover">
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            <div class="thumb-wrap">
                                <div class="shop-details-gallery-nav global-slick-init slider-inner-margin sliderArrow"
                                    data-asnavfor=".shop-details-gallery-slider" data-focusonselect="true"
                                    data-infinite="true" data-arrows="false" data-dots="false" data-slidestoshow="6"
                                    data-swipetoslide="true" data-autoplay="false" data-autoplayspeed="2500"
                                    data-prevarrow="<div class=&quot;prev-icon&quot;><i class=&quot;las la-angle-left&quot;></i></div>"
                                    data-nextarrow="<div class=&quot;next-icon&quot;><i class=&quot;las la-angle-right&quot;></i></div>"
                                    data-responsive="[{&quot;breakpoint&quot;: 1800,&quot;settings&quot;: {&quot;slidesToShow&quot;: 6}},{&quot;breakpoint&quot;: 1600,&quot;settings&quot;: {&quot;slidesToShow&quot;: 6}},{&quot;breakpoint&quot;: 1400,&quot;settings&quot;: {&quot;slidesToShow&quot;: 6}},{&quot;breakpoint&quot;: 1200,&quot;settings&quot;: {&quot;slidesToShow&quot;: 6}},{&quot;breakpoint&quot;: 991,&quot;settings&quot;: {&quot;slidesToShow&quot;: 6}},{&quot;breakpoint&quot;: 768, &quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 576, &quot;settings&quot;: {&quot;slidesToShow&quot;: 4}}]">

                                    @foreach ($listing->getMedia('listings') as $image)
                                        <div class="single-thumb">
                                            <a class="thumb-link" data-toggle="tab">
                                                <img src="{{ $image->getUrl() }}" alt="thumb"
                                                    style="width: auto; height: 5rem; margin-top: 1rem">
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        {{-- ad gallery --}}

                        {{-- ad description --}}
                        <div class="proDescription">
                            @auth
                                <form action="{{ route('favourite.form') }}" method="POST"
                                    class="descriptionTop favouritesForm">
                                    @csrf

                                    @php
                                        $is_liked = $listing->favourite->where('user_id', auth()->user()->id)->contains('listing_id', $listing->id) ? true : false;
                                    @endphp

                                    <h4><a class="detailsTittle">{{ $listing->title }}
                                            <i id="fav_icon" @class(['lar la-heart icon fav_icon', 'liked' => $is_liked])></i>
                                        </a>
                                    </h4>
                                    <input type="hidden" name="favourite" value="{{ $listing->slug }}">
                                    <p style="margin-bottom: 0;" class="detailsCap">Posted on
                                        {{ date('jS M Y', strtotime($listing->created_at)) }}
                                    </p>
                                    @if ($listing->condition)
                                        <p style="margin-bottom: 0;" class="detailsCap">Listed as
                                            {{ $listing->condition }}
                                        </p>
                                    @endif
                                    <p style="margin-bottom: 20px;" class="detailsCap">Category:
                                        {{ $categories->find($listing->category_id)->title }}
                                    </p>
                                    <span class="detailsPricing">Ksh {{ number_format($listing->price) }} <span
                                            style="font-size: 13px; color: #667085;">Negotiable</span></span>
                                    <div class="infoSingle">
                                        <ul class="listing">
                                            <li class="listItem"><i class="las la-user icon"></i>By
                                                {{ $listing->user->name }}
                                            </li>
                                            @if ($listing->user->location)
                                                <li class="listItem"><i class="las la-map-marker-alt icon"></i>
                                                    {{ $listing->user->location }}
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </form>
                            @endauth

                            @guest
                                <div class="descriptionTop favouritesForm">

                                    <h4><a href="{{ route('register') }}" class="detailsTittle">{{ $listing->title }}
                                            <i class="lar la-heart icon fav_icon"></i>
                                        </a>
                                    </h4>
                                    <p class="detailsCap">Posted on {{ date('jS M Y', strtotime($listing->created_at)) }}
                                    </p>
                                    <span class="detailsPricing">Ksh {{ $listing->price }}</span>
                                    <div class="infoSingle">
                                        <ul class="listing">
                                            <li class="listItem"><i class="las la-user icon"></i>{{ $listing->user->name }}
                                            </li>
                                            @if ($listing->user->location)
                                                <li class="listItem"><i class="las la-map-marker-alt icon"></i>
                                                    {{ $listing->user->location }}
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    </form>
                                @endguest

                                <div class="descriptionMid">
                                    <div>
                                        {{ Str::of($listing->description)->toHtmlString() }}
                                    </div>
                                </div>

                                <div class="descriptionFooter">
                                    <div class="reviews_wrapper mb-40">
                                        <h6 style="font-weight: 600;" class="p-0 mb-10">Reviews</h6>

                                        @forelse ($reviews->take(-3) as $review)
                                            <div class="section-tittle mb-20">
                                                <h6 style="font-size: 15px;" class="p-0">{{ $review->message }}</h6>
                                                <p style="font-size: 13px;">
                                                    {{ $review->user->name }}
                                                </p>
                                            </div>
                                        @empty
                                            <div class="section-tittle mb-10">
                                                <h6 style="font-size: 15px;" class="p-0">There are no reviews</h6>
                                                <p style="font-size: 13px;">Be the first one to write a review</p>
                                            </div>
                                        @endforelse

                                    </div>
                                </div>

                                <div class="descriptionFooter">
                                    <div class="review_form_wrapper w-100 mb-40">
                                        <form method="POST" action="{{ route('review.form') }}">
                                            @csrf
                                            <input type="hidden" name="listing" value="{{ $listing->slug }}">

                                            <label class="infoTitle" id="message">Write a review</label>
                                            <textarea class="review_textarea" required style="border: 1px solid #afafaf!important; color: black;" name="message"
                                                id="message" placeholder="Your review"></textarea>
                                            <button type="submit"
                                                class="custom_button_one btn_size_medium trasition_medium">Submit</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="descriptionFooter">
                                    <div class="btn-wrapper">
                                        <a href="{{ route('report', ['slug' => $listing->slug]) }}"
                                            class="btn_danger">
                                            <i class="lab la-font-awesome-flag"></i>Report</a>
                                    </div>
                                    <div style="margin-top: 1rem; display: flex; justify-content: center;"
                                        class="social-btn-sp">
                                        {!! Share::page(url('listing.show', ['slug' => $listing->slug]))->facebook()->whatsapp() !!}
                                    </div>
                                    {{-- <div class="socialWrap">
                                    <a href="#" class="social"><i class="lab la-facebook-square"></i></a>
                                    <a href="#" class="social"><i class="lab la-twitter"></i></a>
                                    <a href="#" class="social"><i class="lab la-linkedin"></i></a>
                                    <a href="#" class="social"><i class="lar la-bell"></i></a>
                                </div> --}}
                                </div>
                            </div>
                            {{-- ad description --}}
                        </div>

                        {{-- ad sidebar --}}
                        <div class="col-xl-5 col-lg-12">
                            {{-- seller info --}}
                            <div class="sellerMessage mb-24">
                                <div class="singleFlexitem mb-24">

                                    @if ($listing->user->avatar)
                                        <div class="recentImg">
                                            <img style="max-width:70px;" src="{{ $listing->user->avatar }}"
                                                alt="images">
                                        </div>
                                    @else
                                        <div class="recentImg">
                                            <img style="max-width:70px;"
                                                src="{{ asset('assets/img/gallery/avatar.jpg') }}" alt="images">
                                        </div>
                                    @endif

                                    <div class="recentCaption">
                                        <h5><a class="featureTittle">{{ $listing->user->name }}</a>
                                        </h5>
                                        <p class="featureCap">Member since
                                            {{ date('M Y', strtotime($listing->user->created_at)) }}
                                        </p>
                                    </div>
                                </div>
                                <form action="#" class="contactSeller">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="input-form">
                                                <input type="text" class="fake_contact" placeholder="07 ********">
                                                <input type="text" class="real_contact"
                                                    placeholder="{{ $listing->user->phone_number }}">

                                                <div class="icon"><i class="las la-phone"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="btn-wrapper mb-20">
                                                <a class="btn_alt w-100 reveal_button">Reveal Contact</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="btn-wrapper">
                                    <a href="tel:{{ $listing->user->phone_number }}" class="btn_main w-100"><i
                                            class="las la-phone"></i>Call
                                        seller</a>
                                </div>
                            </div>
                            {{-- seller info --}}

                            {{-- related --}}
                            <section class="recentListing">
                                @foreach ($listings->take(-5) as $listing)
                                    <div class="borderStyle style1 wow fadeInLeft social"
                                        data-wow-delay="0.{{ $loop->iteration }}s">
                                        <div class="singleFlexitem mb-24">
                                            <div class="recentImg">
                                                <img style="width: 255px; height:206px; object-fit: cover;"
                                                    src="{{ $listing->getFirstMediaUrl('listings') }}"
                                                    alt="images">
                                            </div>
                                            <div class="recentCaption">
                                                <h5><a href="{{ route('listing.show', ['slug' => $listing->slug]) }}"
                                                        class="featureTittle">{{ $listing->title }}</a></h5>
                                                @if ($listing->user->location)
                                                    <p class="featureCap">{{ $listing->user->location }} · <strong
                                                            class="subCap">{{ $listing->updated_at->diffForHumans(['parts' => 1]) }}</strong>
                                                    </p>
                                                @else
                                                    <p class="featureCap">&nbsp; · <strong
                                                            class="subCap">{{ $listing->updated_at->diffForHumans(['parts' => 1]) }}</strong>
                                                    </p>
                                                @endif
                                                <span class="featurePricing">Ksh
                                                    {{ number_format($listing->price) }}</span>
                                                <div class="btn-wrapper">
                                                    <span class="latest_badge">Latest</span>
                                                    <span class="premium_badge">Trending</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </section>
                            {{-- related --}}

                        </div>
                        {{-- ad sidebar --}}
                    </div>
                </div>
            </div>

    </main>

    <x-slot name="scripts">
        @vite(['resources/js/reveal.js'])
    </x-slot>

</x-app-layout>
