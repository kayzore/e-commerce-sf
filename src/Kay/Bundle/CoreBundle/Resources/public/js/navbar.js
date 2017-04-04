$(window).scroll(function() {
    if ($(document).scrollTop() > 70) {
        $('nav').addClass('shrink');
    } else {
        $('nav').removeClass('shrink');
    }
});