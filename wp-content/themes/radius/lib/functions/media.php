<?php
/**
 * Functions file for loading scripts and stylesheets.
 *
 * @package Radius
 * @subpackage Functions
 */

/** Register Radius Core scripts. */
add_action( 'wp_enqueue_scripts', 'radius_register_scripts', 1 );

/** Load Radius Core scripts. */
add_action( 'wp_enqueue_scripts', 'radius_enqueue_scripts' );

/** Register JavaScript and Stylesheet files for the framework. */
function radius_register_scripts() {

	/* Register the 'drop-downs' scripts if the current theme supports 'radius-core-menus'. */
	if ( current_theme_supports( 'radius-core-menus' ) ) {
		wp_register_script( 'radius-js-drop-downs', esc_url( trailingslashit( RADIUS_JS_URI ) . 'drop-downs.js' ), array( 'jquery' ), '1.0', true );
	}
	
	/** Register '960.css' for grid. */
	wp_register_style( 'radius-css-960', esc_url( trailingslashit( RADIUS_CSS_URI ) . '960.css' ) );
	
	/** Register Google Fonts. */
	wp_register_style( 'radius-google-fonts', esc_url( 'http://fonts.googleapis.com/css?family=Droid+Sans|Ubuntu+Condensed' ) );
}

/** Tells WordPress to load the scripts needed for the framework using the wp_enqueue_script() function. */
function radius_enqueue_scripts() {

	/** Load the comment reply script on singular posts with open comments if threaded comments are supported. */
	if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/** Load the 'drop-downs' script if the current theme supports 'radius-drop-downs'. */
	if ( current_theme_supports( 'radius-core-menus' ) ) {
		wp_enqueue_script( 'radius-js-drop-downs' );
	}
	
	/** Load '960.css' for grid. */
	wp_enqueue_style( 'radius-css-960' );
	
	/** Load Google Fonts. */
	wp_enqueue_style( 'radius-google-fonts' );
}

/** Analytic Code */
add_action( 'wp_footer', 'radius_analytic_code_init' );
function radius_analytic_code_init() {
	
	$radius_options = radius_get_settings();
	
	if( $radius_options['radius_analytic'] == 1 ) :	
	echo htmlspecialchars_decode ( $radius_options['radius_analytic_code'] );	
	echo '<!-- end analytic-code -->';	
	endif;

}
?>