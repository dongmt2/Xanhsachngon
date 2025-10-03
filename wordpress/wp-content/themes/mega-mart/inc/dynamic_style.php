<?php
if( ! function_exists( 'mega_mart_dynamic_style' ) ):
    function mega_mart_dynamic_style() {
		$output_css = '';
		
		 /**
		 *  Breadcrumb Style
		 */
		$breadcrumb_bg_img		= get_theme_mod('breadcrumb_bg_img',esc_url(get_template_directory_uri() .'/assets/images/breadcrumb.png')); 
		$breadcrumb_bg_img_opacity	= get_theme_mod('breadcrumb_bg_img_opacity','0.6');
		$breadcrumb_overlay_color	= get_theme_mod('breadcrumb_overlay_color','#080808');
		list($br, $bg, $bb) = sscanf($breadcrumb_overlay_color, "#%02x%02x%02x");
		
		if($breadcrumb_bg_img !== '') { 
			$output_css .=".breadcrumb-wrapper {					
					background-image: url('" .esc_attr($breadcrumb_bg_img). "');
				}\n";
		}
		
		 if ( !function_exists( 'ecommerce_companion_activate' ) ) : 
			$output_css .=".theme-mobile-menu .menu-primary {
					margin-top: 60px;
				}\n";
		 endif;
		 
		 $mega_mart_site_cntnr_width = get_theme_mod('mega_mart_site_cntnr_width','1320');
			if(!empty($mega_mart_site_cntnr_width)):
				 $output_css .=".container { 
					   max-width: ".esc_attr($mega_mart_site_cntnr_width)."px !important;					   
				}\n";
			endif;

		$footer_bg_image	= get_theme_mod('footer_bg_image',get_template_directory_uri(). '/assets/images/footer/footer_bg.jpg');
		$footer_bg_clr	= get_theme_mod('footer_bg_clr','#000000');
		$footer_clr_opacity	= get_theme_mod('footer_clr_opacity','80');
		
			if(!empty($footer_bg_image)):
				 $output_css .=".footer-section.footer-one { 
					   background: url('" .esc_url($footer_bg_image). "') center/ cover;					   
				}\n";
			endif;
			// if(!empty($footer_bg_clr)):
				 // $output_css .=".footer-section::before{ 
					   // background-color: " .esc_attr($footer_bg_clr). ";
					   // opacity: " .esc_attr($footer_clr_opacity). "%;
				// }\n";
			// endif;
				
        wp_add_inline_style( 'mega-mart-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'mega_mart_dynamic_style' );