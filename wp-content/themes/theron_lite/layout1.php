<div class="lay1">
<div class="lay1_wrap">

<?php if(of_get_option('frontcat_checkbox') == "1"){ ?>
<?php if(is_front_page()) { 
	 $args = array(
				   'cat' => ''.$zn_front = of_get_option('front_cat').'',
				   'post_type' => 'post',
				   'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
				   'posts_per_page' => ''.$zn_fonts = of_get_option('frontnum_select').'');
	query_posts($args);
} ?>
<?php }?>

                   <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                             
 
            
                <div class="post_image">
                     <!--CALL TO POST IMAGE-->
                    <?php if ( has_post_thumbnail() ) : ?>
                    <div class="imgwrap">
						<div class="catmeta"><?php $category = get_the_category(); if($category[0]){echo '<a href="'.get_category_link($category[0]->term_id ).'">+'.$category[0]->cat_name.'</a>';}?></div>
                        
                        <div class="date_meta"><?php the_time('d'); ?><?php the_time('S'); ?> <?php the_time('M'); ?> <?php the_time('Y'); ?></div>
                        
                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium'); ?></a></div>
                    
                    <?php elseif($photo = theron_get_images('numberposts=1', true)): ?>
    
                    <div class="imgwrap">
						<div class="catmeta"><?php $category = get_the_category(); if($category[0]){echo '<a href="'.get_category_link($category[0]->term_id ).'">+'.$category[0]->cat_name.'</a>';}?></div>
                        
                        <div class="date_meta"><?php the_time('d'); ?><?php the_time('S'); ?> <?php the_time('M'); ?> <?php the_time('Y'); ?></div>                      
                        
                	<a href="<?php the_permalink();?>"><?php echo wp_get_attachment_image($photo[0]->ID ,'medium'); ?></a></div>
                
                    <?php else : ?>
                    
                    <div class="imgwrap">
						<div class="catmeta"><?php $category = get_the_category(); if($category[0]){echo '<a href="'.get_category_link($category[0]->term_id ).'">+'.$category[0]->cat_name.'</a>';}?></div>
                        <div class="date_meta"><?php the_time('d'); ?><?php the_time('S'); ?> <?php the_time('M'); ?> <?php the_time('Y'); ?></div>
                        
                    <a href="<?php the_permalink();?>"><img src="<?php echo get_template_directory_uri(); ?>/images/blank_img.png" alt="<?php the_title_attribute(); ?>" class="thn_thumbnail"/></a></div>   
                             
                    <?php endif; ?>
                </div>
                
                
                <div class="post_content">
                    <h2 class="postitle"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <?php theron_excerpt('theron_excerptlength_teaser', 'theron_excerptmore'); ?> 
                    
                </div>

                        </div>
            <?php endwhile ?> 

            <?php endif ?>
</div>
           <?php if (function_exists("theron_paginate")) {theron_paginate();} ?>
            <div class="hidden_nav"><?php paginate_links(); ?></div>

    </div>