
<?php get_header(); ?>

<!--Content-->
<div id="content">
<div class="single_wrap">
<div class="single_post">
                   <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                
                <div class="post_content">
                    <h2 class="postitle"><?php the_title(); ?></h2>
                    <div class="single_metainfo"><?php edit_post_link(); ?></div>
                    <div class="thn_post_wrap"><?php the_content(); ?> </div> 
                    <div style="clear:both"></div>
                    <div class="thn_post_wrap"><?php wp_link_pages('<p class="pages"><strong>'.__('Pages:').'</strong> ', '</p>', 'number'); ?></div>
                    
                    
                </div>
                
                
                
                        </div>
            <?php endwhile ?> 
                </div>
			<div class="comments_template"><?php comments_template('',true); ?></div>
            <?php endif ?>

    </div>
   
    <!--PAGE END-->
    
<?php if(of_get_option('nosidebar_checkbox') == "0"){ ?><?php get_sidebar();?><?php } ?>
</div>
<?php get_footer(); ?>