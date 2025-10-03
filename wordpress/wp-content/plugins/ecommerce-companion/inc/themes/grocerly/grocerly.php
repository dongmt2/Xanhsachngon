<?php
/**
 * @package Super Mart
 */
 
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/mega-mart/theme-functions/extras.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/grocerly/theme-functions/extras.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/storely/theme-functions/functions-style.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/mega-mart/theme-functions/dynamic_style.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/mega-mart/features/mega-mart-header.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/mega-mart/sections/above-header.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/grocerly/features/mega-mart-slider.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/mega-mart/features/mega-mart-category.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/mega-mart/features/mega-mart-info.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/mega-mart/features/mega-mart-product-one.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/mega-mart/features/mega-mart-product-two.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/grocerly/features/mega-mart-footer-marquee.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/mega-mart/features/mega-mart-banner.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/mega-mart/features/mega-mart-typography.php';

if ( ! function_exists( 'ecommerce_comp_super_mart_frontpage_sections' ) ) :
	function ecommerce_comp_super_mart_frontpage_sections() {	
		require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/grocerly/sections/section-slider.php';
		require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/mega-mart/sections/section-category.php';
		require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/grocerly/sections/section-info.php';
		require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/mega-mart/sections/section-product-one.php';
		require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/mega-mart/sections/section-banner.php';
		require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/mega-mart/sections/section-product-two.php';
		require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/grocerly/sections/section-footer-marquee.php';
    }
	add_action( 'mega_mart_sections', 'ecommerce_comp_super_mart_frontpage_sections' );
endif;