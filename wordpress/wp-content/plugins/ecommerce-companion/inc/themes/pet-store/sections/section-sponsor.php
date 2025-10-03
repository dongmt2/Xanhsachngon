<?php  
	if ( ! function_exists( 'ecommerce_comp_pet_bazaar_sponsor' ) ) :
	function ecommerce_comp_pet_bazaar_sponsor() {
	$sponsor_contents 		= get_theme_mod('sponsor4_contents',pet_bazaar_get_sponsor_default());	
	$hs_sponsor				= get_theme_mod('hs_sponsor','1');
	if($hs_sponsor == '1'){
?>	
<section id="sponsor-section" class="sponsor-section has-background">
	<div class="container-fluid p-0">
		<div class="owl-carousel" id="sponsor-section3">
			<?php
				if ( ! empty( $sponsor_contents ) ) {
				$sponsor_contents = json_decode( $sponsor_contents );
				foreach ( $sponsor_contents as $sponsor_item ) {
					$image = ! empty( $sponsor_item->image_url) ? apply_filters( 'pet_bazaar_translate_single_string', $sponsor_item->image_url,'Sponsor section' ) : '';
				if($image):	
			?>
				<div class="sponsor">
					<img src="<?php echo esc_url($image); ?>" alt="" class="zoom w-auto">
				</div>
			<?php endif; } } ?>
		</div>
	</div>
</section>
<?php  } } endif; ?>

<?php
if ( function_exists( 'ecommerce_comp_pet_bazaar_sponsor' ) ) {
	$section_priority = apply_filters( 'pet_bazaar_section_priority', 13 , 'ecommerce_comp_pet_bazaar_sponsor' );
add_action( 'pet_bazaar_sections', 'ecommerce_comp_pet_bazaar_sponsor', absint( $section_priority ) );
}
?>