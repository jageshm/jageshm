<?php
/*
Template Name: Contact Page
*/
?>

<?php get_header(); ?>
<?php
if($_POST[sent]){
	$error = "";
	
	$clean = array();
	$clean['your_email'] = filter_var($_POST['your_email'], FILTER_SANITIZE_EMAIL);
	$clean['your_name'] = wp_filter_nohtml_kses( $_POST['your_name'] ); // Don't allow any HTML
	$clean['your_message'] = wp_filter_nohtml_kses( $_POST['your_message'] ); // Don't allow any HTML
	if( !wp_verify_nonce($_POST['theron_send_email'],'page-contact') )
	
		$error .= "<p>Invalid submission!</p>";
		
	if(!trim($clean['your_name'])){
		$error .= "<p>Please enter your name</p>";
	}
	if(!filter_var(trim($clean['your_email']),FILTER_VALIDATE_EMAIL)){
		$error .= "<p>Please enter a valid email address</p>";
	}                        
	if(!trim($clean['your_message'])){
		$error .= "<p>Please enter a message</p>";
	}

	if(!$error){
		$email = wp_mail(get_option("admin_email"),trim($clean[your_name])." sent you a message from ".get_option("blogname"),stripslashes(trim($clean['your_message'])),"From: ".trim($clean['your_name'])." <".trim($clean['your_email']).">\r\nReply-To:".trim($clean['your_email']));
		}
}


?>

<!--Content-->
<div id="content">
<div class="single_wrap">
<div class="single_post">
                   <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                
                <div class="post_content">
                    <h2 class="postitle"><?php the_title(); ?></h2>
                    <div class="single_metainfo"><?php edit_post_link(); ?></div>
                    <div class="thn_post_wrap">
                    
                    <div class="entry-content">
                        <?php if($email){ ?>
                            <p><strong><?php _e('Message succesfully sent. We will reply as soon as we can.', 'theron'); ?></strong></p>
                        <?php } else { if($error) { ?>
                            <p><strong><?php _e("Your messange hasn't been sent.", "theron"); ?></strong><p>
                            <?php echo $error; ?>
                        <?php } else { the_content(); } ?>
                            <form action="<?php the_permalink(); ?>" id="contactForm" method="post">
                            <?php wp_nonce_field('page-contact','theron_send_email'); ?>
                                <input type="hidden" name="sent" id="sent" value="1" />
                                <div class="contact_wrap">
                                    <p>
                                        <label for="your_name"><?php _e("Name", "theron"); ?></label>
                                        <input type="text" name="your_name" id="your_name" class="required" value="<?php echo $_POST[your_name];?>" />
                                    </p>
                                    <p>
                                        <label for="your_email"><?php _e("Email", "theron"); ?></label>
                                        <input type="text" name="your_email" id="your_email" class="required" value="<?php echo $_POST[your_email];?>" />
                                    </p>
                                    <p>
                                        <label for="your_message"><?php _e("Message:", "theron"); ?></label>
                                        <textarea name="your_message" class="required" id="your_message"><?php echo stripslashes($_POST[your_message]); ?></textarea>
                                    </p>
                                    <p>
                                        <input id="submit_msg" type="submit" name = "send" value = "Send" />
                                    </p>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                    
                    </div> 
                    <div style="clear:both"></div>
                    <div class="thn_post_wrap"><?php wp_link_pages('<p class="pages"><strong>'.__('Pages:').'</strong> ', '</p>', 'number'); ?></div>
                    
                    
                </div>
                
                
                
                        </div>
            <?php endwhile ?> 
                </div>
			
            <?php endif ?>

    </div>
   
    <!--PAGE END-->
    
<?php if(of_get_option('nosidebar_checkbox') == "0"){ ?><?php get_sidebar();?><?php } ?>
</div>
<?php get_footer(); ?>