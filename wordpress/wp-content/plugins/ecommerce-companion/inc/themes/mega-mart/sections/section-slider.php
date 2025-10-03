 <!--===// Start: Slider
    =================================--> 
<?php  
if ( ! function_exists( 'ecommerce_comp_mega_mart_slider' ) ) :
	function ecommerce_comp_mega_mart_slider() {
	$slider_setting_hs				= get_theme_mod('slider_setting_hs','1');	
	$slider 						= get_theme_mod('slider',mega_mart_get_slider_default());
	if($slider_setting_hs=='1'):
	if ( ! empty( $slider ) ) {
	$slider = json_decode( $slider );
?>	
<section id="slider-section" class="slider-wrapper">
	<div class="container">
		<div class="overflow-hidden">
			<div class="main-slider owl-carousel">
			<?php
			foreach ( $slider as $slide_item ) {
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
					<img src="<?php if ( ! empty( $image ) ) { echo esc_url($image); } ?>" data-img-url="<?php if ( ! empty( $image ) ) { echo esc_url($image); } ?>" alt="">
					<div class="theme-slider">
						<div class="theme-table">
							<div class="theme-table-cell">
								<div class="slider-content">                                
									<div class="theme-content text-left">
										<?php  if ( ! empty( $title ) ): ?>
										<div class="sub-title" data-animation="fadeInRight" data-delay="150ms">
											<h3><?php echo esc_html(/*Translators: %s: Title */ sprintf(__('%s','ecommerce-companion'),$title)); ?></h3>
										</div>
										<?php endif; ?>
										<?php  if ( ! empty( $subtitle ) || ! empty( $subtitle2 ) || ! empty( $subtitle3 ) ): ?>
										<h1 data-animation="fadeInRight" data-delay="200ms"><?php echo esc_html(/*Translators: %s: Subtitle */ sprintf(__('%s','ecommerce-companion'),$subtitle)); ?> <span><?php echo esc_html(/*Translators: %s: Subtitle2 */ sprintf(__('%s','ecommerce-companion'),$subtitle2)); ?></span><br><span><?php echo esc_html(/*Translators: %s: Subtitle */ sprintf(__('%s','ecommerce-companion'),$subtitle3)); ?></span></h1>  
										<?php endif; ?>
										
										<?php  if ( ! empty( $button_text ) ): ?>
										<a data-animation="fadeInRight" data-delay="800ms" href="<?php echo esc_url($button_link); ?>" <?php if($newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($newtab =='yes') {echo 'noreferrer noopener';} ?> <?php if($nofollow =='yes') {echo 'nofollow';} ?>" class="btn btn-primary main-button"><span><?php echo esc_html(/*Translators: %s: Button Text*/ sprintf(__('%s','ecommerce-companion'),$button_text )); ?></span> <i class="fa fa-shopping-bag"></i></a>
									</div>
									<?php endif; ?>
									
									<?php  if ( ! empty( $text ) || ! empty( $text2 ) ): ?>
									<div class="theme-content-offer aline-right" data-animation="fadeInRight" data-delay="800ms">
										<div class="offer-badge">
											<h1><?php echo esc_html(/*Translators: %s: Offer Title */ sprintf(__('%s','ecommerce-companion'),$text)); ?></h1>
											<p><?php echo esc_html(/*Translators: %s: Offer Subtitle */ sprintf(__('%s','ecommerce-companion'),$text2)); ?></p>
										</div>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php }  ?>
			</div>
			<div class="thumb-box">      
				<div class="owl-carousel owl-thumbs-main">
				<?php foreach ( $slider as $index => $slide_thumb ) {
					$image = ! empty( $slide_thumb->image_url ) ? apply_filters( 'mega_mart_translate_single_string', $slide_thumb->image_url, 'slider section' ) : '';
					$image2 = ! empty( $slide_thumb->image_url2 ) ? apply_filters( 'mega_mart_translate_single_string', $slide_thumb->image_url2, 'slider section' ) : '';
					$text3 = ! empty( $slide_thumb->text3 ) ? apply_filters( 'mega_mart_translate_single_string', $slide_thumb->text3, 'slider section' ) : '';
					$text4 = ! empty( $slide_thumb->text4 ) ? apply_filters( 'mega_mart_translate_single_string', $slide_thumb->text4, 'slider section' ) : '';
				?>
					<div class="item">
						<?php if ( ! empty( $image ) ) { ?>
						<div class="main-slider-img">
							<img src="<?php  echo esc_url($image);  ?>" alt="slider <?php echo $index ?>" />
						</div>
						<?php } ?>
						<?php if ( ! empty( $image2 ) ) { ?>
						<div class="categories-img">
							<img src="<?php  echo esc_url($image2);  ?>" alt="Thumb <?php echo $index ?>" />
						</div>
						<?php } ?>
						<?php  if ( ! empty( $text ) || ! empty( $text2 ) ): ?>
						<div class="categories-content">
							<h6><?php echo esc_html(/*Translators: %s: Slider Tab Title */ sprintf(__('%s','ecommerce-companion'),$text3)); ?></h6>
							<span><?php echo esc_html(/*Translators: %s: Slider Tab Subtitle */ sprintf(__('%s','ecommerce-companion'),$text4)); ?></span>
						</div>
						<?php endif; ?>
					</div>
				<?php } ?>
				</div>
			</div>			
		</div>
	</div>
</section>
<?php
	} endif;
}
endif;
if ( function_exists( 'ecommerce_comp_mega_mart_slider' ) ) {
$section_priority = apply_filters( 'mega_mart_section_priority', 12, 'ecommerce_comp_mega_mart_slider' );
add_action( 'mega_mart_sections', 'ecommerce_comp_mega_mart_slider', absint( $section_priority ) );
}
?>