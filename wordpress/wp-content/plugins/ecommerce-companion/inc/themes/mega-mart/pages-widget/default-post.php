<?php

$MediaId = get_option('mega_mart_media_id');
$content = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing mollis dolor facilisis porttitor.</p><!--more--><p>This is the rest of the content that will appear only on single post view.</p>';

$product_titles = array(
    "Juicy Lemons",
    "Fresh Organic Peas",
    "Fresh Potatoes",
    "Capsicums",
    "Dairy Milk Silk",
    "Lays - Crunchy Snack",
    "Kissan Mixed Fruits",
    "NesCafe Coffee Latte"
);

// Create blog post categories
$blog_categories = array(
    'grocery' => 'Grocery',
    'fusion' => 'Fusion',
    'flavours' => 'Flavours',
);

$created_blog_cats = [];
foreach ($blog_categories as $slug => $name) {
    $result = wp_insert_term($name, 'category', ['slug' => $slug]);
    $created_blog_cats[$slug] = !is_wp_error($result) ? $result['term_id'] : get_term_by('slug', $slug, 'category')->term_id;
}

// Create WooCommerce product categories
$woo_categories = array(
    'nutrients' => 'Nutrients',
    'baked-items' => 'Baked Items',
    'beverages' => 'Beverages',
    'chocolates' => 'Chocolates',
    'pasta' => 'Pasta',
    'vegetables' => 'Vegetables',
);

$created_product_cats = [];
if (class_exists('woocommerce')) {
    foreach ($woo_categories as $slug => $name) {
        $result = wp_insert_term($name, 'product_cat', ['slug' => $slug]);
        $created_product_cats[$slug] = !is_wp_error($result) ? $result['term_id'] : get_term_by('slug', $slug, 'product_cat')->term_id;
    }
}

// Prepare post data
$posts = [
    // Blog Posts
    [
        'post_title' => 'Satisfy Your Sweet Tooth With Our Dessert Creations',
        'post_category_slug' => 'grocery',
        'tags' => ['Dessert'],
    ],
    [
        'post_title' => 'Awaken Your Senses With Our Fusion Cuisine',
        'post_category_slug' => 'fusion',
        'tags' => ['Cuisine'],
    ],
    [
        'post_title' => 'Celebrate The Flavors Season With Our Rotating Menu',
        'post_category_slug' => 'flavours',
        'tags' => ['Menu'],
    ],
];

// Add Product Posts
foreach ($product_titles as $index => $title) {
    $product_category_map = [
        [ 'vegetables' ],
        [ 'vegetables' ],
        [ 'vegetables' ],
        [ 'vegetables' ],
        [ 'chocolates' ],
        [ 'baked-items', 'vegetables' ],
        [ 'nutrients', 'vegetables', 'pasta' ],
        [ 'beverages', 'chocolates' ]
    ];

    $posts[] = [
        'post_title' => $title,
        'product_cats' => $product_category_map[$index]
    ];
}

kses_remove_filters();

foreach ($posts as $index => $data) {
    $post_type = isset($data['product_cats']) ? 'product' : 'post';
    $post_args = [
        'post_title'   => $data['post_title'],
        'post_status'  => 'publish',
        'post_content' => $content,
        'post_author'  => 1,
        'post_type'    => $post_type,
    ];

    // Add categories and tags
    if ($post_type === 'post') {
        $post_args['post_category'] = [$created_blog_cats[$data['post_category_slug']]];
        $post_args['tax_input'] = ['post_tag' => $data['tags']];
    }

    // 1. Insert post first
    $post_id = wp_insert_post($post_args);

    // 2. Then update the content with read more button
    // if ($post_type === 'post' && !is_wp_error($post_id)) {
        // $read_more = '<a href="' . get_permalink($post_id) . '" class="more-link btn">Read More</a>';
        // wp_update_post([
            // 'ID' => $post_id,
            // 'post_content' => $content . $read_more,
        // ]);
    // }
	
    if (!is_wp_error($post_id) && isset($MediaId[$index + 1])) {
        set_post_thumbnail($post_id, $MediaId[$index + 1]);
    }

    // Product metadata
    if ($post_type === 'product' && class_exists('woocommerce')) {
        wp_set_object_terms($post_id, 'simple', 'product_type');
        update_post_meta($post_id, '_visibility', 'visible');
        update_post_meta($post_id, '_stock_status', 'instock');
        update_post_meta($post_id, 'total_sales', '0');
        update_post_meta($post_id, '_downloadable', 'no');
        update_post_meta($post_id, '_virtual', 'no');
        update_post_meta($post_id, '_regular_price', '10');
        update_post_meta($post_id, '_sale_price', '8');
        update_post_meta($post_id, '_price', '10');
        update_post_meta($post_id, '_sku', 'SKU-' . $index);
        wc_update_product_stock($post_id, 100, 'set');

        // Assign categories
        if (!empty($data['product_cats'])) {
            $cat_ids = array_map(fn($slug) => $created_product_cats[$slug], $data['product_cats']);
            wp_set_object_terms($post_id, $cat_ids, 'product_cat');
        }
    }
}

kses_init_filters();

// Assign thumbnails/icons to categories
if (class_exists('woocommerce')) {
    $category_icons = [
        'nutrients' => '',
        'baked-items' => '',
        'beverages' => '',
        'chocolates' => '',
        'pasta' => '',
        'oils' => '',
        'vegetables' => '',
        'uncategorized' => '',
    ];

    $category_images = [
        'nutrients' => 22,
        'baked-items' => 23,
        'beverages' => 24,
        'chocolates' => 25,
        'pasta' => 26,
        'oils' => 27,
        'vegetables' => 28,
        'uncategorized' => 4,
    ];

    foreach ($category_icons as $slug => $icon) {
        $term = get_term_by('slug', $slug, 'product_cat');
        if ($term) {
            update_term_meta($term->term_id, 'mega_mart_product_cat_icon', $icon);

            if (!empty($category_images[$slug]) && get_post($category_images[$slug])) {
                update_term_meta($term->term_id, 'thumbnail_id', $category_images[$slug]);
            }
        }
    }
}
?>
