@php
    $title = 'Post Free Ad - Buy and Sell online for free with Kahustle.com Classifieds Ads';
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
                                action="{{ route('listing.store') }}">
                                @csrf

                                <div class="row ad_form_tab form_tab_active">

                                    <div class="col-12 mb-20">
                                        <div class="select-itms">
                                            <label class="infoTitle" id="category">Category</label>
                                            @error('category_id')
                                                <div class="val_error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <select name="category_id" id="category_id" class="category_select">
                                                <option value="" disabled selected hidden>Choose a Category
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label class="infoTitle" id="title">Title</label>
                                        <x-basic-input :name="__('title')" :placeholder="__('The Title of your Ad')" />
                                    </div>

                                    <div class="col-lg-12 mb-20">
                                        <label class="infoTitle" id="description">Description</label>
                                        @error('description')
                                            <div class="val_error">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <textarea id="editor" name="description">
                                            {{ old('description') }}
                                        </textarea>
                                    </div>

                                    <div class="col-lg-12 col-md-12" id="condition">
                                        <div class="condition">
                                            <h6 class="infoTitle">Condition</h6>
                                            @error('condition')
                                                <div class="val_error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="cs_radio_btn" id="condition_container">
                                                {{-- Content here --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12" id="vehicle_details">
                                        <div class="condition">
                                            <h6 class="infoTitle">Vehicle Details</h6>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label class="infoTitle" id="mileage">Mileage</label>
                                                    <x-basic-input :name="__('mileage')" :placeholder="__('Mileage')"
                                                        :type="__('number')" />
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="infoTitle" id="engine">Engine</label>
                                                    <x-basic-input :name="__('engine')" :placeholder="__('Engine')"
                                                        :type="__('text')" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label class="infoTitle" id="price">Price</label>
                                        <x-basic-input :name="__('price')" :type="__('number')" :placeholder="__('Ksh')" />
                                    </div>

                                    <div class="col-lg-12" style="margin-bottom: 1.5rem">
                                        <label class="infoTitle" id="location">Location</label>
                                        @error('location')
                                            <div class="val_error">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <select name="location" class="category_select">
                                            <option value="" disabled selected hidden>Choose a Location
                                            </option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}">
                                                    {{ $location->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="checkWrap2" id="is_negotiable">Negotiable
                                            <input class="effectBorder" name="is_negotiable" type="checkbox"
                                                value="1">
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
            $('.input-images').imageUploader({
                label: 'Drag & Drop or click to browse',
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

            // Show/Hide usage field based on category selected
            $(document).ready(function() {
                var conditionField = $('#condition_container');
                var conditionOptions = getConditionOptions(1);

                // Show the condition field and set the initial condition options
                conditionField.show().html(conditionOptions);

                // Update the condition field options when the category changes
                $('#category_id').on('change', function() {
                    var selectedCategory = $(this).val();
                    var conditionOptions = getConditionOptions(selectedCategory);
                    conditionField.html(conditionOptions);
                });

                function getConditionOptions(categoryId) {
                    var options = '';

                    if (categoryId == 4) {
                        options += '<div class="radio">' +
                            '<input id="radio-2" name="condition" value="Kenyan Used" type="radio" tabindex="0">' +
                            '<label for="radio-2" class="radio-label">Kenyan Used</label>' +
                            '</div>' +
                            '<div class="radio">' +
                            '<input id="radio-1" name="condition" value="Foreign Used" type="radio" tabindex="0">' +
                            '<label for="radio-1" class="radio-label">Foreign Used</label>' +
                            '</div>';
                    } else {
                        options += '<div class="radio">' +
                            '<input id="radio-2" name="condition" value="new" type="radio" tabindex="0">' +
                            '<label for="radio-2" class="radio-label">New</label>' +
                            '</div>' +
                            '<div class="radio">' +
                            '<input id="radio-1" name="condition" value="Used" type="radio" tabindex="0">' +
                            '<label for="radio-1" class="radio-label">Used</label>' +
                            '</div>';
                    }

                    return options;
                }
            });

            // Show/Hide condition field based on category selected
            $(document).ready(function() {
                $('#category_id').on('change', function() {
                    if (this.value == 1 || this.value == 5) {
                        $('#condition').hide();
                    } else {
                        $('#condition').show();
                    }
                });
            });

            $(document).ready(function() {
                var categoryField = $('#category_id');
                var vehicleDetailsField = $('#vehicle_details');

                // Hide the vehicle details field initially
                vehicleDetailsField.hide();

                // Show/hide the vehicle details field based on the category selection
                categoryField.on('change', function() {
                    var selectedCategory = $(this).val();

                    if (selectedCategory == 4) {
                        vehicleDetailsField.show();
                    } else {
                        vehicleDetailsField.hide();
                    }
                });
            });
        </script>
    </x-slot>

</x-app-layout>
