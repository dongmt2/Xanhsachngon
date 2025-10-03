</div> <!-- class="mega-mart-contents" Ends -->

<?php	
    $hs_above_footer					= get_theme_mod( 'hs_above_footer','1');
    $footer_contact_call_icon			= get_theme_mod( 'footer_contact_call_icon','fa-phone');
    $footer_contact_call_title			= get_theme_mod( 'footer_contact_call_title');
    $footer_contact_call_link			= get_theme_mod( 'footer_contact_call_link');
    $footer_contact_call_newtab			= get_theme_mod( 'footer_contact_call_newtab', 'yes');
    $footer_contact_call_nofollow		= get_theme_mod( 'footer_contact_call_nofollow', 'yes');
	
	$store_desc							= get_theme_mod('store_desc');
	$store_open_time					= get_theme_mod('store_open_time');
	$store_close_time					= get_theme_mod('store_close_time');
			
    $footer_contact_hour_icon			= get_theme_mod( 'footer_contact_hour_icon','fa-clock');
    $footer_contact_hour_title			= get_theme_mod( 'footer_contact_hour_title');
    $footer_contact_hour_link			= get_theme_mod( 'footer_contact_hour_link');
    $footer_contact_hour_newtab			= get_theme_mod( 'footer_contact_hour_newtab', 'yes');
    $footer_contact_hour_nofollow		= get_theme_mod( 'footer_contact_hour_nofollow', 'yes');
	?>
<footer id="footer-section" class="footer-section footer-one">
	<?php if($hs_above_footer == '1' ): ?>
	<div class="footer-contact">
		<div class="container">
			<div class="footer-wrapper">
				<div class="position-relative d-flex justify-content-between align-items-center">
					<aside class="widget widget-contact wow fadeInRight">
						<h4 class="widget-title"></h4>
						<div class="d-flex contact-area">
							<div class="flex-shrink-0 contact-icon"><i class="fa <?php echo esc_attr($footer_contact_call_icon); ?>"></i></div>
							<div class="flex-grow-1 contact-info">
								<p class="text">
								<?php if(!empty($footer_contact_call_title)): ?>
									<span><?php echo esc_html(/*Translators: %s: Call Title*/ sprintf(__('%s','mega-mart'),$footer_contact_call_title )); ?></span>
								<?php endif; ?>
								
								<?php if(!empty($footer_contact_call_link)): ?>
									<a href="tel:<?php echo esc_attr(/*Translators: %s: Call Number*/ sprintf(__('%s','mega-mart'),$footer_contact_call_link )); ?>" <?php if($footer_contact_call_newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($footer_contact_call_newtab =='yes') {echo 'noreferrer noopener';} ?> <?php if($footer_contact_call_nofollow =='yes') {echo 'nofollow';} ?>" class="contact-info"><?php echo esc_html(/*Translators: %s: Call Number*/ sprintf(__('%s','mega-mart'),$footer_contact_call_link )); ?></a>
								<?php endif; ?>
								</p>
							</div>
						</div>
					</aside>
					<div class="circle-badge store-badge zig-zag">
						<div>
						<?php if(!empty($store_desc)): ?>
							<h2><?php echo esc_html(/*Translators: %s: Store Text*/ sprintf(__('%s','mega-mart'),$store_desc )); ?></h2>
						<?php endif; ?>
						
						<?php if(!empty($store_open_time)): ?>
							<p><?php echo esc_html(/*Translators: %s: Store Open*/ sprintf(__('%s','mega-mart'),$store_open_time )); ?></p>
						<?php endif; ?>
						
							<span class="separator"><span><i class="fab fa-gg" aria-hidden="true"></i></span></span>
							
						<?php if(!empty($store_close_time)): ?>
							<p><?php echo esc_html(/*Translators: %s: Store Close */ sprintf(__('%s','mega-mart'),$store_close_time )); ?></p>
						<?php endif; ?>
						</div>
					</div>
					<aside class="widget widget-contact wow fadeInLeft">
						<h4 class="widget-title"></h4>
						<div class="d-flex contact-area">
							<div class="flex-grow-1 contact-info text-right">
								<p class="text">
								<?php if(!empty($footer_contact_hour_title)): ?>
									<span><?php echo esc_html(/*Translators: %s: Hour Title */ sprintf(__('%s','mega-mart'),$footer_contact_hour_title )); ?></span>
								<?php endif; ?>
								
								<?php if(!empty($footer_contact_hour_link)): ?>
									<a href="<?php echo esc_url($footer_contact_hour_link); ?>" <?php if($footer_contact_hour_newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($footer_contact_hour_newtab =='yes') {echo 'noreferrer noopener';} ?> <?php if($footer_contact_hour_nofollow =='yes') {echo 'nofollow';} ?>" class="contact-info"><?php echo esc_html(/*Translators: %s: Hour Time */ sprintf(__('%s','mega-mart'),$footer_contact_hour_link )); ?></a>
								<?php endif; ?>
								</p>
							</div>
							<?php if(!empty($footer_contact_hour_icon)): ?>
								<div class="flex-shrink-0 contact-icon"><i class="fa <?php echo esc_attr($footer_contact_hour_icon); ?>"></i></div>
							<?php endif; ?>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<div class="footer-content d-none d-lg-block">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 middle-footer">
					<?php  dynamic_sidebar( 'mega-mart-footer-widget' ); ?>
				</div>
				<div class="col-lg-3 middle-footer">
					<?php  dynamic_sidebar( 'mega-mart-footer-widget-2' ); ?>
				</div>
				<div class="col-lg-3 middle-footer">
					<?php  dynamic_sidebar( 'mega-mart-footer-widget-3' ); ?>
				</div>
				<div class="col-lg-3 middle-footer">
					<?php  dynamic_sidebar( 'mega-mart-footer-widget-4' ); ?>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="footer-above d-none d-lg-block">
		<div class="container">
			<div class="footer-wrapper">
				<div class="row">
					<div class="col-md-5 col-12 d-flex justify-content-lg-left align-items-center">
						<aside class="widget widget_social_widget">
							<h4 class="widget-title d-none"></h4>
							<ul>
							<?php
									$footer_social_content	= get_theme_mod('footer_social_content', mega_mart_get_social_icon_default() );
								
									$footer_social_content = json_decode($footer_social_content);
									if( $footer_social_content!='' ){
									foreach($footer_social_content as $social_item){	
									$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'mega_mart_translate_single_string', $social_item->icon_value, 'Footer section' ) : '';	
									$social_link = ! empty( $social_item->link ) ? apply_filters( 'mega_mart_translate_single_string', $social_item->link, 'Footer section' ) : '';
									$newtab = ! empty( $social_item->newtab ) ? apply_filters( 'mega_mart_translate_single_string', $social_item->newtab, 'Footer section' ) : '';
									$nofollow = ! empty( $social_item->nofollow ) ? apply_filters( 'mega_mart_translate_single_string', $social_item->nofollow, 'Footer section' ) : '';
								?>
								<li><a href="<?php echo esc_url( $social_link ); ?>" <?php if($newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($newtab =='yes') {echo 'noreferrer noopener';} ?> <?php if($nofollow =='yes') {echo 'nofollow';} ?>" class="social-a bubbly-effect wow zoomIn"><i class="fab <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
								<?php }} ?>
							</ul>
						</aside>
					</div>
					<div class="col-md-2 col-12 position-relative d-flex justify-content-center align-items-center wow zoomIn">
						<div class="circle-badge zig-zag">
						<div></div>
						</div>
					</div>
					<div class="col-md-5 col-12 d-flex justify-content-lg-end align-items-center">
						<aside class="widget widget_payment_methods">
							<ul class="payment_methods">
								<?php 
									$footer_payment_content	= get_theme_mod('footer_payment_content', mega_mart_get_payment_icon_default() );
								
									$footer_payment_content = json_decode($footer_payment_content);
									if( $footer_payment_content!='' ){
									foreach($footer_payment_content as $payment_item){	
									$payment_icon = ! empty( $payment_item->icon_value ) ? apply_filters( 'mega_mart_translate_single_string', $payment_item->icon_value, 'Footer section' ) : '';	
									$payment_link = ! empty( $payment_item->link ) ? apply_filters( 'mega_mart_translate_single_string', $payment_item->link, 'Footer section' ) : '';
									$payment_newtab = ! empty( $payment_item->newtab ) ? apply_filters( 'mega_mart_translate_single_string', $payment_item->newtab, 'Footer section' ) : '';
									$payment_nofollow = ! empty( $payment_item->nofollow ) ? apply_filters( 'mega_mart_translate_single_string', $payment_item->nofollow, 'Footer section' ) : '';
								?>
								<li><a href="<?php echo esc_url( $social_link ); ?>" <?php if($payment_newtab =='yes') {echo 'target="_blank"'; } ?> rel="<?php if($payment_newtab =='yes') {echo 'noreferrer noopener';} ?> <?php if($payment_nofollow =='yes') {echo 'nofollow';} ?>" class="bubbly-effect wow zoomIn"><i class="fab <?php echo esc_attr( $payment_icon ); ?>"></i></a></li>
								<?php }} ?>
							</ul>
						</aside>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php
	$footer_bottom_layout 	= get_theme_mod('footer_bottom_layout','layout-1');	
	if($footer_bottom_layout !== 'disable') {
?>
	<div class="footer-copyright d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
			<?php if($footer_bottom_layout == 'layout-1'): ?>
                    <div class="col-md-6 col-12 text-lg-left text-md-left text-left wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="widget-left text-lg-left text-md-left text-left">
                            <div class="widget textwidget">
                                <div class="brand">
                                    <?php do_action('mega_mart_footer_group_first'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 text-lg-right text-md-right text-right wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="widget-center text-lg-right text-md-right text-right">
                            <div class="widget textwidget">
                                <div class="brand">
                                    <?php do_action('mega_mart_footer_group_second'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endif; ?>
				<?php if($footer_bottom_layout == 'layout-2'): ?>
					<div class="col-12 text-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="widget-left text-lg-left text-md-left text-left">
							<div class="widget textwidget">
								<div class="brand">
									<?php do_action('mega_mart_footer_group_first'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class=" col-12 text-center wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
						<div class="widget-center text-lg-right text-md-right text-right">
							<div class="widget textwidget">
								<div class="brand">
									<?php do_action('mega_mart_footer_group_second'); ?>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
                </div>
            </div>
        </div>
	<?php } ?>
</footer>


<!-- footer small menu -->
<?php	
    $footer_menu_hs						= get_theme_mod( 'footer_menu_hs','1');
	
if($footer_menu_hs!='0' && class_exists( 'woocommerce' )): ?>
<div id="footer-small" class="footer-small d-lg-none d-block">
	<div class="container px-0">
		<div class="position-relative d-flex justify-content-between">
			<div class="footer-mobile-menu">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<i class="fas fa-house"></i>
					<span><?php echo esc_html__('Home','mega-mart'); ?></span>
				</a>
			</div>	
		
			<div class="footer-mobile-menu">
				<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
					<i class="fa fa-user"></i>
					<span><?php echo esc_html__('Account','mega-mart'); ?></span>
				</a>
			</div>
		
			<div class="footer-mobile-menu">
				<a href="<?php echo wc_get_cart_url(); ?>">
					<i class="fa fa-shopping-cart"></i>
					<span><?php echo esc_html__('Cart','mega-mart'); ?></span>
					 <?php echo mega_mart_cart_footer_mobile(); ?>
				</a>
			</div>
		
			<div class="footer-mobile-menu">
				<a href="javascript:void(0)" id="footer-bottom-category" class="category-toggle category-toggle-mobile" data-target="#category-popup-mobile">
					<i class="fa fa-th-large"></i>
					<span><?php echo esc_html__('Categories','mega-mart'); ?></span>
				</a>
				<!-- Start: Docker Category Popup -->
				<div class="docker-widget-popup docker-left docker-mobile" id="category-popup-mobile">
					<div class="docker-overlay-layer"></div>
					<div class="docker-div">
						<div class="docker-anim">
							<div class="docker-top">
								<button type="button" class="docker-widget-close close-style"></button>
							</div>
							<div class="switcher-tab">
								<button category="categories" class="active-bg" ><i class="fa fa-archive"></i> <?php echo esc_html__('Category','mega-mart'); ?></button>
								<button category="menu" class="cat-menu-bt"><i class="fa fa-bars"></i> <?php echo esc_html__('Menu','mega-mart'); ?></button>
							</div>
							<div class="docker-category">
								<div class="docker-right-list w-100">
									<?php do_action('mega_mart_hdr_mobile_browse_cat'); ?>
									<nav class="menubar main-navbar footer_main_menu d-none" id="AVMenu">
										<?php do_action('mega_mart_main_nav');	?>  
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="nav-indicator">
				<div class="indicator-anim"></div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<!-- footer small menu end -->

<!-- START: SCROLL UP -->
<?php 
	$hs_scroller 	= get_theme_mod('hs_scroller','1');
	if($hs_scroller == '1') :
?>
<button type="button" class="scrollup style-1"></button>
<?php endif; ?>
<!-- END: SCROLL UP -->

</div> <!-- id="page" Ends -->
<?php wp_footer(); ?>

</body>
</html>
