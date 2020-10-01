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
            "lastname": "required",
            "email": {
                required: true,
                email: true
            },
            /*"direction": {
                required: true,
                //email: true
            },*/
            "phone": {
                required: true,
                number: true
            },
            "textarea": {
                required: true
            },
            "agree": {
                required: true
            }
        },
    });
})


$.extend( $.validator.messages, {
    required: "Este campo es obligatorio.",
    remote: "Por favor, rellena este campo.",
    email: "Por favor, escribe una dirección de correo válida.",
    url: "Por favor, escribe una URL válida.",
    date: "Por favor, escribe una fecha válida.",
    dateISO: "Por favor, escribe una fecha (ISO) válida.",
    number: "Por favor, escribe un número válido.",
    digits: "Por favor, escribe sólo dígitos.",
    creditcard: "Por favor, escribe un número de tarjeta válido.",
    equalTo: "Por favor, escribe el mismo valor de nuevo.",
    extension: "Por favor, escribe un valor con una extensión aceptada.",
    maxlength: $.validator.format( "Por favor, no escribas más de {0} caracteres." ),
    minlength: $.validator.format( "Por favor, no escribas menos de {0} caracteres." ),
    rangelength: $.validator.format( "Por favor, escribe un valor entre {0} y {1} caracteres." ),
    range: $.validator.format( "Por favor, escribe un valor entre {0} y {1}." ),
    max: $.validator.format( "Por favor, escribe un valor menor o igual a {0}." ),
    min: $.validator.format( "Por favor, escribe un valor mayor o igual a {0}." ),
    nifES: "Por favor, escribe un NIF válido.",
    nieES: "Por favor, escribe un NIE válido.",
    cifES: "Por favor, escribe un CIF válido."
} );