/* <![CDATA[ */
//THERON JavaScript 

jQuery(window).load(function($) {
jQuery('.logo:has(img)').css({"paddingBottom":"0px"});

jQuery('.comments_template .navigation a, .comments_template .navigation span').wrapAll('<div class="compagin" />');


//IE FIX
//IE SELECTORS
jQuery('.lay1 .hentry:eq(3), .lay1 .hentry:eq(7), .lay1 .hentry:eq(11), .lay1 .hentry:eq(15), .lay1 .hentry:eq(19), .lay1 .hentry:eq(23), .lay2 .hentry:eq(2), .lay2 .hentry:eq(5), .lay2 .hentry:eq(8), .lay2 .hentry:eq(11), .lay2 .hentry:eq(14), .lay2 .hentry:eq(17), .lay3 .hentry:eq(2), .lay3 .hentry:eq(5), .lay3 .hentry:eq(8), .lay3 .hentry:eq(11), .lay3 .hentry:eq(14), .lay3 .hentry:eq(17), .ads-125x125 a:eq(1) img, .ads-125x125 a:eq(3) img').css({'margin-Right':'0px'});


//Social icons Animation

jQuery(".soc_fb a").hover(function() {jQuery(this).stop().animate({backgroundPositionY: '-36px', backgroundPositionX: '0px'}, 100)},
    function() {jQuery(this).stop().animate({backgroundPositionY: '0px', backgroundPositionX: '0px'}, 100)});

jQuery(".soc_tw a").hover(function() {jQuery(this).stop().animate({backgroundPositionY: '-36px', backgroundPositionX: '-36px'}, 100)},
    function() {jQuery(this).stop().animate({backgroundPositionY: '0px', backgroundPositionX: '-36px'}, 100)});

jQuery(".soc_plus a").hover(function() {jQuery(this).stop().animate({backgroundPositionY: '-36px', backgroundPositionX: '-72px'}, 100)},
    function() {jQuery(this).stop().animate({backgroundPositionY: '0px', backgroundPositionX: '-72px'}, 100)});
	
jQuery(".soc_ytb a").hover(function() {jQuery(this).stop().animate({backgroundPositionY: '-36px', backgroundPositionX: '-108px'}, 100)},
    function() {jQuery(this).stop().animate({backgroundPositionY: '0px', backgroundPositionX: '-108px'}, 100)});
	
jQuery(".soc_lnkd a").hover(function() {jQuery(this).stop().animate({backgroundPositionY: '-36px', backgroundPositionX: '-144px'}, 100)},
    function() {jQuery(this).stop().animate({backgroundPositionY: '0px', backgroundPositionX: '-144px'}, 100)});	

jQuery(".soc_pin a").hover(function() {jQuery(this).stop().animate({backgroundPositionY: '-36px', backgroundPositionX: '-179px'}, 100)},
    function() {jQuery(this).stop().animate({backgroundPositionY: '0px', backgroundPositionX: '-178px'}, 100)});
	
jQuery(".soc_rss a").hover(function() {jQuery(this).stop().animate({backgroundPositionY: '-36px', backgroundPositionX: '-215px'}, 100)},
    function() {jQuery(this).stop().animate({backgroundPositionY: '0px', backgroundPositionX: '-215px'}, 100)});	

jQuery(".soc_flkr a").hover(function() {jQuery(this).stop().animate({backgroundPositionY: '-36px', backgroundPositionX: '-251px'}, 100)},
    function() {jQuery(this).stop().animate({backgroundPositionY: '0px', backgroundPositionX: '-251px'}, 100)});
	
	
	
	//MENU Animation
	if (jQuery(window).width() > 480) {
	jQuery('#topmenu ul > li').hoverIntent(function(){
	jQuery(this).find('.sub-menu:first, ul.children:first').slideDown({ duration: 200});
	}, function(){
	jQuery(this).find('.sub-menu:first, ul.children:first').slideUp({ duration: 200});	
	});
	jQuery('#topmenu ul li').not('#topmenu ul li ul li').hover(function(){
	jQuery(this).addClass('menu_hover');
	}, function(){
	jQuery(this).removeClass('menu_hover');	
	});
	jQuery('#topmenu li').has("ul").addClass('zn_parent_menu');
	jQuery('.zn_parent_menu > a').append("<span></span>");
	}
	
jQuery('.midrow_blocks_wrap').equalWidths(); 



//Layout 1 Date Animation
	jQuery('.lay1 .date_meta').css({"left":"-80px"});
 	jQuery('.lay1 .hentry').hoverIntent(function(){
	jQuery(this).find('.date_meta').animate({ "left":"0px"}, 200);
	}, function(){
	jQuery(this).find('.date_meta').animate({"left":"-80px"}, 100);	
	});


	//Comment Form
jQuery('.comment-form-author, .comment-form-email, .comment-form-url').wrapAll('<div class="field_wrap" />');

jQuery(".comment-reply-link").click(function () {
      jQuery('#respond_wrap .single_skew_comm, #respond_wrap .single_skew').hide();
    });
jQuery("#cancel-comment-reply-link").click(function () {
      jQuery('#respond_wrap .single_skew_comm, #respond_wrap .single_skew').show();
    });	
	
});


/* ]]> */