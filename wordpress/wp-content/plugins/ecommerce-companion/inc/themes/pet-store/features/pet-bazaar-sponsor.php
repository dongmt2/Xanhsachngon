<?php
function pet_bazaar_sponsor_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Sponsor  Section
	=========================================*/
	$wp_customize->add_section(
		'sponsor_setting', array(
			'title' => esc_html__( 'Sponsor Section', 'ecommerce-companion' ),
			'priority' => 9,
			'panel' => 'pet_bazaar_frontpage_sections',
		)
	);

	// Sponsor content Section // 
	$wp_customize->add_setting(
		'sponsor_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'sponsor_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','ecommerce-companion'),
			'section' => 'sponsor_setting',
		)
	);	
	
		
	/**
	 * Customizer Repeater for add sponsor
	 */
	
		$wp_customize->add_setting( 'sponsor_contents', 
			array(
			 'sanitize_callback' => 'pet_bazaar_repeater_sanitize',
			 'priority' => 8,
			 'default' => pet_bazaar_get_sponsor_default()
			)
		);
		
		$wp_customize->add_control( 
			new Pet_Bazaar_Repeater( $wp_customize, 
				'sponsor_contents', 
					array(
						'label'   => esc_html__('Sponsor','ecommerce-companion'),
						'section' => 'sponsor_setting',
						'add_field_label'                   => esc_html__( 'Add New Sponsor', 'ecommerce-companion' ),
						'item_name'                         => esc_html__( 'Sponsor', 'ecommerce-companion' ),
						'customizer_repeater_image_control' => true,
					) 
				) 
			);
		
		//Pro feature
		class pet_bazaar_sponsor__section_premium extends WP_Customize_Control {
			public function render_content() { 
			?>
				<a class="customizer_sponsor_section_premium up-to-pro" href="<?php echo esc_url(pet_bazaar_premium_links()); ?>" target="_blank" style="display: none;"><?php _e('More Sponsors Available in the Premium Version','ecommerce-companion'); ?></a>
				
			<?php
			}
		}
		
		$wp_customize->add_setting( 'pet_bazaar_sponsor_premium', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 6,
		));
		$wp_customize->add_control(
			new pet_bazaar_sponsor__section_premium(
			$wp_customize,
			'pet_bazaar_sponsor_premium',
				array(
					'section'				=> 'sponsor_setting',
				)
			)
		);	
}

add_action( 'customize_register', 'pet_bazaar_sponsor_setting' );