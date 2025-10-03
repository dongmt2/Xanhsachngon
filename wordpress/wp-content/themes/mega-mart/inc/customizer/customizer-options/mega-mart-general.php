<?php
function mega_mart_general_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'mega_mart_general', array(
			'priority' => 31,
			'title' => esc_html__( 'General', 'mega-mart' ),
		)
	);
	
	/*=========================================
	Scroller
	=========================================*/
	$wp_customize->add_section(
		'top_scroller', array(
			'title' => esc_html__( 'Top Scroller', 'mega-mart' ),
			'priority' => 4,
			'panel' => 'mega_mart_general',
		)
	);
	
	$wp_customize->add_setting( 
		'hs_scroller' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hs_scroller', 
		array(
			'label'	      => esc_html__( 'Hide / Show Scroller', 'mega-mart' ),
			'section'     => 'top_scroller',
			'type'        => 'checkbox'
		) 
	);
	
	$wp_customize->add_setting(
		'scroller_icon',
		array(
			'default' => 'fa-arrow-up',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Mega_Mart_Icon_Picker_Control($wp_customize, 
		'scroller_icon',
		array(
			'label'   		=> __('Icon','mega-mart'),
			'section' 		=> 'top_scroller',
			'iconset' => 'fa',
			
		))  
	);
	
	//Pro Upgrade
	class  Megamart_scroll_up_icon__section_upgrade extends WP_Customize_Control {
		public function render_content() { 	
			
		?>
			<a class="customizer_scroll_up_icon_section_premium up-to-pro" style="padding:9px 0; text-align:center;" href="https://sellerthemes.com/mega-mart-premium/" target="_blank"><?php esc_html_e('Upgrade To Pro For More Features','mega-mart'); ?></a>
			
		<?php }
	}
	
	$wp_customize->add_setting( 'scroll_up_icon_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'mega_mart_sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'priority' => 5,
	));
	$wp_customize->add_control(
		new  Megamart_scroll_up_icon__section_upgrade(
		$wp_customize,
		'scroll_up_icon_upgrade_to_pro',
			array(
				'section'				=> 'top_scroller',
			)
		)
	);
	
	/*=========================================
	Breadcrumb  Section
	=========================================*/
	$wp_customize->add_section(
		'breadcrumb_setting', array(
			'title' => esc_html__( 'Page Breadcrumb', 'mega-mart' ),
			'priority' => 12,
			'panel' => 'mega_mart_general',
		)
	);
	
	// Settings
	$wp_customize->add_setting(
		'breadcrumb_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_settings',
		array(
			'type' => 'hidden',
			'label' => __('Settings','mega-mart'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// Breadcrumb Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_breadcrumb' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'mega-mart' ),
			'section'     => 'breadcrumb_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// enable on Page Title
	$wp_customize->add_setting(
		'breadcrumb_title_enable'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_title_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable Page Title on Breadcrumb?','mega-mart'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// enable on Page Path
	$wp_customize->add_setting(
		'breadcrumb_path_enable'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_path_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable Page Path on Breadcrumb?','mega-mart'),
			'section' => 'breadcrumb_setting',
		)
	);	
	
		
	// Background // 
	$wp_customize->add_setting(
		'breadcrumb_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 9,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','mega-mart'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'breadcrumb_bg_img' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/breadcrumb.png'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_url',	
			'priority' => 10,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'breadcrumb_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'mega-mart'),
			'section'        => 'breadcrumb_setting',
		) 
	));
	
	
	$wp_customize->add_setting( 
		'breadcrumb_category_hs' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'breadcrumb_category_hs', 
		array(
			'label'	      => esc_html__( 'Hide/Show Category', 'mega-mart' ),
			'section'     => 'breadcrumb_setting',
			'settings'    => 'breadcrumb_category_hs',
			'type'        => 'checkbox'
		) 
	);
	
	$wp_customize->add_setting(
	'breadcrumb_overlay_color', 
	array(
		'default' => '#080808',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'priority'  => 12,
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'breadcrumb_overlay_color', 
			array(
				'label'      => __( 'Overlay Color', 'mega-mart'),
				'section'    => 'breadcrumb_setting',
			) 
		) 
	);
	
	/*========================
	 **** Pro Upgrade ****
	======================== */
	class  Megamart_breadcrumb__section_upgrade extends WP_Customize_Control {
		public function render_content() { 	
			
		?>
			<a class="customizer_breadcrumb_section_premium up-to-pro" style="padding:9px 0; text-align:center;" href="https://sellerthemes.com/mega-mart-premium/" target="_blank"><?php esc_html_e('Upgrade To Pro For More Features','mega-mart'); ?></a>
			
		<?php }
	}
	
	$wp_customize->add_setting( 'breadcrumb_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'mega_mart_sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'priority' => 5,
	));
	$wp_customize->add_control(
		new  Megamart_breadcrumb__section_upgrade(
		$wp_customize,
		'breadcrumb_upgrade_to_pro',
			array(
				'section'				=> 'breadcrumb_setting',
			)
		)
	);
	
	/*=========================================
	Mega Mart Container
	=========================================*/
	$wp_customize->add_section(
        'mega_mart_container',
        array(
        	'priority'      => 2,
            'title' 		=> __('Container','mega-mart'),
			'panel'  		=> 'mega_mart_general',
		)
    );
	
	if ( class_exists( 'Ecommerce_Comp_Customizer_Range_Control' ) ) {
		//container width
		$wp_customize->add_setting(
			'mega_mart_site_cntnr_width',
			array(
				'default'			=> '1320',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mega_mart_sanitize_range_value',
				'transport'         => 'postMessage',
				'priority'      => 1,
			)
		);
		$wp_customize->add_control( 
		new Ecommerce_Comp_Customizer_Range_Control( $wp_customize, 'mega_mart_site_cntnr_width', 
			array(
				'label'      => __( 'Container Width', 'mega-mart' ),
				'section'  => 'mega_mart_container',
				'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 100,
                        'max'           => 320,
                        'step'          => 1,
                        'default_value' => 320,
                    ),
                    'tablet'  => array(
                        'min'           => 577,
                        'max'           => 768,
                        'step'          => 1,
                        'default_value' => 768,
                    ),
                    'desktop' => array(
                        'min'           => 992,
                        'max'           => 1320,
                        'step'          => 1,
                        'default_value' => 1200,
                    ),
				)
			) ) 
		);
	}
	
	// Pro Upgrade
	class  Megamart_cntr__section_upgrade extends WP_Customize_Control {
		public function render_content() { 			
		?>
			<a class="customizer_cntr_section_premium up-to-pro" style="padding:9px 0; text-align:center;" href="https://sellerthemes.com/mega-mart-premium/" target="_blank"><?php esc_html_e('Upgrade To Pro For More Features','mega-mart'); ?></a>
			
		<?php }
	}
	
	$wp_customize->add_setting( 'cntr_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'mega_mart_sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'priority' => 1,
	));
	$wp_customize->add_control(
		new  Megamart_cntr__section_upgrade(
		$wp_customize,
		'cntr_upgrade_to_pro',
			array(
				'section'				=> 'mega_mart_container',
			)
		)
	);
	
	
	/*=========================================
	Mega Mart Sidebar
	=========================================*/
	$wp_customize->add_section(
        'mega_mart_sidebar',
        array(
        	'priority'      => 8,
            'title' 		=> __('Sidebar','mega-mart'),
			'panel'  		=> 'mega_mart_general',
		)
    );
	
	//  Pages Layout // 
	$wp_customize->add_setting(
		'mega_mart_pages_sidebar'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'mega_mart_pages_sidebar',
		array(
			'type' => 'hidden',
			'label' => __('Sidebar Layout','mega-mart'),
			'section' => 'mega_mart_sidebar',
		)
	);
	
	// Default Page
	$wp_customize->add_setting( 
		'mega_mart_default_pg_sidebar' , 
			array(
			'default' => 'right_sidebar',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_select',
			'priority' => 2,
		) 
	);

	$wp_customize->add_control(
	'mega_mart_default_pg_sidebar' , 
		array(
			'label'          => __( 'Default Page Sidebar Option', 'mega-mart' ),
			'section'        => 'mega_mart_sidebar',
			'type'           => 'select',
			'choices'        => 
			array(
				'left_sidebar' 	=> __( 'Left Sidebar', 'mega-mart' ),
				'right_sidebar' 	=> __( 'Right Sidebar', 'mega-mart' ),
				'no_sidebar' 	=> __( 'No Sidebar', 'mega-mart' ),
			) 
		) 
	);
	
	// Archive Page
	$wp_customize->add_setting( 
		'mega_mart_archive_pg_sidebar' , 
			array(
			'default' => 'right_sidebar',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_select',
			'priority' => 3,
		) 
	);

	$wp_customize->add_control(
	'mega_mart_archive_pg_sidebar' , 
		array(
			'label'          => __( 'Archive Page Sidebar Option', 'mega-mart' ),
			'section'        => 'mega_mart_sidebar',
			'type'           => 'select',
			'choices'        => 
			array(
				'left_sidebar' 	=> __( 'Left Sidebar', 'mega-mart' ),
				'right_sidebar' => __( 'Right Sidebar', 'mega-mart' ),
				'no_sidebar' 	=> __( 'No Sidebar', 'mega-mart' ),
			) 
		) 
	);
	
	
	// Single Page
	$wp_customize->add_setting( 
		'mega_mart_single_pg_sidebar' , 
			array(
			'default' => 'right_sidebar',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_select',
			'priority' => 4,
		) 
	);

	$wp_customize->add_control(
	'mega_mart_single_pg_sidebar' , 
		array(
			'label'          => __( 'Single Page Sidebar Option', 'mega-mart' ),
			'section'        => 'mega_mart_sidebar',
			'type'           => 'select',
			'choices'        => 
			array(
				'left_sidebar' 	=> __( 'Left Sidebar', 'mega-mart' ),
				'right_sidebar' => __( 'Right Sidebar', 'mega-mart' ),
				'no_sidebar' 	=> __( 'No Sidebar', 'mega-mart' ),
			) 
		) 
	);
	
	
	// Blog Page
	$wp_customize->add_setting( 
		'mega_mart_blog_pg_sidebar' , 
			array(
			'default' => 'right_sidebar',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_select',
			'priority' => 5,
		) 
	);

	$wp_customize->add_control(
	'mega_mart_blog_pg_sidebar' , 
		array(
			'label'          => __( 'Blog Page Sidebar Option', 'mega-mart' ),
			'section'        => 'mega_mart_sidebar',
			'type'           => 'select',
			'choices'        => 
			array(
				'left_sidebar' 	=> __( 'Left Sidebar', 'mega-mart' ),
				'right_sidebar' => __( 'Right Sidebar', 'mega-mart' ),
				'no_sidebar' 	=> __( 'No Sidebar', 'mega-mart' ),
			) 
		) 
	);
	
	// Search Page
	$wp_customize->add_setting( 
		'mega_mart_search_pg_sidebar' , 
			array(
			'default' => 'right_sidebar',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_select',
			'priority' => 5,
		) 
	);

	$wp_customize->add_control(
	'mega_mart_search_pg_sidebar' , 
		array(
			'label'          => __( 'Search Page Sidebar Option', 'mega-mart' ),
			'section'        => 'mega_mart_sidebar',
			'type'           => 'select',
			'choices'        => 
			array(
				'left_sidebar' 	=> __( 'Left Sidebar', 'mega-mart' ),
				'right_sidebar' => __( 'Right Sidebar', 'mega-mart' ),
				'no_sidebar' 	=> __( 'No Sidebar', 'mega-mart' ),
			) 
		) 
	);
	
	
	// WooCommerce Page
	$wp_customize->add_setting( 
		'mega_mart_shop_pg_sidebar' , 
			array(
			'default' => 'right_sidebar',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_select',
			'priority' => 6,
		) 
	);

	$wp_customize->add_control(
	'mega_mart_shop_pg_sidebar' , 
		array(
			'label'          => __( 'WooCommerce Page Sidebar Option', 'mega-mart' ),
			'section'        => 'mega_mart_sidebar',
			'type'           => 'select',
			'choices'        => 
			array(
				'left_sidebar' 	=> __( 'Left Sidebar', 'mega-mart' ),
				'right_sidebar' => __( 'Right Sidebar', 'mega-mart' ),
				'no_sidebar' 	=> __( 'No Sidebar', 'mega-mart' ),
			) 
		) 
	);
	
	// Pro Upgrade
	class  Mega_Mart_sidebar__section_upgrade extends WP_Customize_Control {
		public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme	
			
		?>
			<a class="customizer_sidebar_upgrade_section up-to-pro" style="padding:9px 0; text-align:center;" href="https://www.nayrathemes.com/mega-mart-pro/" target="_blank"><?php esc_html_e('Upgrade To Pro For More Features','mega-mart'); ?></a>
			
		<?php }
	}
	
	$wp_customize->add_setting( 'sidebar_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'mega_mart_sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'priority' => 5,
	));
	$wp_customize->add_control(
		new  Mega_Mart_sidebar__section_upgrade(
		$wp_customize,
		'sidebar_upgrade_to_pro',
			array(
				'section'				=> 'mega_mart_sidebar',
			)
		)
	);
	
	
	// Widget options
	$wp_customize->add_setting(
		'sidebar_options'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority'  => 6
		)
	);

	$wp_customize->add_control(
	'sidebar_options',
		array(
			'type' => 'hidden',
			'label' => __('Options','mega-mart'),
			'section' => 'mega_mart_sidebar',
		)
	);
	// Sidebar Width 
	if ( class_exists( 'Ecommerce_Comp_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'mega_mart_sidebar_width',
			array(
				'default'	      => esc_html__( '33', 'mega-mart' ),
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'ecommerce_comp_sanitize_range_value',
				'transport'         => 'postMessage',
				'priority'  => 7
			)
		);
		$wp_customize->add_control( 
		new Ecommerce_Comp_Customizer_Range_Control( $wp_customize, 'mega_mart_sidebar_width', 
			array(
				'label'      => __( 'Sidebar Width', 'mega-mart' ),
				'section'  => 'mega_mart_sidebar',
				'media_query'   => false,
                'input_attr'    => array(                    
                        'min'           => 25,
                        'max'           => 50,
                        'step'          => 1,
                        'default_value' => 33,
				)
				),
			 ) 
		);
	}
	
	// Widget Typography
	$wp_customize->add_setting(
		'sidebar_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'sidebar_typography',
		array(
			'type' => 'hidden',
			'label' => __('Typography','mega-mart'),
			'section' => 'mega_mart_sidebar',
			'priority'  => 21,
		)
	);
	
	// Widget Title // 
	if ( class_exists( 'Ecommerce_Comp_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'mega_mart_widget_ttl_size',
			array(
				'default' => 28,
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'ecommerce_comp_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Ecommerce_Comp_Customizer_Range_Control( $wp_customize, 'mega_mart_widget_ttl_size', 
			array(
				'label'      => __( 'Widget Title Font Size', 'mega-mart' ),
				'section'  => 'mega_mart_sidebar',
				'priority'  => 23,
				'media_query'   => false,
                'input_attr'    => array(                    
                        'min'           => 25,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 28,
				)
			) ) 
		);
	}
}

add_action( 'customize_register', 'mega_mart_general_setting' );
