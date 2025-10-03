<?php  
	if ( ! function_exists( 'ecommerce_comp_mega_mart_testimonial' ) ) :
	function ecommerce_comp_mega_mart_testimonial() {
	$testimonial_contents 			= get_theme_mod('testimonial_contents',mega_mart_get_testimonial_default());	
	$testimonial_section_title		= get_theme_mod('testimonial_section_title',__('Product Reviews','ecommerce-companion'));	
	$testimonial_hs				= get_theme_mod('testimonial_hs','1');	
	if($testimonial_hs == '1'):
?>	
<section id="testimonial-section" class="testimonial-section st-py-default">
	<div class="container">
		<div class="row">
			<div class="col-8 col-lg-3">
				<div class="section-title"><?php echo esc_html(/*Translators: %s: Section Title */ sprintf(__('%s','ecommerce-companion'),$testimonial_section_title )); ?></div>
			</div>
			<div class="col-4 col-lg-9 d-flex justify-content-end align-items-center">
				<div class="custom-owl-nav">
					<button type="button" class="custom-prev"><i class='fa fa-chevron-left'></i></button>
					<button type="button" class="custom-next"><i class='fa fa-chevron-right'></i></button>
				</div>
			</div>
			<div class="col-lg-12 col-12">
				<div class="container-wrapper">
					<div class="testimonial-slider owl-carousel">
					<?php
						if ( ! empty( $testimonial_contents ) ) {
						$testimonial_contents = json_decode( $testimonial_contents );
						foreach ( $testimonial_contents as $testimonial_item ) {
							$title = ! empty( $testimonial_item->title ) ? apply_filters( 'mega_mart_pro_translate_single_string', $testimonial_item->title, 'Testimonial section' ) : '';
							$subtitle = ! empty( $testimonial_item->subtitle ) ? apply_filters( 'mega_mart_pro_translate_single_string', $testimonial_item->subtitle, 'Testimonial section' ) : '';				
							$description = ! empty( $testimonial_item->description ) ? apply_filters( 'mega_mart_pro_translate_single_string', $testimonial_item->description, 'Testimonial section' ) : '';				
							$text = ! empty( $testimonial_item->text ) ? apply_filters( 'mega_mart_pro_translate_single_string', $testimonial_item->text, 'Testimonial section' ) : '';
							$text2 = ! empty( $testimonial_item->text2 ) ? apply_filters( 'mega_mart_pro_translate_single_string', $testimonial_item->text2, 'Testimonial section' ) : '';
							$text3 = ! empty( $testimonial_item->text3 ) ? apply_filters( 'mega_mart_pro_translate_single_string', $testimonial_item->text3, 'Testimonial section' ) : '';
							$image = ! empty( $testimonial_item->image_url ) ? apply_filters( 'mega_mart_pro_translate_single_string', $testimonial_item->image_url, 'Testimonial section' ) : '';
							$image2 = ! empty( $testimonial_item->image_url2 ) ? apply_filters( 'mega_mart_pro_translate_single_string', $testimonial_item->image_url2, 'Testimonial section' ) : '';
					?>
						<div class="client-item wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
							 <div class="client-inner">
									<div class="client-description">
										<div class="client-detail">
										<?php if($image):  ?>
											<div class="client-img">
												<img src="<?php  echo esc_url($image); ?>" alt="<?php echo esc_html(/*Translators: %s: Client Name */ sprintf(__('%s','ecommerce-companion'),$title )); ?>">
											</div>
											<?php endif; ?>
											<div>
											<?php if(!empty($title)): ?>
												<h5><?php echo esc_html(/*Translators: %s: Client Name */ sprintf(__('%s','ecommerce-companion'),$title )); ?></h5>
											<?php endif; ?>
											
											<?php if(!empty($subtitle)): ?>
												<p><?php echo esc_html(/*Translators: %s: Client Designation */ sprintf(__('%s','ecommerce-companion'),$subtitle )); ?></p>
											<?php endif; ?>
											
											<?php if(!empty($text)): ?>
												<div class="rating">
													<?php for($i = 1 ; $i <= $text; $i++ ){ ?>
														<span class="fa fa-star filled"></span>
													<?php	} ?>
												</div>
											<?php endif; ?>
											</div>
										</div>
										<?php if(!empty($description)): ?>
											<div class="client-text">
												<p class="ellipsis"><?php echo esc_html(/*Translators: %s: Client Review */ sprintf(__('%s','ecommerce-companion'),$description )); ?></p>
											</div>
										<?php endif; ?>
									</div>
									<div class="client-bottom">
									<?php if(!empty($image2)): ?>
										<div class="me-2">
											<img src="<?php  echo esc_url($image2); ?>" alt="<?php echo esc_html(/*Translators: %s: Product  Name */ sprintf(__('%s','ecommerce-companion'),$text2 )); ?>">
										</div>
									<?php endif; ?>
										<div >
										<?php if(!empty($text2)): ?>
											<h5><?php echo esc_html(/*Translators: %s: Product  Name */ sprintf(__('%s','ecommerce-companion'),$text2 )); ?></h5>
										<?php endif; ?>
										
										<?php if(!empty($text3)): ?>
											<p><?php echo esc_html(/*Translators: %s: Product  Price */ sprintf(__('%s','ecommerce-companion'),$text3 )); ?></p>
										<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						<?php } } ?>
					 </div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php	endif; } endif;
	
if ( function_exists( 'ecommerce_comp_mega_mart_testimonial' ) ) {
$section_priority = apply_filters( 'mega_mart_section_priority', 18, 'ecommerce_comp_mega_mart_testimonial' );
add_action( 'mega_mart_sections', 'ecommerce_comp_mega_mart_testimonial', absint( $section_priority ) );
}
?>