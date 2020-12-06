<div class="modal-dialog modal-lg" role="document">

  <form id="formCrearEditarp" action="manager/productos/save" method="POST">

    <div class="modal-content">

        <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            <h4><strong>Producto</strong></h4>

        </div>

        <style>

                .form-group.required .control-label:after {

                        color: #d00;

                        content: "*";

                        position: absolute;

                        margin-left: 8px;

                        top:2px;

                  }

        </style>

        <div class="modal-body">

            <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;" id="tabs">

                    <li role="presentation" class="active">
                        <a href="#sdetalle" aria-controls="detalle" role="tab" data-toggle="tab">Detalle</a>
                    </li>
                    <li>
                        <a href="#destacados" aria-controls="descripcion" role="tab" data-toggle="tab">Relacionados</a>
                    </li>
                    <li>
                        <a href="#scategorias" aria-controls="descripcion" role="tab" data-toggle="tab">Imagenes</a>
                    </li>
                    <li>

                        <a href="#scomplementos" aria-controls="descripcion" role="tab" data-toggle="tab">Tiendas</a>

                    </li>
                    <li>

                        <a href="#saccesorios" aria-controls="descripcion" role="tab" data-toggle="tab">Accesorios</a>

                    </li>
                    <li>

                        <a href="#scaracteristica" aria-controls="caracteristica" role="tab" data-toggle="tab">Ficha técnica</a>

                    </li>

                    <li>

                        <a href="#sdescripcion" aria-controls="descripcion" role="tab" data-toggle="tab">Descripción</a>

                    </li>

                    

                    <li>

                        <a href="#sseo" role="tab" id="beneficios-tab" data-toggle="tab" aria-controls="complementos" aria-expanded="false">SEO</a>

                    </li>

                    <li>

                        <a href="#sface" role="tab" id="beneficios-tab" data-toggle="tab" aria-controls="complementos" aria-expanded="false">Facebook</a>

                    </li>
                    <li class="color-module" style="display:none">
                        <a href="#color-detalle" aria-controls="descripcion" role="tab" data-toggle="tab">Colores</a>
                    </li>
                    <li>
                        <a href="#detalles" aria-controls="descripcion" role="tab" data-toggle="tab">Dimensiones , peso y stock</a>
                    </li>

            </ul>

            <!-- Nav tabs -->

            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="sdetalle">

                    <div class="container-fluid">

                        <div class="row">

                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <select class="form-control" name="productos[active]">
                                                <?php if ($producto['active'] == 1): ?>
                                                    <option value="1" selected>Activado</option>
                                                    <option value="0">Desactivado</option>
                                                <?php else: ?>
                                                    <option value="1">Activado</option>
                                                    <option value="0" selected>Desactivado</option>
                                                <?php endif ?>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12">
                                        <div class="form form-group required">
                                            <label for="campo_1" class="control-label">Producto</label>
                                            <input type="text" class="form-control" id="nombre" name="productos[producto]" placeholder="Producto" value="<?= $producto['titulo'] ?>">
                                        </div>
                                    </div>    

                                    <div class="col-xs-12">
                                        <div class="form form-group required">
                                            <label for="campo_2" class="control-label">Subtítulo</label>
                                            <input type="text" class="form-control" id="subtitulo" name="productos[subtitulo]" placeholder="Subtítulo" value="<?= $producto['subtitulo'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form form-group required">
                                            <label for="contenido" class="control-label">Contenido</label>
                                            <textarea class="form-control" name="productos[contenido]" id="contenido" rows="4"><?= $producto['contenido'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group requiered">
                                            <label for="campo_2" class="control-label">Categoría</label>
                                            <select class="form-control" id="categoria" name="categoria" >
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group requiered">
                                            <label for="campo_2" class="control-label">Subcategoría</label>
                                            <select class="form-control" id="subcategoria" name="productos[subcategoria]">
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form form-group">
                                                <div class="form-check">
                                                    <input onchange ="showModule()" type="checkbox" class="form-check-input" id="colorAdd"
                                                    <?= var_dump($producto['detalles-multimedia'])?>
                                                    <?= isset($producto['detalles-multimedia']) && $producto['detalles-multimedia']!='[]'
                                                        ? 'checked':'';  ?>
                                                    >
                                                    <label class="form-check-label" for="colorAdd">colores</label>
                                                </div>
                                                <span class="message-color"></span>
                                        </div>
                                    </div>

                                    <div class="col-xs-7 d-none stock-module">
                                        <div class="form form-group">
                                                <label for="campo_1" class="control-label">Stock</label>
                                                <input type="number" step="1" class="form-control" id="stock" name="productos[stock]" min="0"placeholder="Ingrese el stock" value="<?= $producto['stock']?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-6">
                                        <div class="form form-group requiered">
                                                <label for="campo_1" class="control-label">Precio Online</label>
                                                <input type="number" step="any" class="form-control" id="stock" name="productos[precio]" min="0"placeholder="Precio Online" value="<?= $producto['precio']?>">
                                        </div>
                                    </div><div class="col-xs-6">
                                        <div class="form form-group">
                                                <label for="campo_1" class="control-label">precio  </label>
                                                <input type="number" step="any" class="form-control" id="stock" name="productos[precio_anterior]" min="0"placeholder="Precio" value="<?= $producto['precio_anterior']?>">
                                        </div>
                                    </div>
                                    
                                </div>


                                <div class="row">

                                    <div class="col-xs-12"> 

                                        <div class="form form-group required">

                                            <label for="campo_pdf" class="control-label">PDF</label>

                                            <div class="input-group">

                                                <input type="text" id="campo_pdf" name="productos[pdf]" class="form-control" placeholder="Selecciona tu PDF" value="<?= isset($producto['pdf']) ? $producto['pdf'] : ''; ?>">

                                                <div class="input-group-btn">

                                                    <button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('campo_pdf ', '', '<?= $this->config->item('akey'); ?>');">

                                                        <span class="glyphicon glyphicon-file"></span>

                                                    </button>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-xs-12">
                                        <div class="form-group requiered">
                                            <label for="productos[video]" class="control-label requiered">Enlace Video</label>
                                            <input type="text" class="form-control" id="video" name="productos[video]" value="<?= isset($producto['video']) ? $producto['video'] : ''; ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group requiered">
                                            <label for="productos[orden]" class="control-label requiered">Orden</label>
                                            <input type="text" class="form-control" id="orden" name="productos[orden]" value="<?= isset($producto['orden']) ? $producto['orden'] : ''; ?>">
                                        </div>
                                    </div>

                                </div>

                                </div>

                            </div>

                            </div>

                        </div>

                        <div role="tabpanel" class="tab-pane" id="destacados">

                            <div class="col-xs-12">
                                <div class="form-group" style="position: relative;">
                                    <label for="ft_prod">Productos relacionados</label>
                                    <textarea class="form-control" name="productos[relacionados]" id="prod_relacionados" rows="3" style="display: none;">
                                        <?= isset($producto['relacionados']) ? $producto['relacionados'] : '[]'; ?></textarea><br>
                                        
                                    <a href="javascript: Exeperu.crear_complemento_relacionados('<?= (isset($producto['id']) && (int) $producto['id'] > 0) ? $producto['id'] : '0' ?>')" class="btn btn-xs btn-info btn-flat"><i class="glyphicon glyphicon-plus"></i> Agregar</a><br><br>

                                    <div class="table-responsive">
                                        <table id="table_complementos_relacionados" class="table table-striped table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Productos</th>                                                            
                                                    <th></th>                                                            
                                                    <!-- <th>Sensor de actividad</th> -->                                                            
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div role="tabpanel" class="tab-pane" id="scaracteristica">

                            <div class="col-xs-12">

                                <div class="form-group" style="position: relative;">
                                    <label for="ft_prod">Ficha Técnica</label>
                                    <textarea class="form-control richtext" name="productos[ficha_tecnica]" rows="3"><?= isset($producto['ficha_tecnica']) ? $producto['ficha_tecnica'] : ''; ?></textarea>
                                    <!-- <textarea class="form-control" name="productos[ficha_tecnica]" id="ft_prod" rows="3" style="display: none;">
                                        <?= isset($producto['ficha_tecnica']) ? $producto['ficha_tecnica'] : '[]'; ?></textarea><br>

                                    <a href="javascript: Exeperu.crear_complemento_ft('<?= (isset($producto['id']) && (int) $producto['id'] > 0) ? $producto['id'] : '0' ?>')" class="btn btn-xs btn-info btn-flat"><i class="glyphicon glyphicon-plus"></i> Agregar</a><br><br>

                                    <div class="table-responsive">
                                        <table id="table_complementos_ft" class="table table-striped table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Denominación del producto</th>                                                            
                                                    <th>Sensor de actividad</th>                                                            
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div> -->
                                </div>

                            </div>

                        </div>

                        <div role="tabpanel" class="tab-pane" id="saccesorios">

                            <div class="col-xs-12">

                                <div class="form-group" style="position: relative;">
                                    <label for="ft_prod">Accesorios</label>
                                    <textarea class="form-control" name="productos[accesorio]" id="accesorio_prod" rows="3" style="display: none;">
                                        <?= isset($producto['accesorios']) ? $producto['accesorios'] : '[]'; ?>
                                    </textarea><br>
                                    <a href="javascript: Exeperu.crear_complemento_accesorio('<?= (isset($producto['id']) && (int) $producto['id'] > 0) ? $producto['id'] : '0' ?>')" class="btn btn-xs btn-info btn-flat"><i class="glyphicon glyphicon-plus"></i> Agregar</a><br><br>
                                    <div class="table-responsive">
                                        <table id="table_complementos_accesorio" class="table table-striped table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>                                                            
                                                    <th>Imagen</th>                                                            
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div role="tabpanel" class="tab-pane" id="sdescripcion">

                            <div class="col-xs-12">

                                <div class="form-group" style="position: relative;">
                                    <label for="desc_prod">Descripción</label>
                                    <textarea class="form-control richtext" name="productos[descripcion]" rows="3"><?= isset($producto['descripcion']) ? $producto['descripcion'] : ''; ?></textarea>
                                    <!--
                                    <textarea class="form-control" name="productos[descripcion]" id="desc_prod" rows="3" style="display: none;">
                                        <?= isset($producto['descripcion']) ? $producto['descripcion'] : '[]'; ?></textarea><br>

                                    <a href="javascript: Exeperu.crear_complemento('<?= (isset($producto['id']) && (int) $producto['id'] > 0) ? $producto['id'] : '0' ?>')" class="btn btn-xs btn-info btn-flat"><i class="glyphicon glyphicon-plus"></i> Agregar</a><br><br>
                                    <div class="table-responsive">
                                        <table id="table_complementos" class="table table-striped table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Descripcion</th>                                                            
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                    -->
                                </div>

                            </div>

                        </div>

                        <div role="tabpanel" class="tab-pane" id="scategorias">

                            <div class="col-xs-12">

                                <div class="form-group" style="position: relative;">
                                    <label for="img_prod">Imagenes</label>
                                
                                        
                                    <textarea class="form-control" name="productos[imagenes]" id="img_prod" rows="3" style="display: none;">
                                        <?php  
                                            if(isset($imagenes[0])){
                                                foreach ($imagenes as $value) {
                                                     $datos_img[] = array('imagenes'=> $value['imagen'], 'idcolumn' => $value['idimagen']); 
                                                    }
                                                echo json_encode($datos_img);   
                                            }else{
                                                echo '[]';  
                                            } 
                                        ?>      
                                    </textarea>
                                    <br>

                                    <a href="javascript: Exeperu.crear_complemento_imagenes('<?= (isset($producto['id']) && (int) $producto['id'] > 0) ? $producto['id'] : '0' ?>')" class="btn btn-xs btn-info btn-flat"><i class="glyphicon glyphicon-plus"></i> Agregar</a><br><br>
                                    <div class="table-responsive">
                                        <table id="table_complementos_imagenes" class="table table-striped table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Imagenes</th>                                                        
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div role="tabpanel" class="tab-pane" id="sseo">

                            <div class="container-fluid">

                                <div class="row">

                                    <div class="col-xs-12">

                                        <div class="form-group">

                                            <label for="campo_4">Título de la Página</label>

                                            <input type="text" class="form-control" id="campo_4" name="productos[pagetitle]" placeholder="Título de la Página" value="<?= isset($producto['pagetitle']) ? $producto['pagetitle'] : ''; ?>">

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-xs-12">

                                        <div class="form-group">

                                            <label for="campo_5">Descripción de la Página</label>

                                            <textarea class="form-control" name="productos[meta_description]" id="campo_5" rows="3"><?= isset($producto['meta_description']) ? $producto['meta_description'] : ''; ?></textarea>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-xs-12">

                                        <div class="form-group">

                                            <label for="campo_6">Palabras claves de la Página</label>

                                            <textarea class="form-control" name="productos[meta_keyword]" id="campo_6" rows="3"><?= isset($producto['meta_keyword']) ? $producto['meta_keyword'] : ''; ?></textarea>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div role="tabpanel" class="tab-pane" id="scomplementos">

                            <div class="row">

                                <div class="container-fluid">

                                    <div class="col-xs-12">

                                        <div class="form-group" style="position: relative;">
                                            <label for="desc_prod">Marcas</label>
                                            <textarea class="form-control" name="productos[marcas]" id="marcas_prod" rows="3" style="display: none;">
                                                <?= isset($producto['marcas']) ? $producto['marcas'] : '[]'; ?></textarea><br>

                                            <a href="javascript: Exeperu.crear_complemento_marca('<?= (isset($producto['id']) && (int) $producto['id'] > 0) ? $producto['id'] : '0' ?>')" class="btn btn-xs btn-info btn-flat"><i class="glyphicon glyphicon-plus"></i> Agregar</a><br><br>
                                            <div class="table-responsive">
                                                <table id="table_complementos_marcas" class="table table-striped table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th>Imagen</th>                                                            
                                                            <th>Enlace</th>                                                            
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div> 

                        </div>

                        <div role="tabpanel" class="tab-pane" id="sface">

                            <div class="container-fluid">

                                <div class="row">

                                    <div class="col-xs-12">

                                        <div class="form-group">

                                            <label for="campo_4">Título Facebook</label>

                                            <input type="text" class="form-control" id="campo_4" name="productos[og_title]" placeholder="Título de la Página" value="<?= isset($producto['og_title']) ? $producto['og_title'] : ''; ?>">

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-xs-12">

                                        <div class="form-group">

                                            <label for="campo_5">Descripción Facebook</label>

                                            <textarea class="form-control" name="productos[og_description]" id="campo_5" rows="3"><?= isset($producto['og_description']) ? $producto['og_description'] : ''; ?></textarea>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-xs-12">

                                        <div class="form-group">

                                            <label for="campo_14">Imagen facebook </label>

                                            <small style="color: #999;">Dimensiones: 600 x 315px como mínimo.</small>

                                            <div class="input-group">

                                                <input type="text" id="campo_14" name="productos[og_image]" class="form-control" placeholder="Selecciona tu imagen" value="<?= isset($producto['og_image']) ? $producto['og_image'] : ''; ?>">

                                                <div class="input-group-btn">

                                                    <button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('campo_14', '', '<?= $this->config->item('akey'); ?>');">

                                                        <span class="glyphicon glyphicon-picture"></span>

                                                    </button>

                                                </div>

                                            </div>

                                            <div style="display: table; width: 100%;">

                                                <div style="display: table-cell;text-align: center;vertical-align: middle;width: 100%;height: auto;padding: 15px;">

                                                    <img src="<?= isset($producto['og_image']) ? $producto['og_image'] : ''; ?>" id="campo_14" style="width: auto; height: auto; max-width: 400px; max-height: 170px;">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Coloress  -->
                        <div role="tabpanel" class="tab-pane" id="color-detalle">

                            <div class="col-xs-12">

                                <div class="form-group" style="position: relative;">
                                    <label for="ft_prod">Colores</label>

                                    <textarea class="form-control " 
                                    name="productos[colores]" 
                                    id="color_prod" rows="3" 
                                    style="display: none;"
                                    >
                                    <?= isset($producto['detalles-multimedia']) 
                                    ? $producto['detalles-multimedia']:'[]'; 
                                    ?>
                                    </textarea>
                                    <br>
                                    <a 
                                    href="javascript: Exeperu.crear_complemento_color('<?= (isset($producto['id']) && (int) $producto['id'] > 0) ? $producto['id'] : '0' ?>')" 
                                    class="btn btn-xs btn-info btn-flat">
                                    <i class="glyphicon glyphicon-plus"></i> COLOR-DETALLE</a>
                                    <br><br>
                                    <div class="table-responsive">
                                        <table id="table_complementos_color" class="table table-striped table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>código sku</th> 
                                                    <th>stock</th>                                                            
                                                    <th>Imagen</th>                                                            
                                                    <th>Color</th>                                                                                                         
                                                    <th>estado</th>                                                                                                         
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="detalles">

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form form-group ">
                                                <label for="campo_1" class="control-label">largo en cm</label>
                                                <input type="number" step="any" class="form-control medida" id="largo" name="productos[largo]" placeholder="Largo" value="<?= $producto['largo'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form form-group ">
                                                <label for="campo_1" class="control-label">alto en cm</label>
                                                <input type="number" step="any"class="form-control medida" id="alto" name="productos[alto]" placeholder="Alto" value="<?= $producto['alto'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form form-group ">
                                                <label for="campo_1" class="control-label">ancho en cm</label>
                                                <input type="number" step="any" class="form-control medida" id="ancho" name="productos[ancho]" placeholder="Ancho" value="<?= $producto['ancho'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form form-group">
                                                <label for="campo_1" class="control-label">Peso kg</label>
                                                <input type="number" step="any" class="form-control medida" id="peso" name="productos[peso]" placeholder="Peso" value="<?= $producto['peso'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form form-group">
                                                <label for="campo_1" class="control-label">Código Sku</label>
                                                <input type="text"  class="form-control medida" id="sku" name="productos[producto_sku]" placeholder="codigo sku" value="<?= $producto['producto_sku'] ?>">
                                        </div>
                                        
                                        
                                    </div>
                                           
                                    
                                  
                                </div>
                            </div>

                        </div>

                    </div>

                 </div>

              <div class="modal-footer">

                <button type="reset" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>

                <button type="submit" class="btn btn-primary btn-flat">Guardar</button>

              </div>

          <input type="hidden" id="idp" name="productos[idproducto]" value="<?= isset($producto['id']) ? $producto['id'] : '';?>">
           <input type="hidden" id="flag" name="flag" value="">                                
          <input type="hidden"  name="productos[complemento]" value="0">

              </div>

          <!--</div>-->

         <script>
            //  document.querySelectorAll('.editarBtn').forEach(editar => {
            //      editar.addEventListener('click' , function (e){
            //     showModule();
            //  })
            //  })
             let showModule = () => { 
                 let $checkInput =  document.getElementById('colorAdd');
                 let $message =  document.querySelector('.message-color');
                // $checkInput.addEventListener('change', function() {
                let $showStock   = document.querySelector('.stock-module')
                let $moduleColor = document.querySelector('.color-module');
                let $stock = document.querySelector('#stock');
                // let $flag = document.querySelector('#flag');
                    if ( $checkInput.checked ) {
                        $message.style.color = 'green';
                        $message.textContent = 'Diríjase a la sección de colores ';
                       
                        $stock.disabled = true ;
                        $moduleColor.style.display = 'block';
                    }else {
                        $stock.disabled = false;
                        $moduleColor.style.display = 'none' 
                        $message.textContent = '';
                    }
                // });
            }
            
            showModule();
        
         </script>

   

  </form>



<script>
    
$(document).ready(function(){
    showModule();

    Exeperu.tableComplementosRelacionados();
    Exeperu.tableComplementosAccesorios();
    Exeperu.tableComplementosMarcas()
    Exeperu.tableComplementosColors()
    // Exeperu.tableComplementos();
    // Exeperu.tableComplementosft();
    Exeperu.tableComplementosImagenes();
    Exeperu.tinyInit();

    setCat();
    

    $('#formCrearEditarp').submit(function(event) {
        event.preventDefault();
        // let $quanty = document.querySelector('#stock');
        // let $flag = document.querySelector('#flag');
        // $flag.value= $quanty.disabled ?  1: 0;

        $('#modalCreateEdit').modal('hide');
        $('#modalLoading').modal('show');

        $.ajax({
            url: ''+ $(this).attr('action') +'',
            type: 'POST',
            //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            data: $(this).serialize(),
        })
        .done(function() {

            setTimeout(function(){ location.reload(); },600)
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            $('#modalLoading').modal('hide');
            console.log("complete");
        });
        

    });




    function setCat() {
        var html='<option value="">Seleccione una categoría...</option>';
        $('#categoria').html(html);

        $.ajax({
            url: '<?= base_url('categorias/list/'); ?>',
        })
        .done(function(response) {
            $.each(response ,function(i,item){
                if(item.idpagina=='<?php echo $categorias['idpagina'] ?>'){
                    var html = '<option  value="'+item.idpagina+'" selected>'+item.pagina+'</option>';
                    
                }else{
                    var html = '<option  value="'+item.idpagina+'">'+item.pagina+'</option>';
                }
                $("#categoria").append(html);
            });
            subcategoria();
        })
    }

    function subcategoria(){

        var idcat=$('#categoria').val();

        if (idcat == "") {

        }else{

            var xd='<option value="">Seleccione una subcategoría...</option>';
            $("#subcategoria").html(xd);

            $.ajax({
                url:'<?= base_url('categorias/lissubcategorias'); ?>',
                type:'post',
                data:{'idcat':idcat},
                success:function(response){
                    $.each(response, function(i,item){
                        if(item.id == '<?php echo $producto['categoria_id'] ?>'){
                            var html='<option  value="'+item.id+'"selected>'+item.titulo+'</option>';
                        }else{
                            var html='<option  value="'+item.id+'">'+item.titulo+'</option>';
                        } 
                       $("#subcategoria").append(html);
                    });
                }
            });
        }

    }

    $('#categoria').change(function(event) {
        subcategoria();
    });


});



// let calcTipo = () => {
//     const $inputsMedidas = document.querySelectorAll('.medida')
//     const $tipoShow = document.querySelector('#tipo_paquete')
//     $inputsMedidas.forEach(medida => medida.addEventListener('change' , event => {
//         console.log(event.target)
//         let tipo;
//         const alto  = document.getElementById('largo').value;
//         const ancho = document.getElementById('ancho').value;
//         const largo = document.getElementById('largo').value;
//         let volumen = parseFloat(alto)*parseFloat(ancho)*parseFloat(largo);
//         console.log(volumen)
//         tipo = volumen < 30 ? 'pequeño'
//              : volumen < 60 ?'mediano'
//                     : 'grande'
//         $tipoShow.value = tipo
//     }))
    
    
// }

// calcTipo();
</script>



</div>

