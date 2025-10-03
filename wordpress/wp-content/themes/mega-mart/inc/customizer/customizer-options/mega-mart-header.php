<?php
function mega_mart_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'mega-mart'),
		) 
	);
	/*=========================================
	Mega Mart Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','mega-mart'),
			'panel'  		=> 'header_section',
		)
    );
	
	
	
	// Typography
	if ( class_exists( 'Ecommerce_Comp_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
		'logo_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'logo_typography',
		array(
			'type' => 'hidden',
			'label' => __('Typography','mega-mart'),
			'section' => 'title_tagline',
			'priority' => 100,
		)
	);
	
	// Site Title Font Size// 
		$wp_customize->add_setting(
			'site_ttl_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'ecommerce_comp_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Ecommerce_Comp_Customizer_Range_Control( $wp_customize, 'site_ttl_size', 
			array(
				'label'      => __( 'Site Title Font Size', 'mega-mart' ),
				'section'  => 'title_tagline',
				'priority' => 101,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 24,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 24,
                    ),
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 24,
                    ),
				)
			) ) 
		);

	// Site Description Font Size// 	
		$wp_customize->add_setting(
			'site_desc_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'ecommerce_comp_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Ecommerce_Comp_Customizer_Range_Control( $wp_customize, 'site_desc_size', 
			array(
				'label'      => __( 'Site Description Font Size', 'mega-mart' ),
				'section'  => 'title_tagline',
				'priority' => 102,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 16,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 16,
                    ),
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 16,
                    ),
                ),
			) ) 
		);
		
	// Pro Upgrade
	class  Megamart_typo__section_upgrade extends WP_Customize_Control {
		public function render_content() { 
		$theme = wp_get_theme();
		$theme_name = $theme -> name;
		$theme_name = strtolower(str_replace(' ','-',$theme_name));
		?>
			<a class="customizer_typo_section_premium up-to-pro" style="padding:9px 0; text-align:center;" href="https://sellerthemes.com/<?php echo $theme_name;?>-premium/" target="_blank"><?php esc_html_e('Upgrade To Pro For More Features','mega-mart'); ?></a>
			
		<?php }
	}
	
	$wp_customize->add_setting( 'typo_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'mega_mart_sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'priority' => 103,
	));
	$wp_customize->add_control(
		new  Megamart_typo__section_upgrade(
		$wp_customize,
		'typo_upgrade_to_pro',
			array(
				'section'				=> 'title_tagline',
			)
		)
	);
	}
	
	
	
	/*=========================================
	Header Navigation
	=========================================*/	
	$wp_customize->add_section(
        'header_navigation',
        array(
        	'priority'      => 4,
            'title' 		=> __('Header Navigation','mega-mart'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Cart
	$wp_customize->add_setting(
		'hdr_nav_cart'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_cart',
		array(
			'type' => 'hidden',
			'label' => __('Cart','mega-mart'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_cart' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_cart', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'mega-mart' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);
	
	// Admin Account
	$wp_customize->add_setting(
		'hdr_nav_account'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_nav_account',
		array(
			'type' => 'hidden',
			'label' => __('Admin Account','mega-mart'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_account' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'priority' => 8,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_account', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'mega-mart' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);
	
	
	// Contact
	$wp_customize->add_setting(
		'hdr_cnt'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'hdr_cnt',
		array(
			'type' => 'hidden',
			'label' => __('Contact','mega-mart'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_hdr_contact' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'priority' => 8,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_hdr_contact', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'mega-mart' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);
	
	
	$wp_customize->add_setting(
		'hdr_contact_icon',
		array(
			'default' => 'fa-phone',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Mega_Mart_Icon_Picker_Control($wp_customize, 
		'hdr_contact_icon',
		array(
			'label'   		=> __('Icon','mega-mart'),
			'section' 		=> 'header_navigation',
			'iconset' => 'fa',
			
		))  
	);
	
	$wp_customize->add_setting( 
		'hdr_contact_ttl' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 1,
		) 
	);

	$wp_customize->add_control(
	'hdr_contact_ttl', 
		array(
			'label'	      => esc_html__( 'Contact Title', 'mega-mart' ),
			'section'     => 'header_navigation',
		) 
	);
		
		$wp_customize->add_setting( 
		'hdr_contact_subttl' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 1,
		) 
	);

	$wp_customize->add_control(
	'hdr_contact_subttl', 
		array(
			'label'	      => esc_html__( 'Contact Subtitle', 'mega-mart' ),
			'section'     => 'header_navigation',
		) 
	);
	
	
	/*=========================================
	Social
	=========================================*/	
	
	// Head // 
	$wp_customize->add_setting(
    	'hdr_social_head',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 12,
		)
	);	

	$wp_customize->add_control( 
		'hdr_social_head',
		array(
		    'label'   		=> __('Social Icons','mega-mart'),
		    'section'		=> 'header_navigation',
			'type' 			=> 'hidden',
		)  
	);	
	
	// Hide / Show
	$wp_customize->add_setting( 
		'hs_hdr_social' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'priority' => 13,
		) 
	);
	
	$wp_customize->add_control(
	'hs_hdr_social', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'mega-mart' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	/**
	 * Customizer Repeater
	 */
		$wp_customize->add_setting( 'social_icons', 
			array(
			 'sanitize_callback' => 'mega_mart_repeater_sanitize',
			 'priority' => 2,
			 'default' => mega_mart_get_social_icon_default()
		)
		);
		
		$wp_customize->add_control( 
			new MEGA_MART_Repeater( $wp_customize, 
				'social_icons', 
					array(
						'label'   => esc_html__('Social Icons','mega-mart'),
						'section' => 'header_navigation',
						'add_field_label'                   => esc_html__( 'Add New Social', 'mega-mart' ),
						'item_name'                         => esc_html__( 'Social', 'mega-mart' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
		//Pro feature
		class mega_mart_social__section_premium extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme();
			$theme_name = $theme -> name;
			$theme_name = strtolower(str_replace(' ','-',$theme_name));
			?>
				<a class="customizer_social_section_premium up-to-pro" href="https://sellerthemes.com/<?php echo $theme_name; ?>-premium/" target="_blank" style="display: none;"><?php _e('More Social Available in the Premium Version','mega-mart'); ?></a>
				
			<?php
			}
		}
		
		$wp_customize->add_setting( 'mega_mart_social_premium', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 3,
		));
		$wp_customize->add_control(
			new mega_mart_social__section_premium(
			$wp_customize,
			'mega_mart_social_premium',
				array(
					'section'				=> 'header_navigation',
				)
			)
		);	
	
	
	/*=========================================
	Browse Section
	=========================================*/	
	$wp_customize->add_setting(
		'product_search_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'product_search_head',
		array(
			'type' => 'hidden',
			'label' => __('Product Search','mega-mart'),
			'section' => 'header_navigation',
		)
	);
	
	// Hide / Show 
	$wp_customize->add_setting( 
		'hs_product_search' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'priority' => 12,
		) 
	);
	
	$wp_customize->add_control(
	'hs_product_search', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'mega-mart' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);
	
	
	
	/*=========================================
	Sticky Header
	=========================================*/	
	$wp_customize->add_section(
        'sticky_header_set',
        array(
        	'priority'      => 4,
            'title' 		=> __('Sticky Header','mega-mart'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Heading
	$wp_customize->add_setting(
		'sticky_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'sticky_head',
		array(
			'type' => 'hidden',
			'label' => __('Sticky Header','mega-mart'),
			'section' => 'sticky_header_set',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_sticky' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_sticky', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'mega-mart' ),
			'section'     => 'sticky_header_set',
			'type'        => 'checkbox'
		) 
	);		
	
	//  Sticky Header Logo // 
    $wp_customize->add_setting( 
    	'sticky_header_logo' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/logo'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_url',	
			'priority' => 10,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'sticky_header_logo' ,
		array(
			'label'          => esc_html__( 'Sticky Logo [If Exists]', 'mega-mart'),
			'section'        => 'sticky_header_set',
		) 
	));
	
	
// Pro Upgrade
	class  Megamart_sticky_logo__section_upgrade extends WP_Customize_Control {
		public function render_content() { 
		$theme = wp_get_theme();
		$theme_name = $theme -> name;
		$theme_name = strtolower(str_replace(' ','-',$theme_name));
		?>
			<a class="customizer_sticky_logo_section_premium up-to-pro" style="padding:9px 0; text-align:center;" href="https://sellerthemes.com/<?php echo $theme_name; ?>-premium/" target="_blank"><?php esc_html_e('Upgrade To Pro For More Features','mega-mart'); ?></a>
			
		<?php }
	}
	
	$wp_customize->add_setting( 'sticky_logo_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'mega_mart_sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'priority' => 5,
	));
	$wp_customize->add_control(
		new  Megamart_sticky_logo__section_upgrade(
		$wp_customize,
		'sticky_logo_upgrade_to_pro',
			array(
				'section'				=> 'sticky_header_set',
			)
		)
	);
}
add_action( 'customize_register', 'mega_mart_header_settings' );