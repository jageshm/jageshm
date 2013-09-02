/**
 * Functions file for loading custom Admin JS.
 *
 * @package Radius
 * @subpackage Functions
 */

(function($){
	
	/** jQuery Document Ready */
	$(document).ready(function(){
		
		$( '#radius_tabs' ).tabs({
			cookie: { expires: 1 }
		});
		
	});

	/** jQuery Windows Load */
	$(window).load(function(){
	});	

})(jQuery);