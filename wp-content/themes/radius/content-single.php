<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <h1 class="entry-title entry-title-single"><?php the_title(); ?></h1>
  
  <div class="entry-meta">
    
	<?php if ( 'post' == get_post_type() ) : ?>
	<?php echo radius_post_date() . radius_post_comments() . radius_post_author(); ?>
    <?php if ( is_sticky() ) : printf( '<span class="entry-meta-sep"> &sdot; </span> <span class="entry-meta-featured">%1$s</span>', __( 'Featured', 'radius' ) ); endif; ?>
    <?php endif; ?>      
    
	<?php echo radius_post_edit_link(); ?>
  
  </div><!-- .entry-meta -->
  
  <div class="entry-content">
  	<?php the_content(); ?>
	<div class="clear"></div>				
  </div> <!-- end .entry-content -->
  
  <?php echo radius_link_pages(); ?>
  
  <?php if ( 'post' == get_post_type() ) : ?>
  <div class="entry-meta-bottom">
  <?php echo radius_post_category() . radius_post_tags(); ?>
  </div><!-- .entry-meta -->
  <?php endif; ?>     

</div> <!-- end #post-<?php the_ID(); ?> .post_class -->

<?php radius_author(); ?> 

<?php comments_template( '', true ); ?>