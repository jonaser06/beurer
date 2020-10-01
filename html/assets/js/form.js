$('.form__input').blur(function () {
    if ($(this).val()) {
        $(this).closest('.form__wrapper').addClass('form--filled');
    } else {
        $(this).closest('.form__wrapper').removeClass('form--filled');
    }
});
$('#btn-send-form').on('click', function(){
    $("#form-contact-us").validate({
        rules: {
            "name": "required",
            "last-name": "required",
            "email": {
                required: true,
                email: true
            },
            "phone": {
                required: true,
                minlength: 9
            },
            "textarea": {
                required: true
            }
        },
    });
})
