@php
    $title = 'Edit Your Ad - Buy and Sell online for free with Kahustle.com Classifieds Ads';
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

                        <div class="listingDetails-Wrapper mt-20">
                            <form id="ad_main_form" class="listingDetails" enctype="multipart/form-data" method="POST"
                                action="{{ route('listing.update', ['slug' => $listing->slug]) }}">
                                @csrf
                                @method('patch')
                                @if ($errors->any())
                                    <div class="col-12 mt-10 mb-10 error_validation_section">
                                        <h6>Please check if you filled out all the required fields
                                        </h6>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="row ad_form_tab form_tab_active">

                                    <div class="col-12 mb-20">
                                        <div class="select-itms">
                                            <label class="infoTitle" id="category">Category</label>
                                            @error('category_id')
                                                <div class="val_error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <select name="category_id" class="category_select">
                                                @foreach ($categories as $category)
                                                    <option @selected($category->id == $listing->category_id) value="{{ $category->id }}">
                                                        {{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label class="infoTitle" id="title">Title</label>
                                        <x-basic-input :name="__('title')" value="{{ $listing->title }}"
                                            :placeholder="__('The Title of your Ad')" />
                                    </div>

                                    <div class="col-lg-12 mb-20">
                                        <label class="infoTitle" id="description">Description</label>
                                        @error('description')
                                            <div class="val_error">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <textarea id="summernote" name="description">
                                            {{ old('description') ?? $listing->description }}
                                        </textarea>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="condition">
                                            <h6 class="infoTitle">Condition</h6>
                                            @error('condition')
                                                <div class="val_error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="cs_radio_btn">
                                                <div class="radio">
                                                    <input id="radio-2" @checked($listing->condition == 'new') name="condition"
                                                        value="new" type="radio" tabindex="0">
                                                    <label for="radio-2" class="radio-label">New</label>
                                                </div>
                                                <div class="radio">
                                                    <input id="radio-1" @checked($listing->condition == 'Used') name="condition"
                                                        value="Used" type="radio" tabindex="0">
                                                    <label for="radio-1" class="radio-label">Used</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label class="infoTitle" id="price">Price</label>
                                        <x-basic-input :name="__('price')" value="{{ $listing->price }}"
                                            :type="__('number')" :placeholder="__('Ksh')" />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="checkWrap2" id="is_negotiable">Negotiable
                                            <input class="effectBorder" @checked($listing->is_negotiable)
                                                name="is_negotiable" type="checkbox" value="1">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="btn-wrapper mb-10">
                                            <button type="button" id="continueButton"
                                                class="custom_button_one btn_size_large trasition_medium">Continue</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="row ad_form_tab">

                                    <div class="col-12">
                                        <div class="select-itms">
                                            <label class="infoTitle">Add Images</label>
                                            @error('images')
                                                <div class="val_error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="input-images"></div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="btn_wrapper">
                                            <button type="button" id="prevButton"
                                                class="custom_button_two btn_size_large trasition_medium">Previous</button>

                                            <button type="submit" id="submitButton"
                                                class="custom_button_one btn_size_large trasition_medium">Finish</button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>

                        <form method="POST" action="{{ route('listing.destroy', ['slug' => $listing->slug]) }}"
                            style="text-align: right; margin-top:120px;" class="btn-wrapper">
                            @csrf
                            @method('delete')
                            <button style="color: red; background:transparent; border:none;"> <i
                                    class="las la-trash"></i>Delete Ad</button>
                            <p>Please be aware that this action is not reversable</p>
                        </form>

                    </div>
                </div>

            </div>

        </div>

    </main>

    <x-slot name="scripts">
        @vite(['resources/js/adform.js'])
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/assets/css/image-uploader.min.css">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script src="/assets/js/image-uploader.min.js"></script>
        <script>
            $('#summernote').summernote({
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['font', ['bold', 'underline', 'italic', 'clear']],
                ]
            });
            let preloaded = @json($imagePaths);
            $('.input-images').imageUploader({
                label: 'Drag & Drop or click to browse',
                preloaded: preloaded,
                extensions: [
                    '.jpg',
                    '.JPG',
                    '.jpeg',
                    '.JPEG',
                    '.png',
                    '.PNG'
                ],
                mimes: ['image/jpeg', 'image/png'],
                maxSize: 2 * 1024 * 1024,
                maxFiles: 10,
                imagesInputName: 'images'
            });
        </script>
    </x-slot>

</x-app-layout>
