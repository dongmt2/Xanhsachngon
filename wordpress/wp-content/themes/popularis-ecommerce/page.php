<?php get_header(); ?>

<div class="row">
	<div class="news-thumb col-md-12">
		<?php echo get_the_post_thumbnail( $post->ID, 'popularis-ecommerce-img' ); ?>
    </div>
    <article class="article-content col-md-<?php popularis_ecommerce_main_content_width_columns(); ?>">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>                          
				<div <?php post_class(); ?>>
					<header class="single-head">                              
						<?php the_title( '<h1 class="single-title">', '</h1>' ); ?>
						<time class="posted-on published" datetime="<?php the_time( 'Y-m-d' ); ?>"></time>                                                        
					</header>
					<div class="main-content-page">                            
						<div class="single-entry-summary">                              
							<?php
							do_action( 'popularis_ecommerce_before_content' );
							the_content();
							do_action( 'popularis_ecommerce_after_content' );
							?> 
						</div>                               
						<?php
						wp_link_pages();
						comments_template();
						?>
					</div>
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

<?php
get_footer();
