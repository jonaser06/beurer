$(document).ready(function () {
    // MOSTRANDO Y OCULTANDO MENU
    $('#button-menu').click(function () {
        if ($('#button-menu').attr('class') == 'icon-hamb-open') {

            $('#button-menu').removeClass('icon-hamb-open').addClass('icon-hamb-close');
            $('.menu-one .menu-hamb').css({
                'height': '100vh',
            });
            $('.menu-one .menu-hamb').addClass('vh');

        } else {

            $('#button-menu').removeClass('icon-hamb-close').addClass('icon-hamb-open');

            $('.menu-one .menu-hamb').css({
                'height': '0 ',
            });// Ocultamos el Menu
            $('.menu-one .menu-hamb').removeClass('vh');

        }
    });
    // MOSTRANDO SUBMENU
    // $('.navbar-principal >.item-navbar.sub .icon-sub').click(function () {
    //     $('.navbar-principal >.item-navbar.sub > .submenu').css({
    //         'right': '0'
    //     });
    //     $('#button-menu').removeClass('icon-back')
    // });

    // // OCULTANDO SUBMENU
    // $('.navbar-principal .submenu .icon-arrow-link').click(function () {

    //     $('.navbar-principal .item-navbar > .submenu').css({
    //         'right': '-100%'
    //     });
    //     $('#button-menu').addClass('icon-back')
    // });
    $('.ttl-enl').click(function(){
        $('.menu-enl').css({
            'right': '0'
        })
    })
    $('.icon-arrow-regresar').click(function(){
        $('.menu-enl').css({
            'right': '-100%'
        })
    })

});
$(document).ready(function () {
    
    $(window).scroll(function () {
        if (screen && screen.width > 1150){
            var scrollTop = $(window).scrollTop();
            console.log(scrollTop)
            if (scrollTop > 319) {
                $('.info-subproduct').addClass('scroll');
            } else {
                $('.info-subproduct').removeClass('scroll');
            }
        }
        
    });
});

