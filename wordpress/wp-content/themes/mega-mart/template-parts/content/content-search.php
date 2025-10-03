<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mega Mart 
 */
$thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
?>
<article id="post-<?php get_the_ID(); ?>" <?php post_class('post-items'); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<figure class="post-image">
			<div class="featured-image">
				<a href=<?php echo esc_url( get_permalink()); ?>" class="lehr_effect">
					<img src="<?php echo esc_url($thumbnail_url); ?> " alt="<?php the_title(); ?>">
				</a>
				<div class="post-meta">
					<span class="blog-category">
						<i class="fa fa-folder-open"></i>
						<?php the_category(', '); ?>
					</span>
					<span class="post-tags">
						<i class="fa fa-tags"></i>
						<a href="#"><?php the_tags(''); ?></a>
					</span>
					<span class="author-name">
						<i class="fa fa-user"></i>
						<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html_e('Posted By','mega-mart'); ?> <span><?php esc_html(the_author()); ?> </span></a>
					</span>
				</div>
			</div>								
		</figure>
	<?php } ?>
	
	<div class="post-content">
		<div class="post-left">
			<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>" class="post-author">
				<img src="<?php echo esc_url(get_avatar_url(get_the_author_meta( 'ID' ))); ?>">
			</a>
			<span class="post-date wow fadeInUp" data-wow-delay="150ms" data-wow-duration="1500ms">
				<a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))); ?>">
					<time class="meta-info"><span class="date"><?php echo esc_html(get_the_date('j')); ?></span><span class="month"><?php echo esc_html(get_the_date('M')); ?></span><span class="year"><?php echo esc_html(get_the_date('Y')); ?></span></time>
				</a>
			</span>
			<span class="post-comment wow fadeInDown" data-wow-delay="20ms" data-wow-duration="1500ms">
				<a href=<?php echo get_comments_link(); ?>"><i class="fa fa-comments"></i><span class="count-badge"><?php echo get_comments_number(); ?></span></a>
			</span>
		</div>
		
		<div class="post-right">			
			<?php     
			if ( is_single() ) :
			
			the_title('<h5 class="post-title">', '</h5>' );
			
			else:
			
			the_title( sprintf( '<h5 class="post-title"><a href="%s" class="ellipsis" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
			
			endif; 
			
			echo the_content(
				sprintf(
					'<a class="more-link btn" href="%3$s">%1$s<span class="screen-reader-text"> %2$s</span></a>',
					esc_html__('Read More', 'mega-mart'),
					esc_html(get_the_title()),
					esc_url(get_permalink())
				)
			);

		?> 
		</div>
	</div>
</article>