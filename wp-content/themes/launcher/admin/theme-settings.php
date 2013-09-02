<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){

//Theme Shortname
$shortname = "lnc";


//Populate the options array
global $tt_options;
$tt_options = get_option('of_options');


//Access the WordPress Pages via an Array
$tt_pages = array();
$tt_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($tt_pages_obj as $tt_page) {
$tt_pages[$tt_page->ID] = $tt_page->post_name; }
$tt_pages_tmp = array_unshift($tt_pages, "Select a page:"); 


//Access the WordPress Categories via an Array
$tt_categories = array();  
$tt_categories_obj = get_categories('hide_empty=0');
foreach ($tt_categories_obj as $tt_cat) {
$tt_categories[$tt_cat->cat_ID] = $tt_cat->cat_name;}
$categories_tmp = array_unshift($tt_categories, "Select a category:");


//Arrays for options

//Sample Advanced Array - The actual value differs from what the user sees
$sample_advanced_array = array("image" => "The Image","post" => "The Post"); 


//Folder Paths for "type" => "images"
$patternurl =  get_template_directory_uri() . '/admin/images/patterns/';


/*-----------------------------------------------------------------------------------*/
/* Create The Custom Site Options Panel
/*-----------------------------------------------------------------------------------*/
$options = array(); // do not delete this line - sky will fall

/*-----------------------------------------------------------------------------------*/
/* General Theme Settings
/*-----------------------------------------------------------------------------------*/
$options[] = array( "name" => __('General Settings','framework_localize'),
			"type" => "heading");

$options[] = array( "name" => __('Favicon','framework_localize'),
			"desc" => __('Upload a <strong>16 x 16 px</strong> image that will represent your website\'s favicon. You can refer to this link for more information on how to make it: <a href="http://www.favicon.cc/" target="blank" rel="nofollow">http://www.favicon.cc/</a>','framework_localize'),
			"id" => $shortname."_favicon",
			"std" => "",
			"type" => "upload");

$options[] = array( "name" => __('Main Page text','framework_localize'),
			"desc" => __('Page Text (Choose a text for your page - MAX 200 characters<br /> <strong>Basic HTML allowed</strong>','framework_localize'),
			"id" => $shortname."_text_content",
			"std" => "We are working on our website design. We are sure this new website will completely blow your mind! Theme designed by <a href=\"http://mythemeshop.com\">MyThemeShop</a>.",
			"type" => "textarea");

$options[] = array( "name" => __('Feedburner feed id','framework_localize'),
			"desc" => __('Enter your RSS feed id (not link http://feeds.feedburner.com/<b>mythemeshop</b>)','framework_localize'),
			"id" => $shortname."_rss",
			"std" => "mythemeshop",
			"type" => "text");
			
$options[] = array( "name" => __('Twitter Username','framework_localize'),
			"desc" => __('Enter your twitter name here.','framework_localize'),
			"id" => $shortname."_twitter",
			"std" => "mythemeshopteam",
			"type" => "text");

$options[] = array( "name" => __('Facebook fanpage/profile link','framework_localize'),
			"desc" => __('Enter your facebook fanpage or profile link here.','framework_localize'),
			"id" => $shortname."_facebook",
			"std" => "http://facebook.com/mythemeshop",
			"type" => "text");
			
$options[] = array( "name" => __('Launch Date','framework_localize'),
			"desc" => "If Count - Custom Date Countdown (mm/dd/yyyy hh:mm AM/PM + Optional - timezone - e.g. UTC+0600 (You may find your UTC time here: http://www.thetimenow.com))",
			"id" => $shortname."_date",
			"std" => "05/15/2015 8:00 PM UTC-0500",
			"type" => "text");

$options[] = array( "name" => __('Text after countdown End','framework_localize'),
			"desc" => __('If Count - Custom message, when countdown reach 0.','framework_localize'),
			"id" => $shortname."_finish_mssg",
			"std" => "Page should be online soon! Please be patient.",
			"type" => "text");
			
$options[] = array( "name" => __('Google Analytics','framework_localize'),
			"desc" => "Enter your Google Analytics code here.",
			"id" => $shortname."_analytics_code",
			"std" => "",
			"type" => "textarea");
			
$options[] = array( "name" => __('Footer Copyright Text','framework_localize'),
			"desc" => __('You can change or remove our link from footer and use your own custom text. (Link back is always appreciated)','framework_localize'),
			"id" => $shortname."_copyrights",
			"std" => "&#169; 2012 <a href='http://demo.mythemeshop.com/launcher/' title='Just another MyThemeShop Playground Sites site'>Launcher Theme Demo</a> All Rights Reserved. Theme by <a href='http://mythemeshop.com/'>MyThemeShop</a>.",
			"type" => "textarea");

/*-----------------------------------------------------------------------------------*/
/* Styling Options
/*-----------------------------------------------------------------------------------*/			
$options[] = array( "name" => __('Styling Options','framework_localize'),
			"type" => "heading");

$options[] = array( "name" => __('Enable Countdown','framework_localize'),
			"desc" => __('Check this box to enable countdown','framework_localize'),
			"id" => $shortname."_count",
			"std" => "true",
			"type" => "checkbox");
			
$options[] = array( "name" => __('Enable Subscription Box','framework_localize'),
			"desc" => __('Check this box to Feedburner Subscription Box.','framework_localize'),
			"id" => $shortname."_form",
			"std" => "true",
			"type" => "checkbox");

$options[] = array( "name" => __('Choose Background Pattern','framework_localize'),
			"desc" => __('Choose pattern which you want to use as background for your theme.','framework_localize'),
			"id" => $shortname."_bg_pattern",
			"std" => "pattern0",
			"type" => "images",
			"options" => array(
				'pattern0' => $patternurl . 'pattern0.png',
				'pattern1' => $patternurl . 'pattern1.png',
				'pattern2' => $patternurl . 'pattern2.png',
				'pattern3' => $patternurl . 'pattern3.png',
				'pattern4' => $patternurl . 'pattern4.png',
				'pattern5' => $patternurl . 'pattern5.png',
				'pattern6' => $patternurl . 'pattern6.png',
				'pattern7' => $patternurl . 'pattern7.png',
				'pattern8' => $patternurl . 'pattern8.png',
				'pattern9' => $patternurl . 'pattern9.png',
				'pattern10' => $patternurl . 'pattern10.png',
				'pattern11' => $patternurl . 'pattern11.png',
				'pattern12' => $patternurl . 'pattern12.png',
				));
				
$options[] = array( "name" => __('Custom CSS','framework_localize'),
			"desc" => "You can enter your custom CSS here and play with our theme.",
			"id" => $shortname."_custom_css",
			"std" => "",
			"type" => "textarea");
				
update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);

}
}
?>