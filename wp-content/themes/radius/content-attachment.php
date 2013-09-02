<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <h1 class="entry-title entry-title-single"><?php the_title(); ?></h1>
  
  <div class="entry-meta">
    
	<?php if ( 'attachment' == get_post_type() ) : ?>
	<?php echo radius_post_date() . radius_post_comments() . radius_post_author(); ?>
    <?php if ( is_sticky() ) : printf( '<span class="entry-meta-sep"> &sdot; </span> <span class="entry-meta-featured">%1$s</span>', __( 'Featured', 'radius' ) ); endif; ?>
    <?php endif; ?>      
    
	<?php echo radius_post_edit_link(); ?>
  
  </div><!-- .entry-meta -->
  
  <?php radius_loop_nav_singular(); ?>
  
  <div class="entry-content entry-attachment">
  	<p><a href="<?php echo wp_get_attachment_url( $post->ID ); ?>"><?php echo wp_get_attachment_image( $post->ID, 'large' ); ?></a></p>
    <?php the_excerpt(); ?>
	<div class="clear"></div>				
  </div> <!-- end .entry-content -->
  
  <?php echo radius_link_pages(); ?>
  
  <?php if ( 'post' == get_post_type() ) : ?>
  <div class="entry-meta-bottom">
  <?php echo radius_post_category() . radius_post_tags(); ?>
  </div><!-- .entry-meta -->
  <?php endif; ?>     

</div> <!-- end #post-<?php the_ID(); ?> .post_class -->

<?php radius_loop_nav_singular_attachment(); ?>

<?php comments_template( '', true ); ?>