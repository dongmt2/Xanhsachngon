<?php
if( ! function_exists( 'ecommerce_comp_mega_mart_dynamic_style' ) ):
    function ecommerce_comp_mega_mart_dynamic_style() {

		$output_css = '';
		/**
		 * Logo Width 
		 */
		$output_css   .= storely_customizer_value( 'logo_width', '.logo img, .mobile-logo img', array( 'max-width' ), array( 140, 195, 250 ), 'px !important' );
		
		/**
		 * Container Width 
		 */
		$output_css   .= storely_customizer_value( 'mega_mart_site_cntnr_width', '.container-xxl, .container-xl, .container-lg, .container-md, .container-sm, .container', array( 'max-width' ), array( 320, 768, 1200 ), 'px !important' );
		
		/**
		 * Sidebar Width 
		 */
		$mega_mart_sidebar_width			= get_theme_mod('mega_mart_sidebar_width','34');
		if($mega_mart_sidebar_width !== '') { 
			$mega_mart_primary_width   = absint( 100 - $mega_mart_sidebar_width );
				$output_css .="	@media (min-width: 992px) {#st-primary {
					max-width:" .esc_attr($mega_mart_primary_width). "%;
					flex-basis:" .esc_attr($mega_mart_primary_width). "%;
				}\n";
				$output_css .="#st-secondary {
					max-width:" .esc_attr($mega_mart_sidebar_width). "%;
					flex-basis:" .esc_attr($mega_mart_sidebar_width). "%;
				}}\n";
        }
		
			
		$mega_mart_widget_ttl_size			= get_theme_mod('mega_mart_widget_ttl_size','28');
		if($mega_mart_widget_ttl_size !== '') { 
				$output_css .=".sidebar .widget-title, .sidebar .wp-block-heading {
					font-size: " .esc_attr($mega_mart_widget_ttl_size). "px;
				}\n";
			}
			
		
		/**
		 * Slider
		 */
		$slider_overlay_enable 				 = get_theme_mod('slider_overlay_enable');
		$slide_overlay_color 				 = get_theme_mod('slide_overlay_color','#000000');
		$slider_opacity						 = get_theme_mod('slider_opacity','0.12');
		list($br, $bg, $bb) = sscanf($slide_overlay_color, "#%02x%02x%02x");
		if($slider_overlay_enable == '1') { 
				$output_css .=".home-slider-info-wrapper {
					background: rgba($br, $bg, $bb, $slider_opacity);
				}.slider5 .home-slider-info-wrapper{
					background: none;
				}.slider5 div.slider-overlay {
						opacity: " .esc_attr($slider_opacity). ";
				}\n";
			}


		/**
		 *  Typography Header
		 */
		 
		 $output_css   .= storely_customizer_value( 'site_ttl_size', 'body .main-header h4.site-title', array( 'font-size' ), array( 24, 24, 24 ), 'px' );
		 $output_css   .= storely_customizer_value( 'site_desc_size', 'body .main-header p.site-description', array( 'font-size' ), array( 16, 16, 16 ) );
		 		 
		
		/**
		 *  Typography Body
		 */
		 $mega_mart_body_font_weight	 	 = get_theme_mod('mega_mart_body_font_weight','inherit');
		 $mega_mart_body_text_transform	 = get_theme_mod('mega_mart_body_text_transform','inherit');
		 $mega_mart_body_font_style	 	 = get_theme_mod('mega_mart_body_font_style','inherit');
		 $mega_mart_body_txt_decoration	 = get_theme_mod('mega_mart_body_txt_decoration','none');
		
		 $output_css   .= storely_customizer_value( 'mega_mart_body_font_size', 'body', array( 'font-size' ), array( 16, 16, 16 ), 'px' );
		 $output_css   .= storely_customizer_value( 'mega_mart_body_line_height', 'body', array( 'line-height' ), array( 1.6, 1.6, 1.6 ) );
		 $output_css   .= storely_customizer_value( 'mega_mart_body_ltr_space', 'body', array( 'letter-spacing' ), array( 0, 0, 0 ), 'px' );
		 $output_css .=" body{ 
			font-weight: " .esc_attr($mega_mart_body_font_weight). ";
			text-transform: " .esc_attr($mega_mart_body_text_transform). ";
			font-style: " .esc_attr($mega_mart_body_font_style). ";
			text-decoration: " .esc_attr($mega_mart_body_txt_decoration). ";
		}\n";		 
		
		/**
		 *  Typography Heading
		 */
		 for ( $i = 1; $i <= 6; $i++ ) {
			 $mega_mart_heading_font_weight	 	= get_theme_mod('mega_mart_h' . $i . '_font_weight','700');
			 $mega_mart_heading_text_transform 	= get_theme_mod('mega_mart_h' . $i . '_text_transform','inherit');
			 $mega_mart_heading_font_style	 	= get_theme_mod('mega_mart_h' . $i . '_font_style','inherit');
			 $mega_mart_heading_txt_decoration	= get_theme_mod('mega_mart_h' . $i . '_text_decoration','inherit');
			 
			 $output_css   .= storely_customizer_value( 'mega_mart_h' . $i . '_font_size', 'h' . $i .'', array( 'font-size' ), array( 36, 36, 36 ), 'px' );
			 $output_css   .= storely_customizer_value( 'mega_mart_h' . $i . '_line_height', 'h' . $i . '', array( 'line-height' ), array( 1.2, 1.2, 1.2 ) );
			 $output_css   .= storely_customizer_value( 'mega_mart_h' . $i . '_ltr_spacing', 'h' . $i . '', array( 'letter-spacing' ), array( 0, 0, 0 ), 'px' );
			 $output_css .=" h" . $i . "{ 
				font-weight: " .esc_attr($mega_mart_heading_font_weight). ";
				text-transform: " .esc_attr($mega_mart_heading_text_transform). ";
				font-style: " .esc_attr($mega_mart_heading_font_style). ";
				text-decoration: " .esc_attr($mega_mart_heading_txt_decoration). ";
			}\n";
		 }
		
        wp_add_inline_style( 'mega-mart-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'ecommerce_comp_mega_mart_dynamic_style' );