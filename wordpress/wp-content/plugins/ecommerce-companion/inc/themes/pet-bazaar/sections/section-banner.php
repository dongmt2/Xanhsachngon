<?php 
if ( ! function_exists( 'ecommerce_comp_pet_bazaar_banner' ) ) :
	function ecommerce_comp_pet_bazaar_banner() {	
	$banner_hs				= get_theme_mod('banner_hs','1');
	$banner_contents 		= get_theme_mod('banner_contents',pet_bazaar_get_banner_default());
	if($banner_hs == '1') {
?>	
<section id="banner-section" class="banner-section pt-0">
	<div class="container">
		<div class="row">
			<?php
				if ( ! empty( $banner_contents ) ) {
				$banner_contents = json_decode( $banner_contents );
				foreach ( $banner_contents as $banner_item ) {
					$title = ! empty( $banner_item->title ) ? apply_filters( 'pet_bazaar_translate_single_string', $banner_item->title, 'Banner section' ) : '';
					$subtitle = ! empty( $banner_item->subtitle ) ? apply_filters( 'pet_bazaar_translate_single_string', $banner_item->subtitle, 'Banner section' ) : '';
					$button = ! empty( $banner_item->text2 ) ? apply_filters( 'pet_bazaar_translate_single_string', $banner_item->text2, 'Banner section' ) : '';
					$link = ! empty( $banner_item->link ) ? apply_filters( 'pet_bazaar_translate_single_string', $banner_item->link, 'Banner section' ) : '';
					$image = ! empty( $banner_item->image_url) ? apply_filters( 'pet_bazaar_translate_single_string', $banner_item->image_url,'Banner section' ) : '';
			?>
				<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
					<div class="banner-item">
						<img src="<?php if(!empty($image)){ echo esc_url($image);} ?>" alt="" class="w-100 d-block zoom">
                        <div class="banner-effect"></div>
                        <div class="banner-content col-lg-8 col-md-7">
                            <span><?php if(!empty($title)){ esc_html(/*Translators: %s:Title */printf(__('%s.','ecommerce-companion'),$title)); } ?></span>
                            <h4><?php if(!empty($subtitle)){ esc_html(/*Translators: %s:Subtitle */printf(__('%s.','ecommerce-companion'),$subtitle));} ?></h4>
                            <a href="<?php if(!empty($link)){ echo esc_url($link);} ?>" class="btn-on active"><?php if(!empty($button)){ esc_html(/*Translators: %s:Button */printf(__('%s.','ecommerce-companion'),$button)); } ?><span></span></a>
                        </div>
					</div>
				</div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php } ?>

<?php
}
endif;
if ( function_exists( 'ecommerce_comp_pet_bazaar_banner' ) ) {
$section_priority = apply_filters( 'pet_bazaar_section_priority', 14, 'ecommerce_comp_pet_bazaar_banner' );
add_action( 'pet_bazaar_sections', 'ecommerce_comp_pet_bazaar_banner', absint( $section_priority ) );
}
?>