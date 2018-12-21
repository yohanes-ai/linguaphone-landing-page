<?php
/**
 * Zakra functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package zakra
 */

if ( ! function_exists( 'zakra_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function zakra_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on zakra, use a find and replace
		 * to change 'zakra' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'zakra', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-primary' => esc_html__( 'Primary', 'zakra' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Custom background support.
		 */
		add_theme_support( 'custom-background' );

		/**
		 * Gutenberg Wide/fullwidth support.
		 */
		add_theme_support( 'align-wide' );

	}
endif;
add_action( 'after_setup_theme', 'zakra_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zakra_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'zakra_content_width', 640 );
}

add_action( 'after_setup_theme', 'zakra_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zakra_widgets_init() {
	$sidebars = array(
		'header-top-left-sidebar'  => esc_html__( 'Header Top Bar Left Sidebar', 'zakra' ),
		'header-top-right-sidebar' => esc_html__( 'Header Top Bar Right Sidebar', 'zakra' ),
		'sidebar-right'            => esc_html__( 'Sidebar Right', 'zakra' ),
		'sidebar-left'             => esc_html__( 'Sidebar Left', 'zakra' ),
		'footer-sidebar-1'         => esc_html__( 'Footer One', 'zakra' ),
		'footer-sidebar-2'         => esc_html__( 'Footer Two', 'zakra' ),
		'footer-sidebar-3'         => esc_html__( 'Footer Three', 'zakra' ),
		'footer-sidebar-4'         => esc_html__( 'Footer Four', 'zakra' ),
	);

	foreach ( $sidebars as $id => $name ) :

		register_sidebar( array(
			'id'            => $id,
			'name'          => $name,
			'description'   => esc_html__( 'Add widgets here.', 'zakra' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

	endforeach;

}

add_action( 'widgets_init', 'zakra_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function zakra_scripts() {
	wp_enqueue_style( 'zakra-style', get_stylesheet_uri() );

	wp_enqueue_script( 'zakra-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'zakra-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'zakra-custom', get_template_directory_uri() . '/assets/js/zakra-custom.js', array(), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'zakra_scripts' );

/**
 * Define constants
 */
// Root path/URI.
define( 'ZAKRA_PARENT_DIR', get_template_directory() );
define( 'ZAKRA_PARENT_URI', get_template_directory_uri() );

// Include path/URI.
define( 'ZAKRA_PARENT_INC_DIR', ZAKRA_PARENT_DIR . '/inc' );
define( 'ZAKRA_PARENT_INC_URI', ZAKRA_PARENT_URI . '/inc' );

// Icons path.
define( 'ZAKRA_PARENT_INC_ICON_URI', ZAKRA_PARENT_URI . '/assets/img/icons' );
// Customizer path.
define( 'ZAKRA_PARENT_CUSTOMIZER_DIR', ZAKRA_PARENT_INC_DIR . '/customizer' );

// Theme version.
$zakra_theme = wp_get_theme();
define( 'ZAKRA_THEME_VERSION', $zakra_theme->get( 'Version' ) );

/**
 * Helper functions.
 */
require ZAKRA_PARENT_INC_DIR . '/helpers.php';

/**
 * Implement the Custom Header feature.
 */
require ZAKRA_PARENT_INC_DIR . '/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require ZAKRA_PARENT_INC_DIR . '/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require ZAKRA_PARENT_INC_DIR . '/template-functions.php';

/**
 * Customizer additions.
 */
require ZAKRA_PARENT_INC_DIR . '/customizer/class-zakra-customizer.php';
require ZAKRA_PARENT_INC_DIR . '/class-zakra-css-classes.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require ZAKRA_PARENT_INC_DIR . '/jetpack.php';
}

/**
 * WooCommerce hooks and functions.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require ZAKRA_PARENT_INC_DIR . '/woocommerce.php';
}

/**
 * Load hooks.
 */
require ZAKRA_PARENT_INC_DIR . '/hooks/hooks.php';
require ZAKRA_PARENT_INC_DIR . '/hooks/header.php';
require ZAKRA_PARENT_INC_DIR . '/hooks/footer.php';

/**
 * Breadcrumbs class.
 */
require_once ZAKRA_PARENT_INC_DIR . '/class-breadcrumb-trail.php';

/**
 * Metaboxes.
 */
require ZAKRA_PARENT_INC_DIR . '/meta-boxes/class-zakra-meta-box-page-settings.php';
require ZAKRA_PARENT_INC_DIR . '/meta-boxes/class-zakra-meta-box.php';

/**
 * Theme options page.
 */
if ( is_admin() ) {
	require ZAKRA_PARENT_INC_DIR . '/admin/about-page/class-zakra-plugin-install-helper.php';
	require ZAKRA_PARENT_INC_DIR . '/admin/about-page/class-zakra-about-page.php';
	require ZAKRA_PARENT_INC_DIR . '/admin/class-zakra-admin.php';
	require ZAKRA_PARENT_INC_DIR . '/admin/about-page/class-zakra-site-library.php';
}
