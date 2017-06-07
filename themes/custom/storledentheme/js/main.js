jQuery(document).ready(function($) {

	
    //$('#storNav').addClass('collapse');
    
    $(".meny").click(function () {
        $(".stang").removeClass("hidden");
        $(".meny").addClass("hidden");
        $("header").addClass("headerColor");
        $(".hr").removeClass("hidden");
        $('#storNav').attr( "style", "display:flex;" );
        $(".storledenAB").show();
        $(".nav-ul").show();
    });

    $(".stang").click(function () {
        $(".meny").removeClass("hidden");
        $(".stang").addClass("hidden");
        setTimeout(function() {
            $("header").removeClass("headerColor");
        }, 250 );
        
        $(".hr").addClass("hidden");
        $(".storledenAB").hide('3000');
        $(".nav-ul").hide('3000');
         
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