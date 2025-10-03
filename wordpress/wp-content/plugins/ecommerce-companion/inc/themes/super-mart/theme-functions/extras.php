<?php
if(! function_exists('mega_mart_get_testimonial_default')) {
	function mega_mart_get_testimonial_default() {
		return apply_filters(
		'mega_mart_get_testimonial_default', wp_json_encode(
				 array(
					array(
						'title'	  				=>  esc_html__( 'Kenneth Myers', 'ecommerce-companion' ),
						'subtitle'  			=>  esc_html__( 'Executive Chef', 'ecommerce-companion' ),						
						'description'  			=>  esc_html__( 'It is a long established fact that a reader will be distracted.', 'ecommerce-companion' ),						
						'image_url' 			=> esc_url(ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/super-mart/assets/images/testimonial/testimonial-img1.png'),
						'image_url2' 			=> esc_url(ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/super-mart/assets/images/testimonial/img1.png'),
						'text'  				=>  '5',
						'text2'  				=>  esc_html__(' Fresh Apple', 'ecommerce-companion' ),
						'text3'  				=>  esc_html__(' $20.20', 'ecommerce-companion' ),
						'id'        			=> 'customizer_repeater_testimonial_001',
					),
					array(
						'title'	  				=>  esc_html__( 'Ervin Arlington', 'ecommerce-companion' ),
						'subtitle'  			=>  esc_html__( 'Executive Chef', 'ecommerce-companion' ),						
						'description'  			=>  esc_html__( 'It is a long established fact that a reader will be distracted.', 'ecommerce-companion' ),						
						'image_url' 			=> esc_url(ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/super-mart/assets/images/testimonial/testimonial-img2.png'),
						'image_url2' 			=> esc_url(ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/super-mart/assets/images/testimonial/img2.png'),
						'text'  				=>  '5',
						'text2'  				=>  esc_html__('Red Tomato', 'ecommerce-companion' ),
						'text3'  				=>  esc_html__(' $40.20', 'ecommerce-companion' ),
						'id'        			=> 'customizer_repeater_testimonial_002',
					),
					array(
						'title'	  				=>  esc_html__( 'Patrik M', 'ecommerce-companion' ),
						'subtitle'  			=>  esc_html__( 'Executive Chef', 'ecommerce-companion' ),						
						'description'  			=>  esc_html__( 'It is a long established fact that a reader will be distracted.', 'ecommerce-companion' ),						
						'image_url' 			=> esc_url(ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/super-mart/assets/images/testimonial/testimonial-img3.png'),
						'image_url2' 			=> esc_url(ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/super-mart/assets/images/testimonial/img3.png'),
						'text'  				=>  '5',
						'text2'  				=>  esc_html__(' Fresh Lamon', 'ecommerce-companion' ),
						'text3'  				=>  esc_html__(' $80.20', 'ecommerce-companion' ),
						'id'        			=> 'customizer_repeater_testimonial_003',
					),
				)
			)
		);
	}
}