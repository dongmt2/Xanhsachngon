<?php
	//post status and options
	$post = array(
		  'comment_status' => 'closed',
		  'ping_status' =>  'closed' ,
		  'post_author' => 1,
		  'post_date' => date('Y-m-d H:i:s'),
		  'post_name' => 'Home',
		  'post_status' => 'publish' ,
		  'post_title' => 'Home',
		  'post_type' => 'page',
	);  
	//insert page and save the id
	$newvalue = wp_insert_post( $post, false );
	if ( $newvalue && ! is_wp_error( $newvalue ) ){
		update_post_meta( $newvalue, '_wp_page_template', 'templates/template-homepage.php' );
		
		// Use a static front page
		$array_of_objects = get_posts([
			'title' => 'Home',
			'post_type' => 'any',
		]);
		$page = $array_of_objects[0];//Be sure you have an array with single post or page
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $page->ID );
		
	}
	
/* Set Default Values */
set_theme_mod('abv_hdr_antext', __('Save up 35% off today, Supper Value Deals, Welcome To Our Pet Bazaar!'));
set_theme_mod('header_button_label', __('Find Store'));
set_theme_mod('header_button_link', '#');
set_theme_mod('hdr_contact_ttl', __('Contact Us Free'));
set_theme_mod('hdr_contact_subttl', __('+1234567890'));
set_theme_mod('visa_icon', 'fa-cc-visa');
set_theme_mod('visa_link', '#');
set_theme_mod('paypal_icon', 'fa-cc-paypal');
set_theme_mod('paypal_link', '#');
set_theme_mod('mastercard_icon', 'fa-cc-mastercard');
set_theme_mod('mastercard_link', '#');
set_theme_mod('amex_icon', 'fa-cc-amex');
set_theme_mod('amex_link', '#');
set_theme_mod('discover_icon', 'fa-cc-discover');
set_theme_mod('discover_link', '#');
set_theme_mod('jcb_icon', 'fa-cc-jcb');
set_theme_mod('jcb_link', '#');
?>