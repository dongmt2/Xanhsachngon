<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shoper
 */
?>
<article data-aos="fade-up" id="post-<?php the_ID(); ?>" <?php post_class( array( 'shoper-single-post' ) ); ?>>
	<?php
	/**
	 * Hook - shoper_posts_blog_media.
	 *
	 * @hooked shoper_posts_formats_thumbnail - 10
	 */
	do_action( 'shoper_posts_blog_media' );
	?>

	<div class="post">
		<?php
		/**
		 * Hook - diet_shop_site_content_type.
		 *
		 * @hooked site_loop_heading - 10
		 * @hooked render_meta_list - 20
		 * @hooked site_content_type - 30
		 */
		$meta = array();

		if ( !is_singular() && empty(shoper_get_option( 'blog_meta_hide' )) ) {
			// Show all meta fields on the blog archive unless hidden.
			$meta = array( 'author', 'date', 'category', 'comments' );
		}

		// Allow child themes and plugins to filter the meta array.
		$meta = apply_filters( 'shoper_blog_meta', $meta );

		do_action( 'shoper_site_content_type', $meta );
		?>
	</div>

</article>