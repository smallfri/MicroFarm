(function($) {

	"use strict"

	$('#back-to-top').on("click", function() {
		// When arrow is clicked
		$('body,html').animate({
			scrollTop : 0 // Scroll to top of body
		},800);
		return false;
	});
	//$('.navbar-nav li a').on("click", function() {
		// When arrow is clicked
		//$('body,html').animate({
		//	scrollTop : 0 // Scroll to top of body
		//},800);
		//return false;
	//});
	
	//$('.down-arrow').on("click", function() {
//		// When arrow is clicked
//		$('body,html').animate({
//			offset:-62 // Scroll to top of body
//		},800);
//		return false;
//	});
	
	//$(".down-arrow").localScroll({
//		target:"body",duration:1500,offset:-62,easing:"easeInOutExpo";
//	});

	
	
})(jQuery);


 