<?php 
function mega_mart_footer_marquee_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	$wp_customize->add_section(
		'footer_marquee_setting', array(
			'title' => esc_html__( 'Footer Marquee Section', 'ecommerce-companion' ),
			'panel' => 'mega_mart_frontpage_sections',
		)
	);
	
	// Marquee Contents
	$wp_customize->add_setting(
		'footer_marquee_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'footer_marquee_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Contents','ecommerce-companion'),
			'section' => 'footer_marquee_setting',
		)
	);
	/**
	 * Customizer Repeater for add slides
	 */
	
	$wp_customize->add_setting( 'ftr_mrq_content', 
		array(
		 'sanitize_callback' => 'mega_mart_repeater_sanitize',
		  'default' => hdr_mrq_content_default()
		)
	);
	
	$wp_customize->add_control( 
		new Theme_Repeater( $wp_customize, 
			'ftr_mrq_content', 
				array(
					'label'   => esc_html__('Marquee Contents','ecommerce-companion'),
					'section' => 'footer_marquee_setting',
					'add_field_label'                   => esc_html__( 'Add New FMarquee', 'ecommerce-companion' ),
					'item_name'                         => esc_html__( 'FMarquee', 'ecommerce-companion' ),
					'customizer_repeater_text_control' => true,
					'customizer_repeater_link_control' => true,
					'customizer_repeater_newtab_control' => true,
					'customizer_repeater_nofollow_control' => true,
				) 
			) 
		);
		
		//Pro feature
		class mega_mart_ftr_mrq__section_premium extends WP_Customize_Control {
			public function render_content() { 
			?>
				<a class="customizer_ftr_mrq_section_premium up-to-pro" href="<?php echo esc_url(mega_mart_premium_links()); ?>" target="_blank" style="display: none;"><?php _e('More Marquees Available in the Premium Version','ecommerce-companion'); ?></a>
				
			<?php
			}
		}
		
		$wp_customize->add_setting( 'mega_mart_ftr_mrq_premium', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 6,
		));
		$wp_customize->add_control(
			new mega_mart_ftr_mrq__section_premium(
			$wp_customize,
			'mega_mart_ftr_mrq_premium',
				array(
					'section'				=> 'footer_marquee_setting',
				)
			)
		);
		
		$wp_customize->add_setting(
			'ftr_mrq_direction',
			array(
				'default'			=> 'right',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'mega_mart_sanitize_select',
			)
		);	

		$wp_customize->add_control(
			'ftr_mrq_direction',
			array(
				'label'   		=> __('Sliding Direction','ecommerce-companion'),
				'section' 		=> 'footer_marquee_setting',
				'settings'   	 => 'ftr_mrq_direction',
				'type'			=> 'select',
				'choices'        => 
				array(
					'right' => __( 'Right', 'ecommerce-companion' ),
					'left' => __( 'Left', 'ecommerce-companion' ),
				) 
			) 
		);
}
add_action( 'customize_register', 'mega_mart_footer_marquee_setting' );