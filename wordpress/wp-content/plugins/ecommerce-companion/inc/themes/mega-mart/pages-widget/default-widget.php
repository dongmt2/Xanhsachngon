<?php
	$theme = wp_get_theme();
	$name = strtolower(str_replace(' ', '-', $theme));
	if($name == 'theeme') {
		$mega_mart_logo_url = ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/'.$name.'/assets/images/footer-logo.png';
	} else {
		$mega_mart_logo_url = ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/'.$name.'/assets/images/footer-logo.png';
	}
	
$blocks = array(
    '<!-- wp:html -->
	<div class="logo mb-3">
		<a href="javascript:void(0);"><img decoding="async" src="'.$mega_mart_logo_url.'" alt="image"></a>
	</div>
	<div class="textwidget ">
		<p>It is a long established fact that reader will be distracted by the readable content of a page when looking at its layout.</p>
		<div class="footer-badge">
			<img decoding="async" src="'.ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/mega-mart/assets/images/footer/2.png" alt="">
			<img decoding="async" src="'.ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/mega-mart/assets/images/footer/3.png" alt="">
			<img decoding="async" src="'.ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/mega-mart/assets/images/footer/4.png" alt="">		   
		</div>
	</div>
	<!-- wp:html /-->', // Correspond to block-1
    '<!-- wp:group -->
		<div class="wp-block-group">
		<!-- wp:heading --><h2 class="wp-block-heading">Company</h2><!-- /wp:heading -->
		<!-- wp:html -->
			<ul class="wp-block-page-list">
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">About</a></li>
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">Account</a></li>
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">Career</a></li>
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">Privacy Policy</a></li>
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">Terms &amp; Conditions</a></li>
			</ul>
		<!-- /wp:html -->
		</div>
	<!-- /wp:group -->', // Correspond to block-2
	'<!-- wp:group -->
		<div class="wp-block-group">
		<!-- wp:heading --><h2 class="wp-block-heading">Account</h2><!-- /wp:heading -->
		<!-- wp:html -->
			<ul class="wp-block-page-list">
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">Help Ticket</a></li>
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">Track My Order</a></li>
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">View Cart</a></li>
				<li class="wp-block-pages-list__item"><a class="wp-block-pages-list__item__link" href="#">Wishlist</a></li>
			</ul>
		<!-- /wp:html -->
		</div>
	<!-- /wp:group -->',
	'<!-- wp:group -->
		<div class="wp-block-group">
		<!-- wp:heading --><h2 class="wp-block-heading">Install Apps</h2><!-- /wp:heading -->
		<!-- wp:html -->
			<div class="textwidget ">
				<p class="mb-0">Download App on Mobile :</p>
				<span class="secondary-color2">15% Discount</span>
			</div>
			<div class="brand mt-3 d-flex flex-column gap-2">
				<a href="javascript:void(0);"><img decoding="async" src="'.ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/mega-mart/assets/images/footer/playstore.png" alt="image"></a>
				<a href="javascript:void(0);"><img decoding="async" src="'.ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/mega-mart/assets/images/footer/appstore.png" alt="image"></a>
			</div>
		<!-- /wp:html -->
		</div>
	<!-- /wp:group -->',
    '<!-- wp:search /-->', 
    '<!-- wp:group --><!-- wp:heading --><h2 class="wp-block-heading">Categories</h2><!-- /wp:heading --><!-- wp:categories /--><!-- /wp:group -->', 
    '<!-- wp:group --><!-- wp:heading --><h2 class="wp-block-heading">Latest Posts</h2><!-- /wp:heading --><!-- wp:latest-posts /--><!-- /wp:group -->', 
    '<!-- wp:group --><!-- wp:heading --><h2 class="wp-block-heading">Calendar</h2><!-- /wp:heading --><!-- wp:calendar /--><!-- /wp:group -->', 
);
$activate = array(
		'mega-mart-footer-widget' => array(
			'block-1'
        ),
		'mega-mart-footer-widget-2' => array(
            'block-2'
        ),
		'mega-mart-footer-widget-3' => array(
            'block-3'
        ),
		'mega-mart-footer-widget-4' => array(
			'block-4'
        ),
        'mega-mart-sidebar-primary' => array(
            'block-5',
            'block-6',
            'block-7',
            'block-8',
        ),
    );
    	
	update_option('widget_block', array(
		1 => array('content' => $blocks[0]), // 1 Represent block-1
		2 => array('content' => $blocks[1]), //2 Represent block-2
		3 => array('content' => $blocks[2]), 
		4 => array('content' => $blocks[3]), 
		5 => array('content' => $blocks[4]), 
		6 => array('content' => $blocks[5]), 
		7 => array('content' => $blocks[6]), 
		8 => array('content' => $blocks[7]), 
	));
		
    update_option('sidebars_widgets',  $activate);
	$MediaId = get_option('mega_mart_media_id');
	set_theme_mod( 'custom_logo', $MediaId[0] );
	
	set_theme_mod( 'footer_contact_call_title', __('Order Anytime','ecommerce-companion'));
	set_theme_mod( 'footer_contact_call_link', __('70 975 975 70','ecommerce-companion'));
	set_theme_mod('store_desc', __('Store Open','ecommerce-companion'));
	set_theme_mod('store_open_time', __('09:00Am','ecommerce-companion'));
	set_theme_mod('store_close_time', __('09:00Pm','ecommerce-companion'));
	set_theme_mod( 'footer_contact_hour_title', __('Same Day Delivery','ecommerce-companion'));
	set_theme_mod( 'footer_contact_hour_link', __('9:00 Am To 09:00 Pm','ecommerce-companion'));
	set_theme_mod('hdr_contact_ttl', __('Hotline Number','ecommerce-companion'));
	set_theme_mod('hdr_contact_subttl', __('+70 975 975 70','ecommerce-companion'));
	set_theme_mod('blog_ttl', __('Our Blogs','ecommerce-companion'));
?>