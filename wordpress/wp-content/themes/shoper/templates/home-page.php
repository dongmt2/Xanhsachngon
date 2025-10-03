<?php
/*
Template Name: Home Page
*/
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shoper
 */

get_header();

$layout = 'full-container';

/**
* Hook - shoper_container_wrap_start 	
*
* @hooked shoper_container_wrap_start	- 5
*/
do_action( 'shoper_container_wrap_start', esc_attr( $layout ) );

while ( have_posts() ) :
	the_post();
	
	the_content();
endwhile; // End of the loop.

/**
* Hook - shoper_container_wrap_end	
*
* @hooked container_wrap_end - 999
*/
do_action( 'shoper_container_wrap_end', esc_attr( $layout ));
get_footer();