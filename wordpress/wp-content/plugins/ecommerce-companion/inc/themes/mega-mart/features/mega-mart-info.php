<?php 
function mega_mart_info_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Info Section Panel
	=========================================*/
	$wp_customize->add_section(
		'info_setting', array(
			'title' => esc_html__( 'Info Section', 'ecommerce-companion' ),
			'panel' => 'mega_mart_frontpage_sections',
			'priority' => 4,
		)
	);
	
	// Marquee Contents
	$wp_customize->add_setting(
		'info_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'info_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Contents','ecommerce-companion'),
			'section' => 'info_setting',
		)
	);
	
	$wp_customize->add_setting( 
		'info_hs' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'info_hs', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'ecommerce-companion' ),
			'section'     => 'info_setting',
			'type'        => 'checkbox'
		) 
	);
	/**
	 * Customizer Repeater for add slides
	 */
	
	$wp_customize->add_setting( 'info_content', 
		array(
		 'sanitize_callback' => 'mega_mart_repeater_sanitize',
		  'default' => mega_mart_get_info_default()
		)
	);
	
	$wp_customize->add_control( 
		new Mega_Mart_Repeater( $wp_customize, 
			'info_content', 
				array(
					'label'   => esc_html__('Info Contents','ecommerce-companion'),
					'section' => 'info_setting',
					'add_field_label'                   => esc_html__( 'Add New Info', 'ecommerce-companion' ),
					'item_name'                         => esc_html__( 'Info', 'ecommerce-companion' ),
					'customizer_repeater_title_control' => true,
					'customizer_repeater_subtitle_control' => true,
					'customizer_repeater_icon_control' => true,
				) 
			) 
		);
		
		
		//Pro feature
		class mega_mart_info__section_premium extends WP_Customize_Control {
			public function render_content() { 
			?>
				<a class="customizer_info_section_premium up-to-pro" href="<?php echo esc_url(mega_mart_premium_links()); ?>" target="_blank" style="display: none;"><?php _e('More Info Available in the Premium Version','ecommerce-companion'); ?></a>
				
			<?php
			}
		}
		
		$wp_customize->add_setting( 'mega_mart_info_premium', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 6,
		));
		$wp_customize->add_control(
			new mega_mart_info__section_premium(
			$wp_customize,
			'mega_mart_info_premium',
				array(
					'section'				=> 'info_setting',
				)
			)
		);
}
add_action( 'customize_register', 'mega_mart_info_setting' );

//selective refresh
function mega_mart_info_section_partials( $wp_customize ){	
	
	// slider_contents
	$wp_customize->selective_refresh->add_partial( 'info_content', array(
		'selector'            => '.infoservice-section .infoservice-item'
	) );
	
}
add_action( 'customize_register', 'mega_mart_info_section_partials' );