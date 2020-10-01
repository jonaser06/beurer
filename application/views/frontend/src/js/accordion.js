(function ($) {
    $(".accordion > li:eq(0) a")
        .addClass("active")
        .next()
        .slideDown();

    $(".accordion a").click(function (j) {
        var dropDown = $(this)
            .closest("li")
            .find(".accordion-content");

        $(this)
            .closest(".accordion")
            .find(".accordion-content")
            .not(dropDown)
            .slideUp();

        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
        } else {
            $(this)
                .closest(".accordion")
                .find("a.active")
                .removeClass("active");
            $(this).addClass("active");
        }

        dropDown.stop(false, true).slideToggle();

        j.preventDefault();
    });
})(jQuery);