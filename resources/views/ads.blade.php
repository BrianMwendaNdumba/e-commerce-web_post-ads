@php
    $title = 'All Categories - Buy and Sell online for free with Kahustle.com Classifieds Ads';
@endphp

<x-app-layout :title="$title">

    <main>

        <div class="mt-40 plr">
            <div class="container-fluid">
                <div class="row">

                    <x-list-sidebar />

                    <div class="col-xxl-9 col-xl-9 col-lg-8 col-md-7">

                        <div class="gridView customTab-content customTab-content-1 active">

                            <div class="mb-20 category_title">
                                <h1>All <span class="category_name">Ads</span>
                                    <span class="category_count">({{ count($listings) }} items)</span>
                                </h1>
                            </div>

                            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">

                                @forelse ($listings as $listing)
                                    <div class="col">

                                        <div class="singleFeature mb-24">

                                            <div class="featureImg">
                                                <a href="{{ route('listing.show', ['slug' => $listing->slug]) }}"><img
                                                        style="width: 255px; height:206px; object-fit: cover;"
                                                        src="{{ $listing->getFirstMediaUrl('listings') }}"
                                                        alt="{{ $listing->title }}"></a>
                                            </div>

                                            <div class="featureCaption">
                                                <h4><a href="{{ route('listing.show', ['slug' => $listing->slug]) }}"
                                                        class="featureTittle">{{ $listing->title }}</a>
                                                </h4>
                                                <span class="featurePricing">Ksh
                                                    {{ number_format($listing->price) }}</span>
                                                @if ($listing->user->location)
                                                    <p class="featureCap">{{ $listing->user->location }} · <strong
                                                            class="subCap">{{ $listing->updated_at->diffForHumans(['parts' => 1]) }}</strong>
                                                    </p>
                                                @else
                                                    <p class="featureCap"><strong
                                                            class="subCap">{{ $listing->updated_at->diffForHumans(['parts' => 1]) }}</strong>
                                                    </p>
                                                @endif
                                                <div class="btn-wrapper">
                                                    <span class="latest_badge">Latest</span>
                                                    <span class="premium_badge">Trending</span>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                @empty
                                    <div class="no_category_items category_title">
                                        <p>No Items Found in this category. Please try other categories</p>
                                    </div>
                                @endforelse

                            </div>
                        </div>

                        @if (count($listings) >= 20)
                            {{-- pagination --}}
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="pagination mt-60">
                                        <ul class="pagination-list">
                                            <li class=" wow fadeInRight" data-wow-delay="0.0s"><a href="#"
                                                    class="page-number"><i class="las la-angle-left"></i></a></li>
                                            <li><span class="page-number current">1</span></li>
                                            <li><a href="#" class="page-number">2</a></li>
                                            <li><a href="#" class="page-number">3</a></li>
                                            <li><a href="#" class="page-number">4</a></li>
                                            <li><a href="#" class="page-number">5</a></li>
                                            <li class=" wow fadeInLeft" data-wow-delay="0.0s"><a href="#"
                                                    class="page-number"><i class="las la-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            {{-- pagination --}}
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </main>

</x-app-layout>
