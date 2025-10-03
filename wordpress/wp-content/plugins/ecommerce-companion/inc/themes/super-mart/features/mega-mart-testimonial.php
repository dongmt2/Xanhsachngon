<?php
function mega_mart_testimonial_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Testimonial  Section
	=========================================*/
	$wp_customize->add_section(
		'testimonial_setting', array(
			'title' => esc_html__( 'Testimonial Section', 'ecommerce-companion' ),
			'panel' => 'mega_mart_frontpage_sections',
			'priority' => 8,
		)
	);

	// Testimonial content Section // 
	$wp_customize->add_setting(
		'testimonial_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'testimonial_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','ecommerce-companion'),
			'section' => 'testimonial_setting',
		)
	);	
	
	// Head
	/* Title */
	$wp_customize->add_setting( 
		'testimonial_section_title' , 
			array(
			'default' => __('Product Reviews','ecommerce-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		) 
	);
	
	$wp_customize->add_control(
	'testimonial_section_title', 
		array(
			'label'	      => esc_html__( 'Section Title', 'ecommerce-companion' ),
			'section'     => 'testimonial_setting',
		) 
	);
		
	/**
	 * Customizer Repeater for add testimonial
	 */
	
		$wp_customize->add_setting( 'testimonial_contents', 
			array(
			 'sanitize_callback' => 'mega_mart_repeater_sanitize',
			 'default' => mega_mart_get_testimonial_default()
			)
		);
		
		$wp_customize->add_control( 
			new Mega_Mart_Repeater( $wp_customize, 
				'testimonial_contents', 
					array(
						'label'   => esc_html__('Testimonial','ecommerce-companion'),
						'section' => 'testimonial_setting',
						'add_field_label'                   => esc_html__( 'Add New Testimonial', 'ecommerce-companion' ),
						'item_name'                         => esc_html__( 'Testimonial', 'ecommerce-companion' ),
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_description_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_image2_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_text2_control' => true,
						'customizer_repeater_text3_control' => true,
					) 
				) 
			);
			
	class  MegaMart_testimonial__section_upgrade extends WP_Customize_Control {
		public function render_content() { 	
			
		?>
			<a class="customizer_testimonial_upgrade_section up-to-pro" style="display: none;" href="<?php echo esc_url(mega_mart_premium_links()); ?>" target="_blank"><?php esc_html_e('Upgrade To Pro For More Testimonial','mega-mart'); ?></a>
			
		<?php }
	}
	
	$wp_customize->add_setting( 'testimonial_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'mega_mart_sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'priority' => 5,
	));
	$wp_customize->add_control(
		new  MegaMart_testimonial__section_upgrade(
		$wp_customize,
		'testimonial_upgrade_to_pro',
			array(
				'section'				=> 'testimonial_setting',
			)
		)
	);
			
	// Testimonial column // 
	$wp_customize->add_setting(
    	'testimonial_sec_column',
    	array(
	        'default'			=> '3',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_select',
		)
	);	

	$wp_customize->add_control(
		'testimonial_sec_column',
		array(
		    'label'   		=> __('Select Column','ecommerce-companion'),
		    'section' 		=> 'testimonial_setting',
			'type'			=> 'select',
			'choices'        => 
			array(
				'2' => __( '2 Column', 'ecommerce-companion' ),
				'3' => __( '3 Column', 'ecommerce-companion' ),
				'4' => __( '4 Column', 'ecommerce-companion' ),
			) 
		) 
	);
	
	class  MegaMart_testimonial_col__section_upgrade extends WP_Customize_Control {
		public function render_content() { 	
			
		?>
			<a class="customizer_testimonial_col_section_premium up-to-pro" style="padding:9px 0; text-align:center;" href="<?php echo esc_url(mega_mart_premium_links()); ?>" target="_blank"><?php esc_html_e('Unlock With Super Mart Pro','mega-mart'); ?></a>
			
		<?php }
	}
	
	$wp_customize->add_setting( 'testimonial_col_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'mega_mart_sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'priority' => 5,
	));
	$wp_customize->add_control(
		new  MegaMart_testimonial_col__section_upgrade(
		$wp_customize,
		'testimonial_col_upgrade_to_pro',
			array(
				'section'				=> 'testimonial_setting',
			)
		)
	); 
}

add_action( 'customize_register', 'mega_mart_testimonial_setting' );


//selective refresh
function mega_mart_testimonial_section_partials( $wp_customize ){	
	
	// testimonial_contents
	$wp_customize->selective_refresh->add_partial( 'testimonial_contents', array(
		'selector'            => '.testimonial-slider .client-item'
	) );
	
	// testimonial_Title
	$wp_customize->selective_refresh->add_partial( 'testimonial_section_title', array(
		'selector'            => '.testimonial-section .section-title'
	) );
	
}
add_action( 'customize_register', 'mega_mart_testimonial_section_partials' );