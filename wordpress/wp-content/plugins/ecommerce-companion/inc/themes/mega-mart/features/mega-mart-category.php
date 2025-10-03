<?php
function mega_mart_product_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Category Section
	=========================================*/
	$wp_customize->add_section(
		'category_product_setting', array(
			'title' => esc_html__( 'Category Section', 'ecommerce-companion' ),
			'priority' => 2,
			'panel' => 'mega_mart_frontpage_sections',
		)
	);
	
	$wp_customize->add_setting(
		'hs_category'
			,array(
			'default' 			=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',			
		)
	);

	$wp_customize->add_control(
	'hs_category',
		array(
			'type' => 'checkbox',
			'label' => __('Show/Hide','ecommerce-companion'),
			'section' => 'category_product_setting',
		)
	);
	
	/*=========================================
	Content
	=========================================*/
	$wp_customize->add_setting(
		'category_content'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'mega_mart_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'category_content',
		array(
			'type' => 'hidden',
			'label' => __('Content','ecommerce-companion'),
			'section' => 'category_product_setting',
		)
	);
	
	
	// Product Category
	
	if(class_exists( 'woocommerce' )){
		$wp_customize->add_setting(
		'category_product_cat',
			array(
			'capability' => 'edit_theme_options',
			)
		);	
		$wp_customize->add_control( new Ecommerce_Comp_Product_Category_Control( $wp_customize, 
		'category_product_cat', 
			array(
			'label'   => __('Select category','ecommerce-companion'),
			'section' => 'category_product_setting',
			) 
		) );
	}	
}

add_action( 'customize_register', 'mega_mart_product_setting' );

// selective refresh
function mega_mart_product_section_partials( $wp_customize ){
	
	// category_ttl
	$wp_customize->selective_refresh->add_partial( 'category_product_cat', array(
		'selector'            => '.categories-section .categories-item',
		'settings'            => 'category_product_cat',
		'render_callback'  => 'mega_mart_product_ttl_render_callback',
	) );
	
	// category_btn_lbl
	$wp_customize->selective_refresh->add_partial( 'category_btn_lbl', array(
		'selector'            => '.category-products-home .cbb.blue',
		'settings'            => 'category_btn_lbl',
		'render_callback'  => 'mega_mart_product_btn_lbl_render_callback',
	) );
	
	}

add_action( 'customize_register', 'mega_mart_product_section_partials' );

// category_ttl
function mega_mart_product_ttl_render_callback() {
	return get_theme_mod( 'category_product_cat' );
}

// category_btn_lbl
function mega_mart_product_btn_lbl_render_callback() {
	return get_theme_mod( 'category_btn_lbl' );
}