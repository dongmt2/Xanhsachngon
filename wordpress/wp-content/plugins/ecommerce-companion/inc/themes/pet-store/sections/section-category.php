<?php 
if ( ! function_exists( 'ecommerce_comp_pet_bazaar_category' ) ) :
function ecommerce_comp_pet_bazaar_category() {
	$category_cat			= get_theme_mod('category_cat');
	$category_num			= get_theme_mod('category_num','20');
	$hs_category			= get_theme_mod('hs_category','1');
	if($hs_category == '1'){
?>		
<?php 
	if ( class_exists( 'woocommerce' ) ) {
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => $category_num,
	);
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => $category_cat,
		),
	);
	
	if ( !empty($category_cat) && ! is_wp_error( $category_cat ) ) : 
?>

<section id="product-category-section" class="category4-section category_four">
	<div class="container">
		<div class="owl-carousel" id="category4">
			<?php 
				foreach ($category_cat as $i => $product_cat) {
					$category_name = get_term_by( 'slug', $product_cat, 'product_cat' );   
					$category_link = get_term_link($category_name);
					$product_count = $category_name->count;
					$thumbnail_url = get_term_meta($category_name->term_id, 'pet_bazaar_product_cat_icon', true);  ?>
					
					<div class="categories-inner">
						<div class="categories-item">
							<div class="categories-img">
								<span class="count-categorie"><?php esc_html_e($product_count); ?></span>
								<i class="fas <?php echo esc_attr($thumbnail_url); ?>"></i>
								<div class="categ-main-overlay"></div>                            
							</div>
							<div class="categories-content">
								<h4><a href="<?php echo esc_url($category_link); ?>"><?php esc_html_e($category_name->name); ?></a></h4>
							</div>
						</div>
					</div>
			<?php }	 ?>				
		</div>
	</div>
</section>
<?php endif;
	} } } endif; ?>

<?php
if ( function_exists( 'ecommerce_comp_pet_bazaar_category' ) ) {
	$section_priority = apply_filters( 'pet_bazaar_section_priority', 11 , 'ecommerce_comp_pet_bazaar_category' );
add_action( 'pet_bazaar_sections', 'ecommerce_comp_pet_bazaar_category', absint( $section_priority ) );
}
?>