<?php
function wedding_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wedding' );

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
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	/*add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );*/

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	/*add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );*/

	// This theme uses wp_nav_menu() in two locations.
	/*register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'twentysixteen' ),
		'social'  => __( 'Social Links Menu', 'twentysixteen' ),
	) );
*/
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
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/style.css', wedding_setup() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
//add_action( 'after_setup_theme', 'wedding_setup');
/**
 * Register custom fonts.
 */
function wedding_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto Condensed font: on or off', 'wedding' ) ) {
		$fonts[] = 'Roboto+Condensed:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Volkhov font: on or off', 'wedding' ) ) {
		$fonts[] = 'Volkhov:400i';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'wedding' ) ) {
		$fonts[] = 'Open+Sans:300,400,600,700,800';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function wedding_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'wedding_fonts_url', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'wedding_resource_hints', 10, 2 );

/*
<!--  
Stylesheets
=============================================
-->
<!-- Default stylesheets-->
<link href="assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Template specific stylesheets-->
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<link href="assets/lib/animate.css/animate.css" rel="stylesheet">
<link href="assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
<link href="assets/lib/flexslider/flexslider.css" rel="stylesheet">
<link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
<link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
<link href="assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
<link href="assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
<!-- Main stylesheet and color file-->
<link href="assets/css/style.css" rel="stylesheet">
		<link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">
<!--  
JavaScripts
=============================================
-->
<script src="assets/lib/jquery/dist/jquery.js"></script>
<script src="assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/lib/wow/dist/wow.js"></script>
<script src="assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
<script src="assets/lib/isotope/dist/isotope.pkgd.js"></script>
<script src="assets/lib/imagesloaded/imagesloaded.pkgd.js"></script>
<script src="assets/lib/flexslider/jquery.flexslider.js"></script>
<script src="assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="assets/lib/smoothscroll.js"></script>
<script src="assets/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
<script src="assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK2Axt8xiFYMBMDwwG1XzBQvEbYpzCvFU"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
		*/

function wedding_style_script() {
	//Styles
	wp_enqueue_style( 'wedding-fonts', wedding_fonts_url(), array(), null );
	wp_enqueue_style('custom-styles', get_template_directory_uri().'/assets/css/style.css', array(), null );
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/lib/bootstrap/dist/css/bootstrap.css', array(), null);
	wp_enqueue_style('animate', get_template_directory_uri().'/assets/lib/animate.css/animate.css', array(),null);
	wp_enqueue_style('flexislider', get_template_directory_uri().'/assets/lib/flexslider/flexslider.css', array(),null);
	wp_enqueue_style('owl-carousel', get_template_directory_uri().'/assets/lib/owl.carousel/dist/assets/owl.carousel.min.css', array(),null);
	wp_enqueue_style('owl-theme', get_template_directory_uri().'/assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css', array(),null);
	wp_enqueue_style('magnific-popup', get_template_directory_uri().'/assets/lib/magnific-popup/dist/magnific-popup.css', array(),null);
	wp_enqueue_style('simpletextrotator', get_template_directory_uri().'/assets/lib/magnific-popup/dist/magnific-popup.css', array(),null);
	wp_enqueue_style('text', get_template_directory_uri().'/assets/lib/simple-text-rotator/simpletextrotator.css', array(),null);
	
	//Scripts
	//wp_enqueue_script( 'jquery', get_theme_file_uri( '/assets/lib/jquery/dist/jquery.js' ), array(), '', true );
	wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/lib/bootstrap/dist/js/bootstrap.min.js' ), array( 'jquery' ), '3.3.7', true );
	wp_enqueue_script( 'wow', get_theme_file_uri( '/assets/lib/wow/dist/wow.js' ), array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'YTPlayer', get_theme_file_uri( '/assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js' ), array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'isotope', get_theme_file_uri( '/assets/lib/isotope/dist/isotope.pkgd.js' ), array( 'jquery' ), '3.0.2', true );
	wp_enqueue_script( 'imagesloaded', get_theme_file_uri( '/assets/lib/imagesloaded/imagesloaded.pkgd.js' ), array( 'jquery' ), '4.1.1', true );
	wp_enqueue_script( 'flexslider', get_theme_file_uri( '/assets/lib/flexslider/jquery.flexslider.js' ), array( 'jquery' ), '4.1.1', true );
	wp_enqueue_script( 'owl-carousel', get_theme_file_uri( '/assets/lib/owl.carousel/dist/owl.carousel.min.js' ), array( 'jquery' ), '2.2.1', true );
	wp_enqueue_script( 'smoothscroll', get_theme_file_uri( '/assets/lib/smoothscroll.js' ), array( 'jquery' ), '0.9.9', true );
	wp_enqueue_script( 'magnific-popup', get_theme_file_uri( '/assets/lib/magnific-popup/dist/jquery.magnific-popup.js' ), array( 'jquery' ), '1.1.0', true );
	wp_enqueue_script( 'magnific-popup', get_theme_file_uri( '/assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js' ), array( 'jquery' ), '1.1.0', true );
	wp_enqueue_script( 'plugins', get_theme_file_uri( '/assets/js/plugins.js' ), array( 'jquery' ), '1.1.0', true );
	wp_enqueue_script( 'main', get_theme_file_uri( '/assets/js/main.js' ), array( 'jquery' ), '1.1.0', true );
}
add_action('wp_enqueue_scripts', 'wedding_style_script');
?>
