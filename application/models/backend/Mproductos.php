<?php



class Mproductos extends CI_Model {



    public function __construct() {

        parent::__construct();

    }



    public function getProductos() {

        $this->db->select('imagenes.imagen, productos.*, categorias.titulo as subcategoria, paginas.pagina, paginas.idpagina');
        $this->db->join('imagenes', 'imagenes.producto_id = productos.id', 'right');
        $this->db->join('categorias', 'categorias.id = productos.categoria_id', 'right');
        $this->db->join('paginas', 'paginas.idpagina = categorias.idpagina');
        $this->db->group_by('productos.id');
        $query = $this->db->get('productos');
        return $query->result_array();

    }

    

    public function getSubcategoriasjm($idc=0){

        $this->db->where('idcategoria',$idc);

        $this->db->where('activo',1);

        $query=$this->db->get('subcategorias');

        return $query->result_array();

    }

    

    public function getSubcategoriasjmjm(){

        $this->db->where('activo',1);

        $query=$this->db->get('subcategorias');

        return $query->result_array();

    }

    

    public function getCategoriasjm(){

        $this->db->where('activo',1);

        $query=$this->db->get('categorias');

        return $query->result_array();

    }

    public function getCategoria($idproducto=0){
        $this->db->select('paginas.idpagina');
        $this->db->join('productos', 'productos.categoria_id = categorias.id', 'left');
        $this->db->join('paginas', 'paginas.idpagina = categorias.idpagina', 'left');
        $this->db->where('productos.id', $idproducto);
        $query=$this->db->get('categorias');

        return $query->row_array();

    }

    public function listaproductosjm(){

        $this->db->where('complemento<>',1);

        $this->db->where('activo',1);

        $query=$this->db->get('productos');

        return $query->result_array();

    }



    public function getProdSubcategoria($idp=0){

        $this->db->select('subcategorias_productos.*, CONCAT("esp_", subcategorias_productos.idproducto, subcategorias_productos.idsubcategoria) AS idcolumn');

        $this->db->where('idproducto',$idp);

        $query=$this->db->get('subcategorias_productos');

        return $query->result_array();

    }

    

    public function deleteprodsubcategorias($idp=0){

        $this->db->where('idproducto',$idp);

        return $this->db->delete('subcategorias_productos');

    }

    

    public function saveprodsubcategorias($datos=array()){

        return $this->db->insert('subcategorias_productos',$datos['subcategorias_productos']);

    }

    

    public function getTipos($search = NULL, $length = 0, $start = 25) {

        if ($search != NULL) {

            $this->db->group_start();

            $this->db->like('tipo', $search);

            $this->db->group_end();

        }

        $this->db->where('activo',1);

        $this->db->limit($length, $start);

        $query = $this->db->get('tipo_producto');



        return $query->result_array();

    }

    

    public function getTipo($idtipo){

        $this->db->where(array(

            "idtipo"=>$idtipo,

            "activo"=>1

        ));

        $query=$this->db->get('tipo_producto');

        return $query->row_array();

    }

    

    public function editprecios($cant=null){

        $datos=array();

        $datos['productos']['precio_dol']=number_format(($datos['precio_sol']/$cant), 2, '.', '');        

    }

    

    public function todosproductos(){

        $query=$this->db->get('productos');

        return $query->result_array();

    }

    

    public function deletetipo($idtipo){

        $this->db->where('idtipo',$idtipo);

        return $this->db->delete('tipo_producto');

    }

    

    public function deleteproducto($idproducto){

        $this->db->where('idproducto',$idproducto);

        return $this->db->delete('productos');

    }

     

    public function deletecomplementos($idproduc){

        $this->db->where('idproducto',$idproduc);

        return $this->db->delete('productos_complementos');

    }

    

    public function deletecolores($idproduc){

        $this->db->where('idproducto',$idproduc);

        return $this->db->delete('productos_colores');

    }

    

    public function savetipo($datos = array()){



        $this->db->insert('tipo_producto',$datos['tipo_producto']);

        return $this->db->insert_id();

    }

    

    public function liscolores(){

        $query=$this->db->get('colores');

        return $query->result();

    }

    

    public function saveproducto($datos = array()){

        $this->db->insert('productos',$datos['productos']);

        return $this->db->insert_id();

    }



    public function saveproducto2($datos = array()){

        $this->db->insert('productos_new',$datos['productos']);

        return $this->db->insert_id();

    }

    

    public function savecomplementos($datos = array()){



        $this->db->insert('productos_complementos',$datos['productos_complementos']);

        return $this->db->insert_id();

    }

    

    public function savecolores($datos = array()){

        $this->db->insert('productos_colores',$datos['productos_colores']);

        return $this->db->insert_id();

    }

    

    public function updateproducto($datos = array()){



        $this->db->where('idproducto',$datos['productos']['idproducto']);

        return $this->db->update('productos',$datos['productos']);

    }

    

    public function updateproductojm($datos = array()){



        $this->db->where('idproducto',$datos['idproducto']);

        return $this->db->update('productos',$datos);

    }

    

    public function updatetipo($datos = array()){

        $this->db->where('idtipo',$datos['tipo_producto']['idtipo']);

        return $this->db->update('tipo_producto',$datos['tipo_producto']);

    }

    

    public function getTotaltipos($search = NULL) {

//        $this->db->join('marcas', 'marcas.idmarca = productos.idmarca');

//        $this->db->join('grupos', 'grupos.idgrupo = productos.idgrupo');



        if ($search != NULL) {

            $this->db->group_start();

            $this->db->like('tipo', $search);

            $this->db->group_end();

        }



        return $this->db->count_all_results('tipo_producto');

    }

     

    public function getTotal($search = NULL,$idcat = 0, $idsubcat = 0) {

        $this->db->select('productos.*,categorias.nombre as nombrecat,subcategorias.nombre as nombresub');

        $this->db->join('subcategorias_productos','productos.idproducto=subcategorias_productos.idproducto','LEFT');

        $this->db->join('categorias','subcategorias_productos.idcategoria=categorias.idcategoria','LEFT');

        $this->db->join('subcategorias','subcategorias_productos.idsubcategoria=subcategorias.idsubcategoria','LEFT');



        if ($search != NULL) {

            $this->db->like('productos.nombre', $search);

            $this->db->or_like('productos.codigo', $search);

        }     

        

        if ($idcat > 0) {

            $this->db->where('subcategorias_productos.idcategoria',$idcat);

        }

        

        if ($idsubcat > 0) {

            $this->db->where('subcategorias_productos.idsubcategoria',$idsubcat);

        }

        

        if ($search != NULL) {

            $this->db->group_start();

            $this->db->like('productos.nombre', $search);

            $this->db->or_like('productos.codigo', $search);

            $this->db->group_end();

        }

        //$this->db->where('productos.complemento',$tip);

        

//        if($idsubp > 0 ){

//            $this->db->where('subcategorias_productos.idsubcategoria',$idsubp);

//        }



        return $this->db->count_all_results('productos');

    }

 

    

    public function getProductosComplementos($idproducto = 0){

        $this->db->select('productos_complementos.*, CONCAT("esp_", productos_complementos.idproducto, productos_complementos.idcomplemento) AS idcolumn');

        $this->db->where('idproducto',$idproducto);

        $query=$this->db->get('productos_complementos');

        return $query->result();

    }

    

    public function getTiposp(){

        $query=$this->db->get('tipo_producto');

        return $query->result_array();

    }

    

     public function guardarrecurso($datos=array()){

        $this->db->insert('recursos',$datos['recursos']);

        return $this->db->insert_id();

    }

    

    public function guardarsitemap($datos=array()){

        $this->db->insert('sitemap',$datos['sitemap']);

        return $this->db->insert_id();

    }

    

    public function listatipos(){

        $this->db->where('activo',1);

        $query=$this->db->get('tipo_producto');

        return $query->result();

    }

    

    public function liscomplementos(){

        $this->db->where('activo',1);

        $this->db->where('idtipo <>',1);

        $query=$this->db->get('productos');

        return $query->result_array();

    }

    

    public function getComplementos($idproducto){

        $this->db->where('idproducto',$idproducto);

        $query=$this->db->get('productos_complementos');

        return $query->result_array();

    }

    

    public function getColores($idproducto){

        $this->db->where('idproducto',$idproducto);

        $query=$this->db->get('productos_colores');

        return $query->result_array();

    }

    

    public function guardarpresentacion($datos=array()){

        $this->db->insert('productos_presentaciones',$datos['productos_presentaciones']);

        return $this->db->insert_id();

    }

    

    public function guardargrupo($datos=array()){

//        print_r($datos['grupos_productos']); exit;

        $this->db->insert('grupos_productos',$datos['grupos_productos']);

        return $this->db->insert_id();

    }

    

    public function getMarca($idmar){

        $this->db->join('sitemap','marcas.idsitemap=sitemap.idsitemap');

        $this->db->where('marcas.idmarca',$idmar);

        $query=$this->db->get('marcas');

        return $query->row_array();

    }



    public function getProducto($idproducto = 0) {

        $this->db->where(array(
            'id' => $idproducto
        ));

        $query = $this->db->get('productos');
        return $query->row_array();
    }



    public function getProductoByCode($code = 0) {

        $this->db->where(array(

            'codigo' => $code

        ));



        $query = $this->db->get('productos');



        return $query->row_array();

    }



    public function getProductoSitemap($idsitemap = 0) {

        $this->db->join('recursos', 'recursos.idrecurso = sitemap.idrecurso');



        $this->db->where(array(

            'idsitemap' => $idsitemap

        ));



        $query = $this->db->get('sitemap');



        return $query->row_array();

    }



    public function getProductoMarca($idmarca = 0) {

        $this->db->where(array(

            'idmarca' => $idmarca

        ));



        $query = $this->db->get('marcas');



        return $query->row_array();

    }



    public function getProductoGrupos($idproducto = 0) {

        $this->db->select('grupos_productos.idgrupo');

//        $this->db->join('grupos', 'grupos.idgrupo = grupos_productos.idgrupo');



        $this->db->where(array(

            'grupos_productos.idproducto' => $idproducto

        ));



        $query = $this->db->get('grupos_productos');



        return $query->result_array();

    }



    public function getGrupos($idparent = 0) {

        $this->db->where(array(

            'grupos.idsitemap >' => 0,

            'grupos.idparent' => $idparent

        ));



        $this->db->order_by('grupos.orden', 'ASC');



        $query = $this->db->get('grupos');



        return $query->result_array();

    }



    public function actualizaProducto($data = array()) {

        $this->db->where(array(

            'idproducto' => $data['productos']['idproducto']

        ));



        $query = $this->db->update('productos', $data['productos']);



        if ($query) {

            $this->actualizarGrupos($data['productos']['idproducto'], $data['grupos_productos']['idgrupo']);

            $this->actualizarPresentaciones($data['productos']['idproducto'], $data['productos_presentaciones']['presentaciones']);

        }

    }



    public function actualizarGrupos($idproducto = 0, $grupos = array()) {

        $nuevo = array();



        foreach ($grupos as $key => $grupo) {

            $nuevo[] = array(

                'idproducto' => $idproducto,

                'idgrupo' => $grupo

            );

        }



        $this->db->where('idproducto', $idproducto);

        $query = $this->db->delete('grupos_productos');



        if ($query && !empty($nuevo)) {

            $this->db->insert_batch('grupos_productos', $nuevo);

        }

    }



    public function actualizarPresentaciones($idproducto = 0, $presentaciones = '{}') {

        $presentaciones = json_decode($presentaciones, TRUE);



        foreach ($presentaciones as $key => $presentacion) {

            unset($presentaciones[$key]['idcolumn']);

        }



        $this->db->where('idproducto', $idproducto);

        $query = $this->db->delete('productos_presentaciones');



        if ($query && !empty($presentaciones)) {

            $this->db->insert_batch('productos_presentaciones', $presentaciones);

        }

    }

    public function getImagenes($id=0){
        $this->db->select('imagen, id as idimagen');
        $this->db->where('producto_id', $id);
        $query = $this->db->get('imagenes');
        return $query->result_array();
    }



    public function getUnidadMedida(){

        $this->db->select('idunidadmedida,abreviatura');

        $query=$this->db->get('unidad_de_medida');

        return $query->result();

    }



    public function getCatejm($ids=0){

        $this->db->where('idsubcategoria',$ids);

        $query=$this->db->get('subcategorias');

        return $query->row_array();

    }





    public function getProducts($productos){

        //http://190.107.180.58:8080/apiexe/index.php/SecureREST/productos?filter=in(12)

        $getUrl = 'http://190.107.180.58:8080/apiexe/index.php/SecureREST/productos?filter=in'.$productos;

        $user = 'user';

        $password = 'T@pF7x;HgQ';

        $header = array("Content-Type: application/json");

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $getUrl);

        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        curl_setopt($ch, CURLOPT_USERPWD, "$user:$password");

        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);



        $result = curl_exec($ch);

        $products_api = null;



        if ($result) {

            $arr_getapi = json_decode($result ,TRUE);



            if ($arr_getapi && count($arr_getapi) > 0) {                



               if( isset($arr_getapi['value']) && !empty($arr_getapi['value']) ) {

                    foreach ($arr_getapi['value'] as $key0 => $prodapi) {

                        $codigo = $prodapi['Codigo'];

                        $products_api[$codigo] = $prodapi;

                    }

                }

                

            }

                    

        }       

        

        return $products_api;

    }


    public function setImagenProducts($data)
    {
        if(!empty($data['id'])){
            $this->db->where('id', $data['id']);
            $this->db->update('imagenes', array('imagen' => $data['img']));
        }else{
            $this->db->insert('imagenes', array('imagen' => $data['img'], 'producto_id'=> $data['producto_id']));
        }
    }

    public function setProducto($data)
    {
    
        if( !empty($data['idproducto']) ){

            $this->db->where('id', $data['idproducto']);
            $this->db->update('productos', $data['data']);
            return $data['idproducto'];

        }else{

            $this->db->insert('productos', $data['data']);
            return $this->db->insert_id();

        }
        

    }

    public function getOneProductos($name='') {

        $this->db->select('imagenes.imagen, productos.*, categorias.titulo as subcategoria, categorias.url as subcat_url, sitemap.url as cat_url,  paginas.pagina, paginas.idpagina');
        $this->db->where('productos.titulo', $name);
        
        $this->db->join('imagenes', 'imagenes.producto_id = productos.id', 'right');
        $this->db->join('categorias', 'categorias.id = productos.categoria_id', 'right');
        $this->db->join('paginas', 'paginas.idpagina = categorias.idpagina');
        $this->db->join('sitemap', 'sitemap.idsitemap = paginas.idsitemap', 'left');
        $this->db->group_by('productos.id');
        $query = $this->db->get('productos');
        return $query->row_array();

    }

}

