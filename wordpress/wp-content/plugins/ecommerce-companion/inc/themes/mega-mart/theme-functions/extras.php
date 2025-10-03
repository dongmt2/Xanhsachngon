<?php
/*
 *
 * Slider Default
 */
 function mega_mart_get_slider_default() {
$theme = wp_get_theme();
$slide_image1 = [];

if ($theme->name == 'Super Mart') {
    for ($i = 1; $i <= 4; $i++) {
        $slide_image1[] = ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/super-mart/assets/images/page-slider/img01.jpg';
    }
} elseif ($theme->name == 'Grocerly') {
    for ($i = 1; $i <= 4; $i++) {
        $slide_image1[] = ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/grocerly/assets/images/page-slider/img01.png';
    }
} elseif ($theme->name == 'Daily Mart') {
    for ($i = 1; $i <= 4; $i++) {
        $slide_image1[] = ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/daily-mart/assets/images/page-slider/img01.jpg';
    }
} else {
    for ($i = 1; $i <= 4; $i++) {
        $slide_image1[] = ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/mega-mart/assets/images/page-slider/img0' . $i . '.jpg';
    }
}

return apply_filters(
    'mega_mart_get_slider_default',
    wp_json_encode(
        array(
            array(
                'image_url' => $slide_image1[0],
                'image_url2' => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/mega-mart/assets/images/page-slider/slider-tabs1.png',
                'title' => esc_html__('Fresh 100% Organic Food', 'ecommerce-companion'),
                'subtitle' => esc_html__('Organic', 'ecommerce-companion'),
                'subtitle2' => esc_html__('Foods', 'ecommerce-companion'),
                'subtitle3' => esc_html__('& Vegetables', 'ecommerce-companion'),
                'button_text' => esc_html__('Shop Online', 'ecommerce-companion'),
                'button_link' => esc_url('#'),
                'newtab' => 'yes',
                'nofollow' => 'yes',
                'text' => esc_html__('100%', 'ecommerce-companion'),
                'text2' => esc_html__('Organic', 'ecommerce-companion'),
                'text3' => esc_html__('Bakery', 'ecommerce-companion'),
                'text4' => esc_html__('Fresh', 'ecommerce-companion'),
                'color' => '#FFFFFF',
                'color2' => '#FFFFFF',
                'color3' => '#FFFFFF',
                'id' => 'customizer_repeater_slider_001',
            ),
            array(
                'image_url' => $slide_image1[1],
                'image_url2' => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/mega-mart/assets/images/page-slider/slider-tabs2.png',
                'title' => esc_html__('Fresh 100% Organic Food', 'ecommerce-companion'),
                'subtitle' => esc_html__('Organic', 'ecommerce-companion'),
                'subtitle2' => esc_html__('Foods', 'ecommerce-companion'),
                'subtitle3' => esc_html__('& Vegetables', 'ecommerce-companion'),
                'button_text' => esc_html__('Shop Online', 'ecommerce-companion'),
                 'button_link' => esc_url('#'),
                'newtab' => 'yes',
                'nofollow' => 'yes',
                'text' => esc_html__('100%', 'ecommerce-companion'),
                'text2' => esc_html__('Organic', 'ecommerce-companion'),
                'text3' => esc_html__('Vegetable', 'ecommerce-companion'),
                'text4' => esc_html__('Fresh', 'ecommerce-companion'),
                'color' => '#FFFFFF',
                'color2' => '#FFFFFF',
                'color3' => '#FFFFFF',
                'id' => 'customizer_repeater_slider_002',
            ),
            array(
                'image_url' => $slide_image1[2],
                'image_url2' => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/mega-mart/assets/images/page-slider/slider-tabs3.png',
                'title' => esc_html__('Fresh 100% Organic Food', 'ecommerce-companion'),
                'subtitle' => esc_html__('Organic', 'ecommerce-companion'),
                'subtitle2' => esc_html__('Foods', 'ecommerce-companion'),
                'subtitle3' => esc_html__('& Vegetables', 'ecommerce-companion'),
                'button_text' => esc_html__('Shop Online', 'ecommerce-companion'),
                 'button_link' => esc_url('#'),
                'newtab' => 'yes',
                'nofollow' => 'yes',
                'text' => esc_html__('100%', 'ecommerce-companion'),
                'text2' => esc_html__('Organic', 'ecommerce-companion'),
                'text3' => esc_html__('Grocery', 'ecommerce-companion'),
                'text4' => esc_html__('Fresh', 'ecommerce-companion'),
                'color' => '#FFFFFF',
                'color2' => '#FFFFFF',
                'color3' => '#FFFFFF',
                'id' => 'customizer_repeater_slider_003',
            ),
            array(
                'image_url' => $slide_image1[3],
                'image_url2' => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/mega-mart/assets/images/page-slider/slider-tabs4.png',
                'title' => esc_html__('Fresh 100% Organic Food', 'ecommerce-companion'),
                'subtitle' => esc_html__('Organic', 'ecommerce-companion'),
                'subtitle2' => esc_html__('Foods', 'ecommerce-companion'),
                'subtitle3' => esc_html__('& Vegetables', 'ecommerce-companion'),
                'button_text' => esc_html__('Shop Online', 'ecommerce-companion'),
                'button_link' => esc_url('#'),
                'newtab' => 'yes',
                'nofollow' => 'yes',
                'text' => esc_html__('100%', 'ecommerce-companion'),
                'text2' => esc_html__('Organic', 'ecommerce-companion'),
                'text3' => esc_html__('Frozen', 'ecommerce-companion'), 
                'text4' => esc_html__('Fresh', 'ecommerce-companion'),
                'color' => '#FFFFFF',
                'color2' => '#FFFFFF',
                'color3' => '#FFFFFF',
                'id' => 'customizer_repeater_slider_004',
            ),
        )
    )
);	
}

/**
 * 
 * Mega Mart Premium Links
 * 
 */
 
 if ( ! function_exists( 'mega_mart_premium_links' ) ) :
	function mega_mart_premium_links() {
		
		$theme = wp_get_theme(); // gets the current theme
		if( 'Super Mart' == $theme->name){
			$mega_mart_premium_url= 'https://sellerthemes.com/super-mart-premium/';
		}elseif( 'Grocerly' == $theme->name){
			$mega_mart_premium_url= 'https://sellerthemes.com/grocerly-premium/';
		}elseif( 'Daily Mart' == $theme->name){
			$mega_mart_premium_url= 'https://sellerthemes.com/daily-mart-premium/';	
		}else{
			$mega_mart_premium_url= 'https://sellerthemes.com/mega-mart-premium/';
		}	
		return $mega_mart_premium_url;
	}
endif;