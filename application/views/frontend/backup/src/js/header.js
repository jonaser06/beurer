$(document).ready(function () {

    if (window.innerWidth <= 1024) {
        $('#button-menu').click(function () {
            if ($('#button-menu').attr('class') == 'icon-hamburger') {

                $('#button-menu').removeClass('icon-hamburger').addClass('icon-close').css({
                    'color': '#6eb344'
                });
                $('.inner-header').css({
                    'right': '0%'
                });
                $('.inner-header').css({
                    'right': '0%'
                });

            } else {

                $('#button-menu').removeClass('icon-close').addClass('icon-hamburger').css({
                    'color': '#fff'
                });;

                $('.inner-header').css({
                    'right': '-100%'
                }); // Ocultamos el Menu

            }
        });
    }

    $(window).scroll(function () {
        var scrollTop = $(window).scrollTop();
            if (scrollTop > 49) {
                $('.header').addClass('header-fixed');
            } else {
                $('.header').removeClass('header-fixed');
            }
        
    });

});
$('ul.tabs li a:first').addClass('active');
$('.secciones > div').hide();
$('.secciones > div:first').show();

$('ul.tabs li a').mouseenter(function () {
    $('ul.tabs li a').removeClass('active');
    $(this).addClass('active');
    $('.secciones > div').hide();

    var activeTab = $(this).attr('data-name');
    $(activeTab).show();
    return false;
});