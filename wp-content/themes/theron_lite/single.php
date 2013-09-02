
<?php get_header(); ?>

<!--Content-->
<div id="content">
<div class="single_wrap">
<div class="single_post">
                   <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                
                <div class="post_content">
                    <h2 class="postitle"><?php the_title(); ?></h2>
                    <div class="single_metainfo"><a class="comm_date"><?php the_time( get_option('date_format') ); ?></a><?php if(of_get_option('dissauth_checkbox') == "0"){ ?>  <a class="meta_auth"><?php the_author(); ?></a><?php } ?>
                    <?php edit_post_link(); ?>
                    </div>
                    <div class="thn_post_wrap"><?php the_content(); ?> </div>
                    <div style="clear:both"></div>
                    
                    <div class="thn_post_wrap"><?php wp_link_pages('<p class="pages"><strong>'.__('Pages:').'</strong> ', '</p>', 'number'); ?>
                    
                      <div class="alignleft">
					  <?php if (is_attachment()){ previous_image_link( false, '&#171; '.__('Previous Image' , 'theron').'' ); } else { previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'theron' ) ); } ?> 
                      </div>
						<div class="alignright"><?php if (is_attachment()){ next_image_link( false, ''.__('Next Image' , 'theron').' &#187;' ); } else { next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'theron' ) ); } ?>
                        </div>

                    </div>
                    
                    
                    <!--Post Footer-->
                    <div class="post_foot">
					<?php if(of_get_option('disscats_checkbox') == "0"){ ?>
                        <div class="post_meta">
     <?php if( has_tag() ) { ?><div class="post_tag"><div class="tag_list"><?php the_tags('','  '); ?></div></div><?php } ?>
     <?php if( has_category() ) { ?><div class="post_cat"><div class="catag_list"><?php the_category(' '); ?></div></div><?php } ?>
                        
                        </div>
					<?php } ?>
                        
                   </div>
                    
                </div>
                
<?php if(of_get_option('dissshare_checkbox') == "1"){ ?><?php get_template_part('share_this');?><?php } ?>
                
                        </div>
                        
            <?php endwhile ?> 
            
                </div>   
				<div class="comments_template"><?php comments_template('',true); ?></div>
            <?php endif ?>

</div>

    
    <!--POST END-->
    
<?php if(of_get_option('nosidebar_checkbox') == "0"){ ?><?php get_sidebar();?><?php } ?>
</div>
<?php get_footer(); ?>