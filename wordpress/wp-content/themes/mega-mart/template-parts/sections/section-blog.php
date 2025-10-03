<?php  
if ( ! function_exists( 'mega_mart_front_blog' ) ) :
	function mega_mart_front_blog() {
    $blog_setting_hs 					= get_theme_mod('blog_setting_hs','1');
	$blog_ttl 							= get_theme_mod('blog_ttl');
	$blog_subttl 						= get_theme_mod('blog_subttl');
	$mega_mart_blog_num					= get_theme_mod('blog_num','3');
	if($blog_setting_hs=='1'):
?>
<section id="post-section" class="post-section st-py-default pb-5 home-blog">
	<div class="container">
		<div class="row">
			<div class="col-8 col-lg-3 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
			<?php if( !empty($blog_ttl)): ?>
				<div class="section-title">
					<?php echo esc_html(sprintf(/*Translators: Section Title */__('%s','mega-mart'),$blog_ttl)); ?>
				</div>
			<?php endif; ?>
			</div>
			<div class="col-4 col-lg-9 d-flex justify-content-end align-items-center">
				<div class="custom-owl-nav">
					<button type="button" class="custom-prev"><i class='fa fa-chevron-left'></i></button>
					<button type="button" class="custom-next"><i class='fa fa-chevron-right'></i></button>
				</div>
			</div>
		
		
			<div class="col-lg-12 col-12">
				<div class="container-wrapper">
					<div class="post-slider owl-carousel">			
				<?php 
					$mega_mart_blog_args = array( 'post_type' => 'post', 'posts_per_page' => $mega_mart_blog_num,'post__not_in'=>get_option("sticky_posts")) ; 	
				
					$mega_mart_wp_query = new WP_Query($mega_mart_blog_args);
					if($mega_mart_wp_query)
					{	
					while($mega_mart_wp_query->have_posts()):$mega_mart_wp_query->the_post();
				
				?>
					
				<?php get_template_part('template-parts/content/content','page'); ?>
					
				<?php endwhile; } wp_reset_postdata(); ?>
					</div>	
				</div>	
			</div>	
			</div>
	</div>
</section>	
<?php
endif; }
endif;
if ( function_exists( 'mega_mart_front_blog' ) ) {
$section_priority = apply_filters( 'mega_mart_section_priority', 30, 'mega_mart_front_blog' );
add_action( 'mega_mart_sections', 'mega_mart_front_blog', absint( $section_priority ) );
}