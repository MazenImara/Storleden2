jQuery(document).ready(function($) {

	
    $('#storNav').addClass('collapse');
    $('header').mouseleave(function(){
    	$('#storNav').removeClass('collapse in');
    	$('#storNav').addClass('collapse');
    	
	});


$(window).on("scroll", function() {
    if($(window).scrollTop() > 600) {
        $("header").addClass("headerColor");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
       $("header").removeClass("headerColor");
    }
});
    
});