<?php
function mega_mart_lite_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
	// Logo Width // 
	if ( class_exists( 'Ecommerce_Comp_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'logo_width',
			array(
				'default'			=> '250',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'ecommerce_comp_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Ecommerce_Comp_Customizer_Range_Control( $wp_customize, 'logo_width', 
			array(
				'label'      => __( 'Logo Width', 'ecommerce-companion' ),
				'section'  => 'title_tagline',
				 'media_query'   => true,
					'input_attr'    => array(
						'mobile'  => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 140,
						),
						'tablet'  => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 195,
						),
						'desktop' => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 250,
						),
					),
			) ) 
		);
	}
	
	/*=========================================
	Above Header Section
	=========================================*/
	$wp_customize->add_section(
        'above_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Above Header','ecommerce-companion'),
			'panel'  		=> 'header_section',
		)
    );
	
	/*=========================================
	Header Text Animation
	=========================================*/	
	
	// Head // 
	$wp_customize->add_setting(
    	'hdr_text_anim',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 12,
		)
	);	

	$wp_customize->add_control( 
		'hdr_text_anim',
		array(
		    'label'   		=> __('Header Animate Text','ecommerce-companion'),
		    'section'		=> 'above_header',
			'type' 			=> 'hidden',
		)  
	);	
	
	// Hide / Show
	$wp_customize->add_setting( 
		'hs_hdr_anim' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'priority' => 13,
		) 
	);
	
	$wp_customize->add_control(
	'hs_hdr_anim', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'ecommerce-companion' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);
	
	$wp_customize->add_setting( 
		'abv_hdr_first_slide_custom' , 
			array(
			'default' => __('Welcome To Our Mart, Save 20%-50% Sitewide!!, Save Upto 35% Off Today'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 1,
		) 
	);

	$wp_customize->add_control(
	'abv_hdr_first_slide_custom', 
		array(
			'label'	      => esc_html__( 'Animation Text', 'ecommerce-companion' ),
			'section'     => 'above_header',
			'type'=>'textarea'
		) 
	);
	
	// Hide / Show
	$wp_customize->add_setting( 
		'daytext_hs' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'daytext_hs', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'ecommerce-companion' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);
	
	
	$wp_customize->add_setting( 
		'daytext' , 
			array(
			'default' => __('Deal of the day!'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 1,
		) 
	);

	$wp_customize->add_control(
	'daytext', 
		array(
			'label'	      => esc_html__( 'Day Text', 'ecommerce-companion' ),
			'section'     => 'above_header',
			'type'=>'textarea'
		) 
	);
	
	// Head // 
	$wp_customize->add_setting(
    	'hdr_odr_lnk',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 12,
		)
	);	

	$wp_customize->add_control( 
		'hdr_odr_lnk',
		array(
		    'label'   		=> __('Track Order Link','ecommerce-companion'),
		    'section'		=> 'above_header',
			'type' 			=> 'hidden',
		)  
	);	
	
	
	// Hide / Show
	$wp_customize->add_setting( 
		'order_link_hs' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'order_link_hs', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'ecommerce-companion' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);
	
	$theme = wp_get_theme();
	if($theme->name == 'Daily Mart'):
	$section_position = 'header_navigation';
	$repeater_fields = false;
	else: 
	$section_position = 'above_header';
	$repeater_fields = true;	
	endif;
	
	// Head // 
	$wp_customize->add_setting(
    	'above_header_first_head',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 12,
		)
	);	

	$wp_customize->add_control( 
		'above_header_first_head',
		array(
		    'label'   		=> __('Custom Widget Text','ecommerce-companion'),
		    'section'		=> $section_position,
			'type' 			=> 'hidden',
		)  
	);	
	
	// Hide / Show
	$wp_customize->add_setting( 
		'above_header_first_hs' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'above_header_first_hs', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'ecommerce-companion' ),
			'section'     => $section_position,
			'type'        => 'checkbox'
		) 
	);
	
	
	/**
	* Customizer Repeater for add Support
	*/

	$wp_customize->add_setting( 'above_header_first_content', 
		array(
		 'sanitize_callback' => 'mega_mart_repeater_sanitize',
		 'default' => mega_mart_above_header_first_content_default()
		)
	);

	$wp_customize->add_control( 
		new Mega_Mart_Repeater( $wp_customize, 
		'above_header_first_content', 
			array(
				'label'   => esc_html__('Contents','ecommerce-companion'),
				'section' => $section_position,
				'add_field_label'                   => esc_html__( 'Add New ', 'ecommerce-companion' ),
				'item_name'                         => esc_html__( 'Content', 'ecommerce-companion' ),
				'customizer_repeater_text_control' => $repeater_fields,
				'customizer_repeater_text2_control' => $repeater_fields,
				'customizer_repeater_icon_control' => true,
				'customizer_repeater_link_control' => true,
			) 
		) 
	);		
}
add_action( 'customize_register', 'mega_mart_lite_header_settings' );

// Header selective refresh
function mega_mart_above_header_partials( $wp_customize ){	
	
	// Header_Slide
	$wp_customize->selective_refresh->add_partial( 'abv_hdr_first_slide_custom', array(
		'selector'            => '.newstextwidget .textslide-item',
		'settings'            => 'abv_hdr_first_slide_custom',
		'render_callback'  => 'mega_mart_header_news_slider_render_callback',
	) );
	
	}
add_action( 'customize_register', 'mega_mart_above_header_partials' );

// Header
function mega_mart_header_news_slider_render_callback() {
	return get_theme_mod( 'abv_hdr_first_slide_custom' );
}