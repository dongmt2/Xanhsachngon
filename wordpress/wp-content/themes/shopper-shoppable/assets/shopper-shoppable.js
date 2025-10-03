(function($) {
    'use strict';

    /**
     * Traps focus inside a given element to improve accessibility.
     * @param {jQuery} elem The element to trap focus within.
     */
    const trapFocusInsiders = function(elem) {
        const tabbable = elem.find('select, input, textarea, button, a').filter(':visible');
        const firstTabbable = tabbable.first();
        const lastTabbable = tabbable.last();

        // Set focus on the first input.
        firstTabbable.focus();

        // Redirect last tab to the first input.
        lastTabbable.on('keydown', function(e) {
            if (e.key === 'Tab' && !e.shiftKey) {
                e.preventDefault();
                firstTabbable.focus();
            }
        });

        // Redirect first shift+tab to the last input.
        firstTabbable.on('keydown', function(e) {
            if (e.key === 'Tab' && e.shiftKey) {
                e.preventDefault();
                lastTabbable.focus();
            }
        });

        // Allow the escape key to close the element.
        elem.on('keyup', function(e) {
            if (e.key === 'Escape') {
                elem.hide();
            }
        });
    };

    $(function() {
        // Search modal functionality.
        const searchModal = $('#search-bar');
        const searchTrigger = $('.search-overlay-trigger');
        const searchClose = $('.appw-modal-close-button');

        if (searchTrigger.length) {
            searchTrigger.on('click', function(e) {
                e.preventDefault();
                searchModal.addClass('active');
                trapFocusInsiders(searchModal);
            });

            searchClose.on('click', function() {
                searchModal.removeClass('active');
                searchTrigger.focus();
            });
        }

        // Magnific Popup initialization.
        const imagePopups = $('a.image-popup');
        if (imagePopups.length) {
            imagePopups
                .removeClass('thickbox')
                .addClass('magnificPopup')
                .magnificPopup({
                    type: 'image'
                });
        }

        // Initialize AOS (Animate On Scroll) library.
        AOS.init();
    });
})(jQuery);