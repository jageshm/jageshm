<div class="wrap">
  
  <?php 
  /** Get the parent theme data. */
  $radius_theme_data = radius_theme_data();
  screen_icon();
  ?>
  <h2><?php echo sprintf( __( '%1$s Theme Settings', 'radius' ), $radius_theme_data['Name'] ); ?></h2>    
  
  <?php settings_errors( 'radius_options' ); ?>
  
  <form action="options.php" method="post">
    
    <?php settings_fields('radius_options_group'); ?>
    
    <div id="radius_tabs" class="radius-tabs">
    
      <ul>
        <li><a href="#radius_section_blog_tab"><?php _e( 'Blog Options', 'radius' ); ?></a></li>
        <li><a href="#radius_section_general_tab"><?php _e( 'General Options', 'radius' ); ?></a></li>        
      </ul>
      
      <div id="radius_section_blog_tab"><?php do_settings_sections( 'radius_section_blog_page' ); ?></div>
      <div id="radius_section_general_tab"><?php do_settings_sections( 'radius_section_general_page' ); ?></div>      
    
    </div>
    
    <p class="submit">
      <input name="Submit" type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'radius' ); ?>" />
    </p>
  
  </form>

</div>