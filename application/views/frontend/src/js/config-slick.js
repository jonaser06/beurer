$('.slider-home').slick({
    //dots: true,
    //infinite: true,
    autoplay: true,
    speed: 200,
    fade: true,
    cssEase: 'linear',
    slidesToShow: 1,
    slidesToScroll: 1,
});
$('.carrosuel-two-home').slick({
    infinite: true,
    autoplay: true,
    dots: true,
    arrows: false,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                
                rows: 2,
            }
        }
    ]
});
$('.carousel-home-general').slick({
    autoplay: true,
    infinite: true,
    dots: false,
    fade: true,
    cssEase: 'linear',
    arrows: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 575,
            settings: {
                //arrows: false,
            }
        }
    ]

});

$('.nav-tabs-int').slick({
    infinite: false,
    dots: false,
    arrows: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                //infinite: true,
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }
    ]
});

$('.slider-instr-use').slick({
    //dots: true,
    infinite: false,
    autoplay: true,
    // speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
        {
            breakpoint: 1700,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                //infinite: true,
            }
        },
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 960,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }
    ]
});
$('.downdload-center').slick({
    //dots: true,
    infinite: false,
    autoplay: true,
    // speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
        {
            breakpoint: 1700,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                //infinite: true,
            }
        },
        {
            breakpoint: 1000,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 800,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }
    ]
});
$('.carrousel-header').slick({
    //dots: true,
    arrows: false,
    //infinite: true,
    autoplay: true,
    speed: 200,
    slidesToShow: 1,
    //slidesToScroll: 3,
    variableWidth: true,
});