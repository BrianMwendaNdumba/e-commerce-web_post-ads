(function ($) {
    "use strict";
    jQuery(document).ready(function ($) {
        $(
            ".chat-list, .messageShow , .megamenuWrapper, .category-searchbar, .listScroll"
        ).niceScroll({});
        if ($(window).width() < 992) {
            $(".mobile-style").removeClass("show");
        }
        $(document).on("keyup", ".keyup-input", function (event) {
            var input_values = $(this).val();
            if (input_values.length > 0) {
                $(".search-showHide").addClass("show");
            } else {
                $(".search-showHide").removeClass("show");
            }
        });
        $(document).on("click", ".closed-icon", function () {
            $(".search-showHide").removeClass("show");
        });
        $(".sidebarBtn").on("click", function () {
            $(".showSidebar").slideToggle(300);
        });
        $(".sidebarBtn").on("click", function () {
            $(this).toggleClass("activeBg");
        });
        $(document).on("click", ".showSidebar .singleList", function () {
            $(this).siblings().removeClass("active");
            $(this).toggleClass("active");
        });
        $(".customTab").on("click", function (evt) {
            evt.preventDefault();
            $(this).toggleClass("active");
            var sel = this.getAttribute("data-toggle-target");
            $(".customTab-content")
                .removeClass("active")
                .filter(sel)
                .addClass("active");
        });
        $(document).on("click", ".click_show_icon", function () {
            $(".nav-right-content").toggleClass("active");
        });
        $(document).on("click", ".navbar-toggler", function () {
            $(this).toggleClass("active");
        });
        $(".selectCategories li").click(function () {
            $(this).toggleClass("active").siblings().removeClass("active");
        });
        $(".singlePlan").click(function () {
            $(this).addClass("active");
            $(this).siblings().removeClass("active");
        });
        $(".singleUser").click(function () {
            $(this).addClass("active");
            $(this).siblings().removeClass("active");
        });
        $(".chatBar").on("click", function () {
            $(".chatList-wrapper").slideToggle(300);
        });
        $(".chatBar").on("click", function () {
            $(".chat").toggleClass("activeBg");
        });
        $(".userAccount").on("click", function () {
            $(".userAccount-wrapper").slideToggle(300);
        });
        $(document).on(
            "click",
            ".close-icon, .body-overlay-desktop",
            function () {
                $(".modal-wrapper, .body-overlay-desktop").removeClass(
                    "active"
                );
            }
        );
        $(document).on("click", ".popup-modal", function () {
            $(".modal-wrapper, .body-overlay-desktop").addClass("active");
        });
        new WOW().init();
        $(".tilt-effect").tilt({
            maxTilt: 6,
            easing: "cubic-bezier(.03,.98,.52,.99)",
            speed: 500,
            transition: true,
        });
        var nice_Select = $(".niceSelect");
        if (nice_Select.length) {
            nice_Select.niceSelect();
        }
        var globalSlickInit = $(".global-slick-init");
        if (globalSlickInit.length > 0) {
            $.each(globalSlickInit, function (index, value) {
                if ($(this).children("div").length > 1) {
                    var sliderSettings = {};
                    var allData = $(this).data();
                    var infinite =
                        typeof allData.infinite == "undefined"
                            ? false
                            : allData.infinite;
                    var arrows =
                        typeof allData.arrows == "undefined"
                            ? false
                            : allData.arrows;
                    var autoplay =
                        typeof allData.autoplay == "undefined"
                            ? false
                            : allData.autoplay;
                    var focusOnSelect =
                        typeof allData.focusonselect == "undefined"
                            ? false
                            : allData.focusonselect;
                    var swipeToSlide =
                        typeof allData.swipetoslide == "undefined"
                            ? false
                            : allData.swipetoslide;
                    var slidesToShow =
                        typeof allData.slidestoshow == "undefined"
                            ? 1
                            : allData.slidestoshow;
                    var slidesToScroll =
                        typeof allData.slidestoscroll == "undefined"
                            ? 1
                            : allData.slidestoscroll;
                    var speed =
                        typeof allData.speed == "undefined"
                            ? "500"
                            : allData.speed;
                    var dots =
                        typeof allData.dots == "undefined"
                            ? false
                            : allData.dots;
                    var cssEase =
                        typeof allData.cssease == "undefined"
                            ? "linear"
                            : allData.cssease;
                    var prevArrow =
                        typeof allData.prevarrow == "undefined"
                            ? ""
                            : allData.prevarrow;
                    var nextArrow =
                        typeof allData.nextarrow == "undefined"
                            ? ""
                            : allData.nextarrow;
                    var centerMode =
                        typeof allData.centermode == "undefined"
                            ? false
                            : allData.centermode;
                    var centerPadding =
                        typeof allData.centerpadding == "undefined"
                            ? false
                            : allData.centerpadding;
                    var rows =
                        typeof allData.rows == "undefined"
                            ? 1
                            : parseInt(allData.rows);
                    var autoplay =
                        typeof allData.autoplay == "undefined"
                            ? false
                            : allData.autoplay;
                    var autoplaySpeed =
                        typeof allData.autoplayspeed == "undefined"
                            ? 2000
                            : parseInt(allData.autoplayspeed);
                    var lazyLoad =
                        typeof allData.lazyload == "undefined"
                            ? false
                            : allData.lazyload;
                    var appendDots =
                        typeof allData.appenddots == "undefined"
                            ? false
                            : allData.appenddots;
                    var appendArrows =
                        typeof allData.appendarrows == "undefined"
                            ? false
                            : allData.appendarrows;
                    var asNavFor =
                        typeof allData.asnavfor == "undefined"
                            ? false
                            : allData.asnavfor;
                    var verticalSwiping =
                        typeof allData.verticalswiping == "undefined"
                            ? false
                            : allData.verticalswiping;
                    var vertical =
                        typeof allData.vertical == "undefined"
                            ? false
                            : allData.vertical;
                    var fade =
                        typeof allData.fade == "undefined"
                            ? false
                            : allData.fade;
                    var rtl =
                        typeof allData.rtl == "undefined" ? false : allData.rtl;
                    var responsive =
                        typeof $(this).data("responsive") == "undefined"
                            ? false
                            : $(this).data("responsive");
                    sliderSettings.infinite = infinite;
                    sliderSettings.arrows = arrows;
                    sliderSettings.autoplay = autoplay;
                    sliderSettings.focusOnSelect = focusOnSelect;
                    sliderSettings.swipeToSlide = swipeToSlide;
                    sliderSettings.slidesToShow = slidesToShow;
                    sliderSettings.slidesToScroll = slidesToScroll;
                    sliderSettings.speed = speed;
                    sliderSettings.dots = dots;
                    sliderSettings.cssEase = cssEase;
                    sliderSettings.prevArrow = prevArrow;
                    sliderSettings.nextArrow = nextArrow;
                    sliderSettings.rows = rows;
                    sliderSettings.autoplaySpeed = autoplaySpeed;
                    sliderSettings.autoplay = false;
                    sliderSettings.verticalSwiping = verticalSwiping;
                    sliderSettings.vertical = vertical;
                    sliderSettings.rtl = rtl;
                    if (centerMode != false) {
                        sliderSettings.centerMode = centerMode;
                    }
                    if (centerPadding != false) {
                        sliderSettings.centerPadding = centerPadding;
                    }
                    if (lazyLoad != false) {
                        sliderSettings.lazyLoad = lazyLoad;
                    }
                    if (appendDots != false) {
                        sliderSettings.appendDots = appendDots;
                    }
                    if (appendArrows != false) {
                        sliderSettings.appendArrows = appendArrows;
                    }
                    if (asNavFor != false) {
                        sliderSettings.asNavFor = asNavFor;
                    }
                    if (fade != false) {
                        sliderSettings.fade = fade;
                    }
                    if (responsive != false) {
                        sliderSettings.responsive = responsive;
                    }
                    $(this).slick(sliderSettings);
                }
            });
        }
        function mainSlider() {
            var BasicSlider = $(".slider-active");
            BasicSlider.on("init", function (e, slick) {
                var $firstAnimatingElements = $(
                    ".single-slider:first-child"
                ).find("[data-animation]");
                doAnimations($firstAnimatingElements);
            });
            BasicSlider.on(
                "beforeChange",
                function (e, slick, currentSlide, nextSlide) {
                    var $animatingElements = $(
                        '.single-slider[data-slick-index="' + nextSlide + '"]'
                    ).find("[data-animation]");
                    doAnimations($animatingElements);
                }
            );
            BasicSlider.slick({
                autoplay: true,
                autoplaySpeed: 3000,
                dots: false,
                fade: true,
                arrows: false,
                prevArrow:
                    '<button type="button" class="slick-prev"><i class="ti-shift-left"></i></button>',
                nextArrow:
                    '<button type="button" class="slick-next"><i class="ti-shift-right"></i></button>',
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                        },
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                        },
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                        },
                    },
                ],
            });
            function doAnimations(elements) {
                var animationEndEvents =
                    "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
                elements.each(function () {
                    var $this = $(this);
                    var $animationDelay = $this.data("delay");
                    var $animationType = "animated " + $this.data("animation");
                    $this.css({
                        "animation-delay": $animationDelay,
                        "-webkit-animation-delay": $animationDelay,
                    });
                    $this
                        .addClass($animationType)
                        .one(animationEndEvents, function () {
                            $this.removeClass($animationType);
                        });
                });
            }
        }
        mainSlider();
        (function () {
            var progressPath = document.querySelector(".progressParent path");
            var pathLength = progressPath.getTotalLength();
            progressPath.style.transition =
                progressPath.style.WebkitTransition = "none";
            progressPath.style.strokeDasharray = pathLength + " " + pathLength;
            progressPath.style.strokeDashoffset = pathLength;
            progressPath.getBoundingClientRect();
            progressPath.style.transition =
                progressPath.style.WebkitTransition =
                    "stroke-dashoffset 10ms linear";
            var updateProgress = function () {
                var scroll = $(window).scrollTop();
                var height = $(document).height() - $(window).height();
                var progress = pathLength - (scroll * pathLength) / height;
                progressPath.style.strokeDashoffset = progress;
            };
            updateProgress();
            $(window).scroll(updateProgress);
            var offset = 50;
            var duration = 550;
            jQuery(window).on("scroll", function () {
                if (jQuery(this).scrollTop() > offset) {
                    jQuery(".progressParent").addClass("rn-backto-top-active");
                } else {
                    jQuery(".progressParent").removeClass(
                        "rn-backto-top-active"
                    );
                }
            });
            jQuery(".progressParent").on("click", function (event) {
                event.preventDefault();
                jQuery("html, body").animate({ scrollTop: 0 }, duration);
                return false;
            });
        })();
        $("#datepicker1").datepicker();
        $("#datepicker2").datepicker();
        if (document.getElementById("phone") != null) {
            var input = document.querySelector("#phone");
            window.intlTelInput(input, {});
        }
        $(".odometer").appear(function (e) {
            var odo = jQuery(".odometer");
            odo.each(function () {
                var countNumber = jQuery(this).attr("data-count");
                jQuery(this).html(countNumber);
            });
        });
    });
    $(window).on("load", function () {
        $(".preloader-inner").fadeOut(1000);
    });

    // fav Icon
	$('#fav_icon').on('click', function (e) {
		e.preventDefault();
        $(this).toggleClass('liked');
		$(this).closest("form").submit();
	});

    $('.favouritesForm').submit(function (e) {
		e.preventDefault();
		let action = $(this).prop('action');
		$.ajax({
			type: "POST",
			url: action,
			data: $(this).serialize(),
			error: function (response) {
				// window.location.replace('/login');
                console.log(response);
			},
		});
	});

})(jQuery);
