( function( api ) {

	// Extends our custom "e-storefront" section.
	api.sectionConstructor['e-storefront'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );