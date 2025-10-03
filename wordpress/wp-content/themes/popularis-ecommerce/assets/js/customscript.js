( function ( $ ) {

    $( document ).ready( function () {

        var $myDiv = $( '#my-menu' );
        $( ".toggle" ).click( function ( e ) {
            setTimeout( function () {
                $( '.nav-close-button' ).filter( ':visible' ).focus();
            }, 200 );
            e.preventDefault();
        } );

        if ( $myDiv.length ) {
            $( '#my-menu' ).hcOffcanvasNav( {
                disableAt: 768,
                customToggle: $( '.toggle' ),
                levelTitles: false,
                levelTitleAsBack: false,
                pushContent: $( '.page-wrap' )
            } );
        }


        // Menu
        function onResizeMenuLayout() {
            if ( $( window ).width() > 767 ) {
                $( ".dropdown" ).hover(
                    function () {
                        $( this ).addClass( 'open' )
                    },
                    function () {
                        $( this ).removeClass( 'open' )
                    }
                );
                $( ".dropdown" ).focusin(
                    function () {
                        $( this ).addClass( 'open' )
                    }
                );
                $( ".dropdown" ).focusout(
                    function () {
                        $( this ).removeClass( 'open' )
                    }
                );
                $( '.site-heading-logo' ).appendTo( '.site-heading-wrap' );
            } else {
                $( ".dropdown" ).hover(
                    function () {
                        $( this ).removeClass( 'open' )
                    }
                );
                $( '.site-heading-logo' ).appendTo( '.mobile-logo' );
            }
        }
        ;
        // initial state
        onResizeMenuLayout();
        // on resize
        $( window ).on( 'resize', onResizeMenuLayout );

        $( '.navbar .dropdown-toggle' ).hover( function () {
            $( this ).addClass( 'disabled' );
        } );
        $( '.navbar .dropdown-toggle' ).focus( function () {
            $( this ).addClass( 'disabled' );
        } );
    } );
} )( jQuery );