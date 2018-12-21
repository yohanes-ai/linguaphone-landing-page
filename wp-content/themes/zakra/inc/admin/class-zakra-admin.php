<?php
/**
 * Admin pages class.
 *
 * @package Zakra
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class Zakra_Admin
 */
class Zakra_Admin {

	/**
	 * Zakra_Admin constructor.
	 */
	public function __construct() {

		$this->add_about_page();
		add_action( 'load-themes.php', array( $this, 'admin_notice' ) );
		add_action( 'wp_loaded', array( __CLASS__, 'hide_notices' ) );

	}

	/**
	 * setup config for about page.
	 */
	public function add_about_page() {

		$config = array(
			'menu_name'       => apply_filters( 'zakra_about_page_filter', __( 'About Zakra', 'zakra' ), 'menu_name' ),
			'page_name'       => apply_filters( 'zakra_about_page_filter', __( 'About Zakra', 'zakra' ), 'page_name' ),
			'welcome_content' => apply_filters( 'zakra_about_page_filter', __( 'Zakra is beautifully designed clean WordPress blog theme. Easy to setup and has a nice set of features that make your site stand out. It is suitable for personal, fashion, food, travel, business, professional, niche and any kind of blogging sites. Comes with various demos for various purposes, which you can easily import with the help of ThemeGrill Demo Importer plugin.', 'zakra' ), 'page_name' ),
			/* translators: s - theme name */
			'welcome_title'   => apply_filters( 'zakra_about_page_filter', sprintf( __( 'Welcome to %s! : Version ', 'zakra' ), 'Zakra' ), 'welcome_title' ),
			'tabs'            => array(
				'getting_started'     => __( 'Getting Started', 'zakra' ),
				'recommended_plugins' => __( 'Recommended Plugins', 'zakra' ),
				'support'             => __( 'Support', 'zakra' ),
				'changelog'           => __( 'Changelog', 'zakra' ),
				'site_library'        => __( 'Site Library', 'zakra' ),
			),

			'getting_started' => array(
				'one'   => array(
					'title'          => esc_html__( 'One click demo import', 'zakra' ),
					'text'           => esc_html__( 'Get whole site on just one click.', 'zakra' ),
					'button_label'   => esc_html__( 'Install and Activate', 'zakra' ),
					'button_link'    => 'themegrill-demo-importer',
					'is_button'      => true,
					'install_button' => true,
				),
				'two'   => array(
					'title'        => esc_html__( 'Recommended plugins', 'zakra' ),
					'text'         => esc_html__( 'Boost your site adding plugins.', 'zakra' ),
					'button_label' => esc_html__( 'Recommended plugins', 'zakra' ),
					'button_link'  => esc_url( '#recommended_plugins' ),
					'is_button'    => false,
				),
				'three' => array(
					'title'        => esc_html__( 'Documentation', 'zakra' ),
					'text'         => esc_html__( 'Please view our documentation page to setup the theme.', 'zakra' ),
					'button_label' => esc_html__( 'Documentation', 'zakra' ),
					'button_link'  => 'http://docs.themegrill.com/zakra',
					'is_button'    => false,
				),
				'four'  => array(
					'title'        => esc_html__( 'Theme Customizer', 'zakra' ),
					'text'         => esc_html__( 'All Theme Options are available via Customize screen.', 'zakra' ),
					'button_label' => esc_html__( 'Customizer', 'zakra' ),
					'button_link'  => esc_url( admin_url( 'customize.php' ) ),
					'is_button'    => true,
				),
			),

			'recommended_plugins' => array(
				'content' => array(
					array(
						'slug' => 'themegrill-demo-importer',
					),
					array(
						'slug' => 'elementor',
					),
					array(
						'slug' => 'everest-forms',
					),
					array(
						'slug' => 'social-icons',
					),
					array(
						'slug' => 'easy-social-sharing',
					),
				),
			),

			'support' => array(

				'one' => array(
					'title'        => esc_html__( 'Documentation', 'zakra' ),
					'text'         => esc_html__( 'Please view our documentation page to setup the theme.', 'zakra' ),
					'button_label' => esc_html__( 'Documentation', 'zakra' ),
					'button_link'  => 'http://docs.themegrill.com/zakra',
					'is_button'    => false,
				),
				'two' => array(
					'title'        => esc_html__( 'Got theme support question?', 'zakra' ),
					'text'         => esc_html__( 'Please put it in our dedicated support forum.', 'zakra' ),
					'button_label' => esc_html__( 'Support Forum', 'zakra' ),
					'button_link'  => 'http://themegrill.com/support-forum/',
					'is_button'    => false,
				),

			),

			'site_library' => array(

				'one' => array(
					'title'        => esc_html__( 'Documentation', 'zakra' ),
					'text'         => esc_html__( 'Please view our documentation page to setup the theme.', 'zakra' ),
					'button_label' => esc_html__( 'Documentation', 'zakra' ),
					'button_link'  => 'http://docs.themegrill.com/zakra',
					'is_button'    => false,
				),
				'two' => array(
					'title'        => esc_html__( 'Got theme support question?', 'zakra' ),
					'text'         => esc_html__( 'Please put it in our dedicated support forum.', 'zakra' ),
					'button_label' => esc_html__( 'Support Forum', 'zakra' ),
					'button_link'  => 'http://themegrill.com/support-forum/',
					'is_button'    => false,
				),

			)

		);

		// Process the config for about page.
		Zakra_About_Page::init( apply_filters( 'zakra_about_page_array', $config ) );

	}


	/**
	 * Add admin notice.
	 */
	public function admin_notice() {
		global $pagenow;

		wp_enqueue_style( 'zakra-message', get_template_directory_uri() . '/inc/admin/css/message.css', array(), ZAKRA_THEME_VERSION );

		// Let's bail on theme activation.
		if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
			update_option( 'zakra_admin_notice_welcome', 1 );

			// No option? Let run the notice wizard again..
		} elseif ( ! get_option( 'zakra_admin_notice_welcome' ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
		}
	}

	/**
	 * Hide a notice if the GET variable is set.
	 */
	public static function hide_notices() {
		if ( isset( $_GET['zakra-hide-notice'] ) && isset( $_GET['_zakra_notice_nonce'] ) ) {
			if ( ! wp_verify_nonce( $_GET['_zakra_notice_nonce'], 'zakra_hide_notices_nonce' ) ) {
				wp_die( __( 'Action failed. Please refresh the page and retry.', 'zakra' ) );
			}

			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( __( 'Cheatin&#8217; huh?', 'zakra' ) );
			}

			$hide_notice = sanitize_text_field( $_GET['zakra-hide-notice'] );
			update_option( 'zakra_admin_notice_' . $hide_notice, 1 );
		}
	}

	/**
	 * Show welcome notice.
	 */
	public function welcome_notice() {
		?>
		<div id="message" class="updated zakra-message">
			<a class="zakra-message-close notice-dismiss"
			   href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'zakra-hide-notice', 'welcome' ) ), 'zakra_hide_notices_nonce', '_zakra_notice_nonce' ) ); ?>"><?php esc_html_e( 'Dismiss', 'zakra' ); ?></a>
			<p><?php printf( esc_html__( 'Welcome! Thank you for choosing Zakra! To fully take advantage of the best our theme can offer please make sure you visit our %swelcome page%s.', 'zakra' ), '<a href="' . esc_url( admin_url( 'themes.php?page=zakra-about' ) ) . '">', '</a>' ); ?></p>
			<p class="submit">
				<a class="button-secondary"
				   href="<?php echo esc_url( admin_url( 'themes.php?page=zakra-about' ) ); ?>"><?php esc_html_e( 'Get started with Zakra', 'zakra' ); ?></a>
			</p>
		</div>
		<?php
	}

}

$admin = new Zakra_Admin();
