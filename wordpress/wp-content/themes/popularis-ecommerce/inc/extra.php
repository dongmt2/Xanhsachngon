<?php

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function popularis_ecommerce_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}

add_action( 'wp_head', 'popularis_ecommerce_pingback_header' );


if ( !function_exists( 'popularis_ecommerce_main_content_width_columns' ) ) :

	function popularis_ecommerce_main_content_width_columns() {

		$columns = '12';

		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$columns = $columns - 3;
		}

		echo absint( $columns );
	}

endif;

if ( !function_exists( 'popularis_ecommerce_entry_footer' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function popularis_ecommerce_entry_footer( $list_type = '' ) {

		// Get Categories for posts.
		$categories_list = get_the_category_list( ' ' );

		// Get Tags for posts.
		$tags_list = get_the_tag_list( '', ' ' );

		if ( $categories_list || $tags_list ) {

			echo '<div class="cats-tags">';

			if ( 'post' === get_post_type() ) {
				if ( $categories_list || $tags_list ) {

					// Make sure there's more than one category before displaying.
					if ( $categories_list && $list_type == 'cats' ) {
						echo '<div class="cat-links">' . wp_kses_data( $categories_list ) . '</div>';
					}

					if ( $tags_list && $list_type == 'tags' ) {
						echo '<div class="tags-links"><span class="space-right">' . esc_html__( 'Tags', 'popularis-ecommerce' ) . '</span>' . wp_kses_data( $tags_list ) . '</div>';
					}
				}
			}

			echo '</div>';
		}
	}

endif;

if ( !function_exists( 'popularis_ecommerce_comments_author' ) ) :

	function popularis_ecommerce_comments_author() {
		$authordesc = get_the_author_meta( 'description' );
		if ( !empty( $authordesc ) ) {
			?>
			<div class="single-footer row">
				<div class="col-md-4">
					<div class="postauthor-container">			  
						<div class="postauthor-title">
							<h4 class="about">
								<?php esc_html_e( 'About The Author', 'popularis-ecommerce' ); ?>
							</h4>
							<div class="">
								<span class="fn">
									<?php the_author_posts_link(); ?>
								</span>
							</div> 				
						</div>        	
						<div class="postauthor-content">	             						           
							<p>
								<?php the_author_meta( 'description' ) ?>
							</p>					
						</div>	 		
					</div>
				</div>
				<div class="col-md-8">
					<?php comments_template(); ?> 
				</div>
			</div>
		<?php } else { ?>
			<div class="single-footer">
				<?php comments_template(); ?> 
			</div>
			<?php
		}
	}

endif;

if ( !function_exists( 'popularis_ecommerce_generate_construct_footer' ) ) :
	/**
	 * Build footer
	 */
	add_action( 'popularis_ecommerce_generate_footer', 'popularis_ecommerce_generate_construct_footer', 20 );

	function popularis_ecommerce_generate_construct_footer() {
		$my_theme = wp_get_theme();
		?>
		<footer id="colophon" class="footer-credits container-fluid">
			<div class="container">
				<div class="footer-credits-text text-center">
					<?php
					/* translators: %s: WordPress string with wordpress.org URL */
					printf( esc_html__( 'Proudly powered by %s', 'popularis-ecommerce' ), '<a href="' . esc_url( __( 'https://wordpress.org/', 'popularis-ecommerce' ) ) . '">WordPress</a>' );
					?>
					<span class="sep"> | </span>
					<?php
					/* translators: %1$s: Popularis theme name with populariswp.com URL */
					printf( esc_html__( 'Theme: %1$s', 'popularis-ecommerce' ), '<a href="' . esc_url( 'https://populariswp.com/' ) . '">' . esc_html( $my_theme->get( 'Name' ) ) . '</a>' );
					?>
				</div>
			</div>	
		</footer>
		<?php
	}

endif;

if ( !function_exists( 'popularis_ecommerce_footer_widgets' ) ) :
	/**
	 * Build header
	 */
	add_action( 'popularis_ecommerce_generate_footer', 'popularis_ecommerce_footer_widgets', 10 );

	function popularis_ecommerce_footer_widgets() {
		if ( is_active_sidebar( 'popularis-ecommerce-footer-area' ) ) {
			?>  				
			<div id="content-footer-section" class="container-fluid clearfix">
				<div class="container">
					<?php dynamic_sidebar( 'popularis-ecommerce-footer-area' ); ?>
				</div>	
			</div>		
			<?php
		}
	}

endif;

if ( !function_exists( 'popularis_ecommerce_generate_construct_header' ) ) :
	/**
	 * Build header
	 */
	add_action( 'popularis_ecommerce_generate_header', 'popularis_ecommerce_generate_construct_header' );

	function popularis_ecommerce_generate_construct_header() {
		get_template_part( 'template-parts/header/template-part', 'header' );
		?>
		<div id="site-content" class="container main-container" role="main">
			<div class="page-area">
				<?php
	}

endif;

if ( !function_exists( 'popularis_ecommerce_generate_construct_header_builders' ) ) :
	/**
	 * Build header for pagebuilders
	 */
	add_action( 'popularis_ecommerce_generate_header_builders', 'popularis_ecommerce_generate_construct_header_builders' );

	function popularis_ecommerce_generate_construct_header_builders() {
		get_template_part( 'template-parts/header/template-part', 'header' );
		?>
		<div id="site-content" class="page-builders" role="main">
			<div class="page-builders-content-area">
				<?php
			}

endif;

/**
 * Single previous next links
 */
if ( !function_exists( 'popularis_ecommerce_prev_next_links' ) ) :

	function popularis_ecommerce_prev_next_links() {
		the_post_navigation(
		array(
			'prev_text'	 => '<span class="screen-reader-text">' . __( 'Previous Post', 'popularis-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'popularis-ecommerce' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>%title</span>',
			'next_text'	 => '<span class="screen-reader-text">' . __( 'Next Post', 'popularis-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'popularis-ecommerce' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></span>',
		)
		);
	}

endif;

/**
 * Post author meta funciton
 */
if ( !function_exists( 'popularis_ecommerce_author_meta' ) ) :

	function popularis_ecommerce_author_meta() {
		?>
		<span class="author-meta">
			<span class="author-meta-by"><?php esc_html_e( 'By', 'popularis-ecommerce' ); ?></span>
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>">
				<?php the_author(); ?>
			</a>
		</span>
		<?php
	}

endif;
