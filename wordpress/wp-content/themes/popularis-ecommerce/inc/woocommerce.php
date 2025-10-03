<?php

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'popularis_ecommerce_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'popularis_ecommerce_wrapper_end', 10 );

function popularis_ecommerce_wrapper_start() {
	?>
	<div class="row">
		<article class="article-content col-md-<?php popularis_ecommerce_main_content_width_columns(); ?>">
	<?php
}
function popularis_ecommerce_wrapper_end() {
			?>
		</article>       
	<?php get_sidebar( 'sidebar-1' ); ?>
	</div>
	<?php
}

if (!function_exists('popularis_ecommerce_cart_link')) {

    function popularis_ecommerce_cart_link() {
        ?>	
        <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'popularis-ecommerce'); ?>">
            <i class="fa fa-shopping-bag"><span class="count"><?php echo wp_kses_data(WC()->cart->get_cart_contents_count()); ?></span></i>
            <div class="amount-cart"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></div> 
        </a>
        <?php
    }

}

if (!function_exists('popularis_ecommerce_header_cart')) {

    function popularis_ecommerce_header_cart() {
        if (get_theme_mod('woo_header_cart', 1) == 1) {
            ?>
            <div class="header-cart float-cart">
                <div class="header-cart-block">
                    <div class="header-cart-inner">
                        <?php popularis_ecommerce_cart_link(); ?>
                        <ul class="site-header-cart menu list-unstyled text-center">
                            <li>
                                <?php the_widget('WC_Widget_Cart', 'title='); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
        }
    }

}

if (!function_exists('popularis_ecommerce_my_account')) {

    function popularis_ecommerce_my_account() {
        if (get_theme_mod('woo_account', 1) == 1) {
            ?>
            <div class="header-my-account float-login">
                <div class="header-login"> 
                    <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" title="<?php esc_attr_e('My Account', 'popularis-ecommerce'); ?>">
                        <i class="fa fa-user-circle-o"></i>
                    </a>
                </div>
            </div>
            <?php
        }
    }

}

if (!function_exists('popularis_ecommerce_header_add_to_cart_fragment')) {
    add_filter('woocommerce_add_to_cart_fragments', 'popularis_ecommerce_header_add_to_cart_fragment');

    function popularis_ecommerce_header_add_to_cart_fragment($fragments) {
        ob_start();

        popularis_ecommerce_cart_link();

        $fragments['a.cart-contents'] = ob_get_clean();

        return $fragments;
    }

}

function popularis_ecommerce_wc_cart_fragments() { 
	wp_enqueue_script( 'wc-cart-fragments' ); 
}
add_action( 'wp_enqueue_scripts', 'popularis_ecommerce_wc_cart_fragments' );
