<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Mega Mart 
 */

get_header();
?>
<section id="section404" class="section404 st-py-default">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center mx-lg-auto">
				<div class="card404"> 
					<h1 class="text-primary2 text-animation"><?php echo esc_html__('404','mega-mart'); ?></h1>					
					<h4 class="text-animation"><?php echo esc_html__('Oops! Something Going Wrong','mega-mart'); ?></h4>
					<p><?php echo esc_html__('Oops! The Page you are looking for does not exist.','mega-mart'); ?></p>
					<div class="card404-btn wow fadeInUpBig" data-wow-delay="100ms" data-wow-duration="1500ms">
						<a href="<?php echo esc_url(esc_url( home_url( '/' ))); ?>" class="btn main"><?php echo esc_html__('Back to Home','mega-mart'); ?><span></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
