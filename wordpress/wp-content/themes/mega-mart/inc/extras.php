<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package mega-mart
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function mega_mart_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	// $mega_mart_header_type 	= get_theme_mod('mega_mart_header_type','header-one');
	// $classes[] = $mega_mart_header_type;
	
	if ( is_page_template( 'templates/template-homepage.php' ) ) {
		$classes[] = 'home';
	}
	
	// if ( is_page_template( 'templates/template-homepage-2.php' ) ) {
		// $classes[] = 'home2';
	// }
	
	// if ( is_page_template( 'templates/template-homepage-3.php' ) ) {
		// $classes[] = 'home3';
	// }
	
	return $classes;
}
add_filter( 'body_class', 'mega_mart_body_classes' );

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Backward compatibility for wp_body_open hook.
	 *
	 * @since 1.0.0
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

if (!function_exists('mega_mart_str_replace_assoc')) {

    /**
     * mega_mart_str_replace_assoc
     * @param  array $replace
     * @param  array $subject
     * @return array
     */
    function mega_mart_str_replace_assoc(array $replace, $subject) {
        return str_replace(array_keys($replace), array_values($replace), $subject);
    }
}

// Comments Counts
if ( ! function_exists( 'mega_mart_comment_count' ) ) :
function mega_mart_comment_count() {
	$mega_mart_comments_count 	= get_comments_number();
	if ( 0 === intval( $mega_mart_comments_count ) ) {
		echo esc_html__( '0 Comments', 'mega-mart' );
	} else {
		/* translators: %s Comment number */
		 echo sprintf( _n( '%s Comment', '%s Comments', $mega_mart_comments_count, 'mega-mart' ), number_format_i18n( $mega_mart_comments_count ) );
	}
} 
endif;


//Background Image Pattern
function mega_mart_background_pattern()
{
	$bg_pattern = get_theme_mod('bg_pattern','sm0.png');
	if($bg_pattern!='')
	{
	echo '<style>html { background:url("'.get_template_directory_uri().'/assets/images/bg-pattern/'.$bg_pattern.'");}</style>';
	}
}
// add_action('wp_head','mega_mart_background_pattern',10,0);


/**
 * Display Sidebars
 */
if ( ! function_exists( 'mega_mart_get_sidebars' ) ) {
	/**
	 * Get Sidebar
	 *
	 * @since 1.0
	 * @param  string $sidebar_id   Sidebar Id.
	 * @return void
	 */
	function mega_mart_get_sidebars( $sidebar_id ) {
		if ( is_active_sidebar( $sidebar_id ) ) {
			dynamic_sidebar( $sidebar_id );
		} elseif ( current_user_can( 'edit_theme_options' ) ) {
			?>
			<div class="widget">
				<p class='no-widget-text'>
					<a href='<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>'>
						<?php esc_html_e( 'Add Widget', 'mega-mart' ); ?>
					</a>
				</p>
			</div>
			<?php
		}
	}
}

/**
 * Get registered sidebar name by sidebar ID.
 *
 * @since  1.0.0
 * @param  string $sidebar_id Sidebar ID.
 * @return string Sidebar name.
 */
function mega_mart_get_sidebar_name_by_id( $sidebar_id = '' ) {

	if ( ! $sidebar_id ) {
		return;
	}

	global $wp_registered_sidebars;
	$sidebar_name = '';

	if ( isset( $wp_registered_sidebars[ $sidebar_id ] ) ) {
		$sidebar_name = $wp_registered_sidebars[ $sidebar_id ]['name'];
	}

	return $sidebar_name;
}

/* Header Slides */

if ( ! function_exists( 'header_slides' ) ) {
function header_slides($txt) {
	$headerslide_text_explode	=	explode(',', $txt);
	array_walk($headerslide_text_explode, 'trim_value'); //Remove WhiteSpace form both side of separator
	$header_slides ='';
	?>
	<aside class="widget newstextwidget">
		<div class="newsflash owl-carousel">
										
	<?php				
	foreach($headerslide_text_explode as $text){ 
		echo $header_slides.'<div class="textslide-item">'. esc_html(sprintf(/* Translators: Slider Text */__('%s','mega-mart'),$text)).' <a href="javascript:void(0)" class="icon-holder"><i class="fa fa-tag"></i></a></div>';
	}
	?>
		</div>
	</aside>
<?php }}

if(! function_exists('hdr_widget_2_content')) {
	function hdr_widget_2_content() {
	$above_header_first_content	= get_theme_mod('mega_mart_above_header_first_content_default', mega_mart_above_header_first_content_default());
	$mega_mart_theme 				= get_theme_mod('mega_mart_theme','theme-1');
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
				<a class="infoicon-fa-gift tool-bounce tool-bottom-left" href="javascript:void(0)"><i class="fa <?php echo esc_attr($icon); ?>"></i> <?php if($mega_mart_theme != 'theme-3') { ?><div><?php if(!empty($text)): echo esc_html(sprintf(/* Translators: Info First Text */__('%s','mega-mart'),$text)).'<br>'; endif; ?><span class="info_description_name"><?php echo esc_html(sprintf(/* Translators: Info First Text */__('%s','mega-mart'),$text2)) ?></span></div> <?php } ?></a>
			</li>
			<?php } endif; ?>
		</ul>
	</aside>
<?php } }

/**
 * Mega_Mart Above Header First
 */
if ( ! function_exists( 'mega_mart_abv_hdr_group_1' ) ) {
	function mega_mart_abv_hdr_group_1() {
		//above_header_first
		$above_header_first 			= get_theme_mod('above_header_first','custom');
		$abv_hdr_first_slide_custom 	= get_theme_mod('abv_hdr_first_slide_custom','Welcome To Our Grocery, Save 20%-50% Sitewide!!, Save Upto 35% Off Today');
		$mega_mart_theme 				= get_theme_mod('mega_mart_theme','theme-1');
		
			if($above_header_first == 'widget'):
				// mega_mart_header_widget_area_first(); 
			 endif;
			 
			 // Custom
			if($above_header_first == 'custom'): 
				if( $mega_mart_theme == 'theme-3' ) { 
					header_slides($abv_hdr_first_slide_custom);
				} else {
				hdr_widget_2_content();
		} endif;
	}
}
add_action( 'mega_mart_abv_hdr_group_1', 'mega_mart_abv_hdr_group_1' );

/**
 * Mega_Mart Above Header Second
 */
if ( ! function_exists( 'mega_mart_abv_hdr_group_2' ) ) {
	function mega_mart_abv_hdr_group_2() {
		//above_header_second
		$above_header_second 				= get_theme_mod('above_header_second','custom');
		$abv_hdr_second_slide_custom 		= get_theme_mod('abv_hdr_second_slide_custom','Welcome To Our Grocery, Save 20%-50% Sitewide!!, Save Upto 35% Off Today');
		$mega_mart_theme 					= get_theme_mod('mega_mart_theme','theme-1');
		$daytext 							= get_theme_mod('daytext','Deal of the day!');
		
			if($above_header_second == 'widget'):
				// mega_mart_header_widget_area_second();
			 endif;
			 
			 // Custom
			if($above_header_second == 'custom'): ?>
				<div class="widget daytextwidget">
					<div class="daytext-content">
						<i class="fa fa-tag"></i> <?php echo esc_html(sprintf(/* Translators: Info Day Deal Text */__('%s','mega-mart'),$daytext)); ?>
					</div>
				</div>
				
				<?php 
				if( $mega_mart_theme != 'theme-3' ) {
					header_slides($abv_hdr_second_slide_custom);
				} 
				?>
				
				<aside class="widget widget_nav_menu">
					<a href="<?php echo esc_url( get_permalink( get_page_by_path( 'order-tracking' ) ) ); ?>">
						<span class="order-traKing">Order Tracking</span>
					</a>
				</aside>

				
				<?php 
				// mega_mart_header_widget_area_second();
				
			endif;
	}
}
add_action( 'mega_mart_abv_hdr_group_2', 'mega_mart_abv_hdr_group_2' );


/**
 * Mega_Mart Preloader
 */
if ( ! function_exists( 'mega_mart_preloader' ) ) {
	function mega_mart_preloader() {
		$hs_preloader 		= get_theme_mod( 'hs_preloader'); 
		$preloader_text 	= get_theme_mod( 'preloader_text', 'Bringing you the goods…'); 
		$preloader_text2 	= get_theme_mod( 'preloader_text2', 'This is taking long. Keep patience.'); 
		$preloader_button	= get_theme_mod( 'preloader_button', 'Back'); 
		if($hs_preloader == '1') { 
	?>
		<div class="preloader">
        <div class="min-w-400">
            <svg class="cart" role="img" aria-label="Shopping cart line animation" viewBox="0 0 128 128" width="128px" height="128px" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="8">
                    <g class="cart__track" stroke="hsla(0,10%,10%,0.1)">
                        <polyline points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" />
                        <circle cx="43" cy="111" r="13" />
                        <circle cx="102" cy="111" r="13" />
                    </g>
                    <g class="cart__lines" stroke="currentColor">
                        <polyline class="cart__top" points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" stroke-dasharray="338 338" stroke-dashoffset="-338" />
                        <g class="cart__wheel1" transform="rotate(-90,43,111)">
                            <circle class="cart__wheel-stroke" cx="43" cy="111" r="13" stroke-dasharray="81.68 81.68" stroke-dashoffset="81.68" />
                        </g>
                        <g class="cart__wheel2" transform="rotate(90,102,111)">
                            <circle class="cart__wheel-stroke" cx="102" cy="111" r="13" stroke-dasharray="81.68 81.68" stroke-dashoffset="81.68" />
                        </g>
                    </g>
                </g>
            </svg>
            <div class="preloader__text">
                <p class="preloader__msg"><?php echo esc_html( sprintf(/* Preloader Text */__('%s','mega-mart'),$preloader_text)); ?></p>
                <p class="preloader__msg preloader__msg--last"><?php echo esc_html(sprintf(/* Preloader Text2 */__('%s','mega-mart'),$preloader_text2)); ?></p>
                <button class="preloader__close-btn">
                    <div class="outer">
                        <div class="inner">
                          <label><?php echo esc_html( sprintf(/* Preloader Button Label */__('%s','mega-mart'),$preloader_button)); ?></label>
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
        
	<?php }
	}
}
add_action( 'mega_mart_preloader', 'mega_mart_preloader' );


/**
 * Mega_Mart Logo
 */
if ( ! function_exists( 'mega_mart_logo' ) ) {
	function mega_mart_logo() {
		if(has_custom_logo())
			{	
				the_custom_logo();
			}
			$title = get_bloginfo('name');
			if($title){ 
			?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<h4 class="site-title">
					<?php 
						echo esc_html($title);
					?>
				</h4>
			</a>	
		<?php 						
			}
		?>
		<?php
			$mega_mart_description = get_bloginfo( 'description');
			if ($mega_mart_description) : ?>
				<p class="site-description"><?php echo esc_html($mega_mart_description); ?></p>
		<?php endif;
	}
}
add_action( 'mega_mart_logo', 'mega_mart_logo' );


/**
 * Mega_Mart Navigation
 */
if ( ! function_exists( 'mega_mart_main_nav' ) ) {
	function mega_mart_main_nav() {
		wp_nav_menu( 
			array(  
				'theme_location' => 'primary_menu',
				'container'  => '',
				'menu_class' => 'nav menu-wrap',
				'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
				'walker' => new WP_Bootstrap_Navwalker()
				 ) 
			);
	}
}
add_action( 'mega_mart_main_nav', 'mega_mart_main_nav' );


/**
 * Mega_Mart Navigation Button
 */
if ( ! function_exists( 'mega_mart_nav_button' ) ) {
	function mega_mart_nav_button() {
		$hide_show_hdr_btn	= get_theme_mod( 'hide_show_hdr_btn');
		$hdr_btn_lbl		= get_theme_mod( 'hdr_btn_lbl','Click Button');
		$hdr_btn_url		= get_theme_mod( 'hdr_btn_url');
		if($hide_show_hdr_btn=='1'):
	?>	
			<li class="button-area">
				<a href="<?php echo esc_url($hdr_btn_url); ?>" class="btn btn-primary"><?php echo esc_html($hdr_btn_lbl); ?></a>
			</li> 
		<?php 
		endif;
	}
}
add_action( 'mega_mart_nav_button', 'mega_mart_nav_button' );



//Newsletter
function mega_mart_newsletter()
{
	 // Check if the popup cookie is set
    // if (isset($_COOKIE['popup_shown'])) {
        // return;
    // }

	$hs_newsletter 				= get_theme_mod('hs_newsletter','1');
	$newsletter_img 		= get_theme_mod('newsletter_img',esc_url(get_template_directory_uri() .'/assets/images/contact/subscribe/bg-img.jpg'));
	$newsletter_desc 			= get_theme_mod('newsletter_desc',__('Start Your Daily Shopping with <span class="text-danger">Grocery</span>','mega-mart'));
	$newsletter_ttl 			= get_theme_mod('newsletter_ttl',__('Stay home & get your daily needs from our shop','mega-mart'));
	$newsletter_place_txt 			= get_theme_mod('newsletter_place_txt',__('Subscribe Your WhatsApp Number','mega-mart'));
	$newsletter_send_icon 			= get_theme_mod('newsletter_send_icon','fa-whatsapp');
	$newsletter_shortcode 		= get_theme_mod('newsletter_shortcode');
		
	if($hs_newsletter =='1'){
?>	
		<section class="subscribe-section st-py-default2" style="background-image: url('<?php  if(!empty($newsletter_img)): 	 echo esc_url($newsletter_img); 	 endif; ?>	');">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6">
					<?php if(!empty($newsletter_ttl)): ?>
						<h1 class="fw-bold text-animation"><?php echo wp_kses_post( sprintf(__('%s','mega-mart'),$newsletter_ttl)); ?></h1>
					<?php endif; ?>
					
					<?php if(!empty($newsletter_desc)): ?>
						<p class="text-animation"><?php echo wp_kses_post( sprintf(__('%s','mega-mart'),$newsletter_desc)); ?></p>
					<?php endif; ?>	
						
						<?php if(!empty($newsletter_shortcode)): echo do_shortcode($newsletter_shortcode); else:  ?>
						<div class="subscribe-input wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
							<input type="text" placeholder="<?php echo wp_kses_post( sprintf(__('%s','mega-mart'),$newsletter_place_txt)); ?>" />
							<a href="#"><i class="fab <?php echo esc_attr($newsletter_send_icon); ?>"></i></a>
						</div>
						<div class="spanco-subscription-msg"></div>
						<?php endif; ?>
					</div>  
				</div>
			</div>
		</section>
	<?php
	}
}
add_action('mega_mart_newsletter','mega_mart_newsletter');


/**
 * Mega_Mart Header Compare
 */
if ( ! function_exists( 'mega_mart_hdr_compare' ) ) {
	function mega_mart_hdr_compare() {
		$hide_show_compare	= get_theme_mod( 'hide_show_compare','1');
		$hide_show_compare_ttl	= get_theme_mod( 'hide_show_compare_ttl','0');
		$hdr_compare_ttl	= get_theme_mod( 'hdr_compare_ttl','Compare');
		if($hide_show_compare=='1'  && function_exists( 'mega_mart_woocompare_get_page_link' )):									
		?>	
			<li class="like-wrapper">
			  <a href="<?php echo mega_mart_woocompare_get_page_link(); ?>" class="like-icon-wrap header-like">
						<i class="fa fa-scale-balanced"></i>
					
					<?php 
						if ( function_exists( 'mega_mart_woocompare_get_list' ) ) {
							$count =  count(mega_mart_woocompare_get_list());
							
							if ( $count > 0 ) {
							?>
								 <span class="yith-wcwl-items-count"><?php echo esc_html( $count ); ?></span>
							<?php 
							}
							else {
								?>
								<span class="yith-wcwl-items-count"><?php echo esc_html_e('0','mega-mart'); ?></span>
								<?php 
							}
						}
					?>
					<?php if($hide_show_compare_ttl=='1'){ ?>
						<p><?php echo esc_html($hdr_compare_ttl); ?></p>
					<?php } ?>
				</a>
			</li>
		<?php endif;
	}
}
add_action( 'mega_mart_hdr_compare', 'mega_mart_hdr_compare' );




/**
 * Mega_Mart Header My Account
 */
if ( ! function_exists( 'mega_mart_hdr_account' ) ) {
	function mega_mart_hdr_account() {
		$hide_show_account = get_theme_mod( 'hide_show_account','1');
		$hide_show_account_title = get_theme_mod( 'hide_show_account_title','0');
		if($hide_show_account=='1'  && class_exists( 'woocommerce' )): ?>
			<div class="user-wrapper">
				<?php if(is_user_logged_in()): ?>
					<a href="<?php echo esc_url(wp_logout_url( home_url())); ?>" class="header-user wave-effect" aria-label="<?php esc_attr_e('Logout Button','mega-mart'); ?>">
						<i class="fa fa-user"></i>
					</a>
				<?php else: ?>
					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="header-user wave-effect" aria-label="<?php esc_attr_e('Login Button','mega-mart'); ?>">
						<i class="fa fa-user"></i>
					</a>
				<?php endif; ?>
			</div>
		<?php endif;
	}
}
add_action( 'mega_mart_hdr_account', 'mega_mart_hdr_account' );



function cart_product_count() {
	if ( class_exists( 'woocommerce' ) ) {
		$count = WC()->cart->cart_contents_count;
		$cart_url = wc_get_cart_url();
		
		if ( $count > 0 ) {
		?>
			 <span class="cart-counts"><?php echo esc_html( $count ); ?></span>
		<?php 
		}
		else {
			?>
			<span class="cart-counts"><?php echo esc_html_e('0','mega-mart')?></span>
			<?php 
		}
	}
}
/**
 * Mega_Mart Header Cart
 */
if ( ! function_exists( 'mega_mart_hdr_cart' ) ) {
	function mega_mart_hdr_cart() {
		$hide_show_cart = get_theme_mod( 'hide_show_cart','1');
		$hide_show_cart_ttl = get_theme_mod( 'hide_show_cart_ttl','0');
		$hdr_cart_style = get_theme_mod( 'hdr_cart_style','1');
		$hdr_cart_ttl = get_theme_mod( 'hdr_cart_ttl','Cart');
		if($hide_show_cart=='1' && class_exists( 'woocommerce' )): ?>
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
								<!-- Shopping Cart -->
								<div class="cart-container">
									<div class="cart-header">
										<div class="cart-top">
											<span class="cart-icon"><i class="fa fa-shopping-cart"></i><span><?php cart_product_count(); ?></span></span>
											<span class="cart-text"><?php echo wp_kses_post($hdr_cart_ttl); ?></span>
											<span>
												<a href="javascript:void(0);" class="cart-close"><?php esc_html_e('Clear All','mega-mart'); ?></a>
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
			<?php endif;
	}
}
add_action( 'mega_mart_hdr_cart', 'mega_mart_hdr_cart' );



/**
 * Mega_Mart Browse Category
 */
function mega_mart_render_category_item($cat) {
	$output = '';
	$category_id = $cat->term_id;
	$count = $cat->count;
	$thumbnail_id = get_term_meta($category_id, 'thumbnail_id', true);
	$image = wp_get_attachment_url($thumbnail_id);
	$icon = get_term_meta($category_id, 'mega_mart_product_cat_icon', true);
	$has_children = mega_mart_has_Children($category_id);
	$child_class = $has_children ? 'menu-item-has-children' : '';

	$output .= '<li class="menu-item ' . $child_class . '">';
	$output .= '<a class="nav-link" href="' . get_term_link($cat->slug, 'product_cat') . '">';
	$output .= !empty($icon) ? "<i class='fa {$icon}'></i>" : "<img src='{$image}'>";
	$output .= $cat->name . '<span class="count-badge ms-2">' . $count . '</span></a>';

	if ($has_children) {
		$output .= '<span class="mobile-collapsed"><button type="button" class="fa fa-chevron-right" aria-label="Mobile Collapsed"></button></span>';
		$sub_categories = get_categories([
			'taxonomy'     => 'product_cat',
			'parent'       => $category_id,
			'hierarchical' => 1,
			'hide_empty'   => 0,
		]);

		if ($sub_categories) {
			$output .= '<ul class="dropdown-menu">';
			foreach ($sub_categories as $sub_cat) {
				$output .= mega_mart_render_category_item($sub_cat); // Recursive call
			}
			$output .= '</ul>';
		}
	}

	$output .= '</li>';
	return $output;
}
	
function mega_mart_has_Children($term_id) {
    $children = get_categories([
        'taxonomy'   => 'product_cat',
        'parent'     => $term_id,
        'hide_empty' => 0,
        'number'     => 1,
    ]);
    return !empty($children);
}

if ( ! function_exists( 'mega_mart_hdr_browse_cat' ) ) {
	function mega_mart_hdr_browse_cat() {
		if (!class_exists('woocommerce')) {
			return;
		}

		?>
		<div class="docker-right-list w-100">
			<div class="product-category-menus">
				<div class="product-category-menus-list active">
					<ul class="main-menu mt-2 category-menu-wrap">
						<?php
						$top_level_categories = get_categories([
							'taxonomy'     => 'product_cat',
							'parent'       => 0,
							'hierarchical' => 1,
							'hide_empty'   => 0,
						]);

						foreach ($top_level_categories as $cat) {
							echo mega_mart_render_category_item($cat);
						}
						?>
					</ul>
				</div>
			</div>
		</div>
		<?php
	}	
}
add_action( 'mega_mart_hdr_browse_cat', 'mega_mart_hdr_browse_cat' );

/**
 * Mega_Mart Mobile Browse Category
 */
if ( ! function_exists( 'mega_mart_hdr_mobile_browse_cat' ) ) {
	function mega_mart_hdr_mobile_browse_cat() {
		$mega_mart_hs_browse_cat		= get_theme_mod( 'hs_browse_cat','1');
		if($mega_mart_hs_browse_cat=='1' && class_exists( 'woocommerce' )):
		?>
			<div class="product-category-menus product-category-menu-mobile">
				<div class="product-category-menus-list active">
				<ul class="main-menu mt-2 category-menu-wrap">
						<?php
						$top_level_categories = get_categories([
							'taxonomy'     => 'product_cat',
							'parent'       => 0,
							'hierarchical' => 1,
							'hide_empty'   => 0,
						]);

						foreach ($top_level_categories as $cat) {
							echo mega_mart_render_category_item($cat);
						}
						?>
					</ul>
				</div>
			</div>		
		<?php endif;
	}
}
add_action( 'mega_mart_hdr_mobile_browse_cat', 'mega_mart_hdr_mobile_browse_cat' );



/**
 * Mega_Mart Header Contact
 */
if ( ! function_exists( 'mega_mart_hdr_contact' ) ) {
	function mega_mart_hdr_contact() {
		$hide_show_hdr_contact = get_theme_mod( 'hide_show_hdr_contact','1');
		$hdr_contact_icon 	   = get_theme_mod( 'hdr_contact_icon','fa-headphones');
		$hdr_contact_ttl 	   = get_theme_mod( 'hdr_contact_ttl','+ 70 975 975 70');
		$hdr_contact_url 	   = get_theme_mod( 'hdr_contact_url','#');
		if($hide_show_hdr_contact=='1'): ?>
			<li class="contact-wrapper">
				<a href="<?php echo esc_url($hdr_contact_url); ?>" class="headphone-icon-wrap"
					id="headphone" title="Contact Us">
					<i class="fa <?php echo esc_attr($hdr_contact_icon); ?>" aria-hidden="true"></i>
					<span class="contact-number"><?php echo wp_kses_post($hdr_contact_ttl); ?></span>
				</a>
			</li>
		<?php endif;
	}
}
add_action( 'mega_mart_hdr_contact', 'mega_mart_hdr_contact' );


function trim_value(&$to_be_trim) { 
	$to_be_trim = trim($to_be_trim); 
	return $to_be_trim;
}

/**
 * Mega_Mart Product Search
 */
if ( ! function_exists( 'mega_mart_hdr_product_search' ) ) {
	function mega_mart_hdr_product_search() {
		$hide_show_search					= get_theme_mod( 'hide_show_search','1');
		$search_product_cat					= get_theme_mod('search_product_cat');
		$search_product_plstate_text		= get_theme_mod('search_product_plstate_text',__('Search','mega-mart'));
		$search_product_pldynm_text			= get_theme_mod('search_product_pldynm_text',__('Fruits, Vegetables, Milk, Fast Food, Household Things','mega-mart'));
		$show_search_cat					= get_theme_mod('show_search_cat');
		 if($hide_show_search=='1' && class_exists( 'woocommerce' ) ): ?>			
				<form name="product-search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
					<input type="search" name="s" class="search header-search-input" name="s" placeholder="<?php echo esc_attr__( 'Search Products', 'mega-mart' ); ?>" value="">
					
					<input type="hidden" name="post_type" value="product" />
					<button class="header-voice-button" type="somefunctioncall" aria-label="<?php esc_attr_e('Voice Product Search Button','mega-mart'); ?>"><i class="fa fa-microphone"></i></button>
					<button class="header-search-button" type="submit" aria-label="<?php esc_attr_e('Search Product Button','mega-mart'); ?>"><i class="fa fa-search"></i></button>
				</form>
		<?php endif;
	}
}
add_action( 'mega_mart_hdr_product_search', 'mega_mart_hdr_product_search' );



/**
 * Flossy Normal Search
 */
if ( ! function_exists( 'mega_mart_hdr_normal_search' ) ) {
	function mega_mart_hdr_normal_search() {
		$hide_show_search	= get_theme_mod( 'hide_show_search','1');
		$search_product_cat			= get_theme_mod('search_product_cat');
		$search_product_plstate_text		= get_theme_mod('search_product_plstate_text',__('Search','mega-mart'));
		$search_product_pldynm_text			= get_theme_mod('search_product_pldynm_text',__('Fruits, Vegetables, Milk, Fast Food, Household Things','mega-mart'));
		$show_search_cat					= get_theme_mod('show_search_cat');
		 if($hide_show_search=='1' && class_exists( 'woocommerce' )): ?>
			<div class="header-search-popup">
				<div class="search-overlay"></div>
				<div class="header-search-form">
				<button type="button" class="header-close-menu close-style" aria-label="Header Close Menu"></button>
				<form name="product-search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
					<?php if($show_search_cat == '1' && !empty($search_product_cat)): ?>
						<?php
							$args['tax_query'] = array(
								array(
									'taxonomy' => 'product_cat',
									'field' => 'slug',
									'terms' => $search_product_cat,
								),
							);
							
							if(!empty($search_product_cat)){
							
								$count = count($search_product_cat);
								if ( $count > 0 ){
							?>
							<div class="custom-search-select search-wrapper">
							<select name="category" class="category header-search-select">
								<option class="default" value=""><?php echo esc_html__( 'Select Category', 'mega-mart' ); ?></option>
                            
							<?php 
								foreach ( $search_product_cat as $i=> $product_category ) { 
									// $category = get_term_by( 'slug', $product_category, 'product_cat' );
									$product_cat_name = get_term_by( 'slug', $product_category, 'product_cat' );
									
								?>
									<option class="default" value="<?php  echo $product_cat_name->slug; ?>"><?php  echo $product_cat_name->name; ?></option>
								<?php
								
								}
								}
								}
							  
							?>
						</select> 
						</div>
						<?php endif; ?>
					<input type="hidden" name="post_type" value="product">					
					<div class="head_contianer">
					<input type="search" name="s" class="search header-search-input search-field" name="s" placeholder="" value="" aria-label="<?php esc_attr_e('Product Search Input','mega-mart'); ?>">
					<?php 										
					$search_product_pldynm_text = explode(',',$search_product_pldynm_text); 	
					array_walk($search_product_pldynm_text, 'trim_value');
					?>
					<div class="placeholder">
						<div class="static_text">
							<?php printf(/*translators : %s: Static text */__('%s','mega-mart'),$search_product_plstate_text ); ?>
						</div>
						<!--<div class="stage1">-->
							<ul class="spinnnn">
							<?php foreach($search_product_pldynm_text as $digit => $face){
								echo '<li class="face'. ($digit+1) .'">'. sprintf(/*translators : %s:  Dynamic Text */__('&nbsp;%s','mega-mart'), $face) .'</li>';} 
							?>								
							</ul>
						<!--</div> -->
					</div>
					<svg class="search-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 471.701 471.701">
							<path d="M409.6,0c-9.426,0-17.067,7.641-17.067,17.067v62.344C304.667-5.656,164.478-3.386,79.411,84.479
								c-40.09,41.409-62.455,96.818-62.344,154.454c0,9.426,7.641,17.067,17.067,17.067S51.2,248.359,51.2,238.933
								c0.021-103.682,84.088-187.717,187.771-187.696c52.657,0.01,102.888,22.135,138.442,60.976l-75.605,25.207
								c-8.954,2.979-13.799,12.652-10.82,21.606s12.652,13.799,21.606,10.82l102.4-34.133c6.99-2.328,11.697-8.88,11.674-16.247v-102.4
								C426.667,7.641,419.026,0,409.6,0z"/>
							<path d="M443.733,221.867c-9.426,0-17.067,7.641-17.067,17.067c-0.021,103.682-84.088,187.717-187.771,187.696
								c-52.657-0.01-102.888-22.135-138.442-60.976l75.605-25.207c8.954-2.979,13.799-12.652,10.82-21.606
								c-2.979-8.954-12.652-13.799-21.606-10.82l-102.4,34.133c-6.99,2.328-11.697,8.88-11.674,16.247v102.4
								c0,9.426,7.641,17.067,17.067,17.067s17.067-7.641,17.067-17.067v-62.345c87.866,85.067,228.056,82.798,313.122-5.068
								c40.09-41.409,62.455-96.818,62.344-154.454C460.8,229.508,453.159,221.867,443.733,221.867z"/>
						</svg>
						</div>
					<button class="header-search-button" type="submit" aria-label="<?php esc_attr_e('Search Product Button','mega-mart'); ?>"><i class="fa fa-search"></i></button>
				</form>
				<div class="search-results woocommerce"></div>
			</div>
			</div>
		<?php endif;
	}
}
add_action( 'mega_mart_hdr_normal_search', 'mega_mart_hdr_normal_search' );


//Categories section content
if( ! function_exists('get_category_section_content')) {
	function get_category_section_content() {
	$category_product_cat			= get_theme_mod('category_product_cat');
	$category_product_num		= get_theme_mod('category_product_num','20');


	if ( class_exists( 'woocommerce' ) ) {
	$args                   = array(
		'post_type' => 'product',
		'posts_per_page' => $category_product_num,
	);
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => $category_product_cat,
		),
	);
	
	if ( !empty($category_product_cat) && ! is_wp_error( $category_product_cat ) ) : 
			
			// $product_cats = get_terms( 'product_cat' );
			
		foreach ($category_product_cat as $i => $product_cat) {
			$category_name = get_term_by( 'slug', $product_cat, 'product_cat' );   
			$category_link = get_term_link($category_name);
			$product_count = $category_name->count;
			$thumbnail_id = get_term_meta($category_name->term_id, 'thumbnail_id', true); 
			$thumbnail_url = wp_get_attachment_url($thumbnail_id); ?>
			
			<div class="categories-item">
				<div class="categories-img">
					<a href="<?php echo esc_url($category_link); ?>"><img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr(sprintf(/* Translators: Product category Name */__('%s','mega-mart'), $category_name->name)); ?>"></a>
				</div>
				<div class="categories-content">
					<h6 class="title"><a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html(sprintf(/* Translators: Product category Name */__('%s','mega-mart'), $category_name->name)); ?></a></h6>
					<span class="categories count-badge"><?php echo esc_html($product_count); ?></span>
					<span class="categories-categories text-muted"><?php esc_html_e('Products','mega-mart'); ?></span>
				</div>
			</div> 
		<?php 
} endif; 
} } }

add_action('get_category_section_content','get_category_section_content');

// Mega_Mart Footer Group First
if ( ! function_exists( 'mega_mart_footer_group_first' ) ) :
function mega_mart_footer_group_first() {
	$footer_bottom_1 			= get_theme_mod('footer_bottom_1','custom');
	$footer_first_custom 		= get_theme_mod('footer_first_custom','Copyright &copy; [current_year] [theme_author]. All Rights Reserved.');	
	
	
		// Custom
		if($footer_bottom_1 == 'custom'): 
				$mega_mart_copyright_allowed_tags = array(
					'[current_year]' => date_i18n('Y', current_time( 'timestamp' )),
					'[site_title]'   => get_bloginfo('name'),
					'[theme_author]' => sprintf(__('<a href="#">Mega Mart</a>', 'mega-mart')),
				);
				?>
				<p class="copyright-text">
					<?php
					echo apply_filters('mega_mart_footer_copyright', wp_kses_post(mega_mart_str_replace_assoc($mega_mart_copyright_allowed_tags, $footer_first_custom)));
					?>
				</p>
		<?php endif;
		
		// Widget
		 if($footer_bottom_1 == 'widget'): ?>
			<?php  mega_mart_get_sidebars( 'mega-mart-footer-layout-first' ); ?>
		<?php endif; 
		
		// Menu
		 if($footer_bottom_1 == 'menu'): ?>
			<aside class="widget widget_nav_menu">
				<div class="menu-pages-container">
					<?php 
						wp_nav_menu( 
							array(  
								'theme_location' => 'footer_menu',
								'container'  => '',
								'menu_class' => 'menu',
								'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
								'walker' => new WP_Bootstrap_Navwalker()
								 ) 
							);
					?>   
				</div>
			</aside>	
		<?php endif; ?>
	<?php 
	} 
endif;
add_action('mega_mart_footer_group_first','mega_mart_footer_group_first');

// Mega_Mart Footer Group Second
if ( ! function_exists( 'mega_mart_footer_group_second' ) ) :
function mega_mart_footer_group_second() {
	$footer_bottom_2 			= get_theme_mod('footer_bottom_2','menu');	
	$footer_second_custom 		= get_theme_mod('footer_second_custom','Copyright &copy; [current_year] [theme_author]. All Rights Reserved.');	
	
	
		// Custom
		if($footer_bottom_2 == 'custom'): 
				$mega_mart_copyright_allowed_tags = array(
					'[current_year]' => date_i18n('Y', current_time( 'timestamp' )),
					'[site_title]'   => get_bloginfo('name'),
					'[theme_author]' => sprintf(__('<a href="#">Mega Mart</a>', 'mega-mart')),
				);
				?>
				<p class="copyright-text">
					<?php
					echo apply_filters('mega_mart_footer_copyright', wp_kses_post(mega_mart_str_replace_assoc($mega_mart_copyright_allowed_tags, $footer_second_custom)));
					?>
				</p>
				<?php endif;
		
		// Widget
		 if($footer_bottom_2 == 'widget'): ?>
			<?php  mega_mart_get_sidebars( 'mega-mart-footer-layout-second' ); ?>
		<?php endif; 
		
		// Menu
		 if($footer_bottom_2 == 'menu'): ?>
			<aside class="widget widget_nav_menu">
				<div class="menu-pages-container">
					<?php 
						wp_nav_menu( 
							array(  
								'theme_location' => 'footer_menu',
								'container'  => '',
								'menu_class' => 'menu',
								'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
								'walker' => new WP_Bootstrap_Navwalker()
								 ) 
							);
					?>   
				</div>
			</aside>	
		<?php endif; ?>
	<?php 
	} 
endif;	
add_action('mega_mart_footer_group_second','mega_mart_footer_group_second');


// Mega_Mart Footer Group Third
if ( ! function_exists( 'mega_mart_footer_group_third' ) ) :
function mega_mart_footer_group_third() {
	$footer_bottom_3 			= get_theme_mod('footer_bottom_3','menu');	
	$footer_third_custom 		= get_theme_mod('footer_third_custom');
	
		// Custom
		 if($footer_bottom_3 == 'custom'): 
			echo do_shortcode($footer_third_custom);
		 endif; 
		
		// Widget
		 if($footer_bottom_3 == 'widget'): ?>
			<?php  mega_mart_get_sidebars( 'mega-mart-footer-layout-three' ); ?>
		<?php endif; 
		
		// Menu
		 if($footer_bottom_3 == 'menu'): ?>
			<aside class="widget widget_nav_menu">
				<div class="menu-pages-container">
					<?php 
						wp_nav_menu( 
							array(  
								'theme_location' => 'footer_menu',
								'container'  => '',
								'menu_class' => 'menu',
								'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
								'walker' => new WP_Bootstrap_Navwalker()
								 ) 
							);
					?>   
				</div>
			</aside>	
		<?php endif; ?>
	<?php 
	} 
endif;	
add_action('mega_mart_footer_group_third','mega_mart_footer_group_third');


 /**
 * Add WooCommerce Cart Icon With Cart Count (https://isabelcastillo.com/woocommerce-cart-icon-count-theme-header)
 */
function mega_mart_add_to_cart_count_fragment( $fragments ) {
	
    ob_start();
    $count = WC()->cart->cart_contents_count; 
    ?> 	
	<?php
    if ( $count > 0 ) {
	?>
		 <span class="cart-counts"><?php echo esc_html( $count ); ?></span>
	<?php 
	}
	else {
		?>
		<span class="cart-counts"><?php echo esc_html_e('0','mega-mart')?></span>
		<?php 
	}
    ?><?php
 
    $fragments['span.cart-counts'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'mega_mart_add_to_cart_count_fragment' );


function mega_mart_add_to_cart_total_fragment( $fragments ) {
	
    ob_start(); 
    ?> 	
	<span class="cart-label">
		<span><?php echo WC()->cart->get_cart_subtotal(); ?></span>
	</span>
   <?php
    $fragments['span.cart-label'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'mega_mart_add_to_cart_total_fragment' );
 
 
 
 
 
/**
 * Change number of upsells output
 */
add_filter( 'woocommerce_upsell_display_args', 'mega_mart_change_number_related_products', 20 );

function mega_mart_change_number_related_products( $args ) {
 
 $args['posts_per_page'] = 6;
 $args['columns'] = 3; //change number of upsells here
 return $args;
}


// Mega_Mart Cart Footer
if ( ! function_exists( 'mega_mart_cart_footer' ) ) :
function mega_mart_cart_footer() {
	$fly_cart_visibility 		= get_theme_mod('fly_cart_visibility','all');
	if(class_exists( 'woocommerce' )):
	?>
	<section id="pricing-bedge" class="footer-cart-wrapper <?php echo esc_attr($fly_cart_visibility); ?>">
		<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="big-price box-shadow-ripples cart">
			<?php 
				if ( class_exists( 'woocommerce' ) ) {
					
					$count = WC()->cart->cart_contents_count;
					$cart_url = wc_get_cart_url();
					
					if ( $count > 0 ) {
					?>
						 <span class="count"><?php echo esc_html( $count ); ?></span>
					<?php 
					}
					else {
						?>
						<span class="count"><?php echo esc_html_e('0','mega-mart')?></span>
						<?php 
					}
				}
			?>
			<div class="small-price"><i class="fa fa-cart-plus"></i></div>
		</a>
	</section>
	<?php
	endif;
}endif;

// add_action('wp_footer','mega_mart_cart_footer');
 
// Mega_Mart Cart Footer Bottom
if ( ! function_exists( 'mega_mart_cart_footer_mobile' ) ) :
function mega_mart_cart_footer_mobile() {	 
				if ( class_exists( 'woocommerce' ) ) {					
					$count = WC()->cart->cart_contents_count;
					
					if ( $count > 0 ) {					
						return '<span class="count count-badge">'. esc_html( $count ).'</span>';							
					}	else {								
						return '<span class="count count-badge">'.esc_html__('0','mega-mart').'</span>';				
					}
				}	
}endif;

// add_action('wp_footer','mega_mart_cart_footer_mobile');


// Mega_Mart Wishlist Footer Bottom
if ( ! function_exists( 'mega_mart_wishlist_footer_mobile' ) ) :
function mega_mart_wishlist_footer_mobile() {	 
				if ( class_exists( 'woocommerce' ) ) {
						if ( function_exists( 'mega_mart_woowishlist_get_list' ) ) {
							$count =  count(mega_mart_woowishlist_get_list());
							
							if ( $count > 0 ) {					
								return '<span class="count count-badge">'. esc_html( $count ).'</span>';							
							}	else {								
								return '<span class="count count-badge">'.esc_html__('0','mega-mart').'</span>';				
							}
						}
				}	
}endif;

// add_action('wp_footer','mega_mart_wishlist_footer_mobile');
 
function mega_mart_pro_footer_widget() {
	$footer_widget_layout	    = get_theme_mod('footer_widget_layout','4');
	if ($footer_widget_layout == '5') {
		$cols = 'col-lg';
	}elseif($footer_widget_layout == '4') {
		$cols = 'col-lg-3';
	} elseif ($footer_widget_layout == '3') {
		$cols = 'col-lg-4';
	} elseif ($footer_widget_layout == '2') {
		$cols = 'col-lg-6';
	} else {
		$cols = 'col-lg-12 widget-center';
	}
?>	
<?php if($footer_widget_layout !== 'disable') { ?>	
	<?php //if ( is_active_sidebar( 'footer-widget-area' ) ) { ?>
	  <?php if($footer_widget_layout !== '6' && $footer_widget_layout !== '7' && $footer_widget_layout !== '8' && $footer_widget_layout !== '9' && $footer_widget_layout !== '10' && $footer_widget_layout !== '11') {  ?>
			 <div class="row">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<div class="<?php echo esc_attr($cols); ?> mb-xl-0 mb-4">
					   <?php dynamic_sidebar( 'footer-1'); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<div class="<?php echo esc_attr($cols); ?> mb-xl-0 mb-4">
					   <?php dynamic_sidebar( 'footer-2'); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<div class="<?php echo esc_attr($cols); ?> mb-xl-0 mb-4">
						<?php dynamic_sidebar( 'footer-3'); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
					<div class="<?php echo esc_attr($cols); ?> mb-xl-0 mb-4">
						<?php dynamic_sidebar( 'footer-4'); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-5' ) ) : ?>
					<div class="<?php echo esc_attr($cols); ?> mb-xl-0 mb-4">
						<?php dynamic_sidebar( 'footer-5'); ?>
					</div>
				<?php endif; ?>
			 </div>	
	   <?php } ?>
		   
		   
	   <?php if($footer_widget_layout == '6') {  ?>
			 <div class="row">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<div class="col-lg-6 col-md-6 mb-xl-0 mb-4 pr-md-5">
					   <?php dynamic_sidebar( 'footer-1'); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<div class="col-lg-3 col-md-6 mb-xl-0 mb-4 pl-md-5">
					   <?php dynamic_sidebar( 'footer-2'); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<div class="col-lg-3 col-md-6 mb-xl-0 mb-4">
						<?php dynamic_sidebar( 'footer-3'); ?>
					</div>
				<?php endif; ?>
			</div>	
	   <?php } ?>
			   
			   
	   <?php if($footer_widget_layout == '7') {  ?>
			 <div class="row">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<div class="col-lg-3 col-md-6 mb-xl-0 mb-4">
					   <?php dynamic_sidebar( 'footer-1'); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<div class="col-lg-3 col-md-6 mb-xl-0 mb-4">
					   <?php dynamic_sidebar( 'footer-2'); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<div class="col-lg-6 col-md-6 mb-xl-0 mb-4">
						<?php dynamic_sidebar( 'footer-3'); ?>
					</div>
				<?php endif; ?>
			</div>	
	   <?php } ?>
			   
			   
	 <?php if($footer_widget_layout == '8') {  ?>
		 <div class="row">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="col-lg-12 widget-center mb-4">
				   <?php dynamic_sidebar( 'footer-1'); ?>
				</div>
			<?php endif; ?>
		</div>	
		 <div class="row">
			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<div class="col-lg-3 col-md-6 mb-xl-0 mb-4">
				   <?php dynamic_sidebar( 'footer-2'); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="col-lg-3 col-md-6 mb-xl-0 mb-4">
					<?php dynamic_sidebar( 'footer-3'); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
				<div class="col-lg-3 col-md-6 mb-xl-0 mb-4">
					<?php dynamic_sidebar( 'footer-4'); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-5' ) ) : ?>
				<div class="col-lg-3 col-md-6 mb-xl-0 mb-4">
					<?php dynamic_sidebar( 'footer-5'); ?>
				</div>
			<?php endif; ?>
		</div>	
   <?php } ?>
   
   
   
   <?php if($footer_widget_layout == '9') {  ?>
		 <div class="row">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="col-lg-12 widget-center mb-4">
				   <?php dynamic_sidebar( 'footer-1'); ?>
				</div>
			<?php endif; ?>
		</div>	
		 <div class="row">
			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<div class="col-lg-6 col-md-6 mb-xl-0 mb-4">
				   <?php dynamic_sidebar( 'footer-2'); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="col-lg-3 col-md-6 mb-xl-0 mb-4">
					<?php dynamic_sidebar( 'footer-3'); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
				<div class="col-lg-3 col-md-6 mb-xl-0 mb-4">
					<?php dynamic_sidebar( 'footer-4'); ?>
				</div>
			<?php endif; ?>
		</div>	
   <?php } ?>
   
   
   <?php if($footer_widget_layout == '10') {  ?>
		 <div class="row">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="col-lg-12 widget-center mb-4">
				   <?php dynamic_sidebar( 'footer-1'); ?>
				</div>
			<?php endif; ?>
		</div>	
		 <div class="row">
			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<div class="col-lg-3 col-md-6 mb-xl-0 mb-4">
				   <?php dynamic_sidebar( 'footer-2'); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="col-lg-3 col-md-6 mb-xl-0 mb-4">
					<?php dynamic_sidebar( 'footer-3'); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
				<div class="col-lg-6 col-md-6 mb-xl-0 mb-4">
					<?php dynamic_sidebar( 'footer-4'); ?>
				</div>
			<?php endif; ?>
		</div>	
   <?php } ?>
   
   <?php if($footer_widget_layout == '11') {  ?>
		 <div class="row">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="col-lg-6 col-md-6 col-12">
					<?php dynamic_sidebar( 'footer-1'); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<div class="col-lg-6 col-md-6 col-12">
					<?php dynamic_sidebar( 'footer-2'); ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="row">
			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="col-lg-4 col-md-6 col-12">
					<?php dynamic_sidebar( 'footer-3'); ?>
				</div>
			<?php endif; ?>	
			
			<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
				<div class="col-lg-4 col-md-6 col-12">
					<?php dynamic_sidebar( 'footer-4'); ?>
				</div>
			<?php endif; ?>	
			
			<?php if ( is_active_sidebar( 'footer-5' ) ) : ?>
				<div class="col-lg-4 col-md-6 col-12">
					<?php dynamic_sidebar( 'footer-5'); ?>
				</div>
			<?php endif; ?>	
		</div>
   <?php } ?>
<?php } 
}
add_action( 'mega_mart_pro_footer_widget', 'mega_mart_pro_footer_widget' ); 



/**
 * Change WP Default Logo and url
 */
function mega_mart_login_logo() { ?>
    <style type="text/css">
        #login h1 a, 
		.login h1 a {
            background-image: url( <?php echo esc_url( get_theme_mod( 'logo_upload',''.get_template_directory_uri().'/assets/images/logo_2.png' ) ); ?> );
			max-width: 170px;
			margin: 0 auto 0 auto;
			width: auto;
			background-size: 100%;
            box-shadow: none
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'mega_mart_login_logo' );

// Change logo url
function mega_mart_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'mega_mart_login_logo_url' );



/**
 * Mega_Mart Product Category
 */
 add_action('product_cat_add_form_fields', 'mega_mart_product_taxonomy_add_new_meta_field', 10, 1);
add_action('product_cat_edit_form_fields', 'mega_mart_product_taxonomy_edit_meta_field', 10, 1);
//Product Cat Create page
function mega_mart_product_taxonomy_add_new_meta_field() {
    ?>   
    <div class="form-field">
        <label for="mega_mart_product_cat_icon"><?php _e('Icon', 'mega-mart'); ?></label>
        <input type="text" name="mega_mart_product_cat_icon" id="mega_mart_product_cat_icon">
        <p class="description"><?php _e('Enter a meta title, <= 60 character', 'mega-mart'); ?></p>
    </div>
    <?php
}
//Product Cat Edit page
function mega_mart_product_taxonomy_edit_meta_field($term) {
    //getting term ID
    $term_id = $term->term_id;
    // retrieve the existing value(s) for this meta field.
    $mega_mart_product_cat_icon = get_term_meta($term_id, 'mega_mart_product_cat_icon', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="mega_mart_product_cat_icon"><?php _e('Icon', 'mega-mart'); ?></label></th>
        <td>
            <input type="text" name="mega_mart_product_cat_icon" id="mega_mart_product_cat_icon" value="<?php echo esc_attr($mega_mart_product_cat_icon) ? esc_attr($mega_mart_product_cat_icon) : ''; ?>">
        </td>
    </tr>
    <?php
}


add_action('edited_product_cat', 'mega_mart_save_taxonomy_product_meta', 10, 1);
add_action('create_product_cat', 'mega_mart_save_taxonomy_product_meta', 10, 1);
// Save extra taxonomy fields callback function.
function mega_mart_save_taxonomy_product_meta($term_id) {
    $mega_mart_product_cat_icon = filter_input(INPUT_POST, 'mega_mart_product_cat_icon');
    update_term_meta($term_id, 'mega_mart_product_cat_icon', $mega_mart_product_cat_icon);
}


//Displaying Additional Columns
add_filter( 'manage_edit-product_cat_columns', 'mega_mart_productFieldsListTitle' ); //Register Function
add_action( 'manage_product_cat_custom_column', 'mega_mart_productFieldsListDisplay' , 10, 3); //Populating the Columns
/**
 * Meta Title and Description column added to category admin screen.
 *
 * @param mixed $columns
 * @return array
 */
function mega_mart_productFieldsListTitle( $columns ) {
    $columns['mega_mart_product_cat_icon'] = __( 'Icon', 'mega-mart' );
    return $columns;
}
/**
 * Meta Title and Description column value added to product category admin screen.
 *
 * @param string $columns
 * @param string $column
 * @param int $id term ID
 *
 * @return string
 */
function mega_mart_productFieldsListDisplay( $columns, $column, $id ) {
    if ( 'mega_mart_product_cat_icon' == $column ) {
        $columns = esc_html( get_term_meta($id, 'mega_mart_product_cat_icon', true) );
    }
    return $columns;
}

/* ============
	Default data
============*/

/*
 *
 * Social Icon
 */
function mega_mart_get_social_icon_default() {
	return apply_filters(
		'mega_mart_get_social_icon_default', wp_json_encode(
				 array(
				array(
					'icon_value'	  =>  esc_html__( 'fa-facebook-f', 'mega-mart' ),
					'link'	  =>  esc_html__( '#', 'mega-mart' ),
					'newtab'	  =>  'yes',
					'nofollow'	  =>  'yes',
					'id'              => 'customizer_repeater_header_social_001',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-instagram', 'mega-mart' ),
					'link'	  =>  esc_html__( '#', 'mega-mart' ),
					'newtab'	  =>  'yes',
					'nofollow'	  =>  'yes',
					'id'              => 'customizer_repeater_header_social_002',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-twitter', 'mega-mart' ),
					'link'	  =>  esc_html__( '#', 'mega-mart' ),
					'newtab'	  =>  'yes',
					'nofollow'	  =>  'yes',
					'id'              => 'customizer_repeater_header_social_003',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-youtube', 'mega-mart' ),
					'link'	  =>  esc_html__( '#', 'mega-mart' ),
					'newtab'	  =>  'yes',
					'nofollow'	  =>  'yes',
					'id'              => 'customizer_repeater_header_social_004',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-linkedin', 'mega-mart' ),
					'link'	  =>  esc_html__( '#', 'mega-mart' ),
					'newtab'	  =>  'yes',
					'nofollow'	  =>  'yes',
					'id'              => 'customizer_repeater_header_social_005',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-skype', 'mega-mart' ),
					'link'	  =>  esc_html__( '#', 'mega-mart' ),
					'newtab'	  =>  'yes',
					'nofollow'	  =>  'yes',
					'id'              => 'customizer_repeater_header_social_006',
				)
			)
		)
	);
}

/* Above Header Custom */
if(! function_exists('mega_mart_above_header_first_content_default')) {
	function mega_mart_above_header_first_content_default() {
		return apply_filters(
		'mega_mart_above_header_first_content_default', wp_json_encode(
				 array(
					array(
						'icon_value'	  =>  esc_html__( 'fa-gift', 'mega-mart' ),
						'text'	  =>  esc_html__( 'BIG', 'mega-mart' ),
						'text2'	  =>  esc_html__( 'DEAL', 'mega-mart' ),
						'link'	  =>  esc_html__( '#', 'mega-mart' ),
						'id'              => 'customizer_repeater_abv_hdr_first_001',
					),
					array(
						'icon_value'	  =>  esc_html__( 'fa-percent', 'mega-mart' ),
						'text'	  =>  esc_html__( '', 'mega-mart' ),
						'text2'	  =>  esc_html__( 'OFFERS', 'mega-mart' ),
						'link'	  =>  esc_html__( '#', 'mega-mart' ),
						'id'              => 'customizer_repeater_abv_hdr_first_002',
					)				
				)
			)
		);
	}
}

/* Marquee */
if(! function_exists('hdr_mrq_content_default')) {
	function hdr_mrq_content_default() {
		return apply_filters(
		'hdr_mrq_content_default', wp_json_encode(
				 array(
					array(						
						'text'	  	=>  esc_html__( 'Up to 50% OFF on selected products', 'mega-mart' ),
						'link'	  	=>  esc_html__( '#', 'mega-mart' ),
						'newtab'  	=>  esc_html__( '', 'mega-mart' ),
						'nofollow'  =>  esc_html__( '', 'mega-mart' ),
						'id'        => 'customizer_repeater_hdr_mrq_001',
					),
					array(						
						'text'	  	=>  esc_html__( 'Buy 1 Get Free on top brands', 'mega-mart' ),
						'link'	  	=>  esc_html__( '#', 'mega-mart' ),
						'newtab'  	=>  esc_html__( '', 'mega-mart' ),
						'nofollow'  =>  esc_html__( '', 'mega-mart' ),
						'id'        => 'customizer_repeater_hdr_mrq_002',
					),
					array(						
						'text'	  	=>  esc_html__( 'Exclusive Online Discounts - Shop from home & save more!', 'mega-mart' ),
						'link'	  	=>  esc_html__( '#', 'mega-mart' ),
						'newtab'  	=>  esc_html__( '', 'mega-mart' ),
						'nofollow'  =>  esc_html__( '', 'mega-mart' ),
						'id'        => 'customizer_repeater_hdr_mrq_003',
					),
					array(						
						'text'	  	=>  esc_html__( 'Limited Time Offer - Hurry, while stocks last', 'mega-mart' ),
						'link'	  	=>  esc_html__( '#', 'mega-mart' ),
						'newtab'  	=>  esc_html__( '', 'mega-mart' ),
						'nofollow'  =>  esc_html__( '', 'mega-mart' ),
						'id'        => 'customizer_repeater_hdr_mrq_004',
					),
					array(						
						'text'	  	=>  esc_html__( 'Buy 1 Get Free on top brands', 'mega-mart' ),
						'link'	  	=>  esc_html__( '#', 'mega-mart' ),
						'newtab'  	=>  esc_html__( '', 'mega-mart' ),
						'nofollow'  =>  esc_html__( '', 'mega-mart' ),
						'id'        => 'customizer_repeater_hdr_mrq_005',
					),
					array(						
						'text'	  	=>  esc_html__( 'Buy 2 Get 4 Free on Exclusive brands', 'mega-mart' ),
						'link'	  	=>  esc_html__( '#', 'mega-mart' ),
						'newtab'  	=>  esc_html__( '', 'mega-mart' ),
						'nofollow'  =>  esc_html__( '', 'mega-mart' ),
						'id'        => 'customizer_repeater_hdr_mrq_005',
					),
									
				)
			)
		);
	}
}


/* Info Default */
if(! function_exists('mega_mart_get_info_default')) {
	function mega_mart_get_info_default() {
		return apply_filters(
		'mega_mart_get_info_default', wp_json_encode(
				 array(
					array(						
						'icon_value'	=>  esc_html__( 'fa-shopping-cart', 'mega-mart' ),
						'title'	  		=>  esc_html__( '100% Secure Payments', 'mega-mart' ),
						'subtitle'  	=>  esc_html__( '100% Payment Protection', 'mega-mart' ),
						'id'        	=> 'customizer_repeater_info_001',
					),
					array(						
						'icon_value'	=>  esc_html__( 'fa-headphones', 'mega-mart' ),
						'title'	  		=>  esc_html__( '24/7 Support', 'mega-mart' ),
						'subtitle'  	=>  esc_html__( 'Online Feedback 24/7', 'mega-mart' ),
						'id'        	=> 'customizer_repeater_info_002',
					),
					array(						
						'icon_value'	=>  esc_html__( 'fa-money-bill', 'mega-mart' ),
						'title'	  		=>  esc_html__( 'Trust Pay', 'mega-mart' ),
						'subtitle'  	=>  esc_html__( 'Easy Return Policy', 'mega-mart' ),
						'id'        	=> 'customizer_repeater_info_003',
					),
					array(						
						'icon_value'	=>  esc_html__( 'fa-truck', 'mega-mart' ),
						'title'	  		=>  esc_html__( 'Return & Refund', 'mega-mart' ),
						'subtitle'  	=>  esc_html__( '100% Money Back Guarantee', 'mega-mart' ),
						'id'        	=> 'customizer_repeater_info_004',
					),		
				)
			)
		);
	}
}

/* Deal One Products */
if(! function_exists('deal_one_product_content_default')) {
	function deal_one_product_content_default() {
		return apply_filters(
		'deal_one_product_content_default', wp_json_encode(
				 array(
					array(
						'title'	  		=>  esc_html__( '40% OFF', 'mega-mart' ),
						'subtitle'  	=>  esc_html__( 'Weekly Special Offer On Vegetables', 'mega-mart' ),
						'image_url' => esc_url(get_template_directory_uri(). '/assets/images/products/deal/one/img1.jpg'),
						'button_text'  	=>  esc_html__( 'View Product', 'mega-mart' ),
						'button_link' => esc_url('#'),
						'newtab' => 'yes',
						'nofollow' => 'yes',
						'id'        	=> 'customizer_repeater_deal_one_product_001',
					),
					array(
						'title'	  		=>  esc_html__( '50% OFF', 'mega-mart' ),
						'subtitle'  	=>  esc_html__( 'Monthly Special Offer On Vegetables', 'mega-mart' ),
						'image_url' => esc_url(get_template_directory_uri(). '/assets/images/products/deal/one/img2.jpg'),
						'button_text'  	=>  esc_html__( 'View Product', 'mega-mart' ),
						'button_link' => esc_url('#'),
						'newtab' => 'yes',
						'nofollow' => 'yes',
						'id'        	=> 'customizer_repeater_deal_one_product_002',
					),
					array(
						'title'	  		=>  esc_html__( '20% OFF', 'mega-mart' ),
						'subtitle'  	=>  esc_html__( 'Today Special Offer On Vegetables', 'mega-mart' ),
						'image_url' => esc_url(get_template_directory_uri(). '/assets/images/products/deal/one/img3.jpg'),
						'button_text'  	=>  esc_html__( 'View Product', 'mega-mart' ),
						'button_link' => esc_url('#'),
						'newtab' => 'yes',
						'nofollow' => 'yes',
						'id'        	=> 'customizer_repeater_deal_one_product_003',
					),	
				)
			)
		);
	}
}

/* Deal Two Product Slider */
if(! function_exists('deal_two_product_slider_default')) {
	function deal_two_product_slider_default() {
		return apply_filters(
		'deal_two_product_slider_default', wp_json_encode(
				 array(
					array(
						'title'	  				=>  esc_html__( 'Fresh & Organic', 'mega-mart' ),
						'subtitle'  			=>  esc_html__( 'Healthy', 'mega-mart' ),
						'subtitle2'  			=>  esc_html__( 'Vegetables', 'mega-mart' ),
						'image_url' 		=> esc_url(get_template_directory_uri(). '/assets/images/banner/bannerinfo/img1.png'),
						'text'  					=>  esc_html__( 'Free Delivery', 'mega-mart' ),
						'text2'  				=>  esc_html__( '70 975 975 70', 'mega-mart' ),
						'icon_value'  		=>  esc_html__( 'fa-phone', 'mega-mart' ),
						'id'        				=> 'customizer_repeater_deal_two_product_slider_001',
					),
					array(
						'title'	  				=>  esc_html__( 'Dairy & Bakery', 'mega-mart' ),
						'subtitle'  			=>  esc_html__( 'Healthy', 'mega-mart' ),
						'subtitle2'  			=>  esc_html__( 'Breakfast', 'mega-mart' ),
						'image_url' 		=> esc_url(get_template_directory_uri(). '/assets/images/banner/bannerinfo/img2.png'),
						'text'  					=>  esc_html__( 'Free Delivery', 'mega-mart' ),
						'text2'  				=>  esc_html__( '70 975 975 70', 'mega-mart' ),
						'icon_value'  		=>  esc_html__( 'fa-phone', 'mega-mart' ),
						'id'        				=> 'customizer_repeater_deal_two_product_slider_002',
					),
				)
			)
		);
	}
}

/* Deal Two Products */
if(! function_exists('deal_two_product_content_default')) {
	function deal_two_product_content_default() {
		return apply_filters(
		'deal_two_product_content_default', wp_json_encode(
				 array(
					array(
						'title'	  				=>  esc_html__( 'Breakfast', 'mega-mart' ),
						'subtitle'  			=>  esc_html__( 'Discover All Your Favorite Brands in One Place', 'mega-mart' ),						
						'image_url' 		=> esc_url(get_template_directory_uri(). '/assets/images/banner/bannerinfo/img3.jpg'),
						'button_text'  		=>  esc_html__( 'Shop Now', 'mega-mart' ),
						'button_link'  		=>  esc_url('#'),
						'newtab'  				=>  'yes',
						'nofollow'  			=>  'yes',
						'id'        				=> 'customizer_repeater_deal_two_product_001',
					),
					array(
						'title'	  				=>  esc_html__( 'Vegetables', 'mega-mart' ),
						'subtitle'  			=>  esc_html__( 'Discover All Your Favorite Brands in One Place', 'mega-mart' ),						
						'image_url' 		=> esc_url(get_template_directory_uri(). '/assets/images/banner/bannerinfo/img4.jpg'),
						'button_text'  		=>  esc_html__( 'Shop Now', 'mega-mart' ),
						'button_link'  		=>  esc_url('#'),
						'newtab'  				=>  'yes',
						'nofollow'  			=>  'yes',
						'id'        				=> 'customizer_repeater_deal_two_product_002',
					),
					array(
						'title'	  				=>  esc_html__( 'Prepared', 'mega-mart' ),
						'subtitle'  			=>  esc_html__( 'Discover All Your Favorite Brands in One Place', 'mega-mart' ),						
						'image_url' 		=> esc_url(get_template_directory_uri(). '/assets/images/banner/bannerinfo/img2.jpg'),
						'button_text'  		=>  esc_html__( 'Shop Now', 'mega-mart' ),
						'button_link'  		=>  esc_url('#'),
						'newtab'  				=>  'yes',
						'nofollow'  			=>  'yes',
						'id'        				=> 'customizer_repeater_deal_two_product_003',
					),
				)
			)
		);
	}
}

/* Brands default */
if(! function_exists('mega_mart_get_brand_default')) {
	function mega_mart_get_brand_default() {
		return apply_filters(
		'mega_mart_get_brand_default', wp_json_encode(
				 array(
					array(												
						'title' 		=> esc_html__('Brand-1','mega-mart'),
						'image_url' 		=> esc_url(get_template_directory_uri(). '/assets/images/brand/brand-1.png'),
						'link'  					=>  '',
						'newtab'  				=>  'yes',
						'nofollow'  			=>  'yes',
						'id'        				=> 'customizer_repeater_brand_001',
					),
					array(
						'title' 		=> esc_html__('Brand-2','mega-mart'),
						'image_url' 		=> esc_url(get_template_directory_uri(). '/assets/images/brand/brand-2.png'),
						'link'  					=>  '',
						'newtab'  				=>  'yes',
						'nofollow'  			=>  'yes',
						'id'        				=> 'customizer_repeater_brand_002',
					),
					array(
						'title' 		=> esc_html__('Brand-3','mega-mart'),
						'image_url' 		=> esc_url(get_template_directory_uri(). '/assets/images/brand/brand-3.png'),
						'link'  					=>  '',
						'newtab'  				=>  'yes',
						'nofollow'  			=>  'yes',
						'id'        				=> 'customizer_repeater_brand_003',
					),
					array(
						'title' 		=> esc_html__('Brand-4','mega-mart'),
						'image_url' 		=> esc_url(get_template_directory_uri(). '/assets/images/brand/brand-4.png'),
						'link'  					=>  '',
						'newtab'  				=>  'yes',
						'nofollow'  			=>  'yes',
						'id'        				=> 'customizer_repeater_brand_004',
					),
					array(
						'title' 		=> esc_html__('Brand-5','mega-mart'),
						'image_url' 		=> esc_url(get_template_directory_uri(). '/assets/images/brand/brand-5.png'),
						'link'  					=>  '',
						'newtab'  				=>  'yes',
						'nofollow'  			=>  'yes',
						'id'        				=> 'customizer_repeater_brand_005',
					),
					array(
						'title' 		=> esc_html__('Brand-6','mega-mart'),
						'image_url' 		=> esc_url(get_template_directory_uri(). '/assets/images/brand/brand-6.png'),
						'link'  					=>  '',
						'newtab'  				=>  'yes',
						'nofollow'  			=>  'yes',
						'id'        				=> 'customizer_repeater_brand_006',
					),
				)
			)
		);
	}
}

/* Footer Info Default */
if(! function_exists('footer_info_content_default')) {
	function footer_info_content_default() {
		return apply_filters(
		'footer_info_content_default', wp_json_encode(
				 array(
					array(						
						'icon_value'		=>  esc_html__( 'fa-truck', 'mega-mart' ),
						'title'	  				=>  esc_html__( 'Free Shipping', 'mega-mart' ),
						'subtitle'  			=>  esc_html__( 'Orders $50 or More', 'mega-mart' ),
						'link'	  				=>  '',
						'newtab'	  			=>  'yes',
						'nofollow'  			=>  'yes',
						'id'        				=> 'customizer_repeater_footer_info_001',
					),
					array(						
						'icon_value'		=>  esc_html__( 'fa-usd', 'mega-mart' ),
						'title'	  				=>  esc_html__( '100% Return Policy', 'mega-mart' ),
						'subtitle'  			=>  esc_html__( 'Any Time Return Product', 'mega-mart' ),
						'link'	  				=>  '',
						'newtab'	  			=>  'yes',
						'nofollow'  			=>  'yes',
						'id'        				=> 'customizer_repeater_footer_info_002',
					),
					array(						
						'icon_value'		=>  esc_html__( 'fa-user', 'mega-mart' ),
						'title'	  				=>  esc_html__( 'Best Deal Offer', 'mega-mart' ),
						'subtitle'  			=>  esc_html__( 'Grab & Go', 'mega-mart' ),
						'link'	  				=>  '',
						'newtab'	  			=>  'yes',
						'nofollow'  			=>  'yes',
						'subtitle'  			=>  esc_html__( 'Grab and go', 'mega-mart' ),
						'id'        				=> 'customizer_repeater_footer_info_003',
					),
					array(						
						'icon_value'		=>  esc_html__( 'fa-thumbs-up', 'mega-mart' ),
						'title'	  				=>  esc_html__( 'Support 24/7', 'mega-mart' ),
						'subtitle'  			=>  esc_html__( 'Contact Us 24 hours', 'mega-mart' ),
						'link'	  				=>  '',
						'newtab'	  			=>  'yes',
						'nofollow'  			=>  'yes',
						'id'        				=> 'customizer_repeater_footer_info_004',
						'id'        				=> 'customizer_repeater_footer_info_004',
					),		
				)
			)
		);
	}
}

/*
 *
 * Payment Icon
 */
 if(! function_exists('mega_mart_get_payment_icon_default')) {
	function mega_mart_get_payment_icon_default() {
		return apply_filters(
			'mega_mart_get_payment_icon_default', wp_json_encode(
					 array(
					array(
						'icon_value'	  	=>  esc_html__( 'fa-cc-visa', 'mega-mart' ),
						'link'	  				=>  esc_html__( '#', 'mega-mart' ),
						'newtab'	  			=>  'yes',
						'nofollow'	  		=>  'yes',
						'id'              			=> 'customizer_repeater_footer_payment_001',
					),
					array(
						'icon_value'	  	=>  esc_html__( 'fa-cc-paypal', 'mega-mart' ),
						'link'	  				=>  esc_html__( '#', 'mega-mart' ),
						'newtab'	  			=>  'yes',
						'nofollow'	  		=>  'yes',
						'id'              			=> 'customizer_repeater_footer_payment_002',
					),
					array(
						'icon_value'	 	 =>  esc_html__( 'fa-cc-mastercard', 'mega-mart' ),
						'link'	  				=>  esc_html__( '#', 'mega-mart' ),
						'newtab'	  			=>  'yes',
						'nofollow'	 		=>  'yes',
						'id'              			=> 'customizer_repeater_footer_payment_003',
					),
					array(
						'icon_value'	  	=>  esc_html__( 'fa-cc-amex', 'mega-mart' ),
						'link'	  				=>  esc_html__( '#', 'mega-mart' ),
						'newtab'	  			=>  'yes',
						'nofollow'	  		=>  'yes',
						'id'              			=> 'customizer_repeater_footer_payment_004',
					),
					array(
						'icon_value'	  	=>  esc_html__( 'fa-cc-jcb', 'mega-mart' ),
						'link'	 				=>  esc_html__( '#', 'mega-mart' ),
						'newtab'	  			=>  'yes',
						'nofollow'	 		=>  'yes',
						'id'              			=> 'customizer_repeater_footer_payment_005',
					),
					array(
						'icon_value'	 	=>  esc_html__( 'fa-cc-amazon-pay', 'mega-mart' ),
						'link'	  				=>  esc_html__( '#', 'mega-mart' ),
						'newtab'	 			=>  'yes',
						'nofollow'	  		=>  'yes',
						'id'              			=> 'customizer_repeater_footer_payment_006',
					)
				)
			)
		);
	}
 }
 
 
 /**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function pet_bazaar_widgets_init() {	
	register_sidebar( array(
		'name' => __( 'Header Widget Area First', 'mega-mart' ),
		'id' => 'mega-mart-header-above-first',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>'
	) );
		
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'mega-mart' ),
		'id' => 'mega-mart-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'mega-mart' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title"><span></span>',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area 1', 'mega-mart' ),
		'id' => 'mega-mart-footer-widget',
		'description' => __( 'Footer Widget', 'mega-mart' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area 2', 'mega-mart' ),
		'id' => 'mega-mart-footer-widget-2',
		'description' => __( 'Footer Widget', 'mega-mart' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area 3', 'mega-mart' ),
		'id' => 'mega-mart-footer-widget-3',
		'description' => __( 'Footer Widget', 'mega-mart' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area 4', 'mega-mart' ),
		'id' => 'mega-mart-footer-widget-4',
		'description' => __( 'Footer Widget', 'mega-mart' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'WooCommerce Widget Area', 'mega-mart' ),
		'id' => 'mega-mart-woocommerce-sidebar',
		'description' => __( 'This Widget area for WooCommerce Widget', 'mega-mart' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'widgets_init', 'pet_bazaar_widgets_init' );


/**
 * Get registered sidebar name by sidebar ID.
 *
 * @since  1.0.0
 * @param  string $sidebar_id Sidebar ID.
 * @return string Sidebar name.
 */
function mega_mart_lite_get_sidebar_name_by_id( $sidebar_id = '' ) {

	if ( ! $sidebar_id ) {
		return;
	}

	global $wp_registered_sidebars;
	$sidebar_name = '';

	if ( isset( $wp_registered_sidebars[ $sidebar_id ] ) ) {
		$sidebar_name = $wp_registered_sidebars[ $sidebar_id ]['name'];
	}

	return $sidebar_name;
}

/**
 * This Function Check whether Sidebar active or Not
 */
if(!function_exists( 'mega_mart_blog_column_layout' )) :
function mega_mart_blog_column_layout(){
	if(is_active_sidebar('mega-mart-sidebar-primary'))
		{ echo 'col-lg-8'; } 
	else 
		{ echo 'col-lg-12'; }  
} endif;


/**
 * This Function Check whether Sidebar active or Not
 */
if(!function_exists( 'mega_mart_post_column' )) :
function mega_mart_post_column(){
	if(is_active_sidebar('mega-mart-sidebar-primary'))
		{ echo 'col-md-6'; } 
	else 
		{ echo 'col-lg-4 col-md-6 '; }  
} endif;



function mega_mart_breadcrumbs() {
	
	$showOnHome	= esc_html__('1','mega-mart'); 	// 1 - Show breadcrumbs on the homepage, 0 - don't show
	$delimiter 	= '';   // Delimiter between breadcrumb
	$home 		= esc_html__('Home','mega-mart'); 	// Text for the 'Home' link
	$showCurrent= esc_html__('1','mega-mart'); // Current post/page title in breadcrumb in use 1, Use 0 for don't show
	$before		= '<li class="active">'; // Tag before the current Breadcrumb
	$after 		= '</li>'; // Tag after the current Breadcrumb
	// $breadcrumb_seprator	= get_theme_mod('breadcrumb_seprator','fa-chevron-right');
	global $post;
	$homeLink = home_url();

	if (is_home() || is_front_page()) {
 
	if ($showOnHome == 1) echo '<li><a href="' . esc_url($homeLink) . '">  ' . esc_html($home) . '</a></li>';
 
	} else {
 
    echo '<li><a href="' . esc_url($homeLink) . '">  ' . esc_html($home) . '</a> ' . '&nbsp<i class="fa fa-chevron-right"></i>&nbsp';
 
    if ( is_category() ) 
	{
		$thisCat = get_category(get_query_var('cat'), false);
		if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . ' ');
		echo $before . esc_html__('Archive by category','mega-mart').' "' . esc_html(single_cat_title('', false)) . '"' .$after;
		
	} 
	
	elseif ( is_search() ) 
	{
		echo $before . esc_html__('Search results for ','mega-mart').' "' . esc_html(get_search_query()) . '"' . $after;
	} 
	
	elseif ( is_day() )
	{
		echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ' . '&nbsp<i class="fa fa-chevron-right"></i>&nbsp';
		echo '<a href="' . esc_url(get_month_link(get_the_time('Y'),get_the_time('m'))) . '">' . esc_html(get_the_time('F')) . '</a> '. '&nbsp<i class="fa fa-chevron-right"></i>&nbsp';
		echo $before . esc_html(get_the_time('d')) . $after;
	} 
	
	elseif ( is_month() )
	{
		echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ' . esc_attr($delimiter) . '&nbsp<i class="fa fa-chevron-right"></i>&nbsp';
		echo $before . esc_html(get_the_time('F')) . $after;
	} 
	
	elseif ( is_year() )
	{
		echo $before . esc_html(get_the_time('Y')) . $after;
	} 
	
	elseif ( is_single() && !is_attachment() )
	{
		if ( get_post_type() != 'post' )
		{
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<a href="' . esc_url($homeLink) . '/' . $slug['slug'] . '/">  ' . $post_type->labels->singular_name . '</a>';
			if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . '&nbsp<i class="fa fa-chevron-right"></i>&nbsp' . $before . wp_kses_post(get_the_title()) . $after;
		}
		else
		{
			$cat = get_the_category(); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, ' ' . esc_attr($delimiter) . '&nbsp<i class="fa fa-chevron-right"></i>&nbsp');
			if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
			echo $cats;
			if ($showCurrent == 1) echo $before . esc_html(get_the_title()) . $after;
		}
 
    }
		
	elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_shop() ) {
				$thisshop = woocommerce_page_title();
			}
			if ( is_product_category() ) {
				$term = get_queried_object(); 
				if ( $term && ! is_wp_error( $term ) ) {
					echo $term->name;
				}
			}
		}	
		else  {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		}	
	} 
	
	elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) 
	{
		$post_type = get_post_type_object(get_post_type());
		echo $before . $post_type->labels->singular_name . $after;
	} 
	
	elseif ( is_attachment() ) 
	{
		$parent = get_post($post->post_parent);
		$cat = get_the_category($parent->ID); 
		if(!empty($cat)){
		$cat = $cat[0];
		echo get_category_parents($cat, TRUE, ' ' . esc_attr($delimiter) . '&nbsp <i class="fa fa-chevron-right"></i> &nbsp');
		}
		echo '<a href="' . esc_url(get_permalink($parent)) . '">' . $parent->post_title . '</a>';
		if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . ' ' . $before . esc_html(get_the_title()) . $after;
 
    } 
	
	elseif ( is_page() && !$post->post_parent ) 
	{
		if ($showCurrent == 1) echo $before . esc_html(get_the_title()) . $after;
	} 
	
	elseif ( is_page() && $post->post_parent ) 
	{
		$parent_id  = $post->post_parent;
		$breadcrumbs = array();
		while ($parent_id) 
		{
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html(get_the_title($page->ID)) . '</a>' . '&nbsp <i class="fa fa-chevron-right"></i> &nbsp';
			$parent_id  = $page->post_parent;
		}
		
		$breadcrumbs = array_reverse($breadcrumbs);
		for ($i = 0; $i < count($breadcrumbs); $i++) 
		{
			echo $breadcrumbs[$i];
			if ($i != count($breadcrumbs)-1) echo ' ' . esc_attr($delimiter) . '&nbsp <i class="fa fa-chevron-right"></i> &nbsp';
		}
		if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . ' ' . $before . esc_html(get_the_title()) . $after;
 
    } 
	elseif ( is_tag() ) 
	{
		echo $before . esc_html__('Posts tagged ','mega-mart').' "' . esc_html(single_tag_title('', false)) . '"' . $after;
	} 
	
	elseif ( is_author() ) {
		global $author;
		$userdata = get_userdata($author);
		echo $before . esc_html__('Articles posted by ','mega-mart').'' . $userdata->display_name . $after;
	} 
	
	elseif ( is_404() ) {
		echo $before . esc_html__('Error 404 ','mega-mart'). $after;
    }
	
    if ( get_query_var('paged') ) {
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
		echo ' ( ' . esc_html__('Page','mega-mart') . '' . esc_html(get_query_var('paged')). ' )';
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
    }
 
    echo '</li>';
 
  }
}