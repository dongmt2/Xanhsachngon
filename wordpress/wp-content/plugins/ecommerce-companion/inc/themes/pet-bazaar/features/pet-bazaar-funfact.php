<?php
function pet_bazaar_funfact_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Funfact  Section
	=========================================*/
	$wp_customize->add_section(
		'funfact_setting', array(
			'title' => esc_html__( 'Funfact Section', 'ecommerce-companion' ),
			'priority' => 9,
			'panel' => 'pet_bazaar_frontpage_sections',
		)
	);

	// Funfact Show/Hide // 
	$wp_customize->add_setting(
		'funfact_hs'
			,array(
			'default'			=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'funfact_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Show/Hide','ecommerce-companion'),
			'section' => 'funfact_setting',
		)
	);
	
	// Funfact content Section // 
	$wp_customize->add_setting(
		'funfact_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'funfact_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','ecommerce-companion'),
			'section' => 'funfact_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add funfact
	 */
	
		$wp_customize->add_setting( 'funfact_contents', 
			array(
			 'sanitize_callback' => 'pet_bazaar_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => pet_bazaar_get_funfact_default()
			)
		);
		
		$wp_customize->add_control( 
			new Pet_Bazaar_Repeater( $wp_customize, 
				'funfact_contents', 
					array(
						'label'   => esc_html__('Funfact','ecommerce-companion'),
						'section' => 'funfact_setting',
						'add_field_label'                   => esc_html__( 'Add New Funfact', 'ecommerce-companion' ),
						'item_name'                         => esc_html__( 'Funfact', 'ecommerce-companion' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
					) 
				) 
			);
		
		//Pro feature
		class pet_bazaar_funfact__section_premium extends WP_Customize_Control {
			public function render_content() { 
			?>
				<a class="customizer_funfact_section_premium up-to-pro" href="<?php echo esc_url(pet_bazaar_premium_links()); ?>" target="_blank" style="display: none;"><?php _e('More Funfact Available in the Premium Version','ecommerce-companion'); ?></a>
				
			<?php
			}
		}
		
		$wp_customize->add_setting( 'pet_bazaar_funfact_premium', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 6,
		));
		$wp_customize->add_control(
			new pet_bazaar_funfact__section_premium(
			$wp_customize,
			'pet_bazaar_funfact_premium',
				array(
					'section'				=> 'funfact_setting',
				)
			)
		);	
	
	/* Background Image */
	$wp_customize->add_setting( 
    	'funfact_background_image' , 
    	array(
			'default'			=> esc_url(get_template_directory_uri().'/assets/images/funfact4-bg.png'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_url',	
			'priority'  => 2,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'funfact_background_image' ,
		array(
			'label'          => esc_html__( 'Background Image', 'ecommerce-companion'),
			'section'        => 'funfact_setting'
		) 
	));
}

add_action( 'customize_register', 'pet_bazaar_funfact_setting' );

//selective refresh
function pet_bazaar_funfact_section_partials( $wp_customize ){	
	
	// funfact content
	$wp_customize->selective_refresh->add_partial( 'funfact_contents', array(
		'selector'            => '.funfact-item'
	) );
	
}
add_action( 'customize_register', 'pet_bazaar_funfact_section_partials' );