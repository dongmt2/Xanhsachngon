<?php
function mega_mart_brand_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Testimonial  Section
	=========================================*/
	$wp_customize->add_section(
		'brand_setting', array(
			'title' => esc_html__( 'Brand Section', 'ecommerce-companion' ),
			'panel' => 'mega_mart_frontpage_sections',
		)
	);

	// Brand content Section // 
	$wp_customize->add_setting(
		'brand_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'brand_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','ecommerce-companion'),
			'section' => 'brand_setting',
		)
	);	
	
	// Head
	/* Title */
	$wp_customize->add_setting( 
		'brand_section_title' , 
			array(
			'default' => __('Our Brands','ecommerce-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		) 
	);
	
	$wp_customize->add_control(
	'brand_section_title', 
		array(
			'label'	      => esc_html__( 'Section Title', 'ecommerce-companion' ),
			'section'     => 'brand_setting',
		) 
	);
		
	/**
	 * Customizer Repeater for add brand
	 */
	
		$wp_customize->add_setting( 'brand_contents', 
			array(
			 'sanitize_callback' => 'mega_mart_repeater_sanitize',
			 'default' => get_brand_default()
			)
		);
		
		$wp_customize->add_control( 
			new Mega_Mart_Repeater( $wp_customize, 
				'brand_contents', 
					array(
						'label'   => esc_html__('Brand','ecommerce-companion'),
						'section' => 'brand_setting',
						'add_field_label'                   => esc_html__( 'Add New Brand', 'ecommerce-companion' ),
						'item_name'                         => esc_html__( 'Brand', 'ecommerce-companion' ),
						'customizer_repeater_title_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_newtab_control' => true,
						'customizer_repeater_nofollow_control' => true,
					) 
				) 
			);
			
		
	class  MegaMart_brand__section_upgrade extends WP_Customize_Control {
		public function render_content() { 	
			
		?>
			<a class="customizer_brand_upgrade_section up-to-pro" style="display: none;" href="<?php echo esc_url(mega_mart_premium_links()); ?>" target="_blank"><?php esc_html_e('Upgrade To Pro For More Brands','ecommerce-companion'); ?></a>
			
		<?php }
	}
	
	$wp_customize->add_setting( 'brand_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'mega_mart_sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'priority' => 5,
	));
	$wp_customize->add_control(
		new  MegaMart_brand__section_upgrade(
		$wp_customize,
		'brand_upgrade_to_pro',
			array(
				'section'				=> 'brand_setting',
			)
		)
	);
	// Brand column // 
	$wp_customize->add_setting(
    	'brand_sec_column',
    	array(
	        'default'			=> '6',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_select',
		)
	);	

	$wp_customize->add_control(
		'brand_sec_column',
		array(
		    'label'   		=> __('Select Column','ecommerce-companion'),
		    'section' 		=> 'brand_setting',
			'type'			=> 'select',
			'choices'        => 
			array(
				'4' => __( '4 Column', 'ecommerce-companion' ),
				'5' => __( '5 Column', 'ecommerce-companion' ),
				'6' => __( '6 Column', 'ecommerce-companion' ),
				'7' => __( '7 Column', 'ecommerce-companion' ),
				'8' => __( '8 Column', 'ecommerce-companion' ),
			) 
		) 
	);
	class  MegaMart_brand_col__section_upgrade extends WP_Customize_Control {
		public function render_content() { 	
			
		?>
			<a class="customizer_brand_col_section_premium up-to-pro" style="padding:9px 0; text-align:center;" href="<?php echo esc_url(mega_mart_premium_links()); ?>" target="_blank"><?php esc_html_e('Unlock With Daily Mart Pro','ecommerce-companion'); ?></a>
			
		<?php }
	}
	
	$wp_customize->add_setting( 'brand_col_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'mega_mart_sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'priority' => 5,
	));
	$wp_customize->add_control(
		new  MegaMart_brand_col__section_upgrade(
		$wp_customize,
		'brand_col_upgrade_to_pro',
			array(
				'section'				=> 'brand_setting',
			)
		)
	); 
}

add_action( 'customize_register', 'mega_mart_brand_setting' );


//selective refresh
function mega_mart_brand_section_partials( $wp_customize ){	
	
	// brand_contents
	$wp_customize->selective_refresh->add_partial( 'brand_contents', array(
		'selector'            => '.brand-section .brand-carousel'
	) );
	
	// brand_Title
	$wp_customize->selective_refresh->add_partial( 'brand_section_title', array(
		'selector'            => '.brand-section .section-title'
	) );
	
}
add_action( 'customize_register', 'mega_mart_brand_section_partials' );