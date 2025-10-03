<?php 
	if ( ! function_exists( 'ecommerce_comp_mega_mart_brand' ) ) :
	function ecommerce_comp_mega_mart_brand() {	
	$brand_hs				= get_theme_mod('brand_hs','1');	
	$brand_contents 			= get_theme_mod('brand_contents',get_brand_default());	
	$brand_section_title		= get_theme_mod('brand_section_title',__('Our Brands','ecommerce-companion'));
	if($brand_hs == '1'):
	?>
<section id="brand-section" class="brand-section st-py-default mb-2 mb-lg-0">
	<div class="container">
		<div class="row">
			<div class="col-8 col-lg-3">
				<div class="section-title"><?php echo esc_html(/*Translators: %s: Section Title */ sprintf(__('%s','ecommerce-companion'),$brand_section_title )); ?></div>
			</div>
			<div class="col-4 col-lg-9 d-flex justify-content-end align-items-center">
				<div class="custom-owl-nav">
					<button type="button" class="custom-prev"><i class='fa fa-chevron-left'></i></button>
					<button type="button" class="custom-next"><i class='fa fa-chevron-right'></i></button>
				</div>
			</div>
			<div class="col-lg-12 col-12">
				<div class="container-wrapper pt-md-5 pt-3">
					<div class="brand-carousel owl-carousel">
						<?php
						if ( ! empty( $brand_contents ) ) {
							$brand_contents = json_decode( $brand_contents );
						foreach ( $brand_contents as $index => $brand_item ) {
							$title = ! empty( $brand_item->title ) ? apply_filters( 'mega_mart_pro_translate_single_string', $brand_item->title, 'Brand section' ) : '';
							$image = ! empty( $brand_item->image_url ) ? apply_filters( 'mega_mart_pro_translate_single_string', $brand_item->image_url, 'Brand section' ) : '';
							$link = ! empty( $brand_item->link ) ? apply_filters( 'mega_mart_pro_translate_single_string', $brand_item->link, 'Brand section' ) : '';
							$newtab = ! empty( $brand_item->newtab ) ? apply_filters( 'mega_mart_pro_translate_single_string', $brand_item->newtab, 'Brand section' ) : '';
							$nofollow = ! empty( $brand_item->nofollow ) ? apply_filters( 'mega_mart_pro_translate_single_string', $brand_item->nofollow, 'Brand section' ) : '';
					
					if(!empty($image)):  
					?>
						<div class="brand-item wow fadeInUp" data-wow-delay="<?php echo esc_attr($index*100); ?>ms" data-wow-duration="1500ms">
							<a href="#<?php echo esc_url($link); ?>" <?php if($newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($newtab =='yes') {echo 'noreferrer noopener';} ?> <?php if($nofollow =='yes') {echo 'nofollow';} ?>"><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_html(/*Translators: %s: Brand Title */ sprintf(__('%s','ecommerce-companion'),$title )); ?>" class="brand"></a>
						</div>
					<?php endif; }} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php	endif; } endif;
	
if ( function_exists( 'ecommerce_comp_mega_mart_brand' ) ) {
$section_priority = apply_filters( 'mega_mart_section_priority', 30, 'ecommerce_comp_mega_mart_brand' );
add_action( 'mega_mart_sections', 'ecommerce_comp_mega_mart_brand', absint( $section_priority ) );
}
?>