<?php
/** Core Theme Framework */
class Radius {
	
	/** Constructor Method */
	function __construct() {

		/** Define a Global variable Standard Class */
		global $radius;
		$radius = new stdClass;
		
		/* Define framework, parent theme, and child theme constants. */
		add_action( 'after_setup_theme', array( &$this, 'constants' ), 1 );
		
		/* Load the core functions required by the rest of the framework. */
		add_action( 'after_setup_theme', array( &$this, 'core' ), 2 );
		
		/* Language functions and translations setup. */
		add_action( 'after_setup_theme', array( &$this, 'i18n' ), 3 );
		
		/* Load the framework functions. */
		add_action( 'after_setup_theme', array( &$this, 'functions' ), 12 );
		
		/* Load admin files. */
		add_action( 'wp_loaded', array( &$this, 'admin' ) );		

	}
	
	/** Define Constant Paths */
	function constants() {

		/** Directory Location Constants */
		
		/** Sets the path to the parent theme directory. */
		define( 'RADIUS_DIR', get_template_directory() );
		define( 'RADIUS_LIB_DIR', trailingslashit( RADIUS_DIR ) . 'lib' );
		
		define( 'RADIUS_FUNCTIONS_DIR', trailingslashit( RADIUS_LIB_DIR ) . 'functions' );
		define( 'RADIUS_ADMIN_DIR', trailingslashit( RADIUS_LIB_DIR ) . 'admin' );
		define( 'RADIUS_JS_DIR', trailingslashit( RADIUS_LIB_DIR ) . 'js' );
		define( 'RADIUS_CSS_DIR', trailingslashit( RADIUS_LIB_DIR ) . 'css' );
		
		/** URI Location Constants */
		
		/** Sets the path to the parent theme directory URI. */
		define( 'RADIUS_URI', get_template_directory_uri() );
		define( 'RADIUS_LIB_URI', trailingslashit( RADIUS_URI ) . 'lib' );
		
		define( 'RADIUS_ADMIN_URI', trailingslashit( RADIUS_LIB_URI ) . 'admin' );
		define( 'RADIUS_JS_URI', trailingslashit( RADIUS_LIB_URI ) . 'js' );
		define( 'RADIUS_CSS_URI', trailingslashit( RADIUS_LIB_URI ) . 'css' );
		
	}
	
	/** Loads the core framework functions. */
	function core() {
		
		/* Load the core framework functions. */
		require_once( trailingslashit( RADIUS_FUNCTIONS_DIR ) . 'core.php' );
	}
	
	/** Loads translation files */
	function i18n() {

		/** Translations can be filed in the /languages/ directory */
		load_theme_textdomain( 'radius', trailingslashit( RADIUS_DIR ) . 'languages' );
		
		/* Get the user's locale. */
		$locale = get_locale();
		
		/* Locate a locale-specific functions file. */
		$locale_functions = trailingslashit( RADIUS_DIR ) . 'languages/$locale.php';
		
		/* If the locale file exists and is readable, load it. */
		if ( !empty( $locale_functions ) && is_readable( $locale_functions ) ) {
			require_once( $locale_functions );
		}
		
	}
	
	/** Loads the framework functions. */
	function functions() {

		/* Load media-related functions. */
		require_once( trailingslashit( RADIUS_FUNCTIONS_DIR ) . 'media.php' );
		
		/* Load the utility functions. */
		require_once( trailingslashit( RADIUS_FUNCTIONS_DIR ) . 'utility.php' );
		
		/* Load the theme settings functions if supported. */
		require_once( trailingslashit( RADIUS_FUNCTIONS_DIR ) . 'settings.php' );
		
		/* Load the menus functions if supported. */
		require_if_theme_supports( 'radius-core-menus', trailingslashit( RADIUS_FUNCTIONS_DIR ) . 'menus.php' );
		
		/* Load the sidebars if supported. */
		require_if_theme_supports( 'radius-core-sidebars', trailingslashit( RADIUS_FUNCTIONS_DIR ) . 'sidebars.php' );
		
		/* Load the featured image if supported. */
		require_if_theme_supports( 'radius-core-featured-image', trailingslashit( RADIUS_FUNCTIONS_DIR ) . 'featured-image.php' );
		
		/* Load the custom header if supported. */
		require_if_theme_supports( 'radius-core-custom-header', trailingslashit( RADIUS_FUNCTIONS_DIR ) . 'custom-header.php' );
		
	}
	
	/** Load admin files for the framework. */
	function admin() {

		/* Check if in the WordPress admin. */
		if ( is_admin() ) {

			/* Load the main admin file. */
			require_once( trailingslashit( RADIUS_ADMIN_DIR ) . 'admin.php' );

		}
	}	
	
}
?>