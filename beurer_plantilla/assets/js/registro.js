// $(document).ready(function() {
// 	class CampoNum {

// 	constructor(selector) {
// 	this.nodo = document.querySelector(selector);
// 	this.valor = '';

// 	this.empezarAEscucharEventos();
// 	}

// 	empezarAEscucharEventos() {
// 	this.nodo.addEventListener('keydown', function(evento) {
// 		const teclaPresionada = evento.key;
// 		const teclaPresionadaEsUnNumero =
// 		Number.isInteger(parseInt(teclaPresionada));

// 		const sePresionoUnaTeclaNoAdmitida = 
// 		teclaPresionada != 'ArrowDown' &&
// 		teclaPresionada != 'ArrowUp' &&
// 		teclaPresionada != 'ArrowLeft' &&
// 		teclaPresionada != 'ArrowRight' &&
// 		teclaPresionada != 'Backspace' &&
// 		teclaPresionada != 'Delete' &&
// 		teclaPresionada != 'Enter' &&
// 		!teclaPresionadaEsUnNumero;
// 		const comienzaPorCero = 
// 		this.nodo.value.length === 0 &&
// 		teclaPresionada == 0;

// 		if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
// 		evento.preventDefault(); 
// 		} else if (teclaPresionadaEsUnNumero) {
// 		this.valor += String(teclaPresionada);
// 		}

// 	}.bind(this));

// 	this.nodo.addEventListener('input', function(evento) {
// 		const cumpleFormatoEsperado = new RegExp(/^[0-9]+/).test(this.nodo.value);

// 		if (!cumpleFormatoEsperado) {
// 		this.nodo.value = this.valor;
// 		} else {
// 		this.valor = this.nodo.value;
// 		}
// 	}.bind(this));
// 	}

// 	}

//     new CampoNum('#c_telfij');

// });

function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ"; //Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 37, 39, 46, 6, 22, 101, 53, 222]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1) {

        return false;
    }

}

function soloNumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = "1234567890"; //Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 37, 39, 46, 6, 22, 101, 53, 222]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1) {

        return false;
    }

}



window.onload = function() {


    // var d = document.getElementById("s_depa");
    // var s_depa = d.options[d.selectedIndex].value;

    //alert(d.options[d.selectedIndex].textContent);

    // var d = document.getElementById("s_prov");

    // // var x=d.getElementsByTagName("option");

    // var lima = document.getElementsByClassName("d_lima");


    // for (let item of lima) {
    //     item.style.display = "block";
    // }


    var d = document.getElementById("s_prov");
    // var s_prov = d.options[d.selectedIndex].textContent;

    //alert(d.options[d.selectedIndex].textContent);

    // var d = document.getElementById("s_dist");

    // d.innerHTML = '<option class="p_lima" selected>Lima</option> <option class="p_lima" >Ancon</option> <option class="p_lima">Ate</option> <option class="p_lima">Barranco</option> <option class="p_lima">Breña</option> <option class="p_lima">Carabayllo</option> <option class="p_lima">Chaclacayo</option> <option class="p_lima">Chorrillos</option> <option class="p_lima">Cieneguilla</option> <option class="p_lima">Comas</option> <option class="p_lima">El agustino</option> <option class="p_lima">Independencia</option> <option class="p_lima">Jesus maria</option> <option class="p_lima">La molina</option> <option class="p_lima">La victoria</option> <option class="p_lima">Lince</option> <option class="p_lima">Los olivos</option> <option class="p_lima">Lurigancho</option> <option class="p_lima">Lurin</option> <option class="p_lima">Magdalena del mar</option> <option class="p_lima">Pueblo libre</option> <option class="p_lima">Miraflores</option> <option class="p_lima">Pachacamac</option> <option class="p_lima">Pucusana</option> <option class="p_lima">Puente piedra</option> <option class="p_lima">Punta hermosa</option> <option class="p_lima">Punta negra</option> <option class="p_lima">Rimac</option> <option class="p_lima">San bartolo</option> <option class="p_lima">San borja</option> <option class="p_lima">San isidro</option> <option class="p_lima">San juan de Lurigancho</option> <option class="p_lima">San juan de Miraflores</option> <option class="p_lima">San Luis</option> <option class="p_lima">San Martin de Porres</option> <option class="p_lima">San Miguel</option> <option class="p_lima">Santa Anita</option> <option class="p_lima">Santa Maria del Mar</option> <option class="p_lima">Santa Rosa</option> <option class="p_lima">Santiago de Surco</option> <option class="p_lima">Surquillo</option> <option class="p_lima">Villa el salvador</option> <option class="p_lima">Villa maria del triunfo</option>';

    // var x = d.getElementsByTagName("option");
    // var Lima = document.getElementsByClassName("p_lima");

    // for (let item of Lima) {
    //     item.style.display = "block";
    // }


    setTimeout(myFunction, 0);



};



function myFunction() {

    // document.getElementById("container10").style.display = 'none';
    document.getElementById("cabecera").style.display = 'block';
    // document.getElementById("piedepag").style.display = 'block';
    // document.getElementById("cuerpo").style.display = 'block';
    // document.getElementById("parte-contacto").style.display = 'block';
    document.getElementById("principal").style.backgroundColor = 'white';
}














// RELLENO DE PROVINCIA Y DEPARTAMENTO SEGUN SEA EL CASO


function selectPerson() {

    var e = document.getElementById("s_tipopersona");
    var factu = document.getElementById("factura");
    var s_tipopersona = e.options[e.selectedIndex].value;

    var f = document.getElementById("s_tipodoc");

    var datos1 = document.getElementById("pn_datos1");
    var datos2 = document.getElementById("pn_datos2");
    var datos3 = document.getElementById("pj_datos1");
    var dni = document.getElementById("di_pn1");
    var pas = document.getElementById("di_pn2");
    var ce = document.getElementById("di_pn3");
    var ruc = document.getElementById("only_pj");
    var div_fact = document.getElementById("d_fact");
    var div_jur = document.getElementById("d_jur");
    if (s_tipopersona == "1") {
        datos1.style.display = "block";
        datos2.style.display = "block";
        datos3.style.display = "none";
        ruc.style.display = "block";
        div_fact.style.display = "block";
        div_jur.style.display = "none";
        dni.style.display = "block";
        pas.style.display = "block";
        ce.style.display = "block";
        f.selectedIndex = "0";

    } else {
        datos1.style.display = "none";
        datos2.style.display = "none";
        datos3.style.display = "block";
        factu.style.display = "none";
        ruc.style.display = "block";
        div_fact.style.display = "none";
        div_jur.style.display = "inline-block";
        dni.style.display = "none";
        pas.style.display = "none";
        ce.style.display = "none";
        f.selectedIndex = "3";

    }
}

function selectTipoDoc() {
    var e = document.getElementById("s_tipodoc");
    var factu = document.getElementById("factura");
    var s_tipodoc = e.options[e.selectedIndex].value;



    var datos1 = document.getElementById("pn_datos1");
    var datos2 = document.getElementById("pn_datos2");
    var datos3 = document.getElementById("pj_datos1");

    var ruc = document.getElementById("only_pj");
    var div_fact = document.getElementById("d_fact");
    var div_jur = document.getElementById("d_jur");
    if (s_tipodoc == "4") {
        datos1.style.display = "none";
        datos2.style.display = "none";
        datos3.style.display = "block";
        factu.style.display = "none";
        ruc.style.display = "block";
        div_fact.style.display = "none";
        div_jur.style.display = "inline-block";
    } else {
        datos1.style.display = "block";
        datos2.style.display = "block";
        datos3.style.display = "none";

        ruc.style.display = "none";
        div_fact.style.display = "inline-block";
        div_jur.style.display = "none";
    }
}

function selectDep() {

    var d = document.getElementById("s_depa");
    var s_depa = d.options[d.selectedIndex].value;

    //alert(d.options[d.selectedIndex].textContent);

    var d = document.getElementById("s_prov");

    var x = d.getElementsByTagName("option");



    var amazonas = document.getElementsByClassName("d_amaz");
    var ancash = document.getElementsByClassName("d_anca");
    var apurimac = document.getElementsByClassName("d_apur");
    var arequipa = document.getElementsByClassName("d_areq");
    var ayacucho = document.getElementsByClassName("d_ayac");
    var cajamarca = document.getElementsByClassName("d_caja");
    var cusco = document.getElementsByClassName("d_cusc");
    var huancavelica = document.getElementsByClassName("d_huanc");
    var huanuco = document.getElementsByClassName("d_huanu");
    var ica = document.getElementsByClassName("d_ica");
    var junin = document.getElementsByClassName("d_juni");
    var lalibertad = document.getElementsByClassName("d_lali");
    var lambayeque = document.getElementsByClassName("d_lamb");
    var lima = document.getElementsByClassName("d_lima");
    var loreto = document.getElementsByClassName("d_lore");
    var madre = document.getElementsByClassName("d_madr");
    var moquegua = document.getElementsByClassName("d_moqu");
    var pasco = document.getElementsByClassName("d_pasc");
    var piura = document.getElementsByClassName("d_piur");
    var puno = document.getElementsByClassName("d_puno");
    var sanmartin = document.getElementsByClassName("d_sanm");
    var tacna = document.getElementsByClassName("d_tacn");
    var tumbes = document.getElementsByClassName("d_tumb");
    var ucayali = document.getElementsByClassName("d_ucay");

    switch (s_depa) {

        case "0":

            break;
        case "1":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of amazonas) {
                item.style.display = "block";
            }
            d.selectedIndex = amazonas[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");
            d.innerHTML = '<option class="p_chac" >Chachapoyas</option> <option class="p_chac">Asunción</option> <option class="p_chac">Balsas</option> <option class="p_chac">Cheto</option> <option class="p_chac">Chiliquín</option> <option class="p_chac">Chuquibamba</option> <option class="p_chac">Granada</option> <option class="p_chac">Huancas</option> <option class="p_chac">La Jalca</option> <option class="p_chac">Leimebamba</option> <option class="p_chac">Levanto</option> <option class="p_chac">Magdalena</option> <option class="p_chac">Mariscal Castilla</option> <option class="p_chac">Molinopampa</option> <option class="p_chac">Montevideo</option> <option class="p_chac">Olleros</option> <option class="p_chac">Quinjalca</option> <option class="p_chac">San Francisco de Daguas</option> <option class="p_chac">San Isidro de Maino</option> <option class="p_chac">Soloco</option> <option class="p_chac">Sonche</option>';
            var x = d.getElementsByTagName("option");
            var Chachapoyas = document.getElementsByClassName("p_chac");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Chachapoyas) {
                item.style.display = "block";
            }
            d.selectedIndex = Chachapoyas[0].index;


            break;
        case "2":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of ancash) {
                item.style.display = "block";
            }
            d.selectedIndex = ancash[0].index;


            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");
            d.innerHTML = '<option class="p_huaraz">Huaraz</option> <option class="p_huaraz">Cochabamba</option> <option class="p_huaraz">Colcabamba</option> <option class="p_huaraz">Huanchay</option> <option class="p_huaraz">Independencia</option> <option class="p_huaraz">Jangas</option> <option class="p_huaraz">La Libertad</option> <option class="p_huaraz">Olleros</option> <option class="p_huaraz">Pampas Grande</option> <option class="p_huaraz">Pariacoto</option> <option class="p_huaraz">Pira</option> <option class="p_huaraz">Tarica</option>';
            var x = d.getElementsByTagName("option");
            var Huaraz = document.getElementsByClassName("p_huaraz");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huaraz) {
                item.style.display = "block";
            }
            d.selectedIndex = Huaraz[0].index;

            break;
        case "3":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of apurimac) {
                item.style.display = "block";
            }
            d.selectedIndex = apurimac[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");

            d.innerHTML = '<option class="p_aban">Abancay</option> <option class="p_aban">Chacoche</option> <option class="p_aban">Circa</option> <option class="p_aban">Curahuasi</option> <option class="p_aban">Huanipaca</option> <option class="p_aban">Lambrama</option> <option class="p_aban">Pichirhua</option> <option class="p_aban">San Pedro de Cachora</option> <option class="p_aban">Tamburco</option>';
            var x = d.getElementsByTagName("option");
            var Abancay = document.getElementsByClassName("p_aban");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Abancay) {
                item.style.display = "block";
            }
            d.selectedIndex = Abancay[0].index;

            break;
        case "4":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of arequipa) {
                item.style.display = "block";
            }
            d.selectedIndex = arequipa[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");

            d.innerHTML = '<option class="p_areq">Arequipa</option>  <option class="p_areq">Alto selva alegre</option>  <option class="p_areq">Cayma</option>  <option class="p_areq">Cerro colorado</option>  <option class="p_areq">Characato</option>  <option class="p_areq">Chiguata</option>  <option class="p_areq">Jacobo hunter</option>  <option class="p_areq">La joya</option>  <option class="p_areq">Mariano melgar</option>  <option class="p_areq">Miraflores</option>  <option class="p_areq">Mollebaya</option>  <option class="p_areq">Paucarpata</option>  <option class="p_areq">Pocsi</option>  <option class="p_areq">Polobaya</option>  <option class="p_areq">Quequeña</option>  <option class="p_areq">Sabandia</option>  <option class="p_areq">Sachaca</option>  <option class="p_areq">San juan de siguas</option>  <option class="p_areq">San juan de tarucani</option>  <option class="p_areq">Santa Isabel de Siguas</option>  <option class="p_areq">Santa Rita de Siguas</option>  <option class="p_areq">Socabaya</option>  <option class="p_areq">Tiabaya</option>  <option class="p_areq">Uchumayo</option>  <option class="p_areq">Vitor</option>  <option class="p_areq">Yanahuara</option>  <option class="p_areq">Yarabamba</option>  <option class="p_areq">Yura</option>  <option class="p_areq">Jose luis bustamante y rivero</option>';
            var x = d.getElementsByTagName("option");
            var Arequipa = document.getElementsByClassName("p_areq");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Arequipa) {
                item.style.display = "block";
            }
            d.selectedIndex = Arequipa[0].index;
            break;
        case "5":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of ayacucho) {
                item.style.display = "block";
            }
            d.selectedIndex = ayacucho[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");
            d.innerHTML = '<option class="p_huam">Ayacucho</option> <option class="p_huam">Acocro</option> <option class="p_huam">Acos vinchos</option> <option class="p_huam">Carmen alto</option> <option class="p_huam">Chiara</option> <option class="p_huam">Ocros</option> <option class="p_huam">Pacaycasa</option> <option class="p_huam">Quinua</option> <option class="p_huam">San jose de ticllas</option> <option class="p_huam">San juan bautista</option> <option class="p_huam">Santiago de pischa</option> <option class="p_huam">Socos</option> <option class="p_huam">Tambillo</option> <option class="p_huam">Vinchos</option> <option class="p_huam">Jesús nazareno</option> <option class="p_huam">Andres avelino caceres dorregaray</option>';
            var x = d.getElementsByTagName("option");
            var Huamanga = document.getElementsByClassName("p_huam");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huamanga) {
                item.style.display = "block";
            }
            d.selectedIndex = Huamanga[0].index;
            break;
        case "6":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of cajamarca) {
                item.style.display = "block";
            }
            d.selectedIndex = cajamarca[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");

            d.innerHTML = '<option class="p_cajam">Cajamarca</option> <option class="p_cajam">Asunción</option> <option class="p_cajam">Chetilla</option> <option class="p_cajam">Cospan</option> <option class="p_cajam">Encañada</option> <option class="p_cajam">Jesus</option> <option class="p_cajam">Llacanora</option> <option class="p_cajam">Los baños del inca</option> <option class="p_cajam">Magdalena</option> <option class="p_cajam">Matara</option> <option class="p_cajam">Namora</option> <option class="p_cajam">San juan</option>';
            var x = d.getElementsByTagName("option");
            var Cajamarca = document.getElementsByClassName("p_cajam");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Cajamarca) {
                item.style.display = "block";
            }
            d.selectedIndex = Cajamarca[0].index;

            break;
        case "7":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of cusco) {
                item.style.display = "block";
            }
            d.selectedIndex = cusco[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");

            d.innerHTML = '<option class="p_callao">Callao</option> <option class="p_callao">Bellavista</option> <option class="p_callao">Carmen de la legua reynoso</option> <option class="p_callao">La perla</option> <option class="p_callao">La punta</option> <option class="p_callao">Ventanilla</option> <option class="p_callao">Mi Perú</option> <option class="p_cusco">Cusco</option> <option class="p_cusco">Ccorca</option> <option class="p_cusco">Poroy</option> <option class="p_cusco">San jeronimo</option> <option class="p_cusco">San sebastian</option> <option class="p_cusco">Santiago</option> <option class="p_cusco">Saylla</option> <option class="p_cusco">Wanchaq</option>';
            var x = d.getElementsByTagName("option");
            var Cuzco = document.getElementsByClassName("p_cusco");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Cuzco) {
                item.style.display = "block";
            }
            d.selectedIndex = Cuzco[0].index;
            break;
        case "8":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of huancavelica) {
                item.style.display = "block";
            }
            d.selectedIndex = huancavelica[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");
            d.innerHTML = '<option class="p_huancav">Huancavelica</option> <option class="p_huancav">Acobambilla</option> <option class="p_huancav">Acoria</option> <option class="p_huancav">Conayca</option> <option class="p_huancav">Cuenca</option> <option class="p_huancav">Huachocolpa</option> <option class="p_huancav">Huayllahuara</option> <option class="p_huancav">Izcuchaca</option> <option class="p_huancav">Laria</option> <option class="p_huancav">Manta</option> <option class="p_huancav">Mariscal Cáceres</option> <option class="p_huancav">Moya</option> <option class="p_huancav">Nuevo occoro</option> <option class="p_huancav">Palca</option> <option class="p_huancav">Pilchaca</option> <option class="p_huancav">Vilca</option> <option class="p_huancav">Yauli</option> <option class="p_huancav">Ascensión</option> <option class="p_huancav">Huando</option>';
            var x = d.getElementsByTagName("option");
            var Huancavelica = document.getElementsByClassName("p_huancav");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huancavelica) {
                item.style.display = "block";
            }
            d.selectedIndex = Huancavelica[0].index;

            break;
        case "9":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of huanuco) {
                item.style.display = "block";
            }
            d.selectedIndex = huanuco[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");
            d.innerHTML = '<option class="p_huanu">Huánuco</option> <option class="p_huanu">Amarilis</option> <option class="p_huanu">Chinchao</option> <option class="p_huanu">Churubamba</option> <option class="p_huanu">Margos</option> <option class="p_huanu">Quisqui</option> <option class="p_huanu">San francisco de Cayran</option> <option class="p_huanu">San pedro de chaulan</option> <option class="p_huanu">Santa María del Valle</option> <option class="p_huanu">Yarumayo</option> <option class="p_huanu">Pillco Marca</option> <option class="p_huanu">Yacus</option> <option class="p_huanu">San pablo de pillao</option>';
            var x = d.getElementsByTagName("option");
            var Huánuco = document.getElementsByClassName("p_huanu");

            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huánuco) {
                item.style.display = "block";
            }
            d.selectedIndex = Huánuco[0].index;

            break;
        case "10":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of ica) {
                item.style.display = "block";
            }
            d.selectedIndex = ica[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");

            d.innerHTML = '<option class="p_ica">Ica</option> <option class="p_ica">La tinguiña</option> <option class="p_ica">Los aquijes</option> <option class="p_ica">Ocucaje</option> <option class="p_ica">Pachacutec</option> <option class="p_ica">Parcona</option> <option class="p_ica">Pueblo nuevo</option> <option class="p_ica">Salas</option> <option class="p_ica">San jose de los molinos</option> <option class="p_ica">San juan bautista</option> <option class="p_ica">Santiago</option> <option class="p_ica">Subtanjalla</option> <option class="p_ica">Tate</option> <option class="p_ica">Yauca del rosario</option>';
            var x = d.getElementsByTagName("option");
            var Ica = document.getElementsByClassName("p_ica");

            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Ica) {
                item.style.display = "block";
            }
            d.selectedIndex = Ica[0].index;

            break;
        case "11":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of junin) {
                item.style.display = "block";
            }
            d.selectedIndex = junin[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");
            d.innerHTML = '<option class="p_huancay">Huancayo</option> <option class="p_huancay">Carhuacallanga</option> <option class="p_huancay">Chacapampa</option> <option class="p_huancay">Chicche</option> <option class="p_huancay">Chilca</option> <option class="p_huancay">Chongos alto</option> <option class="p_huancay">Chupuro</option> <option class="p_huancay">Colca</option> <option class="p_huancay">Collhuas</option> <option class="p_huancay">El tambo</option> <option class="p_huancay">Huacrapuquio</option> <option class="p_huancay">Hualhuas</option> <option class="p_huancay">Huancan</option> <option class="p_huancay">Huasicancha</option> <option class="p_huancay">Huayucachi</option> <option class="p_huancay">Ingenio</option> <option class="p_huancay">Pariahuanca</option> <option class="p_huancay">Pilcomayo</option> <option class="p_huancay">Pucara</option> <option class="p_huancay">Quichuay</option> <option class="p_huancay">Quilcas</option> <option class="p_huancay">San Agustín</option> <option class="p_huancay">San Jeronimo de Tunan</option> <option class="p_huancay">Saño</option> <option class="p_huancay">Sapallanga</option> <option class="p_huancay">Sicaya</option> <option class="p_huancay">Santo domingo de acobamba</option> <option class="p_huancay">Viques</option>';
            var x = d.getElementsByTagName("option");
            var Huancayo = document.getElementsByClassName("p_huancay");

            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huancayo) {
                item.style.display = "block";
            }
            d.selectedIndex = Huancayo[0].index;

            break;
        case "12":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of lalibertad) {
                item.style.display = "block";
            }
            d.selectedIndex = lalibertad[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");
            d.innerHTML = '<option class="p_truj">Trujillo</option> <option class="p_truj">El porvenir</option> <option class="p_truj">Florencia de mora</option> <option class="p_truj">Huanchaco</option> <option class="p_truj">La esperanza</option> <option class="p_truj">Laredo</option> <option class="p_truj">Moche</option> <option class="p_truj">Poroto</option> <option class="p_truj">Salaverry</option> <option class="p_truj">Simbal</option> <option class="p_truj">Victor larco herrera</option>';
            var x = d.getElementsByTagName("option");
            var Trujillo = document.getElementsByClassName("p_truj");

            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Trujillo) {
                item.style.display = "block";
            }
            d.selectedIndex = Trujillo[0].index;
            break;
        case "13":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of lambayeque) {
                item.style.display = "block";
            }
            d.selectedIndex = lambayeque[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");

            d.innerHTML = '<option class="p_chicla">Chiclayo</option> <option class="p_chicla">Chongoyape</option> <option class="p_chicla">Eten</option> <option class="p_chicla">Eten puerto</option> <option class="p_chicla">Jose leonardo ortiz</option> <option class="p_chicla">La victoria</option> <option class="p_chicla">Lagunas</option> <option class="p_chicla">Monsefu</option> <option class="p_chicla">Nueva arica</option> <option class="p_chicla">Oyotun</option> <option class="p_chicla">Picsi</option> <option class="p_chicla">Pimentel</option> <option class="p_chicla">Reque</option> <option class="p_chicla">Santa Rosa</option> <option class="p_chicla">Saña</option> <option class="p_chicla">Cayalti</option> <option class="p_chicla">Patapo</option> <option class="p_chicla">Pomalca</option> <option class="p_chicla">Pucala</option> <option class="p_chicla">Tuman</option>';
            var x = d.getElementsByTagName("option");
            var Chiclayo = document.getElementsByClassName("p_chicla");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Chiclayo) {
                item.style.display = "block";
            }
            d.selectedIndex = Chiclayo[0].index;
            break;
        case "14":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of lima) {
                item.style.display = "block";
            }
            d.selectedIndex = lima[0].index;


            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");

            d.innerHTML = '<option class="p_lima" selected>Lima</option> <option class="p_lima" >Ancon</option> <option class="p_lima">Ate</option> <option class="p_lima">Barranco</option> <option class="p_lima">Breña</option> <option class="p_lima">Carabayllo</option> <option class="p_lima">Chaclacayo</option> <option class="p_lima">Chorrillos</option> <option class="p_lima">Cieneguilla</option> <option class="p_lima">Comas</option> <option class="p_lima">El agustino</option> <option class="p_lima">Independencia</option> <option class="p_lima">Jesus maria</option> <option class="p_lima">La molina</option> <option class="p_lima">La victoria</option> <option class="p_lima">Lince</option> <option class="p_lima">Los olivos</option> <option class="p_lima">Lurigancho</option> <option class="p_lima">Lurin</option> <option class="p_lima">Magdalena del mar</option> <option class="p_lima">Pueblo libre</option> <option class="p_lima">Miraflores</option> <option class="p_lima">Pachacamac</option> <option class="p_lima">Pucusana</option> <option class="p_lima">Puente piedra</option> <option class="p_lima">Punta hermosa</option> <option class="p_lima">Punta negra</option> <option class="p_lima">Rimac</option> <option class="p_lima">San bartolo</option> <option class="p_lima">San borja</option> <option class="p_lima">San isidro</option> <option class="p_lima">San juan de Lurigancho</option> <option class="p_lima">San juan de Miraflores</option> <option class="p_lima">San Luis</option> <option class="p_lima">San Martin de Porres</option> <option class="p_lima">San Miguel</option> <option class="p_lima">Santa Anita</option> <option class="p_lima">Santa Maria del Mar</option> <option class="p_lima">Santa Rosa</option> <option class="p_lima">Santiago de Surco</option> <option class="p_lima">Surquillo</option> <option class="p_lima">Villa el salvador</option> <option class="p_lima">Villa maria del triunfo</option>';
            var x = d.getElementsByTagName("option");
            var Lima = document.getElementsByClassName("p_lima");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Lima) {
                item.style.display = "block";
            }
            d.selectedIndex = Lima[0].index;
            break;
        case "15":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of loreto) {
                item.style.display = "block";
            }
            d.selectedIndex = loreto[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");
            d.inner = '<option class="p_may">Iquitos</option> <option class="p_may">Alto nanay</option> <option class="p_may">Fernando lores</option> <option class="p_may">Indiana</option> <option class="p_may">Las Amazonas</option> <option class="p_may">Mazan</option> <option class="p_may">Napo</option> <option class="p_may">Punchana</option> <option class="p_may">Torres causana</option> <option class="p_may">Belen</option> <option class="p_may">San juan bautista</option>';
            var x = d.getElementsByTagName("option");
            var Maynas = document.getElementsByClassName("p_may");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Maynas) {
                item.style.display = "block";
            }
            d.selectedIndex = Maynas[0].index;
            break;
        case "16":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of madre) {
                item.style.display = "block";
            }
            d.selectedIndex = madre[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");
            d.innerHTML = '<option class="p_tambop">Tambopata</option> <option class="p_tambop">Inambari</option> <option class="p_tambop">Las piedras</option> <option class="p_tambop">Laberinto</option>';
            var x = d.getElementsByTagName("option");
            var Tambopata = document.getElementsByClassName("p_tambop");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Tambopata) {
                item.style.display = "block";
            }
            d.selectedIndex = Tambopata[0].index;
            break;
        case "17":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of moquegua) {
                item.style.display = "block";
            }
            d.selectedIndex = moquegua[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");
            d.innerHTML = '<option class="p_marn">Moquegua</option> <option class="p_marn">Carumas</option> <option class="p_marn">Cuchumbaya</option> <option class="p_marn">Samegua</option> <option class="p_marn">San Cristobal</option> <option class="p_marn">Torata</option>';
            var x = d.getElementsByTagName("option");
            var MariscalNieto = document.getElementsByClassName("p_marn");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of MariscalNieto) {
                item.style.display = "block";
            }
            d.selectedIndex = MariscalNieto[0].index;
            break;
        case "18":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of pasco) {
                item.style.display = "block";
            }
            d.selectedIndex = pasco[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");
            d.innerHTML = '<option class="p_pasco">Chaupimarca</option> <option class="p_pasco">Huachon</option> <option class="p_pasco">Huariaca</option> <option class="p_pasco">Huayllay</option> <option class="p_pasco">Ninacaca</option> <option class="p_pasco">Pallanchacra</option> <option class="p_pasco">Paucartambo</option> <option class="p_pasco">San francisco de Asis de Yarusyacan</option> <option class="p_pasco">Simon Bolívar</option> <option class="p_pasco">Ticlacayan</option> <option class="p_pasco">Tinyahuarco</option> <option class="p_pasco">Vicco</option> <option class="p_pasco">Yanacancha</option>';
            var x = d.getElementsByTagName("option");
            var Pasco = document.getElementsByClassName("p_pasco");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Pasco) {
                item.style.display = "block";
            }
            d.selectedIndex = Pasco[0].index;
            break;
        case "19":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of piura) {
                item.style.display = "block";
            }
            d.selectedIndex = piura[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");

            d.innerHTML = '<option class="p_piu">Piura</option> <option class="p_piu">Castilla</option> <option class="p_piu">Catacaos</option> <option class="p_piu">Cura mori</option> <option class="p_piu">El tallan</option> <option class="p_piu">La arena</option> <option class="p_piu">La unión</option> <option class="p_piu">Las lomas</option> <option class="p_piu">Tambo grande</option> <option class="p_piu">Veintiséis de Octubre</option>';
            var x = d.getElementsByTagName("option");
            var Piura = document.getElementsByClassName("p_piu");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Piura) {
                item.style.display = "block";
            }
            d.selectedIndex = Piura[0].index;
            break;
        case "20":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of puno) {
                item.style.display = "block";
            }
            d.selectedIndex = puno[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");
            d.innerHTML = '<option class="p_puno">Puno</option> <option class="p_puno">Acora</option> <option class="p_puno">Amantani</option> <option class="p_puno">Atuncolla</option> <option class="p_puno">Capachica</option> <option class="p_puno">Chucuito</option> <option class="p_puno">Coata</option> <option class="p_puno">Huata</option> <option class="p_puno">Mañazo</option> <option class="p_puno">Paucarcolla</option> <option class="p_puno">Pichacani</option> <option class="p_puno">Plateria</option> <option class="p_puno">San Antonio</option> <option class="p_puno">Tiquillaca</option> <option class="p_puno">Vilque</option>';
            var x = d.getElementsByTagName("option");
            var Puno = document.getElementsByClassName("p_puno");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Puno) {
                item.style.display = "block";
            }
            d.selectedIndex = Puno[0].index;
            break;
        case "21":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of sanmartin) {
                item.style.display = "block";
            }
            d.selectedIndex = sanmartin[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");
            d.innerHTML = '<option class="p_moyo">Moyobamba</option> <option class="p_moyo">Calzada</option> <option class="p_moyo">Habana</option> <option class="p_moyo">Jepelacio</option> <option class="p_moyo">Soritor</option> <option class="p_moyo">Yantalo</option>';
            var x = d.getElementsByTagName("option");
            var Moyobamba = document.getElementsByClassName("p_moyo");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Moyobamba) {
                item.style.display = "block";
            }
            d.selectedIndex = Moyobamba[0].index;
            break;
        case "22":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of tacna) {
                item.style.display = "block";
            }
            d.selectedIndex = tacna[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");

            d.innerHTML = '<option class="p_tacna">Tacna</option> <option class="p_tacna">Alto de la alianza</option> <option class="p_tacna">Calana</option> <option class="p_tacna">Ciudad nueva</option> <option class="p_tacna">Inclán</option> <option class="p_tacna">Pachía</option> <option class="p_tacna">Palca</option> <option class="p_tacna">Pocollay</option> <option class="p_tacna">Sama</option> <option class="p_tacna">Coronel Gregorio Albarracín Lanchipa</option> <option class="p_tacna">La yarada los palos</option>';
            var x = d.getElementsByTagName("option");
            var Tacna = document.getElementsByClassName("p_tacna");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Tacna) {
                item.style.display = "block";
            }
            d.selectedIndex = Tacna[0].index;
            break;
        case "23":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of tumbes) {
                item.style.display = "block";
            }
            d.selectedIndex = tumbes[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");
            d.innerHTML = '<option class="p_tumb">Tumbes</option> <option class="p_tumb">Corrales</option> <option class="p_tumb">La cruz</option> <option class="p_tumb">Pampas de hospital</option> <option class="p_tumb">San jacinto</option> <option class="p_tumb">San juan de la virgen</option>';
            var x = d.getElementsByTagName("option");
            var Tumbes = document.getElementsByClassName("p_tumb");
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Tumbes) {
                item.style.display = "block";
            }
            d.selectedIndex = Tumbes[0].index;
            break;
        case "24":
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of ucayali) {
                item.style.display = "block";
            }
            d.selectedIndex = ucayali[0].index;

            var d = document.getElementById("s_prov");
            var s_prov = d.options[d.selectedIndex].textContent;
            var d = document.getElementById("s_dist");
            d.innerHTML = '<option class="p_corop">Calleria</option> <option class="p_corop">Campoverde</option> <option class="p_corop">Iparia</option> <option class="p_corop">Masisea</option> <option class="p_corop">Yarinacocha</option> <option class="p_corop">Nueva requena</option> <option class="p_corop">Manantay</option>';
            var x = d.getElementsByTagName("option");
            var CoronelPortillo = document.getElementsByClassName("p_corop");

            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of CoronelPortillo) {
                item.style.display = "block";
            }
            d.selectedIndex = CoronelPortillo[0].index;
            break;
        default:
            // code block
    }
}

function selectProv() {

    var d = document.getElementById("s_prov");
    var s_prov = d.options[d.selectedIndex].textContent;

    //alert(d.options[d.selectedIndex].textContent);

    var d = document.getElementById("s_dist");

    var x = d.getElementsByTagName("option");

    //        var amazonas=document.getElementsByClassName("p_amaz");

    var Chachapoyas = document.getElementsByClassName("p_chac");
    var Bagua = document.getElementsByClassName("p_bagu");
    var Bongara = document.getElementsByClassName("p_bong");
    var Condorcanqui = document.getElementsByClassName("p_cond");
    var Luya = document.getElementsByClassName("p_luya");
    var RodriguezdeMendoza = document.getElementsByClassName("p_rodr");
    var Utcubamba = document.getElementsByClassName("p_utcu");

    var Huaraz = document.getElementsByClassName("p_huaraz");
    var Aija = document.getElementsByClassName("p_aija");
    var AntonioRaimondi = document.getElementsByClassName("p_anto");
    var Asunción = document.getElementsByClassName("p_asun");
    var Bolognesi = document.getElementsByClassName("p_bolo");
    var Carhuaz = document.getElementsByClassName("p_carh");
    var CarlosFermin = document.getElementsByClassName("p_carl");
    var Casma = document.getElementsByClassName("p_casm");
    var Corongo = document.getElementsByClassName("p_coro");
    var Huari = document.getElementsByClassName("p_huari");
    var Huarmey = document.getElementsByClassName("p_huarm");
    var Huaylas = document.getElementsByClassName("p_huay");
    var MariscalLuzuriaga = document.getElementsByClassName("p_mari");
    var Ocros = document.getElementsByClassName("p_ocro");
    var Pallasca = document.getElementsByClassName("p_pall");
    var Pomabamba = document.getElementsByClassName("p_poma");
    var Recuay = document.getElementsByClassName("p_recu");
    var Santa = document.getElementsByClassName("p_sant");
    var Sihuas = document.getElementsByClassName("p_sihu");
    var Yungay = document.getElementsByClassName("p_yung");

    var Abancay = document.getElementsByClassName("p_aban");
    var Andahuaylas = document.getElementsByClassName("p_anda");
    var Antabamba = document.getElementsByClassName("p_antab");
    var Aymaraes = document.getElementsByClassName("p_ayma");
    var Cotabambas = document.getElementsByClassName("p_cota");
    var Chincheros = document.getElementsByClassName("p_chinc");
    var Grau = document.getElementsByClassName("p_grau");

    var Arequipa = document.getElementsByClassName("p_areq");
    var Camana = document.getElementsByClassName("p_cama");
    var Caraveli = document.getElementsByClassName("p_cara");
    var Castilla = document.getElementsByClassName("p_cast");
    var Caylloma = document.getElementsByClassName("p_cayl");
    var Condesuyos = document.getElementsByClassName("p_cond");
    var Islay = document.getElementsByClassName("p_isla");
    var LaUnion = document.getElementsByClassName("p_laun");

    var Huamanga = document.getElementsByClassName("p_huam");
    var Cangallo = document.getElementsByClassName("p_cang");
    var HuancaSancos = document.getElementsByClassName("p_huan");
    var Huanta = document.getElementsByClassName("p_huanta");
    var LaMar = document.getElementsByClassName("p_lamar");
    var Lucanas = document.getElementsByClassName("p_luca");
    var Parinacochas = document.getElementsByClassName("p_pari");
    var PaucardelSaraSara = document.getElementsByClassName("p_pauc");
    var Sucre = document.getElementsByClassName("p_sucr");
    var VictorFajardo = document.getElementsByClassName("p_vict");
    var Vilcahuaman = document.getElementsByClassName("p_vilc");

    var Cajamarca = document.getElementsByClassName("p_cajam");
    var Cajabamba = document.getElementsByClassName("p_cajab");
    var Celendin = document.getElementsByClassName("p_cele");
    var Chota = document.getElementsByClassName("p_chot");
    var Contumaza = document.getElementsByClassName("p_cont");
    var Cutervo = document.getElementsByClassName("p_cute");
    var Hualgayoc = document.getElementsByClassName("p_hual");
    var Jaen = document.getElementsByClassName("p_jaen");
    var SanIgnacio = document.getElementsByClassName("p_sani");
    var SanMarcos = document.getElementsByClassName("p_sanm");
    var SanMiguel = document.getElementsByClassName("p_sanmi");
    var SanPablo = document.getElementsByClassName("p_sanpa");
    var SantaCruz = document.getElementsByClassName("p_sancr");

    var Cuzco = document.getElementsByClassName("p_cusco");
    var Acomayo = document.getElementsByClassName("p_acom");
    var Anta = document.getElementsByClassName("p_anta");
    var Calca = document.getElementsByClassName("p_calc");
    var Canas = document.getElementsByClassName("p_cana");
    var Canchis = document.getElementsByClassName("p_canc");
    var Chumbivilcas = document.getElementsByClassName("p_chum");
    var Espinar = document.getElementsByClassName("p_espi");
    var LaConvencion = document.getElementsByClassName("p_laconv");
    var Paruro = document.getElementsByClassName("p_paru");
    var Paucartambo = document.getElementsByClassName("p_paucart");
    var Quispicanchi = document.getElementsByClassName("p_quispi");
    var Urubamba = document.getElementsByClassName("p_urub");

    var Huancavelica = document.getElementsByClassName("p_huancav");
    var Acobamba = document.getElementsByClassName("p_acob");
    var Angaraes = document.getElementsByClassName("p_angar");
    var Castrovirreyna = document.getElementsByClassName("p_castro");
    var Churcampa = document.getElementsByClassName("p_chur");
    var Huaytara = document.getElementsByClassName("p_huayt");
    var Tayacaja = document.getElementsByClassName("p_taya");

    var Huánuco = document.getElementsByClassName("p_huanu");
    var Ambo = document.getElementsByClassName("p_ambo");
    var DosdeMayo = document.getElementsByClassName("p_dosd");
    var Huacaybamba = document.getElementsByClassName("p_huacay");
    var Huamalíes = document.getElementsByClassName("p_huamal");
    var LeoncioPrado = document.getElementsByClassName("p_leo");
    var Marañon = document.getElementsByClassName("p_mara");
    var Pachitea = document.getElementsByClassName("p_pachi");
    var PuertoInca = document.getElementsByClassName("p_puerto");
    var Lauricocha = document.getElementsByClassName("p_lauri");
    var Yarowilca = document.getElementsByClassName("p_yaro");

    var Ica = document.getElementsByClassName("p_ica");
    var Chincha = document.getElementsByClassName("p_chin");
    var Nazca = document.getElementsByClassName("p_nasc");
    var Palpa = document.getElementsByClassName("p_palp");
    var Pisco = document.getElementsByClassName("p_pis");

    var Huancayo = document.getElementsByClassName("p_huancay");
    var Chanchamayo = document.getElementsByClassName("p_chancha");
    var Chupaca = document.getElementsByClassName("p_chupa");
    var Concepcion = document.getElementsByClassName("p_conc");
    var Jauja = document.getElementsByClassName("p_jauja");
    var Junin = document.getElementsByClassName("p_juni");
    var Satipo = document.getElementsByClassName("p_sati");
    var Tarma = document.getElementsByClassName("p_tarm");
    var Yauli = document.getElementsByClassName("p_yauli");

    var Trujillo = document.getElementsByClassName("p_truj");
    var Ascope = document.getElementsByClassName("p_asco");
    var Bolivar = document.getElementsByClassName("p_boli");
    var Chepén = document.getElementsByClassName("p_chep");
    var GranChimu = document.getElementsByClassName("p_gran");
    var Julcan = document.getElementsByClassName("p_jul");
    var Otuzco = document.getElementsByClassName("p_otu");
    var Pacasmayo = document.getElementsByClassName("p_pacas");
    var Pataz = document.getElementsByClassName("p_pataz");
    var SanchezCarrin = document.getElementsByClassName("p_sanch");
    var SantiagodeChuco = document.getElementsByClassName("p_santi");
    var Viru = document.getElementsByClassName("p_viru");

    var Chiclayo = document.getElementsByClassName("p_chicla");
    var Ferreñafe = document.getElementsByClassName("p_ferre");
    var Lambayeque = document.getElementsByClassName("p_lamba");

    var Lima = document.getElementsByClassName("p_lima");
    var Barranca = document.getElementsByClassName("p_barra");
    var Cajatambo = document.getElementsByClassName("p_cajat");
    var Canta = document.getElementsByClassName("p_canta");
    var Cañete = document.getElementsByClassName("p_cañe");
    var Huaral = document.getElementsByClassName("p_huara");
    var Huarochirí = document.getElementsByClassName("p_huaro");
    var Huaura = document.getElementsByClassName("p_huaura");
    var Oyon = document.getElementsByClassName("p_oyo");
    var Yauyos = document.getElementsByClassName("p_yau");

    var Maynas = document.getElementsByClassName("p_may");
    var AltoAmazonas = document.getElementsByClassName("p_altoa");
    var DatemdelMarañon = document.getElementsByClassName("p_date");
    var Loreto = document.getElementsByClassName("p_lore");
    var MariscalRamónCastilla = document.getElementsByClassName("p_maris");
    var Putumayo = document.getElementsByClassName("p_putu");
    var Requena = document.getElementsByClassName("p_reque");
    var Ucayali = document.getElementsByClassName("p_ucay");

    var Tambopata = document.getElementsByClassName("p_tambop");
    var Manu = document.getElementsByClassName("p_manu");
    var Tahuamanu = document.getElementsByClassName("p_tahua");

    var MariscalNieto = document.getElementsByClassName("p_marn");
    var GeneralSanchez = document.getElementsByClassName("p_gsc");
    var Ilo = document.getElementsByClassName("p_ilo");

    var Pasco = document.getElementsByClassName("p_pasco");
    var DanielAlcides = document.getElementsByClassName("p_dac");
    var Oxapampa = document.getElementsByClassName("p_oxa");

    var Piura = document.getElementsByClassName("p_piu");
    var Ayabaca = document.getElementsByClassName("p_ayab");
    var Huancabamba = document.getElementsByClassName("p_huancabamba");
    var Morropon = document.getElementsByClassName("p_morro");
    var Paita = document.getElementsByClassName("p_paita");
    var Sechura = document.getElementsByClassName("p_sechu");
    var Sullana = document.getElementsByClassName("p_sulla");
    var Talara = document.getElementsByClassName("p_talar");


    var Puno = document.getElementsByClassName("p_puno");
    var Azangaro = document.getElementsByClassName("p_azan");
    var Carabaya = document.getElementsByClassName("p_carabaya");
    var Chucuito = document.getElementsByClassName("p_chucu");
    var ElCollao = document.getElementsByClassName("p_colla");
    var Huancane = document.getElementsByClassName("p_huancane");
    var Lampa = document.getElementsByClassName("p_lampa");
    var Melgar = document.getElementsByClassName("p_melgar");
    var Moho = document.getElementsByClassName("p_moho");
    var SanAntoniodePutina = document.getElementsByClassName("p_sap");
    var SanRoman = document.getElementsByClassName("p_sanr");
    var Sandia = document.getElementsByClassName("p_sand");
    var Yunguyo = document.getElementsByClassName("p_yun");

    var Moyobamba = document.getElementsByClassName("p_moyo");
    var Bellavista = document.getElementsByClassName("p_bella");
    var ElDorado = document.getElementsByClassName("p_dorado");
    var Huallaga = document.getElementsByClassName("p_hualla");
    var Lamas = document.getElementsByClassName("p_lama");
    var MariscalCaceres = document.getElementsByClassName("p_mc");
    var Picota = document.getElementsByClassName("p_pico");
    var Rioja = document.getElementsByClassName("p_rioja");
    var SanMartin = document.getElementsByClassName("p_sanm");
    var Tocache = document.getElementsByClassName("p_toca");

    var Tacna = document.getElementsByClassName("p_tacna");
    var Tarata = document.getElementsByClassName("p_tarata");
    var Candarave = document.getElementsByClassName("p_canda");
    var JorgeBasadre = document.getElementsByClassName("p_jorgeb");

    var Tumbes = document.getElementsByClassName("p_tumb");
    var ContralmiranteVillar = document.getElementsByClassName("p_contra");
    var Zarumilla = document.getElementsByClassName("p_zaru");

    var CoronelPortillo = document.getElementsByClassName("p_corop");
    var Atalaya = document.getElementsByClassName("p_atala");
    var PadreAbad = document.getElementsByClassName("p_abad");
    var Purus = document.getElementsByClassName("p_purus");

    switch (s_prov) {

        case "0":

            break;
        case "Chachapoyas":
            d.innerHTML = '<option class="p_chac" >Chachapoyas</option> <option class="p_chac">Asunción</option> <option class="p_chac">Balsas</option> <option class="p_chac">Cheto</option> <option class="p_chac">Chiliquín</option> <option class="p_chac">Chuquibamba</option> <option class="p_chac">Granada</option> <option class="p_chac">Huancas</option> <option class="p_chac">La Jalca</option> <option class="p_chac">Leimebamba</option> <option class="p_chac">Levanto</option> <option class="p_chac">Magdalena</option> <option class="p_chac">Mariscal Castilla</option> <option class="p_chac">Molinopampa</option> <option class="p_chac">Montevideo</option> <option class="p_chac">Olleros</option> <option class="p_chac">Quinjalca</option> <option class="p_chac">San Francisco de Daguas</option> <option class="p_chac">San Isidro de Maino</option> <option class="p_chac">Soloco</option> <option class="p_chac">Sonche</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Chachapoyas) {
                item.style.display = "block";
            }
            d.selectedIndex = Chachapoyas[0].index;
            break;
        case "Bagua":
            d.innerHTML = '<option class="p_bagu">Bagua</option> <option class="p_bagu">Aramango</option> <option class="p_bagu">Copallín</option> <option class="p_bagu">El Parco</option> <option class="p_bagu">Imaza</option> <option class="p_bagu">La Peca</option> <option class="p_bagu">Bagua</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Bagua) {
                item.style.display = "block";
            }
            d.selectedIndex = Bagua[0].index;
            break;
        case "Bongara":
            d.innerHTML = '<option class="p_bong">Jumbilla</option> <option class="p_bong">Chisquilla</option> <option class="p_bong">Churuja</option> <option class="p_bong">Corosha</option> <option class="p_bong">Cuispes</option> <option class="p_bong">Florida</option> <option class="p_bong">Jazán</option> <option class="p_bong">Recta</option> <option class="p_bong">San Carlos</option> <option class="p_bong">Shipasbamba</option> <option class="p_bong">Valera</option> <option class="p_bong">Yambrasbamba</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Bongara) {
                item.style.display = "block";
            }
            d.selectedIndex = Bongara[0].index;
            break;
        case "Condorcanqui":
            d.innerHTML = ' <option class="p_cond">Nieva</option> <option class="p_cond">El Cenepa</option> <option class="p_cond">Río Santiago</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Condorcanqui) {
                item.style.display = "block";
            }
            d.selectedIndex = Condorcanqui[0].index;
            break;
        case "Luya":
            d.innerHTML = '<option class="p_luya">Lámud</option> <option class="p_luya">Camporredondo</option> <option class="p_luya">Cocabamba</option> <option class="p_luya">Colcamar</option> <option class="p_luya">Conila</option> <option class="p_luya">Inguilpata</option> <option class="p_luya">Longuita</option> <option class="p_luya">Lonya Chico</option> <option class="p_luya">Luya</option> <option class="p_luya">Luya Viejo</option> <option class="p_luya">María</option> <option class="p_luya">Ocalli</option> <option class="p_luya">Ocumal</option> <option class="p_luya">Pisuquía</option> <option class="p_luya">Providencia</option> <option class="p_luya">San Cristóbal</option> <option class="p_luya">San Francisco del Yeso</option> <option class="p_luya">San Jerónimo</option> <option class="p_luya">San Juan de Lopecancha</option> <option class="p_luya">Santa Catalina</option> <option class="p_luya">Santo Tomás</option> <option class="p_luya">Tingo</option> <option class="p_luya">Trita</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Luya) {
                item.style.display = "block";
            }
            d.selectedIndex = Luya[0].index;
            break;
        case "Rodríguez de Mendoza":
            d.innerHTML = '<option class="p_rodr">San Nicolás</option> <option class="p_rodr">Chirimoto</option> <option class="p_rodr">Cochamal</option> <option class="p_rodr">Huambo</option> <option class="p_rodr">Limabamba</option> <option class="p_rodr">Longar</option> <option class="p_rodr">Mariscal Benavides</option> <option class="p_rodr">Mílpuc</option> <option class="p_rodr">Omia</option> <option class="p_rodr">Santa Rosa</option> <option class="p_rodr">Totora</option> <option class="p_rodr">Vista Alegre</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of RodriguezdeMendoza) {
                item.style.display = "block";
            }
            d.selectedIndex = RodriguezdeMendoza[0].index;

            break;
        case "Utcubamba":
            d.innerHTML = '<option class="p_utcu">Bagua Grande</option> <option class="p_utcu">Cajaruro</option> <option class="p_utcu">Cumba</option> <option class="p_utcu">El Milagro</option> <option class="p_utcu">Jamalca</option> <option class="p_utcu">Lonya Grande</option> <option class="p_utcu">Yamón</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Utcubamba) {
                item.style.display = "block";
            }
            d.selectedIndex = Utcubamba[0].index;

            break;
        case "Huaraz":
            d.innerHTML = '<option class="p_huaraz">Huaraz</option> <option class="p_huaraz">Cochabamba</option> <option class="p_huaraz">Colcabamba</option> <option class="p_huaraz">Huanchay</option> <option class="p_huaraz">Independencia</option> <option class="p_huaraz">Jangas</option> <option class="p_huaraz">La Libertad</option> <option class="p_huaraz">Olleros</option> <option class="p_huaraz">Pampas Grande</option> <option class="p_huaraz">Pariacoto</option> <option class="p_huaraz">Pira</option> <option class="p_huaraz">Tarica</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huaraz) {
                item.style.display = "block";
            }
            d.selectedIndex = Huaraz[0].index;

            break;
        case "Aija":
            d.innerHTML = '<option class="p_aija">Aija</option> <option class="p_aija">Coris</option> <option class="p_aija">Huacllán</option> <option class="p_aija">La Merced</option> <option class="p_aija">Succha</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Aija) {
                item.style.display = "block";
            }
            d.selectedIndex = Aija[0].index;

            break;
        case "Antonio Raimondi":
            d.innerHTML = '<option class="p_anto">Llamellín</option> <option class="p_anto">Aczo</option> <option class="p_anto">Chaccho</option> <option class="p_anto">Chingas</option> <option class="p_anto">Mirgas</option> <option class="p_anto">San Juan de Rontoy</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of AntonioRaimondi) {
                item.style.display = "block";
            }
            d.selectedIndex = AntonioRaimondi[0].index;

            break;
        case "Asunción":
            d.innerHTML = '<option class="p_asun">Chacas</option> <option class="p_asun">Acochaca</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Asunción) {
                item.style.display = "block";
            }
            d.selectedIndex = Asunción[0].index;

            break;
        case "Bolognesi":
            d.innerHTML = '<option class="p_bolo">Chiquián</option> <option class="p_bolo">Abelardo Pardo</option> <option class="p_bolo">Antonio Raimondi</option> <option class="p_bolo">Aquia</option> <option class="p_bolo">Cajacay</option> <option class="p_bolo">Canis</option> <option class="p_bolo">Cólquioc</option> <option class="p_bolo">Huallanca</option> <option class="p_bolo">Huasta</option> <option class="p_bolo">Huayllacayán</option> <option class="p_bolo">La Primavera</option> <option class="p_bolo">Mangas</option> <option class="p_bolo">Pacllón</option> <option class="p_bolo">San Miguel de Corpanqui</option> <option class="p_bolo">Ticllos</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Bolognesi) {
                item.style.display = "block";
            }
            d.selectedIndex = Bolognesi[0].index;

            break;
        case "Carhuaz":
            d.innerHTML = '<option class="p_carh">Carhuaz</option> <option class="p_carh">Acopampa</option> <option class="p_carh">Amashca</option> <option class="p_carh">Anta</option> <option class="p_carh">Ataquero</option> <option class="p_carh">Marcará</option> <option class="p_carh">Pariahuanca</option> <option class="p_carh">San Miguel de Aco</option> <option class="p_carh">Shilla</option> <option class="p_carh">Tinco</option> <option class="p_carh">Yungar</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Carhuaz) {
                item.style.display = "block";
            }
            d.selectedIndex = Carhuaz[0].index;
            break;
        case "Carlos Fermín Fitzacarrald":
            d.innerHTML = '<option class="p_carl">San Luis</option> <option class="p_carl">San Nicolás</option> <option class="p_carl">Yauya</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of CarlosFermin) {
                item.style.display = "block";
            }
            d.selectedIndex = CarlosFermin[0].index;
            break;
        case "Casma":
            d.innerHTML = '<option class="p_casm">Casma</option> <option class="p_casm">Buenavista Alta</option> <option class="p_casm">Comandante Noel</option> <option class="p_casm">Yaután</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Casma) {
                item.style.display = "block";
            }
            d.selectedIndex = Casma[0].index;
            break;
        case "Corongo":
            d.innerHTML = '<option class="p_coro">Corongo</option> <option class="p_coro">Bambas</option> <option class="p_coro">Cusca</option> <option class="p_coro">La Pampa</option> <option class="p_coro">Yánac</option> <option class="p_coro">Aco</option> <option class="p_coro">Yupán</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Corongo) {
                item.style.display = "block";
            }
            d.selectedIndex = Corongo[0].index;
            break;
        case "Huari":
            d.innerHTML = '<option class="p_huar">Huari</option> <option class="p_huar">Anra</option> <option class="p_huar">Cajay</option> <option class="p_huar">Chavín de Huántar</option> <option class="p_huar">Huacachi</option> <option class="p_huar">Huacchis</option> <option class="p_huar">Huachis</option> <option class="p_huar">Huántar</option> <option class="p_huar">Masin</option> <option class="p_huar">Paucas</option> <option class="p_huar">Pontó</option> <option class="p_huar">Rahuapampa</option> <option class="p_huar">Rapayán</option> <option class="p_huar">San Marcos</option> <option class="p_huar">San Pedro de Chaná</option> <option class="p_huar">Uco</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huari) {
                item.style.display = "block";
            }
            d.selectedIndex = Huari[0].index;
            break;
        case "Huarmey":
            d.innerHTML = '<option class="p_huarm">Huarmey</option> <option class="p_huarm">Cochapeti</option> <option class="p_huarm">Culebras</option> <option class="p_huarm">Huayan</option> <option class="p_huarm">Malvas</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huarmey) {
                item.style.display = "block";
            }
            d.selectedIndex = Huarmey[0].index;
            break;
        case "Huaylas":
            d.innerHTML = '<option class="p_huay">Caraz</option> <option class="p_huay">Huallanca</option> <option class="p_huay">Huata</option> <option class="p_huay">Huaylas</option> <option class="p_huay">Mato</option> <option class="p_huay">Pamparomás</option> <option class="p_huay">Pueblo Libre</option> <option class="p_huay">Santa Cruz</option> <option class="p_huay">Santo Toribio</option> <option class="p_huay">Yuracmarca</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huaylas) {
                item.style.display = "block";
            }
            d.selectedIndex = Huaylas[0].index;
            break;
        case "Mariscal Luzuriaga":
            d.innerHTML = '<option class="p_mari">Piscobamba</option> <option class="p_mari">Casca</option> <option class="p_mari">Eleazer Guzmán Barrón</option> <option class="p_mari">Fidel Olivas Escudero</option> <option class="p_mari">Llama</option> <option class="p_mari">Llumpa</option> <option class="p_mari">Llucma</option> <option class="p_mari">Musga</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of MariscalLuzuriaga) {
                item.style.display = "block";
            }
            d.selectedIndex = MariscalLuzuriaga[0].index;
            break;
        case "Ocros":
            d.innerHTML = '<option class="p_ocro">Ocros</option> <option class="p_ocro">Acas</option> <option class="p_ocro">Cajamarquilla</option> <option class="p_ocro">Carhuapampa</option> <option class="p_ocro">Cochas</option> <option class="p_ocro">Congas</option> <option class="p_ocro">Llipa</option> <option class="p_ocro">San Cristóbal de Raján</option> <option class="p_ocro">San Pedro</option> <option class="p_ocro">Santiago de Chilcas</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Ocros) {
                item.style.display = "block";
            }
            d.selectedIndex = Ocros[0].index;
            break;
        case "Pallasca":
            d.innerHTML = '<option class="p_pall">Cabana</option> <option class="p_pall">Bolognesi</option> <option class="p_pall">Conchucos</option> <option class="p_pall">Huacaschuque</option> <option class="p_pall">Huandova</option> <option class="p_pall">Lacabamba</option> <option class="p_pall">Llapo</option> <option class="p_pall">Pallasca</option> <option class="p_pall">Pampas</option> <option class="p_pall">Santa Rosa</option> <option class="p_pall">Tauca</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Pallasca) {
                item.style.display = "block";
            }
            d.selectedIndex = Pallasca[0].index;
            break;
        case "Pomabamba":
            d.innerHTML = '<option class="p_poma">Pomabamba</option> <option class="p_poma">Huayllán</option> <option class="p_poma">Parobamba</option> <option class="p_poma">Quinuabamba</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Pomabamba) {
                item.style.display = "block";
            }
            d.selectedIndex = Pomabamba[0].index;
            break;
        case "Recuay":
            d.innerHTML = '<option class="p_recu">Recuay</option> <option class="p_recu">Cátac</option> <option class="p_recu">Cotaparaco</option> <option class="p_recu">Huayllapampa</option> <option class="p_recu">Llacllín</option> <option class="p_recu">Marca</option> <option class="p_recu">Pampas Chico</option> <option class="p_recu">Pararín</option> <option class="p_recu">Tapacocha</option> <option class="p_recu">Ticapampa</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Recuay) {
                item.style.display = "block";
            }
            d.selectedIndex = Recuay[0].index;
            break;
        case "Santa":
            d.innerHTML = '<option class="p_sant">Chimbote</option> <option class="p_sant">Cáceres del Perú</option> <option class="p_sant">Coishco</option> <option class="p_sant">Macate</option> <option class="p_sant">Moro</option> <option class="p_sant">Nepeña</option> <option class="p_sant">Samaco</option> <option class="p_sant">Santa</option> <option class="p_sant">Nuevo Chimbote</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Santa) {
                item.style.display = "block";
            }
            d.selectedIndex = Santa[0].index;
            break;
        case "Sihuas":
            d.innerHTML = '<option class="p_sihu">Sihuas</option> <option class="p_sihu">Acobamba</option> <option class="p_sihu">Alfonso Ugarte</option> <option class="p_sihu">Cashapampa</option> <option class="p_sihu">Chingalpo</option> <option class="p_sihu">Huayllabamba</option> <option class="p_sihu">Quiches</option> <option class="p_sihu">Ragash</option> <option class="p_sihu">San Juan</option> <option class="p_sihu">Sicsibamba</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Sihuas) {
                item.style.display = "block";
            }
            d.selectedIndex = Sihuas[0].index;
            break;
        case "Yungay":
            d.innerHTML = '<option class="p_yung">Yungay</option> <option class="p_yung">Cascapara</option> <option class="p_yung">Mancos</option> <option class="p_yung">Matacoto</option> <option class="p_yung">Quillo</option> <option class="p_yung">Ranrahirca</option> <option class="p_yung">Shupluy</option> <option class="p_yung">Yanama</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Yungay) {
                item.style.display = "block";
            }
            d.selectedIndex = Yungay[0].index;
            break;
        case "Abancay":
            d.innerHTML = '<option class="p_aban">Abancay</option> <option class="p_aban">Chacoche</option> <option class="p_aban">Circa</option> <option class="p_aban">Curahuasi</option> <option class="p_aban">Huanipaca</option> <option class="p_aban">Lambrama</option> <option class="p_aban">Pichirhua</option> <option class="p_aban">San Pedro de Cachora</option> <option class="p_aban">Tamburco</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Abancay) {
                item.style.display = "block";
            }
            d.selectedIndex = Abancay[0].index;
            break;
        case "Andahuaylas":
            d.innerHTML = '<option class="p_anda">Andahuaylas</option> <option class="p_anda">Andarapa</option> <option class="p_anda">Chiara</option> <option class="p_anda">Huancarama</option> <option class="p_anda">Huancaray</option> <option class="p_anda">Huayana</option> <option class="p_anda">Kishuara</option> <option class="p_anda">Pacobamba</option> <option class="p_anda">Pacucha</option> <option class="p_anda">Pampachiri</option> <option class="p_anda">Pomacocha</option> <option class="p_anda">San Antonio de Cachi</option> <option class="p_anda">San Jerónimo</option> <option class="p_anda">San Miguel de Chaccrapampa</option> <option class="p_anda">Santa María de Chicmo</option> <option class="p_anda">Talavera de la Reyna</option> <option class="p_anda">Tumay Huaraca</option> <option class="p_anda">Turpo</option> <option class="p_anda">Kaquiabamba</option> <option class="p_anda">Jose María Arguedas</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Andahuaylas) {
                item.style.display = "block";
            }
            d.selectedIndex = Andahuaylas[0].index;
            break;
        case "Antabamba":
            d.innerHTML = '<option class="p_antab">Antabamba</option> <option class="p_antab">El oro</option> <option class="p_antab">Huaquirca</option> <option class="p_antab">Juan Espinoza Medrano</option> <option class="p_antab">Oropesa</option> <option class="p_antab">Pachaconas</option> <option class="p_antab">Sabaino</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Antabamba) {
                item.style.display = "block";
            }
            d.selectedIndex = Antabamba[0].index;
            break;
        case "Aymaraes":
            d.innerHTML = '<option class="p_ayma">Chalhuanca</option> <option class="p_ayma">Capaya</option> <option class="p_ayma">Caraybamba</option> <option class="p_ayma">Chapimarca</option> <option class="p_ayma">Colcabamba</option> <option class="p_ayma">Cotaruse</option> <option class="p_ayma">Ihuayllo</option> <option class="p_ayma">Justo apu Sahuaraura</option> <option class="p_ayma">Lucre</option> <option class="p_ayma">Pocohuanca</option> <option class="p_ayma">San Juan de chacña</option> <option class="p_ayma">Sañayca</option> <option class="p_ayma">Soraya</option> <option class="p_ayma">Tapairihua</option> <option class="p_ayma">Tintay</option> <option class="p_ayma">Toraya</option> <option class="p_ayma">Yanaca</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Aymaraes) {
                item.style.display = "block";
            }
            d.selectedIndex = Aymaraes[0].index;
            break;
        case "Cotabambas":
            d.innerHTML = '<option class="p_cota">Tambobamba</option>  <option class="p_cota">Cotabambas</option>  <option class="p_cota">Coyllurqui</option>     <option class="p_cota">Haquira</option>  <option class="p_cota">Mara</option> <option class="p_cota">Challhuahuacho</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Cotabambas) {
                item.style.display = "block";
            }
            d.selectedIndex = Cotabambas[0].index;
            break;
        case "Chincheros":
            d.innerHTML = '<option class="p_chinc">Chincheros</option>  <option class="p_chinc">Anco Huallo</option>  <option class="p_chinc">Cocharcas</option>  <option class="p_chinc">Huaccana</option>  <option class="p_chinc">Ocobamba</option>  <option class="p_chinc">Ongoy</option>  <option class="p_chinc">Uranmarca</option>  <option class="p_chinc">Ranracancha</option>  <option class="p_chinc">Rocchacc</option>  <option class="p_chinc">El porvenir</option>  <option class="p_chinc">Los chankas</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Chincheros) {
                item.style.display = "block";
            }
            d.selectedIndex = Chincheros[0].index;
            break;
        case "Grau":
            d.innerHTML = '<option class="p_grau">Chuquibambilla</option> <option class="p_grau">Curpahuasi</option>  <option class="p_grau">Gamarra</option>  <option class="p_grau">Huayllati</option>  <option class="p_grau">Mamara</option>  <option class="p_grau">Micaela Bastidas</option>  <option class="p_grau">Pataypampa</option>  <option class="p_grau">Progreso</option>  <option class="p_grau">San Antonio</option>  <option class="p_grau">Santa Rosa</option>  <option class="p_grau">Turpay</option>  <option class="p_grau">Vilcabamba</option>  <option class="p_grau">Virundo</option>  <option class="p_grau">Curasco</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Grau) {
                item.style.display = "block";
            }
            d.selectedIndex = Grau[0].index;
            break;
        case "Arequipa":
            d.innerHTML = '<option class="p_areq">Arequipa</option>  <option class="p_areq">Alto selva alegre</option>  <option class="p_areq">Cayma</option>  <option class="p_areq">Cerro colorado</option>  <option class="p_areq">Characato</option>  <option class="p_areq">Chiguata</option>  <option class="p_areq">Jacobo hunter</option>  <option class="p_areq">La joya</option>  <option class="p_areq">Mariano melgar</option>  <option class="p_areq">Miraflores</option>  <option class="p_areq">Mollebaya</option>  <option class="p_areq">Paucarpata</option>  <option class="p_areq">Pocsi</option>  <option class="p_areq">Polobaya</option>  <option class="p_areq">Quequeña</option>  <option class="p_areq">Sabandia</option>  <option class="p_areq">Sachaca</option>  <option class="p_areq">San juan de siguas</option>  <option class="p_areq">San juan de tarucani</option>  <option class="p_areq">Santa Isabel de Siguas</option>  <option class="p_areq">Santa Rita de Siguas</option>  <option class="p_areq">Socabaya</option>  <option class="p_areq">Tiabaya</option>  <option class="p_areq">Uchumayo</option>  <option class="p_areq">Vitor</option>  <option class="p_areq">Yanahuara</option>  <option class="p_areq">Yarabamba</option>  <option class="p_areq">Yura</option>  <option class="p_areq">Jose luis bustamante y rivero</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Arequipa) {
                item.style.display = "block";
            }
            d.selectedIndex = Arequipa[0].index;
            break;
        case "Camaná":
            d.innerHTML = '<option class="p_cama">Camaná</option>  <option class="p_cama">Jose maria quimper</option>  <option class="p_cama">Mariano nicolas valcarcel</option>  <option class="p_cama">Mariscal cáceres</option>  <option class="p_cama">Nicolas de pierola</option>  <option class="p_cama">Ocoña</option>  <option class="p_cama">Quilca</option>  <option class="p_cama">Samuel pastor</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Camana) {
                item.style.display = "block";
            }
            d.selectedIndex = Camana[0].index;
            break;
        case "Caraveli":
            d.innerHTML = '<option class="p_cara">Caravelí</option>  <option class="p_cara">Acari</option>  <option class="p_cara">Atico</option>  <option class="p_cara">Atiquipa</option>  <option class="p_cara">Bella unión</option>  <option class="p_cara">Cahuacho</option>  <option class="p_cara">Chala</option>  <option class="p_cara">Chaparra</option>  <option class="p_cara">Huanuhuanu</option>  <option class="p_cara">Jaqui</option>  <option class="p_cara">Lomas</option>  <option class="p_cara">Quicacha</option>  <option class="p_cara">Yauca</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Caraveli) {
                item.style.display = "block";
            }
            d.selectedIndex = Caraveli[0].index;
            break;
        case "Castilla":
            d.innerHTML = '<option class="p_cast">Aplao</option>  <option class="p_cast">Andagua</option>  <option class="p_cast">Ayo</option>  <option class="p_cast">Chachas</option>  <option class="p_cast">Chilcaymarca</option>  <option class="p_cast">Choco</option>  <option class="p_cast">Huancarqui</option>  <option class="p_cast">Machaguay</option>  <option class="p_cast">Orcopampa</option>  <option class="p_cast">Pampacolca</option>  <option class="p_cast">Tipan</option>  <option class="p_cast">Uñon</option>  <option class="p_cast">Uraca</option>  <option class="p_cast">Viraco</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Castilla) {
                item.style.display = "block";
            }
            d.selectedIndex = Castilla[0].index;
            break;
        case "Caylloma":
            d.innerHTML = '<option class="p_cayl">Chivay</option>  <option class="p_cayl">Achoma</option>  <option class="p_cayl">Cabanaconde</option>  <option class="p_cayl">Callalli</option>  <option class="p_cayl">Caylloma</option>  <option class="p_cayl">Coporaque</option>  <option class="p_cayl">Huambo</option>  <option class="p_cayl">Huanca</option>  <option class="p_cayl">Ichupampa</option>  <option class="p_cayl">Lari</option>  <option class="p_cayl">Lluta</option>  <option class="p_cayl">Maca</option>  <option class="p_cayl">Madrigal</option>  <option class="p_cayl">San Antonio de chuca</option>  <option class="p_cayl">Sibayo</option>  <option class="p_cayl">Tapay</option>  <option class="p_cayl">Tisco</option>  <option class="p_cayl">Tuti</option>  <option class="p_cayl">Yanque</option>  <option class="p_cayl">Majes</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Caylloma) {
                item.style.display = "block";
            }
            d.selectedIndex = Caylloma[0].index;
            break;
        case "Condesuyos":
            d.innerHTML = '<option class="p_cond">Chuquibamba</option>  <option class="p_cond">Andaray</option>  <option class="p_cond">Cayarani</option>  <option class="p_cond">Chichas</option>  <option class="p_cond">Iray</option>  <option class="p_cond">Rio grande</option>  <option class="p_cond">Salamanca</option>  <option class="p_cond">Yanaquihua</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Condesuyos) {
                item.style.display = "block";
            }
            d.selectedIndex = Condesuyos[0].index;
            break;
        case "Islay":
            d.innerHTML = '<option class="p_isla">Mollendo</option> <option class="p_isla">Cocachacra</option> <option class="p_isla">Dean valdivia</option> <option class="p_isla">Islay</option> <option class="p_isla">Mejia</option> <option class="p_isla">Punta de bombón</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Islay) {
                item.style.display = "block";
            }
            d.selectedIndex = Islay[0].index;
            break;
        case "La Unión":
            d.innerHTML = '<option class="p_laun">Cotahuasi</option> <option class="p_laun">Alca</option> <option class="p_laun">Charcana</option> <option class="p_laun">Huaynacotas</option> <option class="p_laun">Pampamarca</option> <option class="p_laun">Puyca</option> <option class="p_laun">Quechualla</option> <option class="p_laun">Sayla</option> <option class="p_laun">Tauria</option> <option class="p_laun">Tomepampa</option> <option class="p_laun">Toro</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of LaUnion) {
                item.style.display = "block";
            }
            d.selectedIndex = LaUnion[0].index;
            break;
        case "Huamanga":
            d.innerHTML = '<option class="p_huam">Ayacucho</option> <option class="p_huam">Acocro</option> <option class="p_huam">Acos vinchos</option> <option class="p_huam">Carmen alto</option> <option class="p_huam">Chiara</option> <option class="p_huam">Ocros</option> <option class="p_huam">Pacaycasa</option> <option class="p_huam">Quinua</option> <option class="p_huam">San jose de ticllas</option> <option class="p_huam">San juan bautista</option> <option class="p_huam">Santiago de pischa</option> <option class="p_huam">Socos</option> <option class="p_huam">Tambillo</option> <option class="p_huam">Vinchos</option> <option class="p_huam">Jesús nazareno</option> <option class="p_huam">Andres avelino caceres dorregaray</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huamanga) {
                item.style.display = "block";
            }
            d.selectedIndex = Huamanga[0].index;
            break;
        case "Cangallo":
            d.innerHTML = '<option class="p_cang">Cangallo</option> <option class="p_cang">Chuschi</option> <option class="p_cang">Los morochucos</option> <option class="p_cang">Maria parado de bellido</option> <option class="p_cang">Paras</option> <option class="p_cang">Totos</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Cangallo) {
                item.style.display = "block";
            }
            d.selectedIndex = Cangallo[0].index;
            break;
        case "Huanca Sancos":
            d.innerHTML = '<option class="p_huas">Sancos</option> <option class="p_huas">Carapo</option> <option class="p_huas">Sacsamarca</option> <option class="p_huas">Santiago de lucanamarca</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of HuancaSancos) {
                item.style.display = "block";
            }
            d.selectedIndex = HuancaSancos[0].index;
            break;
        case "Huanta":
            d.innerHTML = '<option class="p_huanta">Huanta</option> <option class="p_huanta">Ayahuanco</option> <option class="p_huanta">Huamanguilla</option> <option class="p_huanta">Iguain</option> <option class="p_huanta">Luricocha</option> <option class="p_huanta">Santillana</option> <option class="p_huanta">Sivia</option> <option class="p_huanta">Llochegua</option> <option class="p_huanta">Canayre</option> <option class="p_huanta">Uchuraccay</option> <option class="p_huanta">Pucacolpa</option> <option class="p_huanta">Chaca</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huanta) {
                item.style.display = "block";
            }
            d.selectedIndex = Huanta[0].index;
            break;
        case "La Mar":
            d.innerHTML = '<option class="p_lamar">San Miguel</option> <option class="p_lamar">Anco</option> <option class="p_lamar">Ayna</option> <option class="p_lamar">Chilcas</option> <option class="p_lamar">Chungui</option> <option class="p_lamar">Luis carranza</option> <option class="p_lamar">Santa rosa</option> <option class="p_lamar">Tambo</option> <option class="p_lamar">Samugari</option> <option class="p_lamar">Anchihuay</option> <option class="p_lamar">Oronccoy</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of LaMar) {
                item.style.display = "block";
            }
            d.selectedIndex = LaMar[0].index;
            break;
        case "Lucanas":
            d.innerHTML = '<option class="p_luca">Puquio</option> <option class="p_luca">Aucara</option> <option class="p_luca">Cabana</option> <option class="p_luca">Carmen Salcedo</option> <option class="p_luca">Chaviña</option> <option class="p_luca">Chipao</option> <option class="p_luca">Huac-huas</option> <option class="p_luca">Laramate</option> <option class="p_luca">Leoncio Prado</option> <option class="p_luca">Llauta</option> <option class="p_luca">Lucanas</option> <option class="p_luca">Ocaña</option> <option class="p_luca">Otoca</option> <option class="p_luca">Saisa</option> <option class="p_luca">San Cristóbal</option> <option class="p_luca">San Juan</option> <option class="p_luca">San Pedro</option> <option class="p_luca">San Pedro de Palco</option> <option class="p_luca">Sancos</option> <option class="p_luca">Santa Ana de Huaycahuacho</option> <option class="p_luca">Santa Lucía</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Lucanas) {
                item.style.display = "block";
            }
            d.selectedIndex = Lucanas[0].index;
            break;
        case "Parinacochas":
            d.innerHTML = '<option class="p_pari">Coracora</option> <option class="p_pari">Chumpi</option> <option class="p_pari">Coronel castañeda</option> <option class="p_pari">Pacapausa</option> <option class="p_pari">Pullo</option> <option class="p_pari">Puyusca</option> <option class="p_pari">San francisco de ravacayco</option> <option class="p_pari">Upahuacho</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Parinacochas) {
                item.style.display = "block";
            }
            d.selectedIndex = Parinacochas[0].index;
            break;
        case "Páucar del Sara Sara":
            d.innerHTML = '<option class="p_pauc">Pausa</option> <option class="p_pauc">Colta</option> <option class="p_pauc">Corculla</option> <option class="p_pauc">Lampa</option> <option class="p_pauc">Marcabamba</option> <option class="p_pauc">Oyolo</option> <option class="p_pauc">Pararca</option> <option class="p_pauc">San javier de alpabamba</option> <option class="p_pauc">San jose de ushua</option> <option class="p_pauc">Sara sara</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of PaucardelSaraSara) {
                item.style.display = "block";
            }
            d.selectedIndex = PaucardelSaraSara[0].index;
            break;
        case "Sucre":
            d.innerHTML = '<option class="p_sucr">Querobamba</option> <option class="p_sucr">Belen</option> <option class="p_sucr">Chalcos</option> <option class="p_sucr">Chilcayoc</option> <option class="p_sucr">Huacaña</option> <option class="p_sucr">Morcolla</option> <option class="p_sucr">Paico</option> <option class="p_sucr">San pedro de larcay</option> <option class="p_sucr">San salvador de quije</option> <option class="p_sucr">Santiago de paucaray</option> <option class="p_sucr">Soras</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Sucre) {
                item.style.display = "block";
            }
            d.selectedIndex = Sucre[0].index;
            break;
        case "Víctor Fajardo":
            d.innerHTML = '<option class="p_vict">Huancapi</option> <option class="p_vict">Alcamenca</option> <option class="p_vict">Apongo</option> <option class="p_vict">Asquipata</option> <option class="p_vict">Canaria</option> <option class="p_vict">Cayara</option> <option class="p_vict">Colca</option> <option class="p_vict">Huamanquiquia</option> <option class="p_vict">Huancaraylla</option> <option class="p_vict">Huaya</option> <option class="p_vict">Sarhua</option> <option class="p_vict">Vilcanchos</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of VictorFajardo) {
                item.style.display = "block";
            }
            d.selectedIndex = VictorFajardo[0].index;
            break;
        case "Vilcahuamán":
            d.innerHTML = '<option class="p_vilc">Vilcashuamán</option> <option class="p_vilc">Accomarca</option> <option class="p_vilc">Carhuanca</option> <option class="p_vilc">Concepción</option> <option class="p_vilc">Huambalpa</option> <option class="p_vilc">Independencia</option> <option class="p_vilc">Saurama</option> <option class="p_vilc">Vischongo</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Vilcahuaman) {
                item.style.display = "block";
            }
            d.selectedIndex = Vilcahuaman[0].index;
            break;
        case "Cajamarca":
            d.innerHTML = '<option class="p_cajam">Cajamarca</option> <option class="p_cajam">Asunción</option> <option class="p_cajam">Chetilla</option> <option class="p_cajam">Cospan</option> <option class="p_cajam">Encañada</option> <option class="p_cajam">Jesus</option> <option class="p_cajam">Llacanora</option> <option class="p_cajam">Los baños del inca</option> <option class="p_cajam">Magdalena</option> <option class="p_cajam">Matara</option> <option class="p_cajam">Namora</option> <option class="p_cajam">San juan</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Cajamarca) {
                item.style.display = "block";
            }
            d.selectedIndex = Cajamarca[0].index;
            break;
        case "Cajabamba":
            d.innerHTML = '<option class="p_cajab">Cajabamba</option> <option class="p_cajab">Cachachi</option> <option class="p_cajab">Condebamba</option> <option class="p_cajab">Sitacocha</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Cajabamba) {
                item.style.display = "block";
            }
            d.selectedIndex = Cajabamba[0].index;
            break;
        case "Celendín":
            d.innerHTML = '<option class="p_cele">Celendín</option> <option class="p_cele">Chumuch</option> <option class="p_cele">Cortegana</option> <option class="p_cele">Huasmin</option> <option class="p_cele">Jorge chavez</option> <option class="p_cele">Jose galvez</option> <option class="p_cele">Miguel iglesias</option> <option class="p_cele">Oxamarca</option> <option class="p_cele">Sorochuco</option> <option class="p_cele">Sucre</option> <option class="p_cele">Utco</option> <option class="p_cele">La Libertad de Pallán</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Celendin) {
                item.style.display = "block";
            }
            d.selectedIndex = Celendin[0].index;
            break;
        case "Chota":
            d.innerHTML = '<option class="p_chot">Chota</option> <option class="p_chot">Anguia</option> <option class="p_chot">Chadin</option> <option class="p_chot">Chiguirip</option> <option class="p_chot">Chimban</option> <option class="p_chot">Choropampa</option> <option class="p_chot">Cochabamba</option> <option class="p_chot">Conchan</option> <option class="p_chot">Huambos</option> <option class="p_chot">Lajas</option> <option class="p_chot">Llama</option> <option class="p_chot">Miracosta</option> <option class="p_chot">Paccha</option> <option class="p_chot">Pion</option> <option class="p_chot">Querocoto</option> <option class="p_chot">San juan de licupis</option> <option class="p_chot">Tacabamba</option> <option class="p_chot">Tocmoche</option> <option class="p_chot">Chalamarca</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Chota) {
                item.style.display = "block";
            }
            d.selectedIndex = Chota[0].index;
            break;
        case "Contumaza":
            d.innerHTML = '<option class="p_cont">Contumazá</option> <option class="p_cont">Chilete</option> <option class="p_cont">Cupisnique</option> <option class="p_cont">Guzmango</option> <option class="p_cont">San Benito</option> <option class="p_cont">Santa Cruz de Toledo</option> <option class="p_cont">Tantarica</option> <option class="p_cont">Yonan</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Contumaza) {
                item.style.display = "block";
            }
            d.selectedIndex = Contumaza[0].index;
            break;
        case "Cutervo":
            d.innerHTML = '<option class="p_cute">Cutervo</option> <option class="p_cute">Callayuc</option> <option class="p_cute">Choros</option> <option class="p_cute">Cujillo</option> <option class="p_cute">La ramada</option> <option class="p_cute">Pimpingos</option> <option class="p_cute">Querocotillo</option> <option class="p_cute">San Andrés de Cutervo</option> <option class="p_cute">San Juan de Cutervo</option> <option class="p_cute">San luis de lucma</option> <option class="p_cute">Santa Cruz</option> <option class="p_cute">Santo domingo de la capilla</option> <option class="p_cute">Santo tomas</option> <option class="p_cute">Socota</option> <option class="p_cute">Toribio casanova</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Cutervo) {
                item.style.display = "block";
            }
            d.selectedIndex = Cutervo[0].index;
            break;
        case "Hualgayoc":
            d.innerHTML = '<option class="p_hual">Bambamarca</option> <option class="p_hual">Chugur</option> <option class="p_hual">Hualgayoc</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Hualgayoc) {
                item.style.display = "block";
            }
            d.selectedIndex = Hualgayoc[0].index;
            break;
        case "Jaén":
            d.innerHTML = '<option class="p_jaen">Jaén</option> <option class="p_jaen">Bellavista</option> <option class="p_jaen">Chontali</option> <option class="p_jaen">Colasay</option> <option class="p_jaen">Huabal</option> <option class="p_jaen">Las pirias</option> <option class="p_jaen">Pomahuaca</option> <option class="p_jaen">Pucara</option> <option class="p_jaen">Sallique</option> <option class="p_jaen">San felipe</option> <option class="p_jaen">San jose del alto</option> <option class="p_jaen">Santa Rosa</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Jaen) {
                item.style.display = "block";
            }
            d.selectedIndex = Jaen[0].index;
            break;
        case "San Ignacio":
            d.innerHTML = '<option class="p_sani">San Ignacio</option> <option class="p_sani">Chirinos</option> <option class="p_sani">Huarango</option> <option class="p_sani">La coipa</option> <option class="p_sani">Namballe</option> <option class="p_sani">San jose de lourdes</option> <option class="p_sani">Tabaconas</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of SanIgnacio) {
                item.style.display = "block";
            }
            d.selectedIndex = SanIgnacio[0].index;
            break;
        case "San Marcos":
            d.innerHTML = '<option class="p_sanm">Pedro Galvez</option> <option class="p_sanm">Chancay</option> <option class="p_sanm">Eduardo villanueva</option> <option class="p_sanm">Gregorio pita</option> <option class="p_sanm">Ichocan</option> <option class="p_sanm">Jose Manuel Quiroz</option> <option class="p_sanm">Jose Sabogal</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of SanMarcos) {
                item.style.display = "block";
            }
            d.selectedIndex = SanMarcos[0].index;
            break;
        case "San Miguel":
            d.innerHTML = '<option class="p_sanmi">San Miguel</option> <option class="p_sanmi">Bolívar</option> <option class="p_sanmi">Calquis</option> <option class="p_sanmi">Catilluc</option> <option class="p_sanmi">El Prado</option> <option class="p_sanmi">La Florida</option> <option class="p_sanmi">Llapa</option> <option class="p_sanmi">Nanchoc</option> <option class="p_sanmi">Niepos</option> <option class="p_sanmi">San gregorio</option> <option class="p_sanmi">San silvestre de cochan</option> <option class="p_sanmi">Tongod</option> <option class="p_sanmi">Union agua blanca</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of SanMiguel) {
                item.style.display = "block";
            }
            d.selectedIndex = SanMiguel[0].index;
            break;
        case "San Pablo":
            d.innerHTML = '<option class="p_sanpa">San Pablo</option> <option class="p_sanpa">San bernardino</option> <option class="p_sanpa">San luis</option> <option class="p_sanpa">Tumbaden</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of SanPablo) {
                item.style.display = "block";
            }
            d.selectedIndex = SanPablo[0].index;
            break;
        case "Santa Cruz":
            d.innerHTML = '<option class="p_sancr">Santa Cruz</option> <option class="p_sancr">Andabamba</option> <option class="p_sancr">Catache</option> <option class="p_sancr">Chancaybaños</option> <option class="p_sancr">La esperanza</option> <option class="p_sancr">Ninabamba</option> <option class="p_sancr">Pulan</option> <option class="p_sancr">Saucepampa</option> <option class="p_sancr">Sexi</option> <option class="p_sancr">Uticyacu</option> <option class="p_sancr">Yauyucan</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of SantaCruz) {
                item.style.display = "block";
            }
            d.selectedIndex = SantaCruz[0].index;
            break;
        case "Cuzco":
            d.innerHTML = '<option class="p_callao">Callao</option> <option class="p_callao">Bellavista</option> <option class="p_callao">Carmen de la legua reynoso</option> <option class="p_callao">La perla</option> <option class="p_callao">La punta</option> <option class="p_callao">Ventanilla</option> <option class="p_callao">Mi Perú</option> <option class="p_cusco">Cusco</option> <option class="p_cusco">Ccorca</option> <option class="p_cusco">Poroy</option> <option class="p_cusco">San jeronimo</option> <option class="p_cusco">San sebastian</option> <option class="p_cusco">Santiago</option> <option class="p_cusco">Saylla</option> <option class="p_cusco">Wanchaq</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Cuzco) {
                item.style.display = "block";
            }
            d.selectedIndex = Cuzco[0].index;
            break;
        case "Acomayo":
            d.innerHTML = '<option class="p_acom">Acomayo</option> <option class="p_acom">Acopia</option> <option class="p_acom">Acos</option> <option class="p_acom">Mosoc llacta</option> <option class="p_acom">Pomacanchi</option> <option class="p_acom">Rondocan</option> <option class="p_acom">Sangarara</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Acomayo) {
                item.style.display = "block";
            }
            d.selectedIndex = Acomayo[0].index;
            break;
        case "Anta":
            d.innerHTML = '<option class="p_anta">Anta</option> <option class="p_anta">Ancahuasi</option> <option class="p_anta">Cachimayo</option> <option class="p_anta">Chinchaypujio</option> <option class="p_anta">Huarocondo</option> <option class="p_anta">Limatambo</option> <option class="p_anta">Mollepata</option> <option class="p_anta">Pucyura</option> <option class="p_anta">Zurite</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Anta) {
                item.style.display = "block";
            }
            d.selectedIndex = Anta[0].index;
            break;
        case "Calca":
            d.innerHTML = '<option class="p_calc">Calca</option> <option class="p_calc">Coya</option> <option class="p_calc">Lamay</option> <option class="p_calc">Lares</option> <option class="p_calc">Pisac</option> <option class="p_calc">San salvador</option> <option class="p_calc">Taray</option> <option class="p_calc">Yanatile</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Calca) {
                item.style.display = "block";
            }
            d.selectedIndex = Calca[0].index;
            break;
        case "Canas":
            d.innerHTML = '<option class="p_cana">Yanaoca</option> <option class="p_cana">Checca</option> <option class="p_cana">Kunturkanki</option> <option class="p_cana">Langui</option> <option class="p_cana">Layo</option> <option class="p_cana">Pampamarca</option> <option class="p_cana">Quehue</option> <option class="p_cana">Tupac amaru</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Canas) {
                item.style.display = "block";
            }
            d.selectedIndex = Canas[0].index;
            break;
        case "Canchis":
            d.innerHTML = '<option class="p_canc">Sicuani</option> <option class="p_canc">Checacupe</option> <option class="p_canc">Combapata</option> <option class="p_canc">Marangani</option> <option class="p_canc">Pitumarca</option> <option class="p_canc">San Pablo</option> <option class="p_canc">San Pedro</option> <option class="p_canc">Tinta</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Canchis) {
                item.style.display = "block";
            }
            d.selectedIndex = Canchis[0].index;
            break;
        case "Chumbivilcas":
            d.innerHTML = '<option class="p_chum">Santo tomas</option> <option class="p_chum">Capacmarca</option> <option class="p_chum">Chamaca</option> <option class="p_chum">Colquemarca</option> <option class="p_chum">Livitaca</option> <option class="p_chum">Llusco</option> <option class="p_chum">Quiñota</option> <option class="p_chum">Velille</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Chumbivilcas) {
                item.style.display = "block";
            }
            d.selectedIndex = Chumbivilcas[0].index;
            break;
        case "Espinar":
            d.innerHTML = '<option class="p_espi">Espinar</option> <option class="p_espi">Condoroma</option> <option class="p_espi">Coporaque</option> <option class="p_espi">Ocoruro</option> <option class="p_espi">Pallpata</option> <option class="p_espi">Pichigua</option> <option class="p_espi">Suyckutambo</option> <option class="p_espi">Alto pichigua</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Espinar) {
                item.style.display = "block";
            }
            d.selectedIndex = Espinar[0].index;
            break;
        case "La Convención":
            d.innerHTML = '<option class="p_laconv">Santa Ana</option> <option class="p_laconv">Echarate</option> <option class="p_laconv">Huayopata</option> <option class="p_laconv">Maranura</option> <option class="p_laconv">Ocobamba</option> <option class="p_laconv">Quellouno</option> <option class="p_laconv">Kimbiri</option> <option class="p_laconv">Santa Teresa</option> <option class="p_laconv">Vilcabamba</option> <option class="p_laconv">Pichari</option> <option class="p_laconv">Inkawasi</option> <option class="p_laconv">Villa virgen</option> <option class="p_laconv">Villa kintiarina</option> <option class="p_laconv">Megantoni</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of LaConvencion) {
                item.style.display = "block";
            }
            d.selectedIndex = LaConvencion[0].index;
            break;
        case "Paruro":
            d.innerHTML = '<option class="p_paru">Paruro</option> <option class="p_paru">Accha</option> <option class="p_paru">Ccapi</option> <option class="p_paru">Colcha</option> <option class="p_paru">Huanoquite</option> <option class="p_paru">Omacha</option> <option class="p_paru">Paccaritambo</option> <option class="p_paru">Pillpinto</option> <option class="p_paru">Yaurisque</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Paruro) {
                item.style.display = "block";
            }
            d.selectedIndex = Paruro[0].index;
            break;
        case "Paucartambo":
            d.innerHTML = '<option class="p_paucart">Paucartambo</option> <option class="p_paucart">Caicay</option> <option class="p_paucart">Challabamba</option> <option class="p_paucart">Colquepata</option> <option class="p_paucart">Huancarani</option> <option class="p_paucart">Kosñipata</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Paucartambo) {
                item.style.display = "block";
            }
            d.selectedIndex = Paucartambo[0].index;
            break;
        case "Quispicanchi":
            d.innerHTML = '<option class="p_quispi">Urcos</option> <option class="p_quispi">Andahuaylillas</option> <option class="p_quispi">Camanti</option> <option class="p_quispi">Ccarhuayo</option> <option class="p_quispi">Ccatca</option> <option class="p_quispi">Cusipata</option> <option class="p_quispi">Huaro</option> <option class="p_quispi">Lucre</option> <option class="p_quispi">Marcapata</option> <option class="p_quispi">Ocongate</option> <option class="p_quispi">Oropesa</option> <option class="p_quispi">Quiquijana</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Quispicanchi) {
                item.style.display = "block";
            }
            d.selectedIndex = Quispicanchi[0].index;
            break;
        case "Urubamba":
            d.innerHTML = '<option class="p_urub">Urubamba</option> <option class="p_urub">Chinchero</option> <option class="p_urub">Huayllabamba</option> <option class="p_urub">Machupicchu</option> <option class="p_urub">Maras</option> <option class="p_urub">Ollantaytambo</option> <option class="p_urub">Yucay</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Urubamba) {
                item.style.display = "block";
            }
            d.selectedIndex = Urubamba[0].index;
            break;
        case "Huancavelica":
            d.innerHTML = '<option class="p_huancav">Huancavelica</option> <option class="p_huancav">Acobambilla</option> <option class="p_huancav">Acoria</option> <option class="p_huancav">Conayca</option> <option class="p_huancav">Cuenca</option> <option class="p_huancav">Huachocolpa</option> <option class="p_huancav">Huayllahuara</option> <option class="p_huancav">Izcuchaca</option> <option class="p_huancav">Laria</option> <option class="p_huancav">Manta</option> <option class="p_huancav">Mariscal Cáceres</option> <option class="p_huancav">Moya</option> <option class="p_huancav">Nuevo occoro</option> <option class="p_huancav">Palca</option> <option class="p_huancav">Pilchaca</option> <option class="p_huancav">Vilca</option> <option class="p_huancav">Yauli</option> <option class="p_huancav">Ascensión</option> <option class="p_huancav">Huando</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huancavelica) {
                item.style.display = "block";
            }
            d.selectedIndex = Huancavelica[0].index;
            break;
        case "Acobamba":
            d.innerHTML = '<option class="p_acob">Acobamba</option> <option class="p_acob">Andabamba</option> <option class="p_acob">Anta</option> <option class="p_acob">Caja</option> <option class="p_acob">Marcas</option> <option class="p_acob">Paucara</option> <option class="p_acob">Pomacocha</option> <option class="p_acob">Rosario</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Acobamba) {
                item.style.display = "block";
            }
            d.selectedIndex = Acobamba[0].index;
            break;
        case "Angaraes":
            d.innerHTML = '<option class="p_angar">Lircay</option> <option class="p_angar">Anchonga</option> <option class="p_angar">Callanmarca</option> <option class="p_angar">Ccochaccasa</option> <option class="p_angar">Chincho</option> <option class="p_angar">Congalla</option> <option class="p_angar">Huanca-huanca</option> <option class="p_angar">Huayllay grande</option> <option class="p_angar">Julcamarca</option> <option class="p_angar">San Antonio de antaparco</option> <option class="p_angar">Santo tomas de pata</option> <option class="p_angar">Secclla</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Angaraes) {
                item.style.display = "block";
            }
            d.selectedIndex = Angaraes[0].index;
            break;
        case "Castrovirreyna":
            d.innerHTML = '<option class="p_castro">Castrovirreyna</option> <option class="p_castro">Arma</option> <option class="p_castro">Aurahua</option> <option class="p_castro">Capillas</option> <option class="p_castro">Chupamarca</option> <option class="p_castro">Cocas</option> <option class="p_castro">Huachos</option> <option class="p_castro">Huamatambo</option> <option class="p_castro">Mollepampa</option> <option class="p_castro">San juan</option> <option class="p_castro">Santa Ana</option> <option class="p_castro">Tantara</option> <option class="p_castro">Ticrapo</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Castrovirreyna) {
                item.style.display = "block";
            }
            d.selectedIndex = Castrovirreyna[0].index;
            break;
        case "Churcampa":
            d.innerHTML = '<option class="p_chur">Churcampa</option> <option class="p_chur">Anco</option> <option class="p_chur">Chinchihuasi</option> <option class="p_chur">El carmen</option> <option class="p_chur">La merced</option> <option class="p_chur">Locroja</option> <option class="p_chur">Paucarbamba</option> <option class="p_chur">San Miguel de mayocc</option> <option class="p_chur">San Pedro de coris</option> <option class="p_chur">Pachamarca</option> <option class="p_chur">Cosme</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Churcampa) {
                item.style.display = "block";
            }
            d.selectedIndex = Churcampa[0].index;
            break;
        case "Huaytará":
            d.innerHTML = '<option class="p_huayt">Huaytará</option> <option class="p_huayt">Ayavi</option> <option class="p_huayt">Cordova</option> <option class="p_huayt">Huayacundo arma</option> <option class="p_huayt">Laramarca</option> <option class="p_huayt">Ocoyo</option> <option class="p_huayt">Pilpichaca</option> <option class="p_huayt">Querco</option> <option class="p_huayt">Quito-arma</option> <option class="p_huayt">San Antonio de cusicancha</option> <option class="p_huayt">San francisco de sangayaico</option> <option class="p_huayt">San isidro</option> <option class="p_huayt">Santiago de chocorvos</option> <option class="p_huayt">Santiago de quirahuara</option> <option class="p_huayt">Santo domingo e capillas</option> <option class="p_huayt">Tambo</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huaytara) {
                item.style.display = "block";
            }
            d.selectedIndex = Huaytara[0].index;
            break;
        case "Tayacaja":
            d.innerHTML = '<option class="p_taya">Pampas</option> <option class="p_taya">Acostambo</option> <option class="p_taya">Acraquia</option> <option class="p_taya">Ahuaycha</option> <option class="p_taya">Colcabamba</option> <option class="p_taya">Daniel hernandez</option> <option class="p_taya">Huachocolpa</option> <option class="p_taya">Ñahuimpuquio</option> <option class="p_taya">Pazos</option> <option class="p_taya">Quishuar</option> <option class="p_taya">Salcahuasi</option> <option class="p_taya">San Marcos de Rocchac</option> <option class="p_taya">Surcubamba</option> <option class="p_taya">Tintay puncu</option> <option class="p_taya">Quichuas</option> <option class="p_taya">Andaymarca</option> <option class="p_taya">Roble</option> <option class="p_taya">Pichos</option> <option class="p_taya">Santiago de tucuma</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Tayacaja) {
                item.style.display = "block";
            }
            d.selectedIndex = Tayacaja[0].index;
            break;
        case "Huánuco":
            d.innerHTML = '<option class="p_huanu">Huánuco</option> <option class="p_huanu">Amarilis</option> <option class="p_huanu">Chinchao</option> <option class="p_huanu">Churubamba</option> <option class="p_huanu">Margos</option> <option class="p_huanu">Quisqui</option> <option class="p_huanu">San francisco de Cayran</option> <option class="p_huanu">San pedro de chaulan</option> <option class="p_huanu">Santa María del Valle</option> <option class="p_huanu">Yarumayo</option> <option class="p_huanu">Pillco Marca</option> <option class="p_huanu">Yacus</option> <option class="p_huanu">San pablo de pillao</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huánuco) {
                item.style.display = "block";
            }
            d.selectedIndex = Huánuco[0].index;
            break;
        case "Ambo":
            d.innerHTML = '<option class="p_ambo">Ambo</option> <option class="p_ambo">Cayna</option> <option class="p_ambo">Colpas</option> <option class="p_ambo">Conchamarca</option> <option class="p_ambo">Huacar</option> <option class="p_ambo">San francisco</option> <option class="p_ambo">San rafael</option> <option class="p_ambo">Tomay kichwa</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Ambo) {
                item.style.display = "block";
            }
            d.selectedIndex = Ambo[0].index;
            break;
        case "Dos de Mayo":
            d.innerHTML = '<option class="p_dosd">La union</option> <option class="p_dosd">Chuquis</option> <option class="p_dosd">Marias</option> <option class="p_dosd">Pachas</option> <option class="p_dosd">Quivilla</option> <option class="p_dosd">Ripan</option> <option class="p_dosd">Shunqui</option> <option class="p_dosd">Sillapata</option> <option class="p_dosd">Yanas</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of DosdeMayo) {
                item.style.display = "block";
            }
            d.selectedIndex = DosdeMayo[0].index;
            break;
        case "Huacaybamba":
            d.innerHTML = '<option class="p_huacay">Huacaybamba</option> <option class="p_huacay">Canchabamba</option> <option class="p_huacay">Cochabamba</option> <option class="p_huacay">Pinra</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huacaybamba) {
                item.style.display = "block";
            }
            d.selectedIndex = Huacaybamba[0].index;
            break;
        case "Huamalíes":
            d.innerHTML = '<option class="p_huamal">Llata</option> <option class="p_huamal">Arancay</option> <option class="p_huamal">Chavin de pariarca</option> <option class="p_huamal">Jacas grande</option> <option class="p_huamal">Jircan</option> <option class="p_huamal">Miraflores</option> <option class="p_huamal">Monzon</option> <option class="p_huamal">Punchao</option> <option class="p_huamal">Puños</option> <option class="p_huamal">Singa</option> <option class="p_huamal">Tantamavo</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huamalíes) {
                item.style.display = "block";
            }
            d.selectedIndex = Huamalíes[0].index;
            break;
        case "Leoncio Prado":
            d.innerHTML = '<option class="p_leo">Rupa-rupa</option> <option class="p_leo">Daniel alomia robles</option> <option class="p_leo">Hermilio valdizan</option> <option class="p_leo">Jose crespo y castillo</option> <option class="p_leo">Luyando</option> <option class="p_leo">Mariano damaso beraun</option> <option class="p_leo">Pucayacu</option> <option class="p_leo">Castillo grande</option> <option class="p_leo">Pueblo nuevo</option> <option class="p_leo">Santo domingo de anda</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of LeoncioPrado) {
                item.style.display = "block";
            }
            d.selectedIndex = LeoncioPrado[0].index;
            break;
        case "Marañón":
            d.innerHTML = '<option class="p_mara">Huacrachuco</option> <option class="p_mara">Cholon</option> <option class="p_mara">San buenaventura</option> <option class="p_mara">La morada</option> <option class="p_mara">Santa Rosa de Alto Yanajanca</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Marañon) {
                item.style.display = "block";
            }
            d.selectedIndex = Marañon[0].index;
            break;
        case "Pachitea":
            d.innerHTML = '<option class="p_pachi">Panao</option> <option class="p_pachi">Chaglla</option> <option class="p_pachi">Molino</option> <option class="p_pachi">Umari</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Pachitea) {
                item.style.display = "block";
            }
            d.selectedIndex = Pachitea[0].index;
            break;
        case "Puerto Inca":
            d.innerHTML = '<option class="p_puerto">Puerto Inca</option> <option class="p_puerto">Codo del pozuzo</option> <option class="p_puerto">Honoria</option> <option class="p_puerto">Tournavista</option> <option class="p_puerto">Yuyapichis</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of PuertoInca) {
                item.style.display = "block";
            }
            d.selectedIndex = PuertoInca[0].index;
            break;
        case "Lauricocha":
            d.innerHTML = '<option class="p_lauri">Jesus</option> <option class="p_lauri">Baños</option> <option class="p_lauri">Jivia</option> <option class="p_lauri">Queropalca</option> <option class="p_lauri">Rondos</option> <option class="p_lauri">San francisco de asis</option> <option class="p_lauri">San Miguel de cauri</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Lauricocha) {
                item.style.display = "block";
            }
            d.selectedIndex = Lauricocha[0].index;
            break;
        case "Yarowilca":
            d.innerHTML = '<option class="p_yaro">Chavinillo</option> <option class="p_yaro">Cahuac</option> <option class="p_yaro">Chacabamba</option> <option class="p_yaro">Aparicio pomares</option> <option class="p_yaro">Jacas chico</option> <option class="p_yaro">Obas</option> <option class="p_yaro">Pampamarca</option> <option class="p_yaro">Choras</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Yarowilca) {
                item.style.display = "block";
            }
            d.selectedIndex = Yarowilca[0].index;
            break;
        case "Ica":

            d.innerHTML = '<option class="p_ica">Ica</option> <option class="p_ica">La tinguiña</option> <option class="p_ica">Los aquijes</option> <option class="p_ica">Ocucaje</option> <option class="p_ica">Pachacutec</option> <option class="p_ica">Parcona</option> <option class="p_ica">Pueblo nuevo</option> <option class="p_ica">Salas</option> <option class="p_ica">San jose de los molinos</option> <option class="p_ica">San juan bautista</option> <option class="p_ica">Santiago</option> <option class="p_ica">Subtanjalla</option> <option class="p_ica">Tate</option> <option class="p_ica">Yauca del rosario</option>';

            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Ica) {
                item.style.display = "block";
            }
            d.selectedIndex = Ica[0].index;
            break;
        case "Chincha":
            d.innerHTML = '<option class="p_chin">Chincha alta</option> <option class="p_chin">Alto Iaran</option> <option class="p_chin">Chavin</option> <option class="p_chin">Chincha baja</option> <option class="p_chin">El Carmen</option> <option class="p_chin">Grocio prado</option> <option class="p_chin">Pueblo nuevo</option> <option class="p_chin">San juan de yanac</option> <option class="p_chin">San pedro de huacarpana</option> <option class="p_chin">Sunampe</option> <option class="p_chin">Tambo de mora</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Chincha) {
                item.style.display = "block";
            }
            d.selectedIndex = Chincha[0].index;
            break;
        case "Nazca":
            d.innerHTML = '<option class="p_nasc">Nasca</option> <option class="p_nasc">Changuillo</option> <option class="p_nasc">El ingenio</option> <option class="p_nasc">Marcona</option> <option class="p_nasc">Vista alegre</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Nazca) {
                item.style.display = "block";
            }
            d.selectedIndex = Nazca[0].index;
            break;
        case "Palpa":
            d.innerHTML = '<option class="p_palp">Palpa</option> <option class="p_palp">Lilipata</option> <option class="p_palp">Rio grande</option> <option class="p_palp">Santa Cruz</option> <option class="p_palp">Tibillo</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Palpa) {
                item.style.display = "block";
            }
            d.selectedIndex = Palpa[0].index;
            break;
        case "Pisco":
            d.innerHTML = '<option class="p_pis">Pisco</option> <option class="p_pis">Huancano</option> <option class="p_pis">Humay</option> <option class="p_pis">Independencia</option> <option class="p_pis">Paracas</option> <option class="p_pis">San andres</option> <option class="p_pis">San clemente</option> <option class="p_pis">Tupac Amaru inca</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Pisco) {
                item.style.display = "block";
            }
            d.selectedIndex = Pisco[0].index;
            break;
        case "Huancayo":
            d.innerHTML = '<option class="p_huancay">Huancayo</option> <option class="p_huancay">Carhuacallanga</option> <option class="p_huancay">Chacapampa</option> <option class="p_huancay">Chicche</option> <option class="p_huancay">Chilca</option> <option class="p_huancay">Chongos alto</option> <option class="p_huancay">Chupuro</option> <option class="p_huancay">Colca</option> <option class="p_huancay">Collhuas</option> <option class="p_huancay">El tambo</option> <option class="p_huancay">Huacrapuquio</option> <option class="p_huancay">Hualhuas</option> <option class="p_huancay">Huancan</option> <option class="p_huancay">Huasicancha</option> <option class="p_huancay">Huayucachi</option> <option class="p_huancay">Ingenio</option> <option class="p_huancay">Pariahuanca</option> <option class="p_huancay">Pilcomayo</option> <option class="p_huancay">Pucara</option> <option class="p_huancay">Quichuay</option> <option class="p_huancay">Quilcas</option> <option class="p_huancay">San Agustín</option> <option class="p_huancay">San Jeronimo de Tunan</option> <option class="p_huancay">Saño</option> <option class="p_huancay">Sapallanga</option> <option class="p_huancay">Sicaya</option> <option class="p_huancay">Santo domingo de acobamba</option> <option class="p_huancay">Viques</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huancayo) {
                item.style.display = "block";
            }
            d.selectedIndex = Huancayo[0].index;
            break;
        case "Chanchamayo":
            d.innerHTML = '<option class="p_chancha">Chanchamayo</option> <option class="p_chancha">Perene</option> <option class="p_chancha">Pichanaqui</option> <option class="p_chancha">San luis de shuaro</option> <option class="p_chancha">San Ramón</option> <option class="p_chancha">Vitoc</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Chanchamayo) {
                item.style.display = "block";
            }
            d.selectedIndex = Chanchamayo[0].index;
            break;
        case "Chupaca":
            d.innerHTML = '<option class="p_chupa">Chupaca</option> <option class="p_chupa">Ahuac</option> <option class="p_chupa">Chongos bajo</option> <option class="p_chupa">Huachac</option> <option class="p_chupa">Huamancaca chico</option> <option class="p_chupa">San juan de iscos</option> <option class="p_chupa">San juan de jarpa</option> <option class="p_chupa">Tres de diciembre</option> <option class="p_chupa">Yanacancha</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Chupaca) {
                item.style.display = "block";
            }
            d.selectedIndex = Chupaca[0].index;
            break;
        case "Concepción":
            d.innerHTML = '<option class="p_conc">Concepción</option> <option class="p_conc">Aco</option> <option class="p_conc">Andamarca</option> <option class="p_conc">Chambara</option> <option class="p_conc">Cochas</option> <option class="p_conc">Comas</option> <option class="p_conc">Heroínas toledo</option> <option class="p_conc">Manzanares</option> <option class="p_conc">Mariscal Castilla</option> <option class="p_conc">Matahuasi</option> <option class="p_conc">Mito</option> <option class="p_conc">Nueve de julio</option> <option class="p_conc">Orcotuna</option> <option class="p_conc">San jose de quero</option> <option class="p_conc">Santa Rosa de Ocopa</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Concepcion) {
                item.style.display = "block";
            }
            d.selectedIndex = Concepcion[0].index;
            break;
        case "Jauja":
            d.innerHTML = '<option class="p_jauja">Jauja</option> <option class="p_jauja">Acolla</option> <option class="p_jauja">Apata</option> <option class="p_jauja">Ataura</option> <option class="p_jauja">Canchayllo</option> <option class="p_jauja">Curicaca</option> <option class="p_jauja">El mantaro</option> <option class="p_jauja">Huamali</option> <option class="p_jauja">Huaripampa</option> <option class="p_jauja">Huertas</option> <option class="p_jauja">Janjaillo</option> <option class="p_jauja">Julcán</option> <option class="p_jauja">Leonor ordoñez</option> <option class="p_jauja">Llocllapampa</option> <option class="p_jauja">Marco</option> <option class="p_jauja">Masma</option> <option class="p_jauja">Masma chicche</option> <option class="p_jauja">Molinos</option> <option class="p_jauja">Monobamba</option> <option class="p_jauja">Muqui</option> <option class="p_jauja">Muquiyauyo</option> <option class="p_jauja">Paca</option> <option class="p_jauja">Paccha</option> <option class="p_jauja">Pancan</option> <option class="p_jauja">Parco</option> <option class="p_jauja">Pomacancha</option> <option class="p_jauja">Ricran</option> <option class="p_jauja">San Lorenzo</option> <option class="p_jauja">San pedro de chunan</option> <option class="p_jauja">Sausa</option> <option class="p_jauja">Sincos</option> <option class="p_jauja">Tunan marca</option> <option class="p_jauja">Yauli</option> <option class="p_jauja">Yauyos</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Jauja) {
                item.style.display = "block";
            }
            d.selectedIndex = Jauja[0].index;
            break;
        case "Junín":
            d.innerHTML = '<option class="p_juni">Junín</option> <option class="p_juni">Carhuamayo</option> <option class="p_juni">Ondores</option> <option class="p_juni">Ulcumayo</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Junin) {
                item.style.display = "block";
            }
            d.selectedIndex = Junin[0].index;
            break;
        case "Satipo":
            d.innerHTML = '<option class="p_sati">Satipo</option> <option class="p_sati">Coviriali</option> <option class="p_sati">Llaylla</option> <option class="p_sati">Mazamari</option> <option class="p_sati">Pampa hermosa</option> <option class="p_sati">Pangoa</option> <option class="p_sati">Rio negro</option> <option class="p_sati">Rio tambo</option> <option class="p_sati">Vizcatan del ene</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Satipo) {
                item.style.display = "block";
            }
            d.selectedIndex = Satipo[0].index;
            break;

        case "Tarma":
            d.innerHTML = '<option class="p_tarm">Tarma</option> <option class="p_tarm">Acobamba</option> <option class="p_tarm">Huaricolca</option> <option class="p_tarm">Huasahuasi</option> <option class="p_tarm">La union</option> <option class="p_tarm">Palca</option> <option class="p_tarm">Palcamayo</option> <option class="p_tarm">San pedro de cajas</option> <option class="p_tarm">Tapo</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Tarma) {
                item.style.display = "block";
            }
            d.selectedIndex = Tarma[0].index;
            break;


        case "Yauli":
            d.innerHTML = '<option class="p_yauli">La oroya</option> <option class="p_yauli">Chacapalpa</option> <option class="p_yauli">Huay-huay</option> <option class="p_yauli">Marcapomacocha</option> <option class="p_yauli">Morocha</option> <option class="p_yauli">Paccha</option> <option class="p_yauli">Santa Bárbara de Carhuacayán</option> <option class="p_yauli">Santa Rosa de Sacco</option> <option class="p_yauli">Suitucancha</option> <option class="p_yauli">Yauli</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Yauli) {
                item.style.display = "block";
            }
            d.selectedIndex = Yauli[0].index;
            break;


        case "Trujillo":
            d.innerHTML = '<option class="p_truj">Trujillo</option> <option class="p_truj">El porvenir</option> <option class="p_truj">Florencia de mora</option> <option class="p_truj">Huanchaco</option> <option class="p_truj">La esperanza</option> <option class="p_truj">Laredo</option> <option class="p_truj">Moche</option> <option class="p_truj">Poroto</option> <option class="p_truj">Salaverry</option> <option class="p_truj">Simbal</option> <option class="p_truj">Victor larco herrera</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Trujillo) {
                item.style.display = "block";
            }
            d.selectedIndex = Trujillo[0].index;
            break;


        case "Ascope":
            d.innerHTML = '<option class="p_asco">Ascope</option> <option class="p_asco">Chicama</option> <option class="p_asco">Chocope</option> <option class="p_asco">Magdalena de cao</option> <option class="p_asco">Paiján</option> <option class="p_asco">Razuri</option> <option class="p_asco">Santiago de cao</option> <option class="p_asco">Casa grande</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Ascope) {
                item.style.display = "block";
            }
            d.selectedIndex = Ascope[0].index;
            break;


        case "Bolívar":
            d.innerHTML = '<option class="p_boli">Bolívar</option> <option class="p_boli">Bambamarca</option> <option class="p_boli">Condormarca</option> <option class="p_boli">Longotea</option> <option class="p_boli">Uchumarca</option> <option class="p_boli">Ucuncha</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Bolivar) {
                item.style.display = "block";
            }
            d.selectedIndex = Bolivar[0].index;
            break;


        case "Chepén":
            d.innerHTML = '<option class="p_chep">Chepén</option> <option class="p_chep">Pacanga</option> <option class="p_chep">Pueblo nuevo</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Chepén) {
                item.style.display = "block";
            }
            d.selectedIndex = Chepén[0].index;
            break;


        case "Gran Chimú":
            d.innerHTML = '<option class="p_gran">Cascas</option> <option class="p_gran">Lucma</option> <option class="p_gran">Marmot</option> <option class="p_gran">Sayapullo</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of GranChimu) {
                item.style.display = "block";
            }
            d.selectedIndex = GranChimu[0].index;
            break;


        case "Julcán":
            d.innerHTML = '<option class="p_jul">Julcán</option> <option class="p_jul">Calamarca</option> <option class="p_jul">Carabamba</option> <option class="p_jul">Huaso</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Julcan) {
                item.style.display = "block";
            }
            d.selectedIndex = Julcan[0].index;
            break;


        case "Otuzco":
            d.innerHTML = '<option class="p_otu">Otuzco</option> <option class="p_otu">Agallpampa</option> <option class="p_otu">Charat</option> <option class="p_otu">Huaranchal</option> <option class="p_otu">La cuesta</option> <option class="p_otu">Mache</option> <option class="p_otu">Paranday</option> <option class="p_otu">Salpo</option> <option class="p_otu">Sinsicap</option> <option class="p_otu">Usquil</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Otuzco) {
                item.style.display = "block";
            }
            d.selectedIndex = Otuzco[0].index;
            break;


        case "Pacasmayo":
            d.innerHTML = '<option class="p_pacas">San pedro de Iloc</option> <option class="p_pacas">Guadalupe</option> <option class="p_pacas">Jequetepeque</option> <option class="p_pacas">Pacasmayo</option> <option class="p_pacas">San jose</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Pacasmayo) {
                item.style.display = "block";
            }
            d.selectedIndex = Pacasmayo[0].index;
            break;


        case "Pataz":
            d.innerHTML = '<option class="p_pataz">Tayabamba</option> <option class="p_pataz">Buldibuyo</option> <option class="p_pataz">Chillia</option> <option class="p_pataz">Huancaspata</option> <option class="p_pataz">Huaylillas</option> <option class="p_pataz">Huayo</option> <option class="p_pataz">Ongon</option> <option class="p_pataz">Parcoy</option> <option class="p_pataz">Pataz</option> <option class="p_pataz">Pias</option> <option class="p_pataz">Santiago de challas</option> <option class="p_pataz">Taurija</option> <option class="p_pataz">Urpay</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Pataz) {
                item.style.display = "block";
            }
            d.selectedIndex = Pataz[0].index;
            break;


        case "Sánchez Carrión":
            d.innerHTML = '<option class="p_sanch">Huamachuco</option> <option class="p_sanch">Chugay</option> <option class="p_sanch">Cochorco</option> <option class="p_sanch">Curgos</option> <option class="p_sanch">Marcabal</option> <option class="p_sanch">Sanagoran</option> <option class="p_sanch">Sarin</option> <option class="p_sanch">Sartimbamba</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of SanchezCarrin) {
                item.style.display = "block";
            }
            d.selectedIndex = SanchezCarrin[0].index;
            break;


        case "Santiago de Chuco":
            d.innerHTML = '<option class="p_santi">Santiago de Chuco</option> <option class="p_santi">Angasmarca</option> <option class="p_santi">Cachicadan</option> <option class="p_santi">Mollebamba</option> <option class="p_santi">Mollepata</option> <option class="p_santi">Quiruvilca</option> <option class="p_santi">Santa Cruz de Chuca</option> <option class="p_santi">Sitabamba</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of SantiagodeChuco) {
                item.style.display = "block";
            }
            d.selectedIndex = SantiagodeChuco[0].index;
            break;


        case "Virú":
            d.innerHTML = '<option class="p_viru">Virú</option> <option class="p_viru">Chao</option> <option class="p_viru">Guadalupito</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Viru) {
                item.style.display = "block";
            }
            d.selectedIndex = Viru[0].index;
            break;


        case "Chiclayo":
            d.innerHTML = '<option class="p_chicla">Chiclayo</option> <option class="p_chicla">Chongoyape</option> <option class="p_chicla">Eten</option> <option class="p_chicla">Eten puerto</option> <option class="p_chicla">Jose leonardo ortiz</option> <option class="p_chicla">La victoria</option> <option class="p_chicla">Lagunas</option> <option class="p_chicla">Monsefu</option> <option class="p_chicla">Nueva arica</option> <option class="p_chicla">Oyotun</option> <option class="p_chicla">Picsi</option> <option class="p_chicla">Pimentel</option> <option class="p_chicla">Reque</option> <option class="p_chicla">Santa Rosa</option> <option class="p_chicla">Saña</option> <option class="p_chicla">Cayalti</option> <option class="p_chicla">Patapo</option> <option class="p_chicla">Pomalca</option> <option class="p_chicla">Pucala</option> <option class="p_chicla">Tuman</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Chiclayo) {
                item.style.display = "block";
            }
            d.selectedIndex = Chiclayo[0].index;
            break;


        case "Ferreñafe":
            d.innerHTML = '<option class="p_ferre">Ferreñafe</option> <option class="p_ferre">Cañaris</option> <option class="p_ferre">Incahuasi</option> <option class="p_ferre">Manuel Antonio mesones muro</option> <option class="p_ferre">Pitipo</option> <option class="p_ferre">Pueblo nuevo</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Ferreñafe) {
                item.style.display = "block";
            }
            d.selectedIndex = Ferreñafe[0].index;
            break;


        case "Lambayeque":
            d.innerHTML = '<option class="p_lamba">Lambayeque</option> <option class="p_lamba">Chochope</option> <option class="p_lamba">Illimo</option> <option class="p_lamba">Jayanca</option> <option class="p_lamba">Mochumi</option> <option class="p_lamba">Morrope</option> <option class="p_lamba">Motupe</option> <option class="p_lamba">Olmos</option> <option class="p_lamba">Pacora</option> <option class="p_lamba">Salas</option> <option class="p_lamba">San jose</option> <option class="p_lamba">Tucume</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Lambayeque) {
                item.style.display = "block";
            }
            d.selectedIndex = Lambayeque[0].index;
            break;


        case "Lima":
            d.innerHTML = '<option class="p_lima" selected>Lima</option> <option class="p_lima" >Ancon</option> <option class="p_lima">Ate</option> <option class="p_lima">Barranco</option> <option class="p_lima">Breña</option> <option class="p_lima">Carabayllo</option> <option class="p_lima">Chaclacayo</option> <option class="p_lima">Chorrillos</option> <option class="p_lima">Cieneguilla</option> <option class="p_lima">Comas</option> <option class="p_lima">El agustino</option> <option class="p_lima">Independencia</option> <option class="p_lima">Jesus maria</option> <option class="p_lima">La molina</option> <option class="p_lima">La victoria</option> <option class="p_lima">Lince</option> <option class="p_lima">Los olivos</option> <option class="p_lima">Lurigancho</option> <option class="p_lima">Lurin</option> <option class="p_lima">Magdalena del mar</option> <option class="p_lima">Pueblo libre</option> <option class="p_lima">Miraflores</option> <option class="p_lima">Pachacamac</option> <option class="p_lima">Pucusana</option> <option class="p_lima">Puente piedra</option> <option class="p_lima">Punta hermosa</option> <option class="p_lima">Punta negra</option> <option class="p_lima">Rimac</option> <option class="p_lima">San bartolo</option> <option class="p_lima">San borja</option> <option class="p_lima">San isidro</option> <option class="p_lima">San juan de Lurigancho</option> <option class="p_lima">San juan de Miraflores</option> <option class="p_lima">San Luis</option> <option class="p_lima">San Martin de Porres</option> <option class="p_lima">San Miguel</option> <option class="p_lima">Santa Anita</option> <option class="p_lima">Santa Maria del Mar</option> <option class="p_lima">Santa Rosa</option> <option class="p_lima">Santiago de Surco</option> <option class="p_lima">Surquillo</option> <option class="p_lima">Villa el salvador</option> <option class="p_lima">Villa maria del triunfo</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Lima) {
                item.style.display = "block";
            }
            d.selectedIndex = Lima[0].index;
            break;


        case "Barranca":
            d.innerHTML = '<option class="p_barra">Barranca</option> <option class="p_barra">Paramonga</option> <option class="p_barra">Pativilca</option> <option class="p_barra">Supe</option> <option class="p_barra">Supe puerto</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Barranca) {
                item.style.display = "block";
            }
            d.selectedIndex = Barranca[0].index;
            break;


        case "Cajatambo":
            d.innerHTML = '<option class="p_cajat">Cajatambo</option> <option class="p_cajat">Copa</option> <option class="p_cajat">Gorgor</option> <option class="p_cajat">Huancapon</option> <option class="p_cajat">Manas</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Cajatambo) {
                item.style.display = "block";
            }
            d.selectedIndex = Cajatambo[0].index;
            break;


        case "Canta":
            d.innerHTML = '<option class="p_canta">Canta</option> <option class="p_canta">Arahuay</option> <option class="p_canta">Huamantanga</option> <option class="p_canta">Huaros</option> <option class="p_canta">Lachaqui</option> <option class="p_canta">San buenaventura</option> <option class="p_canta">Santa Rosa de Quives</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Canta) {
                item.style.display = "block";
            }
            d.selectedIndex = Canta[0].index;
            break;


        case "Cañete":
            d.innerHTML = '<option class="p_cañe">San Vicente de cañete</option> <option class="p_cañe">Asia</option> <option class="p_cañe">Calango</option> <option class="p_cañe">Cerro azul</option> <option class="p_cañe">Chilca</option> <option class="p_cañe">Coayllo</option> <option class="p_cañe">Imperial</option> <option class="p_cañe">Lunahuana</option> <option class="p_cañe">Mala</option> <option class="p_cañe">Nueva Imperial</option> <option class="p_cañe">Pacaran</option> <option class="p_cañe">Quilmana</option> <option class="p_cañe">San Antonio</option> <option class="p_cañe">San Luis</option> <option class="p_cañe">Santa Cruz de Flores</option> <option class="p_cañe">Zuñiga</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Cañete) {
                item.style.display = "block";
            }
            d.selectedIndex = Cañete[0].index;
            break;


        case "Huaral":
            d.innerHTML = '<option class="p_huara">Huaral</option> <option class="p_huara">Atavillos alto</option> <option class="p_huara">Atavillos bajo</option> <option class="p_huara">Aucallama</option> <option class="p_huara">Chancay</option> <option class="p_huara">Ihuari</option> <option class="p_huara">Lampian</option> <option class="p_huara">Pacaraos</option> <option class="p_huara">San Miguel de acos</option> <option class="p_huara">Santa Cruz de Andamarca</option> <option class="p_huara">Sumbilca</option> <option class="p_huara">Veintisiete de noviembre</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huaral) {
                item.style.display = "block";
            }
            d.selectedIndex = Huaral[0].index;
            break;


        case "Huarochirí":
            d.innerHTML = '<option class="p_huaro">Matucana</option> <option class="p_huaro">Antioquia</option> <option class="p_huaro">Callahuanca</option> <option class="p_huaro">Carampoma</option> <option class="p_huaro">Chicla</option> <option class="p_huaro">Cuenca</option> <option class="p_huaro">Huachupampa</option> <option class="p_huaro">Huanza</option> <option class="p_huaro">Huarochiri</option> <option class="p_huaro">Lahuaytambo</option> <option class="p_huaro">Langa</option> <option class="p_huaro">Laraos</option> <option class="p_huaro">Mariatana</option> <option class="p_huaro">Ricardo Palma</option> <option class="p_huaro">San Andres de tupicocha</option> <option class="p_huaro">San Antonio</option> <option class="p_huaro">San Bartolome</option> <option class="p_huaro">San damian</option> <option class="p_huaro">San juan de iris</option> <option class="p_huaro">San juan de tantaranche</option> <option class="p_huaro">San Lorenzo de quinti</option> <option class="p_huaro">San mateo</option> <option class="p_huaro">San mateo de otao</option> <option class="p_huaro">San pedro de casta</option> <option class="p_huaro">San pedro de huancayre</option> <option class="p_huaro">Sangallaya</option> <option class="p_huaro">Santa Cruz de Cocachacra</option> <option class="p_huaro">Santa Eulalia</option> <option class="p_huaro">Santiago de anchucaya</option> <option class="p_huaro">Santiago de tuna</option> <option class="p_huaro">Santo domingo de los olleros</option> <option class="p_huaro">Surco</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huarochirí) {
                item.style.display = "block";
            }
            d.selectedIndex = Huarochirí[0].index;
            break;


        case "Huaura":
            d.innerHTML = '<option class="p_huaura">Huacho</option> <option class="p_huaura">Ambar</option> <option class="p_huaura">Caleta de carquin</option> <option class="p_huaura">Checras</option> <option class="p_huaura">Hualmay</option> <option class="p_huaura">Huaura</option> <option class="p_huaura">Leoncio Prado</option> <option class="p_huaura">Paccho</option> <option class="p_huaura">Santa Leonor</option> <option class="p_huaura">Santa María</option> <option class="p_huaura">Sayan</option> <option class="p_huaura">Vegueta</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huaura) {
                item.style.display = "block";
            }
            d.selectedIndex = Huaura[0].index;
            break;


        case "Oyón":
            d.innerHTML = '<option class="p_oyo">Oyón</option> <option class="p_oyo">Andajes</option> <option class="p_oyo">Caujul</option> <option class="p_oyo">Cochamarca</option> <option class="p_oyo">Navan</option> <option class="p_oyo">Pachangara</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Oyon) {
                item.style.display = "block";
            }
            d.selectedIndex = Oyon[0].index;
            break;


        case "Yauyos":
            d.innerHTML = '<option class="p_yau">Yauyos</option> <option class="p_yau">Alis</option> <option class="p_yau">Allauca</option> <option class="p_yau">Ayaviri</option> <option class="p_yau">Azángaro</option> <option class="p_yau">Cacra</option> <option class="p_yau">Carania</option> <option class="p_yau">Catahuasi</option> <option class="p_yau">Chocos</option> <option class="p_yau">Cochas</option> <option class="p_yau">Colonia</option> <option class="p_yau">Hongos</option> <option class="p_yau">Huampara</option> <option class="p_yau">Huancaya</option> <option class="p_yau">Huangascar</option> <option class="p_yau">Huantan</option> <option class="p_yau">Huañec</option> <option class="p_yau">Laraos</option> <option class="p_yau">Lincha</option> <option class="p_yau">Madean</option> <option class="p_yau">Miraflores</option> <option class="p_yau">Omas</option> <option class="p_yau">Putinza</option> <option class="p_yau">Quinches</option> <option class="p_yau">Quinocay</option> <option class="p_yau">San Joaquín</option> <option class="p_yau">San pedro de pilas</option> <option class="p_yau">Tanta</option> <option class="p_yau">Tauripampa</option> <option class="p_yau">Tomas</option> <option class="p_yau">Tupe</option> <option class="p_yau">Viñac</option> <option class="p_yau">Vitis</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Yauyos) {
                item.style.display = "block";
            }
            d.selectedIndex = Yauyos[0].index;
            break;


        case "Maynas":
            d.inner = '<option class="p_may">Iquitos</option> <option class="p_may">Alto nanay</option> <option class="p_may">Fernando lores</option> <option class="p_may">Indiana</option> <option class="p_may">Las Amazonas</option> <option class="p_may">Mazan</option> <option class="p_may">Napo</option> <option class="p_may">Punchana</option> <option class="p_may">Torres causana</option> <option class="p_may">Belen</option> <option class="p_may">San juan bautista</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Maynas) {
                item.style.display = "block";
            }
            d.selectedIndex = Maynas[0].index;
            break;


        case "Alto Amazonas":
            d.innerHTML = '<option class="p_altoa">Yurimaguas</option> <option class="p_altoa">Balsapuerto</option> <option class="p_altoa">Jeberos</option> <option class="p_altoa">Lagunas</option> <option class="p_altoa">Santa Cruz</option> <option class="p_altoa">Teniente Cesar Lopez Rojas</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of AltoAmazonas) {
                item.style.display = "block";
            }
            d.selectedIndex = AltoAmazonas[0].index;
            break;


        case "Datem del Marañón":
            d.innerHTML = '<option class="p_date">Barranca</option> <option class="p_date">Cahuapanas</option> <option class="p_date">Manseriche</option> <option class="p_date">Morona</option> <option class="p_date">Pastaza</option> <option class="p_date">Andoas</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Marañon) {
                item.style.display = "block";
            }
            d.selectedIndex = Marañon[0].index;
            break;


        case "Loreto":
            d.innerHTML = '<option class="p_lore">Nauta</option> <option class="p_lore">Parinari</option> <option class="p_lore">Tigre</option> <option class="p_lore">Trompeteros</option> <option class="p_lore">Urarinas</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Loreto) {
                item.style.display = "block";
            }
            d.selectedIndex = Loreto[0].index;
            break;


        case "Mariscal Ramón Castilla":
            d.innerHTML = '<option class="p_maris">Ramón Castilla</option> <option class="p_maris">Pebes</option> <option class="p_maris">Yavari</option> <option class="p_maris">San Pablo</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of MariscalRamónCastilla) {
                item.style.display = "block";
            }
            d.selectedIndex = MariscalRamónCastilla[0].index;
            break;


        case "Putumayo":
            d.innerHTML = '<option class="p_putu">Putumayo</option> <option class="p_putu">Rosa panduro</option> <option class="p_putu">Teniente Manuel Clavero</option> <option class="p_putu">Yaguas</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Putumayo) {
                item.style.display = "block";
            }
            d.selectedIndex = Putumayo[0].index;
            break;


        case "Requena":
            d.innerHTML = '<option class="p_reque">Requena</option> <option class="p_reque">Alto tapiche</option> <option class="p_reque">Capelo</option> <option class="p_reque">Emilio San Martín</option> <option class="p_reque">Maquia</option> <option class="p_reque">Puinahua</option> <option class="p_reque">Saquena</option> <option class="p_reque">Soplin</option> <option class="p_reque">Tapiche</option> <option class="p_reque">Jenaro Herrera</option> <option class="p_reque">Yaquerana</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Requena) {
                item.style.display = "block";
            }
            d.selectedIndex = Requena[0].index;
            break;


        case "Ucayali":
            d.innerHTML = '<option class="p_ucay">Contamana</option> <option class="p_ucay">Inahuaya</option> <option class="p_ucay">Padre marquez</option> <option class="p_ucay">Pampa hermosa</option> <option class="p_ucay">Sarayacu</option> <option class="p_ucay">Vargas guerra</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Ucayali) {
                item.style.display = "block";
            }
            d.selectedIndex = Ucayali[0].index;
            break;

        case "Tambopata":
            d.innerHTML = '<option class="p_tambop">Tambopata</option> <option class="p_tambop">Inambari</option> <option class="p_tambop">Las piedras</option> <option class="p_tambop">Laberinto</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Tambopata) {
                item.style.display = "block";
            }
            d.selectedIndex = Tambopata[0].index;
            break;

        case "Manu":
            d.innerHTML = '<option class="p_manu">Manu</option> <option class="p_manu">Fitzcarrald</option> <option class="p_manu">Madre de Dios</option> <option class="p_manu">Huepetuhe</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Manu) {
                item.style.display = "block";
            }
            d.selectedIndex = Manu[0].index;
            break;

        case "Tahuamanu":
            d.innerHTML = '<option class="p_tahua">Iñapari</option> <option class="p_tahua">Iberia</option> <option class="p_tahua">Tahuamanu</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Tahuamanu) {
                item.style.display = "block";
            }
            d.selectedIndex = Tahuamanu[0].index;
            break;

        case "Mariscal Nieto":
            d.innerHTML = '<option class="p_marn">Moquegua</option> <option class="p_marn">Carumas</option> <option class="p_marn">Cuchumbaya</option> <option class="p_marn">Samegua</option> <option class="p_marn">San Cristobal</option> <option class="p_marn">Torata</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of MariscalNieto) {
                item.style.display = "block";
            }
            d.selectedIndex = MariscalNieto[0].index;
            break;

        case "General Sánchez Cerro":
            d.innerHTML = '<option class="p_gsc">Omate</option> <option class="p_gsc">Chojata</option> <option class="p_gsc">Coalaque</option> <option class="p_gsc">Ichuña</option> <option class="p_gsc">La capilla</option> <option class="p_gsc">Lloque</option> <option class="p_gsc">Matalaque</option> <option class="p_gsc">Puquina</option> <option class="p_gsc">Quinistaquillas</option> <option class="p_gsc">Ubinas</option> <option class="p_gsc">Yunga</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of GeneralSanchez) {
                item.style.display = "block";
            }
            d.selectedIndex = GeneralSanchez[0].index;
            break;

        case "Ilo":
            d.innerHTML = '<option class="p_ilo">Ilo</option> <option class="p_ilo">El algarrobal</option> <option class="p_ilo">Pacocha</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Ilo) {
                item.style.display = "block";
            }
            d.selectedIndex = Ilo[0].index;
            break;

        case "Pasco":
            d.innerHTML = '<option class="p_pasco">Chaupimarca</option> <option class="p_pasco">Huachon</option> <option class="p_pasco">Huariaca</option> <option class="p_pasco">Huayllay</option> <option class="p_pasco">Ninacaca</option> <option class="p_pasco">Pallanchacra</option> <option class="p_pasco">Paucartambo</option> <option class="p_pasco">San francisco de Asis de Yarusyacan</option> <option class="p_pasco">Simon Bolívar</option> <option class="p_pasco">Ticlacayan</option> <option class="p_pasco">Tinyahuarco</option> <option class="p_pasco">Vicco</option> <option class="p_pasco">Yanacancha</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Pasco) {
                item.style.display = "block";
            }
            d.selectedIndex = Pasco[0].index;
            break;

        case "Daniel Alcides Carrión":
            d.innerHTML = '<option class="p_dac">Yanahuanca</option> <option class="p_dac">Chacayan</option> <option class="p_dac">Goyllarisquizga</option> <option class="p_dac">Paucar</option> <option class="p_dac">San pedro de pillao</option> <option class="p_dac">Santa Ana d Tusi</option> <option class="p_dac">Tapuc</option> <option class="p_dac">Vilcabamba</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of DanielAlcides) {
                item.style.display = "block";
            }
            d.selectedIndex = DanielAlcides[0].index;
            break;

        case "Oxapampa":
            d.innerHTML = '<option class="p_oxa">Oxapampa</option> <option class="p_oxa">Chontabamba</option> <option class="p_oxa">Huancabamba</option> <option class="p_oxa">Palcazu</option> <option class="p_oxa">Pozuzo</option> <option class="p_oxa">Puerto Bermudez</option> <option class="p_oxa">Villa rica</option> <option class="p_oxa">Constitución</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Oxapampa) {
                item.style.display = "block";
            }
            d.selectedIndex = Oxapampa[0].index;
            break;

        case "Piura":
            d.innerHTML = '<option class="p_piu">Piura</option> <option class="p_piu">Castilla</option> <option class="p_piu">Catacaos</option> <option class="p_piu">Cura mori</option> <option class="p_piu">El tallan</option> <option class="p_piu">La arena</option> <option class="p_piu">La unión</option> <option class="p_piu">Las lomas</option> <option class="p_piu">Tambo grande</option> <option class="p_piu">Veintiséis de Octubre</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Piura) {
                item.style.display = "block";
            }
            d.selectedIndex = Piura[0].index;
            break;

        case "Ayabaca":
            d.innerHTML = '<option class="p_ayab">Ayabaca</option> <option class="p_ayab">Frias</option> <option class="p_ayab">Jilili</option> <option class="p_ayab">Lagunas</option> <option class="p_ayab">Montero</option> <option class="p_ayab">Pacaipampa</option> <option class="p_ayab">Paimas</option> <option class="p_ayab">Sapillica</option> <option class="p_ayab">Sicchez</option> <option class="p_ayab">Suyo</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Ayabaca) {
                item.style.display = "block";
            }
            d.selectedIndex = Ayabaca[0].index;
            break;

        case "Huancabamba":
            d.innerHTML = '<option class="p_huancabamba">Huancabamba</option> <option class="p_huancabamba">Canchaque</option> <option class="p_huancabamba">El carmen de la frontera</option> <option class="p_huancabamba">Huarmaca</option> <option class="p_huancabamba">Lalaquiz</option> <option class="p_huancabamba">San Miguel de el faique</option> <option class="p_huancabamba">Sondor</option> <option class="p_huancabamba">Sondorillo</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huancabamba) {
                item.style.display = "block";
            }
            d.selectedIndex = Huancabamba[0].index;
            break;

        case "Morropón":
            d.innerHTML = '<option class="p_morro">Chulucanas</option> <option class="p_morro">Buenos Aire</option> <option class="p_morro">Chalaco</option> <option class="p_morro">La matanza</option> <option class="p_morro">Morropon</option> <option class="p_morro">Salitral</option> <option class="p_morro">San juan de bigote</option> <option class="p_morro">Santa Catalina de Mossa</option> <option class="p_morro">Santo Domingo</option> <option class="p_morro">Yamango</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Morropon) {
                item.style.display = "block";
            }
            d.selectedIndex = Morropon[0].index;
            break;

        case "Paita":
            d.innerHTML = '<option class="p_paita">Paita</option> <option class="p_paita">Amotape</option> <option class="p_paita">Arenal</option> <option class="p_paita">Colan</option> <option class="p_paita">La huaca</option> <option class="p_paita">Tamarindo</option> <option class="p_paita">Vichayal</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Paita) {
                item.style.display = "block";
            }
            d.selectedIndex = Paita[0].index;
            break;

        case "Sechura":
            d.innerHTML = '<option class="p_sechu">Sechura</option> <option class="p_sechu">Bellavista de la unión</option> <option class="p_sechu">Bernal</option> <option class="p_sechu">Cristo nos valga</option> <option class="p_sechu">Vice</option> <option class="p_sechu">Rinconada Ilicuar</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Sechura) {
                item.style.display = "block";
            }
            d.selectedIndex = Sechura[0].index;
            break;

        case "Sullana":
            d.innerHTML = '<option class="p_sulla">Sullana</option> <option class="p_sulla">Bellavista</option> <option class="p_sulla">Ignacio escudero</option> <option class="p_sulla">Lancones</option> <option class="p_sulla">Marcavelica</option> <option class="p_sulla">Miguel checa</option> <option class="p_sulla">Querecotillo</option> <option class="p_sulla">Salitral</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Sullana) {
                item.style.display = "block";
            }
            d.selectedIndex = Sullana[0].index;
            break;

        case "Talara":
            d.innerHTML = '<option class="p_talar">Pariñas</option> <option class="p_talar">El alto</option> <option class="p_talar">La brea</option> <option class="p_talar">Lobitos</option> <option class="p_talar">Los órganos</option> <option class="p_talar">Mancora</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Talara) {
                item.style.display = "block";
            }
            d.selectedIndex = Talara[0].index;
            break;

        case "Puno":
            d.innerHTML = '<option class="p_puno">Puno</option> <option class="p_puno">Acora</option> <option class="p_puno">Amantani</option> <option class="p_puno">Atuncolla</option> <option class="p_puno">Capachica</option> <option class="p_puno">Chucuito</option> <option class="p_puno">Coata</option> <option class="p_puno">Huata</option> <option class="p_puno">Mañazo</option> <option class="p_puno">Paucarcolla</option> <option class="p_puno">Pichacani</option> <option class="p_puno">Plateria</option> <option class="p_puno">San Antonio</option> <option class="p_puno">Tiquillaca</option> <option class="p_puno">Vilque</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Puno) {
                item.style.display = "block";
            }
            d.selectedIndex = Puno[0].index;
            break;

        case "Azángaro":
            d.innerHTML = '<option class="p_azan">Azángaro</option> <option class="p_azan">Achaya</option> <option class="p_azan">Arapa</option> <option class="p_azan">Asillo</option> <option class="p_azan">Caminaca</option> <option class="p_azan">Chupa</option> <option class="p_azan">Jose Domingo Choquehuanca</option> <option class="p_azan">Muñani</option> <option class="p_azan">Potoni</option> <option class="p_azan">Saman</option> <option class="p_azan">San anton</option> <option class="p_azan">San jose</option> <option class="p_azan">San juan de salinas</option> <option class="p_azan">Santiago de pupuja</option> <option class="p_azan">Tirapata</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Azangaro) {
                item.style.display = "block";
            }
            d.selectedIndex = Azangaro[0].index;
            break;

        case "Carabaya":
            d.innerHTML = '<option class="p_carabaya">Macusani</option> <option class="p_carabaya">Ajoyani</option> <option class="p_carabaya">Ayapata</option> <option class="p_carabaya">Coasa</option> <option class="p_carabaya">Corani</option> <option class="p_carabaya">Crucero</option> <option class="p_carabaya">Ituata</option> <option class="p_carabaya">Ollachea</option> <option class="p_carabaya">San gaban</option> <option class="p_carabaya">Usicayos</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Carabaya) {
                item.style.display = "block";
            }
            d.selectedIndex = Carabaya[0].index;
            break;

        case "Chucuito":
            d.innerHTML = '<option class="p_chucu">Juli</option> <option class="p_chucu">Desaguadero</option> <option class="p_chucu">Huacullani</option> <option class="p_chucu">Kelluyo</option> <option class="p_chucu">Pisacoma</option> <option class="p_chucu">Pomata</option> <option class="p_chucu">Zepita</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Chucuito) {
                item.style.display = "block";
            }
            d.selectedIndex = Chucuito[0].index;
            break;

        case "El Collao":
            d.innerHTML = '<option class="p_colla">Ilave</option> <option class="p_colla">Capazo</option> <option class="p_colla">Pilcuyo</option> <option class="p_colla">Santa Rosa</option> <option class="p_colla">Conduriri</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of ElCollao) {
                item.style.display = "block";
            }
            d.selectedIndex = ElCollao[0].index;
            break;

        case "Huancané":
            d.innerHTML = '<option class="p_huancane">Huancane</option> <option class="p_huancane">Cojata</option> <option class="p_huancane">Huatasani</option> <option class="p_huancane">Inchupalla</option> <option class="p_huancane">Pusi</option> <option class="p_huancane">Rosaspata</option> <option class="p_huancane">Taraco</option> <option class="p_huancane">Vilque chico</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huancane) {
                item.style.display = "block";
            }
            d.selectedIndex = Huancane[0].index;
            break;

        case "Lampa":
            d.innerHTML = '<option class="p_lampa">Lampa</option> <option class="p_lampa">Cabanilla</option> <option class="p_lampa">Calapuja</option> <option class="p_lampa">Nicasio</option> <option class="p_lampa">Ocuviri</option> <option class="p_lampa">Palca</option> <option class="p_lampa">Paratia</option> <option class="p_lampa">Pucara</option> <option class="p_lampa">Santa Lucía</option> <option class="p_lampa">Vilavila</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Lampa) {
                item.style.display = "block";
            }
            d.selectedIndex = Lampa[0].index;
            break;

        case "Melgar":
            d.inner = '<option class="p_melgar">Ayaviri</option> <option class="p_melgar">Antauta</option> <option class="p_melgar">Cupi</option> <option class="p_melgar">Llalli</option> <option class="p_melgar">Macari</option> <option class="p_melgar">Nuñoa</option> <option class="p_melgar">Orurillo</option> <option class="p_melgar">Santa Rosa</option> <option class="p_melgar">Umachiri</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Melgar) {
                item.style.display = "block";
            }
            d.selectedIndex = Melgar[0].index;
            break;

        case "Moho":
            d.innerHTML = '<option class="p_moho">Moho</option> <option class="p_moho">Conima</option> <option class="p_moho">Huayrapata</option> <option class="p_moho">Tilali</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Moho) {
                item.style.display = "block";
            }
            d.selectedIndex = Moho[0].index;
            break;

        case "San Antonio de Putina":
            d.innerHTML = '<option class="p_sap">Putina</option> <option class="p_sap">Ananea</option> <option class="p_sap">Pedro Vilca Apaza</option> <option class="p_sap">Quilcapuncu</option> <option class="p_sap">Sina</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of SanAntoniodePutina) {
                item.style.display = "block";
            }
            d.selectedIndex = SanAntoniodePutina[0].index;
            break;

        case "San Román":
            d.innerHTML = '<option class="p_sanr">Juliaca</option> <option class="p_sanr">Cabana</option> <option class="p_sanr">Cabanillas</option> <option class="p_sanr">Caracoto</option> <option class="p_sanr">San Miguel</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of SanRoman) {
                item.style.display = "block";
            }
            d.selectedIndex = SanRoman[0].index;
            break;

        case "Sandia":
            d.innerHTML = '<option class="p_sand">Sandia</option> <option class="p_sand">Cuyocuyo</option> <option class="p_sand">Limbani</option> <option class="p_sand">Patambuco</option> <option class="p_sand">Phara</option> <option class="p_sand">Quiaca</option> <option class="p_sand">San juan del oro</option> <option class="p_sand">Yanahuaya</option> <option class="p_sand">Alto inambari</option> <option class="p_sand">San pedro de putina punco</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Sandia) {
                item.style.display = "block";
            }
            d.selectedIndex = Sandia[0].index;
            break;

        case "Yunguyo":
            d.innerHTML = '<option class="p_yun">Yunguyo</option> <option class="p_yun">Anapia</option> <option class="p_yun">Copani</option> <option class="p_yun">Cuturapi</option> <option class="p_yun">Ollaraya</option> <option class="p_yun">Tinicachi</option> <option class="p_yun">Unicachi</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Yunguyo) {
                item.style.display = "block";
            }
            d.selectedIndex = Yunguyo[0].index;
            break;

        case "Moyobamba":
            d.innerHTML = '<option class="p_moyo">Moyobamba</option> <option class="p_moyo">Calzada</option> <option class="p_moyo">Habana</option> <option class="p_moyo">Jepelacio</option> <option class="p_moyo">Soritor</option> <option class="p_moyo">Yantalo</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Moyobamba) {
                item.style.display = "block";
            }
            d.selectedIndex = Moyobamba[0].index;
            break;

        case "Bellavista":
            d.innerHTML = '<option class="p_bella">Bellavista</option> <option class="p_bella">Alto biavo</option> <option class="p_bella">Bajo biavo</option> <option class="p_bella">Huallaga</option> <option class="p_bella">San Pablo</option> <option class="p_bella">San Rafael</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Bellavista) {
                item.style.display = "block";
            }
            d.selectedIndex = Bellavista[0].index;
            break;

        case "El Dorado":
            d.innerHTML = '<option class="p_dorado">San jose de sisa</option> <option class="p_dorado">Agua blanca</option> <option class="p_dorado">San Martín</option> <option class="p_dorado">Santa Rosa</option> <option class="p_dorado">Shatoja</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of ElDorado) {
                item.style.display = "block";
            }
            d.selectedIndex = ElDorado[0].index;
            break;

        case "Huallaga":
            d.innerHTML = '<option class="p_hualla">Saposoa</option> <option class="p_hualla">Alto saposoa</option> <option class="p_hualla">El eslabón</option> <option class="p_hualla">Piscoyacu</option> <option class="p_hualla">Sacanche</option> <option class="p_hualla">Tingo de saposoa</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Huallaga) {
                item.style.display = "block";
            }
            d.selectedIndex = Huallaga[0].index;
            break;

        case "Lamas":
            d.innerHTML = '<option class="p_lama">Lamas</option> <option class="p_lama">Alonso de alvarado</option> <option class="p_lama">Barranquita</option> <option class="p_lama">Caynarachi</option> <option class="p_lama">Cuñumbuqui</option> <option class="p_lama">Pinto recodo</option> <option class="p_lama">Rumisapa</option> <option class="p_lama">San roque de cumbaza</option> <option class="p_lama">Shanao</option> <option class="p_lama">Tabalosos</option> <option class="p_lama">Zapatero</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Lamas) {
                item.style.display = "block";
            }
            d.selectedIndex = Lamas[0].index;
            break;


        case "Mariscal Cáceres":
            d.innerHTML = '<option class="p_mc">Juanjui</option> <option class="p_mc">Campanilla</option> <option class="p_mc">Huicungo</option> <option class="p_mc">Pachiza</option> <option class="p_mc">Pajarillo</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of MariscalCaceres) {
                item.style.display = "block";
            }
            d.selectedIndex = MariscalCaceres[0].index;
            break;

        case "Picota":
            d.innerHTML = '<option class="p_pico">Picota</option> <option class="p_pico">Buenos Aires</option> <option class="p_pico">Caspisapa</option> <option class="p_pico">Pilluana</option> <option class="p_pico">Pucacaca</option> <option class="p_pico">San Cristóbal</option> <option class="p_pico">San Hilarión</option> <option class="p_pico">Shamboyacu</option> <option class="p_pico">Tingo de ponasa</option> <option class="p_pico">Tres unidos</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Picota) {
                item.style.display = "block";
            }
            d.selectedIndex = Picota[0].index;
            break;

        case "Rioja":
            d.innerHTML = '<option class="p_rioja">Rioja</option> <option class="p_rioja">Awajun</option> <option class="p_rioja">Elias soplin vargas</option> <option class="p_rioja">Nueva Cajamarca</option> <option class="p_rioja">Pardo Miguel</option> <option class="p_rioja">Posic</option> <option class="p_rioja">San Fernando</option> <option class="p_rioja">Yorongos</option> <option class="p_rioja">Yuracyacu</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Rioja) {
                item.style.display = "block";
            }
            d.selectedIndex = Rioja[0].index;
            break;

        case "San Martín":
            d.innerHTML = '<option class="p_sanm">Tarapoto</option> <option class="p_sanm">Alberto leveau</option> <option class="p_sanm">Cacatachi</option> <option class="p_sanm">Chazuta</option> <option class="p_sanm">Chipurana</option> <option class="p_sanm">El porvenir</option> <option class="p_sanm">Huimbayoc</option> <option class="p_sanm">Juan Guerra</option> <option class="p_sanm">La banda de shilcayo</option> <option class="p_sanm">Morales</option> <option class="p_sanm">Papaplaya</option> <option class="p_sanm">San Antonio</option> <option class="p_sanm">Sauce</option> <option class="p_sanm">Shapaja</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of SanMartin) {
                item.style.display = "block";
            }
            d.selectedIndex = SanMartin[0].index;
            break;

        case "Tocache":
            d.innerHTML = '<option class="p_toca">Tocache</option> <option class="p_toca">Nuevo progrso</option> <option class="p_toca">Pólvora</option> <option class="p_toca">Shunte</option> <option class="p_toca">Uchiza</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Tocache) {
                item.style.display = "block";
            }
            d.selectedIndex = Tocache[0].index;
            break;

        case "Tacna":
            d.innerHTML = '<option class="p_tacna">Tacna</option> <option class="p_tacna">Alto de la alianza</option> <option class="p_tacna">Calana</option> <option class="p_tacna">Ciudad nueva</option> <option class="p_tacna">Inclán</option> <option class="p_tacna">Pachía</option> <option class="p_tacna">Palca</option> <option class="p_tacna">Pocollay</option> <option class="p_tacna">Sama</option> <option class="p_tacna">Coronel Gregorio Albarracín Lanchipa</option> <option class="p_tacna">La yarada los palos</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Tacna) {
                item.style.display = "block";
            }
            d.selectedIndex = Tacna[0].index;
            break;

        case "Tarata":
            d.innerHTML = '<option class="p_tarata">Tarata</option> <option class="p_tarata">Tarucachi</option> <option class="p_tarata">Ticaco</option> <option class="p_tarata">Sitajara</option> <option class="p_tarata">Susapaya</option> <option class="p_tarata">Estique pampa</option> <option class="p_tarata">Estique</option> <option class="p_tarata">Heroes Albarracín</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Tarata) {
                item.style.display = "block";
            }
            d.selectedIndex = Tarata[0].index;
            break;

        case "Candarave":
            d.innerHTML = '<option class="p_canda">Candarave</option> <option class="p_canda">Cairani</option> <option class="p_canda">Camilaca</option> <option class="p_canda">Curibaya</option> <option class="p_canda">Huanuara</option> <option class="p_canda">Quilahuani</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Candarave) {
                item.style.display = "block";
            }
            d.selectedIndex = Candarave[0].index;
            break;

        case "Jorge Basadre":
            d.innerHTML = '<option class="p_jorgeb">Ilabaya</option> <option class="p_jorgeb">Ite</option> <option class="p_jorgeb">Locumba</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of JorgeBasadre) {
                item.style.display = "block";
            }
            d.selectedIndex = JorgeBasadre[0].index;
            break;

        case "Tumbes":
            d.innerHTML = '<option class="p_tumb">Tumbes</option> <option class="p_tumb">Corrales</option> <option class="p_tumb">La cruz</option> <option class="p_tumb">Pampas de hospital</option> <option class="p_tumb">San jacinto</option> <option class="p_tumb">San juan de la virgen</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Tumbes) {
                item.style.display = "block";
            }
            d.selectedIndex = Tumbes[0].index;
            break;

        case "Contralmirante Villar":
            d.innerHTML = '<option class="p_contra">Zorritos</option> <option class="p_contra">Casitas</option> <option class="p_contra">Canoas de punta sal</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of ContralmiranteVillar) {
                item.style.display = "block";
            }
            d.selectedIndex = ContralmiranteVillar[0].index;
            break;

        case "Zarumilla":
            d.innerHTML = '<option class="p_zaru">Zarumilla</option> <option class="p_zaru">Aguas verdes</option> <option class="p_zaru">Matapalo</option> <option class="p_zaru">Papayal</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Zarumilla) {
                item.style.display = "block";
            }
            d.selectedIndex = Zarumilla[0].index;
            break;

        case "Coronel Portillo":
            d.innerHTML = '<option class="p_corop">Calleria</option> <option class="p_corop">Campoverde</option> <option class="p_corop">Iparia</option> <option class="p_corop">Masisea</option> <option class="p_corop">Yarinacocha</option> <option class="p_corop">Nueva requena</option> <option class="p_corop">Manantay</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of CoronelPortillo) {
                item.style.display = "block";
            }
            d.selectedIndex = CoronelPortillo[0].index;
            break;

        case "Atalaya":
            d.innerHTML = '<option class="p_atala">Raimondi</option> <option class="p_atala">Sepahua</option> <option class="p_atala">Tahuania</option> <option class="p_atala">Yurua</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Atalaya) {
                item.style.display = "block";
            }
            d.selectedIndex = Atalaya[0].index;
            break;

        case "Padre Abad":
            d.innerHTML = '<option class="p_abad">Padre Abad</option> <option class="p_abad">Irazola</option> <option class="p_abad">Curimana</option> <option class="p_abad">Neshuya</option> <option class="p_abad">Alexander von Humboldt</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of PadreAbad) {
                item.style.display = "block";
            }
            d.selectedIndex = PadreAbad[0].index;
            break;

        case "Purús":
            d.innerHTML = '<option class="p_purus">Purus</option>';
            for (let item of x) {
                item.style.display = "none";
            }
            for (let item of Purus) {
                item.style.display = "block";
            }
            d.selectedIndex = Purus[0].index;
            break;


        default:
            // code block
    }
}