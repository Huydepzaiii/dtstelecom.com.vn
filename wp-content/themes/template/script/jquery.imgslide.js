/* =========================================================
// jQuery Image Slide Plugin
// Date: November, 2009
// Version: 1.0
// Copyright (c) 2009 Blaine Robison
// Website: http://spoonfedproject.com
// Author: Blaine Robison
/* ========================================================= */
jQuery.noConflict()(function($) {
(function($){
	$.fn.imgslide = function(options){
		// Declare default values
		var defaults = {
				top : '0px',
				right : '0px',
				bottom : '0px',
				left : '0px',
				duration : 200
			},
			// Override default values if options are passed in
			options = $.extend(defaults, options);
		// Loop through all images being called
		this.each(function(){
			var $this = $(this),
			// Grab original css property values
			defTop = '',
			defRight = '',
			defBottom = '',
			defLeft = '';
			// If original value is 'auto' change to 0px. Needed for browsers other than Firefox	
			(($this).css('top') == 'auto')? defTop = '0px' : defTop = ($this).css('top');
			(($this).css('right') == 'auto')? defRight = '0px' : defRight = ($this).css('right');
			(($this).css('bottom') == 'auto')? defBottom = '0px' : defBottom = ($this).css('bottom');
			(($this).css('left') == 'auto')? defLeft = '0px' : defLeft = ($this).css('left');
			// Run animation when hovered
			$this.hover(function(){
				$($this).stop().animate({top:options.top,right:options.right,bottom:options.bottom,left:options.left},{queue:false,duration:options.duration});					 
			}, function(){
				$($this).stop().animate({top:defTop,right:defRight,bottom:defBottom,left:defLeft},{queue:false,duration:options.duration});					 
			});
		});
	// Ensure chainability	
	return this;
	}
})(jQuery);
});	