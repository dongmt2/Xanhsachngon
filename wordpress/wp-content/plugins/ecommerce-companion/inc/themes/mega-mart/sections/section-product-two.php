<?php 
if ( ! function_exists( 'ecommerce_comp_mega_mart_product_two' ) ) :
function ecommerce_comp_mega_mart_product_two() {
$product_two_hs			= get_theme_mod('product_two_hs', '1');
$product_two_title			= get_theme_mod('product_two_title',__('Hot Deal :','ecommerce-companion'));	
$product_two_heading_text	= get_theme_mod('product_two_heading_text',__('Don\'t Miss Out! Grab the Best Deals Before They\'re Gone!','ecommerce-companion'));	
$product_two_button_title	= get_theme_mod('product_two_button_title',__('Wrap Coupon ?','ecommerce-companion'));
$product_two_button_link	= get_theme_mod('product_two_button_link','');
$product_two_newtab			= get_theme_mod('product_two_newtab','yes');
$product_two_nofollow		= get_theme_mod('product_two_nofollow','yes');
$product_two_section_title	= get_theme_mod('product_two_section_title',__('Snacks & Beverages','ecommerce-companion'));

$product_two_banner_one_title	= get_theme_mod('product_two_banner_one_title',__('Organic Vegetables ','ecommerce-companion'));	
$product_two_banner_one_text	= get_theme_mod('product_two_banner_one_text',__('Best Foods For Your Family','ecommerce-companion'));$product_two_banner_one_img	= get_theme_mod('product_two_banner_one_img', ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/mega-mart/assets/images/product/two/banner1.png');

$product_two_banner_two_title	= get_theme_mod('product_two_banner_two_title',__('Fresh Ripe Strawberries','ecommerce-companion'));	
$product_two_banner_two_text	= get_theme_mod('product_two_banner_two_text',__('Tasty & Good For Health','ecommerce-companion'));	
$product_two_banner_two_img	= get_theme_mod('product_two_banner_two_img', ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/mega-mart/assets/images/product/two/banner2.png');
$product_two_hs_tab			= get_theme_mod('product_two_hs_tab','1'); 
$product_two_cat			= get_theme_mod('product_two_cat');

$product_two_date			= get_theme_mod('product_two_date','2026-01-01');	
$product_two_time			= get_theme_mod('product_two_time','04:36');
if( $product_two_hs == '1' ):
?>
<?php 
	if ( class_exists( 'woocommerce' ) ) {
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => -1,
	);
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => $product_two_cat,
		),
	);
?>
<section id="product-two-section" class="product-section st-py-default mt-lg-0 mt-sm-3 mt-2 product-two-home">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-12 mb-sm-4 mb-2 wow fadeInUp">
				<div class="heading-default">
					<?php if( !empty($product_two_title)): ?>
					<div class="title">
						<h5><?php esc_html_e(sprintf(/*Translators: Heading Title */__('%s','ecommerce-companion'),$product_two_title)); ?></h5>
					</div>
					<?php endif; ?>
					<?php if( !empty($product_two_heading_text)): ?>
					<div class="heading-text">
						<p><?php esc_html_e(sprintf(/*Translators: Heading Text */__('%s','ecommerce-companion'),$product_two_heading_text)); ?></p>
					</div>
					<?php endif; ?>
					<div class="heading-right">
						<div data-timer="<?php echo esc_attr($product_two_date.' '.$product_two_time); ?>" id="dealsofdayCountDown" class="dealsofday-timer timer-container">
							<div class="dealsofday-item">
								<div class="dealsofday-count">
									<h6 class="days">05</h6>
								</div>
								<p><?php esc_html_e('DAY','ecommerce-companion'); ?></p>
							</div>
							<div class="dealsofday-item">
								<div class="dealsofday-count">
									<h6 class="hours">15</h6>
								</div>
								<p><?php esc_html_e('HRS','ecommerce-companion'); ?></p>
							</div>
							<div class="dealsofday-item">
								<div class="dealsofday-count">
									<h6 class="minutes">55</h6>
								</div>
								<p><?php esc_html_e('MIN','ecommerce-companion'); ?></p>
							</div>
							<div class="dealsofday-item">
								<div class="dealsofday-count">
									<h6 class="seconds">20</h6>
								</div>
								<p><?php esc_html_e('SEC','ecommerce-companion'); ?></p>
							</div>
						</div>	
					<?php if( !empty($product_two_button_title)): ?>						
						<a href="<?php echo esc_url($product_two_button_link); ?>" class="btn" <?php if($product_two_newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($product_two_newtab =='yes') {echo 'noreferrer noopener';} ?> <?php if($product_two_nofollow =='yes') {echo 'nofollow';} ?>"><i class="fa fa-gift"></i> <?php esc_html_e(sprintf(/*Translators: Button Title */__('%s','ecommerce-companion'),$product_two_button_title)); ?></a>
					<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-12">
				<div class="row">
					<div class="col-8 col-lg-3 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
					<?php if( !empty($product_two_section_title)): ?>
						<div class="section-title"><?php esc_html_e(sprintf(/*Translators: Section Title */__('%s','ecommerce-companion'),$product_two_section_title)); ?></div>
					<?php endif; ?>
					</div>
					<?php if($product_two_hs_tab=='1' && !empty($product_two_cat)): 
					$count = count($product_two_cat);
					if ( $count > 0 ){
					?>
					<div class="col-4 col-lg-9 d-flex justify-content-end align-items-center wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
						<div class="product-filter-wraper">
							<div id="feature" class="tab-filter">								
								<?php foreach ( $product_two_cat as $i=> $product_category ) { 
								$product_cat_name = get_term_by( 'slug', $product_category, 'product_cat' );
								?>
							<?php if($i == '0'){  ?>
								<a href="javascript:void(0);" data-filter="<?php echo 'product_cat-'.esc_attr($product_category); ?>" class="active" rel="nofollow noopner noreferrer"><?php  echo esc_html__($product_cat_name->name); ?></a>
							
							<?php }else{ ?>		
								<a href="javascript:void(0);" data-filter="<?php echo 'product_cat-'.esc_attr($product_category); ?>" rel="nofollow noopner noreferrer"><?php  echo esc_html__($product_cat_name->name); ?></a>
								<?php }} ?>
							</div>
						</div>
						<div class="custom-owl-nav">
							<button type="button" class="custom-prev"><i class='fa fa-chevron-left'></i></button>
							<button type="button" class="custom-next"><i class='fa fa-chevron-right'></i></button>
						</div>
					</div>
					<?php } endif; ?>
				</div>
				<div class="row banner-section gx-0">
					<div class="col-6">
						<aside class="banner-item bg-1 wow fadeInUp lehr_effect" data-wow-delay="0ms" data-wow-duration="1500ms">
						<?php if( !empty($product_two_banner_one_title) || !empty($product_two_banner_one_text) ): ?>
							<div class="banner-content">
								<h4><?php esc_html_e(sprintf(/*Translators: Banner Title */__('%s','ecommerce-companion'),$product_two_banner_one_title)); ?></h4>
								<h6><?php esc_html_e(sprintf(/*Translators: Banner Text */__('%s','ecommerce-companion'),$product_two_banner_one_text)); ?></h6>
							</div>
						<?php endif; ?>
						<?php if( !empty($product_two_banner_one_img)): ?>
							<div class="banner-img">
								<img src="<?php echo esc_url($product_two_banner_one_img); ?>" alt="<?php esc_html_e(sprintf(/*Translators: Banner Title */__('%s','ecommerce-companion'),$product_two_banner_one_title)); ?>">
							</div>               
						<?php endif; ?>
						</aside>
					</div>
					<div class="col-6">
						<aside class="banner-item bg-4 wow fadeInUp lehr_effect" data-wow-delay="200ms" data-wow-duration="1500ms">
							<?php if( !empty($product_two_banner_two_title) || !empty($product_two_banner_two_text) ): ?>
							<div class="banner-content">
								<h4><?php esc_html_e(sprintf(/*Translators: Banner Title */__('%s','ecommerce-companion'),$product_two_banner_two_title)); ?></h4>
								<h6><?php esc_html_e(sprintf(/*Translators: Banner Text */__('%s','ecommerce-companion'),$product_two_banner_two_text)); ?></h6>
							</div>
						<?php endif; ?>
						<?php if( !empty($product_two_banner_two_img)): ?>
							<div class="banner-img">
								<img src="<?php echo esc_url($product_two_banner_two_img); ?>" alt="<?php esc_html_e(sprintf(/*Translators: Banner Title */__('%s','ecommerce-companion'),$product_two_banner_two_title)); ?>">
							</div>               
						<?php endif; ?>               
						</aside>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-12 wow fadeInUp">
				<ul id="product-filter-init" class="products columns-3 grid product-filter-init products-slider owl-carousel owl-theme">
				<?php
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
					<?php
					$terms = get_the_terms( $loop->ID, 'product_cat' );
										
					if ( $terms && ! is_wp_error( $terms ) ) : 
						$links = array();

						foreach ( $terms as $term ) 
						{
							$links[] = $term->slug;
						}
						
						$tax = join( '","', $links );		
					else :	
						$tax = '';	
					endif;
				?>
					<?php get_template_part('woocommerce/content','product'); ?>
					<?php endwhile; ?>
					<?php  wp_reset_postdata(); ?>
				</ul>
			</div>
		</div>
	</div>
</section>
<?php } endif; } endif; ?>
<?php
if ( function_exists( 'ecommerce_comp_mega_mart_product_two' ) ) {
$section_priority = apply_filters( 'mega_mart_section_priority', 17, 'ecommerce_comp_mega_mart_product_two' );
add_action( 'mega_mart_sections', 'ecommerce_comp_mega_mart_product_two', absint( $section_priority ) );
}
?>