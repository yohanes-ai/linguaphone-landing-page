<?php
/**
 * Admin about page class, generates from Zakra_Admin config.
 *
 * @package Zakra
 */

/**
 * Class Zakra_About_Page
 */
class Zakra_About_Page {

	/**
	 * Used for loading the texts and setup the actions inside the page.
	 *
	 * @var array $config The configuration array for the theme used.
	 */
	public $config;
	/**
	 * Get the theme name using wp_get_theme.
	 *
	 * @var string $theme_name The theme name.
	 */
	private $theme_name;
	/**
	 * Get the theme slug ( theme folder name ).
	 *
	 * @var string $theme_slug The theme slug.
	 */
	private $theme_slug;
	/**
	 * The current theme object.
	 *
	 * @var WP_Theme $theme The current theme.
	 */
	private $theme;
	/**
	 * Holds the theme version.
	 *
	 * @var string $theme_version The theme version.
	 */
	private $theme_version;
	/**
	 * Define the menu item name for the page.
	 *
	 * @var string $menu_name The name of the menu name under Appearance settings.
	 */
	private $menu_name;
	/**
	 * Define the page title name.
	 *
	 * @var string $page_name The title of the About page.
	 */
	private $page_name;

	/**
	 * Define the html notification content displayed upon activation.
	 *
	 * @var string $notification The html notification content.
	 */
	private $notification;
	/**
	 * The single instance of Zakra_About_Page
	 *
	 * @var Zakra_About_Page $instance The Zakra_About_Page instance.
	 */
	private static $instance;

	/**
	 * Zakra_About_Page instance.
	 *
	 * @param array $config Configuration for About page.
	 */
	public static function init( $config ) {

		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Zakra_About_Page ) ) {

			self::$instance = new Zakra_About_Page();

			if ( ! empty( $config ) && is_array( $config ) ) {

				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();

			}

		}

	}

	public function setup_config() {

		$theme = wp_get_theme();

		if ( is_child_theme() ) {
			if ( method_exists( $theme->parent(), 'get' ) ) {
				$this->theme_name = $theme->parent()->get( 'Name' );
			}
			$this->theme = $theme->parent();
		} else {
			$this->theme_name = $theme->get( 'Name' );
			$this->theme      = $theme->parent();
		}

		$this->theme_version = $theme->get( 'Version' );

		$this->theme_slug   = $theme->get_template();
		$this->menu_name    = isset( $this->config['menu_name'] ) ? $this->config['menu_name'] : 'About ' . $this->theme_name;
		$this->page_name    = isset( $this->config['page_name'] ) ? $this->config['page_name'] : 'About ' . $this->theme_name;
		$this->notification = isset( $this->config['notification'] ) ? $this->config['notification'] : ( apply_filters( 'tg_welcome_notice_filter', ( '<p>' . sprintf( 'Welcome! Thank you for choosing %1$s! To fully take advantage of the best our theme can offer please make sure you visit our %2$swelcome page%3$s.', $this->theme_name, '<a href="' . esc_url( admin_url( 'themes.php?page=' . $this->theme_slug . '-welcome' ) ) . '">', '</a>' ) . '</p><p><a href="' . esc_url( admin_url( 'themes.php?page=' . $this->theme_slug . '-welcome' ) ) . '" class="button" style="text-decoration: none;">' . sprintf( 'Get started with %s', $this->theme_name ) . '</a></p>' ) ) );
		$this->tabs         = isset( $this->config['tabs'] ) ? $this->config['tabs'] : array();

	}

	public function setup_actions() {

		add_action( 'admin_menu', array( $this, 'register' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

	}

	public function register() {

		if ( ! empty( $this->menu_name ) && ! empty( $this->page_name ) ) {

			$title = $this->page_name;

			add_theme_page(
				$this->menu_name, $title, 'activate_plugins', $this->theme_slug . '-about', array(
					$this,
					'about_page_render',
				)
			);
		}

	}

	public function enqueue() {

		$current_screen = get_current_screen();
		if ( ! isset( $current_screen->id ) || $current_screen->id !== 'appearance_page_' . $this->theme_slug . '-about' ) {
			return;
		}

		wp_enqueue_style( 'zakra-about-page-css', get_template_directory_uri() . '/inc/admin/css/about-page.css', array(), ZAKRA_THEME_VERSION );

		wp_enqueue_script(
			'zakra-about-page-js', get_template_directory_uri() . '/inc/admin/js/about-page.js',
			array(
				'jquery',
				'jquery-ui-tabs',
			),
			ZAKRA_THEME_VERSION
		);

		wp_enqueue_style( 'plugin-install' );
		wp_enqueue_script( 'plugin-install' );
		wp_enqueue_script( 'updates' );

		wp_localize_script(
			'zakra-about-page-js', 'tiAboutPageObject', array(
				'ajaxurl'            => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'activating_string'  => esc_html__( 'Activating', 'zakra' ),
			)
		);

		Zakra_Plugin_Install_Helper::instance()->enqueue_scripts();

	}

	public function about_page_render() {

		$this->render_header();
		$this->render_tabs();

	}

	private function render_header() {

		if ( ! empty( $this->config['welcome_title'] ) ) {
			$title = $this->config['welcome_title'];
		}

		if ( ! empty( $this->config['welcome_content'] ) ) {
			$content = $this->config['welcome_content'];
		}

		if ( empty( $title ) && empty( $content ) ) {
			return;
		}

		echo '<div class="wrap about-wrap full-width-layout">';

		echo '<div class="header">';
		echo '<div class="info">';
		if ( ! empty( $title ) ) {
			echo '<h1>';
			echo esc_html( $title );
			if ( ! empty( $this->theme_version ) ) {
				echo '<span class="version-container">' . esc_html( $this->theme_version ) . '</span>';
			}
			echo '</h1>';
		}

		if ( ! empty( $content ) ) {
			echo '<div class="tg-about-text about-text">' . wp_kses_post( $content ) . '</div></div>';
		}

		echo '<a href="https://themegrill.com/" target="_blank" class="wp-badge tg-welcome-logo"></a>';
		echo '</div>';

	}

	private function render_tabs() {

		if ( empty( $this->tabs ) ) {
			return;
		}

		$count = 0;
		?>

		<div id="about_tabs">
			<ul class="nav-tab-wrapper wp-clearfix">
				<?php
				foreach ( $this->tabs as $tab_id => $tab_name ) {
					?>
					<li style="margin-bottom: 0;" data-tab-id="<?php echo esc_attr( $tab_id ); ?>"><a class="nav-tab"
																									  href="#<?php echo esc_attr( $tab_id ); ?>"><?php echo wp_kses_post( $tab_name ); ?></a>
					</li>
				<?php } ?>
			</ul>

			<?php
			foreach ( $this->tabs as $tab_id => $tab_name ) {
				?>
				<div id="<?php echo esc_attr( $tab_id ); ?>">
					<?php call_user_func( array( $this, $tab_id . '_render' ) ); ?>
				</div>
			<?php } ?>
		</div>

		<?php
	}

	/* ===============================
		Render Tab contents
	 * =============================== */

	/**
	 * Getting started tab content
	 */
	public function getting_started_render() {

		if ( ! empty( $this->config['getting_started'] ) ) {

			$getting_started = $this->config['getting_started'];

			if ( ! empty( $getting_started ) ) {

				echo '<div class="feature-section three-col">';

				foreach ( $getting_started as $key => $getting_started_item ) {

					echo '<div class="col">';
					if ( ! empty( $getting_started_item['title'] ) ) {
						echo '<h3>' . $getting_started_item['title'] . '</h3>';
					}
					if ( ! empty( $getting_started_item['text'] ) ) {
						$install      = new Zakra_Plugin_Install_Helper();
						$plugin_state = $install->get_plugin_state( 'themegrill-demo-importer' );
						if ( 'deactivate' === $plugin_state && 'one' === $key ) {
							echo '<p>' . esc_html__( 'Go to demo importer page', 'zakra' ) . '</p>';
						} else {
							echo '<p>' . $getting_started_item['text'] . '</p>';
						}
					}
					if ( ! empty( $getting_started_item['button_link'] ) && ! empty( $getting_started_item['button_label'] ) ) {

						echo '<p>';
						if ( isset( $getting_started_item['install_button'] ) && true === $getting_started_item['install_button'] ) {
							echo Zakra_Plugin_Install_Helper::instance()->get_button_html( $getting_started_item['button_link'] );
						} else {
							$this->display_button( $getting_started_item );
						}

						echo '</p>';
					}

					echo '</div><!-- .col -->';
				}
				echo '</div>';
			}
		}

	}

	public function recommended_plugins_render() {

		$recommended_plugins = $this->config['recommended_plugins'];
		if ( empty( $recommended_plugins['content'] ) || ! is_array( $recommended_plugins['content'] ) ) {
			return;
		}

		echo '<div id="plugin-filter" class="recommended-plugins">';

		foreach ( $recommended_plugins['content'] as $recommended_plugins_item ) {

			if ( empty( $recommended_plugins_item['slug'] ) ) {
				continue;
			}

			$plugin_info = $this->call_plugin_api( $recommended_plugins_item['slug'] );
			$banner      = $plugin_info->banners['low'];
			$active      = $this->check_if_plugin_active( $recommended_plugins_item['slug'] );

			echo '<div class="plugin_box">';

			if ( ! empty( $banner ) ) {
				echo '<img class="plugin-banner" src="' . esc_url( $banner ) . '"/>';
			}

			if ( ! empty( $plugin_info->name ) ) {
				?>
				<div class="title-action-wrapper">
					<span class="plugin-name"><?php echo esc_html( $plugin_info->name ) ?></span>
					<?php
					echo '<div  class="button-wrap">';
					echo '<span class="plugin-card-' . esc_attr( $recommended_plugins_item['slug'] ) . ' action_button ' . ( ( $active['needs'] !== 'install' && $active['status'] ) ? 'active' : '' ) . '">';
					echo Zakra_Plugin_Install_Helper::instance()->get_button_html( $recommended_plugins_item['slug'] );
					echo '</span>';

					echo '</div>';
					?>
				</div>
				<?php
			}

			echo '</div>';

		}

		echo '</div>';

	}

	public function support_render() {

		if ( ! empty( $this->config['support'] ) ) {

			$support = $this->config['support'];

			if ( ! empty( $support ) ) {

				echo '<div class="support-section two-col">';

				foreach ( $support as $support_item ) {


					echo '<div class="col">';
					if ( ! empty( $support_item['title'] ) ) {
						echo '<h3>' . $support_item['title'] . '</h3>';
					}
					if ( ! empty( $support_item['text'] ) ) {
						echo '<p>' . $support_item['text'] . '</p>';
					}
					if ( ! empty( $support_item['button_link'] ) && ! empty( $support_item['button_label'] ) ) {

						echo '<p>';
						if ( isset( $support_item['install_button'] ) && true === $support_item['install_button'] ) {
							echo Zakra_Plugin_Install_Helper::instance()->get_button_html( $support_item['button_link'] );
						} else {
							$this->display_button( $support_item );
						}

						echo '</p>';
					}

					echo '</div><!-- .col -->';
				}
				echo '</div>';
			}
		}

	}

	public function site_library_render() {

		if ( ! empty( $this->config['site_library'] ) ) {

			$site_library = $this->config['site_library'];

			if ( ! empty( $site_library ) ) {
				?>
				<div class="site-library-section three-col">
					<div class="tg-site-library-top">
						<h3><?php esc_html_e( 'Want to import any of the demos below?', 'zakra' ); ?></h3>
						<?php
						$install      = new Zakra_Plugin_Install_Helper();
						$plugin_state = $install->get_plugin_state( 'themegrill-demo-importer' );
						if ( 'deactivate' === $plugin_state ) {
							?>
							<p><?php esc_html_e( 'Go to demo importer page', 'zakra' ) ?></p>
							<?php
						} else {
							?>
							<p><?php esc_html_e( 'Needs ThemeGrill Demo Importer plugin', 'zakra' ) ?></p>
						<?php } ?>
						<?php echo Zakra_Plugin_Install_Helper::instance()->get_button_html( 'themegrill-demo-importer' ); ?>
					</div>
					<?php
					echo Zakra_Site_Library::zakra_site_library_page_content();
					?>
				</div>
				<?php
			}
		}

	}

	public function free_pro_render() {

	}

	public function changelog_render() {

		global $wp_filesystem;

		?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'zakra' ); ?></p>

			<?php
			$changelog_file = apply_filters( 'zakra_changelog_file', get_template_directory() . '/readme.txt' );

			// Check if the changelog file exists and is readable.
			if ( $changelog_file && is_readable( $changelog_file ) ) {
				WP_Filesystem();
				$changelog      = $wp_filesystem->get_contents( $changelog_file );
				$changelog_list = $this->parse_changelog( $changelog );

				echo wp_kses_post( $changelog_list );
			}
			?>
		</div>
		<?php

	}

	private function parse_changelog( $content ) {

		$matches   = null;
		$regexp    = '~==\s*Changelog\s*==(.*)($)~Uis';
		$changelog = '';

		if ( preg_match( $regexp, $content, $matches ) ) {
			$changes = explode( '\r\n', trim( $matches[1] ) );

			$changelog .= '<pre class="changelog">';

			foreach ( $changes as $index => $line ) {
				$changelog .= wp_kses_post( preg_replace( '~(=\s*Version\s*(\d+(?:\.\d+)+)\s*=|$)~Uis', '<span class="title">${1}</span>', $line ) );
			}

			$changelog .= '</pre>';
		}

		return wp_kses_post( $changelog );

	}

	public function call_plugin_api( $slug ) {

		include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );

		$call_api = get_transient( 'zakra_about_plugin_info_' . $slug );

		if ( false === $call_api ) {
			$call_api = plugins_api(
				'plugin_information', array(
					'slug'   => $slug,
					'fields' => array(
						'downloaded'        => false,
						'rating'            => false,
						'description'       => false,
						'short_description' => true,
						'donate_link'       => false,
						'tags'              => false,
						'sections'          => true,
						'homepage'          => true,
						'added'             => false,
						'last_updated'      => false,
						'compatibility'     => false,
						'tested'            => false,
						'requires'          => false,
						'downloadlink'      => false,
						'icons'             => true,
						'banners'           => true,
					),
				)
			);
			set_transient( 'zakra_about_plugin_info_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
		}

		return $call_api;

	}

	public function display_button( $data ) {

		$button_new_tab = '_self';
		$button_class   = '';
		if ( isset( $tab_data['is_new_tab'] ) ) {
			if ( $data['is_new_tab'] ) {
				$button_new_tab = '_blank';
			}
		}

		if ( $data['is_button'] ) {
			$button_class = 'button button-primary';
		}
		echo '<a target="' . $button_new_tab . '" href="' . $data['button_link'] . '"class="' . esc_attr( $button_class ) . '">' . $data['button_label'] . '</a>';

	}

	/**
	 * Check if plugin is active
	 *
	 * @param plugin-slug $slug the plugin slug.
	 *
	 * @return array
	 */
	public function check_if_plugin_active( $slug ) {

		$plugin_link_suffix = Zakra_Plugin_Install_Helper::get_plugin_path( $slug );
		$path               = WPMU_PLUGIN_DIR . '/' . $plugin_link_suffix;
		if ( ! file_exists( $path ) ) {
			$path = WP_PLUGIN_DIR . '/' . $plugin_link_suffix;
			if ( ! file_exists( $path ) ) {
				$path = false;
			}
		}

		if ( file_exists( $path ) ) {

			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

			$needs = is_plugin_active( $plugin_link_suffix ) ? 'deactivate' : 'activate';

			return array(
				'status' => is_plugin_active( $plugin_link_suffix ),
				'needs'  => $needs,
			);
		}

		return array(
			'status' => false,
			'needs'  => 'install',
		);
	}

}
