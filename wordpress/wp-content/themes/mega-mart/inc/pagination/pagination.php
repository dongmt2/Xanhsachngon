<?php 
class Mega_Mart_pagination {
	function Mega_Mart_page($curpage, $post_type_data) {
	if($post_type_data->max_num_pages > 1) { ?>
	
	<div class="col-12 text-center mb-3 mt-4 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
		<nav class="navigation pagination" aria-label="Posts">
			<h2 class="screen-reader-text">Posts navigation</h2>
				<div class="nav-links">
			<?php
			if($curpage > 1  )	{ ?>
			<a href="<?php echo get_pagenum_link(($curpage-1 > 1 ? $curpage-1 : 1)); ?>" class="prev page-numbers" >
			<?php echo esc_html('Previous','mega-mart'); ?>
			</a>
			<?php } ?>
			
			
			<?php for($i=1;$i<=$post_type_data->max_num_pages;$i++)	{ ?>
				<li class="pagination__item pagination__item--<?php echo $i; ?>">
				<?php if ( $i == $curpage ) { ?>
					<span aria-current="page" class="page-numbers current" style="pointer-events: none;"><?php echo $i; ?></span>
				<?php } else { ?>
					<a  class="page-numbers" href="<?php echo get_pagenum_link($i); ?>" ><?php echo $i; ?></a>
				<?php } ?>
				</li>
			<?php } ?>							
			
			
			<?php if($i-1 != $curpage) { ?>
			<a  href="<?php echo get_pagenum_link(($curpage + 1 <= $post_type_data->max_num_pages ? $curpage + 1 : $post_type_data->max_num_pages)); ?>" class="next page-numbers">
				<?php echo esc_html('Next','mega-mart'); ?>
			</a>
			<?php } ?>
			</div>
		</nav>
	</div>
	
<?php }
	} 
}
 
if( !function_exists('custom_woocommerce_pagination') ) {
	function custom_woocommerce_pagination() {
		global $wp_query;

		$total_pages = $wp_query->max_num_pages;
		$curpage = max(1, get_query_var('paged')); ?>
		
		<div class="col-12 text-center mb-3 mt-4 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
		<nav class="navigation pagination" aria-label="Posts">
			<h2 class="screen-reader-text">Posts navigation</h2>
				<div class="nav-links">
			<?php
			if($curpage > 1  )	{ ?>
			<a href="<?php echo get_pagenum_link(($curpage-1 > 1 ? $curpage-1 : 1)); ?>" class="prev page-numbers" >
			<?php echo esc_html('Previous','mega-mart'); ?>
			</a>
			<?php } ?>
			
			
			<?php for($i=1;$i<=$total_pages;$i++)	{ ?>
				<li class="pagination__item pagination__item--<?php echo $i; ?>">
				<?php if ( $i == $curpage ) { ?>
					<span aria-current="page" class="page-numbers current" style="pointer-events: none;"><?php echo $i; ?></span>
				<?php } else { ?>
					<a  class="page-numbers" href="<?php echo get_pagenum_link($i); ?>" ><?php echo $i; ?></a>
				<?php } ?>
				</li>
			<?php } ?>							
			
			
			<?php if($i-1 != $curpage) { ?>
			<a  href="<?php echo get_pagenum_link(($curpage + 1 <= $total_pages ? $curpage + 1 : $total_pages)); ?>" class="next page-numbers">
				<?php echo esc_html('Next','mega-mart'); ?>
			</a>
			<?php } ?>
			</div>
		</nav>
	</div>	
<?php
}}

if( !function_exists('custom_page_pagination') ) {
	function custom_page_pagination() {
	global $page, $numpages;

	if ( $numpages > 1 ) {
		echo '<nav class="navigation pagination" aria-label="' . esc_attr__( 'Posts', 'mega-mart' ) . '">';
		echo '<h2 class="screen-reader-text">' . esc_html__( 'Page Navigation', 'mega-mart' ) . '</h2>';
		echo '<div class="nav-links">';

		if ( $page > 1 ) {
			$prev_link = _wp_link_page( $page - 1 );
			echo str_replace(
				'<a',
				'<a class="page-numbers prev"',
				$prev_link . esc_html__( 'Previous', 'mega-mart' ) . '</a>'
			);
		}
		for ( $i = 1; $i <= $numpages; $i++ ) {
			$class = 'pagination__item pagination__item--' . $i;

			if ( $i === $page ) {
				echo '<li class="' . esc_attr( $class ) . '">';
				echo '<span aria-current="page" class="page-numbers current" style="pointer-events: none;">' . $i . '</span>';
				echo '</li>';
			} else {
				$link = _wp_link_page( $i ); // Proper internal link for <!--nextpage-->
				echo '<li class="' . esc_attr( $class ) . '">';
				echo $link . '<span class="page-numbers">' . $i . '</span></a>';
				echo '</li>';
			}
		}

		if ( $page < $numpages ) {
			$next_link = _wp_link_page( $page + 1 );
			echo str_replace(
				'<a',
				'<a class="page-numbers next"',
				$next_link . esc_html__( 'Next', 'mega-mart' ) . '</a>'
			);
		}

		echo '</div>';
		echo '</nav>';
	}}
}