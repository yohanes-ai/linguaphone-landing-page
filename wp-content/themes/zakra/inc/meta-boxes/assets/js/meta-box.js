jQuery( function( $ ) {

	/**
	 * Tabs.
	 */
	$( '#page-settings-tabs-wrapper' ).tabs();

	/**
	 * Logo Uploader meta.
	 */
	var frame,
		metaBox = $( '#tg-logo-wrapper' ), // Your meta box id here
		addImgLink = metaBox.find( '.upload-custom-img' ),
		delImgLink = metaBox.find( '.delete-custom-img' ),
		imgContainer = metaBox.find( '.tg-logo-holder' ),
		imgIdInput = metaBox.find( '#tg-logo' );

	addImgLink.on( 'click', function( event ) {

		event.preventDefault();

		if( frame ) {
			frame.open();
			return;
		}

		frame = wp.media( {
			title: 'Select or Upload Media Of Your Chosen Persuasion',
			button: {
				text: 'Use this logo'
			},
			library: {
				type: ['image']
			},
			multiple: false
		} );

		frame.on( 'select', function() {

			var attachment = frame.state().get( 'selection' ).first().toJSON();

			imgContainer.append( '<img src="' + attachment.url + '" alt="" style="max-width:100%;"/>' );

			imgIdInput.val( attachment.id );

			addImgLink.addClass( 'hidden' );

			delImgLink.removeClass( 'hidden' );
		} );

		frame.open();
	} );

	delImgLink.on( 'click', function( event ) {

		event.preventDefault();

		imgContainer.html( '' );

		addImgLink.removeClass( 'hidden' );

		delImgLink.addClass( 'hidden' );

		imgIdInput.val( '' );

	} );

	/**
	 * Color Picker.
	 */
	function initColorPicker( metabox ) {
		metabox.find( '.tg-color-picker' ).wpColorPicker();
	}

	$( '#page-settings-tabs-wrapper:has(.tg-color-picker)' ).each( function() {
		initColorPicker( $( this ) );
	} );

} );
