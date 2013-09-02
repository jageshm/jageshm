<div id="footer_area" class="footer1">
	<div class="page">
		<div id="my_tweets">
			<div id="tweet"></div>
		</div>
	</div>
</div>
<div id="footer_area" class="footer2">
	<div class="page">
		<p class="copyrights">
<?php if (get_option('lnc_copyrights') != '') { ?>
<?php echo get_option('lnc_copyrights');?>
<?php } else { ?>
© 2012 <a href='http://demo.mythemeshop.com/launcher/' title='Just another MyThemeShop Playground Sites site'>Launcher Theme Demo</a> All Rights Reserved. Theme by <a href='http://mythemeshop.com/'>MyThemeShop</a>.
<?php } ?>
</p>
	</div>
</div>
<?php do_action('wp_footer'); wp_footer();?>
</div>
<?php if (get_option('lnc_analytics_code') != '') { ?>
<?php echo(stripslashes (get_option('lnc_analytics_code')));?>
<?php } ?>
</body>
</html>