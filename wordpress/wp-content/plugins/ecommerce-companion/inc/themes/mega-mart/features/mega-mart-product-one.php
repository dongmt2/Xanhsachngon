<?php
function mega_mart_product_one_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Feature Product  Section
	=========================================*/
	$wp_customize->add_section(
		'product_one_setting', array(
			'title' => esc_html__( 'Product One Section', 'ecommerce-companion' ),
			'panel' => 'mega_mart_frontpage_sections',
			'priority' => 5,
		)
	);
	
	// Hide/Show Tab
	$wp_customize->add_setting(
		'product_one_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'product_one_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide/Show','ecommerce-companion'),
			'section' => 'product_one_setting',
		)
	);
	
	
	/*=========================================
	Header
	=========================================*/
	$wp_customize->add_setting(
		'product_one_header'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'product_one_header',
		array(
			'type' => 'hidden',
			'label' => __('Header','ecommerce-companion'),
			'section' => 'product_one_setting',
		)
	);
	
	//  Title // 
	$wp_customize->add_setting(
    	'product_one_title',
    	array(
	        'default'			=> __('Hot Deal :','ecommerce-companion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
			//'transport'         => $selective_refresh,
			'priority' => 2,
		)
	);	
	
	$wp_customize->add_control( 
		'product_one_title',
		array(
		    'label'   => __('Title','ecommerce-companion'),
		    'section' => 'product_one_setting',
			'type'    => 'text',
		)  
	);	
	
	//  Heading Text // 
	$wp_customize->add_setting(
    	'product_one_heading_text',
    	array(
	        'default'			=> __('Don\'t Miss Out! Grab the Best Deals Before They\'re Gone!','ecommerce-companion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
			//'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'product_one_heading_text',
		array(
		    'label'   => __('Subtitle','ecommerce-companion'),
		    'section' => 'product_one_setting',
			'type'           => 'text',
		)  
	);
	
	//Timer	
	$wp_customize->add_setting(
		'product_one_time_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'product_one_time_head',
		array(
			'type' => 'hidden',
			'label' => __('Time','ecommerce-companion'),
			'section' => 'product_one_setting',
		)
	);
	
	$wp_customize->add_setting(
    	'product_one_date',
    	array(
	        'default'			=> __('2026-01-01','ecommerce-companion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
		)
	);	
	$wp_customize->add_control( 
		'product_one_date',
		array(
		    'section' => 'product_one_setting',
			'type'     => 'date',
		)  
	);
	
	$wp_customize->add_setting(
    	'product_one_time',
    	array(
	        'default'			=> __('00:00','ecommerce-companion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
		)
	);
	
	$wp_customize->add_control( 
		'product_one_time',
		array(
		    'section' => 'product_one_setting',
			'type'     => 'time',
		)  
	);
	
	//  Button // 
	$wp_customize->add_setting(
		'product_one_button_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'product_one_button_head',
		array(
			'type' => 'hidden',
			'label' => __('Button','ecommerce-companion'),
			'section' => 'product_one_setting',
		)
	);
	
	$wp_customize->add_setting(
    	'product_one_button_title',
    	array(
	        'default'			=> __('Wrap Coupon ?','ecommerce-companion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
			//'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'product_one_button_title',
		array(
		    'label'   => __('Button Label','ecommerce-companion'),
		    'section' => 'product_one_setting',
			'type'           => 'text',
		)  
	);	
	
	$wp_customize->add_setting(
    	'product_one_button_link',
    	array(
	        'default'			=> __('','ecommerce-companion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_url',
			//'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'product_one_button_link',
		array(
		    'label'   => __('Link','ecommerce-companion'),
		    'section' => 'product_one_setting',
			'type'           => 'text',
		)  
	);	
	
	$wp_customize->add_setting(
		'product_one_newtab'
			,array(
			'default'     	=> 'yes',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'product_one_newtab',
		array(
			'type' => 'checkbox',
			'label' => __('Open Link In New Tab','ecommerce-companion'),
			'section' => 'product_one_setting',
		)
	);
	
	$wp_customize->add_setting(
		'product_one_nofollow'
			,array(
			'default'     	=> 'yes',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
	'product_one_nofollow',
		array(
			'type' => 'checkbox',
			'label' => __('Add "nofollow" To Link','ecommerce-companion'),
			'section' => 'product_one_setting',
		)
	);
	
	/*=========================================
	Content
	=========================================*/
	$wp_customize->add_setting(
    	'product_one_section_title',
    	array(
	        'default'			=> __('Vegetable Products','ecommerce-companion'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
			//'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'product_one_section_title',
		array(
		    'label'   => __('Section Title','ecommerce-companion'),
		    'section' => 'product_one_setting',
			'type'           => 'text',
		)  
	);
	
	$banner_box = [
		'one' => ['title' =>'30% OFF' , 'text' => 'Everyday Fresh Fruits From South Africa','image'=> ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/mega-mart/assets/images/product/one/banner1.png'],
		'two' => ['title' =>'100% Fresh ' , 'text' => 'Tasty Steaks From  Our Best Chief', 'image' => ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/mega-mart/assets/images/product/one/banner2.png'],
	];
	
	foreach($banner_box as $key => $value) {
	$wp_customize->add_setting(
		'product_one_contentf'.$key
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'product_one_contentf'.$key,
		array(
			'type' => 'hidden',
			'label' => __('Banner '.$key,'ecommerce-companion'),
			'section' => 'product_one_setting',
		)
	);
	
		$wp_customize->add_setting(
			'product_one_banner_'.$key.'_title',
			array(
				'default'			=> __($value['title'],'ecommerce-companion'),
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mega_mart_sanitize_html',
				//'transport'         => $selective_refresh,
			)
		);	
		
		$wp_customize->add_control( 
			'product_one_banner_'.$key.'_title',
			array(
				'label'   => __('Banner Title '.$key,'ecommerce-companion'),
				'section' => 'product_one_setting',
				'type'           => 'text',
			)  
		);
		
		$wp_customize->add_setting(
			'product_one_banner_'.$key.'_text',
			array(
				'default'			=> __($value['text'],'ecommerce-companion'),
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mega_mart_sanitize_html',
				//'transport'         => $selective_refresh,
			)
		);	
		
		$wp_customize->add_control( 
			'product_one_banner_'.$key.'_text',
			array(
				'label'   => __('Banner Text '.$key,'ecommerce-companion'),
				'section' => 'product_one_setting',
				'type'           => 'text',
			)  
		);
				
		$wp_customize->add_setting( 
			'product_one_banner_'.$key.'_img' , 
			array(
				'default' 			=> $value['image'],
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mega_mart_sanitize_url',
			) 
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'product_one_banner_'.$key.'_img' ,
			array(
				'label'          => esc_html__( 'Banner Image '.$key, 'ecommerce-companion'),
				'section'        => 'product_one_setting',
			) 
		));
	}
	
	$wp_customize->add_setting(
		'product_one_content'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'product_one_content',
		array(
			'type' => 'hidden',
			'label' => __('Content','ecommerce-companion'),
			'section' => 'product_one_setting',
		)
	);
	
	
	// Hide/Show Tab
	$wp_customize->add_setting(
		'product_one_hs_tab'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'product_one_hs_tab',
		array(
			'type' => 'checkbox',
			'label' => __('Hide/Show Tab','ecommerce-companion'),
			'section' => 'product_one_setting',
		)
	);
	
	// Product Category
	if(class_exists( 'woocommerce' )){
		$wp_customize->add_setting(
		'product_one_cat',
			array(
			'capability' => 'edit_theme_options',
			'priority' => 5,
			)
		);	
		$wp_customize->add_control( new Mega_Mart_Product_Category_Control( $wp_customize, 
		'product_one_cat', 
			array(
			'label'   => __('Select category','ecommerce-companion'),
			'section' => 'product_one_setting',
			) 
		) );	
	}
}

add_action( 'customize_register', 'mega_mart_product_one_setting' );

// selective refresh
function mega_mart_product_one_section_partials( $wp_customize ){
	
	// product_one_ttl
	$wp_customize->selective_refresh->add_partial( 'product_one_title', array(
		'selector'            => '.product-one-home .heading-default .title h5',
		'settings'            => 'product_one_title',
		'render_callback'  => 'mega_mart_product_one_ttl_render_callback',
	) );
	
	// product_one_btn_lbl
	$wp_customize->selective_refresh->add_partial( 'product_one_section_title', array(
		'selector'            => '.product-one-home .section-title',
		'settings'            => 'product_one_section_title',
		'render_callback'  => 'mega_mart_product_one_section_title_render_callback',
	) );
	
	}

add_action( 'customize_register', 'mega_mart_product_one_section_partials' );

// product_one_ttl
function mega_mart_product_one_ttl_render_callback() {
	return get_theme_mod( 'product_one_title' );
}

// product_one_btn_lbl
function mega_mart_product_one_section_title_render_callback() {
	return get_theme_mod( 'product_one_section_title' );
}