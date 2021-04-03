/*--------------------------------------------*/
jQuery.noConflict()(function($) {
    $(window).load(function() {								
        $('#slider').nivoSlider();		
    });
});
/*---------------------------------------------*/
jQuery.noConflict()(function($) {
	jQuery(document).ready(function() {
		jQuery('#mycarousel').jcarousel({
		wrap: 'circular',
		scroll: 1,		
		auto:5
		});
	});
});