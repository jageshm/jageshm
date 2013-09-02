<?php
/** Theme Custom Header */
$custom_header_support = array( 
	
	'default-image' => '%s/images/headers/radius.png',
	'default-text-color' => '',
	'width' => apply_filters( 'radius_header_image_width', 300 ),
	'height' => apply_filters( 'radius_header_image_height', 80 ),
	'flex-height' => true,
	'header-text' => false,
	'wp-head-callback' => 'radius_header_style',
	'admin-head-callback' => 'radius_admin_header_style',
	'admin-preview-callback' => 'radius_admin_header_image'
	
);

add_theme_support( 'custom-header', $custom_header_support );

/** This is all for compatibility with versions of WordPress prior to 3.4. */
if ( ! function_exists( 'get_custom_header' ) ) {	
	
	define( 'HEADER_TEXTCOLOR', $custom_header_support['default-text-color'] );
	define( 'HEADER_IMAGE', $custom_header_support['default-image'] );
	define( 'HEADER_IMAGE_WIDTH', $custom_header_support['width'] );
	define( 'HEADER_IMAGE_HEIGHT', $custom_header_support['height'] );
	add_custom_image_header( $custom_header_support['wp-head-callback'], $custom_header_support['admin-head-callback'], $custom_header_support['admin-preview-callback'] );

}

/** Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI. */
register_default_headers( array(
	
	'radius' => array(
		'url' => '%s/images/headers/radius.png',
		'thumbnail_url' => '%s/images/headers/radius.png',
		'description' => __( 'Radius', 'radius' )
	)

) );

/** Styles the header image and text displayed on the blog. */
function radius_header_style() {
}

/** Styles the header image displayed on the Appearance > Header admin panel. */
function radius_admin_header_style() {
?>
<style type="text/css">
.appearance_page_custom-header #headimg {
	width: 300px;
	overflow: hidden;
	border: none;
}

#headimg #logo-image img {
	max-width: 300px;
	height: auto;
	width: 100%;
}

#headimg #logo-text {
	margin: 18px 0;
}

#headimg #logo-text a {
	text-decoration: none;
}

#headimg #logo-text .site-name  {
	display: block;
	font-family: 'Oswald', sans-serif;
	font-size: 28px; 
	line-height: 34px; 
}

#headimg #logo-text .site-description {
	display: block;
}
</style>
<?php
}

/** Styles the header image and text displayed on the blog preview. */
function radius_admin_header_image() {
?>
<div id="headimg">	
<?php

if ( get_header_image() ) :
	
	if ( function_exists( 'get_custom_header' ) ) {
		$header_image_width  = get_custom_header()->width;
		$header_image_height = get_custom_header()->height;
	} else {
		$header_image_width  = HEADER_IMAGE_WIDTH;
		$header_image_height = HEADER_IMAGE_HEIGHT;
	}

?>

<div id="logo-image">
  <a href="<?php echo home_url( '/' ); ?>" onclick="return false;"><img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
</div><!-- end of #logo -->

<?php else: // header image was removed ?>

<div id="logo-text">
  <span class="site-name"><a href="<?php echo home_url( '/' ); ?>" onclick="return false;" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
  <span class="site-description"><?php bloginfo( 'description' ); ?></span>
</div><!-- end of #logo -->

<?php endif; // header image was removed (again) ?>

</div>

<?php
}
?>