/* Only run scrips when the page is fully loaded */
document.addEventListener( 'DOMContentLoaded', function() {
	function mobileNavigation() {
		var menu = document.getElementById( 'mobile-navigation' ),
			toggleButton = document.querySelector( '.tg-mobile-toggle' ),
			listItems = menu.querySelectorAll(
				'li.page_item_has_children, li.menu-item-has-children'
			),
			overlayWrapper = document.querySelector( '.tg-overlay-wrapper' ),
			listItem,
			subMenuButton,
			subMenuToggle;

		/* Toggle mobile menu */
		if ( toggleButton && menu ) {
			toggleButton.addEventListener( 'click', function() {
				this.classList.toggle( 'tg-mobile-toggle--opened' );
				menu.classList.toggle( 'tg-mobile-navigation--opened' );

				if ( overlayWrapper ) {
					overlayWrapper.classList.toggle( 'overlay-show' );
				}
			} );
		}

		// close menu when clicked outside
		if ( overlayWrapper ) {
			overlayWrapper.addEventListener( 'click', function() {
				this.classList.toggle( 'overlay-show' );
				toggleButton.classList.toggle( 'tg-mobile-toggle--opened' );
				menu.classList.toggle( 'tg-mobile-navigation--opened' );
			} );
		}

		/* Sub Menu toggle */
		if ( listItems ) {
			for ( i = 0; i < listItems.length; i++ ) {

				/* Add submenu toggle button */
				subMenuButton = document.createElement( 'span' );
				subMenuButton.classList.add( 'tg-submenu-toggle' );

				listItem = listItems[i];
				listItem.appendChild( subMenuButton );

				/* Select the subMenutoggle */
				subMenuToggle = listItem.querySelector( '.tg-submenu-toggle' );

				subMenuToggle.addEventListener( 'click', function( e ) {
					e.preventDefault();
					this.parentNode.classList.toggle( 'submenu--show' );
				} );
			}
		}
	}

	/**
	 * Scroll to top button.
	 */
	function scrollToTop() {
		var scrollToTopButton = document.getElementById( 'tg-scroll-to-top' );

		/* Only proceed when the button is present. */
		if ( scrollToTopButton ) {

			/* On scroll and show and hide button. */
			window.addEventListener( 'scroll', function() {
				if ( 500 < window.scrollY ) {
					scrollToTopButton.classList.add( 'tg-scroll-to-top--show' );
				} else if ( 500 > window.scrollY ) {
					scrollToTopButton.classList.remove(
						'tg-scroll-to-top--show'
					);
				}
			} );

			/* Scroll to top when clicken on button. */
			scrollToTopButton.addEventListener( 'click', function( e ) {
				e.preventDefault();

				/* Only scroll to top if we are not in top */
				if ( 0 != window.scrollY ) {
					window.scrollTo( {
						top: 0,
						behavior: 'smooth'
					} );
				}
			} );
		}
	}

	/**
	 * Show hide search form.
	 */
	function showSearchForm() {
		var searchIcon = document.querySelector( '.tg-menu-item-search .tg-icon-search' );

		// Show search form on icon click.
		if ( null !== searchIcon ) {
			searchIcon.addEventListener( 'click', function( e ) {
				e.preventDefault();
				this.parentNode.parentNode.classList.toggle( 'show-search' );
			} );
		}
	}

	showSearchForm();
	mobileNavigation();
	scrollToTop();
} );
