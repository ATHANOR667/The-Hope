
  (function ($) {

  "use strict";

    // NAVBAR
    $('.navbar-nav .nav-link').click(function(){
        $(".navbar-collapse").collapse('hide');
    });

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 50) {
            $(".navbar").addClass("sticky-nav");
        } else {
            $(".navbar").removeClass("sticky-nav");
        }
    });

    // BACKSTRETCH SLIDESHOW
    $('#section_1').backstretch([
        "images/slide/img2.jpg",
        "images/slide/16.01_0c5d3473.jpg",
        "images/slide/16.01_477585a3.jpg",

    ],  {duration: 2000, fade: 750});

  })(window.jQuery);


