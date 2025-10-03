<?php
if ( ! function_exists( 'mega_mart_setup' ) ) :
function mega_mart_setup() {

/**
 * Define Theme Version
 */
define( 'MEGA_MART_THEME_VERSION', '0.5' );

// Root path/URI.
define( 'MEGA_MART_PARENT_DIR', get_template_directory() );
define( 'MEGA_MART_PARENT_URI', get_template_directory_uri() );

// Root path/URI.
define( 'MEGA_MART_PARENT_INC_DIR', MEGA_MART_PARENT_DIR . '/inc');
define( 'MEGA_MART_PARENT_INC_URI', MEGA_MART_PARENT_URI . '/inc');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-header' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'mega-mart' );
		
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary_menu' => esc_html__( 'Primary Menu', 'mega-mart' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'mega-mart' ),
	) );

	/*
		* Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	
	add_theme_support('custom-logo');
	
	/*
	 * WooCommerce Plugin Support
	 */
	add_theme_support( 'woocommerce' );
	
	// Gutenberg wide images.
	add_theme_support( 'align-wide' );
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', mega_mart_google_font() ) );
	
	//Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mega_mart_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'mega_mart_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mega_mart_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mega_mart_content_width', 1170 );
}
add_action( 'after_setup_theme', 'mega_mart_content_width', 0 );


/**
 * All Styles & Scripts.
 */
require_once get_template_directory() . '/inc/enqueue.php';

/**
 * Nav Walker fo Bootstrap Dropdown Menu.
 */

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';


/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Pagination for this theme.
 */
require_once get_template_directory() . '/inc/pagination/pagination.php';

/**
 * Dynamic Style
 */
require_once get_template_directory() . '/inc/dynamic_style.php';

/**
 * Custom functions that act independently of the theme templates.
 */
 require_once get_template_directory() . '/inc/extras.php';
require_once get_template_directory() . '/inc/getting-start.php';

/**
 * Customizer additions.
 */
 require_once get_template_directory() . '/inc/mega-mart-customizer.php';
 require get_template_directory() . '/inc/customizer/customizer-repeater/functions.php';
 
/**
 * Frontpage
 */
 require_once get_template_directory() . '/template-parts/sections/section-blog.php'; 


/* Data Migration From Lite Chilren to Lite Parent */
function mega_mart_child_theme_changes() {
    $changed_theme_slug = '';
    $diff = [];

    if (wp_get_theme()->name == 'Mega Mart') {
        $parent_theme_mods = get_option('theme_mods_mega-mart');
        if (!is_array($parent_theme_mods)) {
            $parent_theme_mods = [];
        }

        $parent_theme_mods = sanitize_theme_mod_values($parent_theme_mods);

        $themes = wp_get_themes();

        foreach ($themes as $theme) {
            $template = $theme->get('Template');

            if (!empty($template) && $template == 'mega-mart') {
                $child_slug = strtolower($theme->get('Name'));
                $hasSpace = preg_match('/\s/', $child_slug);

                if ($hasSpace) {
                    $child_theme_slug = str_replace(' ', '-', $child_slug);
                } else {
                    $child_theme_slug = $child_slug;
                }

                $child_theme_mods = get_option('theme_mods_' . $child_theme_slug);

                if (!is_array($child_theme_mods)) {
                    $child_theme_mods = [];
                }

                $child_theme_mods = sanitize_theme_mod_values($child_theme_mods);

                // Compare individual theme mods
                $diff = array_diff_assoc($child_theme_mods, $parent_theme_mods);

                if (!empty($diff)) {
                    $changed_theme_slug = $child_theme_slug;
                    break;
                }
            }
        }

        if (!empty($changed_theme_slug)) {
            // Apply changes for the changed child theme
            $child_mods = get_option('theme_mods_' . $changed_theme_slug);

            if (is_array($child_mods)) {
                foreach ($child_mods as $child_mod_k => $child_mod_v) {
                    if (is_array($child_mod_v) || is_object($child_mod_v)) {
                        continue; 
                    }

                   set_theme_mod($child_mod_k, $child_mod_v);
                }
            }
        }
    }
}

function sanitize_theme_mod_values($theme_mods) {
    $sanitized_mods = [];

    foreach ($theme_mods as $key => $value) {
        if (is_array($value) || is_object($value)) {
            $sanitized_mods[$key] = '';
        } else {
            $sanitized_mods[$key] = $value;
        }
    }

    return $sanitized_mods;
}

add_action('after_switch_theme', 'mega_mart_child_theme_changes');

/* End Data Migration */


if( class_exists('woocommerce')):

/* =========================================
	Simple Product Custom Add To Cart Button
	========================================*/
 function custom_loop_add_to_cart_link( $button, $product ) {
    if ( $product && $product->is_type( 'simple' ) ) {
        $button = sprintf(
            '<a href="%s" data-quantity="%s" class="%s" %s><span>%s</span> <i class="fa fa-shopping-cart"></i></a>',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( isset( $quantity ) ? $quantity : 1 ),
            esc_attr( implode( ' ', array_filter( array( 'button', 'product_type_simple', 'add_to_cart_button', 'ajax_add_to_cart' ) ) ) ),
            wc_implode_html_attributes( array(
                'data-product_id'  => $product->get_id(),
                'data-product_sku' => $product->get_sku(),
                'aria-label'       => $product->add_to_cart_description(),
                'rel'              => 'nofollow',
            ) ),
            esc_html( $product->add_to_cart_text() )
        );
    }

    return $button;
}  


/* ==============================================
	Single Page Product Custom Add To Cart Button
	============================================*/
add_action('wp', 'replace_single_product_add_to_cart');

function replace_single_product_add_to_cart() {
    if (is_product()) {
		global $post;
		$product = wc_get_product( $post->ID );
        if ( $product && $product->is_type( 'simple' ) ) {
			remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
			add_action('woocommerce_single_product_summary', 'custom_single_product_add_to_cart_button', 30);
		}
    }
}

function custom_single_product_add_to_cart_button() {
    global $product;
    if ($product->is_type('simple')) {
        $url = '?add-to-cart=' . $product->get_id();
        echo '<a href="' . esc_url($url) . '" data-quantity="'.$product->get_id().'" class="button single_add_to_cart_button alt"> Add To Cart <i class="fa fa-shopping-cart"></i></a>';		
    }
}

/* ====================================================
	Variation Product Form + Custom Add To Cart Button
	==================================================*/
function custom_variable_add_to_cart_archive($button, $product) {
    if ($product->is_type('variable') ) {

        $available_variations = $product->get_available_variations();
        $attributes = $product->get_variation_attributes();

        ob_start();

        echo '<form class="variations_form cart" action="' . esc_url(get_permalink($product->get_id())) . '" method="post">';
        echo '<table class="variations">';

        foreach ($attributes as $attribute_name => $options) {
            echo '<tr><td class="label"><label for="' . esc_attr($attribute_name) . '">' . wc_attribute_label($attribute_name) . '</label></td>';
            echo '<td class="value">';
            wc_dropdown_variation_attribute_options(array(
                'options'   => $options,
                'attribute' => $attribute_name,
                'product'   => $product,
            ));
            echo '</td></tr>';
        }

        echo '</table>';

        echo '<div class="single_variation_wrap">';
        echo '<input type="hidden" name="add-to-cart" value="' . esc_attr($product->get_id()) . '" />';

        // Here’s your desired markup mimicked as a styled button
        echo '<button type="submit" class="button add_to_cart_button ajax_add_to_cart custom-variable-btn">';
        echo '<span>Add to Cart</span> <i class="fa fa-shopping-cart"></i>';
        echo '</button>';

        echo '</div>';
        echo '</form>';

        return ob_get_clean();
    }

    return $button;
}

/* =========================================
	Grouped or External Link Product Button
	========================================*/
add_action( 'woocommerce_after_shop_loop_item', 'custom_replace_add_to_cart_button', 1 );

function custom_replace_add_to_cart_button() {
    global $product;

    // Remove default button
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

    // Add custom button
    add_action( 'woocommerce_after_shop_loop_item', 'custom_add_button_output', 10 );
}

function custom_add_button_output() {
    global $product;

    if ( $product->is_type( 'external' ) ) {
        echo '<a href="' . esc_url( $product->get_product_url() ) . '" target="_blank" rel="nofollow" class="button product_type_external" rel="nofollow"><span>Buy Now</span> <i class="fa fa-money-bill"></i></a>';
    } elseif ( $product->is_type( 'grouped' ) ) {
        echo '<a href="' . esc_url( get_permalink( $product->get_id() ) ) . '" target="_blank" class="button product_type_grouped" aria-label="View products in the group" rel="nofollow"><span>View Product</span> <i class="fa fa-eye"></i></a>';
    } else {
        woocommerce_template_loop_add_to_cart(); // fallback for simple/variable
    }
}

/* =========================================
	Remove Default Pagination From Shop Page
	========================================*/
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);

/* ================
	Empty The cart 
	==============*/
add_action('init', 'custom_maybe_empty_cart');
function custom_maybe_empty_cart() {
	if (isset($_GET['empty-cart']) && $_GET['empty-cart'] == 'yes') {
		WC()->cart->empty_cart();
	}
}

endif;