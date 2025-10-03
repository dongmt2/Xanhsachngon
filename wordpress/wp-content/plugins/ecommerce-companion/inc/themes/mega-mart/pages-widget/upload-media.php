<?php
$theme = wp_get_theme(); // gets the current theme
$name = strtolower(str_replace(' ', '-', $theme));
$file = ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/'.$name.'/assets/images/logo.png';
	
$PImagePath = ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/mega-mart/assets/images';

$images = array(
$file,
$PImagePath. '/blog/blog-1.jpg',
$PImagePath. '/blog/blog-2.jpg',
$PImagePath. '/blog/blog-3.jpg',
$PImagePath. '/product/product-1.jpg',
$PImagePath. '/product/product-2.jpg',
$PImagePath. '/product/product-3.jpg',
$PImagePath. '/product/product-4.jpg',
$PImagePath. '/product/product-5.jpg',
$PImagePath. '/product/product-6.jpg',
$PImagePath. '/product/product-7.jpg',
$PImagePath. '/product/product-8.jpg',
$PImagePath. '/categories/cat-1.jpg',
$PImagePath. '/categories/cat-2.jpg',
$PImagePath. '/categories/cat-3.jpg',
$PImagePath. '/categories/cat-4.jpg',
$PImagePath. '/categories/cat-5.jpg',
$PImagePath. '/categories/cat-6.jpg',
$PImagePath. '/categories/cat-7.jpg',
);
$parent_post_id = null;
foreach($images as $name) {
$filename = basename($name);
$upload_file = wp_upload_bits($filename, null, file_get_contents($name));
if (!$upload_file['error']) {
	$wp_filetype = wp_check_filetype($filename, null );
	$attachment = array(
		'post_mime_type' => $wp_filetype['type'],
		'post_parent' => $parent_post_id,
		'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
		'post_excerpt' => 'mega mart caption',
		'post_status' => 'inherit'
	);
	$ImageId[] = $attachment_id = wp_insert_attachment( $attachment, $upload_file['file'], $parent_post_id );
	
	if (!is_wp_error($attachment_id)) {
		require_once(ABSPATH . "wp-admin" . '/includes/image.php');
		$attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
		wp_update_attachment_metadata( $attachment_id,  $attachment_data );
	}
}

}

 update_option( 'mega_mart_media_id', $ImageId );
?>
