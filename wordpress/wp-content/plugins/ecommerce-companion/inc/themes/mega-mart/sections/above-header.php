<?php
	if( !function_exists('mega_mart_above_header')):
	function mega_mart_above_header(){
	$theme = wp_get_theme();	
	$order_link_hs 			= get_theme_mod('order_link_hs','1');
	$abv_hdr_slide_custom 	= get_theme_mod('abv_hdr_first_slide_custom','Welcome To Our Mart, Save 20%-50% Sitewide!!, Save Upto 35% Off Today');
	$daytext_hs 			= get_theme_mod('daytext_hs','1');
	$daytext 				= get_theme_mod('daytext','Deal of the day!');
	$above_header_first_hs	= get_theme_mod('above_header_first_hs', '1');
	$hs_hdr_anim 			= get_theme_mod('hs_hdr_anim','1');
	
?>
<!--===// Start: Header Above
   =================================-->
	<div id="above-header" class="header-above-info d-lg-block d-none">
		<div class="header-widget header-dark">
			<div class="container">
				<div class="d-flex align-items-center justify-content-between">
					<div class="widget-left text-lg-left text-center">
						<?php 
							if( $theme->name == 'Daily Mart' ) { 
								 if( $hs_hdr_anim == '1' ): header_slides($abv_hdr_slide_custom); endif;
								} else {
								if($above_header_first_hs == '1'): hdr_widget___content(); endif;
							} 
						?>								
					</div>
					<div class="widget-right justify-content-lg-end text-right text-center">
					<?php if( $daytext_hs == '1' ) : ?>
						<div class="widget daytextwidget">
							<div class="daytext-content">
								<i class="fa fa-tag"></i> <?php echo esc_html(sprintf(/* Translators: Info Day Deal Text */__('%s','ecommerce-companion'),$daytext)); ?>
							</div>
						</div>
					<?php endif; ?>	
						<?php 
						if( $theme->name != 'Daily Mart' ) {
							if( $hs_hdr_anim == '1' ): header___slides($abv_hdr_slide_custom); endif;
						} 
					?>
						<?php if($order_link_hs == '1') : ?> 
						<aside class="widget widget_nav_menu">
							<a href="<?php echo esc_url( get_permalink( get_page_by_path( 'order-tracking' ) ) ); ?>">
								<span class="order-traKing"><?php echo esc_html__('Order Tracking','ecommerce-companion'); ?></span>
							</a>
						</aside>	
						<?php endif; ?>
						<?php 	
							$mega_mart_above_widget_first = 'mega-mart-header-above-first';
								if ( is_active_sidebar($mega_mart_above_widget_first) ){ 
									dynamic_sidebar( 'mega-mart-header-above-first' );
							}elseif ( current_user_can( 'edit_theme_options' ) ) {
								$mega_mart_sidebar_name = mega_mart_lite_get_sidebar_name_by_id( $mega_mart_above_widget_first );
								?>
								<div class="widget widget_none">
									<h4 class='widget-title'><?php echo esc_html( $mega_mart_sidebar_name ); ?></h4>
									<p>
										<?php if ( is_customize_preview() ) { ?>
											<a href="JavaScript:Void(0);" class="" data-sidebar-id="<?php echo esc_attr( $mega_mart_above_widget_first ); ?>">
										<?php } else { ?>
											<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
										<?php } ?>
											<?php esc_html_e( 'Please assign a widget here.', 'ecommerce-companion' ); ?>
										</a>
									</p>
								</div>
								<?php
							}  
							?>								
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--===// End: Header Above
   =================================-->
   <?php
    }
endif;
	
add_action('mega_mart_above_header','mega_mart_above_header' );


if(! function_exists('hdr_widget___content')) {
	function hdr_widget___content() {
	$theme = wp_get_theme();
		$above_header_first_content	= get_theme_mod('above_header_first_content', mega_mart_above_header_first_content_default());			
	?>			
	<aside id="info_widget-2" class="widget grocery_info_widget">
		<h5 class="widget-title"><span></span></h5>		
		<ul>
		<?php if(!empty($above_header_first_content)): 
			$above_header_first_content = json_decode( $above_header_first_content );
			foreach ( $above_header_first_content as $item ) {
				$text = ! empty( $item->text ) ? apply_filters( 'mega_mart_translate_single_string', $item->text, 'header above section' ) : ''; 
				$text2 = ! empty( $item->text2 ) ? apply_filters( 'mega_mart_translate_single_string', $item->text2, 'header above section' ) : ''; 
				$icon = ! empty( $item->icon_value ) ? apply_filters( 'mega_mart_translate_single_string', $item->icon_value, 'header above section' ) : ''; 
?>
			<li>
				<a class="infoicon-fa-gift tool-bounce tool-bottom-left" href="javascript:void(0)"><i class="fa <?php echo esc_attr($icon); ?>"></i> <?php if($theme ->name != 'Daily Mart') { ?><div><?php if(!empty($text)): echo esc_html(sprintf(/* Translators: Info First Text */__('%s','ecommerce-companion'),$text)).'<br>'; endif; ?><span class="info_description_name"><?php echo esc_html(sprintf(/* Translators: Info First Text */__('%s','ecommerce-companion'),$text2)) ?></span></div> <?php } ?></a>
			</li>
			<?php } endif; ?>
		</ul>
	</aside>
	<?php } }

if ( ! function_exists( 'header___slides' ) ) {
	function header___slides($txt) {	
	$headerslide_text_explode	=	explode(',', $txt);
	array_walk($headerslide_text_explode, 'trim_value'); //Remove WhiteSpace form both side of separator
	$header_slides ='';
	?>
	
	<aside class="widget newstextwidget">
		<div class="newsflash owl-carousel">
										
	<?php
	foreach($headerslide_text_explode as $text){ 
		echo $header_slides.'<div class="textslide-item">'. esc_html(sprintf(/* Translators: Slider Text */__('%s','ecommerce-companion'),$text)).' <a href="javascript:void(0)" class="icon-holder"><i class="fa fa-tag"></i></a></div>';
	}
	?>
		</div>
	</aside>
<?php } }