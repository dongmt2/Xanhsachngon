<?php
function mega_mart_blog_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Frontpage
	=========================================*/
	$wp_customize->add_panel(
		'mega_mart_frontpage_sections', array(
			'priority' => 32,
			'title' => esc_html__( 'Frontpage Sections', 'mega-mart' ),
		)
	);
	/*=========================================
	Blog Section
	=========================================*/
	$wp_customize->add_section(
		'blog_setting', array(
			'title' => esc_html__( 'Blog Section', 'mega-mart' ),
			'priority' => 10,
			'panel' => 'mega_mart_frontpage_sections',
		)
	);
	
	/*=========================================
	Setting
	=========================================*/
	// Setting
	$wp_customize->add_setting(
		'blog_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'blog_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','mega-mart'),
			'section' => 'blog_setting',
		)
	);
	
	// Hide/Show
	$wp_customize->add_setting(
		'blog_setting_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'blog_setting_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide/Show','mega-mart'),
			'section' => 'blog_setting',
		)
	);
	/*=========================================
	Header
	=========================================*/
	$wp_customize->add_setting(
		'blog_header'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'blog_header',
		array(
			'type' => 'hidden',
			'label' => __('Header','mega-mart'),
			'section' => 'blog_setting',
		)
	);
	
	//  Title // 
	$wp_customize->add_setting(
    	'blog_ttl',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 2,
		)
	);	
	
	$wp_customize->add_control( 
		'blog_ttl',
		array(
		    'label'   => __('Title','mega-mart'),
		    'section' => 'blog_setting',
			'type'           => 'text',
		)  
	);
	
	/*=========================================
	Content
	=========================================*/
	$wp_customize->add_setting(
		'blog_content'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'blog_content',
		array(
			'type' => 'hidden',
			'label' => __('Content','mega-mart'),
			'section' => 'blog_setting',
		)
	);
	
	// No. of Products Display
	if ( class_exists( 'Ecommerce_Comp_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'blog_num',
			array(
				'default' => '3',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'ecommerce_comp_sanitize_range_value',
				'priority' => 7,
			)
		);
		$wp_customize->add_control( 
		new Ecommerce_Comp_Customizer_Range_Control( $wp_customize, 'blog_num', 
			array(
				'label'      => __( 'No of Blog Display', 'mega-mart' ),
				'section'  => 'blog_setting',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'    => 1,
							'max'    => 500,
							'step'   => 1,
							'default_value' => 3,
						),
					),
			) ) 
		);
	}

}

add_action( 'customize_register', 'mega_mart_blog_setting' );

// selective refresh
function mega_mart_blog_section_partials( $wp_customize ){
	
	// blog2_ttl
	$wp_customize->selective_refresh->add_partial( 'blog_ttl', array(
		'selector'            => '.home-blog .section-title',
		'settings'            => 'blog_ttl',
		'render_callback'  => 'mega_mart_blog_ttl_render_callback',
	) );
	
	}

add_action( 'customize_register', 'mega_mart_blog_section_partials' );

// blog2_ttl
function mega_mart_blog_ttl_render_callback() {
	return get_theme_mod( 'blog_ttl' );
}