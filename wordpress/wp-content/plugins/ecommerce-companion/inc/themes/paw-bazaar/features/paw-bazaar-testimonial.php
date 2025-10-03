<?php
function pet_bazaar_testimonial_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Testimonial  Section
	=========================================*/
	$wp_customize->add_section(
		'testimonial_setting', array(
			'title' => esc_html__( 'Testimonial Section', 'pet-bazaar' ),
			'priority' => 9,
			'panel' => 'pet_bazaar_frontpage_sections',
		)
	);

	// Testimonial content Section // 
	$wp_customize->add_setting(
		'testimonial_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_text',
			'priority' => 7,
		)
	);
	
	
	// Setting
	$wp_customize->add_setting(
		'testimonial_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'testimonial_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','ecommerce-companion'),
			'section' => 'testimonial_setting',
		)
	);
	
	// Hide/Show
	$wp_customize->add_setting(
		'hs_testimonial'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_checkbox',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'hs_testimonial',
		array(
			'type' => 'checkbox',
			'label' => __('Hide/Show','ecommerce-companion'),
			'section' => 'testimonial_setting',
		)
	);

	$wp_customize->add_control(
	'testimonial_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','pet-bazaar'),
			'section' => 'testimonial_setting',
		)
	);	
	
	// Head
	/* Title */
	$wp_customize->add_setting( 
		'testimonial_section_title' , 
			array(
			'default' => __('<span>our</span> testimonial','pet-bazaar'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_text',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'testimonial_section_title', 
		array(
			'label'	      => esc_html__( 'Section Title', 'pet-bazaar' ),
			'section'     => 'testimonial_setting',
		) 
	);
	
	/* Subtitle */
	$wp_customize->add_setting( 
		'testimonial_section_subtitle' , 
			array(
			'default' => __('There are many variations of passages of Lorem Ipsum available','pet-bazaar'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_text',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'testimonial_section_subtitle', 
		array(
			'label'	      => esc_html__( 'Subtitle', 'pet-bazaar' ),
			'section'     => 'testimonial_setting',
		) 
	);
	
	
	/**
	 * Customizer Repeater for add testimonial
	 */
	
		$wp_customize->add_setting( 'testimonial_contents', 
			array(
			 'sanitize_callback' => 'pet_bazaar_repeater_sanitize',
			 'priority' => 8,
			 'default' => pet_bazaar_get_testimonial_default()
			)
		);
		
		$wp_customize->add_control( 
			new Pet_Bazaar_Repeater( $wp_customize, 
				'testimonial_contents', 
					array(
						'label'   => esc_html__('Testimonial','pet-bazaar'),
						'section' => 'testimonial_setting',
						'add_field_label'                   => esc_html__( 'Add New Testimonial', 'pet-bazaar' ),
						'item_name'                         => esc_html__( 'Testimonial', 'pet-bazaar' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
					) 
				) 
			);
			
		//Pro feature
		class pet_bazaar_testimonial__section_premium extends WP_Customize_Control {
			public function render_content() { 
			?>
				<a class="customizer_testimonial_section_premium up-to-pro" href="<?php echo esc_url(pet_bazaar_premium_links()); ?>" target="_blank" style="display: none;"><?php _e('More Testimonial Available in the Premium Version','ecommerce-companion'); ?></a>
				
			<?php
			}
		}
		
		$wp_customize->add_setting( 'pet_bazaar_testimonial_premium', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 6,
		));
		$wp_customize->add_control(
			new pet_bazaar_testimonial__section_premium(
			$wp_customize,
			'pet_bazaar_testimonial_premium',
				array(
					'section'				=> 'testimonial_setting',
				)
			)
		);
}

add_action( 'customize_register', 'pet_bazaar_testimonial_setting' );