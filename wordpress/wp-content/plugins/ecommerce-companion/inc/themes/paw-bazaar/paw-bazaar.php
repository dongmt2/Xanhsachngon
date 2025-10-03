<?php
/**
 * @package   Paw Bazaar
 */
 
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/theme-functions/extras.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/storely/theme-functions/functions-style.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/theme-functions/dynamic_style.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/features/pet-bazaar-header.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/features/pet-bazaar-slider.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/features/pet-bazaar-category.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/features/pet-bazaar-feature-product.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/features/pet-bazaar-banner.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/paw-bazaar/features/paw-bazaar-testimonial.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/features/pet-bazaar-typography.php';

if ( ! function_exists( 'ecommerce_comp_paw_bazaar_frontpage_sections' ) ) :
	function ecommerce_comp_paw_bazaar_frontpage_sections() {	
		require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/paw-bazaar/sections/section-slider.php';
		require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/paw-bazaar/sections/section-category.php';
		require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/sections/section-feature-product.php';
		require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/sections/section-banner.php';
		require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/paw-bazaar/sections/section-testimonial.php';
    }
	add_action( 'pet_bazaar_sections', 'ecommerce_comp_paw_bazaar_frontpage_sections' );
endif;