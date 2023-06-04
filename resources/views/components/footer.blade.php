<footer>
    <div class="footerWrapper footerStyleTwo">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="footer-widget widget  mb-24">
                            <div class="footer-tittle footer-tittle2">
                                <div class="footer-logo mb-40">
                                    <a href="{{ route('index') }}">
                                        <span class="main_logo_text">Kahustle</span>
                                    </a>
                                </div>
                                <ul class="listing">
                                    <li class="listItem wow fadeInUp" data-wow-delay="0.3s"><a href="#"
                                            class="singleLinks"><i class="las la-envelope icon"></i><span
                                                class="__cf_email__">info@kahustle.com</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-6 col-md-6 col-sm-6">
                        <div class="footer-widget widget  mb-24">
                            <div class="footer-tittle">
                                <h4 class="footerTittle">Categories</h4>
                                <ul class="listing">
                                    @foreach ($categories->take(8) as $category)
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s"><a
                                                href="{{ route('category', ['slug' => $category->slug]) }}"
                                                class="singleLinks">{{ $category->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-6 col-md-6 col-sm-6">
                        <div class="footer-widget widget  mb-24">
                            <div class="footer-tittle">
                                <h4 class="footerTittle">My Account</h4>
                                @auth
                                    <ul class="listing">
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.0s"><a
                                                href="{{ route('dashboard.index') }}" class="singleLinks"> Dashboard</a>
                                        </li>
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.1s"><a
                                                href="{{ route('dashboard.create') }}" class="singleLinks"> Post Free
                                                Ad</a>
                                        </li>
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.2s"><a
                                                href="{{ route('dashboard.favourites') }}" class="singleLinks">
                                                Favourites</a>
                                        </li>
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.23s"><a
                                                href="{{ route('dashboard.profile') }}" class="singleLinks"> Profile</a>
                                        </li>
                                    </ul>
                                @endauth
                                @guest
                                    <ul class="listing">
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.0s"><a
                                                href="{{ route('dashboard.create') }}" class="singleLinks"> Post Free
                                                Ad</a></li>
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.1s"><a
                                                href="{{ route('dashboard.featured') }}" class="singleLinks"> Featured
                                                Ads</a></li>
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.2s"><a
                                                href="{{ route('register') }}" class="singleLinks"> Register for
                                                an account</a></li>
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.3s"><a
                                                href="{{ route('login') }}" class="singleLinks"> Login</a></li>
                                    </ul>
                                @endguest
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-6 col-md-6 col-sm-6">
                        <div class="footer-widget widget  mb-24">
                            <div class="footer-tittle">
                                <h4 class="footerTittle">Help & support</h4>
                                <ul class="listing">
                                    <li class="listItem wow fadeInUp" data-wow-delay="0.0s"><a
                                            href="{{ route('contact') }}" class="singleLinks"> Contact Us</a></li>
                                    {{-- <li class="listItem wow fadeInUp" data-wow-delay="0.1s"><a href="#"
                                            class="singleLinks"> F.A.Q</a></li>
                                    <li class="listItem wow fadeInUp" data-wow-delay="0.3s"><a href="#"
                                            class="singleLinks"> Safety Information</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-6">
                        <div class="footer-widget widget  mb-24">
                            <div class="footer-tittle footer-tittle2">
                                <h4 class="footerTittle">Newsletter</h4>
                                <div class="footer-pera footer-pera2">
                                    <p class="pera wow fadeInUp" data-wow-delay="0.0s">Be the first one to know
                                        news, offers and events weekly on your email. You can Unsubscribe whenever you
                                        like</p>
                                </div>
                            </div>

                            <div class="footer-form mt-10 wow fadeInRight" data-wow-delay="0.1s">
                                <div class="form-row mb-20" id="newsletter">
                                    <form method="POST" class="newsletter-footer"
                                        action="{{ route('newsletter.form') . '#newsletter' }}">
                                        @csrf
                                        <input class="input" required type="email" name="email"
                                            placeholder="Your Email Address">
                                        <div class="btn-wrapper form-icon">
                                            <button class="btn-default btn-rounded" type="submit" name="submit">
                                                Submit</button>
                                            @if (session()->has('success'))
                                                <p><i class="las la-check-circle"></i> {{ session()->get('success') }}
                                                </p>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                <div class="footer-social2 ">
                                    <a href="#" class="wow fadeInUp social" data-wow-delay="0.1s"><i
                                            class="lab la-facebook-f icon"></i></a>
                                    <a href="#" class="wow fadeInUp social" data-wow-delay="0.2s"><i
                                            class="lab la-whatsapp icon"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom-area">
                <div class="container">
                    <div class="footer-border">
                        <div class="row">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    <p class="pera wow fadeInDown" data-wow-delay="0.0s">© 2023 Kahustle.com All
                                        Rights Reserved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</footer>
