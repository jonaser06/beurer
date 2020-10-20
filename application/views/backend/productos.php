<!DOCTYPE html>

<html>

    <head>

        <?= $this->load->view('backend/chunks/head', array(), TRUE) ?>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">

        <div class="wrapper">

            <!-- Main Header -->

            <?= $this->load->view('backend/chunks/header', array(), TRUE) ?>

            <!-- Left side column. contains the logo and sidebar -->

            <?= $this->load->view('backend/chunks/sidebar', array(), TRUE) ?>



            <!-- Content Wrapper. Contains page content -->

            <div class="content-wrapper">

                <!-- Content Header (Page header) -->

                <?php 

                $uri=$this->uri->segment_array();

                $modulo=$this->sistema->getModulo($uri[2]);

                if(in_array($modulo['idmodulo'],$modulosjm)){

                ?>

                <section class="content-header">

                    <h1>

                        Administrador de Productos

                        <!--<small>Optional description</small>-->

                    </h1>

                </section>



                <!-- Main content -->

                <section class="content container-fluid">

                    <div class="box box-primary">

                        <div class="box-header with-border">

                            <!--<h3 class="box-title">Filtrar</h3>-->

                            <div class="container">

                                

                            </div>

                        </div>

                        <div class="box-body">

                            <div class="nav-tabs-custom">

                                <div class="tab-content">

                                    <ul class="nav nav-tabs" role="tablist">

                                        <li role="presentation" class="active"><a href="#sproductos" aria-controls="home" role="tab" data-toggle="tab">Productos</a></li>

                                        <!--<li role="presentation"><a href="#stipos" aria-controls="profile" role="tab" data-toggle="tab">Tipos de productos</a></li>-->

                                    </ul>

                                    <div role="tabpanel" class="tab-pane active" id="sproductos"><br>

                                        <div class="row">

                                            <form id="form_exportable" action="manager/productos/exportar" method="post" target="_blank">

                                                <!-- <div class="col-xs-2">

                                                    <div class="form-group">

                                                        <label>Filtrar</label>

                                                        <select class="form-control" name="filtro" id="filtro">

                                                            <option value="0">Todos</option>

                                                            <option value="1">Categoria / Subcategoria</option>                                               

                                                        </select>

                                                    </div> 

                                                </div> -->

                                                <div class="col-xs-6 col-md-2" id="cont_categorias">

                                                    <div class="form-group">

                                                        <label>Categorias</label>

                                                        <!-- <select class="form-control select-filter" name="liscategorias" id="liscategorias"> -->
                                                        <select class="form-control select-filter" name="liscategorias" id="liscategorias">

                                                          

                                                        </select>

                                                    </div> 

                                                </div>

                                                <div class="col-xs-6 col-md-2" id="cont_subcategorias">

                                                    <div class="form-group">

                                                        <label>Subcategorias</label>

                                                        <select class="form-control" name="lissubcategorias" id="lissubcategorias">                                                          

                                                        </select>

                                                    </div> 

                                                </div>                                      

                                                <div class="col-sm-2" style="width:130px;">

                                                   

                                                </div>





                                            </form>

                                        </div>
                                        <br>
                                        <!-- <a href="#" data-toggle="modal" data-target="#edit_producto" class="btn btn-sm btn-info btn-flat"><i class="glyphicon glyphicon-plus"></i> Agregar producto</a> -->

                                        <a href="javascript: Exeperu.addProducto()" class="btn btn-sm btn-info btn-flat"><i class="glyphicon glyphicon-plus"></i> Agregar Producto</a>

                                        <br><br>

                                        <table id="table_productos" class="table table-bordered table-striped table-hover">

                                            <thead>

                                                <tr>

                                                    <th>Nombre</th>
                                                    <th>Estado</th>
                                                    <th>Subcategoría</th>
                                                    <th>Categoría</th>
                                                    <th>Imagen</th>

                                                    <th></th> 

                                                </tr>

                                            </thead>

                                            <tbody></tbody>

                                        </table>

                                    </div>

                                    <!--<div role="tabpanel" class="tab-pane" id="stipos"><br>

                                        <a href="javascript: Exeperu.addTipo()" class="btn btn-sm btn-info btn-flat"><i class="glyphicon glyphicon-plus"></i> Agregar</a><br><br>

                                        <table id="table_tipos" class="table table-bordered table-striped table-hover">

                                            <thead>

                                                <tr>                                                    

                                                    <th>Tipo</th>

                                                    <th>Orden</th>

                                                    <th>Estado</th>

                                                    <th></th>

                                                </tr>

                                            </thead>

                                            <tbody></tbody>

                                        </table>

                                    </div>-->

                                </div>

                            </div>

                        </div>

                        <!--                        <div class="box-footer">

                                                    

                                                </div>-->

                    </div>

                </section>

                <?php }else{?>

                    <section class="content-header">

                        <h1>

                           NO TIENES ACCESO A ESTA PÁGINA

                        </h1>

                    </section>

                <?php }?>

                <!-- /.content -->

            </div>

            <!-- /.content-wrapper -->



            <!-- Main Footer -->

            <?= $this->load->view('backend/chunks/footer', array(), TRUE) ?>

        </div>

       


        <?= $this->load->view('backend/chunks/modalLoading', array(), TRUE) ?>



        <!-- REQUIRED JS SCRIPTS -->

        <?= $this->load->view('backend/chunks/scripts', array(), TRUE) ?>



        <script src="<?= getFilex('mgr/exeperu/js/productos.js') ?>"></script>



        <script>
        $(document).ready(function(){      
            liscategorias();
            function liscategorias(){                
                let html='<option value="0">Seleccione una categoría...</option>';
                $("#liscategorias").html(html);

                $.ajax({
                   url:'<?= base_url('categorias/list/'); ?>',
                   success:function(response){
                       $.each(response ,function(i,item){
                          let html = '<option  value="'+item.idpagina+'">'+item.pagina+'</option>'; 
                          $("#liscategorias").append(html);
                       });
                   },complete: function(data) {
                        
                        if($(localStorage.getItem('categoria'))) {
                            const list=  document.querySelectorAll('#liscategorias > option')
                            list.forEach(option => {
                                if(option.value == localStorage.getItem('categoria')) {
                                
                                    option.setAttribute('selected','selected');
                                    $.ajax({
                                        url:'<?= base_url('categorias/lissubcategorias'); ?>',
                                        type:'post',
                                        data:{'idcat': option.value},
                                        success:function(response){

                                            $.each(response, function(i,item){
                                            let html='<option  value="'+item.titulo+'">'+item.titulo+'</option>'; 
                                            $("#lissubcategorias").append(html);
                                            });
                                            if(localStorage.getItem('subcategoria')){
                                                const subCat =  document.querySelectorAll('#lissubcategorias > option')
                                                subCat.forEach(sub => {
                                                    if(sub.textContent == localStorage.getItem('subcategoria')){
                                                        sub.setAttribute('selected','selected')
                                                        table.columns( 2 )
                                                        .search( sub.textContent )
                                                        .draw();
                                                    }
                                                })
                                                
                                                
                                            }
                                        }
                                    });
                                }
                            })
                         }
                    }
                });
            }
            $("#lissubcategorias").change(function() {
                table.columns( 2 )
                    .search( this.value )
                    .draw();
                    console.log(this.value)
                localStorage.setItem('subcategoria',this.value)
            });

            $("#liscategorias").change(function(e){
                
                e.preventDefault();
                let idcat = $(this).val();
                let search = "";
                let categorias = document.querySelectorAll('#liscategorias > option');
                categorias.forEach( cat => {
                    if( cat.value == idcat ){
                        search = cat.innerText;     
                    }
                })
                
                localStorage.setItem( 'categoria',idcat )
                let content ='<option value="">Seleccione una subcategoría...</option>';
                $("#lissubcategorias").html(content);
                 $.ajax({
                    url:'<?= base_url('categorias/lissubcategorias'); ?>',
                    type:'post',
                    data:{'idcat':idcat},
                    success:function(response){
                        $.each(response, function(i,item){
                           let html='<option  value="'+item.titulo+'">'+item.titulo+'</option>'; 
                           $("#lissubcategorias").append(html);
                        });
                    }
                 });
                 $("#lissubcategorias").val(0);
               
                    
                   
                
             });

                let table = $('#table_productos').DataTable({
                "ajax": "manager/productos/read",
                    "columns": [
                        { "data": "titulo" },
                        { "data": "active", "render" : function(data){
                            var i = "";
                            if (data == 1) {
                                i = "<span class='label label-success'>Activo</span>";
                            } else {
                                i = "<span class='label label-danger'>Desactivado</span>";
                            }

                            return i;
                            
                        } },
                        { "data": "subcategoria" },
                        { "data": "pagina" },
                        { "data": "imagen", "render" : function(data){
                            var salida;
                            salida = "<img src=\"<?= base_url();  ?>"+data+"\" width=\"80\">";
                            return  salida;
                        } },
                        { "data": "id", 'render': function(data, type, row){
                        var salida;
                            salida = "<a href=\"javascript:Exeperu.editProducto("+data+");\" class=\"btn editarBtn data-id ="+data+" btn-primary btn-sm btn-flat\"><i class=\"fa fa-pencil\"></i></a>";
                            salida += " | ";
                            salida += "<a href=\"javascript:Exeperu.eliminarProducto("+data+");\" id=\"categoria_"+data+"\" class=\"btn btn-danger btn-sm btn-flat\"><i class=\"fa fa-trash-o\"></i></a>";
                            
                            return  salida;
                        } },
                    ]
                });
        });

        var t = $('#tabla_descripcion').DataTable();

        function add_new_desc(){
            var counter = 1;
                t.row.add( [
                    '<input type="text" name="descripcion_'+counter+'">',
                    '1',
                ] ).draw( false );
                counter++;
        }

        </script>

    </body>

</html>

