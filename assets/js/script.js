$(document).ready(function () {
    $('.js-scrollTo').on('click', function () { // Au clic sur un élément
        var page = $(this).attr('href'); // Page cible
        /* page = page.substring(9); */
        var speed = 750; // Durée de l'animation (en ms)
        $('html, body').animate({ scrollTop: $(page).offset().top-35 }, speed);// Go
        return false;
    });
});
$(window).scroll(function () {
    if ($(window).scrollTop() >= $('header').height()) {
        $('nav').addClass('fixed-header');
    } else {
        $('nav').removeClass('fixed-header');
    }
});
$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $('.scroll-to-top').fadeIn();
    } else {
        $('.scroll-to-top').fadeOut();
    }
});
$('.scroll-to-top').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 800);
});