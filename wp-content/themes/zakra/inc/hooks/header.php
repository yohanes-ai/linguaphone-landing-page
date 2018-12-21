<?php
/**
 * Zakra header functions to be hooked
 *
 * @package zakra
 */

if ( ! function_exists( 'zakra_doctype' ) ) :
	/**
	 * Header doctype
	 */
	function zakra_doctype() {
		?>
		<!doctype html>
		<html <?php language_attributes(); ?>>
		<?php
	}
endif;

if ( ! function_exists( 'zakra_head' ) ) :
	/**
	 * HTML head
	 */
	function zakra_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php
	}
endif;

if ( ! function_exists( 'zakra_page_start' ) ) :
	/**
	 * Page starts
	 */
function zakra_page_start() {
	?>
<div id="page" class="site tg-site">
	<?php
}
endif;

if ( ! function_exists( 'zakra_skip_content_link' ) ) :
	/**
	 * Skip to content
	 */
	function zakra_skip_content_link() {
		?>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'zakra' ); ?></a>
		<?php
	}
endif;

if ( ! function_exists( 'zakra_transparent_header_start' ) ) :
	/**
	 * Transparent header starts
	 */
function zakra_transparent_header_start() {
if ( get_theme_mod( 'zakra_header_transparency_enable', false ) ) {
	?>

	<div class="tg-header-transparent-wrapper">

	<?php
}
}
endif;


if ( ! function_exists( 'zakra_header_start' ) ) :
	/**
	 * Header starts
	 */
function zakra_header_start() {
	?>

	<header id="masthead" class="site-header tg-site-header <?php zakra_header_class(); ?>">

	<?php
}
endif;

/*========================================== HEADER TOP ==========================================*/

if ( ! function_exists( 'zakra_header_top' ) ) :
	/**
	 * Header top.
	 */
	function zakra_header_top() {
		if ( ( false === get_theme_mod( 'zakra_header_top_enabled', true ) ||
			( 'none' === get_theme_mod( 'zakra_header_top_left_content', 'text_html' ) && 'none' === get_theme_mod( 'zakra_header_top_right_content', 'text_html' ) ) ) ) {
			return;
		}

		?>
		<div class="tg-site-header-top">
			<div class="tg-header-container tg-container tg-container--flex tg-container--flex-center">
				<div class="tg-header-top-left-content">

					<?php
					/**
					 * Hook - zakra_action_header_top_left_content
					 *
					 * @hooked zakra_header_top_left_content - 10
					 */
					do_action( 'zakra_action_header_top_left_content' );
					?>

				</div>
				<!-- /.tg-header-top-left-content -->
				<div class="tg-header-top-right-content">

					<?php
					/**
					 * Hook - zakra_action_header_top_right_content
					 *
					 * @hooked zakra_header_top_right_content - 10
					 */
					do_action( 'zakra_action_header_top_right_content' );
					?>

				</div>
				<!-- /.tg-header-top-right-content -->
			</div>
			<!-- /.tg-container -->
		</div>
		<!-- /.tg-site-header-top -->

		<?php
	}
endif;

if ( ! function_exists( 'zakra_header_top_left_content' ) ) :
	/**
	 * Header top left content.
	 */
	function zakra_header_top_left_content() {

		$left_content = get_theme_mod( 'zakra_header_top_left_content', 'text_html' );

		switch ( $left_content ) {

			case 'text_html':
				$text_html = get_theme_mod( 'zakra_header_top_left_content_html', '' );
				echo wp_kses_post( $text_html );
				break;

			case 'menu':
				$menu = get_theme_mod( 'zakra_header_top_left_content_menu', 'none' );

				if ( 'none' === $menu ) {
					return;
				}

				wp_nav_menu( array(
					'menu'      => $menu,
					'menu_id'   => 'header-top-left-menu',
					'container' => '',
				) );
				break;

			case 'widget':
				if ( is_active_sidebar( 'header-top-left-sidebar' ) ) {
					dynamic_sidebar( 'header-top-left-sidebar' );
				}

				break;

			default:
				return;

		}

	}
endif;

if ( ! function_exists( 'zakra_header_top_right_content' ) ) :
	/**
	 * Header top right content.
	 */
	function zakra_header_top_right_content() {

		$right_content = get_theme_mod( 'zakra_header_top_right_content', 'menu' );

		switch ( $right_content ) {

			case 'text_html':
				$text_html = get_theme_mod( 'zakra_header_top_right_content_html', '' );
				echo wp_kses_post( $text_html );
				break;

			case 'menu':
				$menu = get_theme_mod( 'zakra_header_top_right_content_menu', 'none' );

				if ( 'none' === $menu ) {
					return;
				}

				wp_nav_menu( array(
					'menu'      => $menu,
					'menu_id'   => 'header-top-right-menu',
					'container' => '',
				) );

				break;

			case 'widget':
				if ( is_active_sidebar( 'header-top-right-sidebar' ) ) {
					dynamic_sidebar( 'header-top-right-sidebar' );
				}

				break;

			default:
				return;

		}

	}
endif;

/*========================================== HEADER MAIN ==========================================*/

if ( ! function_exists( 'zakra_before_header_main' ) ) :
	/**
	 * Before header main.
	 */
function zakra_before_header_main() {
	?>

	<div class="tg-site-header-bottom">
	<div class="tg-header-container tg-container tg-container--flex tg-container--flex-center tg-container--flex-space-between">

	<?php
}
endif;

if ( ! function_exists( 'zakra_header_main_site_branding' ) ) :
	/**
	 * Site branding.
	 */
	function zakra_header_main_site_branding() {
		?>
		<div class="site-branding">
			<?php
			// Check for meta logo.
			$meta_logo_id = ! is_home() ? intval( get_post_meta( get_the_ID(), 'zakra_logo', true ) ) : '';

			if ( $meta_logo_id ) {
				zakra_meta_logo( $meta_logo_id );
			} else {
				the_custom_logo();
			}

			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
			else :
				?>
				<p class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</p>
			<?php
			endif;

			$zakra_description = get_bloginfo( 'description', 'display' );

			if ( $zakra_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $zakra_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>

		</div><!-- .site-branding -->
		<?php
	}
endif;

if ( ! function_exists( 'zakra_header_main_site_navigation' ) ) :
	/**
	 * Site navigation.
	 */
	function zakra_header_main_site_navigation() {
		// Bail out if the menu is disabled from customizer.
		if ( true === get_theme_mod( 'zakra_primary_menu_disabled', false ) ) {
			return;
		}
		?>
		<nav id="site-navigation" class="main-navigation tg-primary-menu <?php zakra_primary_menu_class(); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'menu-primary',
					'menu_id'         => 'primary-menu',
					'menu_class'      => 'menu-primary',
					'container_class' => 'menu',
					'fallback_cb'     => 'zakra_menu_fallback'
				)
			);
			?>
		</nav><!-- #site-navigation -->
		<?php
	}
endif;

if ( ! function_exists( 'zakra_header_main_action' ) ) :
	/**
	 * Header Action.
	 */
	function zakra_header_main_action() {
		$mobile_menu_label = get_theme_mod( 'zakra_mobile_menu_text', '' );
		?>
		<nav id="header-action" class="tg-header-action">
			<ul class="tg-header-action-list">

				<li class="tg-header-action__item tg-mobile-toggle">
					<i class="tg-icon tg-icon-bars"><?php echo esc_html( $mobile_menu_label ); ?></i>
				</li>
				<!-- /.tg-mobile-toggle -->
			</ul>
			<!-- /.zakra-header-action-list -->
		</nav><!-- #header-action -->
		<?php
	}
endif;

if ( ! function_exists( 'zakra_after_header_main' ) ) :
	/**
	 * After header main.
	 */
function zakra_after_header_main() {
	?>
	</div>
	<!-- /.tg-container -->
	</div>
	<!-- /.tg-site-header-bottom -->
	<?php
}
endif;

if ( ! function_exists( 'zakra_header_end' ) ) :
	/**
	 * Header ends.
	 */
function zakra_header_end() {
	?>
	</header><!-- #masthead -->
	<?php
}
endif;

if ( ! function_exists( 'zakra_transparent_header_end' ) ) :
	/**
	 * Transparent header ends
	 */
function zakra_transparent_header_end() {
	if ( get_theme_mod( 'zakra_header_transparency_enable', false ) ) {
		?>

		</div> <!-- /.tg-header-transparent-wrapper -->

		<?php
	}
}
endif;

if ( ! function_exists( 'zakra_header_media_markup' ) ) :
	/**
	 * Header media tag.
	 */
	function zakra_header_media_markup() {

		the_custom_header_markup();

	}
endif;


if ( ! function_exists( 'zakra_main_start' ) ) :
	/**
	 * Page main section starts.
	 */
function zakra_main_start() {
	?>
	<main id="main" class="site-main">
	<?php
}
endif;

if ( ! function_exists( 'zakra_page_header' ) ) :
	/**
	 * Page header.
	 */
	function zakra_page_header() {

		$page_header_meta = get_post_meta( get_the_ID(), 'zakra_page_header' );

		// Return, if page header is disabled from customizer.
		if ( ( 'page-header' !== zakra_is_page_title_enabled() && ! zakra_is_breadcrumbs_enabled() )
			|| ( isset( $page_header_meta[0] ) && ! $page_header_meta[0] )
			|| is_front_page() ) {
			return;
		}

		$allowed_markup = array( 'h1', 'h2', 'h3', 'h3', 'h4', 'h5', 'h6', 'span', 'p', 'div' );
		$markup         = get_theme_mod( 'zakra_page_title_markup', 'h1' );
		$style          = get_theme_mod( 'zakra_page_title_alignment', 'tg-page-header--left' );
		// If the markup doesn't match the allowed one set default one.
		if ( ! in_array( $markup, $allowed_markup, true ) ) {
			$markup = 'h1';
		}

		// Finale.
		$markup = apply_filters( 'zakra_page_header_markup', $markup );

		do_action( 'zakra_before_page_header' );
		?>

		<header class="tg-page-header <?php echo esc_attr( $style ); ?>">
			<div class="tg-container tg-container--flex tg-container--flex-center tg-container--flex-space-between">
				<?php
				if ( 'page-header' === zakra_is_page_title_enabled() ) {
					// Page header title.
					echo sprintf(
						'<%1$s class="tg-page-header__title">%2$s</%1$s>',
						esc_attr( $markup ),
						wp_kses_post( zakra_get_title() )
					);
				}
				?>

				<?php
				// Page header breadcrumbs.
				if ( function_exists( 'breadcrumb_trail' ) && true === get_theme_mod( 'zakra_breadcrumbs_enabled', true ) ) {
					breadcrumb_trail( array( 'show_browse' => false ) );
				}
				?>
			</div>
		</header>
		<!-- /.page-header -->
		<?php
		do_action( 'zakra_after_page_header' );
	}

endif;

if ( ! function_exists( 'zakra_content_start' ) ) :
	/**
	 * Container starts.
	 */
	function zakra_content_start() {
		?>
		<div id="content" class="site-content">
			<div class="tg-container tg-container--flex tg-container--flex-space-between">
		<?php
	}
endif;
