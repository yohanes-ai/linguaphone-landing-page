<?php
/**
 * Zakra footer functions to be hooked
 *
 * @package zakra
 */

if ( ! function_exists( 'zakra_content_end' ) ) :
	/**
	 * Container ends
	 */
	function zakra_content_end() {
		?>
		</div>
		<!-- /.tg-container-->
		</div>
		<!-- /#content-->
		<?php
	}
endif;


if ( ! function_exists( 'zakra_main_end' ) ) :
	/**
	 * Main ends
	 */
	function zakra_main_end() {
		?>
		</main><!-- /#main -->
		<?php
	}
endif;

if ( ! function_exists( 'zakra_footer_start' ) ) :
	/**
	 * Footer starts
	 */
	function zakra_footer_start() {
		?>
		<footer id="colophon" class="site-footer tg-site-footer <?php zakra_footer_class(); ?>">
		<?php
	}
endif;

if ( ! function_exists( 'zakra_footer_widgets' ) ) :
	/**
	 * Footer widgets
	 */
	function zakra_footer_widgets() {
		if ( false === get_theme_mod( 'zakra_footer_widgets_enabled', true ) ) {
			return;
		}
		?>

		<div class="tg-site-footer-widgets">
			<div class="tg-container">
				<?php get_sidebar( 'footer' ); ?>
			</div>
			<!-- /.tg-container-->
		</div>
		<!-- /.tg-site-footer-widgets -->

		<?php
	}
endif;

if ( ! function_exists( 'zakra_footer_bottom_bar' ) ) :
	/**
	 * Footer bar
	 */
	function zakra_footer_bottom_bar() {
		?>

		<div class="tg-site-footer-bar <?php zakra_footer_bar_classes(); ?>">
			<div class="tg-container tg-container--flex tg-container--flex-center">
				<div class="tg-site-footer-section-1">

					<?php
					/**
					 * Hook - zakra_action_footer_bottom_bar
					 *
					 * @hooked zakra_footer_bottom_bar_one - 10
					 */
					do_action( 'zakra_action_footer_bottom_bar_one' );
					?>

				</div>
				<!-- /.tg-site-footer-section-1 -->

				<div class="tg-site-footer-section-2">

					<?php
					/**
					 * Hook - zakra_action_footer_bottom_bar_two
					 *
					 * @hooked zakra_footer_bottom_bar_two - 10
					 */
					do_action( 'zakra_action_footer_bottom_bar_two' );
					?>

				</div>
				<!-- /.tg-site-footer-section-2 -->
			</div>
			<!-- /.tg-container-->
		</div>
		<!-- /.tg-site-footer-bar -->

		<?php
	}
endif;

if ( ! function_exists( 'zakra_footer_bottom_bar_one' ) ) :
	/**
	 * Footer bar section one.
	 */
	function zakra_footer_bottom_bar_one() {

		echo zakra_footer_copyright();

	}
endif;

if ( ! function_exists( 'zakra_footer_bottom_bar_two' ) ) :
	/**
	 * Footer bar section two.
	 */
	function zakra_footer_bottom_bar_two() {

		$section_two = get_theme_mod( 'zakra_footer_bar_section_two', 'none' );

		switch ( $section_two ) {

			case 'menu':
				$menu = get_theme_mod( 'zakra_footer_bar_section_two_menu', 'none' );

				if ( 'none' === $menu ) {
					return;
				}

				wp_nav_menu( array(
					'menu'      => $menu,
					'menu_id'   => 'footer-bar-two-menu',
					'container' => '',
					'depth'     => 1,
					'fallback_cb' => false,
				) );
				break;

			default:
				return;

		}
	}
endif;

if ( ! function_exists( 'zakra_footer_end' ) ) :
	/**
	 * Footer ends
	 */
	function zakra_footer_end() {
		?>
		</footer><!-- #colophon -->
		<?php
	}
endif;

if ( ! function_exists( 'zakra_mobile_navigation' ) ) :
	/**
	 * Adds mobile navigation.
	 */
	function zakra_mobile_navigation() {
		?>
		<nav id="mobile-navigation" class="tg-mobile-navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-primary',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav>
		<!-- /#mobile-navigation-->
		<?php
	}
endif;


if ( ! function_exists( 'zakra_scroll_to_top' ) ) :
	/**
	 * Shows scroll to top
	 */
	function zakra_scroll_to_top() {
		// If scroll to top is disabled.
		if ( false === get_theme_mod( 'zakra_scroll_to_top_enabled', true ) ) {
			return;
		}
		?>

		<a href="" id="tg-scroll-to-top" class="tg-scroll-to-top">
			<i class="tg-icon tg-icon-arrow-up"><span
						class="screen-reader-text"><?php esc_html_e( 'Scroll to top', 'zakra' ); ?></span></i>
		</a>

		<div class="tg-overlay-wrapper"></div>
		<?php
	}
endif;


if ( ! function_exists( 'zakra_page_end' ) ) :
	/**
	 * Page ends
	 */
	function zakra_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
