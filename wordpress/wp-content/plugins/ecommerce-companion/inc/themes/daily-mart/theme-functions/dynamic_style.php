<?php
if( ! function_exists( 'ecommerce_comp_daily_mart_dynamic_style' ) ):
    function ecommerce_comp_daily_mart_dynamic_style() {

		$output_css = '';
		/**
		 * Header
		 */
		$above_header_first_hs	= get_theme_mod('above_header_first_hs', '1');
		$hide_show_hdr_contact	= get_theme_mod('hide_show_hdr_contact', '1');
		if($above_header_first_hs == '0' && $hide_show_hdr_contact == '0') { 
			$output_css .=".header.header-three .nav-area .navigation-content {
				grid-template-columns: 1fr;
			}\n";
		} elseif($above_header_first_hs == '1' && $hide_show_hdr_contact == '0') {
			$output_css .=".header.header-three .nav-area .navigation-content {
				grid-template-columns: 5fr 0.65fr;
			}\n";
		} elseif($hide_show_hdr_contact == '1' && $above_header_first_hs == '0') {
			$output_css .=".header.header-three .nav-area .navigation-content {
				grid-template-columns: 5fr 1fr;
			}\n";
		} else {
			$output_css .=".header.header-three .nav-area .navigation-content {
				grid-template-columns: 5fr 1fr 1.5fr;
			}\n";
		}


        wp_add_inline_style( 'mega-mart-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'ecommerce_comp_daily_mart_dynamic_style' );