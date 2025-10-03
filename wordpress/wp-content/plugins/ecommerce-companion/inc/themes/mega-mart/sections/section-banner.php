<?php 
if ( ! function_exists( 'ecommerce_comp_mega_mart_banner' ) ) :
	function ecommerce_comp_mega_mart_banner() {	
	$banner_hs				= get_theme_mod('banner_hs','1');
	$banner_img						= get_theme_mod('banner_img', ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/mega-mart/assets/images/cta/product-img.png');
	$banner_bg_img				= get_theme_mod('banner_bg_img', ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/mega-mart/assets/images/cta/background.jpg');
	$banner_price_label			= get_theme_mod('banner_price_label', '20');
	$banner_price_unit			= get_theme_mod('banner_price_unit', '%');
	$banner_price_text			= get_theme_mod('banner_price_text', __('Discount','ecommerce-companion'));
	$banner_text				= get_theme_mod('banner_text', __('Limited Time Offer','ecommerce-companion'));
	$banner_title				= get_theme_mod('banner_title', __('Daily Grocery','ecommerce-companion'));
	$banner_subtitle			= get_theme_mod('banner_subtitle', __('Saturday Night Weekend Deal!','ecommerce-companion'));
	if($banner_hs == '1') {
?>	
<section id="banner" class="discount-banner st-py-default" style="background-image:url('<?php if(!empty($banner_bg_img)) { echo esc_url($banner_bg_img); } ?>');">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-11 my-auto d-flex z-1">
				<div class="discount-banner-badge wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
				<?php if( !empty($banner_price_label) || !empty($banner_price_text) || !empty($banner_price_unit)): ?>
					<span class="discount"><span class="d-inline"><span class="counter"><?php echo esc_html($banner_price_label); ?></span><?php echo esc_html($banner_price_unit); ?></span> <?php esc_html_e(sprintf(/*Translators: Banner price Text */__('%s','ecommerce-companion'),$banner_price_text)); ?></span>
				<?php endif; ?>
					
				<?php if( !empty($banner_text)): ?>
					<span class="offer"><?php esc_html_e(sprintf(/*Translators: Banner Text */__('%s','ecommerce-companion'),$banner_text)); ?></span>
				<?php endif; ?>
				</div>
				<div class="discount-banner-panel">
					<?php if( !empty($banner_title)): ?>
						<h3 class="text-animation ttl"><?php esc_html_e(sprintf(/*Translators: Banner Title */__('%s','ecommerce-companion'),$banner_title)); ?></h3>
					<?php endif; ?>
					
					<?php if( !empty($banner_subtitle)): ?>
						<h3 class="text-primary2 text-animation"><?php esc_html_e(sprintf(/*Translators: Banner Subtitle */__('%s','ecommerce-companion'),$banner_subtitle)); ?></h3>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-3 col-1">
				<?php if( !empty($banner_img)): ?>
					<img src="<?php echo esc_url($banner_img); ?>" alt="<?php esc_html_e(sprintf(/*Translators: Banner Title */__('%s','ecommerce-companion'),$banner_title)); ?>" />
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php } ?>

<?php
}
endif;
if ( function_exists( 'ecommerce_comp_mega_mart_banner' ) ) {
$section_priority = apply_filters( 'mega_mart_section_priority', 16, 'ecommerce_comp_mega_mart_banner' );
add_action( 'mega_mart_sections', 'ecommerce_comp_mega_mart_banner', absint( $section_priority ) );
}
?>