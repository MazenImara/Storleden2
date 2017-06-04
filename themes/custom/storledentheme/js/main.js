jQuery(document).ready(function($) {

	
    //$('#storNav').addClass('collapse');
    
    $(".meny").click(function () {
        $(".stang").removeClass("hidden");
        $(".meny").addClass("hidden");
        $("header").addClass("headerColor");
        $(".hr").removeClass("hidden");
        $('#storNav').attr( "style", "display:flex;" );
    });

    $(".stang").click(function () {
        $(".meny").removeClass("hidden");
        $(".stang").addClass("hidden");
        $("header").removeClass("headerColor");
        $(".hr").addClass("hidden");
    });






$(window).on("scroll", function() {
    if($(window).scrollTop() > 600) {
        $("header").addClass("headerColorScroll");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
       $("header").removeClass("headerColorScroll");
    }
});
    
});

// test