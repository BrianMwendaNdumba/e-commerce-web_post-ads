@php
    $title = 'Featured Ads - Buy and Sell online for free with Kahustle.com Classifieds Ads';
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

                        {{-- <div class="row mb-24">
                            <div class="col-sm-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">My Account</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                        <div class="memberShipCart">

                            <div class="singleMember mb-24">
                                <div class="memberDetails">
                                    <h5><a href="#" class="memberTittle">Verified Membership <span
                                                class="activeUser">Active</span></a></h5>

                                    <div class="infoSingle">
                                        <ul class="listing">
                                            <li class="listItem">Billing Yearly</li>
                                            <li class="listItem">24 Days remaining to next invoice</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="btn-wrapper mb-20">
                                    <a href="#" class="cmn-btn-outline4 mr-10">Cancel</a>
                                    <a href="#" class="cmn-btn4">Upgrade</a>
                                </div>
                            </div>
                        </div>


                        <div class="small-tittle mb-30">
                            <h3>Payments</h3>
                        </div>

                        <div class="paymentTable">

                            <div class="singleMember wow fadeInUp social" data-wow-delay="0.0s">
                                <p class="memberInfo">Verified Membership</p>
                                <p class="price">$102.99</p>
                                <p class="memberInfo">$07 Jan 2022 </p>
                                <p class="memberInfo">Mastercard ****<span class="lastDegit">9834</span> </p>
                                <p class="success-btn">Successfully paid</p>
                            </div>

                            <div class="singleMember wow fadeInUp social" data-wow-delay="0.1s">
                                <p class="memberInfo">Verified Membership</p>
                                <p class="price">$102.99</p>
                                <p class="memberInfo">$07 Jan 2022 </p>
                                <p class="memberInfo">Mastercard ****<span class="lastDegit">9834</span> </p>
                                <p class="success-btn">Successfully paid</p>
                            </div>

                            <div class="singleMember wow fadeInUp social" data-wow-delay="0.2s">
                                <p class="memberInfo">Verified Membership</p>
                                <p class="price">$102.99</p>
                                <p class="memberInfo">$07 Jan 2022 </p>
                                <p class="memberInfo">Mastercard ****<span class="lastDegit">9834</span> </p>
                                <p class="success-btn">Successfully paid</p>
                            </div>
                        </div> --}}

                        <section class="pricingCard mt-40">

                            <div class="container">

                                <div class="row justify-content-center">
                                    <div class="col-xl-8 col-lg-7 col-md-10 col-sm-10">
                                        <div class="section-tittle text-center mb-50">
                                            <h2 class="tittle  "><span class="shape"></span>Post and Promote Your
                                                Ads</h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-12">

                                        <div class="singlePrice custom_price_table mb-24 wow fadeInDown"
                                            data-wow-delay=".1s">
                                            <h4 class="priceTittle">Basic</h4>
                                            <ul class="listing">
                                                <li class="listItem"><i class="las la-check icon"></i>Post 1 ad</li>
                                            </ul>
                                            <span class="price">Kshs 80<span class="subTittle"> /Per
                                                    day</span></span>
                                            <div class="btn-wrapper">
                                                <a href="#"
                                                    class="custom_button_one btn_size_large trasition_medium">Get
                                                    Started</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div class="singlePrice custom_price_table mb-24 wow fadeInRight"
                                            data-wow-delay=".2s">
                                            <h4 class="priceTittle">Premium</h4>
                                            <ul class="listing">
                                                <li class="listItem"><i class="las la-check icon"></i>Post 3 ads</li>
                                            </ul>
                                            <span class="price">Kshs 500<span class="subTittle"> /Per
                                                    week</span></span>
                                            <div class="btn-wrapper">
                                                <a href="#"
                                                    class="custom_button_one btn_size_large trasition_medium">Get
                                                    Started</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </section>
                    </div>

                </div>
            </div>
        </div>

    </main>

</x-app-layout>
