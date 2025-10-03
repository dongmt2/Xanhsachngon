<?php  
if ( ! function_exists( 'ecommerce_comp_mega_mart_slider' ) ) :
	function ecommerce_comp_mega_mart_slider() {
	$slider 						= get_theme_mod('slider',mega_mart_get_slider_default());
	$slider_setting_hs				= get_theme_mod('slider_setting_hs','1');
	if($slider_setting_hs == '1' ) {
	if ( ! empty( $slider ) ) {
	$slider = json_decode( $slider );
?>	
<section id="banner-section" class="banner-section banner-home-three">
	<div class="container">
		<div class="main-slider3 owl-carousel">
				<?php
				foreach ( $slider as $index => $slide_item ) {
					$title = ! empty( $slide_item->title ) ? apply_filters( 'mega_mart_translate_single_string', $slide_item->title, 'slider section' ) : '';
					$subtitle = ! empty( $slide_item->subtitle ) ? apply_filters( 'mega_mart_translate_single_string', $slide_item->subtitle, 'slider section' ) : '';
					$subtitle2 = ! empty( $slide_item->subtitle2 ) ? apply_filters( 'mega_mart_translate_single_string', $slide_item->subtitle2, 'slider section' ) : '';
					$subtitle3 = ! empty( $slide_item->subtitle3 ) ? apply_filters( 'mega_mart_translate_single_string', $slide_item->subtitle3, 'slider section' ) : '';
					$button_text = ! empty( $slide_item->button_text) ? apply_filters( 'mega_mart_translate_single_string', $slide_item->button_text,'slider section' ) : '';
					$button_link = ! empty( $slide_item->button_link ) ? apply_filters( 'mega_mart_translate_single_string', $slide_item->button_link, 'slider section' ) : '';			
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'mega_mart_translate_single_string', $slide_item->image_url, 'slider section' ) : '';				
					$title_color = ! empty( $slide_item->color ) ? apply_filters( 'mega_mart_translate_single_string', $slide_item->color, 'slider section' ) : '';
					$subtitle_color = ! empty( $slide_item->color2 ) ? apply_filters( 'mega_mart_translate_single_string', $slide_item->color2, 'slider section' ) : '';
					$description_color = ! empty( $slide_item->color3 ) ? apply_filters( 'mega_mart_translate_single_string', $slide_item->color3, 'slider section' ) : '';
					$newtab = ! empty( $slide_item->newtab ) ? apply_filters( 'mega_mart_translate_single_string', $slide_item->newtab, 'slider section' ) : '';
					$nofollow = ! empty( $slide_item->nofollow ) ? apply_filters( 'mega_mart_translate_single_string', $slide_item->nofollow, 'slider section' ) : '';
					$text = ! empty( $slide_item->text ) ? apply_filters( 'mega_mart_translate_single_string', $slide_item->text, 'slider section' ) : '';
					$text2 = ! empty( $slide_item->text2 ) ? apply_filters( 'mega_mart_translate_single_string', $slide_item->text2, 'slider section' ) : '';				
			?>
			
			<div class="item">
				<aside class="banner-item style-3">
				<?php if ( ! empty( $image ) ) { ?> 
					<div class="banner-img">
						<img src="<?php echo esc_url($image);  ?>" data-img-url="<?php echo esc_url($image);  ?>" alt="<?php esc_html_e('Slider-'.$index,'ecommerce-companion'); ?>"> 
					</div>   
					<?php } ?>
					<div class="banner-content">
						<?php  if ( ! empty( $text ) || ! empty( $text2 ) ): ?>
						<span class="banner-badge style-1 bg-1" data-animation="fadeInLeft" data-delay="150ms"><?php echo esc_html(/*Translators: %s: Offer Title */ sprintf(__('%s','ecommerce-companion'),$text)); ?></span>
						<?php endif; ?>
						<div class="banner-footer">
							<?php  if ( ! empty( $title ) ): ?>
							<p class="primary-color" data-animation="fadeInLeft" data-delay="300ms"><?php echo esc_html(/*Translators: %s: Title */ sprintf(__('%s','ecommerce-companion'),$title)); ?></p>
							<?php endif; ?>
							
							<?php  if ( ! empty( $subtitle ) ): ?>
							<h3 class="secondary-color" data-animation="fadeInLeft" data-delay="450ms"><?php echo esc_html(/*Translators: %s: Subtitle */ sprintf(__('%s','ecommerce-companion'),$subtitle)); ?></h3>
							<?php endif; ?>
							
							<?php  if (  ! empty( $subtitle2 ) || ! empty( $subtitle2 ) ): ?>
							<h3 class="secondary-color2" data-animation="fadeInLeft" data-delay="600ms"><?php echo esc_html(/*Translators: %s: Second Subtitle */ sprintf(__('%s %s','ecommerce-companion'),$subtitle2,$subtitle3)); ?></h3>
							<?php endif; ?>
							
							<?php  if ( ! empty( $button_text ) ): ?>
							<a href="<?php echo esc_attr($button_link); ?>" <?php if($newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($newtab =='yes') {echo 'noreferrer noopener';} ?> <?php if($nofollow =='yes') {echo 'nofollow';} ?>" class="btn btn-primary more-link" data-animation="fadeInLeft" data-delay="750ms"><span><?php echo esc_html(/*Translators: %s: Button Text*/ sprintf(__('%s','ecommerce-companion'),$button_text )); ?></span> <i class="fa fa-shopping-bag"></i></a>
							<?php endif; ?>
						</div>
					</div>
				</aside>
			</div>
			<?php }  ?>		
		</div>
	</div>
</section>
	<?php }
} }
endif;
if ( function_exists( 'ecommerce_comp_mega_mart_slider' ) ) {
$section_priority = apply_filters( 'mega_mart_section_priority', 12, 'ecommerce_comp_mega_mart_slider' );
add_action( 'mega_mart_sections', 'ecommerce_comp_mega_mart_slider', absint( $section_priority ) );
}
?>