<?php
function mega_mart_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'mega-mart'),
		) 
	);
	
	/*=========================================
	Footer Above
	=========================================*/	
	$wp_customize->add_section(
        'footer_above',
        array(
            'title' 		=> __('Footer Above','mega-mart'),
			'panel'  		=> 'footer_section',
		)
    );
	
	// Head
	$wp_customize->add_setting( 
		'above_footer_head' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		) 
	);
	
	$wp_customize->add_control(
	'above_footer_head', 
		array(
			'label'	      => esc_html__( 'Setting', 'mega-mart' ),
			'section'     => 'footer_above',
			'type'        => 'hidden'
		) 
	);	
	
	// hide/show
	$wp_customize->add_setting( 
		'hs_above_footer' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'hs_above_footer', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'mega-mart' ),
			'section'     => 'footer_above',
			'type'        => 'checkbox'
		) 
	);		
	
	
	//  Content
	$wp_customize->add_setting( 
		'above_footer_content' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		) 
	);
	
	$wp_customize->add_control(
	'above_footer_content', 
		array(
			'label'	      => esc_html__( 'Content', 'mega-mart' ),
			'section'     => 'footer_above',
			'type'        => 'hidden'
		) 
	);	
	
	$wp_customize->add_setting(
		'footer_contact_call_icon',
		array(
			'default' => 'fa-phone',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Mega_Mart_Icon_Picker_Control($wp_customize, 
		'footer_contact_call_icon',
		array(
			'label'   		=> __('Icon','mega-mart'),
			'section' 		=> 'footer_above',
			'iconset' => 'fa',
			
		))  
	);
	
	// Title
	$wp_customize->add_setting( 
		'footer_contact_call_title' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			 //'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control(
	'footer_contact_call_title', 
		array(
			'label'	      => esc_html__( 'Call Title', 'mega-mart' ),
			'section'     => 'footer_above',
			'type'        => 'text'
		) 
	);
	
	// Subtitle
	$wp_customize->add_setting( 
		'footer_contact_call_link' , 
			array(
			// 'default'	      => esc_html__( '70 975 975 70', 'mega-mart' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			 //'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control(
	'footer_contact_call_link', 
		array(
			'label'	      => esc_html__( 'Contact Number', 'mega-mart' ),
			'section'     => 'footer_above',
			'type'        => 'text'
		) 
	);
	
	$wp_customize->add_setting( 
		'footer_contact_call_newtab' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'footer_contact_call_newtab', 
		array(
			'label'	      => esc_html__( 'Open Link In New Tab', 'mega-mart' ),
			'section'     => 'footer_above',
			'type'        => 'checkbox'
		) 
	);	
	
	$wp_customize->add_setting( 
		'footer_contact_call_nofollow' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'footer_contact_call_nofollow', 
		array(
			'label'	      => esc_html__( 'Add "nofollow" To Link', 'mega-mart' ),
			'section'     => 'footer_above',
			'type'        => 'checkbox'
		) 
	);		
	
	// Store
	$wp_customize->add_setting( 
		'above_footer_store' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		) 
	);
	
	$wp_customize->add_control(
	'above_footer_store', 
		array(
			'label'	      => esc_html__( 'Store', 'mega-mart' ),
			'section'     => 'footer_above',
			'type'        => 'hidden'
		) 
	);	
	// Store desc
	$wp_customize->add_setting( 
		'store_desc' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			 //'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control(
	'store_desc', 
		array(
			'label'	      => esc_html__( 'Title', 'mega-mart' ),
			'section'     => 'footer_above',
			'type'        => 'text'
		) 
	);
	
	// Open
	$wp_customize->add_setting( 
		'store_open_time' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			 //'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control(
	'store_open_time', 
		array(
			'label'	      => esc_html__( 'Open Time', 'mega-mart' ),
			'section'     => 'footer_above',
			'type'        => 'text'
		) 
	);
	
	// Close
	$wp_customize->add_setting( 
		'store_close_time' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			 //'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control(
	'store_close_time', 
		array(
			'label'	      => esc_html__( 'Close Time', 'mega-mart' ),
			'section'     => 'footer_above',
			'type'        => 'text'
		) 
	);
	
	$wp_customize->add_setting( 
		'above_footer_hours' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		) 
	);
	
	$wp_customize->add_control(
	'above_footer_hours', 
		array(
			'label'	      => esc_html__( 'Hours', 'mega-mart' ),
			'section'     => 'footer_above',
			'type'        => 'hidden'
		) 
	);
	//Hours
	$wp_customize->add_setting(
		'footer_contact_hour_icon',
		array(
			'default' => 'fa-clock',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Mega_Mart_Icon_Picker_Control($wp_customize, 
		'footer_contact_hour_icon',
		array(
			'label'   		=> __('Icon','mega-mart'),
			'section' 		=> 'footer_above',
			'iconset' => 'fa',
			
		))  
	);
	
	// Title
	$wp_customize->add_setting( 
		'footer_contact_hour_title' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			 //'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control(
	'footer_contact_hour_title', 
		array(
			'label'	      => esc_html__( 'Hour Title', 'mega-mart' ),
			'section'     => 'footer_above',
			'type'        => 'text'
		) 
	);
	
	// Subtitle
	$wp_customize->add_setting( 
		'footer_contact_hour_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			 //'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control(
	'footer_contact_hour_link', 
		array(
			'label'	      => esc_html__( 'Working Hours', 'mega-mart' ),
			'section'     => 'footer_above',
			'type'        => 'text'
		) 
	);
	
	$wp_customize->add_setting( 
		'footer_contact_hour_newtab' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'footer_contact_hour_newtab', 
		array(
			'label'	      => esc_html__( 'Open Link In New Tab', 'mega-mart' ),
			'section'     => 'footer_above',
			'type'        => 'checkbox'
		) 
	);	
	
	$wp_customize->add_setting( 
		'footer_contact_hour_nofollow' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'footer_contact_hour_nofollow', 
		array(
			'label'	      => esc_html__( 'Add "nofollow" To Link', 'mega-mart' ),
			'section'     => 'footer_above',
			'type'        => 'checkbox'
		) 
	);	
	
	/*=========================================
	Footer Background 
	=========================================*/	
	$wp_customize->add_section(
        'footer_background',
        array(
            'title' 		=> __('Footer Background','mega-mart'),
			'panel'  		=> 'footer_section',
			//'priority'      => 4,
		)
    );
	
	//  Background Image
	$wp_customize->add_setting(
	'footer_bg_image', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_url(get_template_directory_uri(). '/assets/images/footer/footer_bg.jpg')
    ));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 
			'footer_bg_image', 
			array(
				'label'      => __( 'Background Image', 'mega-mart' ),
				'section'    => 'footer_background',
			) 
		) 
	);
	
	//  Background Color
	$wp_customize->add_setting(
	'footer_bg_clr', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '#0d4d1b'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'footer_bg_clr', 
			array(
				'label'      => __( 'Background Color', 'mega-mart' ),
				'section'    => 'footer_background',
			) 
		) 
	);
	
	if ( class_exists( 'Mega_Mart_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'footer_clr_opacity',
			array(
				'default' => '0.25',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mega_mart_sanitize_range_value',
				//'priority' => 11,
			)
		);
		$wp_customize->add_control( 
		new Mega_Mart_Customizer_Range_Control( $wp_customize, 'footer_clr_opacity', 
			array(
				'label'      => __( 'Opacity', 'mega-mart' ),
				'section'  => 'footer_background',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 0,
							'max'           => 1,
							'step'          => 0.01,
							'default_value' => 0.25,
						),
					),
			) ) 
		);
	}


// Pro Upgrade
	class  Megamart_footer_bg__section_upgrade extends WP_Customize_Control {
		public function render_content() {
		$theme = wp_get_theme();
		$theme_name = $theme -> name;
		$theme_name = strtolower(str_replace(' ','-',$theme_name));
		?>
			<a class="customizer_footer_bg_section_premium up-to-pro" style="padding:9px 0; text-align:center;" href="https://sellerthemes.com/<?php echo $theme_name; ?>-premium/" target="_blank"><?php esc_html_e('Upgrade To Pro For More Features','mega-mart'); ?></a>
			
		<?php }
	}
	
	$wp_customize->add_setting( 'footer_bg_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'mega_mart_sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'priority' => 5,
	));
	$wp_customize->add_control(
		new  Megamart_footer_bg__section_upgrade(
		$wp_customize,
		'footer_bg_upgrade_to_pro',
			array(
				'section'				=> 'footer_background',
			)
		)
	);
	
	/*=========================================
	Footer Menu
	=========================================*/
	$wp_customize->add_section(
        'footer_menu',
        array(
            'title' 		=> __('Footer Menu','mega-mart'),
			'panel'  		=> 'footer_section',
			'priority'      => 6,
		)
    );
	
	// Menu Head
	$wp_customize->add_setting(
		'footer_menu_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'footer_menu_head',
		array(
			'type' => 'hidden',
			'label' => __('Global','mega-mart'),
			'section' => 'footer_menu',
			'priority'  => 1,
		)
	);
		
	// Hide / Show
	$wp_customize->add_setting(
		'footer_menu_hs'
			,array(
			'default'     	=> '2',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		)
	);

	
	$wp_customize->add_control(
	'footer_menu_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show Menu','mega-mart'),
			'section' => 'footer_menu',
			'priority'  => 2,
		)
	);
	
	/*=========================================
		Footer Info
	=========================================*/
	$wp_customize->add_section(
        'footer_contact_info',
        array(
            'title' 		=> __('Below Footer','mega-mart'),
			'panel'  		=> 'footer_section',
		)
    );
	
	/* Social Icons */
	$wp_customize->add_setting(
		'footer_socials'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'footer_socials',
		array(
			'type' => 'hidden',
			'label' => __('Footer Social','mega-mart'),
			'section' => 'footer_contact_info',
		)
	);
	
	/**
	 * Customizer Repeater for add Footer Social Icons
	 */
	
	$wp_customize->add_setting( 'footer_social_content', 
		array(
		 'sanitize_callback' => 'mega_mart_repeater_sanitize',
		 'default' => mega_mart_get_social_icon_default()
		)
	);
	
	$wp_customize->add_control( 
		new Mega_Mart_Repeater( $wp_customize, 
			'footer_social_content', 
				array(
					'label'   => esc_html__('Social Icons','mega-mart'),
					'section' => 'footer_contact_info',
					'add_field_label'                   => esc_html__( 'Add New fSocial', 'mega-mart' ),
					'item_name'                         => esc_html__( 'fSocial', 'mega-mart' ),
					'customizer_repeater_icon_control' => true,
					'customizer_repeater_link_control' => true,
					'customizer_repeater_newtab_control' => true,
					'customizer_repeater_nofollow_control' => true,
				) 
			) 
		);
		
		
	/*Pro Upgrade */	
	class  MegaMart_footer_social__section_upgrade extends WP_Customize_Control {
		public function render_content() {
		$theme = wp_get_theme();
		$theme_name = $theme -> name;
		$theme_name = strtolower(str_replace(' ','-',$theme_name));
			
		?>
			<a class="customizer_fSocial_section_premium up-to-pro" style="padding:9px 0; text-align:center;" href="https://sellerthemes.com/<?php echo $theme_name; ?>-premium/" target="_blank"><?php esc_html_e('Upgrade To Pro For More Features','mega-mart'); ?></a>
			
		<?php }
	}
	
	$wp_customize->add_setting( 'footer_social_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'nexcraft_sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new  MegaMart_footer_social__section_upgrade(
		$wp_customize,
		'footer_social_upgrade_to_pro',
			array(
				'section'				=> 'footer_contact_info',
			)
		)
	);
		
	/* Payments */	
	$wp_customize->add_setting(
		'footer_payments'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'footer_payments',
		array(
			'type' => 'hidden',
			'label' => __('Footer Payment','mega-mart'),
			'section' => 'footer_contact_info',
		)
	);
	
	/**
	 * Customizer Repeater for add Footer Payment Icons
	 */
	
	$wp_customize->add_setting( 'footer_payment_content', 
		array(
		 'sanitize_callback' => 'mega_mart_repeater_sanitize',
		 'default' => mega_mart_get_payment_icon_default()
		)
	);
	
	$wp_customize->add_control( 
		new Mega_Mart_Repeater( $wp_customize, 
			'footer_payment_content', 
				array(
					'label'   => esc_html__('Payment Icons','mega-mart'),
					'section' => 'footer_contact_info',
					'add_field_label'                   => esc_html__( 'Add New Payment', 'mega-mart' ),
					'item_name'                         => esc_html__( 'Payment', 'mega-mart' ),
					'customizer_repeater_icon_control' => true,
					'customizer_repeater_link_control' => true,
					'customizer_repeater_newtab_control' => true,
					'customizer_repeater_nofollow_control' => true,
				) 
			) 
		);
		
	/*Pro Upgrade */	
	class  MegaMart_footer_payment__section_upgrade extends WP_Customize_Control {
		public function render_content() { 
		$theme = wp_get_theme();
		$theme_name = $theme -> name;
		$theme_name = strtolower(str_replace(' ','-',$theme_name));
			
		?>
			<a class="customizer_payment_section_premium up-to-pro" style="padding:9px 0; text-align:center;" href="https://sellerthemes.com/<?php echo $theme_name; ?>-premium/" target="_blank"><?php esc_html_e('Upgrade To Pro For More Features','mega-mart'); ?></a>
			
		<?php }
	}
	
	$wp_customize->add_setting( 'footer_payment_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'nexcraft_sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new  MegaMart_footer_payment__section_upgrade(
		$wp_customize,
		'footer_payment_upgrade_to_pro',
			array(
				'section'				=> 'footer_contact_info',
			)
		)
	);
		
		
		// Copyright
	$mega_mart_copyright = esc_html__('Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'mega-mart' );
	$wp_customize->add_setting( 
		'footer_copyright' , 
			array(
			'default'	      => $mega_mart_copyright,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_html',
		) 
	);
	
	$wp_customize->add_control(
	'footer_copyright', 
		array(
			'label'	      => esc_html__( 'Copyright', 'mega-mart' ),
			'section'     => 'footer_contact_info',
			'type'        => 'textarea',
		) 
	);
}
add_action( 'customize_register', 'mega_mart_footer' );

// Footer selective refresh
function mega_mart_footer_partials( $wp_customize ){	
	
	// footer_contact_call_title
	$wp_customize->selective_refresh->add_partial( 'footer_contact_call_title', array(
		'selector'            => '.footer-contact .text span',
		'settings'            => 'footer_contact_call_title',
		'render_callback'  => 'mega_mart_footer_contact_info_render_callback',
	) );
	
	// footer_copyright
	$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
		'selector'            => '.footer-copyright .copyright-text',
		'settings'            => 'footer_copyright',
		'render_callback'  => 'mega_mart_footer_copyright_render_callback',
	) );
	
	}
add_action( 'customize_register', 'mega_mart_footer_partials' );

// footer_copyright
function mega_mart_footer_copyright_render_callback() {
	return get_theme_mod( 'footer_copyright' );
}
function mega_mart_footer_contact_info_render_callback() {
	return get_theme_mod( 'footer_contact_call_title' );
}