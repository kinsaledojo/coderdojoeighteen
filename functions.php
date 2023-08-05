<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

if ( ! function_exists( 'coderdojo_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function coderdojo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Twenty-One, use a find and replace
		 * to change 'twentytwentyone' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'coderdojo', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails', array( 'post', 'sushi-deck', 'belt', 'badge', 'event' ) );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
			    'desktop-navigation-menu' => __( 'Desktop Navigation Menu' ),
			    'mobile-navigation-menu' => __( 'Mobile Navigation Menu' ),
			    'footer-social-links' => __( 'Footer Social Links' ),
			    'footer-menu-one' => __( 'Footer Menu One' ),
			    'footer-menu-two' => __( 'Footer Menu Two' ),
			    'footer-menu-three' => __( 'Footer Menu Three' ),
			    'footer-menu-four' => __( 'Footer Menu Four' )
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		add_theme_support( 'editor-styles' );
    	$editor_stylesheet_path = './assets/css/editor-style.css';

		// Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );
	}
}
add_action( 'after_setup_theme', 'coderdojo_setup' );

/**
 * Register widget areas.
 *
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function coderdojo_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar One', 'coderdojo' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'coderdojo' ),
			'before_widget' => '<section id="sidebar-one" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar Two', 'coderdojo' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'coderdojo' ),
			'before_widget' => '<section id="sidebar-two" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'coderdojo_widgets_init' );

/**
 * Register and Enqueue Styles.
 */
function coderdojo_register_styles() {

    $theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'coderdojo-style', get_stylesheet_uri(), array(), $theme_version );
    //wp_style_add_data( 'coderdojo-style', 'rtl', 'replace' );

    // Add print CSS.
    //wp_enqueue_style( 'coderdojo-print-style', get_template_directory_uri() . '/print.css', null, $theme_version, 'print' );
}
add_action( 'wp_enqueue_scripts', 'coderdojo_register_styles' );

/**
 * Register and Enqueue Scripts.
 */
function coderdojo_register_scripts() {

    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script( 'coderdojo-js', get_template_directory_uri() . '/assets/js/index.js', array(), $theme_version, false );
	wp_script_add_data( 'coderdojo-js', 'async', true );
}
add_action( 'wp_enqueue_scripts', 'coderdojo_register_scripts' );

require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/custom-functions.php';

require get_template_directory() . '/inc/custom-user-roles.php';
add_action( 'admin_init', 'coderdojo_add_user_roles' );
add_filter('user_contactmethods', 'my_user_contactmethods');

require get_template_directory() . '/inc/custom-post-types.php';
//add_action( 'init', 'register_custom_post_types' );

//require get_template_directory() . '/inc/custom-rewrite-rules.php';
//add_filter('post_type_link', 'coderdojo_filter_post_link', 10, 2 );


//add_filter('generate_rewrite_rules', 'coderdojo_rewrite_rules');

//require get_template_directory() . '/inc/custom-users.php';


function coderdojo_register_template() {
    $post_type_object = get_post_type_object( 'page' );
    $post_type_object->template = array(
		array( 'core/group', array(
			'className' => 'hero-section has-white-color has-text-color has-background',
			'align' => 'full'
		), array(
			array( 'core/paragraph', array(
				'placeholder' => 'Add a root-level paragraph',
				'align' => 'center',
			) ),
			array( 'core/columns', array(), array(
				array( 'core/column', array(), array(
					array( 'core/image', array() ),
				) ),
				array( 'core/column', array(), array(
					array( 'core/image', array() ),
				) ),
				array( 'core/column', array(), array(
					array( 'core/image', array() ),
				) ),
			) )
		) ),
		array( 'core/group', array(
			'className' => 'has-background',
			'align' => 'full'
		) ),
		array( 'core/group', array(
			'className' => 'has-background has-grey-background',
			'align' => 'full'
		), array(
			array( 'core/heading', array(
				'placeholder' => 'Heading',
				'textAlign' => 'center',
				'level' => 2,
			) ),
			array( 'core/paragraph', array(
				'placeholder' => 'Add a root-level paragraph',
				'align' => 'center',
			) ),
			array( 'core/columns', array(), array(
				array( 'core/column', array('className' => 'card'), array(
					array( 'core/image', array() ),
					array( 'core/heading', array('textAlign' => 'center', 'level' => 3,) ),
					array( 'core/paragraph', array('align' => 'center',) ),
				) ),
				array( 'core/column', array('className' => 'card'), array(
					array( 'core/image', array() ),
					array( 'core/heading', array('textAlign' => 'center', 'level' => 3,) ),
					array( 'core/paragraph', array('align' => 'center',) ),
				) ),
				array( 'core/column', array('className' => 'card'), array(
					array( 'core/image', array() ),
					array( 'core/heading', array('textAlign' => 'center', 'level' => 3,) ),
					array( 'core/paragraph', array('align' => 'center',) ),
				) ),
			) )
		) ),
	);
}
add_action( 'init', 'coderdojo_register_template' );

add_action( 'enqueue_block_editor_assets', function() {
    wp_enqueue_style( 'coderdojo-custom-block-editor-styles', get_template_directory_uri() . '/assets/css/editor-style.css');
} );









