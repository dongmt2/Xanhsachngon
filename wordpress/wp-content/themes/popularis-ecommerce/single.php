<?php get_header(); ?>

<!-- start content container -->
<div class="row">
	<div class="news-thumb col-md-12">
		<?php echo get_the_post_thumbnail( $post->ID, 'popularis-ecommerce-img' ); ?>
    </div>
    <article class="article-content col-md-<?php popularis_ecommerce_main_content_width_columns(); ?>">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>                         
				<div <?php post_class(); ?>>
					<div class="single-head">
						<?php
						popularis_ecommerce_entry_footer( 'cats' );
						the_title( '<h1 class="single-title">', '</h1>' );
						?>
						<span class="posted-date">
							<?php echo esc_html( get_the_date() ); ?>
						</span>
						<?php popularis_ecommerce_author_meta(); ?>
					</div>
					<div class="single-content">
						<div class="single-entry-summary">
							<?php
							do_action( 'popularis_ecommerce_before_content' );
							the_content();
							do_action( 'popularis_ecommerce_after_content' );
							?> 
						</div>
						<?php
						wp_link_pages();
						popularis_ecommerce_entry_footer( 'tags' );
						?>
					</div>
					<?php
					popularis_ecommerce_prev_next_links();
					popularis_ecommerce_comments_author();
					?>
				</div>        
				<?php
			endwhile;
		else :
			get_template_part( 'content', 'none' );
		endif;
		?>    
    </article> 
	<?php get_sidebar( 'sidebar-1' ); ?>
</div>
<!-- end content container -->

<?php get_footer(); ?>
