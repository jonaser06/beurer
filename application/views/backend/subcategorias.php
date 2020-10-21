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

                        Administrador de Subcategoría

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

                                        <li role="presentation" class="active"><a href="#sproductos" aria-controls="home" role="tab" data-toggle="tab">Subcategoría</a></li>

                                        <!--<li role="presentation"><a href="#stipos" aria-controls="profile" role="tab" data-toggle="tab">Tipos de productos</a></li>-->

                                    </ul>

                                    <div role="tabpanel" class="tab-pane active" id="sproductos"><br>

                                        <div class="row">

                                            <form id="form_exportable" action="manager/productos/exportar" method="post" target="_blank">

                                                                            

                                                <div class="col-sm-2" style="width:130px;">

                                                   

                                                </div>





                                            </form>

                                        </div>
                                        <br>
                                        <a href="javascript: addsubcategory();" class="btn btn-sm btn-info btn-flat"><i class="glyphicon glyphicon-plus"></i> Agregar Subcategoría</a>

                                        <!--<a href="javascript: Exeperu.addComplemento()" class="btn btn-sm btn-info btn-flat"><i class="glyphicon glyphicon-plus"></i> Agregar complemento</a>-->

                                        <br><br>

                                        <div class="row">

                                         <!--    <form id="form_exportable" action="" method="post" target="_blank">

                                                <div class="col-xs-2">

                                                    <div class="form-group">

                                                        <label>Ver:</label>

                                                        <select class="form-control" name="tipoprod" id="tipoprod">

                                                            <option value="0">Productos</option>

                                                            <option value="1">Complementos</option>

                                                        </select>

                                                    </div> 

                                                </div>

                                            </form> -->

                                        </div>

                                        <table id="table_subcategory" class="table table-bordered table-striped table-hover">

                                            <thead>

                                                <tr>

                                                    <th>Subcategoría</th>

                                                    <th>Categoría</th>

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

        <!-- ./wrapper -->



        <?= $this->load->view('backend/chunks/modalLoading', array(), TRUE) ?>

        <div class="modal fade" id="editcat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!--  -->
                <form id="form_subcategoria">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Subcategoría</h4>
                  </div>
                  <div class="modal-body">
                        <input type="hidden" id="subcatid" name="subcatid">
                        <div class="form-group">
                            <label>Categoría</label>
                            <select class="form-control" id="categoriaselect" name="categoria">
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Subcategoría</label>
                            <input type="text" id="subcategoria" class="form-control" name="subcategoria">
                        </div>

                        <div class="form-group">
                            <label>Imagen</label>
                            <div class="input-group">
                                <input type="text" id="setImagen" class="form-control" name="setimagen">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('setImagen', '', '<?= $this->config->item('akey'); ?>');">
                                        <span class="glyphicon glyphicon-picture"></span>
                                    </button>
                                </div>
                            </div>                          
                        </div>
                        <div class="form-group">
                            <label>Subtítulo</label>
                            <input type="text" id="setSubtitulo" class="form-control" name="setsubtitulo">
                        </div>
                        <div class="form-group">
                            <label>Contenido</label>
                            <textarea class="form-control richtext" name="setcontenido" rows="5" id="setcontenido"></textarea>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
              </form>
              <!--  -->
            </div>
          </div>
        </div>

        <!-- REQUIRED JS SCRIPTS -->

        <?= $this->load->view('backend/chunks/scripts', array(), TRUE) ?>



        <script src="<?= getFilex('mgr/exeperu/js/productos.js') ?>"></script>



        <script>
        // Add Subcategoría //-->
        function addsubcategory(){
            $('#modalLoading').modal('show');
            $('#subcatid').val('');

            $('#form_subcategoria')[0].reset();

            $.ajax({
                url: 'manager/subcategorias/getcat',
            })
            .done(function(data) {
                $('#editcat').modal('show')
                var opt = "";
                data.cat.forEach(function(campo, index){
                    opt += "<option value=\""+campo.idpagina+"\">"+campo.pagina+"</option>";
                });
                $('#categoriaselect').html(opt);

                
                console.log(data.cat);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                $('#modalLoading').modal('hide');
            });

        }


        $('#form_subcategoria').submit(function(event) {
            event.preventDefault();
            $('#editcat').modal('hide');
            $('#modalLoading').modal('show');
            $.ajax({
                url: 'manager/subcategorias/save',
                type: 'POST',
                data: $(this).serialize()
            })
            .done(function(response) {
                setTimeout(function() { location.reload() }, 1000);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
                $('#modalLoading').modal('hide');
            });
            
        });



        function editarCategory(id){
            $('#modalLoading').modal('show');
            $.ajax({
                url: 'manager/subcategorias/getcat',
                type: 'POST',
                data: {catid: id},
            })
            .done(function(data) {
                $('#subcategoria').val(data.subcat.titulo);
                $('#setImagen').val(data.subcat.imagen);
                $('#setSubtitulo').val(data.subcat.subtitle);
                $('#setcontenido').val(data.subcat.contenido);
                $('#editcat').modal('show');
                var opt = "";
                data.cat.forEach(function(campo, index){
                    if(campo.idpagina == data.subcat.idpagina){
                        opt += "<option value=\""+campo.idpagina+"\" selected>"+campo.pagina+"</option>";
                    }else{
                        opt += "<option value=\""+campo.idpagina+"\">"+campo.pagina+"</option>";
                    }
                });
                $('#subcatid').val(data.subcat.id);
                $('#categoriaselect').html(opt);

                
                //console.log(data.cat);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                $('#modalLoading').modal('hide');
            });
            
        }

        function eliminarCategory(id){
                    
            
            $('#modalLoading').modal('show');

            $.ajax({
                url: 'manager/subcategorias/delete',
                type: 'POST',
                data: {subcatid: id},
            })
            .done(function() {
                table.row( $('#categoria_'+id).parents('tr') )
                    .remove()
                    .draw();

            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                $('#modalLoading').modal('hide');
            });
            
        }

        var table = $('#table_subcategory').DataTable({
            "ajax": "manager/subcategorias/read",
                "columns": [
                    { "data": "titulo" },
                    { "data": "pagina" },
                    { "data": "id", 'render': function(data, type, row){
                       var salida;
                        salida = "<a href=\"javascript:editarCategory("+data+");\" class=\"btn btn-primary btn-sm btn-flat\"><i class=\"fa fa-pencil\"></i></a>";
                        salida += " | ";
                        salida += "<a href=\"javascript:eliminarCategory("+data+");\" id=\"categoria_"+data+"\" class=\"btn btn-danger btn-sm btn-flat\"><i class=\"fa fa-trash-o\"></i></a>";
                        
                        return  salida;
                    } },
                ]
            });




        </script>

    </body>

</html>

