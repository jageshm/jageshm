<?php get_header(); ?>
 <div id="launcher">
	<div class="page">
		<div id="social">
        <p class="followus">Follow Us:</p> 
			<a href="http://twitter.com/<?php echo get_option('lnc_twitter'); ?>" class="twitter">Twitter</a>
			<a href="<?php echo get_option('lnc_facebook'); ?>" class="facebook">Facebook</a>
			<a href="http://feeds.feedburner.com/<?php echo get_option('lnc_rss'); ?>" class="rss">RSS</a>
        </div>
    <div id="block">
      <div id="block-text"><h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
        <p>
          <span class="text"><?php $content = get_option('lnc_text_content');
                  $replace[1] = '/
                  /';
                  $replacement[1] = '<br />';
                  $content = preg_replace($replace,$replacement,$content);
                  echo $content;
                  ?>
          </span>
        </p>
	<?php if (get_option('lnc_form') == 'false') { ?>
	<?php } else { ?>
	<form style="" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo get_option('lnc_rss'); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><input type="text" style="width:240px" name="email"/><input type="hidden" value="<?php echo get_option('lnc_rss'); ?>" name="uri"/><input type="hidden" name="loc" value="en_US"/><input type="submit" value="Subscribe" /></form>
	<?php } ?>
	<?php if (get_option('lnc_count') == 'false') { ?>
	<?php } else { ?>
     <?php include "Countdown.html";?>
	<?php } ?>
      </div>
    </div>
	<div class="rocket">
		<img class="floating-rocket" src="<?php bloginfo('template_url'); ?>/images/rocket.png" alt="Launching" >
	</div>
	<div class="comeback">
		<img src="<?php bloginfo('template_url'); ?>/images/comeback.png" alt="comeback" >
	</div>
	<div class="launchpad">
		<img src="<?php bloginfo('template_url'); ?>/images/launchpad.png" alt="launchpad" >
	</div>
	</div> 
<?php get_footer(); ?> 
</div>  