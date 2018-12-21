<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package zakra
 */

if ( ! function_exists( 'zakra_pingback_header' ) ) :
	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 */
	function zakra_pingback_header() {

		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}

	}
endif;

add_action( 'wp_head', 'zakra_pingback_header' );

if ( ! function_exists( 'zakra_header_class' ) ) :
	/**
	 * Adds css classes into header
	 *
	 * @param string $class css classname.
	 */
	function zakra_header_class( $class = '' ) {

		$classes = array();

		$classes = array_map( 'esc_attr', $classes );

		$classes = apply_filters( 'zakra_header_class', $classes, $class );
		$classes = array_unique( $classes );

		echo join( ' ', $classes ); // WPCS: XSS ok.

	}
endif;

if ( ! function_exists( 'zakra_primary_menu_class' ) ) :
	/**
	 * Adds css classes into primary menu
	 *
	 * @param string $class css classname.
	 */
	function zakra_primary_menu_class( $class = '' ) {

		$classes = array();

		$classes = array_map( 'esc_attr', $classes );

		$classes = apply_filters( 'zakra_primary_menu_class', $classes, $class );
		$classes = array_unique( $classes );

		echo join( ' ', $classes ); // WPCS: XSS ok.

	}
endif;

if ( ! function_exists( 'zakra_footer_class' ) ) :
	/**
	 * Adds css classes into the footer
	 *
	 * @param string $class css classname.
	 */
	function zakra_footer_class( $class = '' ) {

		$classes = array();

		$classes = array_map( 'esc_attr', $classes );

		$classes = apply_filters( 'zakra_footer_class', $classes, $class );
		$classes = array_unique( $classes );

		echo join( ' ', $classes ); // WPCS: XSS ok.

	}
endif;

if ( ! function_exists( 'zakra_footer_widget_cotainer_class' ) ) :
	/**
	 * Adds css classes into the footer widget area
	 *
	 * @param string $class css classname.
	 */
	function zakra_footer_widget_cotainer_class( $class = '' ) {

		$classes = array();

		$classes = array_map( 'esc_attr', $classes );

		$classes = apply_filters( 'zakra_footer_widget_container_class', $classes, $class );
		$classes = array_unique( $classes );

		echo join( ' ', $classes ); // WPCS: XSS ok.

	}
endif;

if ( ! function_exists( 'zakra_footer_bar_classes' ) ) :
	/**
	 * Adds css classes into the footer bar
	 *
	 * @param string $class css classname.
	 */
	function zakra_footer_bar_classes( $class = '' ) {

		$classes = array();

		$classes = array_map( 'esc_attr', $classes );

		$classes = apply_filters( 'zakra_footer_bar_class', $classes, $class );
		$classes = array_unique( $classes );

		echo join( ' ', $classes ); // WPCS: XSS ok.

	}
endif;

if ( ! function_exists( 'zakra_sidebar_class' ) ) :
	/**
	 * Adds css classes into the sidebar
	 *
	 * @param string $class css classname.
	 */
	function zakra_sidebar_class( $class = '' ) {

		$classes = array();

		$classes = array_map( 'esc_attr', $classes );

		$clasess = apply_filters( 'zakra_sidebar_class', $classes, $class );
		$classes = array_unique( $clasess );

		echo join( ' ', $classes ); // WPCS: XSS ok.

	}
endif;

if ( ! function_exists( 'zakra_get_title' ) ) :
	/**
	 * Returns page title.
	 *
	 * @return string
	 */
	function zakra_get_title() {

		if ( is_archive() ) {
			if ( is_category() ) :
				$page_title = single_cat_title( '', false );

			elseif ( is_tag() ) :
				$page_title = single_tag_title( '', false );

			elseif ( is_author() ) :
				/**
				 * Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				 */
				the_post();
				/* translators: %s: author. */
				$page_title = sprintf( esc_html__( 'Author: %s', 'zakra' ), '<span class="vcard">' . get_the_author() . '</span>' );
				/**
				 * Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();

			elseif ( is_day() ) :
				/* translators: %s: day */
				$page_title = sprintf( esc_html__( 'Day: %s', 'zakra' ), '<span>' . get_the_date() . '</span>' );

			elseif ( is_month() ) :
				/* translators: %s: month */
				$page_title = sprintf( esc_html__( 'Month: %s', 'zakra' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

			elseif ( is_year() ) :
				/* translators: %s: year. */
				$page_title = sprintf( esc_html__( 'Year: %s', 'zakra' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

			else :
				$page_title = esc_html__( 'Archives', 'zakra' );

			endif;
		} elseif ( is_404() ) {
			$page_title = esc_html__( 'Page Not Found', 'zakra' );
		} elseif ( is_search() ) {
			$page_title = esc_html__( 'Search Results', 'zakra' );
		} elseif ( is_page() ) {
			$page_title = get_the_title();
		} elseif ( is_single() ) {
			$page_title = get_the_title();
		} elseif ( is_home() ) {
			$queried_id = get_option( 'page_for_posts' );
			$page_title = get_the_title( $queried_id );
		} else {
			$page_title = '';
		}

		return apply_filters( 'zakra_title', $page_title );
	}
endif;

if ( ! function_exists( 'zakra_get_current_layout' ) ) :
	/**
	 * Get the current layout of the page
	 *
	 * @return string layout.
	 */
	function zakra_get_current_layout() {
		$layout = '';
		if ( is_singular( 'post' ) ) {
			$current_post_layout = get_post_meta( get_the_ID(), 'zakra_layout', true );
			if ( isset( $current_post_layout ) && ! empty( $current_post_layout ) && 'tg-site-layout--customizer' !== $current_post_layout ) {
				$layout = $current_post_layout;
			} else {
				$layout = get_theme_mod( 'zakra_structure_post', 'tg-site-layout--default' );
			}

			// Page.
		} elseif ( is_singular( 'page' ) ) {
			$current_page_layout = get_post_meta( get_the_ID(), 'zakra_layout', true );
			if ( isset( $current_page_layout ) && ! empty( $current_page_layout ) && 'tg-site-layout--customizer' !== $current_page_layout ) {
				$layout = $current_page_layout;
			} else {
				$layout = get_theme_mod( 'zakra_structure_page', 'tg-site-layout--default' );
			}
		} elseif ( is_archive() || is_home() ) { // Archive/blog.
			$layout = get_theme_mod( 'zakra_structure_archive', 'tg-site-layout--default' );

			// Default layout.
		} else {
			$layout = get_theme_mod( 'zakra_structure_default', 'tg-site-layout--default' );
		}

		return apply_filters( 'zakra_current_layout', $layout );
	}
endif;

if ( ! function_exists( 'zakra_insert_mod_hatom_data' ) ) :

	/**
	 * Adding the support for the entry-title tag for Google Rich Snippets.
	 *
	 * @param  string $content The post content.
	 *
	 * @return string hatom data.
	 */
	function zakra_insert_mod_hatom_data( $content ) {

		$title = get_the_title();

		if ( is_single() && 'page-header' === zakra_is_page_title_enabled() ) {
			$content .= '<div class="extra-hatom"><span class="entry-title">' . $title . '</span></div>';
		}

		return $content;

	}

	add_filter( 'the_content', 'zakra_insert_mod_hatom_data' );

endif;

if ( ! function_exists( 'zakra_entry_title' ) ) :

	/**
	 * Generate title for page, post, archive.
	 */
	function zakra_entry_title() {

		if ( 'page-header' !== zakra_is_page_title_enabled() || is_front_page() ) {

			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			elseif ( is_archive() ) :
				the_archive_title( '<h1 class="page-title">', '</h1>' );
			elseif ( is_404() ) :
				?>
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'zakra' ); ?></h1>
			<?php
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

		}

	}

endif;

if ( ! function_exists( 'zakra_meta_logo' ) ) :

	/**
	 * Logo from meta box.
	 *
	 * @param int $meta_logo_id ID of the logo image attachment.
	 */
	function zakra_meta_logo( $meta_logo_id ) {

		$meta_logo_attr = array(
			'class'    => 'tg-logo',
			'itemprop' => 'logo',
		);

		// Check for logo image attachment alt attribute.
		$image_alt = get_post_meta( $meta_logo_id, '_wp_attachment_image_alt', true );

		if ( empty( $image_alt ) ) {
			$meta_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
		}
		$logo = wp_get_attachment_image( $meta_logo_id, 'full', false, $meta_logo_attr );

		$html = sprintf( '<a href="%1$s" class="tg-logo-link" rel="home" itemprop="url">%2$s</a>',
			esc_url( home_url( '/' ) ),
			$logo
		);

		echo apply_filters( 'zakra_meta_logo', $html );

	}

endif;

if ( ! function_exists( 'zakra_insert_primary_menu_item' ) ) :

	/**
	 * Get search icon in primary menu list.
	 *
	 * @param  string $items Menu html.
	 * @param  object $args  Menu arguments.
	 *
	 * @return string Menu HTML.
	 */
	function zakra_insert_primary_menu_item( $items, $args ) {

		if ( 'menu-primary' === $args->theme_location ) {

			$items .= zakra_search_icon_menu_item();

			if ( class_exists( 'WooCommerce' ) ) {
				$items .= zakra_woocommerce_header_cart();
			}

		}

		return $items;

	}


endif;
add_filter( 'wp_nav_menu_items', 'zakra_insert_primary_menu_item', 10, 2 );

if ( ! function_exists( 'zakra_menu_fallback' ) ) :

	/**
	 * Menu fallback for primary menu.
	 *
	 * Contains wp_list_pages to display pages created,
	 * search icons and WooCommerce cart icon.
	 *
	 */
	function zakra_menu_fallback() {
		$output = '';
		$output .= '<div id="primary-menu" class="menu-primary">';
		$output .= '<ul>';

		$output .= wp_list_pages(
			array(
				'echo'     => false,
				'title_li' => false,
			)
		);

		$output .= zakra_search_icon_menu_item();

		if ( class_exists( 'WooCommerce' ) ) {
			$output .= zakra_woocommerce_header_cart();
		}

		$output .= '</ul>';
		$output .= '</div>';

		echo $output;
	}

endif;
