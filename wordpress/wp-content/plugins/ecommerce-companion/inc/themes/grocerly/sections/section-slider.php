<?php  
if ( ! function_exists( 'ecommerce_comp_mega_mart_slider' ) ) :
	function ecommerce_comp_mega_mart_slider() {
	$slider 						= get_theme_mod('slider',mega_mart_get_slider_default());
	
	$left_side_img1					= get_theme_mod('left_side_img1', ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/grocerly/assets/images/page-slider/banner1.jpg');
	$left_side_title1				= get_theme_mod('left_side_title1', __('Order Online Now!','ecommerce-companion'));
	$left_side_subtitle1			= get_theme_mod('left_side_subtitle1', __('Fresh Vegetables','ecommerce-companion'));
	$left_side_btn_lbl1				= get_theme_mod('left_side_btn_lbl1', __('Shop Online','ecommerce-companion'));
	$left_side_btn_link1			= get_theme_mod('left_side_btn_link1', '');
	$left_btn_newtab1				= get_theme_mod('left_btn_newtab1', '1');
	$left_btn_nofollow1				= get_theme_mod('left_btn_nofollow1', '1');
	
	$left_side_img2					= get_theme_mod('left_side_img2', ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/grocerly/assets/images/page-slider/banner2.jpg');
	$left_side_title2				= get_theme_mod('left_side_title2', __('Exclusive Offer','ecommerce-companion'));
	$left_side_subtitle2			= get_theme_mod('left_side_subtitle2', __('Hot Spicy Items','ecommerce-companion'));
	$left_side_btn_lbl2				= get_theme_mod('left_side_btn_lbl2', __('Shop Online','ecommerce-companion'));
	$left_side_btn_link2			= get_theme_mod('left_side_btn_link2', '');
	$left_btn_newtab2				= get_theme_mod('left_btn_newtab2', '1');
	$left_btn_nofollow2				= get_theme_mod('left_btn_nofollow2', '1');
	
	$right_side_img1				= get_theme_mod('right_side_img1', ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/grocerly/assets/images/page-slider/banner1.jpg');
	$right_side_title1				= get_theme_mod('right_side_title1', __('Order Online Now!','ecommerce-companion'));
	$right_side_subtitle1			= get_theme_mod('right_side_subtitle1', __('Fresh Vegetables','ecommerce-companion'));
	$right_side_btn_lbl1			= get_theme_mod('right_side_btn_lbl1', __('Shop Online','ecommerce-companion'));
	$right_side_btn_link1			= get_theme_mod('right_side_btn_link1', '');
	$right_btn_newtab1				= get_theme_mod('right_btn_newtab1', '1');
	$right_btn_nofollow1			= get_theme_mod('right_btn_nofollow1', '1');
	
	$right_side_img2				= get_theme_mod('right_side_img2', ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/grocerly/assets/images/page-slider/banner2.jpg');
	$right_side_title2				= get_theme_mod('right_side_title2', __('Exclusive Offer','ecommerce-companion'));
	$right_side_subtitle2			= get_theme_mod('right_side_subtitle2', __('Hot Spicy Items','ecommerce-companion'));
	$right_side_btn_lbl2			= get_theme_mod('right_side_btn_lbl2', __('Shop Online','ecommerce-companion'));
	$right_side_btn_link2			= get_theme_mod('right_side_btn_link2', '');
	$right_btn_newtab2				= get_theme_mod('right_btn_newtab2', '1');
	$right_btn_nofollow2			= get_theme_mod('right_btn_nofollow2', '1');
	
	$slider_setting_hs				= get_theme_mod('slider_setting_hs','1');
	if($slider_setting_hs == '1' ) {
	if ( ! empty( $slider ) ) {
	$slider = json_decode( $slider );
?>	
<section id="slider-section" class="slider-wrapper main-slider-home-two">
	<div class="container">
		<div class="row gy-2 gy-sm-3 gx-3 align-items-stretch">
			<div class="col-lg-3 col-6 order-2 order-lg-1">
				<div class="row gy-2 gy-sm-3">
					<div class="col-12">
						<aside class="banner-item style-3">
							<?php  if ( ! empty( $left_side_img1 ) ): ?>
							<div class="banner-img">
								<img src="<?php echo esc_url($left_side_img1); ?>" alt="<?php esc_attr_e('Left Image One','ecommerce-companion'); ?>">
							</div>
							<?php endif; ?>	

							<div class="banner-content">
								<div class="banner-footer">
									<?php  if ( ! empty( $left_side_title1 ) ): ?>
									<p class="secondary-color2 text-animation"><?php echo esc_html(/*Translators: %s: Title */ sprintf(__('%s','ecommerce-companion'),$left_side_title1)); ?></p>
									<?php endif; ?>	
									
									<?php  if ( ! empty( $left_side_subtitle1 ) ): ?>
									<h4 class="primary-color text-animation"><?php echo esc_html(/*Translators: %s: Subtitle */ sprintf(__('%s','ecommerce-companion'),$left_side_subtitle1)); ?></h4>
									<?php endif; ?>
									
									<?php  if ( ! empty( $left_side_btn_lbl1 ) ): ?>
									<a href="<?php echo esc_attr($left_side_btn_link1); ?>" <?php if($left_btn_newtab1 =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($left_btn_newtab1 =='yes') {echo 'noreferrer noopener';} ?> <?php if($left_btn_nofollow1 =='yes') {echo 'nofollow';} ?>" class="btn btn-primary main-button"><span><?php echo esc_html(/*Translators: %s: Button Text*/ sprintf(__('%s','ecommerce-companion'),$left_side_btn_lbl1 )); ?></span> <i class="fa fa-shopping-bag"></i></a>
									<?php endif; ?>
								</div>
							</div>
						</aside>
					</div>
					<div class="col-12">
						<aside class="banner-item style-3">
							<?php  if ( ! empty( $left_side_img2 ) ): ?>
							<div class="banner-img">
								<img src="<?php echo esc_url($left_side_img2); ?>" alt="<?php esc_attr_e('Left Image One','ecommerce-companion'); ?>">
							</div>
							<?php endif; ?>	

							<div class="banner-content">
								<div class="banner-footer">
									<?php  if ( ! empty( $left_side_title2 ) ): ?>
									<p class="secondary-color text-animation"><?php echo esc_html(/*Translators: %s: Title */ sprintf(__('%s','ecommerce-companion'),$left_side_title2)); ?></p>
									<?php endif; ?>	
									
									<?php  if ( ! empty( $left_side_subtitle2 ) ): ?>
									<h4 class="text-animation"><?php echo esc_html(/*Translators: %s: Subtitle */ sprintf(__('%s','ecommerce-companion'),$left_side_subtitle2)); ?></h4>
									<?php endif; ?>
									
									<?php  if ( ! empty( $left_side_btn_lbl2 ) ): ?>
									<a href="<?php echo esc_attr($left_side_btn_link2); ?>" <?php if($left_btn_newtab2 =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($left_btn_newtab2 =='yes') {echo 'noreferrer noopener';} ?> <?php if($left_btn_nofollow2 =='yes') {echo 'nofollow';} ?>" class="btn btn-primary main-button"><span><?php echo esc_html(/*Translators: %s: Button Text*/ sprintf(__('%s','ecommerce-companion'),$left_side_btn_lbl2 )); ?></span> <i class="fa fa-shopping-bag"></i></a>
									<?php endif; ?>
								</div>
							</div>
						</aside>
					</div>					
				</div>
			</div>
			<div class="col-lg-6 col-12 order-1 order-lg-2">
				<div class="main-slider2 owl-carousel">
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
					<aside class="banner-item style-4">
						<?php if ( ! empty( $image ) ) { ?>
						<div class="banner-img ms-auto">
							<img src="<?php echo esc_url($image); ?>" alt="<?php esc_html_e('Slider-'.$index,'ecommerce-companion'); ?>">
						</div>
						<?php } ?>
						<div class="banner-content">
							<?php  if ( ! empty( $title ) ): ?>
							<span class="banner-badge style-2 bg-1 text-white" data-animation="fadeInLeft" data-delay="150ms"><?php echo esc_html(/*Translators: %s: Title */ sprintf(__('%s','ecommerce-companion'),$title)); ?></span>
							<?php endif; ?>
							
							<?php  if ( ! empty( $subtitle ) || !empty( $subtitle2 ) || !empty( $subtitle3 ) ): ?>
							<h3 class="text-dark" data-animation="fadeInLeft" data-delay="200ms"><?php echo esc_html(/*Translators: %s: Subtitle */ sprintf(__('%s','ecommerce-companion'),$subtitle)); ?> <span class="primary-color2"><?php echo esc_html(/*Translators: %s: Subtitle 2 */ sprintf(__('%s','ecommerce-companion'),$subtitle2)); ?></span> <?php echo esc_html(/*Translators: %s: Subtitle 3 */ sprintf(__('%s','ecommerce-companion'),$subtitle3)); ?></h3>
							<?php endif; ?>
							
							<?php  if ( ! empty( $button_text ) ): ?>
							<a class="btn btn-primary more-link" href="<?php echo esc_attr($button_link); ?>" <?php if($newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($newtab =='yes') {echo 'noreferrer noopener';} ?> <?php if($nofollow =='yes') {echo 'nofollow';} ?>" data-animation="fadeInLeft" data-delay="150ms" class="btn btn-primary main-button"><span><?php echo esc_html(/*Translators: %s: Button Text*/ sprintf(__('%s','ecommerce-companion'),$button_text )); ?></span> <i class="fa fa-shopping-bag"></i></a>
							<?php endif; ?>
						</div>
					</aside>
				<?php }  ?>		
				</div>
			</div>
			<div class="col-lg-3 col-6 order-3">
				<div class="row gy-2 gy-sm-3">
					<div class="col-12">
						<aside class="banner-item style-3">
							<?php  if ( ! empty( $right_side_img1 ) ): ?>
							<div class="banner-img">
								<img src="<?php echo esc_url($right_side_img1); ?>" alt="<?php esc_attr_e('Right Image One','ecommerce-companion'); ?>">
							</div>
							<?php endif; ?>	

							<div class="banner-content">
								<div class="banner-footer">
									<?php  if ( ! empty( $right_side_title1 ) ): ?>
									<p class="secondary-color2 text-animation"><?php echo esc_html(/*Translators: %s: Title */ sprintf(__('%s','ecommerce-companion'),$right_side_title1)); ?></p>
									<?php endif; ?>	
									
									<?php  if ( ! empty( $right_side_subtitle1 ) ): ?>
									<h4 class="primary-color text-animation"><?php echo esc_html(/*Translators: %s: Subtitle */ sprintf(__('%s','ecommerce-companion'),$right_side_subtitle1)); ?></h4>
									<?php endif; ?>
									
									<?php  if ( ! empty( $right_side_btn_lbl1 ) ): ?>
									<a href="<?php echo esc_attr($right_side_btn_link1); ?>" <?php if($right_btn_newtab1 =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($right_btn_newtab1 =='yes') {echo 'noreferrer noopener';} ?> <?php if($right_btn_nofollow1 =='yes') {echo 'nofollow';} ?>" class="btn btn-primary main-button"><span><?php echo esc_html(/*Translators: %s: Button Text*/ sprintf(__('%s','ecommerce-companion'),$right_side_btn_lbl1 )); ?></span> <i class="fa fa-shopping-bag"></i></a>
									<?php endif; ?>
								</div>
							</div>
						</aside>
					</div>
					<div class="col-12">
						<aside class="banner-item style-3">
							<?php  if ( ! empty( $right_side_img2 ) ): ?>
							<div class="banner-img">
								<img src="<?php echo esc_url($right_side_img2); ?>" alt="<?php esc_attr_e('Right Image Two','ecommerce-companion'); ?>">
							</div>
							<?php endif; ?>	

							<div class="banner-content">
								<div class="banner-footer">
									<?php  if ( ! empty( $right_side_title2 ) ): ?>
									<p class="secondary-color text-animation"><?php echo esc_html(/*Translators: %s: Title */ sprintf(__('%s','ecommerce-companion'),$right_side_title2)); ?></p>
									<?php endif; ?>	
									
									<?php  if ( ! empty( $right_side_subtitle2 ) ): ?>
									<h4 class="text-animation"><?php echo esc_html(/*Translators: %s: Subtitle */ sprintf(__('%s','ecommerce-companion'),$right_side_subtitle2)); ?></h4>
									<?php endif; ?>
									
									<?php  if ( ! empty( $right_side_btn_lbl2 ) ): ?>
									<a href="<?php echo esc_attr($right_side_btn_link2); ?>" <?php if($right_btn_newtab2 =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($right_btn_newtab2 =='yes') {echo 'noreferrer noopener';} ?> <?php if($right_btn_nofollow2 =='yes') {echo 'nofollow';} ?>" class="btn btn-primary main-button"><span><?php echo esc_html(/*Translators: %s: Button Text*/ sprintf(__('%s','ecommerce-companion'),$right_side_btn_lbl2 )); ?></span> <i class="fa fa-shopping-bag"></i></a>
									<?php endif; ?>
								</div>
							</div>
						</aside>
					</div>					
				</div>
			</div>
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