<?php 
if ( ! function_exists( 'ecommerce_comp_mega_mart_category' ) ) :
function ecommerce_comp_mega_mart_category() {
	$hs_category			= get_theme_mod('hs_category','1');
	if($hs_category == '1'){
?>	
<section id="categories-section" class="categories-section">
	<div class="container">
		<div class="categories-slider owl-carousel px-lg-5 px-0">
			<?php do_action('get_category_section_content');	?>	
		</div>
	</div>
</section>

	
<?php
}} endif;

if ( function_exists( 'ecommerce_comp_mega_mart_category' ) ) {
$section_priority = apply_filters( 'mega_mart_section_priority', 11, 'ecommerce_comp_mega_mart_category' );
add_action( 'mega_mart_sections', 'ecommerce_comp_mega_mart_category', absint( $section_priority ) );
}
?>