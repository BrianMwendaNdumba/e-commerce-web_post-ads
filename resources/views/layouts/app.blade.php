@props(['title' => "Buy & Sell online for free with Kahustle's Classifieds Ads | Kahustle.com", 'description' => "Experience the freedom of online buying and selling with Kahustle's free Classifieds Ads. Posting your classified ad is easy and free!"])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="{{ $description }}">

    <title>{{ $title }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <link rel="icon" type="image/x-icon" sizes="20x20" href="/assets/img/icon/favicon.png">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/plugin.css">
    <link rel="stylesheet" href="/assets/css/main-style.css?11">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <style>
        a {
            text-decoration: none;
        }
        .social-btn-sp #social-links {
            margin: 0 auto;
            width: auto;
            display: inline-table;
        }

        .social-btn-sp #social-links ul li {
            display: inline;
        }

        .social-btn-sp #social-links ul li a {
            padding: 15px;
            border: 1px solid #ccc;
            margin: 1px;
            font-size: 15px;
            background: #e3e3ea;
        }
    </style>

    <!-- TinyMCE CDN -->
    <script src="https://cdn.tiny.cloud/1/sfxcod6de3g5yia9vqyzlms1v0ohxdltqqrgd7hrj58k56w1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: 'textarea#editor',
        skin: 'bootstrap',
        plugins: 'lists, link',
        toolbar: 'h1 h2 h3 h4 h5 h6 bold italic strikethrough blockquote bullist numlist backcolor | removeformat help',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        menubar: false,
      });
    </script>

    @vite(['resources/css/overrides.css'])
    {{ $styles ?? '' }}
</head>

<body>
    <span class="screen-darken"></span>
    <x-header />
    {{ $slot }}
    <x-footer />

    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/plugin.js"></script>
    <script src="/assets/js/main.js?5"></script>

    <script type="text/javascript">
        function darken_screen(yesno) {
            if (yesno == true) {
                document.querySelector('.screen-darken').classList.add('active');
            } else if (yesno == false) {
                document.querySelector('.screen-darken').classList.remove('active');
            }
        }

        function close_offcanvas() {
            darken_screen(false);
            document.querySelector('.mobile-offcanvas.show').classList.remove('show');
            document.body.classList.remove('offcanvas-active');
        }

        function show_offcanvas(offcanvas_id) {
            darken_screen(true);
            document.getElementById(offcanvas_id).classList.add('show');
            document.body.classList.add('offcanvas-active');
        }

        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('[data-trigger]').forEach(function(everyelement) {

                let offcanvas_id = everyelement.getAttribute('data-trigger');

                everyelement.addEventListener('click', function(e) {
                    e.preventDefault();
                    show_offcanvas(offcanvas_id);

                });
            });

            document.querySelectorAll('.btn-close').forEach(function(everybutton) {

                everybutton.addEventListener('click', function(e) {
                    e.preventDefault();
                    close_offcanvas();
                });
            });

            document.querySelector('.screen-darken').addEventListener('click', function(event) {
                close_offcanvas();
            });

        });
        // DOMContentLoaded  end
    </script>
    {{ $scripts ?? '' }}
</body>

</html>
