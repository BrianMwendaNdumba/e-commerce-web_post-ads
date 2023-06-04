@php
    $title = 'Report an Ad - Buy and Sell online for free with Kahustle.com Classifieds Ads';
@endphp

<x-app-layout :title="$title">

    <main>
        <div class="contactArea section-padding2">

            <div class="container">
                <div class="row">
                    <div class="col-8 mx-auto">

                        {{-- status messages --}}
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
                        {{-- status messages --}}

                        <div class="contact-Wrapper">
                            <form class="row" method="POST" action="{{ route('report.form') }}">
                                @csrf
                                <div class="col-lg-12">
                                    <div class="section-tittle mb-40">
                                        <h2 class="tittle p-0">Report an Ad</h2>
                                        <p>Report an ad for review</p>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="section-tittle mb-40">
                                        <h6 class="p-0">{{ $listing->title }}</h6>
                                        <p>By {{ $listing->user->name }}</p>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <input type="hidden" name="listing" value="{{ $listing->slug }}">
                                    <label class="infoTitle" id="message">Message</label>
                                    <div class="input-form">
                                        <textarea required style="border: 1px solid #afafaf!important; color: black;" name="message" id="message"
                                            placeholder="Your message"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="btn-wrapper mb-10">
                                        <button type="submit" class="cmn-btn4 w-100">Report</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>

</x-app-layout>
