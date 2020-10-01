<?php
    include 'src/includes/header.php'
?>

    <main class="main-us">
        <section class="sct-banner-int pos-rel" id="section0">
            <img src="assets/images/banner/preguntas-frecuentes.jpg" alt="" class="img-cover">
            <div class="container content-title-banner">
                <h1 class="title-banner font-nexaheavy text-uppercase">Preguntas Frecuentes</h1>
            </div>
        </section>
        <section class="sct-qa">
            <div class="container">
                <div class="row">
                    <!-- BREADCRUMB -->
                    <div class="col-xs-12">
                        <ol class="breadcrumb row">
                            <li class="item-bradcrumb"><a href="#" class="link-bradcrumb p-internas">Home</a></li>
                            <li class="item-bradcrumb"><a href="#" class="link-bradcrumb p-internas active">Preguntas
                                    Frecuentes</a></li class="item-bradcrumb">
                        </ol>
                    </div>
                    <!-- TITLE / DESCRIPTION PAGE -->
                    <div class="col-xs-12">
                        <div class="row animatedParent animateOnce" data-sequence='500'>
                            <div class="col-xs-12 col-sm-6 col-md-5 animated fadeInLeftShort" data-id="1">
                                <h2 class="title-border text-uppercase font-nexaheavy">Respuestas<br> sobre su
                                    producto<br> de beurer</h2>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-5 animated growIn slowest" data-id="2">
                                <p class="p-internas">Si tiene preguntas sobre su producto de Beurer o está interesado
                                    en comprar un producto de Beurer concreto, aquí encontrará muchas respuestas que le
                                    ayudarán. En caso de que no encuentre lo que busca, póngase en contacto con nuestro
                                    servicio de atención al cliente.</p>
                            </div>
                        </div>
                    </div>
                    <!-- CARDS PRODUCTS INTERNAS -->
                    <div class="col-xs-12">
                        <ul class="animatedParent animateOnce"  data-sequence='600'>
                            <li class="col-xs-2 card-product-int belleza px-0 animated fadeInLeftShort" data-id='1' >
                                <a href="#" class="a-img">
                                    <div class="img-a">
                                        <img class="img-cover" src="assets/images/int-product/belleza-int.jpg" alt="">
                                    </div>
                                    <div class="title-card-int text-center">
                                        <i class="icon-card-int icon-belleza"></i>
                                        <h3 class="font-bold">Belleza</h3>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-2 card-product-int salud px-0 animated fadeInLeftShort" data-id='2' >
                                <a href="#">
                                    <div class="img-a">
                                        <img class="img-cover" src="assets/images/int-product/salud-int.jpg" alt="">
                                    </div>
                                    <div class="title-card-int text-center">
                                        <i class="icon-card-int icon-salud"></i>
                                        <h3 class="font-bold">Salud</h3>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-2 card-product-int bienestar px-0 animated fadeInLeftShort" data-id='3' >
                                <a href="#">
                                    <div class="img-a">
                                        <img class="img-cover" src="assets/images/int-product/bienestar-int.jpg" alt="">
                                    </div>
                                    <div class="title-card-int text-center">
                                        <i class="icon-card-int icon-bienestar"></i>
                                        <h3 class="font-bold">Bienestar</h3>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-2 card-product-int act px-0 animated fadeInLeftShort" data-id='4'>
                                <a href="#">
                                    <div class="img-a">
                                        <img class="img-cover" src="assets/images/int-product/actividad-int.jpg" alt="">
                                    </div>
                                    <div class="title-card-int text-center">
                                        <i class="icon-card-int icon-actividad"></i>
                                        <h3 class="font-bold">Actividad</h3>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-2 card-product-int l-bb px-0 animated fadeInLeftShort" data-id='5'>
                                <a href="#">
                                    <div class="img-a">
                                        <img class="img-cover" src="assets/images/int-product/linea-bb-int.jpg" alt="">
                                    </div>
                                    <div class="title-card-int text-center">
                                        <i class="icon-card-int icon-linea-bb"></i>
                                        <h3 class="font-bold">Línea Bebé</h3>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-2 card-product-int app px-0 animated fadeInLeftShort" data-id='6'>
                                <a href="#">
                                    <div class="img-a">
                                        <img class="img-cover" src="assets/images/int-product/app-int.jpg" alt="">
                                    </div>
                                    <div class="title-card-int text-center">
                                        <i class="icon-card-int icon-aplicaciones"></i>
                                        <h3 class="font-bold">Aplicaciones</h3>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- FILTER QA -->
                    <div class="col-xs-12 col-md-9 wrapper-select animatedParent animateOnce"  data-sequence='500'>
                        <div class="dropdown-select animated fadeInLeftShort" data-id="1">
                            <select id="select-stores" class="font-light text-capitalize">
                                <option value="belleza" class="stores">Línea belleza</option>
                                <option value="salud" class="stores">Línea Salud</option>
                                <option value="bienestar" class="stores">Línea Bienestar</option>
                                <option value="actividad" class="stores">Línea actividad</option>
                                <option value="linea-bb" class="stores">Línea Bebé</option>
                                <option value="app" class="stores">aplicaciones</option>
                            </select>
                        </div>

                        <div class="dropdown-select animated fadeInLeftShort" data-id="2">
                            <select id="select-stores" class="font-light text-capitalize">
                                <option value="benavides" class="stores">depilacion</option>
                                <option value="magdalena" class="stores">depilacion 2</option>
                            </select>
                        </div>

                        <div class="dropdown-select animated fadeInLeftShort" data-id="3">
                            <select id="select-stores" class="font-light text-uppercase">
                                <option value="benavides" class="stores">ipl</option>
                                <option value="magdalena" class="stores">ipl 2</option>
                            </select>
                        </div>

                    </div>
                    <!-- ACCORDION QA -->
                    <h1 class="col-xs-12 title-product-acc font-nexaheavy text-uppercase">IPL</h1>
                    <div class="col-xs-12 col-md-9 px-0">
                        <ul class="accordion">
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Funcionan realmente los
                                    aparatos IPL de beurer? <i class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">Sí. Tests clínicos realizados por médicos han demostrado que
                                        la tecnología integrada en los aparatos IPL de beurer permite alcanzar
                                        resultados de depilación duraderos con seguridad.</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿En qué partes del cuerpo
                                    puedo utilizar el aparato IPL de beurer? <i class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">Los aparatos IPL de beurer han sido desarrollados para una
                                        depilación completa del cuerpo. Las zonas de tratamiento más frecuentes son las
                                        piernas, axilas, brazos, ingles y el rostro por debajo de los pómulos.</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Es seguro el sistema
                                    utilizado en los aparatos IPL de beurer? <i class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">Nuestros productos se desarrollan prestando especial atención
                                        a su seguridad y utilizan una tecnología clínicamente probada. No obstante, este
                                        aparato, como cualquier otro producto o equipo electrónico destinado a su
                                        utilización sobre la piel, debe ser utilizado respetando las instrucciones de
                                        uso y las indicaciones de seguridad para el usuario..</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Es doloroso el
                                    tratamiento con un aparato IPL de beurer? <i class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">Utilizándolo correctamente, la mayoría de los usuarios afirman
                                        percibir una ligera sensación de calor en el momento de emitirse el pulso de
                                        luz. Los aparatos IPL de beurer disponen de niveles de energía ajustables
                                        individualmente que se pueden utilizar en función de cada sensibilidad.</p>
                                </div>
                            </li>
                            <!-- <li class="list-accordion"><a class="accordion-heading font-bold">¿Con qué frecuencia debo
                                    usar el aparato IPL de beurer? <i class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">¡Tu Satisfacción es lo primero!</p>
                                </div>
                            </li> -->
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Para qué color de vello
                                    se consiguen los mejores resultados de depilación? <i class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">Los aparatos IPL de beurer ofrecen los mejores resultados en
                                        los tipos de vello más oscuros o en el vello que contiene más cantidad de
                                        melanina. La melanina es el pigmento que dota de color al pelo y a la piel, y
                                        que absorbe la energía de la luz. El pelo negro y castaño oscuro muestran la
                                        mejor reacción. El pelo castaño y castaño claro reaccionan también, si bien
                                        requieren normalmente más sesiones de depilación. El vello pelirrojo puede dar
                                        ciertos resultados.</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Funcionan los aparatos
                                    IPL de beurer con vello blanco, gris o rubio? <i class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">El vello blanco, gris o rubio no suele reaccionar a un método
                                        de fotodepilación, a pesar de que algunos usuarios han constatado resultados
                                        después de varias sesiones de depilación.</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Puedo utilizar el aparato
                                    IPL de buerer sobre una piel bronceada o negra? <i class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">El tratamiento de una piel de color oscuro mediante
                                        fotodepilación puede dejar secuelas, como p. ej. quemaduras, ampollas y
                                        alteraciones del color de la piel (hiperpigmentación o hipopigmentación). Los
                                        aparatos IPL de beurer disponen de un sensor de color de piel integrado que mide
                                        al principio de cada sesión de depilación y de forma aleatoria durante la propia
                                        sesión el color de la piel sometida al tratamiento. El sensor de color de piel
                                        impide que se emitan más pulsos si detecta que se está utilizando el aparato
                                        sobre una piel demasiado oscura.</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿A partir de qué momento
                                    veré resultados tras el tratamiento con un aparato IPL de beurer? <i
                                        class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">En la fotodepilación los resultados no son visibles
                                        inmediatamente. El vello tiene tres etapas de crecimiento diferentes, y los
                                        aparatos IPL solamente afectan al vello que se encuentra en una fase de
                                        crecimiento activa. Por eso son necesarias varias sesiones para conseguir el
                                        resultado deseado.</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Pueden utilizar los
                                    hombres los aparatos IPL de beurer? <i class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">Sí, el aparato puede ser utilizado tanto por mujeres como por
                                        hombres. Sin embargo, el vello masculino, y en especial el del pecho, requiere
                                        más sesiones de depilación que en las mujeres hasta alcanzar el resultado
                                        deseado. Los hombres no pueden utilizar el aparato en el rostro.</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Puede una utilización a
                                    largo plazo de los aparatos IPL de beurer representar un peligro para mi piel? <i
                                        class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">Hasta ahora no se han conocido daños en la piel por la
                                        utilización a largo plazo de aparatos de fotodepilación.</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Pueden utilizar las
                                    mujeres los aparatos IPL de beurer para eliminar vello de la barbilla o de otros
                                    sitios del rostro? <i class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">Sí, los aparatos IPL de beurer pueden ser utilizados por
                                        mujeres para el tratamiento de vello facial por debajo de los pómulos. Cuando se
                                        utiliza en el rostro hay que tener especial cuidado para no tocar la zona de los
                                        ojos: los aparatos IPL no deben utilizarse en ningún caso alrededor de o junto a
                                        los ojos.</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Cuánto tiempo debo
                                    esperar después de tomar el sol para un tratamiento con un aparato IPL de beurer? <i
                                        class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">Debería esperar como mínimo 48 horas después de tomar el sol
                                        antes de utilizar el aparato IPL de beurer. Lo ideal sería que protegiera su
                                        piel dos semanas antes del tratamiento con crema solar LSF 30+.</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Qué debo tener en cuenta
                                    después de un tratamiento con un aparato IPL de beurer? <i
                                        class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">Tras el tratamiento debe esperar al menos 48 horas para tomar
                                        el sol. Las dos primeras semanas posteriores al tratamiento debe cubrir la piel
                                        tratada con ropa cuando tome el sol o aplicar un protector solar (como mínimo
                                        LSF 30).</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Cómo debo cuidar la
                                    superficie tratada tras utilizar un aparato IPL de beurer? <i
                                        class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">La zona de la piel tratada puede ser limpiada y cuidada con
                                        los productos de cuidado habitual de la piel.</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Cómo preparo mi piel de
                                    la mejor manera posible para el tratamiento con el aparato IPL de beurer? <i
                                        class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">Su piel debe estar limpia, seca y rasurada. No utilice cremas,
                                        desodorantes o productos cosméticos antes del tratamiento. Además, debe proteger
                                        las zonas de la piel a tratar como mínimo 48 horas antes de la aplicación antes
                                        de la radiación solar.</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Puede utilizarse el
                                    aparato IPL beurer para depilar las cejas? <i class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">No, el aparato no debe utilizarse encima de los pómulos para
                                        prevenir daños en los ojos.</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Puede ser utilizado el
                                    aparato IPL de beurer por personas diabéticas? <i class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">Los aparatos IPL no son adecuados para personas diabéticas, ya
                                        que estas posiblemente tienen una menor sensibilidad al dolor y por tanto no
                                        notarían una sobreexposición de la piel.</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Pueden utilizar los
                                    hombres el aparato IPL de beurer para la depilación de la zona íntima? <i
                                        class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">El aparato también puede ser utilizado por hombres para
                                        eliminar el vello no deseado, pero no en los genitales (testículos, pene) ni en
                                        el ano. Debido a la sensibilidad de la zona íntima se recomienda utilizar un
                                        nivel de energía bajo.</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Pueden utilizar las
                                    mujeres el aparato IPL de beurer para la depilación de la zona íntima? <i
                                        class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">Sí, pero debido a la sensibilidad de la zona íntima se
                                        recomienda utilizar un nivel de energía bajo. El aparato no puede utilizarse en
                                        los genitales ni en las mucosas (vagina, labios interiores, recto).</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">Tengo un tatuaje, ¿puedo
                                    utilizar a pesar de todo el aparato IPL de beurer? <i class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">El aparato IPL no se puede utilizar en zonas de piel tatuadas.
                                    </p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Puede utilizarse el
                                    aparato IPL de beurer sobre pecas, lunares y marcas de nacimiento? <i
                                        class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">No, el aparato IPL no se puede utilizar sobre pecas, lunares
                                        ni marcas de nacimiento.</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Se puede utilizar para la
                                    depilación en el pecho el aparato IPL de beurer? <i class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">Sí, pero no en los pezones ni en la areola.</p>
                                </div>
                            </li>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold">¿Necesito un gel de
                                    contacto para el tratamiento con el aparato IPL? <i class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas">No, no es necesario utilizar un gel de contacto. El aparato
                                        IPL se ha concebido de forma que puede utilizarse sobre la piel seca y limpia
                                        sin añadir nada. Además, el gel de contacto dañaría el aparato.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <?php
        include 'src/includes/footer.php'
    ?>

</body>

</html>