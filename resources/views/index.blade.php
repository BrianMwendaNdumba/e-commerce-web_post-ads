<x-app-layout>

    <main>
        {{-- slider area --}}
        <div class="sliderArea heroBlackStyle plr">
            <div class="slider-active">
                <div class="single-slider heroPadding2 d-flex align-items-center">
                    <div class="container-fluid ">
                        <div class="row justify-content-between align-items-start">
                            <div class="col-xxl-6 col-xl-7 col-lg-7 ">
                                <div class="heroCaption">
                                    <h3 class="tittle hero_title" data-animation="fadeInUp" data-delay="0.1s">Buy and
                                        sell
                                        anything <span class="lineBrack">you want</span> </h3>
                                    <p class="pera" data-animation="fadeInUp" data-delay="0.3s">Kenya's most loved and
                                        trusted Free classifieds ads website. Browse through thousands of items near
                                        you.</p>

                                    <div class="btn-wrapper">
                                        <a href="{{ route('dashboard.create') }}"
                                            class="cmn-btn2 mr-15 mb-10 wow fadeInLeft btn_type_1"
                                            data-wow-delay="0.3s">Post Free Ad</a>
                                        <a href="{{ route('ads') }}" class="cmn-btn3 mb-10 wow fadeInRight btn_type_2"
                                            data-wow-delay="0.3s">Browse
                                            Ads</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-5 col-xl-5 col-lg-5">
                                <div class="hero-man d-none d-lg-block">
                                    <img src="/assets/img/hero/hero-man3.png" alt="images" class="tilt-effect "
                                        data-animation="fadeInRight" data-delay="0.2s">

                                    <div class=" shapeHero shapeHero6" data-animation="fadeInRight" data-delay="0.8s">
                                        <img src="/assets/img/hero/heroShape6.png" alt="images" class="heartbeat">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- slider area --}}

        {{-- categories section --}}
        <section class="exploreCategories section-padding">
            <div class="container" style="margin-top: -5rem;">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-7 col-md-10 col-sm-10">
                        <div class="section-tittle text-center mb-50">
                            <h2 class="section_title">Categories</h2>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 ">

                    <div class="col">
                        <div class="singleCategories wow fadeInUp mb-24" data-wow-delay=".2s">
                            <a href="{{ route('category', ['slug' => 'freelance']) }}" class="catThumb">
                                <img src="/assets/img/gallery/explore8.jpg" alt="images">
                            </a>
                            <div class="catCaptions">
                                <h6> <a href="{{ route('category', ['slug' => 'freelance']) }}" class="tittle">
                                        Freelance Services </a> </h6>
                                <p class="pera">12,990 items</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="singleCategories wow fadeInRight mb-24" data-wow-delay=".3s">
                            <a href="{{ route('category', ['slug' => 'properties']) }}" class="catThumb">
                                <img src="/assets/img/gallery/cat_2.jpg" alt="images">
                            </a>
                            <div class="catCaptions">
                                <h6> <a href="{{ route('category', ['slug' => 'properties']) }}" class="tittle">
                                        Properties </a> </h6>
                                <p class="pera">12,990 items</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="singleCategories wow fadeInLeft mb-24" data-wow-delay=".2s">
                            <a href="{{ route('category', ['slug' => 'health-and-beauty']) }}" class="catThumb">
                                <img src="/assets/img/gallery/cat_8.jpg" alt="images">
                            </a>
                            <div class="catCaptions">
                                <h6> <a href="{{ route('category', ['slug' => 'health-and-beauty']) }}" class="tittle">
                                        Health And
                                        Beauty
                                    </a> </h6>
                                <p class="pera">12,990 items</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="singleCategories wow fadeInDown mb-24" data-wow-delay=".2s">
                            <a href="{{ route('category', ['slug' => 'vehicles']) }}" class="catThumb">
                                <img src="/assets/img/gallery/cat_1.jpg" alt="images">
                            </a>
                            <div class="catCaptions">
                                <h6> <a href="{{ route('category', ['slug' => 'vehicles']) }}" class="tittle">
                                        Vehicles </a> </h6>
                                <p class="pera">12,990 items</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="singleCategories wow fadeInRight mb-24" data-wow-delay=".2s">
                            <a href="{{ route('category', ['slug' => 'jobs']) }}" class="catThumb">
                                <img src="/assets/img/gallery/cat_9.jpg" alt="images">
                            </a>
                            <div class="catCaptions">
                                <h6> <a href="{{ route('category', ['slug' => 'jobs']) }}" class="tittle">
                                        Jobs </a> </h6>
                                <p class="pera">12,990 items</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="singleCategories wow fadeInRight mb-24" data-wow-delay=".2s">
                            <a href="{{ route('category', ['slug' => 'fashion']) }}" class="catThumb">
                                <img src="/assets/img/gallery/explore5.jpg" alt="images">
                            </a>
                            <div class="catCaptions">
                                <h6> <a href="{{ route('category', ['slug' => 'fashion']) }}" class="tittle"> Fashion
                                    </a> </h6>
                                <p class="pera">12,990 items</p>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col">
                        <div class="singleCategories wow fadeInRight mb-24" data-wow-delay=".3s">
                            <a href="{{ route('category', ['slug' => 'pets']) }}" class="catThumb">
                                <img src="/assets/img/gallery/explore7.jpg" alt="images">
                            </a>
                            <div class="catCaptions">
                                <h6> <a href="{{ route('category', ['slug' => 'pets']) }}" class="tittle"> Pets </a>
                                </h6>
                                <p class="pera">12,990 items</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="singleCategories wow fadeInLeft mb-24" data-wow-delay=".3s">
                            <a href="{{ route('category', ['slug' => 'services']) }}" class="catThumb">
                                <img src="/assets/img/gallery/explore9.jpg" alt="images">
                            </a>
                            <div class="catCaptions">
                                <h6> <a href="{{ route('category', ['slug' => 'services']) }}"
                                        class="tittle">Services
                                    </a> </h6>
                                <p class="pera">12,990 items</p>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col">
                        <div class="singleCategories wow fadeInLeft mb-24" data-wow-delay=".3s">
                            <a href="{{ route('category', ['slug' => 'sports']) }}" class="catThumb">
                                <img src="/assets/img/gallery/cat_4.jpg" alt="images">
                            </a>
                            <div class="catCaptions">
                                <h6> <a href="{{ route('category', ['slug' => 'sports']) }}" class="tittle"> Sports
                                    </a> </h6>
                                <p class="pera">12,990 items</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="singleCategories wow fadeInLeft mb-24" data-wow-delay=".2s">
                            <a href="{{ route('category', ['slug' => 'gaming']) }}" class="catThumb">
                                <img src="/assets/img/gallery/cat_3.jpg" alt="images">
                            </a>
                            <div class="catCaptions">
                                <h6> <a href="{{ route('category', ['slug' => 'gaming']) }}" class="tittle">
                                        Gaming </a> </h6>
                                <p class="pera">12,990 items</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        {{-- categories section --}}

        {{-- featured ads section --}}
        <section class="featureListing bottom-padding2">
            <div class="container" style="margin-top: -2rem;">
                <div class="row">
                    <div class="col-xl-8 col-lg-7 col-md-10 col-sm-10">
                        <div class="section-tittle mb-50">
                            <h2 class="section_title">Featured Ads</h2>
                        </div>
                    </div>
                </div>

                <div class="row" style="display: flex; justify-content: space-between;">
                    @foreach ($listings->take(12) as $listing)
                        <div class="col-lg-3">
                            <div class="singleFeature mb-24">

                                <div class="featureImg">
                                    <a href="{{ route('listing.show', ['slug' => $listing->slug]) }}"><img
                                            style="max-width: 612px; height:280px; object-fit: cover;"
                                            src="{{ $listing->getFirstMediaUrl('listings') }}"
                                            alt="{{ $listing->title }}"></a>
                                </div>

                                <div class="featureCaption">
                                    <h4><a href="{{ route('listing.show', ['slug' => $listing->slug]) }}"
                                            class="featureTittle">{{ $listing->title }}</a>
                                    </h4>
                                    <span class="featurePricing">Ksh {{ number_format($listing->price) }}</span>
                                    @if ($listing->user->location)
                                        <p class="featureCap"><i class="las la-map-marker"></i>
                                            {{ $listing->user->location }}
                                        </p>
                                    @else
                                        <p class="featureCap">
                                            &nbsp;
                                        </p>
                                    @endif
                                    <div class="btn-wrapper">
                                        <span class="latest_badge">Latest</span>
                                        <span class="premium_badge">Trending</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        {{-- featured ads section --}}

        {{-- pricing section --}}
        {{-- <section class="pricingCard bottom-padding2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-7 col-md-10 col-sm-10">
                        <div class="section-tittle text-center mb-50">
                            <h2 class="section_title">Boost Your Ads and Sell 10x More</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">

                        <div class="singlePrice mb-24">
                            <h4 class="priceTittle">Free</h4>
                            <ul class="listing">
                                <li class="listItem"><i class="las la-check icon"></i>
                                    <blockquote class="priceTag">You get upto 3 free ads</blockquote>
                                </li>
                                <li class="listItem"><i class="las la-check icon"></i>
                                    <blockquote class="priceTag">Reach thousands of customers</blockquote>
                                </li>
                                <li class="listItem"><i class="las la-check icon"></i>
                                    <blockquote class="priceTag">Your Ad will be featured for 1st day</blockquote>
                                </li>
                            </ul>
                            <span class="price">Free</span>

                            <div class="btn-wrapper">
                                <a href="#" class="cmn-btn-outline1">Get Started</a>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4 col-md-6">

                        <div class="singlePrice mb-24">
                            <h4 class="priceTittle">Pro</h4>
                            <ul class="listing">
                                <li class="listItem"><i class="las la-check icon"></i>Post upto 50 ads with the Pro
                                    plan</li>
                                <li class="listItem"><i class="las la-check icon"></i>Get upto 5x times more
                                    responses</li>
                                <li class="listItem"><i class="las la-check icon"></i>Your Ads will be featured for 7
                                    days</li>
                            </ul>
                            <span class="price">Ksh 1500<span class="subTittle"> /Per Month</span></span>

                            <div class="btn-wrapper">
                                <a href="#" class="cmn-btn-outline1">Get Started</a>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4 col-md-6">

                        <div class="singlePrice mb-24">
                            <h4 class="priceTittle">Super Pro</h4>
                            <ul class="listing">
                                <li class="listItem"><i class="las la-check icon"></i>Post Unlimited ads with this
                                    Super Pro Plan</li>
                                <li class="listItem"><i class="las la-check icon"></i>Get upto 10x times more
                                    responses</li>
                                <li class="listItem"><i class="las la-check icon"></i>Your Ads will be featured for
                                    30 days</li>
                            </ul>
                            <span class="price">Ksh 3000<span class="subTittle"> /Per Month</span></span>

                            <div class="btn-wrapper">
                                <a href="#" class="cmn-btn-outline1">Get Started</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section> --}}
        {{-- pricing section --}}

        {{-- about section --}}
        <section class="aboutArea section-padding sectionBg1">
            <div class="container position-relative" style="margin-top: -5rem;">
                <div class="row justify-content-center">
                    <div class="col-xxl-6 col-xl-7 col-lg-6">
                        <div class="about-caption about-caption2 mb-15  text-center">
                            <div class="section-tittle section-tittle2 mb-55">
                                <h2 class="tittle wow fadeInUp" data-wow-delay="0.0s">Post your ad today and start
                                    making money</h2>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">Posting your ad is easy and free. Simply
                                    create an account, write a description of what you're selling or looking for, add
                                    some photos, and hit submit. Your ad could be just what someone else is looking for
                                </p>
                            </div>
                            <div class="btn-wrapper">
                                <a href="{{ route('dashboard.index') }}" class="cmn-btn2 mr-15 mb-10 wow fadeInLeft"
                                    data-wow-delay="0.3s">Post Free Ad</a>
                                <a href="{{ route('ads') }}" class="cmn-btn3 mb-10 wow fadeInRight"
                                    data-wow-delay="0.3s">Browse
                                    Ads</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="aboutShape aboutShape1">
                    <img src="/assets/img/gallery/aboutShape11.png" alt="images" class="bouncingAnimation">
                </div>
                <div class="aboutShape aboutShape2">
                    {{-- <img src="/assets/img/gallery/aboutShape2.png" alt="images" class="bouncingAnimation"> --}}
                </div>
            </div>
        </section>
        {{-- about section --}}

    </main>

</x-app-layout>
