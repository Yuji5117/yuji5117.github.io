$(function() {

    // 右下のトップページへのボタンの固定 //
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
        $(".icon").toggleClass('active');
    });

    // menuのlistをクリックするとmenu-listsが閉じる。 //
    $(".toggle-closer").on('click', function() {
        $(".menu-bar ul").removeClass('menu-lists-active');
        $(".icon").removeClass('active');
    });

    // menuのlistをクリックするとmenu-listsが閉じる。 //
    $(".nav-list").on('click', function() {
        $(".menu-bar ul").removeClass('menu-lists-active');
        $(".icon").removeClass('active');
    });

});