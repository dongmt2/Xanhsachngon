<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mega Mart 
 */

get_header();
?>
<section id="post-section" class="post-section st-py-default single-page">
	<div class="container">
		<div class="row">
			<div class="<?php esc_attr(mega_mart_blog_column_layout()); ?> col-12" id="st-primary">
				<?php if( have_posts() ): ?>
						<?php while( have_posts() ): the_post(); ?>
							<div class="col-12">
								<?php get_template_part('template-parts/content/content','page'); ?>
							</div>							
							<?php endwhile; ?>
					<?php endif; ?>
					<?php comments_template( '', true ); // show comments  ?>
			</div>
			<?php  get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
