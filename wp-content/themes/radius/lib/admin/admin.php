<?php
/**
 * Theme administration functions.
 *
 * @package Radius
 * @subpackage Admin
 */

class RadiusAdmin {
		
		/** Constructor Method */
		function __construct() {
	
			/** Load the admin_init functions. */
			add_action( 'admin_init', array( &$this, 'admin_init' ) );
			
			/* Hook the settings page function to 'admin_menu'. */
			add_action( 'admin_menu', array( &$this, 'settings_page_init' ) );		
	
		}
		
		/** Initializes any admin-related features needed for the framework. */
		function admin_init() {
			
			/** Registers admin JavaScript and Stylesheet files for the framework. */
			add_action( 'admin_enqueue_scripts', array( &$this, 'admin_register_scripts' ), 1 );
		
			/** Loads admin JavaScript and Stylesheet files for the framework. */
			add_action( 'admin_enqueue_scripts', array( &$this, 'admin_enqueue_scripts' ) );
			
		}
		
		/** Registers admin JavaScript and Stylesheet files for the framework. */
		function admin_register_scripts() {
			
			/** Register Admin Stylesheet */
			wp_register_style( 'radius-admin-css-style', esc_url( trailingslashit( RADIUS_ADMIN_URI ) . 'style.css' ) );
			wp_register_style( 'radius-admin-css-ui-smoothness', esc_url( trailingslashit( RADIUS_JS_URI ) . 'ui/css/smoothness/jquery-ui-1.8.18.custom.css' ) );
			
			/** Register Admin Scripts */
			wp_register_script( 'radius-admin-js-radius', esc_url( trailingslashit( RADIUS_ADMIN_URI ) . 'radius.js' ), array( 'jquery-ui-tabs' ) );
			wp_register_script( 'radius-admin-js-jquery-cookie', esc_url( trailingslashit( RADIUS_JS_URI ) . 'jquery.cookie.js' ), array( 'jquery' ) );
			
		}
		
		/** Loads admin JavaScript and Stylesheet files for the framework. */
		function admin_enqueue_scripts() {			
		}
		
		/** Initializes all the theme settings page functionality. This function is used to create the theme settings page */
		function settings_page_init() {
			
			global $radius;
			
			/** Register theme settings. */
			register_setting( 'radius_options_group', 'radius_options', array( &$this, 'radius_options_validate' ) );
			
			/* Create the theme settings page. */
			$radius->settings_page = add_theme_page( 
				esc_html( __( 'Radius Options', 'radius' ) ),	/** Settings page name. */
				esc_html( __( 'Radius Options', 'radius' ) ),	/** Menu item name. */
				$this->settings_page_capability(),				/** Required capability */
				'radius-options', 								/** Screen name */
				array( &$this, 'settings_page' )				/** Callback function */
			);
			
			/* Check if the settings page is being shown before running any functions for it. */
			if ( !empty( $radius->settings_page ) ) {
				
				/** Add contextual help to the theme settings page. */
				add_action( 'load-'. $radius->settings_page, array( &$this, 'settings_page_contextual_help' ) );
				
				/* Load the JavaScript and stylesheets needed for the theme settings screen. */
				add_action( 'admin_enqueue_scripts', array( &$this, 'settings_page_enqueue_scripts' ) );
				
				/** Configure settings Sections and Fileds. */
				$this->settings_sections();
				
				/** Configure default settings. */
				$this->settings_default();				
				
			}
			
		}
		
		/** Returns the required capability for viewing and saving theme settings. */
		function settings_page_capability() {
			return 'edit_theme_options';
		}
		
		/** Displays the theme settings page. */
		function settings_page() {
			require( trailingslashit( RADIUS_ADMIN_DIR ) . 'page.php' );
		}
		
		/** Text for the contextual help for the theme settings page in the admin. */
		function settings_page_contextual_help() {
			
			/** Get the parent theme data. */
			$theme = radius_theme_data();
			$AuthorURI = $theme['AuthorURI'];
			$ThemeURI = $theme['ThemeURI'];
		
			/** Get the current screen */
			$screen = get_current_screen();
			
			/** Help Tab */
			$screen->add_help_tab( array(
				
				'id' => 'theme-settings-support',
				'title' => __( 'Theme Support', 'radius' ),
				'content' => implode( '', file( trailingslashit( RADIUS_ADMIN_DIR ) . 'help/support.html' ) ),				
				
				)
			);
			
			/** Help Sidebar */
			$sidebar = '<p><strong>' . __( 'For more information:', 'radius' ) . '</strong></p>';
			if ( !empty( $AuthorURI ) ) {
				$sidebar .= '<p><a href="' . esc_url( $AuthorURI ) . '" target="_blank">' . __( 'Radius Project', 'radius' ) . '</a></p>';
			}
			if ( !empty( $ThemeURI ) ) {
				$sidebar .= '<p><a href="' . esc_url( $ThemeURI ) . '" target="_blank">' . __( 'Radius Official Page', 'radius' ) . '</a></p>';
			}			
			$screen->set_help_sidebar( $sidebar );
			
		}
		
		/** Loads admin JavaScript and Stylesheet files for displaying the theme settings page in the WordPress admin. */
		function settings_page_enqueue_scripts( $hook ) {
			
			/** Load Scripts For Radius Options Page */
			if( $hook === 'appearance_page_radius-options' ) {
				
				/** Load Admin Stylesheet */
				wp_enqueue_style( 'radius-admin-css-style' );
				wp_enqueue_style( 'radius-admin-css-ui-smoothness' );
				
				/** Load Admin Scripts */
				wp_enqueue_script( 'radius-admin-js-radius' );
				wp_enqueue_script( 'radius-admin-js-jquery-cookie' );
				
			}
				
		}
		
		/** Configure settings Sections and Fileds */		
		function settings_sections() {
		
			/** Blog Section */
			add_settings_section( 'radius_section_blog', 'Blog Options', array( &$this, 'radius_section_blog_fn' ), 'radius_section_blog_page' );			
			
			add_settings_field( 'radius_field_post_style', __( 'Post Style', 'radius' ), array( &$this, 'radius_field_post_style_fn' ), 'radius_section_blog_page', 'radius_section_blog' );
			add_settings_field( 'radius_field_post_nav_style', __( 'Post Navigation Style', 'radius' ), array( &$this, 'radius_field_post_nav_style_fn' ), 'radius_section_blog_page', 'radius_section_blog' );
			
			/** General Section */
			add_settings_section( 'radius_section_general', 'General Options', array( &$this, 'radius_section_general_fn' ), 'radius_section_general_page' );
			
			add_settings_field( 'radius_field_analytic', __( 'Use Analytic', 'radius' ), array( &$this, 'radius_field_analytic_fn' ), 'radius_section_general_page', 'radius_section_general' );
			add_settings_field( 'radius_field_analytic_code', __( 'Enter Analytic Code', 'radius' ), array( &$this, 'radius_field_analytic_code_fn' ), 'radius_section_general_page', 'radius_section_general' );
			add_settings_field( 'radius_field_copyright', __( 'Enter Copyright Text', 'radius' ), array( &$this, 'radius_field_copyright_fn' ), 'radius_section_general_page', 'radius_section_general' );
			add_settings_field('radius_field_reset', __( 'Reset Theme Options', 'radius' ), array( &$this, 'radius_field_reset_fn' ), 'radius_section_general_page', 'radius_section_general' );
		
		}
		
		/** Configure default settings. */		
		function settings_default() {
			global $radius;
			
			$radius_reset = false;
			$radius_options = radius_get_settings();
			
			/** Radius Reset Logic */
			if ( !is_array( $radius_options ) ) {			
				$radius_reset = true;			
			} 						
			elseif ( $radius_options['radius_reset'] == 1 ) {			
				$radius_reset = true;			
			}			
			
			/** Let Reset Radius */
			if( $radius_reset == true ) {
				
				$default = array(
					
					'radius_post_style' => 'content',
					'radius_post_nav_style' => 'numeric',
					
					'radius_analytic' => 0,
					'radius_analytic_code' => 'Analytic Code',
					
					'radius_copyright' => '&copy; Copyright '. date( 'Y' ) .' - <a href="'. home_url( '/' ) .'">'. get_bloginfo( 'name' ) .'</a>',
					
					'radius_reset' => 0,
					
				);
				
				update_option( 'radius_options' , $default );
			
			}
		
		}
		
		/** Radius Pre-defined Range */
		
		/* Boolean Yes | No */		
		function radius_pd_boolean() {			
			return array( 1 => __( 'yes', 'radius' ), 0 => __( 'no', 'radius' ) );		
		}
		
		/* Post Style Range */		
		function radius_pd_post_style() {			
			return array( 'content' => __( 'Content', 'radius' ), 'excerpt' => __( 'Excerpt (Magazine Style)', 'radius' ) );			
		}
		
		/* Post Navigation Style Range */		
		function radius_pd_post_nav_style() {			
			return array( 'numeric' => __( 'Numeric', 'radius' ), 'older-newer' => __( 'Older / Newer', 'radius' ) );			
		}
		
		/** Radius Options Validation */				
		function radius_options_validate( $input ) {
			
			/* Validation: radius_post_style */
			$radius_pd_post_style = $this->radius_pd_post_style();
			if ( ! array_key_exists( $input['radius_post_style'], $radius_pd_post_style ) ) {
				 $input['radius_post_style'] = 'excerpt';
			}
			
			/* Validation: radius_post_nav_style */
			$radius_pd_post_nav_style = $this->radius_pd_post_nav_style();
			if ( ! array_key_exists( $input['radius_post_nav_style'], $radius_pd_post_nav_style ) ) {
				 $input['radius_post_nav_style'] = 'numeric';
			}								
			
			/* Validation: radius_analytic */
			$radius_pd_boolean = $this->radius_pd_boolean();
			if ( ! array_key_exists( $input['radius_analytic'], $radius_pd_boolean ) ) {
				 $input['radius_analytic'] = 0;
			}
			
			/* Validation: radius_analytic_code */
			if( !empty( $input['radius_analytic_code'] ) ) {
				$input['radius_analytic_code'] = htmlspecialchars ( $input['radius_analytic_code'] );
			}
			
			/* Validation: radius_copyright */
			if( !empty( $input['radius_copyright'] ) ) {
				$input['radius_copyright'] = esc_html ( $input['radius_copyright'] );
			}
			
			/* Validation: radius_reset */
			$radius_pd_boolean = $this->radius_pd_boolean();
			//if ( ! array_key_exists( radius_undefined_index_fix ( $input['radius_reset'] ), $radius_pd_boolean ) ) {
			if ( ! array_key_exists( $input['radius_reset'], $radius_pd_boolean ) ) {
				 $input['radius_reset'] = 0;
			}
			
			add_settings_error( 'radius_options', 'radius_options', __( 'Settings Saved.', 'radius' ), 'updated' );
			
			return $input;
		
		}
		
		/** Blog Section Callback */				
		function radius_section_blog_fn() {
			_e( 'Radius Blog Options', 'radius' );
		}
		
		/* Post Style Callback */		
		function radius_field_post_style_fn() {
			
			$radius_options = get_option('radius_options');
			$items = $this->radius_pd_post_style();			
			
			foreach( $items as $key => $val ) {
			?>
            <label><input type="radio" id="radius_post_style[]" name="radius_options[radius_post_style]" value="<?php echo $key; ?>" <?php checked( $key, $radius_options['radius_post_style'] ); ?> /> <?php echo $val; ?></label><br />
            <?php
			}		
		
		}
		
		/* Post Style Navigaiton Callback */		
		function radius_field_post_nav_style_fn() {
			
			$radius_options = get_option('radius_options');
			$items = $this->radius_pd_post_nav_style();			
			
			foreach( $items as $key => $val ) {
			?>
            <label><input type="radio" id="radius_post_nav_style[]" name="radius_options[radius_post_nav_style]" value="<?php echo $key; ?>" <?php checked( $key, $radius_options['radius_post_nav_style'] ); ?> /> <?php echo $val; ?></label><br />
            <?php
			}
		
		}
		
		/** General Section Callback */				
		function radius_section_general_fn() {
			_e( 'Radius General Options', 'radius' );
		}
		
		/* Analytic Callback */		
		function  radius_field_analytic_fn() {
			
			$radius_options = get_option( 'radius_options' );
			$items = $this->radius_pd_boolean();
			
			echo '<select id="radius_analytic" name="radius_options[radius_analytic]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $radius_options['radius_analytic'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( 'Select yes to add your Analytic code.', 'radius' ) .'</small></div>';
		
		}
		
		function radius_field_analytic_code_fn() {
			
			$radius_options = get_option('radius_options');
			echo '<textarea type="textarea" id="radius_analytic_code" name="radius_options[radius_analytic_code]" rows="7" cols="50">'. htmlspecialchars_decode ( $radius_options['radius_analytic_code'] ) .'</textarea>';
			echo '<div><small>'. __( 'Enter the Analytic code.', 'radius' ) .'</small></div>';
		
		}
		
		/* Copyright Text Callback */		
		function radius_field_copyright_fn() {
			
			$radius_options = get_option('radius_options');
			echo '<textarea type="textarea" id="radius_copyright" name="radius_options[radius_copyright]" rows="7" cols="50">'. esc_html ( $radius_options['radius_copyright'] ) .'</textarea>';
			echo '<div><small>'. __( 'Enter Copyright Text.', 'radius' ) .'</small></div>';
			echo '<div><small>Example: <strong>&amp;copy; Copyright '.date('Y').' - &lt;a href="'. home_url( '/' ) .'"&gt;'. get_bloginfo('name') .'&lt;/a&gt;</strong></small></div>';
		
		}		
		
		/* Theme Reset Callback */		
		function radius_field_reset_fn() {
			
			$radius_options = get_option('radius_options');			
			$items = $this->radius_pd_boolean();			
			echo '<label><input type="checkbox" id="radius_reset" name="radius_options[radius_reset]" value="1" /> '. __( 'Reset Theme Options.', 'radius' ) .'</label>';
		
		}
}

/** Initiate Admin */
new RadiusAdmin();
?>