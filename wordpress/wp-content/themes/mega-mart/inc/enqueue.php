<?php
 /**
 * Enqueue scripts and styles.
 */
function mega_mart_scripts() {
	
	// Styles
	wp_enqueue_style('mega-mart-animate-min', get_template_directory_uri() . '/assets/css/animate.min.css');
	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/all.min.css');
	
	wp_enqueue_style('owl-carousel-min',get_template_directory_uri().'/assets/vendor/owlCarousel/owl.carousel.min.css');
	
	wp_enqueue_style('swiper-bundle-min',get_template_directory_uri().'/assets/vendor/swiper/swiper-bundle.min.css');
	
	wp_enqueue_style('bootstrap',get_template_directory_uri().'/assets/vendor/bootstrap/css/bootstrap.min.css');
	
	wp_enqueue_style('mega-mart-default', get_template_directory_uri() . '/assets/css/default.css');
	
	wp_enqueue_style('mega-mart-editor',get_template_directory_uri().'/assets/css/editor-style.css');
	
	wp_enqueue_style('mega-mart-theme',get_template_directory_uri().'/assets/css/theme.css');
	
	wp_enqueue_style('mega-mart-meanmenu',get_template_directory_uri().'/assets/css/meanmenu.css');
	
	wp_enqueue_style('mega-mart-main-min', get_template_directory_uri() . '/assets/css/main.css');	
	
	wp_enqueue_style('mega-mart-widgets',get_template_directory_uri().'/assets/css/widgets.css');
	
	wp_enqueue_style('mega-mart-lagecy-widgets',get_template_directory_uri().'/assets/css/lagecy-widgets.css');
	
	wp_enqueue_style('mega-mart-block-widgets',get_template_directory_uri().'/assets/css/block-widgets.css');
	
	wp_enqueue_style('mega-mart-media-query', get_template_directory_uri() . '/assets/css/responsive.css');	
	
	wp_enqueue_style( 'mega-mart-style', get_stylesheet_uri() );

	// Scripts
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script('wow-min', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), false , array(true, 'strategy'=>'defer'));
	
	wp_enqueue_script('ripples-min', get_template_directory_uri() . '/assets/js/jquery.ripples.min.js', array('jquery'), false , array(true, 'strategy'=>'defer'));
	
	wp_enqueue_script('gsap', get_template_directory_uri() . '/assets/vendor/gsap/gsap.js', array('jquery'), false , array(true, 'strategy'=>'defer'));
	
	wp_enqueue_script('gsap-animation', get_template_directory_uri() . '/assets/vendor/gsap/gsap-animation.js', array('jquery'), false , array(true, 'strategy'=>'defer'));
	
	wp_enqueue_script('bootstrap-min', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), false , array(true, 'strategy'=>'defer'));
	
	wp_enqueue_script('owl-carousel-min', get_template_directory_uri() . '/assets/vendor/owlCarousel/owl.carousel.min.js', array('jquery'), false , false);
	
	wp_enqueue_script('waypoints-min', get_template_directory_uri() . '/assets/vendor/counter/waypoints.min.js', array('jquery'), false , array(true, 'strategy'=>'defer'));
	
	wp_enqueue_script('counterup-min', get_template_directory_uri() . '/assets//vendor/counter/counterup.min.js', array('jquery'), false , array(true, 'strategy'=>'defer'));
	
	wp_enqueue_script('swiper-bundle', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array('jquery'), false , array(true, 'strategy'=>'defer'));
	
	wp_enqueue_script('get-time-remaining', get_template_directory_uri() . '/assets/js/get-time-remaining.js', array('jquery'), false , array(true, 'strategy'=>'defer'));
		
	wp_enqueue_script('mega-mart-custom-min', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), false , array(true, 'strategy'=>'defer'));
	
	wp_enqueue_script( 'mega-mart-ajax-script', get_template_directory_uri() . '/assets/js/mega-mart-quick-view.js', array('jquery'), '1.0.0', array(true, 'strategy'=>'defer') );
	
	$category_limit	= get_theme_mod( 'category_limit','8');
	 wp_localize_script( 'mega-mart-ajax-script', 'MyAjax', array(
		// URL to wp-admin/admin-ajax.php to process the request
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'category_limit' => $category_limit,
		// generate a nonce with a unique ID "myajax-post-comment-nonce"
		// so that you can check it later when an AJAX request is sent
		'security' => wp_create_nonce( 'my-special-string' )
	  ));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mega_mart_scripts' );