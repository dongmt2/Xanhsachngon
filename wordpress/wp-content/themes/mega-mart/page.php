<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mega Mart 
 */
$mega_mart_default_pg_sidebar = get_theme_mod('mega_mart_default_pg_sidebar','right_sidebar');
$content_section_id = ($mega_mart_default_pg_sidebar != 'no_sidebar') ? 'id="st-primary"' : '';
get_header();
?>
<section id="post-section" class="post-section st-py-default page">
	<div class="container">
		<div class="row">
			<?php if ( $mega_mart_default_pg_sidebar == 'left_sidebar' ) {
						if ( class_exists( 'WooCommerce' ) ) {
							if( is_account_page() || is_cart() || is_checkout() ) {
								get_sidebar('woocommerce');
							}
							else{ 
								get_sidebar();
							}
						}
						else{ 
							get_sidebar();
						}
					}
						
				
			if ( class_exists( 'woocommerce' ) ){
						
					if( is_account_page() || is_cart() || is_checkout() ) {
						echo '<div '.$content_section_id.' class="col-lg-'.( !is_active_sidebar( "mega-mart-woocommerce-sidebar" ) || (is_active_sidebar( "mega-mart-woocommerce-sidebar" ) && ($mega_mart_default_pg_sidebar == 'no_sidebar')) ?"12" :"8" ).'">'; 
					}
					else{ 
				
						echo '<div '.$content_section_id.' class="col-lg-'.( !is_active_sidebar( "mega-mart-sidebar-primary" ) || (is_active_sidebar( "mega-mart-sidebar-primary" ) && ($mega_mart_default_pg_sidebar == 'no_sidebar')) ?"12" :"8" ).'">'; 
					
					}
				}
				else
				{ 
					echo '<div '.$content_section_id.' class="col-lg-'.( !is_active_sidebar( "mega-mart-sidebar-primary" ) || (is_active_sidebar( "mega-mart-sidebar-primary" ) && ($mega_mart_default_pg_sidebar == 'no_sidebar')) ?"12" :"8" ).' ">';
				} 	 ?>	
				
				<?php		
					if( have_posts()) :  the_post();
					
					the_content();
					custom_page_pagination();
					endif;
					
					if( $post->comment_status == 'open' ) { 
						 comments_template( '', true ); // show comments 
					}
				?>
					
			</div>
			<?php if ( $mega_mart_default_pg_sidebar == 'right_sidebar' ) {
					if ( class_exists( 'WooCommerce' ) ) {
						if( is_account_page() || is_cart() || is_checkout() ) {
							get_sidebar('woocommerce');
						}
						else{ 
							get_sidebar();
						}
					}
					else{ 
						get_sidebar();
					}
				}
			?>
		</div>
	</div>
</section>
<?php get_footer(); ?>