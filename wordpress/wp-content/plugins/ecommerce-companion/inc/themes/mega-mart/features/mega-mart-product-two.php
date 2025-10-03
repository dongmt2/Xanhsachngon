<?php
function mega_mart_product_two_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Feature Product  Section
	=========================================*/
	$wp_customize->add_section(
		'product_two_setting', array(
			'title' => esc_html__( 'Product Two Section', 'ecommerce-companion' ),
			'panel' => 'mega_mart_frontpage_sections',
			'priority' => 7,
		)
	);
	
	// Hide/Show Tab
	$wp_customize->add_setting(
		'product_two_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'product_two_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide/Show','ecommerce-companion'),
			'section' => 'product_two_setting',
		)
	);
	/*=========================================
	Header
	=========================================*/
	$wp_customize->add_setting(
		'product_two_header'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'product_two_header',
		array(
			'type' => 'hidden',
			'label' => __('Header','ecommerce-companion'),
			'section' => 'product_two_setting',
		)
	);
	
	//  Title // 
	$wp_customize->add_setting(
    	'product_two_title',
    	array(
	        'default'			=> __('Hot Deal :','ecommerce-companion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
			//'transport'         => $selective_refresh,
			'priority' => 2,
		)
	);	
	
	$wp_customize->add_control( 
		'product_two_title',
		array(
		    'label'   => __('Title','ecommerce-companion'),
		    'section' => 'product_two_setting',
			'type'    => 'text',
		)  
	);	
	
	//  Heading Text // 
	$wp_customize->add_setting(
    	'product_two_heading_text',
    	array(
	        'default'			=> __('Don\'t Miss Out! Grab the Best Deals Before They\'re Gone!','ecommerce-companion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
			//'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'product_two_heading_text',
		array(
		    'label'   => __('Subtitle','ecommerce-companion'),
		    'section' => 'product_two_setting',
			'type'           => 'text',
		)  
	);
	
	//Timer	
	$wp_customize->add_setting(
		'product_two_time_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'product_two_time_head',
		array(
			'type' => 'hidden',
			'label' => __('Time','ecommerce-companion'),
			'section' => 'product_two_setting',
		)
	);
	
	$wp_customize->add_setting(
    	'product_two_date',
    	array(
	        'default'			=> __('2026-01-01','ecommerce-companion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
		)
	);	
	$wp_customize->add_control( 
		'product_two_date',
		array(
		    'section' => 'product_two_setting',
			'type'     => 'date',
		)  
	);
	
	$wp_customize->add_setting(
    	'product_two_time',
    	array(
	        'default'			=> __('00:00','ecommerce-companion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
		)
	);
	
	$wp_customize->add_control( 
		'product_two_time',
		array(
		    'section' => 'product_two_setting',
			'type'     => 'time',
		)  
	);
	
	//  Button // 
	$wp_customize->add_setting(
		'product_two_button_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'product_two_button_head',
		array(
			'type' => 'hidden',
			'label' => __('Button','ecommerce-companion'),
			'section' => 'product_two_setting',
		)
	);
	
	$wp_customize->add_setting(
    	'product_two_button_title',
    	array(
	        'default'			=> __('Wrap Coupon ?','ecommerce-companion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
			//'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'product_two_button_title',
		array(
		    'label'   => __('Button Label','ecommerce-companion'),
		    'section' => 'product_two_setting',
			'type'           => 'text',
		)  
	);	
	
	$wp_customize->add_setting(
    	'product_two_button_link',
    	array(
	        'default'			=> __('','ecommerce-companion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_url',
			//'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'product_two_button_link',
		array(
		    'label'   => __('Link','ecommerce-companion'),
		    'section' => 'product_two_setting',
			'type'           => 'text',
		)  
	);	
	
	$wp_customize->add_setting(
		'product_two_newtab'
			,array(
			'default'     	=> 'yes',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'product_two_newtab',
		array(
			'type' => 'checkbox',
			'label' => __('Open Link In New Tab','ecommerce-companion'),
			'section' => 'product_two_setting',
		)
	);
	
	$wp_customize->add_setting(
		'product_two_nofollow'
			,array(
			'default'     	=> 'yes',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'product_two_nofollow',
		array(
			'type' => 'checkbox',
			'label' => __('Add "nofollow" To Link','ecommerce-companion'),
			'section' => 'product_two_setting',
		)
	);
	
	/*=========================================
	Content
	=========================================*/
	$wp_customize->add_setting(
    	'product_two_section_title',
    	array(
	        'default'			=> __('Snacks & Beverages','ecommerce-companion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
			//'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'product_two_section_title',
		array(
		    'label'   => __('Section Title','ecommerce-companion'),
		    'section' => 'product_two_setting',
			'type'           => 'text',
		)  
	);
	
	$banner_box = [
		'one' => ['title' =>'Organic Vegetables' , 'text' => 'Best Foods For Your Family','image'=> ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/mega-mart/assets/images/product/two/banner1.png'],
		'two' => ['title' =>'Fresh Ripe Strawberries' , 'text' => 'Tasty & Good For Health', 'image' => ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/mega-mart/assets/images/product/two/banner2.png'],
	];
	
	foreach($banner_box as $key => $value) {
	$wp_customize->add_setting(
		'product_two_contentf'.$key
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'product_two_contentf'.$key,
		array(
			'type' => 'hidden',
			'label' => __('Banner '.$key,'ecommerce-companion'),
			'section' => 'product_two_setting',
		)
	);
	
		$wp_customize->add_setting(
			'product_two_banner_'.$key.'_title',
			array(
				'default'			=> __($value['title'],'ecommerce-companion'),
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mega_mart_sanitize_html',
				//'transport'         => $selective_refresh,
			)
		);	
		
		$wp_customize->add_control( 
			'product_two_banner_'.$key.'_title',
			array(
				'label'   => __('Banner Title '.$key,'ecommerce-companion'),
				'section' => 'product_two_setting',
				'type'           => 'text',
			)  
		);
		
		$wp_customize->add_setting(
			'product_two_banner_'.$key.'_text',
			array(
				'default'			=> __($value['text'],'ecommerce-companion'),
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mega_mart_sanitize_html',
				//'transport'         => $selective_refresh,
			)
		);	
		
		$wp_customize->add_control( 
			'product_two_banner_'.$key.'_text',
			array(
				'label'   => __('Banner Text '.$key,'ecommerce-companion'),
				'section' => 'product_two_setting',
				'type'           => 'text',
			)  
		);
				
		$wp_customize->add_setting( 
			'product_two_banner_'.$key.'_img' , 
			array(
				'default' 			=> $value['image'],
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mega_mart_sanitize_url',
			) 
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'product_two_banner_'.$key.'_img' ,
			array(
				'label'          => esc_html__( 'Banner Image '.$key, 'ecommerce-companion'),
				'section'        => 'product_two_setting',
			) 
		));
	}
	
	$wp_customize->add_setting(
		'product_two_content'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'product_two_content',
		array(
			'type' => 'hidden',
			'label' => __('Content','ecommerce-companion'),
			'section' => 'product_two_setting',
		)
	);
	
	
	// Hide/Show Tab
	$wp_customize->add_setting(
		'product_two_hs_tab'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'product_two_hs_tab',
		array(
			'type' => 'checkbox',
			'label' => __('Hide/Show Tab','ecommerce-companion'),
			'section' => 'product_two_setting',
		)
	);
	
	
	// Product Category
	if(class_exists( 'woocommerce' )){
		$wp_customize->add_setting(
		'product_two_cat',
			array(
			'capability' => 'edit_theme_options',
			'priority' => 5,
			)
		);	
		$wp_customize->add_control( new Mega_Mart_Product_Category_Control( $wp_customize, 
		'product_two_cat', 
			array(
			'label'   => __('Select category','ecommerce-companion'),
			'section' => 'product_two_setting',
			) 
		) );
	}
}

add_action( 'customize_register', 'mega_mart_product_two_setting' );

// selective refresh
function mega_mart_product_two_section_partials( $wp_customize ){
	
	// product_two_ttl
	$wp_customize->selective_refresh->add_partial( 'product_two_title', array(
		'selector'            => '.product-two-home .heading-default .title h5',
		'settings'            => 'product_two_title',
		'render_callback'  => 'mega_mart_product_two_ttl_render_callback',
	) );
	
	// product_two_btn_lbl
	$wp_customize->selective_refresh->add_partial( 'product_two_section_title', array(
		'selector'            => '.product-two-home .section-title',
		'settings'            => 'product_two_section_title',
		'render_callback'  => 'mega_mart_product_two_section_title_render_callback',
	) );
	
	}

add_action( 'customize_register', 'mega_mart_product_two_section_partials' );

// product_two_ttl
function mega_mart_product_two_ttl_render_callback() {
	return get_theme_mod( 'product_two_title' );
}

// product_two_btn_lbl
function mega_mart_product_two_section_title_render_callback() {
	return get_theme_mod( 'product_two_section_title' );
}