<?php
$MediaId = get_option('pet_bazaar_media_id');
$content = '<p>The bond between human and pet is built on love, trust, loyalty, and mutual affection, creating an unbreakable connection.</p>';
$product_ttl1 = "Purepet Dog";
$product_ttl2 = "Exotic Fruit";
$product_ttl3 = "Rainbow Fish";
$product_ttl4 = "Macaw";
$product_ttl5 = "Cat";
$product_ttl6 = "Dog";
$product_ttl7 = "TetraBits";
$product_ttl8 = "Purepet Cat";

// Create post categories
$relax_category = wp_insert_term('Relax', 'category', array('slug' => 'relax'));
$joy_category = wp_insert_term('Joy', 'category', array('slug' => 'joy'));
$lifestyle_category = wp_insert_term('Lifestyle', 'category', array('slug' => 'lifestyle'));

// Product categories (using WooCommerce)
if (class_exists('woocommerce')) {
    $all_category = wp_insert_term('All', 'product_cat', array('slug' => 'all'));
    $birds_category = wp_insert_term('Birds', 'product_cat', array('slug' => 'birds'));
    $cats_category = wp_insert_term('Cats', 'product_cat', array('slug' => 'cats'));
    $dogs_category = wp_insert_term('Dogs', 'product_cat', array('slug' => 'dogs'));
    $fish_category = wp_insert_term('Fish', 'product_cat', array('slug' => 'fish'));
    $food_category = wp_insert_term('Food', 'product_cat', array('slug' => 'food'));
}

// Prepare post data for blog and products
$postData = array(
    // Blog Posts
    array(
        'post_title' => 'Cozy Moments with a Pet',
        'post_status' => 'publish',
        'post_content' => $content,
        'post_author' => 1,
        'post_type' => 'post',
        'post_category' => array($relax_category['term_id']),
        'tax_input' => array('post_tag' => array('Relax')),
    ),
    array(
        'post_title' => 'Capturing Joy with a Pet',
        'post_status' => 'publish',
        'post_content' => $content,
        'post_author' => 1,
        'post_type' => 'post',
        'post_category' => array($joy_category['term_id']),
        'tax_input' => array('post_tag' => array('Joy')),
    ),
    array(
        'post_title' => 'Embracing Technology and Love',
        'post_status' => 'publish',
        'post_content' => $content,
        'post_author' => 1,
        'post_type' => 'post',
        'post_category' => array($lifestyle_category['term_id']),
        'tax_input' => array('post_tag' => array('Lifestyle')),
    ),
    // Product Posts
    array(
        'post_title' => $product_ttl1,
        'post_status' => 'publish',
        'post_content' => $content,
        'post_author' => 1,
        'post_type' => 'product',
        'post_category' => array($dogs_category['term_id'], $food_category['term_id'], $all_category['term_id']),
    ),
    array(
        'post_title' => $product_ttl2,
        'post_status' => 'publish',
        'post_content' => $content,
        'post_author' => 1,
        'post_type' => 'product',
        'post_category' => array($birds_category['term_id'], $food_category['term_id'], $all_category['term_id']),
    ),
    array(
        'post_title' => $product_ttl3,
        'post_status' => 'publish',
        'post_content' => $content,
        'post_author' => 1,
        'post_type' => 'product',
        'post_category' => array($fish_category['term_id'], $all_category['term_id']),
    ),
    array(
        'post_title' => $product_ttl4,
        'post_status' => 'publish',
        'post_content' => $content,
        'post_author' => 1,
        'post_type' => 'product',
        'post_category' => array($birds_category['term_id'], $all_category['term_id']),
    ),
    array(
        'post_title' => $product_ttl5,
        'post_status' => 'publish',
        'post_content' => $content,
        'post_author' => 1,
        'post_type' => 'product',
        'post_category' => array($cats_category['term_id'], $all_category['term_id']),
    ),
    array(
        'post_title' => $product_ttl6,
        'post_status' => 'publish',
        'post_content' => $content,
        'post_author' => 1,
        'post_type' => 'product',
        'post_category' => array($dogs_category['term_id'], $all_category['term_id']),
    ),
    array(
        'post_title' => $product_ttl7,
        'post_status' => 'publish',
        'post_content' => $content,
        'post_author' => 1,
        'post_type' => 'product',
        'post_category' => array($fish_category['term_id'], $all_category['term_id']),
    ),
    array(
        'post_title' => $product_ttl8,
        'post_status' => 'publish',
        'post_content' => $content,
        'post_author' => 1,
        'post_type' => 'product',
        'post_category' => array($cats_category['term_id'], $all_category['term_id']),
    ),
);

kses_remove_filters();

foreach ($postData as $i => $postData1) :
    $id = wp_insert_post($postData1);
    set_post_thumbnail($id, $MediaId[$i + 1]); // Assuming MediaId contains the image IDs for each post

    // Set product meta information (only for product posts)
    if (class_exists('woocommerce') && $i >= 3) {
        wp_set_object_terms($id, 'simple', 'product_type'); // Set product type as simple
        update_post_meta($id, '_visibility', 'visible');
        update_post_meta($id, '_stock_status', 'instock');
        update_post_meta($id, 'total_sales', '0');
        update_post_meta($id, '_downloadable', 'no');
        update_post_meta($id, '_virtual', 'no'); // Changed from 'yes' to 'no' to indicate physical product
        update_post_meta($id, '_regular_price', '10');
        update_post_meta($id, '_sale_price', '8');
        update_post_meta($id, '_price', '10');
        update_post_meta($id, '_sku', 'SKU-' . $i);
        wc_update_product_stock($id, 100, 'set'); // Set 100 in stock
    }
endforeach;

kses_init_filters();

if (class_exists('woocommerce')) {
    wp_set_object_terms(34, [$food_category['term_id'], $all_category['term_id'], $dogs_category['term_id']], 'product_cat'); //32 : Product Id 
    wp_set_object_terms(35, [$food_category['term_id'], $all_category['term_id'], $birds_category['term_id']], 'product_cat');
    wp_set_object_terms(36, [$fish_category['term_id'], $all_category['term_id']], 'product_cat');
    wp_set_object_terms(37,	[$birds_category['term_id'], $all_category['term_id']], 'product_cat');
    wp_set_object_terms(38, [$cats_category['term_id'], $all_category['term_id']], 'product_cat');
    wp_set_object_terms(39, [$dogs_category['term_id'], $all_category['term_id']], 'product_cat');
    wp_set_object_terms(40, [$food_category['term_id'], $all_category['term_id'], $fish_category['term_id']], 'product_cat');
    wp_set_object_terms(41, [$food_category['term_id'], $all_category['term_id'], $cats_category['term_id']], 'product_cat');

	
	$category_icons = array(
        'all' => 'fa-home',  // category with slug 'all' gets 'fa-home' icon
        'food' => 'fa-bowl-food', 
        'fish' => 'fa-fish', 
        'birds' => 'fa-dove',        
        'cats' => 'fa-cat',        
        'dogs' => 'fa-dog',        
        'uncategorized' => 'fa-code-fork',        
    );
	
	$category_images = array(
        'cats' => 23,        
        'dogs' => 24,        
        'birds' => 25,        
        'food' => 26, 
        'fish' => 27, 
        'all' => 28, // 26 is the media ID of the image in the WordPress media library
        'uncategorized' => 29,
    );

    // Loop through each category in the mapping
    foreach ($category_icons as $category_slug => $icon_text) {
        // Get the category by slug
        $category = get_term_by('slug', $category_slug, 'product_cat');

        if ($category) {
            // Update the category's meta field with the Font Awesome icon text
            update_term_meta($category->term_id, 'pet_bazaar_product_cat_icon', $icon_text);
			
			 // Get the image ID from the mapping (this can be the ID of an image from the media library)
             if (isset($category_images[$category_slug])) {
                $image_id = $category_images[$category_slug];
				
				clean_term_cache($category->term_id);

				if (get_post($image_id)) {
                // Update the category's thumbnail (image) using the media ID
                update_term_meta($category->term_id, 'thumbnail_id', $image_id);
                }
            } 
        }
    }	
}

?>