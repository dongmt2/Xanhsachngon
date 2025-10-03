<?php 
	if ( ! function_exists( 'ecommerce_comp_mega_mart_info' ) ) :
	function ecommerce_comp_mega_mart_info() {
	$info_content = get_theme_mod('info_content',mega_mart_get_info_default() );	
	$info_hs				= get_theme_mod('info_hs','1');	
	if($info_hs == '1'):
	?>
	<div id="info-section" class="infoservice-section infoservice-home-one">
		<div class="container" >
			<div class="row gx-0">
			<?php if(!empty($info_content)): 
				$info_content = json_decode($info_content);
				foreach ( $info_content as $item ) {
					$title = ! empty( $item->title ) ? apply_filters( 'mega_mart_translate_single_string', $item->title, 'Info section' ) : ''; 
					$subtitle = ! empty( $item->subtitle ) ? apply_filters( 'mega_mart_translate_single_string', $item->subtitle, 'Info section' ) : ''; 
					$icon = ! empty( $item->icon_value ) ? apply_filters( 'mega_mart_translate_single_string', $item->icon_value, 'Info section' ) : ''; 
				?>
				<div class="col-12 col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
					<div class="infoservice-item">
						<?php if(!empty($icon)) { ?>
							<div class="infoservice-icon">
								<i class="fa <?php esc_attr_e($icon); ?>"></i>
							</div>
						<?php } ?>
						<div class="infoservice-content">
							<?php if(!empty($title)) { ?>
								<h6><?php echo esc_html(sprintf(/* Translators: Info Title */__('%s','ecommerce-companion'),$title)) ?></h6>
							<?php } ?>								
							<?php if(!empty($subtitle)) { ?>
								<p><?php echo esc_html(sprintf(/* Translators: Info Subtitle */__('%s','ecommerce-companion'),$subtitle)) ?></p>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php } endif; ?>
			</div>
		</div>
	</div>
	<?php	endif; } endif;
	
if ( function_exists( 'ecommerce_comp_mega_mart_info' ) ) {
$section_priority = apply_filters( 'mega_mart_section_priority', 14, 'ecommerce_comp_mega_mart_info' );
add_action( 'mega_mart_sections', 'ecommerce_comp_mega_mart_info', absint( $section_priority ) );
}
?>