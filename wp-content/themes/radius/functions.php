<?php
/** Load the Core Files */
require_once( trailingslashit( get_template_directory() ) . 'lib/init.php' );
new Radius();

/** Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'radius_theme_setup' );

/** Theme setup function. */
function radius_theme_setup() {
	
	/** Add theme support for core framework features. */
	add_theme_support( 'radius-core-menus', array( 'radius-primary-menu' ) );
	add_theme_support( 'radius-core-sidebars', array( 'radius-primary-sidebar' ) );
	add_theme_support( 'radius-core-featured-image' );
	add_theme_support( 'radius-core-custom-header' );
	
	/** Add theme support for WordPress features. */
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background', array( 'default-color' => 'fafafa' ) );
	
	/** Set content width. */
	radius_set_content_width( 600 );
	
	/** Add custom image sizes. */
	add_action( 'init', 'radius_add_image_sizes' );	

}

/** Adds custom image sizes */
function radius_add_image_sizes() {
	add_image_size( 'featured', 200, 200, true );
}
?>