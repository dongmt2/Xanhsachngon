<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="custom-header" rel="home">
		<img src="<?php echo esc_url(get_header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
	</a>	
<?php endif;  ?>
<header class="header header-one">
   <?php 
   do_action('mega_mart_above_header');
   
	$mega_mart_header_type 		=	get_theme_mod('mega_mart_header_type','header-one');
	$hide_show_cart 			= 	get_theme_mod('hide_show_cart','1');
	$hide_show_hdr_contact 		= 	get_theme_mod('hide_show_hdr_contact','1');
	$hdr_contact_icon 			= 	get_theme_mod('hdr_contact_icon','fa-phone');
	$hdr_contact_ttl 			= 	get_theme_mod('hdr_contact_ttl','');
	$hdr_contact_subttl 		= 	get_theme_mod('hdr_contact_subttl','');
	?>
   	<div class="navigator-wrapper">
		<div class="navigation-middle">
			<div class="main-navigation-area">
				<div class="container">
					<div class="row navigation-middle-row py-4">
						<div class="col-3 my-auto">
							<div class="logo">
							   <?php do_action('mega_mart_logo'); ?>
							</div>
						</div>
						<div class="col-6 my-auto">
						<?php 
							$hs_product_search	= get_theme_mod( 'hs_product_search','1');
							if($hs_product_search == '1'){ ?>
							<div class="header-search-form">
								<?php	do_action('mega_mart_hdr_product_search');  ?>
							</div>
							<?php }	?>
						</div>
						<div class="col-3 my-auto">  
						<?php if($hide_show_cart == '1' ){ ?>
							<div class="main-menu-right d-flex justify-content-end">
								<ul class="menu-right-list">		
									
									<?php $hdr_cart_ttl = get_theme_mod( 'hdr_cart_ttl','');
										if( class_exists('woocommerce')):
									?>
									<li class="cart-wrapper">
										<button type="button" class="cart-icon-wrap header-cart cart-toggle"  data-target="#cart-popup">						
											 <i class="fa fa-shopping-cart"></i>
											<?php cart_product_count();	?>
										</button>				
									
										<div class="docker-widget-popup docker-right" id="cart-popup">
											<div class="docker-overlay-layer"></div>
											<div class="docker-div">
												<div class="docker-anim">
													<div class="docker-cart">													
														<div class="cart-container">
															<div class="cart-header">
																<div class="cart-top">
																	<span class="cart-icon"><i class="fa fa-shopping-cart"></i><span><?php cart_product_count(); ?></span></span>
																	<span class="cart-text"><?php echo wp_kses_post($hdr_cart_ttl); ?></span>
																	<span>
																		<a href="?empty-cart=yes" class="cart-close"><?php esc_html_e('Clear All','mega-mart'); ?></a>
																		<a href="javascript:void(0);" class="cart-close docker-widget-close"><i class="fa fa-times"></i></a>
																	</span>
																</div>
															</div>
															
															<div class="cart-data">
															<?php get_template_part('woocommerce/cart/mini','cart'); ?>
															</div>
															
														</div>
													</div>
												</div>
											</div>
										</div>																			
									</li>
									<?php endif; ?>
								 </ul>
									<?php do_action('mega_mart_hdr_account');  ?>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- Start: Mobile Main -->
			<?php get_template_part('template-parts/sections/mobile','menu'); ?>
			<!-- End: Mobile Main -->
		</div>
	</div>
	<!--===// Start: Navigation
	=================================-->
	<div class="nav-area d-lg-block d-none">
		<div class="navbar-area sticky-nav <?php echo mega_mart_sticky_menu(); ?>">
			<div class="container">
				<div class="navigation-content">
					<div class="product-category-browse" >
						<div class="empty position-fixed"></div>
						<?php 
								$hs_hdr_social				= get_theme_mod( 'hs_hdr_social','1');
								$mega_mart_hs_browse_cat	= get_theme_mod( 'hs_browse_cat','1');
								if($mega_mart_hs_browse_cat == '1') :?>
								<button type="button" class="product-category-btn category-toggle" data-target="#category-popup">
									<div class="product-icon">
										<i class="fa fa-shopping-bag"></i>
									</div>
									<div class="icon-content">
										<span><?php esc_html_e('Shop By','mega-mart'); ?></span>
										<h6><?php esc_html_e('Category','mega-mart'); ?></h6>
									</div>
									<div class="three-line-toggle">
										<span></span>
										<span></span>
										<span></span>
									</div>
								</button>
								<?php endif; ?>
						<!-- Start: Docker Category Popup -->
						<div class="docker-widget-popup docker-left" id="category-popup">
							<div class="docker-overlay-layer"></div>
							<div class="docker-div">
								<div class="docker-anim">
									<div class="docker-top">
										<button type="button" class="docker-widget-close close-style"></button>
										<?php 
											if($hs_product_search=='1'){
										?>
										<div class="header-search-form d-lg-block d-none">
											<?php mega_mart_hdr_product_search(); ?>
										</div>
										<?php } ?>
									</div>
									<div class="docker-category">
										<div class="docker-left-list d-lg-block d-none">
										<?php if( $hs_hdr_social == '1' ): ?>
											<ul>
												<?php $social_icons	= get_theme_mod('social_icons',mega_mart_get_social_icon_default()); ?>
												<li class="social-wrapper">
													<aside class="widget widget_social_widget">
														<ul>																
															<?php
																$social_icons = json_decode($social_icons);
																if( $social_icons!='' )
																{
																foreach($social_icons as $social_item){	
																$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'mega_mart_translate_single_string', $social_item->icon_value, 'Footer section' ) : '';	
																$social_link = ! empty( $social_item->link ) ? apply_filters( 'mega_mart_translate_single_string', $social_item->link, 'Footer section' ) : '';
															?>
																<li class="social-effect"><a href="<?php echo esc_url( $social_link ); ?>" class="social-a" aria-label="<?php esc_attr_e('Social Icon Button','mega-mart'); ?>"><i class="fab <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
															<?php }} ?>
														</ul>
													</aside>
												</li>
											</ul>
											<?php endif; ?>
										</div>										
										<?php do_action('mega_mart_hdr_browse_cat'); ?>
									</div>
								</div>
							</div>
						</div>
						<!-- End: Docker Category Popup -->
					</div>
					<div class="theme-menu">
						<nav class="menubar main-navbar" id="AVMenu">
							<?php do_action('mega_mart_main_nav');	?>  
						 </nav>
					</div>
					<?php if( $hide_show_hdr_contact == '1') { ?>
					<div class="right-widget">
						<aside class="widget widget-contact">
							<div class="contact-area">
								<div class="contact-icon ring-effect">
									<i class="fa <?php echo esc_attr($hdr_contact_icon); ?>"></i>
								</div>
								<div class="contact-info">
									<?php if( !empty($hdr_contact_ttl )): ?><p><?php echo esc_html(sprintf(/* Translatrors: Contact Title */__('%s','mega-mart'),$hdr_contact_ttl)); ?></p> <?php endif; ?>
									<?php if(!empty($hdr_contact_subttl)): ?><a href="tel:<?php echo esc_html(str_replace(' ', '', $hdr_contact_subttl)); ?>" class="contact-info">
										<span class="title"><?php echo esc_html($hdr_contact_subttl); ?></span>
									</a>
									<?php endif; ?>
								</div>
							</div>
						</aside>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</header>