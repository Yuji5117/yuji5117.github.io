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

    // menu listsの開閉。 //
    $('#menu-toggle').on('click', function() {
        $('.menu-bar ul').toggleClass('menu-lists-active');
        $('body').toggleClass('fixed');
    });

});