<?php 
	if ( ! function_exists( 'ecommerce_comp_mega_mart_ftr_mrq' ) ) :
	function ecommerce_comp_mega_mart_ftr_mrq() {
	$ftr_mrq_content = get_theme_mod('ftr_mrq_content', hdr_mrq_content_default() );
	$ftr_mrq_hs				= get_theme_mod('ftr_mrq_hs','1');	
	if($ftr_mrq_hs == '1'):
?>
	
<div class="marquee-section style1 mrq-loop" direction="right" scrollamount="50">
	<ul>
	<?php if(!empty($ftr_mrq_content)): 
		$ftr_mrq_content = json_decode($ftr_mrq_content);
		foreach ( $ftr_mrq_content as $index => $item ) {
			$text = ! empty( $item->text ) ? apply_filters( 'mega_mart_translate_single_string', $item->text, 'footer Marquee section' ) : ''; 
			$link = ! empty( $item->link ) ? apply_filters( 'mega_mart_translate_single_string', $item->link, 'footer Marquee section' ) : ''; 
			$nofollow = ! empty( $item->nofollow ) ? apply_filters( 'mega_mart_translate_single_string', $item->nofollow, 'footer Marquee section' ) : ''; 
			$newtab = ! empty( $item->newtab ) ? apply_filters( 'mega_mart_translate_single_string', $item->newtab, 'footer Marquee section' ) : ''; 
		?>
		<li class="item wow bounceIn"><a href="<?php echo esc_url($link); ?>" <?php if($newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($newtab =='yes') {echo 'noreferrer noopener';} ?> <?php if($nofollow =='yes') {echo 'nofollow';} ?>"><?php echo esc_html(sprintf(/* Translators: Maruqee Text */__('%s','mega-mart-pro'),$text)) ?></a></li>	
		<?php } endif; ?>
	</ul>
</div>
<?php	endif; } endif;

if ( function_exists( 'ecommerce_comp_mega_mart_ftr_mrq' ) ) {
$section_priority = apply_filters( 'mega_mart_section_priority', 30, 'ecommerce_comp_mega_mart_ftr_mrq' );
add_action( 'mega_mart_sections', 'ecommerce_comp_mega_mart_ftr_mrq', absint( $section_priority ) );
}
?>