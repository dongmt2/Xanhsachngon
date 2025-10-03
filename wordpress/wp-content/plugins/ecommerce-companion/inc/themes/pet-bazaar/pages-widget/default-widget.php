<?php
	$theme = wp_get_theme();
	$name = strtolower(str_replace(' ', '-', $theme));
	if($name == 'paw-bazaar') {
		$pet_bazaar_logo_url = ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/'.$name.'/assets/images/footer-logo.png';
	}else{
		$pet_bazaar_logo_url = ECOMMERCE_COMP_PLUGIN_URL .'inc/themes/'.$name.'/assets/images/logo.png';
	}

$activate = array(
        'pet-bazaar-sidebar-primary' => array(
            'search-1',
            'recent-posts-1',
            'archives-1',
        ),
		'pet-bazaar-footer-widget' => array(
			'text-1'
        ),
		'pet-bazaar-footer-widget-2' => array(
            'categories-1'
        ),
		'pet-bazaar-footer-widget-3' => array(
            'archives-1'
        ),
		'pet-bazaar-footer-widget-4' => array(
			'search-1'
        )
    );
    /* the default titles will appear */
		update_option('widget_text', array(  
		1 => array('title' => '',
        'text'=>'<a href="#" class="logo"><img src="'.esc_url($pet_bazaar_logo_url).'"></a>
                            <div class="textwidget">
                                <p class="about-template">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                                    quas recusandae
                                    explicabo
                                    voluptatibus dolor esse voluptates,.</p>
                                <aside class="widget widget_social_widget">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                    </ul>
                                </aside>
                            </div>'),		
		2 => array('title' => 'Recent Posts'),
		3 => array('title' => 'Categories'), 
        ));
		 update_option('widget_categories', array(
			1 => array('title' => 'Categories'), 
			2 => array('title' => 'Categories')));

		update_option('widget_archives', array(
			1 => array('title' => 'Archives'), 
			2 => array('title' => 'Archives')));
			
		update_option('widget_search', array(
			1 => array('title' => 'Search'), 
			2 => array('title' => 'Search')));	
		
    update_option('sidebars_widgets',  $activate);
	$MediaId = get_option('pet_bazaar_media_id');
	set_theme_mod( 'custom_logo', $MediaId[0] );
?>