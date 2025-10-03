<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mega Mart 
 */
?>

<article id="post-<?php get_the_ID(); ?>" <?php post_class('none-page'); ?>>
	<div class="blog-wrapup">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p class=""><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'mega-mart' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		<?php elseif ( is_search() ) : ?>
			<p class=""><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mega-mart' ); ?></p>
		<?php else : ?>
			<p class=""><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mega-mart' ); ?></p>
		<?php endif; ?>
	</div>
</article>
