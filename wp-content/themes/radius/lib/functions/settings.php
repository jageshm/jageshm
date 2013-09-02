<?php
/**
 * Functions for dealing with theme settings on both the front end of the site and the admin.
 *
 * @package Radius
 * @subpackage Functions
 */

/** Loads the Radius theme setting. */
function radius_get_settings() {
	global $radius;

	/* If the settings array hasn't been set, call get_option() to get an array of theme settings. */
	if ( !isset( $radius->settings ) ) {
		$radius->settings = get_option( 'radius_options' );
	}
	
	/** return settings. */
	return $radius->settings;
}
?>