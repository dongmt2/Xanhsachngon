<?php
function super_mart_slider_setting( $wp_customize ) {
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
		
	for( $i=1 ; $i<=2; $i++ ) {
	$wp_customize->add_setting(
		'right_content'.$i, 
			array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 13,
		)
	);

	$wp_customize->add_control(
	'right_content'.$i ,
		array(
			'type' => 'hidden',
			'label' => __('Right content '.$i,'ecommerce-companion'),
			'section' => 'slider_setting',
		)
	);
	$wp_customize->add_setting( 
		'right_side_img'.$i , 
		array(
			'default'			=> esc_url(ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/super-mart/assets/images/page-slider/banner'.$i.'.jpg'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_url',
		) 
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'right_side_img'.$i ,
		array(
			'label'          => esc_html__( 'Background Image', 'ecommerce-companion'),
			'section'        => 'slider_setting'
		) 
	));
	
	//Title
	$wp_customize->add_setting( 
		'right_side_title'.$i , 
			array(
			'default' => __('Order Online Now!','ecommerce-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		) 
	);

	$wp_customize->add_control(
	'right_side_title'.$i, 
		array(
			'label'	      => esc_html__( 'Left Title '.$i, 'ecommerce-companion' ),
			'section'     => 'slider_setting',
		) 
	);
	
	//Subtitle
	$wp_customize->add_setting( 
		'right_side_subtitle'.$i , 
			array(
			'default' => __('Fresh Vegetables','ecommerce-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		) 
	);

	$wp_customize->add_control(
	'right_side_subtitle'.$i, 
		array(
			'label'	      => esc_html__( 'Left Subtitle '.$i, 'ecommerce-companion' ),
			'section'     => 'slider_setting',
		) 
	);
	
	//Button
	$wp_customize->add_setting( 
		'right_side_btn_lbl'.$i , 
			array(
			'default' => __('Shop Online','ecommerce-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		) 
	);

	$wp_customize->add_control(
	'right_side_btn_lbl'.$i, 
		array(
			'label'	      => esc_html__( 'Button Label '.$i, 'ecommerce-companion' ),
			'section'     => 'slider_setting',
		) 
	);
	
	$wp_customize->add_setting( 
		'right_side_btn_link'.$i , 
			array(
			'default' => __('','ecommerce-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_url',
		) 
	);

	$wp_customize->add_control(
	'right_side_btn_link'.$i, 
		array(
			'label'	      => esc_html__( 'Button Link', 'ecommerce-companion' ),
			'section'     => 'slider_setting',
		) 
	);
	
	
	$wp_customize->add_setting( 
		'right_btn_newtab'.$i , 
			array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'default' => '1'
		) 
	);

	$wp_customize->add_control(
	'right_btn_newtab'.$i, 
		array(
			'label'	      => esc_html__( 'Open Link In New Tab', 'ecommerce-companion' ),
			'section'     => 'slider_setting',
			'type'        => 'checkbox'
		) 
	);
	
	$wp_customize->add_setting( 
		'right_btn_nofollow'.$i , 
			array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'default' => '1'
		) 
	);

	$wp_customize->add_control(
	'right_btn_nofollow'.$i, 
		array(
			'label'	      => esc_html__( 'Add "No Follow" To Link', 'ecommerce-companion' ),
			'section'     => 'slider_setting',
			'type'        => 'checkbox'
		) 
	);
}
}

add_action( 'customize_register', 'super_mart_slider_setting' );

//selective refresh
function mega_mart_slider_section_partials( $wp_customize ){	
	
	// slider_contents
	$wp_customize->selective_refresh->add_partial( 'slider', array(
		'selector'            => '.slider-wrapper .slider-content'
	) );
	
}
add_action( 'customize_register', 'mega_mart_slider_section_partials' );