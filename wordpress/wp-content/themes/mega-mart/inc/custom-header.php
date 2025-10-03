<?php
function mega_mart_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'mega_mart_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'FFFFFF',
		'width'                  => 2000,
		'height'                 => 200,
		'flex-height'            => true,
		'wp-head-callback'       => 'mega_mart_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'mega_mart_custom_header_setup' );

if ( ! function_exists( 'mega_mart_header_style' ) ) :

function mega_mart_header_style() {
	$header_text_color = get_header_textcolor();

	?>
	<style type="text/css">
	<?php
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
		a:has(.site-title) {
		display: none;
		}
	<?php
		else :
	?>
	@media( min-width: 992px) {
		body .main-header h4.site-title,
		body .main-header p.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	}
	<?php endif; ?>
	</style>
	<?php
}
endif;
