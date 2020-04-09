$(function() {
    var topIcon = $('.fix-icon');
    topIcon.hide();
    $(this).scroll(function() {
        if ($(this).scrollTop() > 0) {
            topIcon.fadeIn();
        } else {
            topIcon.fadeOut();
        }
    });

    $('.icon').on('click', function() {
        $('.nav-bar ul').toggleClass('menu-lists-active');
    });

});