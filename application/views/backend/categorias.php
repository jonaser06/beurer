<!DOCTYPE html>
<html>
    <head>
        <?= $this->load->view('backend/chunks/head', array(), TRUE) ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?= $this->load->view('backend/chunks/header', array(), TRUE) ?>
            <?= $this->load->view('backend/chunks/sidebar', array(), TRUE) ?>

            <div class="content-wrapper">

                <section class="content-header">
                    <h1>
                        Administrador de Categorías
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
                                <a href="javascript: Exeperu.addCategoria()" class="btn btn-xs btn-info btn-flat"><i class="glyphicon glyphicon-plus"></i> Agregar</a><br><br>
                                <table id="table_categorias" class="table table-bordered table-striped table-hover nowrap dataTable dtr-inline collapsed">
                                    <thead>
                                        <tr>
                                            <th>Categoría</th>
                                            <th>Color</th>
                                            <th>Estado</th>
                                            <th>recojo</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><strong>NO TIENES ACCESO A ESTE MÓDULO</strong></h3>

                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

            <!-- Main Footer -->
            <?= $this->load->view('backend/chunks/footer', array(), TRUE) ?>
        </div>

        <?= $this->load->view('backend/chunks/modalLoading', array(), TRUE) ?>

        <!-- REQUIRED JS SCRIPTS -->
        <?= $this->load->view('backend/chunks/scripts', array(), TRUE) ?>

       <script src=" <?= getFilex('mgr/exeperu/js/categorias.js') ?>"></script>
        <script>
          
        </script> 
        <script>
            
            let table = $('#table_categorias').DataTable({
            "ajax": "manager/categorias/readCat",
                "columns": [
                    { "data": "pagina" },
                    { "data": "color" ,'render' : function (data , type , row ) {
                        if(data){
                            return `<div style=" ;width:20px;height:20px;border-radius:50px;padding:3px;background:${data}"></div>`
                        }
                        return `<span class="label label-warning"> sin color </span>`;
                    }},
                    { "data": "estado" , 'render' : function (data , type , row ,meta) {
                        let salida ;
                        salida = `<span class="label 
                        ${data == 1 ? 'label-success' : 'label-danger'}
                        ">
                        ${data == 1 ? 'Activado' : 'Desactivado'}
                        </span>`;
                        return salida;
                    } },
                    { "data": "idpagina", 'render': function(data, type, row){
                       var salida;
                        salida = "<a href=\"javascript:Exeperu.editCategoria("+data+");\" class=\"btn btn-primary btn-sm btn-flat\"><i class=\"fa fa-pencil\"></i></a>";
                        salida += " | ";
                        salida += "<a href=\"javascript:eliminarCategory("+data+");\" id=\"categoria_"+data+"\" class=\"btn btn-danger btn-sm btn-flat\"><i class=\"fa fa-trash-o\"></i></a>";
                        
                        return  salida;
                    } },
                ]
            });
            
           class TableCategorias {
                constructor(  ) {
                    
                }
                 addCategoria() {
                     
                 }
           }

        </script>

    
    </body>
</html>