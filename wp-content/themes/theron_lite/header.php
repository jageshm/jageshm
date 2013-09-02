<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>

</head>


<body <?php body_class(); ?>>

    <div class="center <?php echo of_get_option('head_select'); ?>-social">
 <!--SOCIAL ICONS-->   
<div class="social_wrap">
    <div class="social">
<ul>
<?php if ( of_get_option('fbsoc_text') ) { ?>
<li class="soc_fb"><a title="Facebook" target="_blank" href="<?php echo of_get_option('fbsoc_text'); ?>">Facebook</a></li><?php } ?>
<?php if ( of_get_option('ttsoc_text') ) { ?>
<li class="soc_tw"><a title="Twitter" target="_blank" href="<?php echo of_get_option('ttsoc_text'); ?>">Twitter</a></li><?php } ?>
<?php if ( of_get_option('gpsoc_text') ) { ?>
<li class="soc_plus"><a title="Google Plus" target="_blank" href="<?php echo of_get_option('gpsoc_text'); ?>">Google Plus</a></li><?php } ?>
<?php if ( of_get_option('ytbsoc_text') ) { ?>
<li class="soc_ytb"><a title="Youtube" target="_blank" href="<?php echo of_get_option('ytbsoc_text'); ?>">Youtube</a></li><?php } ?>
<?php if ( of_get_option('flkrsoc_text') ) { ?>
<li class="soc_flkr"><a title="Flickr" target="_blank" href="<?php echo of_get_option('flkrsoc_text'); ?>">Flickr</a></li><?php } ?>
<?php if ( of_get_option('lnkdsoc_text') ) { ?>
<li class="soc_lnkd"><a title="Linkedin" target="_blank" href="<?php echo of_get_option('lnkdsoc_text'); ?>">Linkedin</a></li><?php } ?>
<?php if ( of_get_option('pinsoc_text') ) { ?>
<li class="soc_pin"><a title="Pinterest" target="_blank" href="<?php echo of_get_option('pinsoc_text'); ?>">Pinterest</a></li><?php } ?>
<?php if ( of_get_option('rsssoc_text') ) { ?>
<li class="soc_rss"><a title="Rss Feed" target="_blank" href="<?php echo of_get_option('rsssoc_text'); ?>">RSS</a></li><?php } ?>
</ul>
    </div>
</div>
  <!--SOCIAL ICONS END-->   
</div> 
<!--HEADER START-->
<div class="headcenter">
<div id="header">


    	<!--LOGO START-->
        <div class="logo">
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name') ;?></a></h1>
        <div class="desc"><?php bloginfo('description')?></div>
        </div>
        
        <!--LOGO END-->
        
        <!--MENU STARTS-->
        <div id="menu_wrap"><div class="center"><div id="topmenu"><?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?></div></div></div>
        <!--MENU END-->
        

</div>
</div>

<?php if ( is_singular()) {?><div class="center"><div class="slide_shadow"></div></div><?php } ?>
<!--HEADER END-->
    <div class="center">