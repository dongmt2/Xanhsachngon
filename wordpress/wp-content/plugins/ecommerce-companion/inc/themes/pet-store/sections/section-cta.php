<?php 
	if ( ! function_exists( 'ecommerce_comp_pet_bazaar_cta' ) ) :
	function ecommerce_comp_pet_bazaar_cta() {
	$cta_image 				= get_theme_mod('cta_image', ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/pet-store/assets/images/cta.png');
	$cta_title 				= get_theme_mod('cta_title', __('Get 30% off for the First Time Appointment','ecommerce-companion'));
	$cta_description		= get_theme_mod('cta_description', __('Lorem ipsum dolor, sit amet consectetur adipisicing elit.','ecommerce-companion'));
	$cta_text				= get_theme_mod('cta_text', __('30% <span>OFF</span>','ecommerce-companion'));
	$cta_button_lbl			= get_theme_mod('cta_button_lbl', __('Shop Now','ecommerce-companion'));
	$cta_button_link		= get_theme_mod('cta_button_link','#');
	$hs_cta					= get_theme_mod('hs_cta','1');
	if($hs_cta == '1'){
	
?>	
<section id="cta-section"  class="cta-4">
	<div class="container">
		<div class="bg-cta2">
			<div class="row">
				<div class="col-lg-3 d-none d-lg-block">
				<?php if($cta_image) : ?>
					<div class="cta-img">
						<img src="<?php echo esc_url($cta_image); ?>" alt="<?php esc_attr_e('cta_image','ecommerce-companion'); ?>">
					</div>
				<?php endif; ?>
				</div>
				<div class="col-lg-9 col-12">
					<div class="cta-bg">
						<div class="cta-detail">
							<div class="icon-cta">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" height="200" viewBox="0 0 200 200">
									<path class="cls-1" d="M38.075,28.075H161.931a10,10,0,0,1,10,10V161.931a10,10,0,0,1-10,10H38.075a10,10,0,0,1-10-10V38.075A10,10,0,0,1,38.075,28.075Z"></path>
									<path id="Rectangle_1_copy" data-name="Rectangle 1 copy" class="cls-1" d="M107.074,5.352l87.58,87.58a10,10,0,0,1,0,14.142l-87.58,87.58a10,10,0,0,1-14.142,0l-87.58-87.58a10,10,0,0,1,0-14.142l87.58-87.58A10,10,0,0,1,107.074,5.352Z"></path>
								  </svg>
								  <?php if($cta_text) : ?>
								  <span class="sale-off"><?php echo wp_kses_post($cta_text); ?></span>
								  <?php endif; ?>
							</div>
							<div class="cta-info">
								<?php if($cta_title) : ?><h5><?php esc_html(/* translators: %s: Title */printf(__('%s','ecommerce-companion'),$cta_title)); ?></h5> <?php endif; ?>
								<?php if($cta_description) : ?><p><?php esc_html(/* translators: %s: Description */printf(__('%s','ecommerce-companion'),$cta_description)); ?></p> <?php endif; ?>
							</div>
						</div>
						<?php if(!empty($cta_button_lbl)): ?>
						<div class="button-cta"><a href="<?php esc_url($cta_button_link);?>" class="btn-on active"><?php esc_html(/* translators: %s: Button Label */printf(__('%s','ecommerce-companion'),$cta_button_lbl)); ?><span style="top: 46.3991px; left: 8.26733px;"></span></a></div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php  } } endif; ?>

<?php
if ( function_exists( 'ecommerce_comp_pet_bazaar_cta' ) ) {
	$section_priority = apply_filters( 'pet_bazaar_section_priority', 13 , 'ecommerce_comp_pet_bazaar_cta' );
add_action( 'pet_bazaar_sections', 'ecommerce_comp_pet_bazaar_cta', absint( $section_priority ) );
}
?>