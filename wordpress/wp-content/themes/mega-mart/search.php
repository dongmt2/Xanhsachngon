<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Mega Mart 
 */

get_header();
?>
<section id="post-section" class="post-section st-py-default search-page">
	<div class="container">
		<div class="row">
			<div class="<?php esc_attr(mega_mart_blog_column_layout()); ?> col-12" id="st-primary">
				<div class="row">
					<?php if( have_posts() ): ?>
			
						<?php while( have_posts() ) : the_post(); ?>
						
						<div class="col-lg-4 col-md-6 col-12 mb-4">
							<?php get_template_part('template-parts/content/content','search'); ?>
						</div>
					<?php endwhile; the_posts_navigation(); ?>
							
					<?php else: ?>						
						<?php get_template_part('template-parts/content/content','none'); ?>
					<?php endif; ?>
				</div>
			</div>
			<?php  get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
