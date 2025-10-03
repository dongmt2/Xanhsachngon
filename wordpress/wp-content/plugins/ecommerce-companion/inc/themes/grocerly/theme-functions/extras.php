<?php
if(! function_exists('hdr_mrq_content_default')) {
	function hdr_mrq_content_default() {
		return apply_filters(
		'hdr_mrq_content_default', wp_json_encode(
				 array(
					array(						
						'text'	  	=>  esc_html__( 'Up to 50% OFF on selected products', 'ecommerce-companion' ),
						'link'	  	=>  esc_html__( '#', 'ecommerce-companion' ),
						'newtab'  	=>  esc_html__( '', 'ecommerce-companion' ),
						'nofollow'  =>  esc_html__( '', 'ecommerce-companion' ),
						'id'        => 'customizer_repeater_hdr_mrq_001',
					),
					array(						
						'text'	  	=>  esc_html__( 'Buy 1 Get Free on top brands', 'ecommerce-companion' ),
						'link'	  	=>  esc_html__( '#', 'ecommerce-companion' ),
						'newtab'  	=>  esc_html__( '', 'ecommerce-companion' ),
						'nofollow'  =>  esc_html__( '', 'ecommerce-companion' ),
						'id'        => 'customizer_repeater_hdr_mrq_002',
					),
					array(						
						'text'	  	=>  esc_html__( 'Exclusive Online Discounts - Shop from home & save more!', 'ecommerce-companion' ),
						'link'	  	=>  esc_html__( '#', 'ecommerce-companion' ),
						'newtab'  	=>  esc_html__( '', 'ecommerce-companion' ),
						'nofollow'  =>  esc_html__( '', 'ecommerce-companion' ),
						'id'        => 'customizer_repeater_hdr_mrq_003',
					),
					array(						
						'text'	  	=>  esc_html__( 'Limited Time Offer - Hurry, while stocks last', 'ecommerce-companion' ),
						'link'	  	=>  esc_html__( '#', 'ecommerce-companion' ),
						'newtab'  	=>  esc_html__( '', 'ecommerce-companion' ),
						'nofollow'  =>  esc_html__( '', 'ecommerce-companion' ),
						'id'        => 'customizer_repeater_hdr_mrq_004',
					),
					array(						
						'text'	  	=>  esc_html__( 'Buy 1 Get Free on top brands', 'ecommerce-companion' ),
						'link'	  	=>  esc_html__( '#', 'ecommerce-companion' ),
						'newtab'  	=>  esc_html__( '', 'ecommerce-companion' ),
						'nofollow'  =>  esc_html__( '', 'ecommerce-companion' ),
						'id'        => 'customizer_repeater_hdr_mrq_005',
					),
					array(						
						'text'	  	=>  esc_html__( 'Buy 2 Get 4 Free on Exclusive brands', 'ecommerce-companion' ),
						'link'	  	=>  esc_html__( '#', 'ecommerce-companion' ),
						'newtab'  	=>  esc_html__( '', 'ecommerce-companion' ),
						'nofollow'  =>  esc_html__( '', 'ecommerce-companion' ),
						'id'        => 'customizer_repeater_hdr_mrq_005',
					),
									
				)
			)
		);
	}
}