<?php
function pet_bazaar_cta_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Call To Action Section
	=========================================*/
	$wp_customize->add_section(
		'cta_setting', array(
			'title' => esc_html__( 'Call To Action Section', 'ecommerce-companion' ),
			'priority' => 9,
			'panel' => 'pet_bazaar_frontpage_sections',
		)
	);

	// Call To Action content Section // 
	$wp_customize->add_setting(
		'cta_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'cta_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','ecommerce-companion'),
			'section' => 'cta_setting',
		)
	);
	
	// Head
	/* Title */
	$wp_customize->add_setting( 
		'cta_title' , 
			array(
			'default' => __('Get 30% off for the First Time Appointment'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_text',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'cta_title', 
		array(
			'label'	      => esc_html__( 'Title', 'ecommerce-companion' ),
			'section'     => 'cta_setting',
		) 
	);
	
	/* Description */
	$wp_customize->add_setting( 
		'cta_description' , 
			array(
			'default' => __('Lorem ipsum dolor, sit amet consectetur adipisicing elit.'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_text',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'cta_description', 
		array(
			'label'	      => esc_html__( 'Description', 'ecommerce-companion' ),
			'section'     => 'cta_setting',
		) 
	);
	
	/* Text */
	$wp_customize->add_setting( 
		'cta_text' , 
			array(
			'default' => __('30% <span>OFF</span>','ecommerce-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_text',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'cta_text', 
		array(
			'label'	      => esc_html__( 'Discount text', 'ecommerce-companion' ),
			'section'     => 'cta_setting',
		) 
	);
	
	/* Button */
	$wp_customize->add_setting( 
		'cta_button_lbl' , 
			array(
			'default' => __('Shop Now','ecommerce-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_text',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'cta_button_lbl', 
		array(
			'label'	      => esc_html__( 'Button Label', 'ecommerce-companion' ),
			'section'     => 'cta_setting',
		) 
	);
	
	$wp_customize->add_setting( 
		'cta_button_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_url',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'cta_button_link', 
		array(
			'label'	      => esc_html__( 'Button Link', 'ecommerce-companion' ),
			'section'     => 'cta_setting',
		) 
	);
	
	/* Image */
	$wp_customize->add_setting( 
    	'cta_image' , 
    	array(
			'default' 			=> esc_url(ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/pet-store/assets/images/cta.png'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_url',	
			'priority'  => 2,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'cta_image' ,
		array(
			'label'          => esc_html__( 'Image', 'ecommerce-companion'),
			'section'        => 'cta_setting'
		) 
	));
	
}

add_action( 'customize_register', 'pet_bazaar_cta_setting' );

//selective refresh
function pet_bazaar_cta_section_partials( $wp_customize ){	
	
	// cta content
	$wp_customize->selective_refresh->add_partial( 'cta_title', array(
		'selector'            => '.cta-4 h5'
	) );
	$wp_customize->selective_refresh->add_partial( 'cta_description', array(
		'selector'            => '.cta-4 p'
	) );
	
}
add_action( 'customize_register', 'pet_bazaar_cta_section_partials' );