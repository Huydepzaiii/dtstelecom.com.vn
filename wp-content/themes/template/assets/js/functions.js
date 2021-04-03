/*------------------------------------
	Theme Name: Maxrestaurant
	Start Date : 21 - December - 2016
	End Date : 16 - January - 2017
	Last change: 17 - January - 2017
	Version: 1.0
	Assigned to: 
	Primary use: 
---------------------------------------*/
/*	
	- Google Map
	- Dropdown Open
	- Expand Panel Resize
	- Sticky Menu
	
	- Document On Ready
		- Set Sticky Menu
		- Responsive Caret
		- Contact Map
		- Expand Panel
		- Collapse Panel
		- Switch Button
		- Select Box
		- Product Hover Overlay
		
	-- Window On Scroll
		- Set Sticky Menu
	
	-- Window On Resize
		- Expand Panel Resize
		- Dropdown Open
	
	-- Window On Load
		- Site Loader
		- Gallery Section
*/

(function($) {

	"use strict"
	
	/* - Google Map */
	function initialize(obj) {

		var lat = $('#'+obj).attr("data-lat");
		var lng = $('#'+obj).attr("data-lng");
		var contentString = $('#'+obj).attr("data-string");
		var myLatlng = new google.maps.LatLng(lat,lng);
		var map, marker, infowindow;
		var image = $('#'+obj).attr("data-marker");
		var zoomLevel = parseInt($("#"+obj).attr("data-zoom") ,10);
		var styles = [{"featureType": "administrative.province","elementType": "all","stylers": [{"visibility": "off"}]},
					 {"featureType": "landscape","elementType": "all","stylers": [{"saturation": -100},{"lightness": 65},{"visibility": "on"}]},
					 {"featureType": "poi","elementType": "all","stylers": [{"saturation": -100},{"lightness": 51},{"visibility": "simplified"}]},
					 {"featureType": "road.highway","elementType": "all","stylers": [{"saturation": -100},{"visibility": "simplified"}]},
					 {"featureType": "road.arterial","elementType": "all","stylers": [{"saturation": -100},{"lightness": 30},{"visibility": "on"}]},
					 {"featureType": "road.local","elementType": "all","stylers": [{"saturation": -100},{"lightness": 40},{"visibility": "on"}]},
					 {"featureType": "transit","elementType": "all","stylers": [{"saturation": -100},{"visibility": "simplified"}]},
					 {"featureType": "transit","elementType": "geometry.fill","stylers": [{"visibility": "on"}]},
					 {"featureType": "water","elementType": "geometry","stylers": [{"hue": "#ffff00"},{"lightness": -25},{"saturation": -97}]},
					 {"featureType": "water","elementType": "labels","stylers": [{"visibility": "on"},{"lightness": -25},{"saturation": -100}]}]
		var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});	
		var mapOptions = {
			zoom: zoomLevel,
			disableDefaultUI: true,
			center: myLatlng,
            scrollwheel: false,
			mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, "map_style"]
			}
		}
		map = new google.maps.Map(document.getElementById(obj), mapOptions);	
		map.mapTypes.set('map_style', styledMap);
		map.setMapTypeId('map_style');
		infowindow = new google.maps.InfoWindow({
			content: contentString,
			maxWidth: 300
		});		
		marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			icon: image
		});
		if(contentString != '') {
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			});	
		}
	}
	
	window.initMap = function() {}

	/* - Dropdown Open */
	function menu_dropdown_open() {
		var width = $(window).width();
		if($(".ownavigation .nav li.ddl-active").length ) {
			if( width > 991 ) {
				$(".ownavigation .nav > li").removeClass("ddl-active");
				$(".ownavigation .nav li .dropdown-menu").removeAttr("style");
			}
		} else {
			$(".ownavigation .nav li .dropdown-menu").removeAttr("style");
		}
	}
	
	$('.events-item ').on('click touchend', function(e) {
		var el = $(this);
	})
	$('.team-box ').on('click touchend', function(e) {
		var el = $(this);
	})
	
	/* - Expand Panel Resize */
	function panel_resize(){
		var width = $(window).width();
		if( width > 991 ) {
			if($(".header_s #slidepanel").length ) {
				$(".header_s #slidepanel").removeAttr("style");
			}
		}
	}
	
	/* - Sticky Menu */
	function sticky_menu() {
		var menu_scroll = $("body").offset().top;
		var scroll_top = $(window).scrollTop();
		
		if ( scroll_top > menu_scroll ) {
			$(".ownavigation").addClass("navbar-fixed-top animated fadeInDown");
		} else {
			$(".ownavigation").removeClass("navbar-fixed-top animated fadeInDown"); 
		}
	}
	
	/* - Document On Ready */
	$(document).on("ready", function() {

		var width	=	$(window).width();
		var height	=	$(window).height();
		
		/* - Set Sticky Menu */
		if( $(".header_s").length ) {
			sticky_menu();
		}
		
		$('.navbar-nav li a[href*="#"]:not([href="#"]), .site-logo a[href*="#"]:not([href="#"])').on("click", function(e) {
	
			var $anchor = $(this);
			
			$("html, body").stop().animate({ scrollTop: $($anchor.attr("href")).offset().top - 49 }, 1500, "easeInOutExpo");
			
			e.preventDefault();
		});

		/* - Responsive Caret */
		$(".ddl-switch").on("click", function() {
			var li = $(this).parent();
			if ( li.hasClass("ddl-active") || li.find(".ddl-active").length !== 0 || li.find(".dropdown-menu").is(":visible") ) {
				li.removeClass("ddl-active");
				li.children().find(".ddl-active").removeClass("ddl-active");
				li.children(".dropdown-menu").slideUp();
			}
			else {
				li.addClass("ddl-active");
				li.children(".dropdown-menu").slideDown();
			}
		});
		
		/* - Contact Map */
		if($("#map-canvas-contact-1").length==1){
			initialize("map-canvas-contact-1");
		}
		
		/* - Expand Panel */
		$("#slideit").on ("click", function() {
			$("#slidepanel").slideDown(1000);
			$("html").animate({ scrollTop: 0 }, 1000);
		});	

		/* - Collapse Panel */
		$("#closeit").on("click", function() {
			$("#slidepanel").slideUp("slow");
			$("html").animate({ scrollTop: 0 }, 1000);
		});	
		
		/* - Switch Button */
		$("#toggle a").on("click", function() {
			$("#toggle a").toggle();
		});
		
		/* - Expand Panel Resize */
		panel_resize();
		
		/* - Dropdown Open */
		menu_dropdown_open();
		
		/* - Select Box */
		$( "select:not(.wpcf7-form-control)" ).wrap( "<div class='select_box'></div>" );
		
		/* - Product Hover Overlay  */
		$( ".woocommerce ul.products .woocommerce-LoopProduct-link > img" ).wrap( "<div class='product_hover'></div>" );
		
	});	/* - Document On Ready /- */
	
	/* -- Window On Scroll */
	$(window).on("scroll",function() {
		/* - Set Sticky Menu* */
		if( $(".header_s").length ) {
			sticky_menu();
		}
	});
	
	/* -- Window On Resize */
	$( window ).on("resize",function() {
		var width	=	$(window).width();
		var height	=	$(window).height();
		
		/* - Expand Panel Resize */
		panel_resize();
		
		/* - Dropdown Open */
		menu_dropdown_open();
		
	});
	
	/* -- Window On Load */
	$(window).on("load",function() {
		/* - Site Loader* */
		if ( !$("html").is(".ie6, .ie7, .ie8") ) {
			$("#site-loader").delay(1000).fadeOut("slow");
		}
		else {
			$("#site-loader").css("display","none");
		}		
	});
	
	if( $('.social-share ').length ) {
		$('.social-share > li > a', this).on('click', function() {

			var data_action = $(this).attr('data-action');
			var data_title = $(this).attr('data-title');
			var data_url = $(this).attr('data-url');

			if( data_action == 'facebook' ) {		
				window.open('http://www.facebook.com/share.php?u='+encodeURIComponent(data_url)+'&title='+encodeURIComponent(data_title),'sharer','toolbar=0,status=0,width=580,height=325');
			}
			else if( data_action == 'twitter' ) {
				window.open('http://twitter.com/intent/tweet?status='+encodeURIComponent(data_url)+'+'+encodeURIComponent(data_title),'sharer','toolbar=0,status=0,width=580,height=325');
			}
			else if( data_action == 'google-plus' ) {
				window.open('https://plus.google.com/share?url='+encodeURIComponent(data_url),'sharer','toolbar=0,status=0,width=580,height=325');
			}
			else if( data_action == 'linkedin' ) {
				window.open('http://www.linkedin.com/shareArticle?mini=true&url='+encodeURIComponent(data_url)+'&title='+encodeURIComponent(data_title)+'&source='+encodeURIComponent(data_url),'sharer','toolbar=0,status=0,width=580,height=325');
			}
			else if( data_action == 'instagram' ) {
				window.open('http://www.instagram.com/submit?url='+encodeURIComponent(data_url)+'&amp;title='+encodeURIComponent(data_title),'sharer','toolbar=0,status=0,width=580,height=325');
			}
		});
	}

})(jQuery);