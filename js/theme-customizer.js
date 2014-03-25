wp.customize( 'tcx_footer_copyright_text', function( value ) {
	value.bind( function( to ) {
		$( '#copy' ).text( to );
	});
});

