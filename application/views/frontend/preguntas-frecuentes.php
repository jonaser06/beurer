<?php
    include 'src/includes/header.php'
?>

    <main class="main-us">
        <section class="sct-banner-int pos-rel" id="section0">
            <img src="<?= base_url($contenido['Imagenpf']) ?>" alt="" class="img-cover">
            <div class="container content-title-banner">
                <h1 class="title-banner font-nexaheavy text-uppercase"><?php echo $contenido['titulopf']; ?></h1>
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
                                <h2 class="title-border text-uppercase font-nexaheavy"><?php echo $contenido['titulo']; ?></h2>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-5 animated growIn slowest" data-id="2">
                                <p class="p-internas"><?php echo $contenido['contenido']; ?></p>
                            </div>
                        </div>
                    </div>
    
                    <!-- FILTER QA -->
                    <div class="col-xs-12 col-md-9 wrapper-select animatedParent animateOnce"  data-sequence='500'>
                        <div class="dropdown-select animated fadeInLeftShort" data-id="1">
                            <select id="select-stores" class="font-light text-capitalize sl_cat">
                            </select>
                        </div>

                        <div class="dropdown-select animated fadeInLeftShort" data-id="2">
                            <select id="select-stores" class="font-light text-capitalize select_subcat">
                                <option value="benavides" class="stores">-Seleccionar-</option>
                            </select>
                        </div>

                        <div class="dropdown-select animated fadeInLeftShort" data-id="3">
                            <select id="select-stores" class="font-light text-uppercase select_pro">
                                <option value="benavides" class="stores">-Seleccionar-</option>
                            </select>
                        </div>

                    </div>
                   <!--  <?php print_r($contenido); ?> -->
                    <!-- ACCORDION QA -->
                    <h1 class="col-xs-12 title-product-acc font-nexaheavy text-uppercase">IPL</h1>
                    <div class="col-xs-12 col-md-9 px-0">
                        <ul class="accordion">
                            <?php foreach ($contenido['preguntasf'] as $row): ?>
                            <li class="list-accordion" data-cat="<?= $row['categoria']; ?>" data-subcat="<?= $row['subcategoria']; ?>" data-producto="<?= $row['producto']; ?>">
                                <a class="accordion-heading font-bold"><?= $row['titulo']; ?><i class="icon-cerrar"></i></a>
                                <div class="accordion-content">
                                    <p class="p-internas"><?= $row['contenido']; ?></p>
                                </div>
                            </li>
                            <?php endforeach ?>

                        </ul>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <?php
        include 'src/includes/footer.php'
    ?>
<script type="text/javascript">
        liscategorias();

        function liscategorias(){                

            var html='<option value="0">Seleccione una categoría...</option>';

            $(".sl_cat").html(html);
            $.ajax({    
               url:'<?= base_url('categorias/list/'); ?>',
               success:function(response){
                   $.each(response ,function(i,item){
                      var html = '<option  value="'+item.idpagina+'">'+item.pagina+'</option>'; 
                      $(".sl_cat").append(html);
                   });
                }
            });

        }

        $(".sl_cat").change(function(e){
                e.preventDefault();
                var idcat=$(this).val();
                var xd='<option value="">Seleccione una subcategoría...</option>';
                $(".select_subcat").html(xd);
                 $.ajax({
                    url:'<?= base_url('categorias/lissubcategorias'); ?>',
                    type:'post',
                    data:{'idcat':idcat},
                    success:function(response){
                        $.each(response, function(i,item){
                           var html='<option  value="'+item.id+'">'+item.titulo+'</option>'; 
                           $(".select_subcat").append(html);
                        });

                       // $('.accordion').css('display', 'block');
                       $(".list-accordion").css( "display", "none" );
                        var p = $('.sl_cat').val()
                        console.log(p);
                        $( "[data-cat='"+p+"']" ).css( "display", "block" );
                    }
                 });

                 $(".select_subcat").val(0);

        });

        $(".select_subcat").change(function(e) {
            e.preventDefault();

                var idsubcat=$(this).val();

                var xd='<option value="">Seleccione una subcategoría...</option>';
                $(".select_pro").html(xd);
                 $.ajax({
                    url:'<?= base_url('categorias/getProducto'); ?>',
                    type:'post',
                    data:{'idsubcat':idsubcat},
                    success:function(response){
                        $.each(response, function(i,item){
                           var html='<option  value="'+item.titulo+'">'+item.titulo+'</option>'; 
                           $(".select_pro").append(html);
                        });


                        $(".list-accordion").css( "display", "none" );
                        var p = $('.select_subcat').val()
                        console.log(p);
                        $( "[data-subcat='"+p+"']" ).css( "display", "block" );
                    }
                 });

                 $(".select_pro").val(0);
        });


        $('.select_pro').change(function(event) {
            $(".list-accordion").css( "display", "none" );
            var p = $('.select_pro').val();
            console.log(p);
            $( "[data-producto='"+p+"']" ).css( "display", "block" );
        });
        
</script>
</body>

</html>