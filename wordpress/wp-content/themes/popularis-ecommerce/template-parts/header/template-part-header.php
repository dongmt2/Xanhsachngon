<?php if ( is_active_sidebar( 'popularis-ecommerce-top-bar-area' ) ) { ?>
	<div class="top-bar-section container-fluid">
		<div class="container">
			<div class="row">
				<?php dynamic_sidebar( 'popularis-ecommerce-top-bar-area' ); ?>
			</div>
		</div>
	</div>
<?php } ?>
<div class="header-part row">
	<div class="container">
		<?php if ( class_exists( 'WooCommerce' ) ) { ?>
			<div class="header-search-field col-md-3">
				<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
			</div>	
		<?php } ?>

		<div class="site-heading text-center <?php echo esc_attr( class_exists( 'WooCommerce' ) ? 'col-md-6' : 'col-md-12'  ) ?>" >
			<div class="site-heading-wrap">
				<div class="site-heading-logo">
					<div class="site-branding-logo">
						<?php the_custom_logo(); ?>
					</div>
					<div class="site-branding-text">
						<?php if ( is_front_page() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif; ?>

						<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) :
							?>
							<p class="site-description">
								<?php echo esc_html( $description ); ?>
							</p>
						<?php endif; ?>
					</div><!-- .site-branding-text -->
				</div>
			</div>
			<?php
			if ( is_active_sidebar( 'popularis-ecommerce-header' ) ) {
				dynamic_sidebar( 'popularis-ecommerce-header' );
			}
			?>
		</div>

		<?php if ( class_exists( 'WooCommerce' ) ) { ?>
			<div class="header-cart-login hidden-xs col-md-3">
				<?php if ( function_exists( 'popularis_ecommerce_my_account' ) ) { ?>
					<?php popularis_ecommerce_my_account(); ?>
				<?php } ?>
				<?php if ( function_exists( 'popularis_ecommerce_header_cart' ) ) { ?>
					<?php popularis_ecommerce_header_cart(); ?>
				<?php } ?>
			</div>	
		<?php } ?>
	</div> 
</div>
<?php do_action( 'popularis_ecommerce_before_menu' ); ?> 
<div class="main-menu">
    <nav id="site-navigation" class="navbar navbar-default">     
        <div class="container">   
            <div class="navbar-header">
				<div class="mobile-logo"></div>
				<?php if ( function_exists( 'max_mega_menu_is_enabled' ) && max_mega_menu_is_enabled( 'main_menu' ) ) : ?>
				<?php elseif ( has_nav_menu( 'main_menu' ) ) : ?>
					<div class="mobile-right">
						<?php if ( function_exists( 'popularis_ecommerce_header_cart' ) && class_exists( 'WooCommerce' ) ) { ?>
							<div class="mobile-cart visible-xs" >
								<?php popularis_ecommerce_header_cart(); ?>
							</div>	
						<?php } ?>

						<?php if ( function_exists( 'popularis_ecommerce_my_account' ) && class_exists( 'WooCommerce' ) ) { ?>
							<div class="mobile-account visible-xs" >
								<?php popularis_ecommerce_my_account(); ?>
							</div>
						<?php } ?>

						<div class="menu-button" >
							<a href="#my-menu" id="main-menu-panel" class="toggle menu-panel visible-xs" data-panel="main-menu-panel">
								<span></span>
							</a>
						</div>
					</div>
				<?php endif; ?>
            </div>
			<?php
			if ( is_front_page() && has_nav_menu( 'main_menu_home' ) ) {
				$the_menu = 'main_menu_home';
			} else {
				$the_menu = 'main_menu';
			}
			wp_nav_menu( array(
				'theme_location'	 => $the_menu,
				'depth'				 => 5,
				'container_id'		 => 'my-menu',
				'container'			 => 'nav',
				'container_class'	 => 'menu-container',
				'menu_class'		 => 'nav navbar-nav navbar-center',
				'fallback_cb'		 => 'wp_bootstrap_navwalker::fallback',
				'walker'			 => new wp_bootstrap_navwalker(),
			) );
			?>
        </div>
		<?php do_action( 'popularis_ecommerce_menu' ); ?>
    </nav> 
</div>
<?php do_action( 'popularis_ecommerce_after_menu' ); ?>
