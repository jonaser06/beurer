// rastrea pedido campo

$(document).ready(function () {
    class CampoNumerico2 {

        constructor(selector) {
            this.nodo = document.querySelector(selector);
            this.valor = '';

            this.empezarAEscucharEventos();
        }

        empezarAEscucharEventos() {
            this.nodo.addEventListener('keydown', function (evento) {
                const teclaPresionada = evento.key;
                const teclaPresionadaEsUnNumero =
                    Number.isInteger(parseInt(teclaPresionada));

                const sePresionoUnaTeclaNoAdmitida =
                    teclaPresionada != 'ArrowDown' &&
                    teclaPresionada != 'ArrowUp' &&
                    teclaPresionada != 'ArrowLeft' &&
                    teclaPresionada != 'ArrowRight' &&
                    teclaPresionada != 'Backspace' &&
                    teclaPresionada != 'Delete' &&
                    teclaPresionada != 'Enter' &&
                    !teclaPresionadaEsUnNumero;
                const comienzaPorCero =
                    this.nodo.value.length === 0 &&
                    teclaPresionada == 0;

                if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
                    evento.preventDefault();
                } else if (teclaPresionadaEsUnNumero) {
                    this.valor += String(teclaPresionada);
                }

            }.bind(this));

            this.nodo.addEventListener('input', function (evento) {
                const cumpleFormatoEsperado = new RegExp(/+^[0-9]+/).test(this.nodo.value);

                if (!cumpleFormatoEsperado) {
                    this.nodo.value = this.valor;
                } else {
                    this.valor = this.nodo.value;
                }
            }.bind(this));
        }

    }

    new CampoNumerico2('#cod_seg');


});
$(document).ready(function () {

    class CampoTexto {

        constructor(selector) {
            this.nodo = document.querySelector(selector);
            this.valor = '';

            this.empezarAEscucharEventos();
        }
        empezarAEscucharEventos() {
            this.nodo.addEventListener('keydown', function (evento) {
                const teclaPresionada = evento.key;
                const teclaPresionadaEsUnNumero =
                    Number.isInteger(parseInt(teclaPresionada));

                const sePresionoUnaTeclaNoAdmitida =
                    teclaPresionada != 'ArrowDown' &&
                    teclaPresionada != 'ArrowUp' &&
                    teclaPresionada != 'ArrowLeft' &&
                    teclaPresionada != 'ArrowRight' &&
                    teclaPresionada != 'Backspace' &&
                    teclaPresionada != 'Delete' &&
                    teclaPresionada != 'Enter' &&
                    teclaPresionadaEsUnNumero;


                if (sePresionoUnaTeclaNoAdmitida) {
                    evento.preventDefault();
                } else if (!teclaPresionadaEsUnNumero) {
                    this.valor += String(teclaPresionada);
                }

            }.bind(this));

            this.nodo.addEventListener('input', function (evento) {
                const cumpleFormatoEsperado = new RegExp(/[a-zA-Z\s]+{2,254}/).test(this.nodo.value);

                if (cumpleFormatoEsperado) {
                    this.nodo.value = this.valor;
                } else {
                    this.valor = this.nodo.value;
                }
            }.bind(this));
        }
    }
    // new CampoTexto('#c_nombres');
});



//codigo js de envio-pago


$(document).ready(function () {
    var btnContainer = document.getElementById("div-fechas");


    // Get all buttons with class="btn" inside the container
    var btns = btnContainer.getElementsByClassName("fecha");


    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < btns.length; i++) {

        btns[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }


});

//adaptando para el active de los botones del panel de usuario.
$(document).ready(function () {

    let btnContainer3 = document.getElementById("p_users");
    let secciones = document.getElementById("panel-user1");
    let infouser = document.getElementById("info_puser");
    let titulouser = document.getElementById("title-info-user");
    let contenidouser = document.getElementById("cont-info-user");
    let back = document.getElementById("back-section-user");
    let inicio = document.getElementById("p_inicio");
    let datos = document.getElementById("p_datosp");
    let orden = document.getElementById("p_misord");
    let direccion = document.getElementById("p_misdir");
    let info = document.getElementById("info_puser");
    let comprobante = document.getElementById("p_miscomp");
    let seccionPass = document.getElementById("panel_pass");

    // Get all buttons with class="btn" inside the container

    let btns3 = btnContainer3.getElementsByClassName("p_user");


    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < btns3.length; i++) {
        btns3[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("p_user active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
    document.getElementById("back-section-user").addEventListener("click", function () {
        console.log("Hola");
        info.style.display = 'none';
        secciones.style.display = 'block';
    });

    inicio.addEventListener("click", function (e) {
        console.log(e.target)
        titulouser.innerHTML = '<p style="margin: auto;">Bienvenido al Panel de Administración del Cliente BEURER</p>';

        contenidouser.innerHTML = '<h4>En este Panel te ofrecemos la comodidad que mereces, para que puedas administrar todas tus gestiones con nosotros.</h4> <h4>Contamos con 3 secciones a tu disposición:</h4> <p> <ul style="font-size:1.2em;line-height:50px;"> <li>1. Datos Personales</li> <li>2. Mis órdenes</li> <li>3. Mis Direcciones</li> </ul> </p>';
        if (screen && screen.width < 700) {
            secciones.style.display = 'none';
            infouser.style.display = 'block';
        }
    });

    datos.addEventListener("click", function () { 
        titulouser.innerHTML = '<p>Datos Personales</p>';
        contenidouser.innerHTML = `<div class="divTable" style=" width:100%;display:inline-block;">
        <div class="divTableBody" style="display:block;">
            <div class="divTableRow" id="pn_datos1">
                <div class="divTableCell">
                    <div class="etiquetaFormulario">Nombres </div>
                    <input type="text" size="20" maxlength="30" name="campo1"id="c_nombres1" onkeypress="return soloLetras(event)" value="${userData.nombre}">
                </div>
                <div class="divTableCell">
                    <div class="etiquetaFormulario">Apellidos</div> <input type="text" size="20" maxlength="20"
                        name="campo1" id="c_apep1" onkeypress="return soloLetras(event)" value="${userData.apellido_paterno} ${userData.apellido_materno}">
                </div>
                <div class="divTableCell">
                    <div class="etiquetaFormulario">Correo electrónico</div> <input type="email" id="c_correo1" size="20"
                        maxlength="30" name="campo1" id="correo" value="${userData.correo}"
                        style="border:0 none;">
                </div>
            </div>
            <div class="divTableRow">
                <div class="divTableCell">
                    <div class="etiquetaFormulario">Tipo Documento Identidad</div>
                    <select id="s_tipodoc" value="${userData.tipo_documento}"
                        >
                        <option id="di_pn1" value="DNI">DNI</option>
                        <option id="di_pn2" value="PASAPORTE">PASAPORTE</option>
                        <option id="di_pn3" value="CE">CE</option>
                    </select>
                </div>
                <div class="divTableCell">
                    <div class="etiquetaFormulario">Número Documento Identidad</div> <input type="text" size="20"
                        maxlength="20" name="campo1" id="campo1" value="${userData.documento}" required>
                </div>
                <div class="divTableCell">
                    <div class="etiquetaFormulario">Teléfono celular</div> <input type="text" size="9" maxlength="9"
                        name="campo1" id="c_telcel" onkeypress="return soloNumeros(event)" value="${userData.telefono}">
                </div>
            </div>
        </div>
    </div> <br> <br>
    <div style="width:90%;float:left;margin:auto 0px;font-weight:bold;font-size:1.3em">
        <p>Conoce lo último de Beurer.pe</p>
    </div> <br> <br>
    <div style="text-align:left !important;">
        <div class="checkbox" style="display:inline-block;" id="d_politicas"> 
        <label class="font-light label-pol"style="display:inline;"> 
        <input type="checkbox" id="politicas" ${userData.politicas == 1 ? 'checked':''} /><i class="helper"></i> 
        </label>
        <div style="display:inline-block; font-size:1.18em; color:black;"><span>He leído y acepto las <a
                        href="politicas-de-privacidad" class="span-pol color-primary btn-modals">
                        Políticas de Privacidad</a>.</span></div>
        </div>
    </div>
    <div style="text-align:left !important;">
        <div class="checkbox" style="display:inline-block; " id="d_publicidad"> <label class="font-light label-pol"
                style="display:inline;"> 
                <input type="checkbox" id="publicidad" ${userData.ofertas == 1 ? 'checked':''} /><i class="helper"></i> </label>
            <div style="display:inline-block; font-size:1.18em; color:black;"> <span>Deseo recibir ofertas y novedades de
                    Beurer en mi e-mail.</span></div>
        </div>
    </div>
    <button onclick ="ObjMain.updateAccount(${userData.id_cliente})" class="btn saveUser" style="background-color:#C51152;color:#fff;margin-top:10px;float:left"> guardar datos</button>
    `;
      let index   = userData.tipo_documento == 'DNI' ? '1' 
                                :userData.tipo_documento == 'PASAPORTE' ? '2'
                                : userData.tipo_documento == 'CE' ? '3'
                                :''
      const nodeSelect = document.querySelectorAll('#s_tipodoc > option')[parseInt(index)-1];
      nodeSelect.setAttribute('selected','selected')
    //   update obj UserData
      const tipoDoc = document.querySelector('#s_tipodoc');
      tipoDoc.addEventListener('change' , event => {
         userData.tipo_documento = event.target.value
      })
    


    if (screen && screen.width < 700) {
            secciones.style.display = 'none';
            infouser.style.display = 'block';
        }
    });

    orden.addEventListener("click", function () {
        titulouser.innerHTML = '<p style="margin: auto;">Mis órdenes</p>';
        contenidouser.innerHTML = '<h4>En este Panel2 te ofrecemos la comodidad que mereces, para que puedas administrar todas tus gestiones con nosotros.</h4> <h4>Contamos con 3 secciones a tu disposición:</h4> <p> <ul style="font-size:1.2em;line-height:50px;"> <li>1. Datos Personales</li> <li>2. Mis órdenes</li> <li>3. Mis Direcciones</li> </ul> </p>';
        if (screen && screen.width < 700) {
            secciones.style.display = 'none';
            infouser.style.display = 'block';
        }
    });

    direccion.addEventListener("click", function () {
        titulouser.innerHTML = '<p style="margin: auto;">Mis direcciones</p>';
        contenidouser.innerHTML = ``;
        if (screen && screen.width < 700) {
            secciones.style.display = 'none';
            infouser.style.display = 'block';
        }
    });

    comprobante.addEventListener("click", function () {
        titulouser.innerHTML = '<p style="margin: auto;">Mis comprobantes</p>';
        contenidouser.innerHTML = '<h4>En este Panel2 te ofrecemos la comodidad que mereces, para que puedas administrar todas tus gestiones con nosotros.</h4> <h4>Contamos con 3 secciones a tu disposición:</h4> <p> <ul style="font-size:1.2em;line-height:50px;"> <li>1. Datos Personales</li> <li>2. Mis órdenes</li> <li>3. Mis Direcciones</li> </ul> </p>';
        console.log(document.getElementById("back-section-user"));
        if (screen && screen.width < 700) {
            secciones.style.display = 'none';
            infouser.style.display = 'block';
        }
    });
    seccionPass.addEventListener("click", function () {
        titulouser.innerHTML = '<p style="margin: auto;">Cambio de Contraseña</p><h4>Se recomientda usar una contraseña que no uses en otro sitio</h4>';
        contenidouser.innerHTML = `<form id ="formPass" method="POST">
                <div class="input-group passContainer">
                    <label for="currentPass">Actual</label>
                    <input
                    type="password" name="currentPass" id="currentPass" placeholder="Contraseña actual"required>
                    <img class="eyes"
                    src="https://img2.freepng.es/20180501/bee/kisspng-computer-icons-password-blind-vector-5ae856af60c0e4.3327567715251759833963.jpg">
                </div>
                <div class="input-group">
                    <label for="newPass">Nueva</label>
                    <input type="password" name="newPass" id="newPass">
                    <img class="eyes"
                    src="https://img2.freepng.es/20180501/bee/kisspng-computer-icons-password-blind-vector-5ae856af60c0e4.3327567715251759833963.jpg">
                </div>
                <div class="input-group repeat"
                >
                    <label for="repeatNewPass">Repetir contraseña nueva</label>
                    <input type="password" name="repeatNewPass" id="repeatNewPass">
                    <img class="eyes"
                    src="https://img2.freepng.es/20180501/bee/kisspng-computer-icons-password-blind-vector-5ae856af60c0e4.3327567715251759833963.jpg">
                </div>
                <hr>
                <button 
                data-id = '${userData.id_cliente}'
                type="submit" class="btn btn-small updatePass" >Guardar cambios</button>
        </form> `;
        if (screen && screen.width < 700) {
            secciones.style.display = 'none';
            infouser.style.display = 'block';
        }

        ObjMain.comparePass()
        ObjMain.updatePass()
        ObjMain.limitPass('#currentPass',5)
        
			document.addEventListener("click", (e) => {
				if (e.target.matches(".eyes")) {
					let $pass = e.target.parentElement.children[1]
					$pass.type = $pass.type == "password" ? "text" : "password";
				}
			});
    });
    
});

// adaptando codigo de envio-pago para botones de colores
$(document).ready(function () {

    var btnContainer2 = document.getElementById("div-colors");
    var principali = document.getElementById("principal-img");
    var secondaryi = document.getElementById("secondary-img");
    var imgs = ['<img src="assets/sources/61sJPfVV7BL._AC_SL1500__1.jpg" alt="">', '<img  src="assets/sources/61sJPfVV7BL._AC_SL1500__11.jpg" alt="">', '<img  src="assets/sources/61sJPfVV7BL._AC_SL1500__12.jpg" alt="">']
    var imgs = ['<img class="img-cover" src="assets/sources/61sJPfVV7BL._AC_SL1500__1.jpg" alt="">', '<img class="img-cover" src="assets/sources/61sJPfVV7BL._AC_SL1500__11.jpg" alt="">', '<img class="img-cover" src="assets/sources/61sJPfVV7BL._AC_SL1500__12.jpg" alt="">']
    // Get all buttons with class="btn" inside the container

    var btns2 = btnContainer2.getElementsByClassName("color");
    var imgsmall = document.getElementsByClassName("animated fadeInLeftShort tabs_goto go");
    var imglarge = document.getElementsByClassName("tabs_section animated growIn go");

    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < btns2.length; i++) {

        btns2[i].addEventListener("click", function () {

            var current = document.getElementsByClassName("color active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
            var c = 0;
            for (var valor of btns2) {
                if (valor.classList.value == "btn btnprimary1 color active") {
                    principali.innerHTML = imgs[c];
                    secondaryi.innerHTML = imgs[c];
                    for (var valor1 of imgsmall) {
                        if (valor1.classList.value == "animated fadeInLeftShort tabs_goto go -active") {
                            valor1.classList.remove("-active");
                            for (var valor2 of imglarge) {
                                if (valor2.classList.value == "tabs_section animated growIn go -open") {
                                    valor2.classList.remove("-open");
                                }
                            }
                            imglarge[0].classList.add("-open");
                        }
                    }
                    imgsmall[0].classList.add("-active");

                }
                c++;
            }
        });


    }


});


// codigo js que estaba en carrito.html

if (screen && screen.width > 1300) {
    let fullpageDiv = $('#fullpage');
    if (fullpageDiv.length) {
        fullpageDiv.fullpage({
            scrollBar: true,
            scrollOverflow: true,
            verticalCentered: true,
            afterRender: function () {}
        });
    }
}

$('#login').fadeOut();



$(".popup-btn").click(function () {
    var target = $(this).attr("href");
    $(target).fadeIn();
});

$(".popup-ini .close").click(function () {
    $(".popup-ini").fadeOut();
});





$('.search_get').keyup(function (event) {
    $('show_result').html('<img src="https://media2.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" width="30">')
    $.ajax({
            url: 'productos/search/' + $(this).val(),
        })
        .done(function (data) {
            $('#show_result').html(data)
        })
        .always(function () {
            console.log("complete");
        });


});


$('.box-search').hover(function (event) {
    $('#show_result').html('')
});


if (screen && screen.width > 992) {
    $(".div-search").mouseover(function (event) {
        $(".input-search").css({
            'width': '18.5vw',
            'border-color': '#c51152',
            'border-radius': '15px',
            'box-shadow': '4px 4px #ccc',

        })
        $(".input-search::placeholder").css({
            'opacity': '1',
            'color': '#fff',

        })
    });
    $(".div-search").mouseout(function (event) {
        $(".input-search").css({
            'width': '0',
            'border-color': 'transparent',
            'border-radius': '0',
            'box-shadow': '0px 0px #ccc',
            //'padding': '0'
        })
    });
} else {
    $(".div-search").mouseover(function (event) {
        $(".input-search").css({
            'width': '18.5vw',
            'border-color': '#c51152',
            'border-radius': '15px',
            'box-shadow': '4px 4px #ccc',
        })

        $(".input-search::placeholder").css({
            'opacity': '1',
            'color': '#fff',
        })
    });

    $(".div-search").click(function () {
        $(".input-search").css({
            "top": "0", //modificamos el bottom a 0
            "box-shadow": '0px 0px #ccc',
        });
        $(".bsc-btn").css({
            // "opacity": "1",
            // "z-index": "10000"
        })
    });
    $(".div-search").mouseout(function () {
        $(".input-search").css({
            // "top" : "-100%" //modificamos el bottom a 0
            'width': '0',
            'border-color': 'transparent',
            'border-radius': '0',
            'box-shadow': '0px 0px #ccc',
        });

    });
}
// if (screen && screen.width < 767) {
//     $(".div-search").mouseover(function(event){
//         $(".input-search").css({
//             'width':'34vw',
//             'border-color': '#c51152',
//             'border-radius': '15px',
//             'display':'inline-block',

//         })
//     });
//     $(".div-search").mouseout(function(event){
//         $(".input-search").css({
//             'width':'0',
//             'border-color': 'transparent',
//             'border-radius': '0',
//             //'display':'none',
//             //'padding': '0'
//         })
//     });
// }

// if (screen && screen.width < 1150 && screen.width > 991) {
//     $(".div-search").mouseover(function(event){
//         $(".input-search").css({
//             'width':'18vw',
//             'border-color': '#c51152',
//             'border-radius': '15px',
//             'display':'inline-block',

//         })
//     });
//     $(".div-search").mouseout(function(event){
//         $(".input-search").css({
//             'width':'0',
//             'border-color': 'transparent',
//             'border-radius': '0',
//             //'display':'none',
//             //'padding': '0'
//         })
//     });
// }


//rastrea pedido
$("#btn_seg").click(function () {
    seguimiento = document.getElementById("div_seg");
    buscarpedido = document.getElementById("div_buscarp");
    buscarpedido2 = document.getElementById("div_buscarp1");
    seguimiento.style.display = "block";
    buscarpedido.style.display = "none";
    buscarpedido2.style.display = "none";
});

$("#btn_nb").click(function () {
    seguimiento = document.getElementById("div_seg");
    buscarpedido = document.getElementById("div_buscarp");
    codseg = document.getElementById("cod_seg");
    seguimiento.style.display = "none";
    buscarpedido.style.display = "block";
    buscarpedido2.style.display = "block";
    codseg.value = "";
    codseg.focus();
});
$('#subscribe').submit(function (event) {
    event.preventDefault();

    $.ajax({
            url: '' + $(this).attr('action') + '',
            type: 'POST',
            data: $(this).serialize(),
        })
        .done(function (data) {
            if (data.resp == true) {
                $('#subscribe').attr('title', '' + data.msj + '');
                $('#subscribe').attr('data-original-title', '' + data.msj + '');

                $('#subscribe').tooltip('show');
                $('#subscribe')[0].reset();
            } else {
                $('#subscribe').attr('title', '' + data.msj + '');
                $('#subscribe').attr('data-original-title', '' + data.msj + '');
                $('#subscribe').tooltip('show');
            }
        });

});

// registrarse , tabs
$('#otra-persona').click(function () {
    var chequeo1 = document.getElementById("otra-persona");
    var emi = document.getElementById("emisor");
    var receptor = document.getElementById("d_formularios2");
    var tab_rec = document.getElementById("icon-ficha");

    if (chequeo1.checked == true) {

        // tab_rec.style.display="table-cell";
        receptor.style.display = "inline-block";


    } else {

        // tab_rec.style.display="none";
        receptor.style.display = "none";
    }
});


// $('#politicas').click(function () {
//     var siguiente = document.getElementById("btn_sgt");
//     siguiente.classList.toggle("disabled");
// });

$('#dfactura').click(function () {
    var chequeo2 = document.getElementById("dfactura");
    var fac = document.getElementById("factura");

    if (chequeo2.checked == true) {
        fac.style.display = "inline-block";
    } else {
        fac.style.display = "none";
    }
});

$('#politicas2').click(function () {
    var terminos = document.getElementById("terycon");
    var enviarreclamo = document.getElementById("env_reclamo");
    if (this.checked == true) {
        if (terminos.checked == true) {
            enviarreclamo.classList.remove("disabled");
        } else {
            enviarreclamo.classList.add("disabled");
        }
    } else {
        enviarreclamo.classList.add("disabled");
    }
});

$('#terycon').click(function () {
    var politicas = document.getElementById("politicas2");
    var enviarreclamo = document.getElementById("env_reclamo");
    if (this.checked == true) {
        if (politicas.checked == true) {
            enviarreclamo.classList.remove("disabled");
        } else {
            enviarreclamo.classList.add("disabled");
        }
    } else {
        enviarreclamo.classList.add("disabled");
    }
});



$(document).ready(function () {
    $('.tabs span').click(function () {
        var tab_id = $(this).attr('data-tab');

        $('.tabs span').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
    })
})


$(".tabs_goto").click(function () {
    $(this)
        .addClass("-active")
        .siblings()
        .removeClass("-active")
        .closest(".tabss")
        .find(".tabs_section")
        .eq($(this).index())
        .addClass("-open")
        .siblings()
        .removeClass("-open")
})

$(function () {
    var $tabButtonItem = $('#tab-button li'),
        $tabSelect = $('#tab-select'),
        $tabContents = $('.tab-contents'),
        activeClass = 'is-active';

    $tabButtonItem.first().addClass(activeClass);
    $tabContents.not(':first').hide();

    $tabButtonItem.find('a').on('click', function (e) {
        var target = $(this).attr('href');

        $tabButtonItem.removeClass(activeClass);
        $(this).parent().addClass(activeClass);
        $tabSelect.val(target);
        $tabContents.hide();
        $(target).show();
        e.preventDefault();
    });

    $tabSelect.on('change', function () {
        var target = $(this).val(),
            targetSelectNum = $(this).prop('selectedIndex');

        $tabButtonItem.removeClass(activeClass);
        $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
        $tabContents.hide();
        $(target).show();
    });
});


function loginn() {
    var ventanalogin = document.getElementsByClassName("login")[0];
    if (ventanalogin.style.display == "none" && screen.width > 767) {
        ventanalogin.style.display = "block";
    } else {
        ventanalogin.style.display = "none";
    }

}

// Sumar el costo de los productos del carrito (temporal)

// Eliminar elemento , efecto.

$('#trash').click(function () {
    Swal.fire({
        title: 'Está seguro de eliminar el producto?',

        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: 'gray',
        confirmButtonText: 'Sí, deseo borrarlo!',
        confirmButtonColor: "#C51152",
        onOpen: () => Swal.getCancelButton().focus()
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Producto eliminado!',
                'El producto ha sido eliminado del carrito.',
                'success'
            )
        }
    })
});


// PARA AUMENTAR Y DISMINUIR CON LOS BOTONES y aumente el costo

var inicio = 1; //se inicializa una variable en 0
var text = document.getElementById("costo-envio");
var checkBox = document.getElementById("check_envio");
var subtotal = document.getElementById("subtotal");
var total = document.getElementById("total");

function aumentar() { // se crean la funcion y se agrega al evento onclick en en la etiqueta button con id aumentar

    if (document.getElementById('cantidad_prod').value != 10) {
        var cantidad = document.getElementById('cantidad_prod').value = ++inicio; //se obtiene el valor del input, y se incrementa en 1 el valor que tenga.
        subtotal.innerHTML = (parseFloat($('#preuni').text()) * document.getElementById('cantidad_prod').value).toFixed(2);
        total.innerHTML = (parseFloat($('#preuni').text()) * document.getElementById('cantidad_prod').value).toFixed(2);


        if (checkBox.checked == true) {


            text.innerHTML = "+" + parseFloat(document.getElementById('cantidad_prod').value * 12.5);
            total.innerHTML = parseFloat((parseFloat($('#preuni').text()) * document.getElementById('cantidad_prod').value).toFixed(2)) + parseFloat(document.getElementById('cantidad_prod').value * 12.5);

        }
    }
}

function disminuir() { // se crean la funcion y se agrega al evento onclick en en la etiqueta button con id disminuir
    if (document.getElementById('cantidad_prod').value > 1) {
        var cantidad = document.getElementById('cantidad_prod').value = --inicio; //se obtiene el valor del input, y se decrementa en 1 el valor que tenga.
        subtotal.innerHTML = (parseFloat($('#preuni').text()) * document.getElementById('cantidad_prod').value).toFixed(2);
        total.innerHTML = (parseFloat($('#preuni').text()) * document.getElementById('cantidad_prod').value).toFixed(2);
        if (checkBox.checked == true) {
            text.innerHTML = "+" + parseFloat(document.getElementById('cantidad_prod').value * 12.5);
            total.innerHTML = parseFloat((parseFloat($('#preuni').text()) * document.getElementById('cantidad_prod').value).toFixed(2)) + parseFloat((parseFloat(document.getElementById('cantidad_prod').value * 12.5)).toFixed(2));
        }
    }
}

// CODIGO DEEL CARRITO DE LOS CHECKS

// var text=document.getElementById("costo-envio");
// var total=document.getElementById("total");
// var cant=document.getElementById("cantidad_prod").value;
// var cce=document.getElementById("f-costoenvio");

// function funcionEnvio(){
// 	var checkBo = document.getElementById("check_envio");
// 	if (checkBo.checked == true){
// 	cce.style.display="table-row";
//     text.innerHTML = " + "+parseFloat(document.getElementById('cantidad_prod').value*12.5);
//     total.innerHTML=parseFloat((parseFloat($('#preuni').text())*document.getElementById('cantidad_prod').value).toFixed(2)) + parseFloat(document.getElementById('cantidad_prod').value*12.5);
// 	}
// 	else{
// 		cce.style.display="table-row";
//     text.innerHTML = "NO";
//     total.innerHTML=parseFloat((parseFloat($('#preuni').text())*document.getElementById('cantidad_prod').value).toFixed(2)) ;
// 	}

// }



// PARA EL CAMPO DE CANTIDAD NO SEA NEGATIVO, NI LETRAS, NI SIGNOS, SOLO NUMEROS NO NEGATIVOS Y MAYOR O IGUAL A 1 , Q NO EMPIEZE EN CERO


$(document).ready(function () {
    class CampoNumerico {

        constructor(selector) {
            this.nodo = document.querySelector(selector);
            this.valor = '';

            this.empezarAEscucharEventos();
        }

        empezarAEscucharEventos() {
            this.nodo.addEventListener('keydown', function (evento) {
                const teclaPresionada = evento.key;
                const teclaPresionadaEsUnNumero =
                    Number.isInteger(parseInt(teclaPresionada));

                const sePresionoUnaTeclaNoAdmitida =
                    teclaPresionada != 'ArrowDown' &&
                    teclaPresionada != 'ArrowUp' &&
                    teclaPresionada != 'ArrowLeft' &&
                    teclaPresionada != 'ArrowRight' &&
                    teclaPresionada != 'Backspace' &&
                    teclaPresionada != 'Delete' &&
                    teclaPresionada != 'Enter' &&
                    !teclaPresionadaEsUnNumero;
                const comienzaPorCero =
                    this.nodo.value.length === 0 &&
                    teclaPresionada == 0;

                if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
                    evento.preventDefault();
                } else if (teclaPresionadaEsUnNumero) {
                    this.valor += String(teclaPresionada);
                }

            }.bind(this));

            this.nodo.addEventListener('input', function (evento) {
                const cumpleFormatoEsperado = new RegExp(/^[0-9]+/).test(this.nodo.value);

                if (!cumpleFormatoEsperado) {
                    this.nodo.value = this.valor;
                } else {
                    this.valor = this.nodo.value;
                }
            }.bind(this));
        }

    }

    new CampoNumerico('#cantidad_prod');

});


// codigo de cupon

$('#cupon').click(function () {
    var checkBox1 = document.getElementById("cupon");
    var cce1 = document.getElementById("campo-cupon");
    if (checkBox1.checked == true) {

        cce1.style.display = "block";


    } else {

        cce1.style.display = "none";

    }
});


//codigo de envio a domicilio

$('#check_envio').click(function () {

    d_envio = document.getElementById("d_envio");
    var checkBo = document.getElementById("check_envio");
    // 	if (checkBo.checked == true){
    if (checkBo.checked == true) {

        d_envio.style.display = "block";


    } else {

        d_envio.style.display = "none";

    }
});


$('#otra-persona').click(function () {

    var chequeo1 = document.getElementById("otra-persona");
    var emi = document.getElementById("emisor");
    var rec = document.getElementById("receptor");
    var tab_rec = document.getElementById("icon-ficha");

    if (chequeo1.checked == true) {

        tab_rec.style.display = "table-cell";
        receptor.style.display = "block";


    } else {

        tab_rec.style.display = "none";
        receptor.style.display = "none";
    }
});

$('#dfactura').click(function () {

    var chequeo2 = document.getElementById("dfactura");
    var fac = document.getElementById("factura");

    if (chequeo2.checked == true) {
        fac.style.display = "inline-block";
    } else {
        fac.style.display = "none";
    }
});



$('#menor_edad').click(function () {
    var menor_edad = document.getElementById("d_menore");
    menor_edad.classList.toggle("hidden");
});