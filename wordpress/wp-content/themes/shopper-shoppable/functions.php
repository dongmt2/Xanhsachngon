<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/**
 * Child theme setup.
 *
 * @return void
 */
if ( ! function_exists( 'shopper_shoppable_theme_setup' ) ) :
    function shopper_shoppable_theme_setup() {
        // Make theme available for translation.
        load_theme_textdomain( 'shopper-shoppable', get_stylesheet_directory_uri() . '/languages' );

        // Add custom header support.
        add_theme_support( 'custom-header', apply_filters( 'shoper_custom_header_args', array(
            'default-image'      => get_stylesheet_directory_uri() . '/assets/image/custom-header.png',
            'default-text-color' => '000000',
            'width'              => 1000,
            'height'             => 350,
            'flex-height'        => true,
            'wp-head-callback'   => 'shoper_header_style',
        ) ) );

        // Register default header image.
        register_default_headers( array(
            'default-image' => array(
                'url'           => '%s/assets/image/custom-header.png',
                'thumbnail_url' => '%s/assets/image/custom-header.png',
                'description'   => esc_html__( 'Default Header Image', 'shopper-shoppable' ),
            ),
        ) );
        remove_theme_support( 'starter-content' );
    }
    add_action( 'after_setup_theme', 'shopper_shoppable_theme_setup' );
endif;

/**
 * Enqueue styles and scripts for the child theme.
 *
 * @return void
 */
if ( ! function_exists( 'shopper_shoppable_parent_css' ) ) :
    function shopper_shoppable_parent_css() {
        // Enqueue parent theme's style.css.
        wp_enqueue_style( 'shopper_shoppable_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'bootstrap', 'icofont', 'scrollbar', 'shoper-common' ), wp_get_theme()->get( 'Version' ) );

        // Enqueue Google Fonts.
        wp_enqueue_style( 'shopper-shoppable-fonts', '//fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700|Nunito+Sans:200,300,400,600,700,800,900&display=swap' );

        // Enqueue Magnific Popup assets.
        wp_enqueue_style( 'magnific-popup', get_theme_file_uri( '/assets/magnific-popup/magnific-popup.css' ), array(), '1.0.0' );
        wp_enqueue_script( 'magnific-popup-js', get_theme_file_uri( '/assets/magnific-popup/jquery.magnific-popup.js' ), array( 'jquery' ), '1.0.0', true );

        // Enqueue AOS assets.
        wp_enqueue_style( 'aos-next', get_stylesheet_directory_uri() . '/assets/aos-next/aos.css', array(), '3.3.7' );
        wp_enqueue_script( 'aos-next-js', get_stylesheet_directory_uri() . '/assets/aos-next/aos.js', array(), '3.3.7', true );

        // Enqueue child theme's main script.
        wp_enqueue_script( 'shopper_shoppable-js', get_theme_file_uri( '/assets/shopper-shoppable.js' ), array( 'jquery' ), '1.0.0', true );
    }
    add_action( 'wp_enqueue_scripts', 'shopper_shoppable_parent_css', 10 );
endif;

/**
 * Override parent theme inline CSS variables.
 *
 * @return void
 */
if ( ! function_exists( 'shopper_shoppable_override_inline_css_vars' ) ) :
    function shopper_shoppable_override_inline_css_vars() {
        $custom_css = sprintf(
            ':root {--primary-color:%1$s; --secondary-color: %2$s; --nav-h-bg:%2$s}',
            esc_attr( get_theme_mod( '__primary_color', '#6c757d' ) ),
            esc_attr( get_theme_mod( '__secondary_color', '#E88300' ) )
        );
        wp_add_inline_style( 'shoper-style', $custom_css );
    }
    add_action( 'wp_enqueue_scripts', 'shopper_shoppable_override_inline_css_vars', 20 ); // Run after parent (priority > 10)
endif;

/**
 * Override default theme options from the parent theme.
 *
 * @param array $value Array of default values.
 * @return array
 */
if ( ! function_exists( 'shopper_shoppable_override_default_value' ) ) :
    function shopper_shoppable_override_default_value( $value ) {
        $value['__secondary_color']   = '#E88300';
        $value['blog_layout']         = 'sidebar-content';
        $value['single_post_layout']  = 'no-sidebar';
        return $value;
    }
    add_filter( 'shoper_filter_default_theme_options', 'shopper_shoppable_override_default_value' );
endif;

/**
 * Disable parent theme actions and add custom ones.
 *
 * @return void
 */
if ( ! function_exists( 'shopper_shoppable_disable_from_parent' ) ) :
    function shopper_shoppable_disable_from_parent() {
        global $shoper_header_layout, $shoper_post_related;

        // Disable parent theme header elements.
        if ( isset( $shoper_header_layout ) ) {
            remove_action( 'shoper_site_header', array( $shoper_header_layout, 'site_header_layout' ), 30 );
            remove_action( 'shoper_site_header', array( $shoper_header_layout, 'get_site_search_form' ), 20 );
        }

        // Disable and replace front page header sections.
        if ( is_front_page() && isset( $shoper_header_layout ) ) {
            remove_action( 'shoper_site_header', array( $shoper_header_layout, 'site_hero_sections' ), 9999 );
            add_action( 'shoper_site_header', 'shopper_shoppable_custom_header', 999 );
        }

        // Disable post-related elements.
        if ( isset( $shoper_post_related ) ) {
            remove_action( 'shoper_site_content_type', array( $shoper_post_related, 'site_loop_heading' ), 10 );
            remove_action( 'shoper_loop_navigation', array( $shoper_post_related, 'site_loop_navigation' ) );
        }

        // Disable WooCommerce wrapper functions.
        remove_action( 'woocommerce_before_main_content', 'shoper_woocommerce_wrapper_before' );
        remove_action( 'woocommerce_after_main_content', 'shoper_woocommerce_wrapper_after' );
    }
    add_action( 'wp', 'shopper_shoppable_disable_from_parent', 50 );
endif;

/**
 * Adds a custom header layout for the Shopper Shoppable child theme.
 * This function overrides the parent theme's header layout.
 *
 * @return void
 */
if ( ! function_exists( 'shopper_shoppable_header_layout' ) ) :
    function shopper_shoppable_header_layout() {
        ?>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-5 col-sm-12 col-12 d-flex align-items-center">
                    <div class="logo-wrap">
                        <?php
                        if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                            the_custom_logo();
                        } else {
                            echo '<h3 class="page-title-text"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">';
                            echo esc_html( get_bloginfo( 'name' ) );
                            echo '</a></h3>';
                        }
                        ?>
                    </div>
                    <button class="shoper-rd-navbar-toggle"><i class="icofont-navigation-menu"></i></button>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-12 col-12 text-right">
                    <?php
                    if ( ( class_exists( 'APSW_Product_Search_Finale_Class_Pro' ) || class_exists( 'APSW_Product_Search_Finale_Class' ) ) && class_exists( 'WooCommerce' ) ) {
                        do_action( 'apsw_search_bar_preview' );
                    }
                    ?>
                </div>
            </div>
            <div id="nav_bar_wrap" class="<?php echo ! empty( shoper_get_option( '__sticky_menu' ) ) ? 'navsticky' : ''; ?>">
                <div class="d-md-flex align-items-center">
                    <?php
                    do_action( 'shoper_header_layout_1_navigation' );
                    shopper_shoppable_header_icon();
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    add_action( 'shoper_site_header', 'shopper_shoppable_header_layout', 30 );
endif;

/**
 * Renders header icons for the child theme.
 *
 * @return void
 */
if ( ! function_exists( 'shopper_shoppable_header_icon' ) ) :
    function shopper_shoppable_header_icon() {
        ?>
        <ul class="header-icon d-md-flex">
            <li><a href="javascript:void(0)" class="search-overlay-trigger"><i class="icofont-search-2"></i></a></li>
            <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                <li><?php shoper_woocommerce_cart_link(); ?></li>
                <li><a href="javascript:void(0)"><i class="icofont-user-alt-4"></i></a>
                    <ul>
                        <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
                            <li class="<?php echo esc_attr( wc_get_account_menu_item_classes( $endpoint ) ); ?>">
                                <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
        <?php
    }
endif;

/**
 * Renders the search modal in the footer.
 *
 * @return void
 */
if ( ! function_exists( 'shopper_shoppable_search_modal' ) ) :
    function shopper_shoppable_search_modal() {
        echo '<div class="search-bar-modal" id="search-bar">';
        echo '<div class="search-bar-modal-inner">';
        if ( ( class_exists( 'APSW_Product_Search_Finale_Class_Pro' ) || class_exists( 'APSW_Product_Search_Finale_Class' ) ) && class_exists( 'WooCommerce' ) ) {
            do_action( 'apsw_search_bar_preview' );
        } else {
            get_search_form();
        }
        echo '<button class="button appw-modal-close-button" type="button">' . esc_html__( 'Close', 'shopper-shoppable' ) . ' <i class="icofont-close-line"></i></button>';
        echo '</div>';
        echo '</div>';
    }
    add_action( 'wp_footer', 'shopper_shoppable_search_modal', 999 );
endif;

/**
 * Renders post meta information.
 *
 * @return void
 */
function shopper_shoppable_render_meta() {
    if ( empty( get_the_ID() ) || ! is_singular( 'post' ) ) {
        return;
    }

    $post_id     = get_the_ID();
    $author_id   = get_post_field( 'post_author', $post_id );
    $author_url  = esc_url( get_author_posts_url( $author_id ) );
    $author_name = esc_html( get_the_author_meta( 'display_name', $author_id ) );

    // Published and modified dates.
    $published_time = sprintf(
        '<time class="entry-date published" datetime="%s" content="%s">%s</time>',
        esc_attr( get_the_date( 'c', $post_id ) ),
        esc_attr( get_the_date( 'Y-m-d', $post_id ) ),
        esc_html( get_the_date( '', $post_id ) )
    );

    if ( get_the_time( 'U', $post_id ) === get_the_modified_time( 'U', $post_id ) ) {
        $time_html = $published_time;
    } else {
        $modified_time = sprintf(
            '<time class="updated" datetime="%s">%s</time>',
            esc_attr( get_the_modified_date( 'c', $post_id ) ),
            esc_html( get_the_modified_date( '', $post_id ) )
        );
        $time_html = $published_time . ' - ' . $modified_time;
    }

    // Categories list.
    $category_list = get_the_category_list( ', ', '', $post_id );

    // Comments count.
    $comments_number = get_comments_number( $post_id );

    $markup = '<ul class="post-meta tb-cell">';

    $markup .= '<li class="post-by">';
    $markup .= '<span>' . esc_html__( 'By - ', 'shopper-shoppable' ) . '</span>';
    $markup .= '<a href="' . $author_url . '">' . $author_name . '</a>';
    $markup .= '</li>';

    $markup .= '<li class="meta date posted-on">';
    $markup .= esc_html__( 'Posted on ', 'shopper-shoppable' );
    $markup .= $time_html;
    $markup .= '</li>';

    if ( $category_list ) {
        $markup .= '<li class="meta category">';
        $markup .= esc_html__( 'Posted in ', 'shopper-shoppable' );
        $markup .= $category_list;
        $markup .= '</li>';
    }

    if ( $comments_number ) {
        $markup .= '<li class="meta comments">';
        $markup .= sprintf(
            /* translators: %s: Number of comments. */
            _n( '%s Comment', '%s Comments', $comments_number, 'shopper-shoppable' ),
            number_format_i18n( $comments_number )
        );
        $markup .= '</li>';
    }

    $markup .= '</ul>';

    echo wp_kses_post( $markup );
}
add_action( 'shoper_single_post_meta', 'shopper_shoppable_render_meta' );

/**
 * Renders the heading for a page or post.
 *
 * @return void
 */
function shopper_shoppable_heading() {
    if ( is_page() || is_singular( 'post' ) ) {
        return;
    }

    if ( is_singular() ) {
        the_title( '<h1 class="entry-title">', '</h1>' );
    } else {
        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    }
}
add_action( 'shoper_site_content_type', 'shopper_shoppable_heading', 10 );

/**
 * WooCommerce wrapper before main content.
 *
 * @return void
 */
if ( ! function_exists( 'shopper_shoppable_woocommerce_wrapper_before' ) ) {
    function shopper_shoppable_woocommerce_wrapper_before() {
        if ( is_product() ) {
            do_action( 'shoper_container_wrap_start', 'no-sidebar' );
        } else {
            do_action( 'shoper_container_wrap_start', 'full-container' );
        }
    }
}
add_action( 'woocommerce_before_main_content', 'shopper_shoppable_woocommerce_wrapper_before' );

/**
 * WooCommerce wrapper after main content.
 *
 * @return void
 */
if ( ! function_exists( 'shopper_shoppable_woocommerce_wrapper_after' ) ) {
    function shopper_shoppable_woocommerce_wrapper_after() {
        if ( is_product() ) {
            do_action( 'shoper_container_wrap_end', 'no-sidebar' );
        } else {
            do_action( 'shoper_container_wrap_end', 'full-container' );
        }
    }
}
add_action( 'woocommerce_after_main_content', 'shopper_shoppable_woocommerce_wrapper_after' );

/**
 * Filters the number of columns in the product loop.
 *
 * @return int The number of columns.
 */
function shopper_shoppable_woocommerce_loop_columns() {
    return 4;
}
add_filter( 'loop_shop_columns', 'shopper_shoppable_woocommerce_loop_columns', 999 );

/**
 * Renders post loop navigation.
 *
 * @return void
 */
function shopper_shoppable_loop_navigation() {
    echo '<div class="shopper-shoppable-pagination" data-aos="fade-up">';
    the_posts_pagination(
        array(
            'type'               => 'list',
            'mid_size'           => 2,
            'prev_text'          => esc_html__( 'Previous', 'shopper-shoppable' ),
            'next_text'          => esc_html__( 'Next', 'shopper-shoppable' ),
            'screen_reader_text' => esc_html__( '&nbsp;', 'shopper-shoppable' ),
        )
    );
    echo '</div>';
}
add_action( 'shoper_loop_navigation', 'shopper_shoppable_loop_navigation' );


/**
 * Renders the custom header for the front page.
 *
 * @return void
 */
function shopper_shoppable_custom_header() {
    if ( is_front_page() && is_active_sidebar( 'slider' ) ) :
        ?>
        <div id="homepage-slider">
            <?php dynamic_sidebar( 'slider' ); ?>
        </div>
        <?php
    else :
        $header_image = get_header_image();
        if ( ! empty( $header_image ) ) :
            ?>
            <div id="static_header_banner" class="header-img homer-banner" style="background-image: url(<?php echo esc_url( $header_image ); ?>); background-attachment: scroll;">
                <?php
        else :
            ?>
            <div id="static_header_banner" class="homer-banner">
                <?php
        endif;
        ?>
                <div class="content-text">
                    <div class="container">
                        <?php
                        if ( display_header_text() == true ) {
                            echo '<h1 class="page-title-text">';
                            echo esc_html( get_bloginfo( 'name' ) );
                            echo '</h1>';
                            echo '<p class="subtitle">';
                            echo esc_html( get_bloginfo( 'description', 'display' ) );
                            echo '</p>';
                        }
                        ?>
                    </div>
                </div>
                <svg class="svg wavy" viewBox="0 0 1440 150" xmlns="http://www.w3.org/2000/svg" style="transform: scaleY(-1); display: block;">
                    <path fill="#F6F7F9" d="M0,96L60,85.3C120,75,240,53,360,69.3C480,85,600,139,720,144C840,149,960,107,1080,90.7C1200,75,1320,85,1380,90.7L1440,96V0H0Z"></path>
                </svg>
            </div>
        <?php
    endif;
}
