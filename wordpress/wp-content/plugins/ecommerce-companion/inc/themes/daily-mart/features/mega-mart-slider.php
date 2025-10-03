<?php
function daily_mart_slider_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Slider Section Panel
	=========================================*/	
	$wp_customize->add_section(
		'slider_setting', array(
			'title' => esc_html__( 'Slider Section', 'ecommerce-companion' ),
			'panel' => 'mega_mart_frontpage_sections',
			'priority' => 3,
		)
	);
	
	// Setting
	$wp_customize->add_setting(
		'slider_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
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
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
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
			'sanitize_callback' => 'mega_mart_sanitize_text',
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
			 'sanitize_callback' => 'mega_mart_repeater_sanitize',
			  'default' => mega_mart_get_slider_default()
			)
		);
		
		$wp_customize->add_control( 
			new MEGA_MART_Repeater( $wp_customize, 
				'slider', 
					array(
						'label'   => esc_html__('Slide','ecommerce-companion'),
						'section' => 'slider_setting',
						'add_field_label'                   => esc_html__( 'Add New Slider', 'ecommerce-companion' ),
						'item_name'                         => esc_html__( 'Slider', 'ecommerce-companion' ),
						
						'customizer_repeater_text_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_subtitle2_control' => true,
						'customizer_repeater_subtitle3_control' => true,
						'customizer_repeater_button_text_control'=> true,
						'customizer_repeater_button_link_control' => true,
						'customizer_repeater_image_control' => true,
					) 
				) 
			);
				
		//Pro feature
		class mega_mart_slider__section_premium extends WP_Customize_Control {
			public function render_content() { 
			?>
				<a class="customizer_slider_section_premium up-to-pro" href="<?php echo esc_url(mega_mart_premium_links()); ?>" target="_blank" style="display: none;"><?php _e('More Slides Available in the Premium Version','ecommerce-companion'); ?></a>
				
			<?php
			}
		}
		
		$wp_customize->add_setting( 'mega_mart_slider_premium', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 6,
		));
		$wp_customize->add_control(
			new mega_mart_slider__section_premium(
			$wp_customize,
			'mega_mart_slider_premium',
				array(
					'section'				=> 'slider_setting',
				)
			)
		);
}

add_action( 'customize_register', 'daily_mart_slider_setting' );

//selective refresh
function mega_mart_slider_section_partials( $wp_customize ){	
	
	// slider_contents
	$wp_customize->selective_refresh->add_partial( 'slider', array(
		'selector'            => '.slider-wrapper .slider-content'
	) );
	
}
add_action( 'customize_register', 'mega_mart_slider_section_partials' );