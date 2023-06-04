@php
    $title = 'Contact Us - Buy and Sell online for free with Kahustle.com Classifieds Ads';
@endphp

<x-app-layout :title="$title">

    <main>
        <div class="contactArea section-padding2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-12">

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
                            <form class="row" method="POST" action="{{ route('contact.form') }}">
                                @csrf
                                <div class="col-lg-12">
                                    <div class="section-tittle mb-40">
                                        <h2 class="tittle p-0">Get in touch</h2>
                                        <p>Our friendly team would love to hear from you.</p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <label class="infoTitle" id="first_name">First name</label>
                                    <x-basic-input required :name="__('first_name')" :placeholder="__('Your first name')" />
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <label class="infoTitle">Last name</label>
                                    <x-basic-input required :name="__('last_name')" :placeholder="__('Your last name')" />
                                </div>

                                <div class="col-lg-12">
                                    <label class="infoTitle" id="email">Email</label>
                                    <x-basic-input required :name="__('email')" :type="__('email')" :placeholder="__('email address')" />
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-form">
                                        <label class="infoTitle" id="phone_number">Phone number</label>
                                        <x-basic-input autocomplete="tel" :name="__('phone_number')" :type="__('tel')"
                                            :placeholder="__('Your phone number')" />
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <label class="infoTitle" id="message">Message</label>
                                    <div class="input-form">
                                        <textarea required style="border: 1px solid #afafaf!important; color: black;" name="message" id="message"
                                            placeholder="Your message"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="btn-wrapper mb-10">
                                        <button type="submit" class="cmn-btn4 w-100">Send message</button>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>

                    <div class="col-xl-7 col-lg-12">
                        <div class="contactRight-img">
                            <img src="assets/img/gallery/contact.jpg" alt="images" class="contactImg">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

</x-app-layout>
