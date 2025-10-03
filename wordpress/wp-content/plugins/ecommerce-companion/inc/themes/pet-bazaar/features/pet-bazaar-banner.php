<?php
function pet_bazaar_banner_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Banner Section
	=========================================*/
	$wp_customize->add_section(
		'banner_setting', array(
			'title' => esc_html__( 'Banner Section', 'ecommerce-companion' ),
			'priority' => 6,
			'panel' => 'pet_bazaar_frontpage_sections',
		)
	);

	// Banner Show/Hide // 
	$wp_customize->add_setting(
		'banner_hs'
			,array(
			'default'			=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_text',
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
	
	// Banner content Section // 
	$wp_customize->add_setting(
		'banner_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'pet_bazaar_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'banner_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','ecommerce-companion'),
			'section' => 'banner_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add banner
	 */
	
		$wp_customize->add_setting( 'banner_contents', 
			array(
			 'sanitize_callback' => 'pet_bazaar_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => pet_bazaar_get_banner_default()
			)
		);
		
		$wp_customize->add_control( 
			new Pet_Bazaar_Repeater( $wp_customize, 
				'banner_contents', 
					array(
						'label'   => esc_html__('Banner','ecommerce-companion'),
						'section' => 'banner_setting',
						'add_field_label'                   => esc_html__( 'Add New Banner', 'ecommerce-companion' ),
						'item_name'                         => esc_html__( 'Banner', 'ecommerce-companion' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text2_control' => true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_subtitle_control' => true,
					) 
				) 
			);
			
				
		//Pro feature
		class pet_bazaar_banner__section_premium extends WP_Customize_Control {
			public function render_content() { 
			?>
				<a class="customizer_banner_section_premium up-to-pro" href="<?php echo esc_url(pet_bazaar_premium_links()); ?>" target="_blank" style="display: none;"><?php _e('More Banner Available in the Premium Version','ecommerce-companion'); ?></a>
				
			<?php
			}
		}
		
		$wp_customize->add_setting( 'pet_bazaar_banner_premium', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 6,
		));
		$wp_customize->add_control(
			new pet_bazaar_banner__section_premium(
			$wp_customize,
			'pet_bazaar_banner_premium',
				array(
					'section'				=> 'banner_setting',
				)
			)
		);	
	}

add_action( 'customize_register', 'pet_bazaar_banner_setting' );

//selective refresh
function pet_bazaar_banner_section_partials( $wp_customize ){	
	
	// banner content
	$wp_customize->selective_refresh->add_partial( 'banner_contents', array(
		'selector'            => '.banner-home .banner-cards'
	) );
	
}
add_action( 'customize_register', 'pet_bazaar_banner_section_partials' );