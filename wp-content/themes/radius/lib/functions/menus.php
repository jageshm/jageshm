<?php
/**
 * The menus functions deal with registering nav menus within WordPress for the core framework.
 *
 * @package Radius
 * @subpackage Functions
 */

/** Register nav menus. */
add_action( 'init', 'radius_register_menus' );

/** Registers the the core menus */
function radius_register_menus() {

	/** Get theme-supported menus. */
	$menus = get_theme_support( 'radius-core-menus' );
	
	/** If there is no array of menus IDs, return. */
	if ( !is_array( $menus[0] ) ) {
		return;
	}
	
	/* Register the 'primary' menu. */
	if ( in_array( 'radius-primary-menu', $menus[0] ) ) {
		register_nav_menu( 'radius-primary-menu', __( 'Radius Primary Menu', 'radius' ) );
	}
	
}
?>