
<?php get_header(); ?>

<!--Content-->
<div id="content">
<div class="single_wrap">
<div class="single_post">

                
                <div id="content_wrap" class="error_page">
            <!--404 Error-->
            <div class="fourofour"><label><a>404</a></label></div>
            <div class="post">
            <h2><?php _e('Page Not Found', 'theron'); ?></h2>
            <div class="error_msg">
            <p><label><?php _e('Server cannot find the file you requested. File has either been moved or deleted, or you entered the wrong URL or document name. Look at the URL. If a word looks misspelled, then correct it and try it again. If that doesnt work You can try our search option to find what you are looking for.', 'theron'); ?></label></p>
            <?php get_search_form(); ?>
            </div>
        </div>     
                
            </div>
                
                
                
                        </div>

                </div>
			<div class="comments_template"><?php comments_template('',true); ?></div>


    </div>
   
    <!--PAGE END-->
    

<?php get_footer(); ?>