(function($) {
	var appStart = function () {

    var screenWidth = $(window).width();
    // handle Preloader OnClick
    function handlePreloaderOnClick() {
        const preloader = document.querySelector(".preloader");
        const closeBtn = document.querySelector(".preloader__close-btn");
        if (preloader) {
            setTimeout(() => {
                preloader.style.opacity = "0";
                preloader.style.display = "none";
                preloader.style.visibility = "hidden";
            }, 8000);
            if (closeBtn) {
                closeBtn.addEventListener("click", () => {
                    preloader.style.opacity = "0";
                    preloader.style.display = "none";
                    preloader.style.visibility = "hidden";
                });
            }
        }
    }
	
	// handleMainslider  =============
	var handleMainslider = function () {
	if (jQuery('.main-slider').length > 0) {  
			var sync1 = $('.main-slider');
			var sync2 = $('.owl-thumbs-main');
			var syncedSecondary = true;
			sync1.owlCarousel({
			items: 1,
			autoplay: true,
			autoplayTimeout: 10000,
			smartSpeed: 1000,
			nav: true,
			dots: false,
			loop: true,
			mouseDrag: false,
			responsiveRefreshRate: 200,
			navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
			onTranslated: applyAnimations,
			responsive: {
				0: {
					nav: false,
					dots: true
				},
				991: {
					nav: true,
					dots: false
				},
			}
		}).on('changed.owl.carousel', syncPosition);

		sync2.owlCarousel({
			items: 4,
			margin: 0,
			nav: false,
			dots: false,
			smartSpeed: 1000,
			autoplayTimeout: 10000,
			// slideBy: 3,
			responsiveRefreshRate: 100,
			responsive: {
				0: { items: 1 },
				575: { items: 2 },
				768: { items: 3 },
				991: { items: 4 },
			}
		}).on('changed.owl.carousel', syncPosition2);

		function syncPosition(el) {
			var count = el.item.count - 1;
			var current = Math.round(el.item.index - (el.item.count / 2) - 0.5);
			if (current < 0) {
				current = count;
			}
			if (current > count) {
				current = 0;
			}
			sync2.find('.owl-item').removeClass('synced').eq(current).addClass('synced');
			if (syncedSecondary) {
				sync2.trigger('to.owl.carousel', [current, 100, true]);
			}
		}
		function syncPosition2(el) {
			if (syncedSecondary) {
				var number = el.item.index;
				sync1.trigger('to.owl.carousel', [number, 100, true]);
			}
		}
		sync2.on('click', '.owl-item', function (e) {
			e.preventDefault();
			var number = $(this).index();
			sync1.trigger('to.owl.carousel', [number, 300, true]);
		});
		function applyAnimations() {
			var $activeSlide = sync1.find(".owl-item.active");
			sync1.find("[data-animation]").each(function () {
				var animName = $(this).data("animation");
				$(this).removeClass("animated " + animName).css("opacity", "0");
			});
			$activeSlide.find("[data-animation]").each(function () {
				var $el = $(this),
					animName = $el.data("animation"),
					animDelay = $el.data("delay") || "0s",
					animDuration = $el.data("duration") || "1s";

				$el.css({
					"animation-delay": animDelay,
					"animation-duration": animDuration,
					"opacity": "1"
				}).addClass("animated " + animName);
			});
		}
		applyAnimations();
	}
	}
	
	// handleCategoryslider  =============
	var handleCategoryslider = function () {
		if (jQuery('.categories-slider').length > 0) {  
			var product = $('.categories-slider').owlCarousel({
			loop: true,
			dots: false,
			margin: 10,
			nav: true,
			autoplay: true,
			autoplayHoverPause: true,
			smartSpeed: 1000,
			autoHeight: true,
			animateOut: "fadeOut",
			animateIn: "fadeIn",
			navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
			autoplayTimeout: 3000,		
			center: true,
			items: 5		
		});
	}}
	

    // handleStickyHeader  =============
    var handleStickyHeader = function () {
        if ($(".is-sticky-on").length > 0) {
            var navbar = $(".is-sticky-on");
            var navbarOffset = navbar.offset().top;
            $(window).on("scroll", function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > 200) {
                    navbar.addClass("sticky-menu");
                } else {
                    navbar.removeClass("sticky-menu");
                }
            });
        }
    }
    // handle Password Input ===========
    var handlePasswordInput = function () {
        if ($(".show-password-input").length > 0) {
            document.querySelectorAll(".show-password-input").forEach(function (toggle) {
                toggle.addEventListener("click", function () {
                    const input = this.previousElementSibling;
                    this.classList.toggle("display-password");
                    if (input) {
                        input.type = this.classList.contains("display-password") ? "text" : "password";
                    }
                });
            });
        }
    }

    // handle Header Menu ============
    var handleHeaderMenu = function () {
        if ($(window).width() <= 991) {
            jQuery('.menu-wrap li > a, .dropdown-menu li > a')
                .off("click keypress")
                .on("click keypress", function (e) {
                    if (e.type === "keypress" && e.key !== "Enter") return;
                    // handleMenus(e, jQuery(this));
                });
            jQuery('.tabindex').attr("tabindex", "0");

            jQuery('.mobile-toggler button')
                .off('click')
                .on('click', function (e) {
                    e.preventDefault();
                    let parentLi = jQuery(this).closest('li');
                    let dropdown = parentLi.find('.dropdown-menu').first();
                    if (parentLi.hasClass('open')) {
                        dropdown.slideUp('slow', function () {
                            jQuery(this).css('display', 'none');
                        });
                        parentLi.removeClass('open');
                    } else {
                        parentLi.siblings('li').removeClass('open')
                            .children('.dropdown-menu, .mega-menu').slideUp('slow').css('display', 'none');
                        dropdown.css('display', 'block').slideDown();
                        parentLi.addClass('open');
                    }
                });
        } else {
            jQuery('.tabindex').removeAttr("tabindex");
            jQuery('.dropdown-menu, .mega-menu').removeAttr('style');
            jQuery('.menu-wrap li').removeClass('open');
        }
    };


    // handle Product Category Menus ============
    function handleProductCategoryMenus() {
        if ($(window).width() >= 0) {
            jQuery('.category-menu-wrap .mobile-collapsed button')
                .off("click keypress")
                .on("click keypress", function (e) {
                    if (e.type === "keypress" && e.key !== "Enter") return;

                    let target = jQuery(this);
                    let menuObj = target.closest('li').children('a');
                    handleMenus(e, menuObj);
                });

            jQuery('.tabindex').attr("tabindex", "0");
            function handleMenus(e, menuObj) {
                if (menuObj.parent('li').has('ul').length > 0) {
                    e.preventDefault();

                    let dropdown = menuObj.nextAll('.dropdown-menu, .mega-menu').first();

                    if (menuObj.parent().hasClass('active')) {
                        dropdown.slideUp('slow', function () {
                            jQuery(this).css('display', 'none');
                        });
                        menuObj.parent().removeClass('active');
                    } else {
                        menuObj.parent().siblings('li').removeClass('active')
                            .children('.dropdown-menu, .mega-menu').slideUp('slow').css('display', 'none');
                        dropdown.css('display', 'block').slideDown();
                        menuObj.parent().addClass('active');
                    }
                }
            }

            jQuery(document).on("click.categoryMenu", function (e) {
                if (!jQuery(e.target).closest(".category-menu-wrap").length) {
                    jQuery('.category-menu-wrap li').removeClass('active');
                    jQuery('.category-menu-wrap .dropdown-menu, .category-menu-wrap .mega-menu')
                        .slideUp('slow').css('display', 'none');
                }
            });
        } else {
            jQuery('.tabindex').removeAttr("tabindex");
        }
    }

    // handle Mobile Menu =======================
    let topScrolling = 0;
    let topDirection = 0;
    function handleMobileMenu() {
        if (jQuery('.footer-small').length > 0) {
            jQuery(document).ready(function ($) {
                if (window.innerWidth < 991 && document.querySelector('.footer-small')) {
                    let chckScroll = window.scrollY || document.documentElement.scrollTop;
                    let direction = chckScroll > topScrolling ? 2 : (chckScroll < topScrolling ? 1 : topDirection);
                    if (direction !== topDirection) {
                        if (direction === 2 && chckScroll > 52) {
                            document.querySelector('.footer-small').style.bottom = '-105px';
                        } else if (direction === 1) {
                            document.querySelector('.footer-small').style.bottom = '0px';
                        }
                        topDirection = direction;
                    }
                    topScrolling = chckScroll;
                }
            });
        }
    }
    function handleMobileMenuActive() {
        $(".footer-mobile-menu:not(:last-child)").children().each(function () {

        // Get current page URL
        var url = window.location.href;
        
        // remove # from URL
        url = url.substring(0, (url.indexOf("#") == -1) ? url.length : url.indexOf("#"));
        // remove parameters from URL
        url = url.substring(0, (url.indexOf("?") == -1) ? url.length : url.indexOf("?"));
        // select file name
        // url = url.substr(url.lastIndexOf("/") + 1); //if applicable then use
        
        // If file name not avilable
        if (url == '') {
            url = 'index.html';
        }
        // select href
        var href = $(this).attr('href');
        // console.log('2. ' +href)
        // Check filename
        if (url == href) {
            $('.footer-mobile-menu').removeClass('active');
            $(this).parent().addClass('active');  
        } 
        // if (url != href) {
        //     $('.footer-mobile-menu').removeClass('active');
        //     $('.footer-mobile-menu:first-child').addClass('active');
        //     return;         
        // }
    });
    }

    // Handle Popup Toggles ============  
    var handlePopupToggles = function () {
        const body = document.querySelector("body");
        const menuTogglers = document.querySelectorAll(".category-toggle, .category-toggle-mobile, .cart-toggle");
        if (menuTogglers.length > 0) {
            menuTogglers.forEach(menuToggler => {
                const target = menuToggler.getAttribute("data-target");
                const targetElement = document.querySelector(target);
                if (targetElement) {
                    menuToggler.addEventListener("click", function () {
                        body.classList.add("docker-popup-active");
                        targetElement.classList.add("popup-visible");
                    });
                    const closeButton = targetElement.querySelector(".docker-widget-close");
                    if (closeButton) {
                        closeButton.addEventListener("click", function () {
                            body.classList.remove("docker-popup-active");
                            document.querySelectorAll('.docker-widget-popup').forEach(popup => {
                                setTimeout(() => {
                                    popup.classList.remove("popup-visible");
                                }, 1000);
                            });
                        });
                    }
                    const overlay = targetElement.querySelector(".docker-overlay-layer");
                    if (overlay) {
                        overlay.addEventListener("click", function () {
                            body.classList.remove("docker-popup-active");
                            document.querySelectorAll('.docker-widget-popup').forEach(popup => {
                                setTimeout(() => {
                                    popup.classList.remove("popup-visible");
                                }, 1000);
                            });
                        });
                    }
                } else {
                    // console.error("Target element not found:", target);
                }
            });
        }

        window.addEventListener("resize", function () {
            setTimeout(() => {
                document.body.classList.remove("docker-popup-active");
                document.querySelectorAll('.docker-widget-popup').forEach(popup => {
                    popup.classList.remove("popup-visible");
                });
                // console.log("docker-popup-active removed");
            }, 100);
        });
    };


    // Handle Menu Category Popup ============
    var handleMenuCategoryToggle = function () {
        const switcherButtons = document.querySelectorAll(".switcher-tab > button");
        const productCategories = document.querySelector(".product-category-menu-mobile");
        const menuPrimary = document.querySelector(".footer_main_menu");
        if (switcherButtons.length > 0 && productCategories && menuPrimary) {
            switcherButtons.forEach(button => {
                button.addEventListener("click", function () {
                    let value = button.getAttribute('category');
                    if (value == 'menu') {
                        productCategories.classList.add("d-none");
                        menuPrimary.classList.remove("d-none");
                    } else {
                        productCategories.classList.remove("d-none");
                        menuPrimary.classList.add("d-none");
                    }
                    if (!this.classList.contains("active-bg")) {
                        this.parentElement.querySelectorAll("button").forEach(btn => {
                            btn.classList.toggle("active-bg");
                        });
                    }
                });
            });
        } else {
            // console.error("One or more required elements not found in DOM!");
        }
        // Function to handle responsive behavior
        const handleResponsiveMenu = () => {
            if (window.innerWidth >= 991) {
                productCategories.classList.remove("d-none");
                menuPrimary.classList.add("d-none");
            }
        };
        window.addEventListener("resize", handleResponsiveMenu);
    }

    // handle newsflash  =================
    var handleNewsflashSlider = function () {
        if (jQuery('.newsflash').length > 0) {
            jQuery(document).ready(function ($) {
                $(".newsflash").owlCarousel({
                    items: 1,
                    loop: true,
                    margin: 0,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    smartSpeed: 1000,
                    nav: true,
                    dots: false,
                    autoHeight: true,
                    navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                });
            });
        }
    }

    // handle Breadcrumb Categories  =================
    var handleBreadcrumbCategoriesSlider = function () {
        if (jQuery('.breadcrumb-categories-slider').length > 0) {
            jQuery(document).ready(function ($) {
                $(".breadcrumb-categories-slider").owlCarousel({
                    items: 4,
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    smartSpeed: 1000,
                    nav: true,
                    dots: false,
                    autoHeight: true,
                    animateOut: "fadeOut",
                    animateIn: "fadeIn",
                    navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                    responsive: {
                        0: {
                            items: 2,
                            nav: false
                        },
                        768: {
                            items: 4,
                            nav: false
                        },
                        991: {
                            nav: true
                        }
                    }
                });
            });
        }
    }

    // handle Progress Bar =============
    var handleProgressBar = function () {
        $(".progress-bar").each(function () {
            let $this = $(this);
            if (isScrolledIntoView($this) && !$this.hasClass("animated")) {
                $this.addClass("animated");
                let percent = $this.attr("data-percent");
                let progressFill = $this.find(".progress-fill");
                let progressText = $this.find(".circle-fill");
                let countBar = $this.find(".count-bar");
                progressFill.animate({ width: percent }, 3000);
                progressText.animate({ left: percent }, 3000);
                $({ countNum: 0 }).animate({ countNum: parseInt(percent) }, {
                    duration: 3000,
                    easing: 'linear',
                    step: function () {
                        countBar.text(Math.floor(this.countNum));
                    },
                    complete: function () {
                        countBar.text(this.countNum);
                    }
                });
            }
        });
    };
    // Scroll START function---
    function isScrolledIntoView(element) {
        let windowHeight = $(window).height();
        let elementTop = $(element).offset().top;
        let scrollTop = $(window).scrollTop();
        return elementTop < (scrollTop + windowHeight - 50);
    }

    // handle Box Hover =============
    var handleBoxHover = function () {
        const boxHover = document.querySelectorAll('.box-hover');
        if (boxHover) {
            boxHover.forEach(function (element) {
                element.addEventListener('mouseenter', function () {
                    const selector = element.parentElement.parentElement;
                    selector.querySelectorAll('.box-hover').forEach(function (element) {
                        element.classList.remove('active');
                    });
                    element.classList.add('active');
                });
            });
        }
    }

    // handle Custom Filter  ============
    var handleCustomFilter = function () {
        document.querySelectorAll(".tab-filter").forEach(filterSection => {
            const filterButtons = filterSection.querySelectorAll("a");
            const AllSection = filterSection.closest(".product-section, .team-section");
            const filterItem = AllSection.querySelectorAll(".product-filter-item, .filter_item");
            const itemSlider = AllSection.querySelectorAll(".owl-carousel");

            filterButtons.forEach(button => {
                button.addEventListener("click", function (event) {
                    event.preventDefault();
                    filterButtons.forEach(btn => btn.classList.remove("active"));
                    this.classList.add("active");

                    const filterValue = this.getAttribute("data-filter");


                    if (itemSlider.length === 0 && filterItem.length > 0) {
                        filterItem.forEach(product => {
                            product.classList.remove("zoom-in-animate");
                            if (filterValue === "all" || product.classList.contains(filterValue)) {
                                product.classList.remove("hidden");
                                void product.offsetWidth;
                                product.classList.add("zoom-in-animate");
                            } else {
                                product.classList.add("hidden");
                            }
                        });
                    } else {
                        if (itemSlider.length > 0 && typeof jQuery.fn.owlCarousel !== 'undefined') {
                            jQuery(itemSlider).trigger('destroy.owl.carousel');
                            jQuery(itemSlider).empty();
                        }

                        const filteredProducts = [...filterItem].filter(product =>
                            filterValue === "all" || product.classList.contains(filterValue)
                        );

                        filteredProducts.forEach(product => {
                            product.classList.remove("zoom-in-animate");
                            void product.offsetWidth;
                            product.classList.add("zoom-in-animate");
                            jQuery(itemSlider).append(product.outerHTML);
                        });

                        setTimeout(() => {
                            handleProductsSlider();
                            // handleTeamSlider();
                        }, 0);
                    }
                });
            });
        });
    };

    // handle Products  =================
    var handleProductsSlider = function () {
        if (jQuery('.products-slider').length > 0) {
            jQuery(document).ready(function ($) {
                if (typeof $.fn.owlCarousel !== 'undefined') {
                    $('.products-slider').each(function () {
                        var owl = $(this).owlCarousel({
                            items: 4,
                            loop: false,
                            margin: 4,
                            // autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: true,
                            smartSpeed: 1000,
                            nav: false,
                            dots: false,
                            autoHeight: true,
                            animateOut: 'fadeOut',
                            animateIn: 'fadeIn',
                            responsive: {
                                0: {
                                    items: 2
                                },
                                400: {
                                    items: 3,
                                    margin: 6
                                },
                                768: {
                                    items: 3,
                                    margin: 6
                                },
                                1200: {
                                    items: 4,
                                    // loop: false,
                                    margin: 10
                                },
                            }
                        });
                        var container = $(this).closest('.col-lg-12').prev();
                        var prevBtn = container.find('.custom-prev');
                        var nextBtn = container.find('.custom-next');

                        function updateButtonState() {
                            var totalItems = owl.find('.owl-item').length;
                            if (totalItems <= 4) {
                                prevBtn.prop('disabled', true)
                                    .attr('title', 'No More')
                                    .attr('data-bs-original-title', 'No More')
                                    .attr('aria-label', 'No More');

                                nextBtn.prop('disabled', true)
                                    .attr('title', 'No More')
                                    .attr('data-bs-original-title', 'No More')
                                    .attr('aria-label', 'No More');
                            } else {
                                prevBtn.prop('disabled', false)
                                    .removeAttr('title')
                                    .removeAttr('data-bs-original-title')
                                    .removeAttr('aria-label');

                                nextBtn.prop('disabled', false)
                                    .removeAttr('title')
                                    .removeAttr('data-bs-original-title')
                                    .removeAttr('aria-label');
                            }
                        }
                        $('[title]').tooltip({ trigger: 'hover' });

                        updateButtonState();

                        prevBtn.off('click').on('click', function () {
                            owl.trigger('prev.owl.carousel');
                        });
                        nextBtn.off('click').on('click', function () {
                            owl.trigger('next.owl.carousel');
                        });
                        owl.on('changed.owl.carousel', function () {
                            updateButtonState();
                        });
                    });
                } else {
                    console.error("Owl Carousel is not loaded.");
                }
            });
        }
    };

    // handle Products Detail Slider  ============
    var handleProductsDetailSlider = function () {
        if (jQuery('.products-detail-slider').length > 0) {
            jQuery(document).ready(function ($) {
                if (typeof $.fn.owlCarousel !== 'undefined') {
                    $('.products-detail-slider').each(function () {
                        var owl = $(this).owlCarousel({
                            items: 3,
                            loop: true,
                            margin: 8,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: true,
                            smartSpeed: 1000,
                            nav: false,
                            dots: false,
                            autoHeight: true,
                            animateOut: 'fadeOut',
                            animateIn: 'fadeIn',
                            responsive: {
                                575: {
                                    margin: 15,
                                },
                                768: {
                                    margin: 25,
                                }
                            }
                        });
                        var container = $(this).closest('.row');
                        container.find('.custom-prev').off('click').on('click', function () {
                            owl.trigger('prev.owl.carousel');
                        });
                        container.find('.custom-next').off('click').on('click', function () {
                            owl.trigger('next.owl.carousel');
                        });
                    });
                } else {
                    console.error("Owl Carousel is not loaded.");
                }
            });
        }
    }


    // handleCategoriesBannerSlider ==============
    var handleCategoriesBannerSlider = function () {
        if (jQuery('.hot-deal-section').length > 0) {
		const sliderThumbs = new Swiper('.thumbs-hot-deal .swiper-container', {
		direction: 'vertical',
		slidesPerView: 5,
		mousewheel: true,
		spaceBetween: 15,
		navigation: {
			nextEl: '.slider__next',
			prevEl: '.slider__prev'
		},
		freeMode: true,
		scrollbar: {
			el: ".swiper-scrollbar",
			hide: true,
		},
		breakpoints: {
			0: {
				direction: 'horizontal',
				spaceBetween: 0
			},
			991: {
				direction: 'vertical',
				spaceBetween: 15
			}
		}
	});
	const sliderImages = new Swiper('.hot-deal-slider .swiper-container', {
		direction: 'vertical',
		slidesPerView: 1,
		spaceBetween: 0,
		effect: 'fade',
		speed: 2000,
		mousewheel: false,
		navigation: {
			nextEl: '.slider__next',
			prevEl: '.slider__prev'
		},
		autoplay: {
			delay: 5000,
			disableOnInteraction: false,
		},
		grabCursor: false,
		thumbs: {
			swiper: sliderThumbs
		},
		breakpoints: {
			0: {
				direction: 'horizontal',
				mousewheel: false,
			},
			991: {
				direction: 'vertical',
			}
		}
	});
        }
    }

    // More Category Menu
    function toggleCategoryMenu(categoryLimit) {
        let menuList = document.querySelector('.product-category-menus-list ul.main-menu');
        if (!menuList) {
            //console.error("Menu list not found!");
            return;
        }
        let menuItems = Array.from(menuList.children).filter(item => !item.classList.contains('more-item'));
        if (menuItems.length <= categoryLimit) {
            // console.warn("Not enough menu items to apply toggle.");
            return;
        }
        let moreItem = menuList.querySelector('.more-item');

        if (!moreItem) {
            moreItem = document.createElement('li');
            moreItem.className = "menu-item more-item";
            moreItem.innerHTML = '<button type="button" class="browse-more">More Category</button>';
            menuList.appendChild(moreItem);
        }
        menuItems.forEach((item, index) => {
            if (index >= categoryLimit) {
                item.style.display = 'none';
            }
        });

        moreItem.querySelector(".browse-more").addEventListener('click', function () {
            let browseMore = this;
            let hiddenItems = menuItems.filter(item => item.style.display === 'none');

            if (!browseMore.classList.contains("active")) {
                browseMore.classList.add("active");
                hiddenItems.forEach(item => item.style.display = 'block');
                browseMore.innerHTML = 'No More';
            } else {
                browseMore.classList.remove("active");
                menuItems.forEach((item, index) => {
                    if (index >= categoryLimit) {
                        item.style.display = 'none';
                    }
                });
                browseMore.innerHTML = 'More Category';
            }
        });
    }

    // Search Animation
    function initSearchAnimation() {
        document.querySelectorAll('.spinnnn').forEach((ulEl) => {
            const listItems = ulEl.querySelectorAll('li');
            let index_number = 1;
            let activeIndex = 1;
            let newActiveEl = ulEl.querySelector('li:nth-child(1)');
            const rotate = -360 / listItems.length;
            ulEl.style.setProperty("--current_index", '0');
            newActiveEl.classList.add("active");
            function initialize() {
                listItems.forEach((item, idx) => {
                    item.style.setProperty("--item_index", idx);
                });
                ulEl.style.setProperty("--rotateDegrees", rotate);
            }
            function rotateItems() {
                ulEl.style.setProperty("--current_index", index_number);
                const activeEl = ulEl.querySelector("li.active");
                if (activeEl) activeEl.classList.remove("active");
                activeIndex = (index_number + listItems.length) % listItems.length;
                newActiveEl = ulEl.querySelector(`li:nth-child(${activeIndex + 1})`);
                newActiveEl.classList.add("active");
                index_number++;
            }
            initialize();
            setInterval(rotateItems, 5000);
        });
    }

    // Show / Hide Placeholder (For Multiple Inputs)
    function initSearchPlaceholders() {
        document.querySelectorAll('.header-search-input').forEach((searchInput) => {
            const placeholderText = searchInput.parentElement.querySelector('.placeholder');
            if (!placeholderText) return;
            searchInput.addEventListener('focus', function () {
                placeholderText.style.display = 'none';
            });
            searchInput.addEventListener('blur', function () {
                if (searchInput.value.trim() === '') {
                    placeholderText.style.display = 'flex';
                }
            });
            placeholderText.addEventListener('click', function () {
                searchInput.focus();
                placeholderText.style.display = 'none';
            });
        });
    }

    // Start Countdown --------------
    function startCountdown() {
        let timers = document.querySelectorAll(".timer-container");
        let timers2 = document.querySelectorAll(".grocery_ct-countdown");
        if (timers2.length > 0) {
            timers2.forEach(timer => {
                const targetDate = new Date(timer.getAttribute("data-timer")).getTime();
                const countdownElements = timer.querySelectorAll(".grocery_ct-timer > span");
                function updateTimer() {
                    const now = new Date().getTime();
                    const timeLeft = targetDate - now;

                    if (timeLeft > 0) {
                        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                        countdownElements[0].innerHTML = `<span>${splitText(String(days).padStart(2, '0'))}</span><span>DAY</span>`;
                        countdownElements[1].innerHTML = `<span>${splitText(String(hours).padStart(2, '0'))}</span><span>HRS</span>`;
                        countdownElements[2].innerHTML = `<span>${splitText(String(minutes).padStart(2, '0'))}</span><span>MIN</span>`;
                        countdownElements[3].innerHTML = `<span>${splitText(String(seconds).padStart(2, '0'))}</span><span>SEC</span>`;
                    } else {
                        timer.innerHTML = "<h2>We are live now!</h2>";
                    }
                }
                updateTimer();
                setInterval(updateTimer, 1000);
            });
            function splitText(word) {
                let dayHtml = '';
                for (let i = 0; i < word.length; i++) {
                    dayHtml += `<span>${word[i]}</span>`;
                }
                return dayHtml;
            }
        } else {
            timers.forEach(timer => {
                let targetDate = new Date(timer.getAttribute("data-timer")).getTime();
                let countdownElements = timer.querySelectorAll(".dealsofday-count h6");
                function updateTimer() {
                    let now = new Date().getTime();
                    let timeLeft = targetDate - now;
                    if (timeLeft > 0) {
                        let days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                        let hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        let minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                        let seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                        countdownElements[0].innerText = String(days).padStart('0', 2);
                        countdownElements[1].innerText = String(hours).padStart('0', 2);
                        countdownElements[2].innerText = String(minutes).padStart('0', 2);
                        countdownElements[3].innerText = String(seconds).padStart('0', 2);
                    } else {
                        timer.innerHTML = "<h2>We are live now!</h2>";
                    }
                }
                updateTimer();
                setInterval(updateTimer, 1000);
            });
        }
    }

    // Scroll To Top ============
    var handleScrollTop = function () {
        const scrollTops = document.querySelectorAll('.scrollup');
        if (scrollTops.length > 0) {
            scrollTops.forEach(scrollTopBtn => {
                if (!scrollTopBtn.querySelector('#scroll-percentage')) {
                    const span = document.createElement('span');
                    span.id = 'scroll-percentage';
                    scrollTopBtn.appendChild(span);
                }
            });
            window.addEventListener('scroll', function () {
                const scrollEl = window.scrollY;
                const scrollTop = scrollEl || document.documentElement.scrollTop;
                const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrollPercent = (scrollTop / docHeight) * 100;

                scrollTops.forEach(scrollTopBtn => {
                    const scrollPercentageEl = scrollTopBtn.querySelector('#scroll-percentage');
                    if (scrollEl > 500) {
                        scrollTopBtn.classList.add('is-active');
                    } else {
                        scrollTopBtn.classList.remove('is-active');
                    }
                    // Update background
                    scrollTopBtn.style.background = `conic-gradient(var(--sp-primary2) ${scrollPercent}%, var(--sp-primary) ${scrollPercent}%)`;
                    // Update span text
                    if (scrollPercentageEl) {
                        scrollPercentageEl.textContent = `${Math.floor(scrollPercent)}%`;
                    }
                });
            });

            // Scroll to top on button click
            scrollTops.forEach(scrollTop => {
                scrollTop.addEventListener('click', function () {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            });
        }
    };

    // Marquee  =====================
    var handleMarquee = function () {
        const marquees = document.querySelectorAll('.mrq-loop');
        marquees.forEach(marquee => {
            const ul = marquee.querySelector('ul');
            if (ul) {
                ul.innerHTML += ul.innerHTML;
                let direction = marquee.getAttribute("direction") || "left";
                let baseSpeed = marquee.getAttribute("scrollamount") || "20";
                let speed = window.innerWidth <= 768 ? baseSpeed * 4 : baseSpeed;
                let duration = `${100 / speed * 10}s`;
                let animationName = direction === "right" ? "marquee-right" : "marquee-left";
                ul.style.animation = `${animationName} ${duration} linear infinite`;
            }
        });
    };
    // Counter Number ============ 
    var counter = function () {
        if (jQuery('.counter').length) {
            jQuery('.counter').counterUp({
                delay: 100,
                time: 5000
            });
        }
    }

    // handle Client Review Slider =========
    var handleClientReviewSlider = function () {
        if (jQuery('.client-review-slider').length > 0) {
            jQuery(document).ready(function ($) {
                $(".client-review-slider").owlCarousel({
                    items: 4,
                    loop: false,
                    margin: 25,
                    autoplay: false,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    smartSpeed: 1000,
                    nav: false,
                    dots: false,
                    autoHeight: true,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        450: {
                            items: 2,
                        },
                        767: {
                            items: 3,
                        },
                        991: {
                            items: 4,
                        }
                    }
                });
            });
        }
    }
    // handle Award  =================
    var handleAwardSlider = function () {
        if (jQuery('.award-slider').length > 0) {
            jQuery(document).ready(function ($) {
                $(".award-slider").owlCarousel({
                    items: 4,
                    loop: true,
                    margin: 120,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    smartSpeed: 1000,
                    nav: false,
                    dots: false,
                    autoHeight: true,
                    responsive: {
                        0: {
                            margin: 20,
                        },
                        425: {
                            margin: 40,
                        },
                        767: {
                            margin: 80,
                        },
                        991: {
                            margin: 120,
                        }
                    }
                });
            });
        }
    }


    // handle CustomTab  ============
    var handleCustomTab = function () {
        document.querySelectorAll(".toggle-group").forEach(group => {
            const toggles = group.querySelectorAll(".clcik-toggle");
            const groupName = group.getAttribute("data-group");
            const sections = document.querySelectorAll(`.custom-tab[data-group='${groupName}']`);
            toggles.forEach(toggle => {
                toggle.addEventListener("click", function () {
                    toggles.forEach(el => el.classList.remove("active"));
                    sections.forEach(sec => sec.classList.remove("active"));

                    this.classList.add("active");
                    document.getElementById(this.getAttribute("data-target")).classList.add("active");
                });
            });

            // Default Active State
            if (toggles.length > 0) {
                toggles[0].classList.add("active");
                sections[0].classList.add("active");
            }
        });
    };

    // handle Grid List Toggle  ============
    var handleGridListToggle = function () {
        if (jQuery('.gridlistToggle').length > 0) {
            document.querySelectorAll('.gridlistToggle').forEach(item => {
                item.addEventListener('click', function () {
                    document.querySelectorAll('.gridlistToggle').forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    var productList = document.querySelector('.products');
                    if (productList) {
                        productList.classList.remove('grid2', 'grid3', 'list');
                        if (this.id === 'grid2') {
                            productList.classList.add('grid2');
                        } else if (this.id === 'grid3') {
                            productList.classList.add('grid3');
                        } else if (this.id === 'list') {
                            productList.classList.add('list');
                        }
                    }
                });
            });
        }
    };
	
    // handle Bubbly Effect  ============
    function BubblyEffect() {
        var elements = document.getElementsByClassName('bubbly-effect');
        for (var i = 0; i < elements.length; i++) {
            elements[i].addEventListener('mouseover', function (e) {
                e.target.classList.add('animate');
                setTimeout(() => {
                    e.target.classList.remove('animate');
                }, 450);
            });
        }
    }
    // Ripple Bg Effect ==============
    function rippleEffect() {
        if ($(".ripple-area").length > 0) {
            $(".ripple-area").ripples({
                resolution: 512,
                dropRadius: 20,
                perturbance: 0.04,
            });
            console.log(1212);
        }
    }
    // handle Input Number  ============
    function handleInputNumber() {
        jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up"><i class="fa fa-angle-up"></i></div><div class="quantity-button quantity-down"><i class="fa fa-angle-down"></i></div></div>').insertAfter('.quantity input');
        jQuery('.quantity').each(function () {
            var spinner = jQuery(this),
                input = spinner.find('input[type="number"]'),
                btnUp = spinner.find('.quantity-up'),
                btnDown = spinner.find('.quantity-down'),
                min = input.attr('min'),
                max = input.attr('max');

            btnUp.click(function () {
                var oldValue = parseFloat(input.val());
                if (oldValue >= max) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue + 1;
                }
                spinner.find("input").val(newVal);
                spinner.find("input").trigger("change");
            });

            btnDown.click(function () {
                var oldValue = parseFloat(input.val());
                if (oldValue <= min) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue - 1;
                }
                spinner.find("input").val(newVal);
                spinner.find("input").trigger("change");
            });

        });
    }

    // handle Trap Focus  ============
    var handleTrapFocus = function (focusDelay = 0) {
        let $containers = $('.docker-widget-popup.docker-left, .docker-widget-popup.docker-left.docker-mobile, .docker-widget-popup.docker-right');

        $containers.each(function () {
            let $container = $(this);
            let tabbable = $container
                .find('select, input, textarea, button, a, [href], [tabindex]:not([tabindex="-1"])')
                .filter(':visible');

            if (tabbable.length === 0) return;

            let firstTabbable = tabbable.first();
            let lastTabbable = tabbable.last();

            setTimeout(() => {
                firstTabbable.focus();
            }, focusDelay);

            firstTabbable.off('keydown.trap').on('keydown.trap', function (e) {
                if (e.which === 9 && e.shiftKey) {
                    e.preventDefault();
                    lastTabbable.focus();
                }
            });

            lastTabbable.off('keydown.trap').on('keydown.trap', function (e) {
                if (e.which === 9 && !e.shiftKey) {
                    e.preventDefault();
                    firstTabbable.focus();
                }
            });
        });
    }
	
	// handle Post  ============
    var handlePostSlider = function () {
        if (jQuery('.post-slider').length > 0) {
			$('.post-slider').each(function () {
				var owl = $(this).owlCarousel({
					items: 1,
					loop: true,
					margin: 10,
					autoplay: true,
					autoplayTimeout: 3000,
					autoplayHoverPause: true,
					smartSpeed: 1000,
					nav: false,
					dots: false,
					autoHeight: true,
					animateOut: 'fadeOut',
					animateIn: 'fadeIn',
					responsive: {
						768: {
							items: 2
						},
						991: {
							items: 3,
							margin: 12
						}
					}
				});
				var container = $(this).closest('.col-lg-12').prev();
				container.find('.custom-prev').off('click').on('click', function () {
					owl.trigger('prev.owl.carousel');
				});
				container.find('.custom-next').off('click').on('click', function () {
					owl.trigger('next.owl.carousel');
				});
			});
		}
    }

    /* Function ============ */
    return {
        init: function () {
			handleMainslider();
			handleCategoryslider();
            handlePreloaderOnClick();
            handleStickyHeader();
            handlePasswordInput();
            handleHeaderMenu();
            handleProductCategoryMenus();
            handleNewsflashSlider();
            handleBreadcrumbCategoriesSlider();            
            handleProgressBar();
            handleCustomFilter();
            handleBoxHover();
            handleProductsSlider();
            handleCategoriesBannerSlider();
            handlePopupToggles();
            handleMenuCategoryToggle();
			/* Category Count */
            toggleCategoryMenu(MyAjax.category_limit);
            initSearchAnimation();
            initSearchPlaceholders();
            startCountdown();
            handleMarquee();
            handleClientReviewSlider();
            handleAwardSlider();
            handleCustomTab();
            handleGridListToggle();
            handleProductsDetailSlider();
            BubblyEffect();
            handleMobileMenuActive();
            rippleEffect();
            handleInputNumber();
            handleTrapFocus();
			handlePostSlider();
        },

        load: function () {
            counter();
        },

        resize: function () {
            screenWidth = $(window).width();
            handleHeaderMenu();
        },

        scroll: function () {
            setTimeout(() => {
                handleMobileMenu();
            }, 0)
            handleScrollTop();
        }
    }
}();


/* Document.ready Start */
document.addEventListener('DOMContentLoaded', function () {
    appStart.init();
    initCustomUIcommen();
    initCustomPaymentMethod();
});
/* Document.ready END */

/* Window Load START */
window.addEventListener('load', function () {
    appStart.load();
});
/* Window Load END */

/* Window Resize START */
window.addEventListener('resize', function () {
    appStart.resize();
});
/*  Window Resize END */

/* Window Scroll START */
window.addEventListener("scroll", function () {
    appStart.scroll();
});
/*  Window Scroll END */




function initCustomUIcommen() {
    // Address 2 Toggle
    const toggleButton = document.querySelector(".wc-block-components-address-form__address_2-toggle");
    const inputContainer = document.querySelector(".wc-block-components-address-form__address_2");
    if (toggleButton && inputContainer) {
        inputContainer.style.display = "none";
        toggleButton.addEventListener("click", function () {
            toggleButton.style.display = "none";
            inputContainer.style.display = "block";
        });
    }

    // Checkbox-controlled textarea
    const checkbox = document.getElementById("checkbox-control-1");
    const textarea = document.querySelector(".wc-block-components-textarea");
    if (checkbox && textarea) {
        textarea.style.display = "none";
        checkbox.addEventListener("change", function () {
            textarea.style.display = checkbox.checked ? "block" : "none";
        });
    }

    // Panel toggle buttons
    const toggleButtons = document.querySelectorAll(".wc-block-components-panel__button");
    toggleButtons.forEach(function (button) {
        const content = button.nextElementSibling;
        const isExpanded = button.getAttribute("aria-expanded") === "true";
        if (content) {
            content.style.display = isExpanded ? "block" : "none";
            button.addEventListener("click", function () {
                const currentlyVisible = content.style.display === "block";
                content.style.display = currentlyVisible ? "none" : "block";
                button.setAttribute("aria-expanded", !currentlyVisible);
            });
        }
    });
}

// Payment method accordion behavior
function initCustomPaymentMethod() {
    const radioButtons = document.querySelectorAll('input[name="radio-control-wc-payment-method-options"]');
    radioButtons.forEach(radio => {
        radio.addEventListener('change', () => {
            updateAccordionDisplay(radio);
        });
        if (radio.checked) {
            updateAccordionDisplay(radio);
        }
    });
    function updateAccordionDisplay(selectedRadio) {
        document.querySelectorAll('.wc-block-components-radio-control-accordion-option').forEach(option => {
            option.classList.remove('wc-block-components-radio-control-accordion-option--checked-option-highlighted');
            const content = option.querySelector('.wc-block-components-radio-control-accordion-content');
            if (content) {
                content.style.height = '0';
                content.style.opacity = '0';
                content.style.paddingTop = '0';
                content.style.paddingBottom = '0';
            }
        });
        const selectedOption = selectedRadio.closest('.wc-block-components-radio-control-accordion-option');
        if (selectedOption) {
            selectedOption.classList.add('wc-block-components-radio-control-accordion-option--checked-option-highlighted');
            const contentBox = selectedOption.querySelector('.wc-block-components-radio-control-accordion-content');
            if (contentBox) {
                contentBox.style.height = 'auto';
                let fullHeight = contentBox.scrollHeight + 20 + 'px';
                contentBox.style.height = '0';
                requestAnimationFrame(() => {
                    contentBox.style.height = fullHeight;
                    contentBox.style.opacity = '1';
                    contentBox.style.paddingTop = '0.5em';
                    contentBox.style.paddingBottom = '16px';
                });
            }
        }
    }
}
})(jQuery);