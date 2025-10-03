<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Mega Mart 
 */

get_header();
?>
<div id="product" class="post-section st-py-default">
        <div class="container">
            <div class="row">			
			 <?php if(!is_active_sidebar('mega-mart-woocommerce-sidebar')): ?>
				<div class="col-12">
			<?php else: ?>
				<div class="col-lg-9" id="st-primary">
			<?php endif; ?>
				<?php woocommerce_content(); ?>
			</div>
			<?php get_sidebar('woocommerce'); ?>
		</div>	
	</div>
</div>
<?php get_footer(); ?>