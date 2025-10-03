<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mega Mart 
 */

get_header(); 
?>
<section id="post-section" class="post-section st-py-default index-page">
	<div class="container">
		<div class="row">
			<div class="<?php esc_attr(mega_mart_blog_column_layout()); ?> col-12" id="st-primary">
				<div class="row gy-4 ">
				<?php 
						global $paged;
						$j=1;
						$paged = $paged ? $paged : 1;
						$args = array( 'post_type' => 'post','paged'=>$paged );
					
							$blog = new WP_Query( $args ); 
							if( $blog -> have_posts() ): ?>
							<?php $i = 1; while( $blog -> have_posts() ) : $blog -> the_post();  ?>
						 <div class="<?php esc_attr(mega_mart_post_column()); ?> col-12 wow fadeInUp" data-wow-delay="<?php echo ($i*200).'ms'; ?>" data-wow-duration="1500ms">
							<?php get_template_part('template-parts/content/content','page'); ?>
						</div>
						<?php $i++; endwhile; ?>
						
						<!--Pagination -->
						<?php $cpount_blog = wp_count_posts()->publish;
							if($cpount_blog > '1') { 
						?>
						<?php 
							$Mega_Mart_pagination = new Mega_Mart_pagination();
							$Mega_Mart_pagination->Mega_Mart_page($paged, $blog);
							} else { 
							/*No Pagination*/
							} 
						?>
						
					<?php else: ?>
						<div class="<?php esc_attr(mega_mart_post_column()); ?> col-12 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
							<?php get_template_part('template-parts/content/content','none'); ?>
						</div>
						
					<?php endif; ?>
				</div>						
			</div>
			<?php  get_sidebar(); ?>
		</div>						
	</div>
</section>
<?php get_footer(); ?>