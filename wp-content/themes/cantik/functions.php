<?php
/**
 * Cantik functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Cantik
 * @since Cantik 1.0
 */

/**
 * Improve debugging messages
 *
 * @param mixed $data
 * @since Cantik 1.0
 */
function debug($data) {
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Cantik 1.0
 */
add_action( 'after_setup_theme', 'smntcs_setup' );
if ( !function_exists( 'smntcs_setup' ) ) {
	function smntcs_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		register_nav_menus( array('primary' => __( 'Primary Menu', 'cantik' )) );
		require_once('wp_bootstrap_navwalker.php');
	}
}

/**
 * Enqueue styles
 *
 * @since Cantik 1.0
 */
add_action( 'wp_enqueue_scripts', 'smntcs_load_styles' );
function smntcs_load_styles() {
	wp_enqueue_style( 'font-lato', 'https://fonts.googleapis.com/css?family=Lato:400,300,700' );
	wp_enqueue_style( 'font-open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' );
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'viewport-bug-workaround', get_stylesheet_directory_uri() . '/css/ie10-viewport-bug-workaround.css' );
	wp_enqueue_style( 'cantik', get_stylesheet_uri() );
	wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/css/custom.min.css' );
}

/**
 * Enqueue styles
 *
 * @since Cantik 1.0
 */
add_action( 'wp_enqueue_scripts', 'smntcs_load_scripts' );
function smntcs_load_scripts() {
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.5', true );
	wp_enqueue_script( 'cookie', get_template_directory_uri() . '/js/js.cookie.js', array(), '2.1.0', true );
	wp_enqueue_script( 'smooth-scroll', get_template_directory_uri () . '/js/smooth-scroll.min.js', array (), '1.5.3', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom-general.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'custom-maps', get_template_directory_uri() . '/js/custom-maps.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCj6LKvJGhw2wvxsQnrv88mXvHCw9Kfvio', array(), '1.0.0', true );
	wp_enqueue_script( 'viewport-bug-workaround', get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js', array(), '1.0.0', true );
}

/**
 * Register widgetized areas
 *
 * @since Cantik 1.0
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 * @return void
 */
add_action( 'widgets_init', 'smntcs_widgets_init' );
function smntcs_widgets_init() {
	register_sidebar( array(
		'name' 			=> esc_html__( 'Blog Sidebar', 'cantik' ),
		'id' 			=> 'sidebar-blog',
		'description' 	=> esc_html__( 'Appears in the sidebar on the blog and archive pages only', 'cantik' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</aside><br>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>'
	) );
}

/**
 * Load JavaScript files async
 *
 * @since Cantik 1.0
 */
//add_filter( 'clean_url', 'smntcs_load_js_async', 11, 1 );
function smntcs_load_js_async( $url ) {
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	return "$url' async='async";
}

add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
function _remove_script_version( $src ){
	$parts = explode( '?ver', $src );
	return $parts[0];
}

/**
 * Custom pagination
 * 
 * @since Cantik 1.0
 */
function pagination($pages = '', $range = 2) {
	$showitems = ($range * 2)+1;

	global $paged;
	if (empty($paged) ) $paged = 1;

	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if (!$pages) {
			$pages = 1;
		}
	}

	if (1 != $pages) {
		echo "<div class=\"pagination\"><span class=\"page-info hidden-xs\">Halaman ".$paged." dari ".$pages."</span>";
		if ($paged > 1) {
			echo "<a class=\"hidden-xs\" href='".get_pagenum_link($paged - 1)."'>&lsaquo; Sebelumnya</a>";
			echo "<a class=\"hidden-sm hidden-md hidden-lg\" href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
		} else {
			echo "<a class=\"current\"'>&lsaquo; Sebelumnya</a>";
		}

		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<a class=\"current\">".$i."</a>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
			}
		}

		if ($paged < $pages) {
			echo "<a class=\"hidden-xs\" href=\"".get_pagenum_link($paged + 1)."\">Berikutnya &rsaquo;</a>";
			echo "<a class=\"hidden-sm hidden-md hidden-lg\" href=\"".get_pagenum_link($paged + 1)."\">&rsaquo;</a>";
		} else {
			echo "<a class=\"current\">Berikutnya &rsaquo;</a>";
		}
		
		echo "</div>\n";
	}
}