<?php
function mega_mart_upsale_setting( $wp_customize ) {
	
	$wp_customize->add_section(
        'mega_mart_upsale',
        array(
            'title' 		=> __('Get More Features in Mega Mart Pro','mega-mart'),
			'priority'      => 1,
		)
    );
	
	/*=========================================
	 Buttons
	=========================================*/
	
	class Mega_Mart_Button_Customize_Control extends WP_Customize_Control {
	public $type = 'mega_mart_upsale';

	   function render_content() {
		?>
			<div class="upsale_info">
				<ul>
					<li><a href="https://preview.sellerthemes.com/pro/megamart/" class="btn-secondary" target="_blank"><i class="dashicons dashicons-desktop"></i><?php _e( 'Pro Demo','mega-mart' ); ?> </a></li>
					
					<li><a href="https://sellerthemes.com/mega-mart-premium/" class="btn-primary" target="_blank"><i class="dashicons dashicons-cart"></i><?php _e( 'Purchase Now','mega-mart' ); ?> </a></li>
					
					<li><a href="https://sellerthemes.ticksy.com/" class="btn-secondary" target="_blank"><i class="dashicons dashicons-sos"></i><?php _e( 'Ask for Support','mega-mart' ); ?> </a></li>
					
					<li><a href="https://wordpress.org/support/theme/mega-mart/reviews/#new-post" class="btn-green" target="_blank"><i class="dashicons dashicons-heart"></i><?php _e( 'Give us Rating','mega-mart' ); ?> </a></li>
				</ul>
			</div>
		<?php
	   }
	}
	
	$wp_customize->add_setting(
		'mega_mart_upsale_btns',
		array(
		   'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
		)	
	);
	
	$wp_customize->add_control( new Mega_Mart_Button_Customize_Control( $wp_customize, 'mega_mart_upsale_btns', array(
		'section' => 'mega_mart_upsale',
    ))
);
}
add_action( 'customize_register', 'mega_mart_upsale_setting' );