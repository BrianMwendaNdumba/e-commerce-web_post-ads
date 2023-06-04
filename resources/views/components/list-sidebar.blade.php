                    {{-- sidebar --}}
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-5">
                        <div class="cateSidebar">
                            <h5 class="catTittle2">Categories</h5>

                            <ul class="listing listScroll">
                                @foreach ($categories as $category)
                                    <li class="listItem"><a href="{{ route('category', ['slug' => $category->slug]) }}"
                                            class="items">
                                            <span>
                                                {{ $category->title }} </span></span>
                                        </a></li>
                                @endforeach
                            </ul>

                            {{-- disabling filters because project is being rushed --}}
                            {{-- <div class="price mb-10">
                                <h5 class="catTittle">Price</h5>

                                <form action="#" class="picPrice">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-form">
                                                <input type="text" placeholder="Min">

                                                <div class="icon"><i class="las la-dollar-sign"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-form">
                                                <input type="text" placeholder="Max">

                                                <div class="icon"><i class="las la-dollar-sign"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="dateTime mb-30">
                                <h5 class="catTittle">Date Posted</h5>

                                <div class="datePicker">
                                    <input id="datepicker1" placeholder="10/04/2023" />
                                </div>
                            </div>

                            <div class="btn-wrapper">
                                <a href="#" class="cmn-btn4 w-100">Filter</a>
                            </div> --}}
                            {{-- disabling filters because project is being rushed --}}

                        </div>
                    </div>
                    {{-- sidebar --}}
