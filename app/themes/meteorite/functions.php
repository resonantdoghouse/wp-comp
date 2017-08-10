<?php
/**
 * Meteorite functions and definitions.
 *
 * @package Meteorite
 */

if ( ! function_exists( 'meteorite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function meteorite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Meteorite, use a find and replace
	 * to change 'meteorite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'meteorite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Enable custom logo function since WP Version 4.5
	add_theme_support( 'custom-logo' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	* Add Support for Custom Fields, Meteorite needs it for parallax header text.
	*/
	add_theme_support( 'custom-fields' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('meteorite-large-thumb', 830);
	add_image_size('meteorite-medium-thumb', 550, 400, true);
	add_image_size('meteorite-small-thumb', 75, 75, true);
	add_image_size('meteorite-tiny-thumb', 50, 50, true);

	// This theme uses wp_nav_menu() in four location.
	register_nav_menus( array(
		'topbar' => esc_html__( 'Topbar', 'meteorite' ),
		'primary' => esc_html__( 'Primary', 'meteorite' ),
		'footer' => esc_html__( 'Footer', 'meteorite' ),
		'404_pages' => esc_html__( '404 Menu', 'meteorite' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'meteorite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	//Terra Themes Tools support
	add_theme_support( 'terra-themes-tools-post-types', array( 'clients', 'employees', 'projects', 'slides' , 'testimonials', 'timeline' ) );

}
endif;
add_action( 'after_setup_theme', 'meteorite_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function meteorite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'meteorite_content_width', 1170 );
}
add_action( 'after_setup_theme', 'meteorite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function meteorite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar default', 'meteorite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar left', 'meteorite' ),
		'id'            => 'sidebar-left',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	//Footer widget areas
	$widget_areas = get_theme_mod('footer_widget_areas', '3');
	for ($i=1; $i<=$widget_areas; $i++) {
		register_sidebar( array(
			'name'          => esc_html__( 'Footer ', 'meteorite' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'meteorite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function meteorite_scripts() {
	if ( get_theme_mod('disable_google_fonts') != 1 ) :
		if ( get_theme_mod('headings_font_name') != '' ) {
			wp_enqueue_style( 'meteorite-headings-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('headings_font_name')) ); 
		} else {
			wp_enqueue_style( 'meteorite-headings-fonts', '//fonts.googleapis.com/css?family=Libre+Franklin:400,400italic,600,600italic'); 
		}

		if ( get_theme_mod('body_font_name') != '' ) {
			wp_enqueue_style( 'meteorite-body-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('body_font_name')) ); 
		} else {
			wp_enqueue_style( 'meteorite-body-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,600,600italic');
		}
	endif;

	wp_enqueue_style( 'meteorite-style', get_stylesheet_uri() );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );	

	wp_enqueue_script( 'meteorite-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '', true );

	wp_enqueue_script( 'meteorite-main', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'meteorite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.js', array(), '', true );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'imagesloaded' );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'meteorite_scripts' );

/**
 * Enqueue Bootstrap
 */
function meteorite_enqueue_bootstrap() {
	wp_enqueue_style( 'meteorite-bootstrap', get_template_directory_uri() . '/assets/bootstrap/bootstrap.min.css', array(), true );
	wp_enqueue_script( 'meteorite-bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/bootstrap.min.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'meteorite_enqueue_bootstrap', 9 );

/**
 * Enqueue Mediaelementplayer css
 */
function meteorite_enqueue_mediaelementplayer() {
	wp_enqueue_style( 'meteorite-mediaelementplayer', get_template_directory_uri() . '/assets/mediaelementplayer/mediaelementplayer.min.css', array(), true );
}
add_action( 'wp_enqueue_scripts', 'meteorite_enqueue_mediaelementplayer', 9 );

/**
 * Enqueue Owlcarousel transition css
 */
function meteorite_enqueue_owlcarouselcss() {
	wp_enqueue_style( 'meteorite-owlcarousel', get_template_directory_uri() . '/assets/owlcarousel/owl.transitions.css', array(), true );
}
add_action( 'wp_enqueue_scripts', 'meteorite_enqueue_owlcarouselcss' );

/**
 * Registers an editor stylesheet for the theme.
 */
function meteorite_add_editor_styles() {
    add_editor_style( 'assets/custom-editor-style.css' );
}
add_action( 'admin_init', 'meteorite_add_editor_styles' );

/**
 * Menu fallback
 */
function meteorite_menu_fallback() {
	if ( current_user_can('edit_theme_options') ) {
		echo '<li class="li-placeholder"><a class="menu-fallback" href="' . esc_url( admin_url('nav-menus.php') ) . '">' . __( 'Create your menu here', 'meteorite' ) . '</a></li>';
	}
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Functions
 */
require get_template_directory() . '/inc/functions/loader.php';

/**
* Custom styles through customizer.
*/
require get_template_directory() . '/inc/styles.php';

/**
* SVG for text with icon widget.
*/
require get_template_directory() . '/inc/svg.php';

/**
* Post options for pages
*/
require get_template_directory() . '/inc/page-options.php';

/**
* Post options for posts
*/
require get_template_directory() . '/inc/post-options.php';

/**
 * Woocommerce
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 *TGM Plugin activation.
 */
require_once dirname( __FILE__ ) . '/plugins/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'meteorite_recommend_plugin' );
function meteorite_recommend_plugin() {
 
    $plugins = array(
        array(
            'name'		=> 'Page Builder by SiteOrigin',
            'slug'		=> 'siteorigin-panels',
            'required'	=> false,
        ),
        array(
            'name'		=> 'Terra Themes Tools',
            'slug'		=> 'terra-themes-tools',
            'required'	=> false,
        ),
        array(
        	'name'		=> 'Meteorite Extensions',
        	'slug'		=> 'meteorite-extensions',
        	'required'	=> false,
        )
    );
 
    tgmpa( $plugins);
 
}