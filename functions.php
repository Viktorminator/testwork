<?php
/**
 * styl_s functions and definitions
 *
 * @package styl_s
 */

if ( ! function_exists( 'styl_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function styl_s_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on styl_s, use a find and replace
	 * to change 'styl_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'styl_s', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'styl_s' ),
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

	/*
      * Add Editor Style for adequate styling in text editor.
      *
      * @link http://codex.wordpress.org/Function_Reference/add_editor_style
      */
	add_editor_style( 'editor-style.css' );

}
endif; // styl_s_setup
add_action( 'after_setup_theme', 'styl_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function styl_s_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'styl_s_content_width', 640 );
}
add_action( 'after_setup_theme', 'styl_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function styl_s_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'styl_s' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'styl_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function styl_s_scripts() {
	wp_enqueue_style( 'styl_s-style', get_stylesheet_uri() );

	wp_enqueue_script( 'styl_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'styl_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'styl_s_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Widget for subscribed users
 */
include 'users-grid.php';

/**
 * My AJAX form part
 */
wp_enqueue_script('jquery');


add_action('wp_ajax_add_subscriber', 'add_subscriber');
add_action('wp_ajax_nopriv_add_subscriber', 'add_subscriber'); // Add for not logged users

function add_subscriber() {

	global $wpdb;

	$email = $_POST['email'];
	if (!empty($email)) {
		if($wpdb->insert('wp_subscribers', array(
				'email'=>$email
			))===FALSE){
			echo "Error";
		}
		else {
			echo "Subscriber with email " . $email . " was succesfully added";
		}
	}
	else {
		echo "No email was given - no email was added.";
	}
	die();
}


