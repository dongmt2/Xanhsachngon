<?php
function pet_bazaar_slider_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Slider Section Panel
	=========================================*/	
	$wp_customize->add_section(
		'slider_setting', array(
			'title' => esc_html__( 'Slider Section', 'ecommerce-companion' ),
			'panel' => 'pet_bazaar_frontpage_sections',
			'priority' => 1,
		)
	);
	
	// Setting
	$wp_customize->add_setting(
		'slider_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'slider_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','ecommerce-companion'),
			'section' => 'slider_setting',
		)
	);
	
	// Hide/Show
	$wp_customize->add_setting(
		'slider_setting_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_checkbox',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'slider_setting_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide/Show','ecommerce-companion'),
			'section' => 'slider_setting',
		)
	);
	
	// slider Contents
	$wp_customize->add_setting(
		'slider_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'slider_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Contents','ecommerce-companion'),
			'section' => 'slider_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add slides
	 */
	
		$wp_customize->add_setting( 'slider', 
			array(
			 'sanitize_callback' => 'pet_bazaar_repeater_sanitize',
			 'priority' => 5,
			  'default' => pet_bazaar_get_slider_default()
			)
		);
		
		$wp_customize->add_control( 
			new Pet_Bazaar_Repeater( $wp_customize, 
				'slider', 
					array(
						'label'   => esc_html__('Slide','ecommerce-companion'),
						'section' => 'slider_setting',
						'add_field_label'                   => esc_html__( 'Add New Slider', 'ecommerce-companion' ),
						'item_name'                         => esc_html__( 'Slider', 'ecommerce-companion' ),
						
						
						// 'customizer_repeater_title_control' => false,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_subtitle2_control' => true,
						// 'customizer_repeater_text_control' => true,
						'customizer_repeater_text2_control'=> true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_checkbox_control' => true,
						'customizer_repeater_image_control' => true,
						// 'customizer_repeater_slide_align' => true
					) 
				) 
			);
			
			
		//Pro feature
		class pet_bazaar_slider__section_premium extends WP_Customize_Control {
			public function render_content() { 
			?>
				<a class="customizer_slider_section_premium up-to-pro" href="<?php echo esc_url(pet_bazaar_premium_links()); ?>" target="_blank" style="display: none;"><?php _e('More Slides Available in the Premium Version','ecommerce-companion'); ?></a>
				
			<?php
			}
		}
		
		$wp_customize->add_setting( 'pet_bazaar_slider_premium', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 6,
		));
		$wp_customize->add_control(
			new pet_bazaar_slider__section_premium(
			$wp_customize,
			'pet_bazaar_slider_premium',
				array(
					'section'				=> 'slider_setting',
				)
			)
		);		
}

add_action( 'customize_register', 'pet_bazaar_slider_setting' );