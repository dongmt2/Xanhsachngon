<?php
/**
 * Side Bar Template
 */
?>
<?php if ( ! is_active_sidebar( 'mega-mart-woocommerce-sidebar' ) ) {	return; } ?>
<div class="col-lg-3 mb-lg-0 mb-4" id="st-secondary">
	<div class="sidebar">
		<?php dynamic_sidebar('mega-mart-woocommerce-sidebar'); ?>
	</div>
</div>