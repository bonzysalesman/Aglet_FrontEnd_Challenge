(function($) {
    'use strict';
/* back to top button */
$(window).on('scroll', function(e) {  
    if ($(this).scrollTop() >= 700) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(400);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
  $("#return-to-top").on('click', function(e) {  
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 700);
});
/*end to top*/

})(jQuery);
