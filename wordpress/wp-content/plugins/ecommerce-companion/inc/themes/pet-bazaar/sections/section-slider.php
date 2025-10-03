 <!--===// Start: Slider
    =================================--> 
<?php  
if ( ! function_exists( 'ecommerce_comp_pet_bazaar_slider' ) ) :
	function ecommerce_comp_pet_bazaar_slider() {
	$slider_setting_hs				= get_theme_mod('slider_setting_hs','1');	
	$slider 						= get_theme_mod('slider',pet_bazaar_get_slider_default());
	$slide_ttl_color				= get_theme_mod('slide_ttl_color');
	$slide_subttl_color				= get_theme_mod('slide_subttl_color');
	$slide_desc_color				= get_theme_mod('slide_desc_color');
	if($slider_setting_hs=='1'):
?>	
<section id="slider-section" class="slider-section slider_one">
	<div class="owl-carousel" id="main_slider">
		<?php
			if ( ! empty( $slider ) ) {
			$slider = json_decode( $slider );
			foreach ( $slider as $slide_item ) {
				$title = ! empty( $slide_item->title ) ? apply_filters( 'pet_bazaar_translate_single_string', $slide_item->title, 'slider 2 section' ) : '';
				$subtitle = ! empty( $slide_item->subtitle ) ? apply_filters( 'pet_bazaar_translate_single_string', $slide_item->subtitle, 'slider 2 section' ) : '';
				$description = ! empty( $slide_item->subtitle2 ) ? apply_filters( 'pet_bazaar_translate_single_string', $slide_item->subtitle2, 'slider 2 section' ) : '';
				$button = ! empty( $slide_item->text2) ? apply_filters( 'pet_bazaar_translate_single_string', $slide_item->text2,'slider 2 section' ) : '';
				$link = ! empty( $slide_item->link ) ? apply_filters( 'pet_bazaar_translate_single_string', $slide_item->link, 'slider 2 section' ) : '';
				$image = ! empty( $slide_item->image_url ) ? apply_filters( 'pet_bazaar_translate_single_string', $slide_item->image_url, 'slider 2 section' ) : '';
				$image2 = ! empty( $slide_item->image_url2 ) ? apply_filters( 'pet_bazaar_translate_single_string', $slide_item->image_url2, 'slider 2 section' ) : '';
				$open_new_tab = ! empty( $slide_item->open_new_tab ) ? apply_filters( 'pet_bazaar_translate_single_string', $slide_item->open_new_tab, 'slider 2 section' ) : '';
				$title_color = ! empty( $slide_item->color ) ? apply_filters( 'pet_bazaar_translate_single_string', $slide_item->color, 'slider section' ) : '';
				$subtitle_color = ! empty( $slide_item->color2 ) ? apply_filters( 'pet_bazaar_translate_single_string', $slide_item->color2, 'slider section' ) : '';
				$description_color = ! empty( $slide_item->color3 ) ? apply_filters( 'pet_bazaar_translate_single_string', $slide_item->color3, 'slider section' ) : '';
		?>
			<div class="best-slide slide-area" style="background-image: url('<?php if ( ! empty( $image ) ) { echo esc_url($image); } ?>');">			
			<div class="container">
                    <div class="slide-text-wrapper content-one mx-auto text-center">
						<?php  if ( ! empty( $subtitle ) ): ?>
                        <h1 class="slide-text slide-text-title mb-3" style="color: <?php echo $subtitle_color; ?>">
                            <?php  esc_html(/*Translators: %s: Subtitle*/ printf(__('%s.','ecommerce-companion'),$subtitle)); ?>
                        </h1>
						<?php endif; ?>
						<?php  if ( ! empty( $description ) ): ?>
                        <p class="slide-text slide-text-description mb-4" style="color: <?php echo $description_color; ?>">
                            <?php esc_html(/*Translators: %s: description*/ printf(__('%s.','ecommerce-companion'),$description)); ?>
                        </p>
						<?php endif; ?>
						<?php  if ( ! empty( $button ) ): ?>
                        <a href="<?php echo esc_url($link); ?>" class="slide-text btn-on active"><?php esc_html(/*Translators: %s: Button Label*/ printf(__('%s.','ecommerce-companion'),$button)); ?> <i class="fa fa-chevron-right"></i> <span></span></a>
						<?php endif; ?>
                    </div>
                </div>				
			</div>
		<?php } } ?>
	</div>	
</section>
<?php
endif;
}
endif;
if ( function_exists( 'ecommerce_comp_pet_bazaar_slider' ) ) {
$section_priority = apply_filters( 'pet_bazaar_section_priority', 11, 'ecommerce_comp_pet_bazaar_slider' );
add_action( 'pet_bazaar_sections', 'ecommerce_comp_pet_bazaar_slider', absint( $section_priority ) );
}
?>