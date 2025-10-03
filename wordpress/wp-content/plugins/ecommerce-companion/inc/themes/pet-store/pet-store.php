<?php
/**
 * @package   Pet Store
 */
 
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/theme-functions/extras.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/storely/theme-functions/functions-style.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/theme-functions/dynamic_style.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/features/pet-bazaar-header.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/features/pet-bazaar-slider.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/features/pet-bazaar-category.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/features/pet-bazaar-feature-product.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-store/features/pet-bazaar-cta.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-store/features/pet-bazaar-sponsor.php';
require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/features/pet-bazaar-typography.php';

if ( ! function_exists( 'ecommerce_comp_pet_store_frontpage_sections' ) ) :
	function ecommerce_comp_pet_store_frontpage_sections() {	
		require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-store/sections/section-slider.php';
		require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-store/sections/section-category.php';
		require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-bazaar/sections/section-feature-product.php';
		require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-store/sections/section-cta.php';
		require ECOMMERCE_COMP_PLUGIN_DIR . 'inc/themes/pet-store/sections/section-sponsor.php';
    }
	add_action( 'pet_bazaar_sections', 'ecommerce_comp_pet_store_frontpage_sections' );
endif;