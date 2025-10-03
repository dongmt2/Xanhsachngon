<?php  	
if ( ! function_exists( 'ecommerce_comp_pet_bazaar_funfact' ) ) :
	function ecommerce_comp_pet_bazaar_funfact() {
	$funfact_contents 			= get_theme_mod('funfact_contents',pet_bazaar_get_funfact_default());
	$funfact_hs					= get_theme_mod('funfact_hs','1');
	$funfact_background_image	= get_theme_mod('funfact_background_image', get_template_directory_uri().'/assets/images/funfact4-bg.png');
	if($funfact_hs == '1') {
?>	
<section id="funfact-section" class="funfact4" style="background-image:url('<?php if($funfact_background_image) {echo esc_url($funfact_background_image);} ?>')">
	<div class="container">
		<div class="row row-cols-lg-5 row-cols-sm-2 row-cols-1 row-cols-md-3">
			<?php
				if ( ! empty( $funfact_contents ) ) {
				$funfact_contents = json_decode( $funfact_contents );
				foreach ( $funfact_contents as $funfact_item ) {
					$title = ! empty( $funfact_item->title ) ? apply_filters( 'pet_bazaar_translate_single_string', $funfact_item->title, 'Funfact section' ) : '';
					$text = ! empty( $funfact_item->text ) ? apply_filters( 'pet_bazaar_translate_single_string', $funfact_item->text, 'Funfact section' ) : '';$icon = ! empty( $funfact_item->icon_value) ? apply_filters( 'pet_bazaar_translate_single_string', $funfact_item->icon_value,'Funfact section' ) : '';
			?>
				<div class="col">
					<div class="funfact4-item">
						<div class="funfact4-img">
							<i class="fa <?php echo esc_attr($icon); ?>"></i>
						</div>
						<div class="funfact4-content">
							<?php if(!empty($title)): ?>
								<h5><span class="counter"><?php echo esc_html($title); ?></span><span>+</span></h5>
							<?php endif; ?>	
							
							<?php if(!empty($text)): ?>
								<span><?php esc_html(/*Translators: %s:Text */printf(__('%s.','ecommerce-companion'),$text))?></span>
							<?php endif; ?>	
						</div>
					</div>
				</div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php } ?>

<?php
}
endif;
if ( function_exists( 'ecommerce_comp_pet_bazaar_funfact' ) ) {
$section_priority = apply_filters( 'pet_bazaar_section_priority', 15, 'ecommerce_comp_pet_bazaar_funfact' );
add_action( 'pet_bazaar_sections', 'ecommerce_comp_pet_bazaar_funfact', absint( $section_priority ) );
}
?>