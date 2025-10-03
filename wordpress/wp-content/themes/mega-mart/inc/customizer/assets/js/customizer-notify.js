/**
 * Customizer notification system
 */


(function (api) {

	api.sectionConstructor['mega-mart-customizer-notify-section'] = api.Section.extend(
		{

			// No events for this type of section.
			attachEvents: function () {
			},

			// Always make the section active.
			isContextuallyActive: function () {
				return true;
			}
		}
	);

})( wp.customize );

jQuery( document ).ready(
	function () {

		jQuery( '.mega-mart-customizer-notify-dismiss-recommended-action' ).click(
			function () {

				var id = jQuery( this ).attr( 'id' ),
				action = jQuery( this ).attr( 'data-action' );
				jQuery.ajax(
					{
						type: 'GET',
						data: {action: 'mega_mart_customizer_notify_dismiss_action', id: id, todo: action},
						dataType: 'html',
						url: MegaMartCustomizercompanionObject.mega_mart_ajaxurl,
						beforeSend: function () {
							jQuery( '#' + id ).parent().append( '<div id="temp_load" style="text-align:center"><img src="' + MegaMartCustomizercompanionObject.mega_mart_base_path + '/images/spinner-2x.gif" /></div>' );
						},
						success: function (data) {
							var container          = jQuery( '#' + data ).parent().parent();
							var index              = container.next().data( 'index' );
							var recommended_sction = jQuery( '#accordion-section-ti_customizer_notify_recomended_actions' );
							var actions_count      = recommended_sction.find( '.mega-mart-customizer-plugin-notify-actions-count' );
							var section_title      = recommended_sction.find( '.section-title' );
							jQuery( '.mega-mart-customizer-plugin-notify-actions-count .current-index' ).text( index );
							container.slideToggle().remove();
							if (jQuery( '.mega-mart-theme-recomended-actions_container > .epsilon-recommended-actions' ).length === 0) {

								actions_count.remove();

								if (jQuery( '.mega-mart-theme-recomended-actions_container > .epsilon-recommended-plugins' ).length === 0) {
									jQuery( '.control-section-ti-customizer-notify-recomended-actions' ).remove();
								} else {
									section_title.text( section_title.data( 'plugin_text' ) );
								}

							}
						},
						error: function (jqXHR, textStatus, errorThrown) {
							console.log( jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown );
						}
					}
				);
			}
		);

jQuery( '.mega-mart-customizer-notify-dismiss-button-recommended-plugin' ).click(
	function () {
		var id = jQuery( this ).attr( 'id' ),
		action = jQuery( this ).attr( 'data-action' );
		jQuery.ajax(
			{
				type: 'GET',
				data: {action: 'mega_mart_customizer_notify_dismiss_recommended_plugins', id: id, todo: action},
				dataType: 'html',
				url: MegaMartCustomizercompanionObject.mega_mart_ajaxurl,
				beforeSend: function () {
					jQuery( '#' + id ).parent().append( '<div id="temp_load" style="text-align:center"><img src="' + MegaMartCustomizercompanionObject.mega_mart_base_path + '/images/spinner-2x.gif" /></div>' );
				},
				success: function (data) {
					var container = jQuery( '#' + data ).parent().parent();
					var index     = container.next().data( 'index' );
					jQuery( '.mega-mart-customizer-plugin-notify-actions-count .current-index' ).text( index );
					container.slideToggle().remove();

					if (jQuery( '.mega-mart-theme-recomended-actions_container > .epsilon-recommended-plugins' ).length === 0) {
						jQuery( '.control-section-mega-mart-customizer-notify-section' ).remove();
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {
					console.log( jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown );
				}
			}
		);
	}
);

		// Remove activate button and replace with activation in progress button.
		
		// Select the target node to observe (usually the body or a specific container)
			const targetNode = document.body;

			// Create a MutationObserver instance
			const observer = new MutationObserver(function (mutationsList) {
				for (let mutation of mutationsList) {
					if (mutation.type === 'childList') {
						// Check if any added nodes have the class .activate-now
						mutation.addedNodes.forEach(node => {
							if (node.nodeType === 1 && node.classList.contains('activate-now')) {
								handleActivateNow(node);
							}
						});
					}
				}
			});

			// Configuration for the observer (observe direct children and all descendants)
			const config = {
				childList: true,
				subtree: true
			};

			// Start observing
			observer.observe(targetNode, config);

			// Function to handle the plugin activation
			function handleActivateNow(activateButton) {
				const url = jQuery(activateButton).attr('href');
				if (typeof url !== 'undefined') {
					jQuery.ajax({
						beforeSend: function () {
							jQuery(activateButton).replaceWith(
								'<a class="button updating-message">' +
								MegaMartCustomizercompanionObject.mega_mart_activating_string +
								'...</a>'
							);
						},
						async: true,
						type: 'GET',
						url: url,
						success: function () {
							location.reload();
						}
					});
				}
			}

	}
);

					
					
/**
 * Remove activate button and replace with activation in progress button.
 *
 * @package Mega Mart 
 */


jQuery( document ).ready(
	function ($) {
		$( 'body' ).on(
			'click', ' .mega-mart-install-plugin ', function () {
				var slug = $( this ).attr( 'data-slug' );

				wp.updates.installPlugin(
					{
						slug: slug
					}
				);
				return false;
			}
		);

		$( '.activate-now' ).on(
			'click', function (e) {
				
				var activateButton = $( this );
				e.preventDefault();
				if ($( activateButton ).length) {
					var url = $( activateButton ).attr( 'href' );

					if (typeof url !== 'undefined') {
						// Request plugin activation.
						$.ajax(
							{
								beforeSend: function () {
									$( activateButton ).replaceWith( '<a class="button updating-message">'+"activating"+'...</a>' );
								},
								async: true,
								type: 'GET',
								url: url,
								success: function () {
									// Reload the page.
									location.reload();
								}
							}
						);
					}
				}
			}
		);
	}
);
