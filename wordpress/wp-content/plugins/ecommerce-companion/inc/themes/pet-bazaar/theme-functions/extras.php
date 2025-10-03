<?php

/*
 *
 * Header Text
 */
 if(! function_exists ('pet_bazaar_hdr_text') ){
	function pet_bazaar_hdr_text() {
		$abv_hdr_antext 		= get_theme_mod('abv_hdr_antext');
		$hs_hdr_anim 			= get_theme_mod('hs_hdr_anim','1');
		if($hs_hdr_anim == '1'){
		?>
		<aside class="widget textwidget">
			<div class="text-container">
				<div class="newsflash owl-carousel">
					<?php echo header_slides($abv_hdr_antext); ?>				
				</div>
			</div>
		</aside>
		<?php }
	}
 }
add_action('pet_bazaar_hdr_text','pet_bazaar_hdr_text');

/* Header Slides */

if ( ! function_exists( 'header_slides' ) ) {
function header_slides($txt) {
	$headerslide_text_explode	=	explode(', ', $txt);
	
	$header_slides ='';
	foreach($headerslide_text_explode as $text){ 
		$header_slides = $header_slides.'<div class="textslide-one"><div class="icon-holder"><i class="fa fa-tag"></i></div>'.esc_html($text).'</div>';
	}
	return $header_slides;
}}

/**
 * Pet Bazaar Header Social
 */
if ( ! function_exists( 'pet_bazaar_hdr_social' ) ) {
	function  pet_bazaar_hdr_social() {
		$hs_hdr_social	= get_theme_mod( 'hs_hdr_social','1');
		$hdr_social_ttl	= get_theme_mod( 'hdr_social_ttl',__('Follow us:','ecommerce-companion'));
		$social_icons	= get_theme_mod( 'social_icons',pet_bazaar_get_social_icon_default());
		if($hs_hdr_social=='1' ):
	?>	
			<aside class="widget widget_social_widget">
				<ul>
					<?php
						$social_icons = json_decode($social_icons);
						if( $social_icons!='' )
						{
						foreach($social_icons as $social_item){	
						$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'pet_bazaar_translate_single_string', $social_item->icon_value, 'Header section' ) : '';	
						$social_link = ! empty( $social_item->link ) ? apply_filters( 'pet_bazaar_translate_single_string', $social_item->link, 'Header section' ) : '';
					?>
						<li class="social-effect"><a class="social-a" href="<?php echo esc_url( $social_link ); ?>"><i class="fab <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
					<?php }} ?>
				</ul>
			</aside>
		<?php 
		endif; 
	}
}
add_action( 'pet_bazaar_hdr_social', 'pet_bazaar_hdr_social' );

/*
 *
 * Social Icon
 */
function pet_bazaar_get_social_icon_default() {
	return apply_filters(
		'pet_bazaar_get_social_icon_default', json_encode(
				 array(
				array(
					'icon_value'	  =>  esc_html__( 'fa-facebook', 'ecommerce-companion' ),
					'link'	  =>  esc_html__( '#', 'ecommerce-companion' ),
					'id'              => 'customizer_repeater_header_social_001',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-google-plus', 'ecommerce-companion' ),
					'link'	  =>  esc_html__( '#', 'ecommerce-companion' ),
					'id'              => 'customizer_repeater_header_social_002',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-twitter', 'ecommerce-companion' ),
					'link'	  =>  esc_html__( '#', 'ecommerce-companion' ),
					'id'              => 'customizer_repeater_header_social_003',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-linkedin', 'ecommerce-companion' ),
					'link'	  =>  esc_html__( '#', 'ecommerce-companion' ),
					'id'              => 'customizer_repeater_header_social_004',
				)
			)
		)
	);
}

 if(! function_exists ('footer_socials') ){
	 function footer_socials(){ 
		 $social_icons		= get_theme_mod('social_icons', pet_bazaar_get_social_icon_default());
	?>
		<aside class="widget widget_social_widget">
			<h4 class="widget-title d-none"></h4>
			<ul>
				<?php
					$social_icons = json_decode($social_icons);
					if( $social_icons!='' )
					{
					foreach($social_icons as $social_item){	
					$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'pet_bazaar_translate_single_string', $social_item->icon_value, 'Footer section' ) : '';	
					$social_link = ! empty( $social_item->link ) ? apply_filters( 'pet_bazaar_translate_single_string', $social_item->link, 'Footer section' ) : '';
				?>
					<li class="social-effect"><a href="<?php echo esc_url( $social_link ); ?>" class="social-a"><i class="fab <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
				<?php }} ?>
			</ul>
		</aside>
		<?php 
	 }
 }
add_action('footer_socials','footer_socials');

/*
 *
 * Slider Default
 */
 function pet_bazaar_get_slider_default() {
	return apply_filters(
		'pet_bazaar_get_slider_default', json_encode(
				 array(
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/pet-bazaar/assets/images/page-slider/slide-bg.png',
					'image_url2'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/pet-bazaar/assets/images/page-slider/slider-img.png',
					'title'           => esc_html__( 'We Offering', 'ecommerce-companion' ),
					'subtitle'         => esc_html__( 'Enjoy Your Life With Buddy', 'ecommerce-companion' ),
					'subtitle2'         => esc_html__( 'It’s easy to determine if your dog is overweight or your cat is obese', 'ecommerce-companion' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit. Sit alias veritatis placeat tempora aut iure dolorem sunt nostrum porro
                                        dolor.', 'ecommerce-companion' ),
					'text2'	  =>  esc_html__( 'Shop Now', 'ecommerce-companion' ),
					'link'	  =>  esc_html__( '#', 'ecommerce-companion' ),
					"slide_align" => "left", 
					'id'              => 'customizer_repeater_slider_001',
				),array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/pet-bazaar/assets/images/page-slider/slide-bg2.png',
					'image_url2'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/pet-bazaar/assets/images/page-slider/slider-img2.png',
					'title'           => esc_html__( 'We Offering', 'ecommerce-companion' ),
					'subtitle'         => esc_html__( 'Enjoy Your Life With Buddy', 'ecommerce-companion' ),
					'subtitle2'         => esc_html__( 'It’s easy to determine if your dog is overweight or your cat is obese', 'ecommerce-companion' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit. Sit alias veritatis placeat tempora aut iure dolorem sunt nostrum porro
                                        dolor.', 'ecommerce-companion' ),
					'text2'	  =>  esc_html__( 'Shop Now', 'ecommerce-companion' ),
					'link'	  =>  esc_html__( '#', 'ecommerce-companion' ),
					"slide_align" => "left", 
					'id'              => 'customizer_repeater_slider_002',
				),array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/pet-bazaar/assets/images/page-slider/slide-bg3.png',
					'image_url2'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/pet-bazaar/assets/images/page-slider/slider-img3.png',
					'title'           => esc_html__( 'We Offering', 'ecommerce-companion' ),
					'subtitle'         => esc_html__( 'Enjoy Your Life With Buddy', 'ecommerce-companion' ),
					'subtitle2'         => esc_html__( 'It’s easy to determine if your dog is overweight or your cat is obese', 'ecommerce-companion' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit. Sit alias veritatis placeat tempora aut iure dolorem sunt nostrum porro
                                        dolor.', 'ecommerce-companion' ),
					'text2'	  =>  esc_html__( 'Shop Now', 'ecommerce-companion' ),
					'link'	  =>  esc_html__( '#', 'ecommerce-companion' ),
					"slide_align" => "left", 
					'id'              => 'customizer_repeater_slider_003',
				)
			)
		)
	);
}

/*
 *
 * Testimonial Default
 */
 function pet_bazaar_get_testimonial_default() {
	return apply_filters(
		'pet_bazaar_get_testimonial_default', wp_json_encode(
				 array(
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/paw-bazaar/assets/images/testimonial/test05.png',
					'title'           => esc_html__( 'Michael Ryhs', 'pet-bazaar' ),
					'subtitle'           => esc_html__( 'Marketer', 'pet-bazaar' ),
					'text'	  =>  esc_html__( 'There are many variations of passages of Lorem Ipsum available There are many variations of passages of Lorem Ipsum available There are many variations of passages of Lorem Ipsum available', 'pet-bazaar-pro' ),
					'id'              => 'customizer_repeater_testimonial_001',
				),
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/paw-bazaar/assets/images/testimonial/test02.png',
					'title'           => esc_html__( 'Michael Ryhs', 'pet-bazaar' ),
					'subtitle'           => esc_html__( 'CEO', 'pet-bazaar' ),
					'text'	  =>  esc_html__( 'There are many variations of passages of Lorem Ipsum available There are many variations of passages of Lorem Ipsum available There are many variations of passages of Lorem Ipsum available', 'pet-bazaar-pro' ),
					'id'              => 'customizer_repeater_testimonial_002',
				),
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/paw-bazaar/assets/images/testimonial/test03.png',
					'title'           => esc_html__( 'Michael Ryhs', 'pet-bazaar' ),
					'subtitle'           => esc_html__( 'Team Leader', 'pet-bazaar' ),
					'text'	  =>  esc_html__( 'There are many variations of passages of Lorem Ipsum available There are many variations of passages of Lorem Ipsum available There are many variations of passages of Lorem Ipsum available', 'pet-bazaar-pro' ),
					'id'              => 'customizer_repeater_testimonial_003',
				)
			)
		)
	);
}

/*
 *
 * Sponsor Default
 */
 function pet_bazaar_get_sponsor_default() {
	return apply_filters(
		'pet_bazaar_get_sponsor_default', wp_json_encode(
				 array(
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/pet-store/assets/images/sponsor/sponsor1.png',
					'id'              => 'customizer_repeater_sponsor_001',
				),
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/pet-store/assets/images/sponsor/sponsor2.png',
					'id'              => 'customizer_repeater_sponsor_002',
				),
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/pet-store/assets/images/sponsor/sponsor3.png',
					'id'              => 'customizer_repeater_sponsor_003',
				),
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/pet-store/assets/images/sponsor/sponsor4.png',
					'id'              => 'customizer_repeater_sponsor_004',
				),
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/pet-store/assets/images/sponsor/sponsor5.png',
					'id'              => 'customizer_repeater_sponsor_005',
				),
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/pet-store/assets/images/sponsor/sponsor6.png',
					'id'              => 'customizer_repeater_sponsor_006',
				)
			)
		)
	);
}


/**
 * 
 * Pet Bazaar Premium Links
 * 
 */
 
 if ( ! function_exists( 'pet_bazaar_premium_links' ) ) :
	function pet_bazaar_premium_links() {
		
		$theme = wp_get_theme(); // gets the current theme
		if( 'Paw Bazaar' == $theme->name){
			$pet_bazaar_premium_url= 'https://sellerthemes.com/paw-bazaar-premium/';
		}elseif( 'Feauty' == $theme->name){
			$pet_bazaar_premium_url= 'https://sellerthemes.com/feauty-premium/';	
		}else{
			$pet_bazaar_premium_url= 'https://sellerthemes.com/pet-bazaar-premium/';
		}	
		return $pet_bazaar_premium_url;
	}
endif;