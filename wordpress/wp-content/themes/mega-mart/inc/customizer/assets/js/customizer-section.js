/* ( function( api ) {

	// Extends our custom "example-1" section.
	api.sectionConstructor['plugin-section'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize ); */


function mega_martfrontpagesectionsscroll( section_id ){
    var scroll_section_id = "slider-section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {
        case 'accordion-section-category_product_setting':
        scroll_section_id = "categories-section";
        break;

        case 'accordion-section-info_setting':
        scroll_section_id = "info-section";
        break;

        case 'accordion-section-product_one_setting':
        scroll_section_id = "product-one-section";
        break;
		
        case 'accordion-section-product_two_setting':
        scroll_section_id = "product-two-section";
        break;
		
        case 'accordion-section-product_three_setting':
        scroll_section_id = "product-three-section";
        break;
		
        case 'accordion-section-product_four_setting':
        scroll_section_id = "product-four-section";
        break;
		
        case 'accordion-section-banner_setting':
        scroll_section_id = "banner";
        break;
		
        case 'accordion-section-deal_setting':
        scroll_section_id = "deal-section";
        break;
		
        case 'accordion-section-deal2_setting':
        scroll_section_id = "deal2-section";
        break;
		
        case 'accordion-section-deal3_setting':
        scroll_section_id = "deal3-section";
        break;
		
        case 'accordion-section-testimonial_setting':
        scroll_section_id = "testimonial-section";
        break;
		
        case 'accordion-section-brand_setting':
        scroll_section_id = "brand-section";
        break;
		
		case 'accordion-panel-footer_section':
        scroll_section_id = "footer-section";
        break;
    }

    if( $contents.find('#'+scroll_section_id).length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + scroll_section_id ).offset().top
        }, 1000);
    }
}

 jQuery('body').on('click', '#sub-accordion-panel-mega_mart_frontpage_sections .control-subsection .accordion-section-title', function(event) {
        let section_id = jQuery(this).parent('.control-subsection').attr('id');
        mega_martfrontpagesectionsscroll( section_id );
});

jQuery('body').on('click', '#accordion-panel-footer_section .accordion-section-title', function(event) {
        var footer_id = jQuery(this).parent('.control-panel').attr('id');
        mega_martfrontpagesectionsscroll( footer_id );
});

/* Option Disable */
jQuery(function($) {
	jQuery("#sub-accordion-section-footer_background input, #customize-control-site_ttl_size input, #customize-control-site_desc_size input, #sub-accordion-section-footer_background button.wp-color-result, #customize-control-sticky_header_logo button, #customize-control-mega_mart_site_cntnr_width input, #sub-accordion-section-mega_mart_sidebar select:not(#_customize-input-mega_mart_default_pg_sidebar), #customize-control-scroller_icon select, #_customize-input-breadcrumb_title_enable, #_customize-input-breadcrumb_path_enable, #customize-control-breadcrumb_overlay_color button, #_customize-input-breadcrumb_category_hs, #sub-accordion-section-mega_mart_typography select, #sub-accordion-section-mega_mart_headings_typography select, #sub-accordion-section-mega_mart_menu_typography select").prop('disabled', true);
});