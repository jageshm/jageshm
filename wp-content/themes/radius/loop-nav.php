<?php
if ( !is_singular() ):

	radius_loop_nav();
	
elseif ( is_singular( 'post' ) ) :

	radius_loop_nav_singular_post();

endif;
?>