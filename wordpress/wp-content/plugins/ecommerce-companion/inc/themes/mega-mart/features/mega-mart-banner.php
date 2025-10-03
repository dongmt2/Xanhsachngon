<?php
function mega_mart_banner_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Banner Section
	=========================================*/
	$wp_customize->add_section(
		'banner_setting', array(
			'title' => esc_html__( 'Banner Section', 'ecommerce-companion' ),
			'priority' => 6,
			'panel' => 'mega_mart_frontpage_sections',
		)
	);

	// Banner Show/Hide // 
	$wp_customize->add_setting(
		'banner_hs'
			,array(
			'default'			=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'banner_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Show/Hide','ecommerce-companion'),
			'section' => 'banner_setting',
		)
	);
	
	/*=========================================
	Header
	=========================================*/
	$wp_customize->add_setting(
		'product_banner_header'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'product_banner_header',
		array(
			'type' => 'hidden',
			'label' => __('Header','ecommerce-companion'),
			'section' => 'banner_setting',
		)
	);
	
	//  Title // 
	$wp_customize->add_setting(
    	'banner_price_label',
    	array(
	        'default'			=> __('20','ecommerce-companion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
			// 'transport'         => $selective_refresh,
			'priority' => 2,
		)
	);	
	
	$wp_customize->add_control( 
		'banner_price_label',
		array(
		    'label'   => __('Price Amount','ecommerce-companion'),
		    'section' => 'banner_setting',
			'type'    => 'text',
		)  
	);	
	
	$wp_customize->add_setting(
    	'banner_price_unit',
    	array(
	        'default'			=> '%',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
			// 'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'banner_price_unit',
		array(
		    'label'   => __('Price Unit','ecommerce-companion'),
		    'section' => 'banner_setting',
			'type'           => 'text',
		)  
	);
	
	$wp_customize->add_setting(
    	'banner_price_text',
    	array(
	        'default'			=> 'Discount',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
			// 'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'banner_price_text',
		array(
		    'label'   => __('Price Text','ecommerce-companion'),
		    'section' => 'banner_setting',
			'type'           => 'text',
		)  
	);
	
	$wp_customize->add_setting(
    	'banner_text',
    	array(
	        'default'			=> 'Limited Time Offer',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
			// 'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'banner_text',
		array(
		    'label'   => __('Text','ecommerce-companion'),
		    'section' => 'banner_setting',
			'type'           => 'text',
		)  
	);
	
	//  Banner Content  // 
	$wp_customize->add_setting(
		'banner_title_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'banner_title_head',
		array(
			'type' => 'hidden',
			'label' => __('Main Content','ecommerce-companion'),
			'section' => 'banner_setting',
		)
	);
	
	$wp_customize->add_setting(
    	'banner_title',
    	array(
	        'default'			=> __('Daily Grocery','ecommerce-companion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
			// 'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'banner_title',
		array(
		    'label'   => __('Title','ecommerce-companion'),
		    'section' => 'banner_setting',
			'type'           => 'text',
		)  
	);	
	
	$wp_customize->add_setting(
    	'banner_subtitle',
    	array(
	        'default'			=> __('Saturday Night Weekend Deal!','ecommerce-companion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
			// 'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'banner_subtitle',
		array(
		    'label'   => __('Subtitle','ecommerce-companion'),
		    'section' => 'banner_setting',
			'type'           => 'text',
		)  
	);	
	
	/* Images */
	$wp_customize->add_setting( 
		'banner_img' , 
		array(
			'default'			=> esc_url(ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/mega-mart/assets/images/cta/product-img.png'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_url',
		) 
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'banner_img' ,
		array(
			'label'          => esc_html__( 'Image', 'ecommerce-companion'),
			'section'        => 'banner_setting'
		) 
	));
	
	/* Background Images */
	$wp_customize->add_setting( 
		'banner_bg_img' , 
		array(
			'default'			=> esc_url(ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/mega-mart/assets/images/cta/background.jpg'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_url',
		) 
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'banner_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'ecommerce-companion'),
			'section'        => 'banner_setting'
		) 
	));	
}

add_action( 'customize_register', 'mega_mart_banner_setting' );

// selective refresh
function mega_mart_product_banner_section_partials( $wp_customize ){
	
	// product_banner_ttl
	$wp_customize->selective_refresh->add_partial( 'banner_price_text', array(
		'selector'            => '.discount-banner .discount',
		'settings'            => 'banner_price_text',
		'render_callback'  => 'mega_mart_product_banner_ttl_render_callback',
	) );
	
	// banner_subtitle
	$wp_customize->selective_refresh->add_partial( 'banner_subtitle', array(
		'selector'            => '.discount-banner .text-animation.text-primary2',
		'settings'            => 'banner_subtitle',
		'render_callback'  => 'mega_mart_product_banner_subttl_render_callback',
	) );
	
	}

add_action( 'customize_register', 'mega_mart_product_banner_section_partials' );

// product_banner_ttl
function mega_mart_product_banner_ttl_render_callback() {
	return get_theme_mod( 'banner_title' );
}

// banner_subtitle
function mega_mart_product_banner_subttl_render_callback() {
	return get_theme_mod( 'banner_subtitle' );
}