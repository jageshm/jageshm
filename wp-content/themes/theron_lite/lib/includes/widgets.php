<?php


/* ---------------------------- */
/* -------- Popular Posts Widget -------- */
/* ---------------------------- */
add_action( 'widgets_init', 'theron_pop_widgets' );

/*
 * Register widget.
 */
function theron_pop_widgets() {
	register_widget( 'theron_pop_Widget' );
}

/*
 * Widget class.
 */
class theron_pop_widget extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function theron_pop_Widget() {
	
		/* Widget settings */
		$widget_ops = array( 'classname' => 'theron_pop_widget', 'description' => __('A Theron widget that displays the most popular posts of the site, Based on the comments count ', 'theron') );

		/* Widget control settings */
		//$control_ops = array( 'width' => 160, 'height' => 600, 'id_base' => 'thn_pop_widget' );

		/* Create the widget */
		$this->WP_Widget( 'theron_pop_widget', __('Popular Posts Widget', 'theron'), $widget_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$num = $instance['num'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
			
		/* Display a containing div */
		echo '<div class="thn_pop">';

		/* Display Posts */
		if ( $num )
		$popular = new WP_Query('ignore_sticky_posts=1&orderby=comment_count&posts_per_page=' . $num);
		
		echo '<ul>';
		while ($popular->have_posts()) : $popular->the_post();
		echo '<li>';
		echo '<a class="thn_wgt_thumb" href="' . get_permalink(get_the_ID()) . '" title="' . get_the_title() . '">';
		if ( has_post_thumbnail() ) :
		echo ''. the_post_thumbnail('thumbnail') . '';
		elseif($photo = theron_get_images('numberposts=1', true)):
		echo ''. wp_get_attachment_image($photo[0]->ID , $size='thumbnail') . '';
		else :
		echo '<img src="'.get_template_directory_uri().'/images/blank_img2.png" alt="'.get_the_title().'" class="thumbnail"/>';
		endif;
		echo '</a>';
		echo '<div class="widget_content">';
		echo '<a class="thn_wgt_tt" href="' . get_permalink(get_the_ID()) . '" title="' . get_the_title() . '">' . get_the_title() . '</a><br />' ;
		echo ''. theron_excerpt('theron_excerptlength_index', 'theron_excerptmore') . '';
		echo '</div>';
		echo '</li>';
    
		endwhile;
		
		echo '</ul>';
			
		echo '</div>';

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/* ---------------------------- */
	/* ------- Update Widget -------- */
	/* ---------------------------- */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );

		/* No need to strip tags */
		$instance['num'] = $new_instance['num'];

		return $instance;
	}
	
	/* ---------------------------- */
	/* ------- Widget Settings ------- */
	/* ---------------------------- */
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	
	function form( $instance ) {
	
		/* Set up some default widget settings. */
		$defaults = array(
		'title' => '',
		'num' => 3,
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'theron') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Number of Posts: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'num' ); ?>"><?php _e('Number of Posts:', 'theron') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" value="<?php echo $instance['num']; ?>" />
		</p>
		
		
	<?php
	}

}


/* ---------------------------- */
/* -------- Random Posts Widget -------- */
/* ---------------------------- */

add_action( 'widgets_init', 'theron_rand_widgets' );

/*
 * Register widget.
 */
function theron_rand_widgets() {
	register_widget( 'theron_rand_Widget' );
}

/*
 * Widget class.
 */
class theron_rand_widget extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function theron_rand_Widget() {
	
		/* Widget settings */
		$widget_ops = array( 'classname' => 'theron_rand_widget', 'description' => __('A Theron widget that displays the random posts of the site', 'theron') );

		/* Widget control settings */
		//$control_ops = array( 'width' => 160, 'height' => 600, 'id_base' => 'thn_rand_widget' );

		/* Create the widget */
		$this->WP_Widget( 'theron_rand_widget', __('Random Posts Widget', 'theron'), $widget_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$num = $instance['num'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
			
		/* Display a containing div */
		echo '<div class="thn_rand">';

		/* Display Posts */
		if ( $num )
		$popular = new WP_Query('ignore_sticky_posts=1&orderby=rand&posts_per_page=' . $num);
		
		echo '<ul>';
		while ($popular->have_posts()) : $popular->the_post();
		echo '<li>';
		echo '<a class="thn_wgt_thumb" href="' . get_permalink(get_the_ID()) . '" title="' . get_the_title() . '">';
		if ( has_post_thumbnail() ) :
		echo ''. the_post_thumbnail('thumbnail') . '';
		elseif($photo = theron_get_images('numberposts=1', true)):
		echo ''. wp_get_attachment_image($photo[0]->ID , $size='thumbnail') . '';
		else :
		echo '<img src="'.get_template_directory_uri().'/images/blank_img2.png" alt="'.get_the_title().'" class="thumbnail"/>';
		endif;
		echo '</a>';
		echo '<div class="widget_content">';
		echo '<a class="thn_wgt_tt" href="' . get_permalink(get_the_ID()) . '" title="' . get_the_title() . '">' . get_the_title() . '</a><br />' ;
		echo ''. theron_excerpt('theron_excerptlength_index', 'theron_excerptmore') . '';
		echo '</div>';
		echo '</li>';
    
		endwhile;
		
		echo '</ul>';
			
		echo '</div>';

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/* ---------------------------- */
	/* ------- Update Widget -------- */
	/* ---------------------------- */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );

		/* No need to strip tags */
		$instance['num'] = $new_instance['num'];

		return $instance;
	}
	
	/* ---------------------------- */
	/* ------- Widget Settings ------- */
	/* ---------------------------- */
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	
	function form( $instance ) {
	
		/* Set up some default widget settings. */
		$defaults = array(
		'title' => '',
		'num' => 3,
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'theron') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Number of Posts: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'num' ); ?>"><?php _e('Number of Posts:', 'theron') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" value="<?php echo $instance['num']; ?>" />
		</p>
		
		
	<?php
	}

}

/*
	/* ---------------------------- */
	/* -------- Featured Posts Widget -------- */
	/* ---------------------------- */
add_action( 'widgets_init', 'theron_feat_widgets' );

/*
 * Register widget.
 */
function theron_feat_widgets() {
	register_widget( 'theron_feat_Widget' );
}

/*
 * Widget class.
 */
class theron_feat_widget extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function theron_feat_Widget() {
	
		/* Widget settings */
		$widget_ops = array( 'classname' => 'theron_feat_widget', 'description' => __('A Theron widget that displays the featured posts from your selected category', 'theron') );

		/* Widget control settings */
		//$control_ops = array( 'width' => 160, 'height' => 600, 'id_base' => 'thn_feat_widget' );

		/* Create the widget */
		$this->WP_Widget( 'theron_feat_widget', __('Featured Posts Widget', 'theron'), $widget_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$num = $instance['num'];
		$cat = $instance['cat'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
			
		/* Display a containing div */
		echo '<div class="thn_feat">';

		/* Display Posts */
		if ( $num )
		$popular = new WP_Query('ignore_sticky_posts=1&cat=' . $cat .' &posts_per_page=' . $num);
		echo '<ul>';
		while ($popular->have_posts()) : $popular->the_post();
		echo '<li>';
		echo '<a class="thn_wgt_thumb" href="' . get_permalink(get_the_ID()) . '" title="' . get_the_title() . '">';
		if ( has_post_thumbnail() ) :
		echo ''. the_post_thumbnail('thumbnail') . '';
		elseif($photo = theron_get_images('numberposts=1', true)):
		echo ''. wp_get_attachment_image($photo[0]->ID , $size='thumbnail') . '';
		else :
		echo '<img src="'.get_template_directory_uri().'/images/blank_img2.png" alt="'.get_the_title().'" class="thumbnail"/>';
		endif;
		echo '</a>';
		echo '<div class="widget_content">';
		echo '<a class="thn_wgt_tt" href="' . get_permalink(get_the_ID()) . '" title="' . get_the_title() . '">' . get_the_title() . '</a><br />' ;
		echo ''. theron_excerpt('theron_excerptlength_index', 'theron_excerptmore') . '';
		echo '</div>';
		echo '</li>';
    
		endwhile;
		
		echo '</ul>';
			
		echo '</div>';

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/* ---------------------------- */
	/* ------- Update Widget -------- */
	/* ---------------------------- */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );

		/* No need to strip tags */
		$instance['num'] = $new_instance['num'];
		$instance['cat'] = $new_instance['cat'];

		return $instance;
	}
	
	/* ---------------------------- */
	/* ------- Widget Settings ------- */
	/* ---------------------------- */
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	
	function form( $instance ) {
	
		/* Set up some default widget settings. */
		$defaults = array(
		'title' => '',
		'num' => 3,
		'cat' => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'theron') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
        
        <!-- Category of Posts: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e('Category:', 'theron') ?></label>
            <?php wp_dropdown_categories( array( 'name' => $this->get_field_name('cat'), 'selected' => $instance['cat'] ) ); ?>
			
		</p>

		<!-- Number of Posts: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'num' ); ?>"><?php _e('Number of Posts:', 'theron') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" value="<?php echo $instance['num']; ?>" />
		</p>
		
		
	<?php
	}

}
