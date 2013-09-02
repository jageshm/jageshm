<?php
/**
 * The core functions file for the Radius framework. Functions defined here are generally
 * used across the entire framework to make various tasks faster. This file should be loaded
 * prior to any other files because its functions are needed to run the framework.
 *
 * @package Radius
 * @subpackage Functions
 */

/** Function for setting the content width of a theme. */
function radius_set_content_width( $width = '' ) {
	global $content_width;
	$content_width = absint( $width );
}

/** Function for getting the theme's content width. */
function radius_get_content_width() {
	global $content_width;
	return $content_width;
}

/** Function for getting the theme's data */
function radius_theme_data( $path = 'template' ) {
	global $radius;
	
	/* If 'template' is requested, get the parent theme data. */
	if ( 'template' == $path ) {

		/* If the parent theme data isn't set, let grab it. */
		if ( empty( $radius->theme_data ) ) {
			
			$radius_theme_data = array();
			if( function_exists( 'wp_get_theme' ) ) {
			
				$theme_data = wp_get_theme();
				$radius_theme_data['Name'] = $theme_data->get( 'Name' );
				$radius_theme_data['ThemeURI'] = $theme_data->get( 'ThemeURI' );
				$radius_theme_data['AuthorURI'] = $theme_data->get( 'AuthorURI' );
				$radius_theme_data['Description'] = $theme_data->get( 'Description' );
				
				$radius->theme_data = $radius_theme_data;				
			
			} else {
			
				$theme_data = get_theme_data( trailingslashit( RADIUS_DIR ) . 'style.css' );
				$radius_theme_data['Name'] = $theme_data['Name'];
				$radius_theme_data['ThemeURI'] = $theme_data['URI'];
				$radius_theme_data['AuthorURI'] = $theme_data['AuthorURI'];
				$radius_theme_data['Description'] = $theme_data['Description'];
				
				$radius->theme_data = $radius_theme_data;				
			
			}
		
		}

		/* Return the parent theme data. */
		return $radius->theme_data;
	}	

	/* Return false for everything else. */
	return false;
}
?>