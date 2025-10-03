<?php  
if ( ! function_exists( 'ecommerce_comp_pet_bazaar_feature_product' ) ) :
	function ecommerce_comp_pet_bazaar_feature_product() {
	$feature_product_hs				= get_theme_mod('feature_product_hs','1'); 
	$feature_product_ttl 			= get_theme_mod('feature_product_ttl',__('Feature Product','ecommerce-companion'));
	$feature_product_subttl 		= get_theme_mod('feature_product_subttl',__('There are many variations of passages of Lorem Ipsum available','ecommerce-companion'));
	$feature_product_hs_tab			= get_theme_mod('feature_product_hs_tab','1'); 
	$feature_product_cat			= get_theme_mod('feature_product_cat');
	$feature_product_num			= get_theme_mod('feature_product_num','20');
	if($feature_product_hs == '1') {
?>	
<?php 
	if ( class_exists( 'woocommerce' ) ) {
	$args                   = array(
		'post_type' => 'product',
		'posts_per_page' => $feature_product_num,
	);
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => $feature_product_cat,
		),
	);
?>
<section id="feature-product-section" class="featured-product feature_section">
	<div class="container">
		<div class="parent">
			<div class="row">
				<div class="col-lg-4">
					<div class="section-title">
						<h2 class="main-title mb-2"><?php echo wp_kses_post($feature_product_ttl); ?></h2>
						<p class="main-description mt-2"><?php echo wp_kses_post($feature_product_subttl); ?></p>
					</div>
				</div>
				<?php if($feature_product_hs_tab=='1' && !empty($feature_product_cat)): 
					$count = count($feature_product_cat);
					if ( $count > 0 ){
					?>
				<div class="col-lg-8">
					<div class="product-filter-wraper">
						<div id="feature" class="product-tab-filter">
							<?php foreach ( $feature_product_cat as $i=> $product_category ) { 
								$product_cat_name = get_term_by( 'slug', $product_category, 'product_cat' );
								?>
							<?php if($i == '0'){  ?>
								<a href="javascript:void(0)" product-filter=".<?php echo 'product_cat-'.esc_attr($product_category); ?>" class="active"><?php  echo esc_html__($product_cat_name->name); ?></a>
							
							<?php }else{ ?>		
								<a href="javascript:void(0)" product-filter=".<?php echo 'product_cat-'.esc_attr($product_category); ?>"><?php  echo esc_html__($product_cat_name->name); ?></a>
							<?php }} ?>
						</div>
					</div>
				</div>
				<?php } endif; ?>
            </div>

			<ul id="product-filter-init" class="products columns-4 grid row product-filter-init"">
				<?php
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
					<?php
					$terms = get_the_terms( $loop->ID, 'product_cat' );
										
					if ( $terms && ! is_wp_error( $terms ) && !empty($terms) ) : 
						$links = array();

						foreach ( $terms as $term ) 
						{
							$links[] = $term->slug;
						}
						
						$tax = join( '","', $links );	
					endif;
				?>
				<li <?php  wc_product_class( 'col-lg-3 col-md-6 product-filter-item', $product ); ?>>
				<?php get_template_part('woocommerce/content','product'); ?>
				</li>
				<?php endwhile; ?>
				<?php  wp_reset_postdata(); ?>
				
			</ul>
		</div>
	</div>
</section>
<?php }} ?>

<?php
}
endif;

if ( function_exists( 'ecommerce_comp_pet_bazaar_feature_product' ) ) {
$section_priority = apply_filters( 'pet_bazaar_section_priority', 13, 'ecommerce_comp_pet_bazaar_feature_product' );
add_action( 'pet_bazaar_sections', 'ecommerce_comp_pet_bazaar_feature_product', absint( $section_priority ) );
}
?>