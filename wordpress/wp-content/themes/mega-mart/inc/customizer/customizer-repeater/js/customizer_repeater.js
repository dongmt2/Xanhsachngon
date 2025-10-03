/* global jQuery */
/* global wp */
function mega_mart_media_upload(button_class) {
    'use strict';
    jQuery('body').on('click', button_class, function () {
        var button_id = '#' + jQuery(this).attr('id');
        var display_field = jQuery(this).parent().children('input:text');
        var _custom_media = true;

        wp.media.editor.send.attachment = function (props, attachment) {

            if (_custom_media) {
                if (typeof display_field !== 'undefined') {
                    switch (props.size) {
                        case 'full':
                            display_field.val(attachment.sizes.full.url);
                            display_field.trigger('change');
                            break;
                        case 'medium':
                            display_field.val(attachment.sizes.medium.url);
                            display_field.trigger('change');
                            break;
                        case 'thumbnail':
                            display_field.val(attachment.sizes.thumbnail.url);
                            display_field.trigger('change');
                            break;
                        default:
                            display_field.val(attachment.url);
                            display_field.trigger('change');
                    }
                }
                _custom_media = false;
            } else {
                return wp.media.editor.send.attachment(button_id, [props, attachment]);
            }
        };
        wp.media.editor.open(button_class);
        window.send_to_editor = function (html) {

        };
        return false;
    });
}

/********************************************
 *** Generate unique id ***
 *********************************************/
function mega_mart_customizer_repeater_uniqid(prefix, more_entropy) {
    'use strict';
    if (typeof prefix === 'undefined') {
        prefix = '';
    }

    var retId;
    var php_js;
    var formatSeed = function (seed, reqWidth) {
        seed = parseInt(seed, 10)
            .toString(16); // to hex str
        if (reqWidth < seed.length) { // so long we split
            return seed.slice(seed.length - reqWidth);
        }
        if (reqWidth > seed.length) { // so short we pad
            return new Array(1 + (reqWidth - seed.length))
                .join('0') + seed;
        }
        return seed;
    };

    // BEGIN REDUNDANT
    if (!php_js) {
        php_js = {};
    }
    // END REDUNDANT
    if (!php_js.uniqidSeed) { // init seed with big random int
        php_js.uniqidSeed = Math.floor(Math.random() * 0x75bcd15);
    }
    php_js.uniqidSeed++;

    retId = prefix; // start with prefix, add current milliseconds hex string
    retId += formatSeed(parseInt(new Date()
        .getTime() / 1000, 10), 8);
    retId += formatSeed(php_js.uniqidSeed, 5); // add seed hex string
    if (more_entropy) {
        // for more entropy we add a float lower to 10
        retId += (Math.random() * 10)
            .toFixed(8)
            .toString();
    }

    return retId;
}


/********************************************
 *** General Repeater ***
 *********************************************/
function mega_mart_customizer_repeater_refresh_social_icons(th) {
    'use strict';
    var icons_repeater_values = [];
    th.find('.customizer-repeater-social-repeater-container').each(function () {
        var icon = jQuery(this).find('.icp').val();
        var link = jQuery(this).find('.customizer-repeater-social-repeater-link').val();
        var id = jQuery(this).find('.customizer-repeater-social-repeater-id').val();

        if (!id) {
            id = 'customizer-repeater-social-repeater-' + mega_mart_customizer_repeater_uniqid();
            jQuery(this).find('.customizer-repeater-social-repeater-id').val(id);
        }

        if (icon !== '' && link !== '') {
            icons_repeater_values.push({
                'icon': icon,
                'link': link,
                'id': id
            });
        }
    });

    th.find('.social-repeater-socials-repeater-colector').val(JSON.stringify(icons_repeater_values));
    mega_mart_customizer_repeater_refresh_general_control_values();
}


function mega_mart_customizer_repeater_refresh_general_control_values() {
    'use strict';
    jQuery('.customizer-repeater-general-control-repeater').each(function () {
        var values = [];
        var th = jQuery(this);
        th.find('.customizer-repeater-general-control-repeater-container').each(function () {

            var icon_value = jQuery(this).find('.icp').val();
            var text = jQuery(this).find('.customizer-repeater-text-control').val();
            var link = jQuery(this).find('.customizer-repeater-link-control').val();
            var text2 = jQuery(this).find('.customizer-repeater-text2-control').val();
            var link2 = jQuery(this).find('.customizer-repeater-link2-control').val();
            var text3 = jQuery(this).find('.customizer-repeater-text3-control').val();
            var link3 = jQuery(this).find('.customizer-repeater-link3-control').val();
            var text4 = jQuery(this).find('.customizer-repeater-text4-control').val();
            var link4 = jQuery(this).find('.customizer-repeater-link4-control').val();
            var text5 = jQuery(this).find('.customizer-repeater-text5-control').val();
            var link5 = jQuery(this).find('.customizer-repeater-link5-control').val();
            var text6 = jQuery(this).find('.customizer-repeater-text6-control').val();
            var link6 = jQuery(this).find('.customizer-repeater-link6-control').val();
            var text7 = jQuery(this).find('.customizer-repeater-text7-control').val();
            var link7 = jQuery(this).find('.customizer-repeater-link7-control').val();
            var color = jQuery(this).find('input.customizer-repeater-color-control').val();
            var color2 = jQuery(this).find('input.customizer-repeater-color2-control').val();
            var image_url = jQuery(this).find('.custom-media-url').val();
            var image_url2 = jQuery(this).find('.custom-media-url2').val();
            var image_url3 = jQuery(this).find('.custom-media-url3').val();
            var choice = jQuery(this).find('.customizer-repeater-image-choice').val();
            var title = jQuery(this).find('.customizer-repeater-title-control').val();
            var subtitle = jQuery(this).find('.customizer-repeater-subtitle-control').val();
			var subtitle2 = jQuery(this).find('.customizer-repeater-subtitle2-control').val();			
			var subtitle3 = jQuery(this).find('.customizer-repeater-subtitle3-control').val();			
			var button_text = jQuery(this).find('.customizer-repeater-button-text-control').val();
			var button_link = jQuery(this).find('.customizer-repeater-button-link-control').val();
			var button2_text = jQuery(this).find('.customizer-repeater-button2-text-control').val();
			var button2_link = jQuery(this).find('.customizer-repeater-button2-link-control').val();
			var description = jQuery(this).find('.customizer-repeater-description-control').val();
			var description2 = jQuery(this).find('.customizer-repeater-description2-control').val();
			var slide_align = jQuery(this).find('.customizer-repeater-slide-align').val();
			var enable = jQuery(this).find('.customizer-repeater-checkbox-enable').is(":checked") ? 'yes' : 'no';
			var enable2 = jQuery(this).find('.customizer-repeater-checkbox-enable2').is(":checked") ? 'yes' : 'no';
			var newtab = jQuery(this).find('.customizer-repeater-checkbox-newtab').is(":checked") ? 'yes' : 'no';
			var nofollow = jQuery(this).find('.customizer-repeater-checkbox-nofollow').is(":checked") ? 'yes' : 'no';
            var id = jQuery(this).find('.social-repeater-box-id').val();
            if (!id) {
                id = 'social-repeater-' + mega_mart_customizer_repeater_uniqid();
                jQuery(this).find('.social-repeater-box-id').val(id);
            }
            var social_repeater = jQuery(this).find('.social-repeater-socials-repeater-colector').val();
            var shortcode = jQuery(this).find('.customizer-repeater-shortcode-control').val();

            if (text !== '' || text2 !== '' || text3 !== '' || text4 !== '' || text5 !== '' || text6!== '' || text7 !== '' || image_url !== '' || image_url2 !== '' || image_url3 !== '' || title !== '' || subtitle !== '' || subtitle2 !== ''|| subtitle3 !== '' || description !== '' || description2 !== '' || icon_value !== '' || link !== '' || link2 !== '' || link3 !== '' || link4 !== '' || link5 !== '' || link6 !== '' || link7 !== '' || choice !== '' || social_repeater !== '' || shortcode !== '' || slide_align !== '' || color !== '' || button_text !== '' || button2_text !== ''  || button_link !== ''  || button2_link !== '' || enable !== '' || enable2 !== '' || newtab !== '' || nofollow !== '' ) {
                values.push({
                    'icon_value': (choice === 'customizer_repeater_none' ? '' : icon_value),
                    'color': color,
                    'color2': color2,
                    'text': megamartescapeHtml(text),
                    'link': link,
                    'text2': megamartescapeHtml(text2),
                    'link2': link2,
                    'text3': megamartescapeHtml(text3),
                    'link3': link3,
                    'text4': megamartescapeHtml(text4),
                    'link4': link4,
                    'text5': megamartescapeHtml(text5),
                    'link5': link5,
                    'text6': megamartescapeHtml(text6),
                    'link6': link6,
                    'text7': megamartescapeHtml(text7),
                    'link7': link7,
					'button_text': megamartescapeHtml(button_text),
					'button_link': button_link,
					'button2_text': megamartescapeHtml(button2_text),
					'button2_link': button2_link,
                    'image_url': (choice === 'customizer_repeater_none' ? '' : image_url),
                    'image_url2': image_url2,
                    'image_url3': image_url3,
                    'choice': choice,
                    'title': megamartescapeHtml(title),
                    'subtitle': megamartescapeHtml(subtitle),
					'subtitle2': megamartescapeHtml(subtitle2),					
					'subtitle3': megamartescapeHtml(subtitle3),					
					'description': megamartescapeHtml(description),					
					'description2': megamartescapeHtml(description2),					
					'slide_align': megamartescapeHtml(slide_align),
					'enable' : enable,
					'enable2' : enable2,
					'newtab' : newtab,
					'nofollow' : nofollow,
                    'social_repeater': megamartescapeHtml(social_repeater),
                    'id': id,
                    'shortcode': megamartescapeHtml(shortcode)
                });
            }

        });
        th.find('.customizer-repeater-colector').val(JSON.stringify(values));
        th.find('.customizer-repeater-colector').trigger('change');
    });
}


jQuery(document).ready(function () {
    'use strict';
    var mega_mart_theme_controls = jQuery('#customize-theme-controls');
    mega_mart_theme_controls.on('click', '.customizer-repeater-customize-control-title', function () {
        jQuery(this).next().slideToggle('medium', function () {
            if (jQuery(this).is(':visible')){
                jQuery(this).prev().addClass('repeater-expanded');
                jQuery(this).css('display', 'block');
            } else {
                jQuery(this).prev().removeClass('repeater-expanded');
            }
        });
    });

    mega_mart_theme_controls.on('change', '.icp',function(){
        mega_mart_customizer_repeater_refresh_general_control_values();
        return false;
    });
	
	mega_mart_theme_controls.on('change','.customizer-repeater-slide-align', function(){
		mega_mart_customizer_repeater_refresh_general_control_values();
        return false;
		
	});

    mega_mart_theme_controls.on('change','.customizer-repeater-image2-control', function(){
        mega_mart_customizer_repeater_refresh_general_control_values();
        return false;
        
    });
	
    mega_mart_theme_controls.on('change', '.customizer-repeater-image-choice', function () {
        if (jQuery(this).val() === 'customizer_repeater_image') {
            jQuery(this).parent().parent().find('.social-repeater-general-control-icon').hide();
            jQuery(this).parent().parent().find('.customizer-repeater-image-control').show();
            jQuery(this).parent().parent().find('.customizer-repeater-color-control').prev().prev().hide();
            jQuery(this).parent().parent().find('.customizer-repeater-color-control').hide();

        }
        if (jQuery(this).val() === 'customizer_repeater_icon') {
            jQuery(this).parent().parent().find('.social-repeater-general-control-icon').show();
            jQuery(this).parent().parent().find('.customizer-repeater-image-control').hide();
            jQuery(this).parent().parent().find('.customizer-repeater-color-control').prev().prev().show();
            jQuery(this).parent().parent().find('.customizer-repeater-color-control').show();
        }
        if (jQuery(this).val() === 'customizer_repeater_none') {
            jQuery(this).parent().parent().find('.social-repeater-general-control-icon').hide();
            jQuery(this).parent().parent().find('.customizer-repeater-image-control').hide();
            jQuery(this).parent().parent().find('.customizer-repeater-color-control').prev().prev().hide();
            jQuery(this).parent().parent().find('.customizer-repeater-color-control').hide();
        }

        mega_mart_customizer_repeater_refresh_general_control_values();
        return false;
    });
    mega_mart_media_upload('.customizer-repeater-custom-media-button');
    jQuery('.custom-media-url').on('change', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
        return false;
    });

    var color_options = {
        change: function(event, ui){
            mega_mart_customizer_repeater_refresh_general_control_values();
        }
    };

    /**
     * This adds a new box to repeater
     *
     */
    mega_mart_theme_controls.on('click', '.customizer-repeater-new-field', function () {
        var split_add_more_button=jQuery(this).text();
        var split_add_more_button_split=split_add_more_button.substr(4, 12);
        var th = jQuery(this).parent();
        var id = 'customizer-repeater-' + mega_mart_customizer_repeater_uniqid();
		
		if(split_add_more_button_split=="Add New Soci")
        {
        if(jQuery('#exist_mega_mart_Social').val()>=6)
        {
        jQuery(".customizer_social_section_premium").show();
        return false;   
        }
         if(jQuery('#exist_mega_mart_Social').val()<6)
        {
         var new_service_add_val=parseInt(jQuery('#exist_mega_mart_Social').val())+1;
         jQuery('#exist_mega_mart_Social').val(new_service_add_val);  
        }
        }
		
		if(split_add_more_button_split=="Add New Slid")
        {
        if(jQuery('#exist_mega_mart_Slider').val()>=4)
        {
        jQuery(".customizer_slider_section_premium").show();
        return false;   
        }
         if(jQuery('#exist_mega_mart_Slider').val()<4)
        {
         var new_service_add_val=parseInt(jQuery('#exist_mega_mart_Slider').val())+1;
         jQuery('#exist_mega_mart_Slider').val(new_service_add_val);  
        }
        }
		
		if(split_add_more_button_split=="Add New Info")
        {
        if(jQuery('#exist_mega_mart_Info').val()>=4)
        {
        jQuery(".customizer_info_section_premium").show();
        return false;   
        }
         if(jQuery('#exist_mega_mart_Info').val()<4)
        {
         var new_service_add_val=parseInt(jQuery('#exist_mega_mart_Info').val())+1;
         jQuery('#exist_mega_mart_Info').val(new_service_add_val);  
        }
        }
		
		 if(split_add_more_button.substr(4, 13)=="Add New Deal1")
        {
        if(jQuery('#exist_mega_mart_Deal1').val()>=3)
        {
        jQuery(".customizer_deal1_upgrade_section").show();
        return false;   
        }
         if(jQuery('#exist_mega_mart_Deal1').val()<3)
        {
         var new_service_add_val=parseInt(jQuery('#exist_mega_mart_Deal1').val())+1;
         jQuery('#exist_mega_mart_Deal1').val(new_service_add_val);  
        }
        }
		
		 if(split_add_more_button.substr(4, 13)=="Add New Deal2")
        {
        if(jQuery('#exist_mega_mart_Deal2').val()>=3)
        {
        jQuery(".customizer_deal2_upgrade_section").show();
        return false;   
        }
         if(jQuery('#exist_mega_mart_Deal2').val()<3)
        {
         var new_service_add_val=parseInt(jQuery('#exist_mega_mart_Deal2').val())+1;
         jQuery('#exist_mega_mart_Deal2').val(new_service_add_val);  
        }
        }
		
		 if(split_add_more_button.substr(4, 13)=="Add New DealS")
        {
        if(jQuery('#exist_mega_mart_DealSlide').val()>=2)
        {
        jQuery(".customizer_dealslide_upgrade_section").show();
        return false;   
        }
         if(jQuery('#exist_mega_mart_DealSlide').val()<2)
        {
         var new_service_add_val=parseInt(jQuery('#exist_mega_mart_DealSlide').val())+1;
         jQuery('#exist_mega_mart_DealSlide').val(new_service_add_val);  
        }
        }
		
         if(split_add_more_button_split=="Add New fSoc")
        {
        if(jQuery('#exist_mega_mart_fSocial').val()>=6)
        {
        jQuery(".customizer_fSocial_section_premium").show();
        return false;   
        }
         if(jQuery('#exist_mega_mart_fSocial').val()<6)
        {
         var new_service_add_val=parseInt(jQuery('#exist_mega_mart_fSocial').val())+1;
         jQuery('#exist_mega_mart_fSocial').val(new_service_add_val);  
        }
        }
		
         if(split_add_more_button_split=="Add New fInf")
        {
        if(jQuery('#exist_mega_mart_fInfo').val()>=4)
        {
        jQuery(".customizer_fInfo_section_premium").show();
        return false;   
        }
         if(jQuery('#exist_mega_mart_fInfo').val()<4)
        {
         var new_service_add_val=parseInt(jQuery('#exist_mega_mart_fInfo').val())+1;
         jQuery('#exist_mega_mart_fInfo').val(new_service_add_val);  
        }
        }
		
         if(split_add_more_button_split=="Add New Paym")
        {
        if(jQuery('#exist_mega_mart_Payment').val()>=6)
        {
        jQuery(".customizer_payment_section_premium").show();
        return false;   
        }
         if(jQuery('#exist_mega_mart_Payment').val()<6)
        {
         var new_service_add_val=parseInt(jQuery('#exist_mega_mart_Payment').val())+1;
         jQuery('#exist_mega_mart_Payment').val(new_service_add_val);  
        }
        }
		
         if(split_add_more_button_split=="Add New Test")
        {
        if(jQuery('#exist_mega_mart_Testimonial').val()>=3)
        {
        jQuery(".customizer_testimonial_upgrade_section").show();
        return false;   
        }
         if(jQuery('#exist_mega_mart_Testimonial').val()<3)
        {
         var new_service_add_val=parseInt(jQuery('#exist_mega_mart_Testimonial').val())+1;
         jQuery('#exist_mega_mart_Testimonial').val(new_service_add_val);  
        }
        }
		
         if(split_add_more_button_split=="Add New Bran")
        {
        if(jQuery('#exist_mega_mart_Brand').val()>=3)
        {
        jQuery(".customizer_brand_upgrade_section").show();
        return false;   
        }
         if(jQuery('#customizer_brand_upgrade_section').val()<3)
        {
         var new_service_add_val=parseInt(jQuery('#customizer_brand_upgrade_section').val())+1;
         jQuery('#customizer_brand_upgrade_section').val(new_service_add_val);  
        }
        }
		
        if (typeof th !== 'undefined') {
            /* Clone the first box*/
            var field = th.find('.customizer-repeater-general-control-repeater-container:first').clone( true, true );

            if (typeof field !== 'undefined') {
                /*Set the default value for choice between image and icon to icon*/
                field.find('.customizer-repeater-image-choice').val('customizer_repeater_icon');

                /*Show icon selector*/
                field.find('.social-repeater-general-control-icon').show();

                /*Hide image selector*/
                if (field.find('.social-repeater-general-control-icon').length > 0) {
                    field.find('.customizer-repeater-image-control').hide();
                }

                /*Show delete box button because it's not the first box*/
                field.find('.social-repeater-general-control-remove-field').show();

                /* Empty control for icon */
                field.find('.input-group-addon').find('.fa').attr('class', 'fa');


                /*Remove all repeater fields except first one*/

                field.find('.customizer-repeater-social-repeater').find('.customizer-repeater-social-repeater-container').not(':first').remove();
                field.find('.customizer-repeater-social-repeater-link').val('');
                field.find('.social-repeater-socials-repeater-colector').val('');

                /*Remove value from icon field*/
                field.find('.icp').val('');

                /*Remove value from text field*/
                field.find('.customizer-repeater-text-control').val('');

                /*Remove value from link field*/
                field.find('.customizer-repeater-link-control').val('');

                /*Remove value from text field*/
                field.find('.customizer-repeater-text2-control').val('');

                /*Remove value from link field*/
                field.find('.customizer-repeater-link2-control').val('');
				
                /*Remove value from text field*/
                field.find('.customizer-repeater-text3-control').val('');

                /*Remove value from link field*/
                field.find('.customizer-repeater-link3-control').val('');
				
                /*Remove value from text field*/
                field.find('.customizer-repeater-text4-control').val('');

                /*Remove value from link field*/
                field.find('.customizer-repeater-link4-control').val('');
				
                /*Remove value from text field*/
                field.find('.customizer-repeater-text5-control').val('');

                /*Remove value from link field*/
                field.find('.customizer-repeater-link5-control').val('');
				
                /*Remove value from text field*/
                field.find('.customizer-repeater-text6-control').val('');

                /*Remove value from link field*/
                field.find('.customizer-repeater-link6-control').val('');
				
                /*Remove value from text field*/
                field.find('.customizer-repeater-text7-control').val('');

                /*Remove value from link field*/
                field.find('.customizer-repeater-link7-control').val('');
				
				/*Remove value from button field*/
                field.find('.customizer-repeater-button-text-control').val('');
				
                /*Remove value from link field*/
                field.find('.customizer-repeater-button-link-control').val('');
				
				/*Remove value from button field*/
                field.find('.customizer-repeater-button2-text-control').val('');
				
                /*Remove value from link field*/
                field.find('.customizer-repeater-button2-link-control').val('');
				
				/*Set the default value in slide align*/
                field.find('.customizer-repeater-slide-align').val('left');
				
				/*Set the default value in checkbox*/
                field.find('.customizer-repeater-checkbox-enable', '.customizer-repeater-checkbox-enable2', '.customizer-repeater-checkbox-newtab','.customizer-repeater-checkbox-nofollow').val('');
				
                /*Set box id*/
                field.find('.social-repeater-box-id').val(id);

                /*Remove value from media field*/
                field.find('.custom-media-url').val('');

                /*Remove value from title field*/
                field.find('.customizer-repeater-title-control').val('');

                /*Remove value from description field*/
                field.find('.customizer-repeater-description-control').val('');

                /*Remove value from description field*/
                field.find('.customizer-repeater-description2-control').val('');


                /*Remove value from color field*/
                field.find('div.customizer-repeater-color-control .wp-picker-container').replaceWith('<input type="text" class="customizer-repeater-color-control ' + id + '">');
                field.find('input.customizer-repeater-color-control').wpColorPicker(color_options);


                field.find('div.customizer-repeater-color2-control .wp-picker-container').replaceWith('<input type="text" class="customizer-repeater-color2-control ' + id + '">');
                field.find('input.customizer-repeater-color2-control').wpColorPicker(color_options);

                // field.find('.customize-control-notifications-container').remove();


                /*Remove value from subtitle field*/
                field.find('.customizer-repeater-subtitle-control').val('');
				
				 /*Remove value from subtitle field*/
                field.find('.customizer-repeater-subtitle2-control').val('');
				
				 /*Remove value from subtitle field*/
                field.find('.customizer-repeater-subtitle3-control').val('');
				
                /*Remove value from shortcode field*/
                field.find('.customizer-repeater-shortcode-control').val('');

                /*Append new box*/
                th.find('.customizer-repeater-general-control-repeater-container:first').parent().append(field);

                /*Refresh values*/
                mega_mart_customizer_repeater_refresh_general_control_values();
            }

        }
        return false;
    });


    mega_mart_theme_controls.on('click', '.social-repeater-general-control-remove-field', function () {
		var split_delete_button=jQuery(this).text();
        var split_delete_button_split=split_delete_button.substr(8, 12);
        if (typeof    jQuery(this).parent() !== 'undefined') {
            jQuery(this).parent().hide(500, function(){
                jQuery(this).parent().remove();
                mega_mart_customizer_repeater_refresh_general_control_values();
				
				if(split_delete_button_split=="Delete Socia")
                {
                jQuery('#exist_mega_mart_Social').val(parseInt(jQuery('#exist_mega_mart_Social').val())-1);  
                }
				if(split_delete_button_split=="Delete Slide")
                {
                jQuery('#exist_mega_mart_Slider').val(parseInt(jQuery('#exist_mega_mart_Slider').val())-1);  
                }
				if(split_delete_button.substr(8, 11)=="Delete Info")
                {
                jQuery('#exist_mega_mart_Info').val(parseInt(jQuery('#exist_mega_mart_Info').val())-1);  
                }
				if(split_delete_button_split=="Delete Deal1")
                {
                jQuery('#exist_mega_mart_Deal1').val(parseInt(jQuery('#exist_mega_mart_Deal1').val())-1);
                }
				if(split_delete_button_split=="Delete Deal2")
                {
                jQuery('#exist_mega_mart_Deal2').val(parseInt(jQuery('#exist_mega_mart_Deal2').val())-1);
                }
				if(split_delete_button_split=="Delete DealS")
                {
                jQuery('#exist_mega_mart_DealSlide').val(parseInt(jQuery('#exist_mega_mart_DealSlide').val())-1);
                }
				if(split_delete_button_split=="Delete fSoci")
                {
                jQuery('#exist_mega_mart_fSocial').val(parseInt(jQuery('#exist_mega_mart_fSocial').val())-1); 
                }
				if(split_delete_button_split=="Delete fInfo")
                {
                jQuery('#exist_mega_mart_fInfo').val(parseInt(jQuery('#exist_mega_mart_fInfo').val())-1); 
                }
				if(split_delete_button_split=="Delete Payme")
                {
                jQuery('#exist_mega_mart_Payment').val(parseInt(jQuery('#exist_mega_mart_Payment').val())-1); 
                }
				if(split_delete_button_split=="Delete Testi")
                {
                jQuery('#exist_mega_mart_Testimonial').val(parseInt(jQuery('#exist_mega_mart_Testimonial').val())-1); 
                }
				if(split_delete_button_split=="Delete Brand")
                {
                jQuery('#customizer_brand_upgrade_section').val(parseInt(jQuery('#customizer_brand_upgrade_section').val())-1); 
                }
            });
        }
        return false;
    });


    mega_mart_theme_controls.on('keyup', '.customizer-repeater-title-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });

    jQuery('input.customizer-repeater-color-control').wpColorPicker(color_options);
    jQuery('input.customizer-repeater-color2-control').wpColorPicker(color_options);

    mega_mart_theme_controls.on('keyup', '.customizer-repeater-subtitle-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });
	
	 mega_mart_theme_controls.on('keyup', '.customizer-repeater-subtitle2-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });
	
	 mega_mart_theme_controls.on('keyup', '.customizer-repeater-subtitle3-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });
	
    mega_mart_theme_controls.on('keyup', '.customizer-repeater-shortcode-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });

    mega_mart_theme_controls.on('keyup', '.customizer-repeater-text-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });

    mega_mart_theme_controls.on('keyup', '.customizer-repeater-link-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });

    mega_mart_theme_controls.on('keyup', '.customizer-repeater-text2-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });

    mega_mart_theme_controls.on('keyup', '.customizer-repeater-link2-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });

    mega_mart_theme_controls.on('keyup', '.customizer-repeater-text3-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });
	
    mega_mart_theme_controls.on('keyup', '.customizer-repeater-link3-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });
	
    mega_mart_theme_controls.on('keyup', '.customizer-repeater-text4-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });
	
    mega_mart_theme_controls.on('keyup', '.customizer-repeater-link4-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });
	
    mega_mart_theme_controls.on('keyup', '.customizer-repeater-text5-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });
	
    mega_mart_theme_controls.on('keyup', '.customizer-repeater-link5-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });
	
    mega_mart_theme_controls.on('keyup', '.customizer-repeater-text6-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });
	
    mega_mart_theme_controls.on('keyup', '.customizer-repeater-link6-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });
	
    mega_mart_theme_controls.on('keyup', '.customizer-repeater-text7-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });
	
    mega_mart_theme_controls.on('keyup', '.customizer-repeater-link7-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });
	
	mega_mart_theme_controls.on('keyup', '.customizer-repeater-button-text-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });

    mega_mart_theme_controls.on('keyup', '.customizer-repeater-button-link-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });
	
	mega_mart_theme_controls.on('keyup', '.customizer-repeater-button2-text-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });

    mega_mart_theme_controls.on('keyup', '.customizer-repeater-button2-link-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });
	
    mega_mart_theme_controls.on('keyup', '.customizer-repeater-description-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });
	
    mega_mart_theme_controls.on('keyup', '.customizer-repeater-description2-control', function () {
        mega_mart_customizer_repeater_refresh_general_control_values();
    });	
	
    jQuery('.customizer-repeater-checkbox-enable, .customizer-repeater-checkbox-enable2, .customizer-repeater-checkbox-newtab, .customizer-repeater-checkbox-nofollow').on('change', function() {
        const isChecked = jQuery(this).prop('checked');
        console.log('Checkbox changed:', jQuery(this).attr('class'), isChecked);
        jQuery(this).prop('checked', isChecked);
        mega_mart_customizer_repeater_refresh_general_control_values();
    });

	
    /*Drag and drop to change icons order*/

    jQuery('.customizer-repeater-general-control-droppable').sortable({
        axis: 'y',
        update: function () {
            mega_mart_customizer_repeater_refresh_general_control_values();
        }
    });


    /*----------------- Socials Repeater ---------------------*/
    mega_mart_theme_controls.on('click', '.social-repeater-add-social-item', function (event) {
        event.preventDefault();
        var th = jQuery(this).parent();
        var id = 'customizer-repeater-social-repeater-' + mega_mart_customizer_repeater_uniqid();
        if (typeof th !== 'undefined') {
            var field = th.find('.customizer-repeater-social-repeater-container:first').clone( true, true );
            if (typeof field !== 'undefined') {
                field.find( '.icp' ).val('');
                field.find( '.input-group-addon' ).find('.fa').attr('class','fa');
                field.find('.social-repeater-remove-social-item').show();
                field.find('.customizer-repeater-social-repeater-link').val('');
                field.find('.customizer-repeater-social-repeater-id').val(id);
                th.find('.customizer-repeater-social-repeater-container:first').parent().append(field);
            }
        }
        return false;
    });

    mega_mart_theme_controls.on('click', '.social-repeater-remove-social-item', function (event) {
        event.preventDefault();
        var th = jQuery(this).parent();
        var repeater = jQuery(this).parent().parent();
        th.remove();
        mega_mart_customizer_repeater_refresh_social_icons(repeater);
        return false;
    });

    mega_mart_theme_controls.on('keyup', '.customizer-repeater-social-repeater-link', function (event) {
        event.preventDefault();
        var repeater = jQuery(this).parent().parent();
        mega_mart_customizer_repeater_refresh_social_icons(repeater);
        return false;
    });

    mega_mart_theme_controls.on('change', '.customizer-repeater-social-repeater-container .icp', function (event) {
        event.preventDefault();
        var repeater = jQuery(this).parent().parent().parent();
        mega_mart_customizer_repeater_refresh_social_icons(repeater);
        return false;
    });

});

var megamartentityMap = {
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;',
    '"': '&quot;',
    '\'': '&#39;',
    '/': '&#x2F;'
};

function megamartescapeHtml(string) {
    'use strict';
    //noinspection JSUnresolvedFunction
    string = String(string).replace(new RegExp('\r?\n', 'g'), '<br />');
    string = String(string).replace(/\\/g, '&#92;');
    return String(string).replace(/[&<>"'\/]/g, function (s) {
        return megamartentityMap[s];
    });

}