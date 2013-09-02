<div class="slider-wrapper theme-default">
<div id="zn_nivo" class="zn_nivo">

        <?php $loop = new WP_Query( array( 'post_type' => 'slider', 'posts_per_page' => ''.$zn_fonts = of_get_option('number_select').'' ) ); ?>
        <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <?php $therondata = get_post_meta($post->ID, 'theron_slide_link', TRUE); ?>
        <?php $theronnivoimg = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
        <?php $theronnivothmb = wp_get_attachment_thumb_url( get_post_thumbnail_id($post->ID) ); ?>
        <a href="<?php echo $therondata; ?>"><img src="<?php echo $theronnivoimg ?>" data-thumb="<?php echo $theronnivothmb ?>" alt="<?php the_title(); ?>" title="#nv_<?php the_ID(); ?>" /></a>

         <?php endwhile; else: ?>
<img data-thumb="<?php echo get_template_directory_uri(); ?>/images/slide1_thumb.jpg" title="#nv_1" src="<?php echo get_template_directory_uri(); ?>/images/slide1.jpg" />
<img data-thumb="<?php echo get_template_directory_uri(); ?>/images/slide2_thumb.jpg" title="#nv_2" src="<?php echo get_template_directory_uri(); ?>/images/slide2.jpg" />
<?php endif; ?>
            <?php wp_reset_query(); ?>
        </div>
        
        <?php if(of_get_option('sldrtxt_checkbox') == "1"){ ?>
        <?php $loop = new WP_Query( array( 'post_type' => 'slider', 'posts_per_page' => ''.$zn_fonts = of_get_option('number_select').'' ) ); ?>
        <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>         
            <div id="nv_<?php the_ID(); ?>" class="nivo-html-caption">
        <?php $therondata = get_post_meta($post->ID, 'theron_slide_link', TRUE); ?>           
            <?php the_title( '<h2 class="entry-title"><a href="' . $therondata . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>
                <?php the_excerpt(); ?>
            </div>
                    <?php endwhile; else: ?>
             <div id="nv_1" class="nivo-html-caption">          
            <h2 class="entry-title"><?php echo of_get_option('block1_text'); ?></h2>
                <p><?php echo of_get_option('block1_textarea'); ?></p>
            </div>
            
            <div id="nv_2" class="nivo-html-caption">         
           <h2 class="entry-title"><?php echo of_get_option('block2_text'); ?></h2>
                <p><?php echo of_get_option('block2_textarea'); ?></p>
            </div>
                    <?php endif; ?>
         <?php } ?>

</div>