<?php

class Contenido extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getContenido($pagina = 0) {
        $this->db->where( ['idpagina' => $pagina] );
        $this->db->order_by('orden', 'ASC');
        $result = $this->db->get('contenido');
		//$str = $this->db->last_query();
		//echo $str; 
		//exit;
        return $this->salida($result->result_array());
    }
    //  FILTRAMOS EL TIPO DE CONTENT RETORNADO DESDE EL CONTENIDO DE CADA PÁGINA
    public function salida( $data = array()) {
        $salida = array();
        foreach ($data as $key => $value) {
            switch ($value['tipo']) {
                case 'data':
                    $valor = json_decode( $value['valor'], TRUE );
                    break;
                default:
                    $valor = $value['valor'];
                    break;
            }
            $salida[$value['nombre']] = $valor;
        }

        return $salida;
    }
    
    public function getColumnista($idc){
        $this->db->where('idautor',$idc);
        $jm=$this->db->get('autores');
        return $jm->row_array();
    }
    
    public function getLibros(){
        $this->db->join('sitemap','libros.idsitemap=sitemap.idsitemap');
        $this->db->where('estado',1);
        $this->db->order_by('orden asc');
        $query=$this->db->get('libros');
        return $query->result_array();
    }
    
    public function getLibro($sit=null){
        $this->db->join('sitemap','libros.idsitemap=sitemap.idsitemap');
        $this->db->where('sitemap.url',$sit);
        $query=$this->db->get('libros');
        return $query->row_array();
    }
    
    public function getLibrojm($idl=0){
        $this->db->join('sitemap','libros.idsitemap=sitemap.idsitemap');
        $this->db->where('libros.idlibro',$idl);
        $query=$this->db->get('libros');
        return $query->row_array();
    }
    
    public function getArticulosjm($idc=0){
        date_default_timezone_set('America/Bogota');
        $fechaactual=date("Y-m-d H:i:s");
        $this->db->select('blogs.*,categorias.categoria,sitemap.*,concat(autores.nombres," ",autores.apellidos) as datautor,autores.foto, sys_users.alias');
        $this->db->join('categorias','blogs.idcategoria=categorias.idcategoria');
        $this->db->join('sitemap','blogs.idsitemap=sitemap.idsitemap');
        $this->db->join('autores','blogs.idautor=autores.idautor','LEFT');
        $this->db->join('sys_users','blogs.iduser=sys_users.iduser','LEFT');
        
        $this->db->where(array(
            'blogs.estado'=>1,
            'blogs.idcategoria'=>$idc,
            'blogs.fecha <='=>$fechaactual
        ));
        
        $this->db->order_by('blogs.fecha desc');
        
        $query=$this->db->get('blogs');
        return $query->result_array();
    }
    
    public function getCategoria($ids=0){
        $this->db->join('sitemap','categorias.idsitemap=sitemap.idsitemap');
        $this->db->where('categorias.idsitemap',$ids);
        $query=$this->db->get('categorias');
        return $query->row_array();
    }
    
    public function getCategoriaa($ids=0){
        $this->db->join('sitemap','categorias.idsitemap=sitemap.idsitemap');
        $this->db->where('categorias.idcategoria',$ids);
        $query=$this->db->get('categorias');
        return $query->row_array();
    }
    
    public function getCategoriajm($ids=null){
        $this->db->join('sitemap','categorias.idsitemap=sitemap.idsitemap');
        $this->db->where('categorias.categoria',$ids);
        $query=$this->db->get('categorias');
        return $query->row_array();
    }
    
    public function getTipo($id=0){
        $this->db->where('idpagina',$id);
        $query=$this->db->get('tipo_categoria');
        return $query->row_array();
    }
    
    public function getDistritos(){
        $this->db->where('activo',1);
        $this->db->order_by('distrito ASC');
        $query=$this->db->get('distritos');
        return $query->result();
    }
    
    public function getArticulos($idp=0,$limit = NULL, $offset = NULL){
        date_default_timezone_set('America/Bogota');
        $fechaactual=date("Y-m-d H:i:s");
        $this->db->select('blogs.*,categorias.categoria,concat(autores.nombres," ",autores.apellidos) as datautor,sitemap.*,autores.foto, sys_users.alias');
        $this->db->join('categorias','blogs.idcategoria=categorias.idcategoria');
        $this->db->join('paginas','categorias.idsitemap=paginas.idsitemap');
        $this->db->join('sitemap','blogs.idsitemap=sitemap.idsitemap');
        $this->db->join('autores','blogs.idautor=autores.idautor','LEFT');
        $this->db->join('sys_users','blogs.iduser=sys_users.iduser','LEFT');
        $this->db->where('paginas.idpagina',$idp);
        $this->db->where('blogs.estado',1);
        $this->db->where('blogs.fecha<=',$fechaactual);
        
        if( $limit){
          $this->db->limit($limit,$offset);  
        }
        
        $this->db->order_by('blogs.fecha desc');
        $query=$this->db->get('blogs');
        //echo $this->db->last_query();    
        return $query->result_array();
    }
    
    public function getArticulo($id=0){
        $this->db->select('blogs.*,categorias.categoria,categorias.frase,categorias.color,sitemap.*,concat(autores.nombres," ",autores.apellidos) as datautor,autores.ocupacion,autores.foto');
        $this->db->join('categorias','blogs.idcategoria=categorias.idcategoria');
        $this->db->join('sitemap','blogs.idsitemap=sitemap.idsitemap');
        $this->db->join('autores','blogs.idautor=autores.idautor','LEFT');
//        $this->db->join('paginas','categorias.idpagina=paginas.idpagina');
        $this->db->where('blogs.idblog',$id);
        $query=$this->db->get('blogs');
        return $query->row_array();
    }
    
    public function getArticulosit($id=null){
        $this->db->join('sitemap','blogs.idsitemap=sitemap.idsitemap');
//        $this->db->join('paginas','categorias.idpagina=paginas.idpagina');
        $this->db->where('sitemap.url',$id);
        $query=$this->db->get('blogs');
        return $query->row_array();
    }
    
    public function ultimosArticulos($id=0,$idc=0){
        $result_array = array();
        $categorias = array();
        date_default_timezone_set('America/Bogota');
        $fechaactual=date("Y-m-d H:i:s");
        $this->db->select('blogs.idblog, 
                            blogs.titulo, 
                            blogs.resena, 
                            blogs.descripcion, 
                            blogs.video, 
                            blogs.imagen, 
                            blogs.imagen_grande, 
                            blogs.orden, 
                            blogs.estado, 
                            blogs.fecha, 
                            blogs.tiempo_lectura, 
                            blogs.idsitemap, 
                            blogs.idautor, 
                            blogs.idcategoria, 
                            blogs.entrevista,
                            categorias.categoria,
                            s1.url as blog_url,
                            s2.url as categoria_url')
         ->from('blogs');         
        $this->db->join('categorias','blogs.idcategoria=categorias.idcategoria');
        $this->db->join('sitemap as s1','blogs.idsitemap=s1.idsitemap');
        $this->db->join('sitemap as s2','categorias.idsitemap=s2.idsitemap');
        $this->db->where(array(
            'blogs.idblog <>'=>$id,
            'blogs.idcategoria <> '=>$idc,
            'blogs.estado'=>1,
            'blogs.fecha<='=>$fechaactual
        ));
       
        $this->db->order_by('blogs.fecha desc');
        $query=$this->db->get();
        $results = $query->result_array();

        foreach ($results as $key => $result) {
            
            if(!array_key_exists($result['idcategoria'], $categorias)){
                $categorias[$result['idcategoria']] = $result['categoria'];
                array_push($result_array, $result);
            }
            
        }
        return $result_array;
        
    }

    public function otrosArticulos($id=0,$idc=0){
        
        date_default_timezone_set('America/Bogota');
        $fechaactual=date("Y-m-d H:i:s");        
        $this->db->join('categorias','blogs.idcategoria=categorias.idcategoria');
        $this->db->join('sitemap','blogs.idsitemap=sitemap.idsitemap');
        $this->db->where(array(
            'blogs.idblog <>'=>$id,
            'blogs.idcategoria '=>$idc,
            'blogs.estado'=>1,
            'blogs.fecha<='=>$fechaactual
        ));        
        $this->db->order_by('blogs.fecha desc ');
        $query=$this->db->get('blogs');        

        return $query->result_array();
    }
    
    public function getColumnas(){
        $this->db->join('sitemap','blogs.idsitemap=sitemap.idsitemap');
        $this->db->where(array(
            'blogs.idcategoria'=>10,
            'blogs.estado'=>1
        ));
        $this->db->order_by('orden asc');
        $this->db->limit(5,0);  
        $jm=$this->db->get('blogs');
        return $jm->result_array();
    }
    
    public function getColumnasMasVistas(){
        $this->db->select('blogs.*, count(visitas_web.idvisitas_web) as visitas, sitemap.*' );
        $this->db->join('sitemap','blogs.idsitemap=sitemap.idsitemap');
        $this->db->join('visitas_web','blogs.idblog=visitas_web.idblog', 'LEFT');
        $this->db->where(array(
            'blogs.idcategoria'=>10,
            'blogs.estado'=>1
        ));
        $this->db->group_by('idblog'); 
        $this->db->order_by('visitas desc');
        $this->db->limit(5,0);  
        $jm=$this->db->get('blogs');
        return $jm->result_array();
    }
    
    public function getTags($id=0){
        $this->db->join('tags','tags.idtag=blogs_tags.idtag');
        $this->db->where('blogs_tags.idblog',$id);
        $query=$this->db->get('blogs_tags');
        return $query->result_array();
    }
    
    public function getTag($id=0){
        $this->db->where('idtag',$id);
        $query=$this->db->get('tags');
        return $query->row_array();
    }

    public function getArticulosbyTag($id=0){
        date_default_timezone_set('America/Bogota');
        $fechaactual=date("Y-m-d H:i:s");
        $this->db->join('blogs','blogs_tags.idblog=blogs.idblog');
        $this->db->join('sitemap','blogs.idsitemap=sitemap.idsitemap');
        $this->db->where('blogs_tags.idtag',$id);
        $this->db->where('blogs.fecha<=',$fechaactual);
        $this->db->order_by('blogs.fecha desc');
        $query=$this->db->get('blogs_tags');
        return $query->result_array();
    }
    
    public function getArticulosbyCat($id=0,$limit = NULL, $offset = NULL){
        date_default_timezone_set('America/Bogota');
        $fechaactual=date("Y-m-d H:i:s");
        $this->db->join('sitemap','blogs.idsitemap=sitemap.idsitemap');
        $this->db->where('blogs.idcategoria',$id);
        $this->db->where('blogs.estado',1);
        $this->db->where('blogs.fecha<=',$fechaactual);
        
        if( $limit){
          $this->db->limit($limit,$offset);  
        }
        
        $this->db->order_by('blogs.fecha desc');
        $query=$this->db->get('blogs');
        return $query->result_array();
    }
    
    public function getArticulosbyBus($busca=null){
        date_default_timezone_set('America/Bogota');
        $fechaactual=date("Y-m-d H:i:s");
        $this->db->join('sitemap','blogs.idsitemap=sitemap.idsitemap');
        $this->db->join('autores','blogs.idautor=autores.idautor','LEFT');
        if ($busca != NULL) {
            $this->db->like('blogs.titulo',$busca);
            $this->db->or_like('blogs.descripcion',$busca);
            $this->db->or_like('autores.apellidos',$busca);
            $this->db->or_like('autores.nombres',$busca);
        }
        $this->db->where('blogs.fecha<=',$fechaactual);
        $this->db->order_by('blogs.fecha desc');
        $query=$this->db->get('blogs');
        return $query->result_array();
    }
    
    public function getAnuncios($id=0){
        $this->db->select('anuncios.*,dimensiones.dimension,tipos_anuncios.tipo,tipos_anuncios.idtipo,dimensiones.width,dimensiones.height');
        $this->db->join('dimensiones','anuncios.iddimension=dimensiones.iddimension');
        $this->db->join('tipos_anuncios','dimensiones.idtipo=tipos_anuncios.idtipo');
        $this->db->where('anuncios.idblog',$id);
        $this->db->where('anuncios.estado',1);
        $this->db->order_by('anuncios.orden asc');
        $query=$this->db->get('anuncios');
        return $query->result_array();
    }
    
    public function getAnunciospag($id=0){
        $this->db->select('anuncios.*,dimensiones.dimension,dimensiones.width,dimensiones.height');
        $this->db->join('dimensiones','anuncios.iddimension=dimensiones.iddimension');
//        $this->db->join('tipos_anuncios','dimensiones.idtipo=tipos_anuncios.idtipo');
        $this->db->where('anuncios.idcategoria',$id);
        $this->db->where('anuncios.estado',1);
        $this->db->order_by('anuncios.orden asc');
        $query=$this->db->get('anuncios');
        return $query->result_array();
    }
    
    public function getAnunciosaut($id=0){
        $this->db->select('anuncios.*,dimensiones.dimension,tipos_anuncios.tipo,tipos_anuncios.idtipo,dimensiones.width,dimensiones.height');
        $this->db->join('dimensiones','anuncios.iddimension=dimensiones.iddimension');
        $this->db->join('tipos_anuncios','dimensiones.idtipo=tipos_anuncios.idtipo');
        $this->db->where('anuncios.idautor',$id);
        $this->db->where('anuncios.estado',1);
        $this->db->order_by('anuncios.orden asc');
        $query=$this->db->get('anuncios');
        return $query->result_array();
    }


    public function getCategoriaProd($id = 0){
        $this->db->select('contenido.*');
        //$this->db->join('templates','paginas.id=templates.idpagina');
        $this->db->join('contenido','contenido.idpagina=paginas.idpagina');
        $this->db->where('paginas.idparent',$id);
        $result= $this->db->get('paginas');

        return $this->salida($result->result_array());
    }


    public function getSubCategoria($id=0)
    {
        $this->db->select('*');
        $this->db->where('idpagina',$id);
        $this->db->order_by('orden asc');
        $query=$this->db->get('categorias');
        $num = 0;
        foreach ($query->result_array() as $row){

            $productos = $this->db->where('categoria_id', $row['id'])->where('active', 1)->get('productos');
            $qry_productos = $productos->result_array();

            $data[$num] = array(
                'id' => $row['id'],
                'idpagina' => $row['idpagina'],
                'parent_id' => $row['parent_id'],
                'imagen' => $row['imagen'],
                'titulo' => $row['titulo'],
                'subtitle' => $row['subtitle'],
                'contenido' => $row['contenido'],
                'orden' => $row['orden'],
                'url' => $row['url'],
                'cantidad' => count($qry_productos)
            );
            $num++;
        }
        return $data;
    }

    public function getOneSubCategoria($nameUrl='')
    {
        $this->db->select('*');
        $this->db->where('categorias.url', $nameUrl);
        $this->db->order_by('orden asc');
        $query=$this->db->get('categorias');
        return $query->result_array();
    }


    public function getProdOfCat($nameUrl='')
    {
        $this->db->select('productos.*');
        $this->db->join('categorias','categorias.id=productos.categoria_id');
        $this->db->where('categorias.url',$nameUrl);
        $this->db->order_by('productos.orden', 'asc');
        $query=$this->db->get('productos');

        $i = 0;
        
        foreach ($query->result_array() as $rows) {

            $data[$i]['id'] = $rows['id'];
            $data[$i]['titulo'] = $rows['titulo'];
            $data[$i]['subtitulo'] = $rows['subtitulo'];
            $data[$i]['contenido'] = $rows['contenido'];
            $data[$i]['descripcion'] = $rows['descripcion'];
            $data[$i]['ficha_tecnica'] = $rows['ficha_tecnica'];
            $data[$i]['prod_url'] = $rows['prod_url'];
            $data[$i]['active'] = $rows['active'];
            
            $images = $this->db->where('producto_id', $rows['id'])->get('imagenes');
            $a = 0;
            foreach ($images->result_array() as $miwel) {
                $data[$i]['imagen'][$a] = $miwel['imagen'];
                $a++;
            }
            
            $i++;
        }

        return $data;
    }

    public function getOneProduct($name='')
    {
        $this->db->select('productos.*, imagenes.imagen, categorias.url as subcat_url, sitemap.url as cat_url' );
        $this->db->where('productos.titulo', $name);
        $this->db->join('imagenes', 'imagenes.producto_id = productos.id', 'right');
        $this->db->join('categorias', 'categorias.id = productos.categoria_id');
        $this->db->join('paginas', 'paginas.idpagina = categorias.idpagina');
        $this->db->join('sitemap', 'sitemap.idsitemap = paginas.idsitemap');
        $this->db->group_by('productos.id');
        $query=$this->db->get('productos');
        return $query->row_array();
    }

    public function getProducts($nameUrl='')
    {
        $this->db->select('productos.*');
        $this->db->where('prod_url',$nameUrl);
        //$this->db->order_by('orden asc');
        $query=$this->db->get('productos');

        $i = 0;
        
        foreach ($query->result_array() as $rows) {

            $data['id'] = $rows['id'];
            $data['titulo'] = $rows['titulo'];
            $data['subtitulo'] = $rows['subtitulo'];
            $data['contenido'] = $rows['contenido'];
            $data['descripcion'] = $rows['descripcion'];
            $data['accesorios'] = $rows['accesorios'];
            $data['producto_sku'] = $rows['producto_sku'];
            $data['precio']=$rows['precio'];
            $data['precio_anterior']=$rows['precio_anterior'];
            $data['relacionados'] = $rows['relacionados'];
            $data['marca'] = $rows['marcas'];
            $data['pdf'] = $rows['pdf'];
            $data['ficha_tecnica'] = $rows['ficha_tecnica'];
            $data['prod_url'] = $rows['prod_url'];
            $data['video'] = $rows['video'];
            $data['active'] = $rows['active'];
            // DETAILS FOR PRODUCTO 
            $data['detalles-multimedia'] = $rows['detalles-multimedia'] ? json_decode($rows['detalles-multimedia'],true): FALSE;
            // SUGERIDOS FOR MODAL
            $data['sugeridos'] = $rows['relacionados'] ? json_decode($rows['relacionados'],true): FALSE;
            //Categoria
            $categoria = $this->db->where('id', $rows['categoria_id'])->get('categorias');
            $c_read = $categoria->row_array();
            $data['category_id'] = $c_read['id'];
            $data['category'] = $c_read['titulo'];
            $data['subcat_url'] = $c_read['url'];
            
            $data['pagetitle'] = $rows['pagetitle'];
            $data['meta_description'] = $rows['meta_description'];
            $data['meta_keyword'] = $rows['meta_keyword'];
            $data['og_title'] = $rows['og_title'];
            $data['og_description'] = $rows['og_description'];
            $data['og_image'] = $rows['og_image'];

            $images = $this->db->where('producto_id', $rows['id'])->get('imagenes');
            $a = 0;

            foreach ($images->result_array() as $miwel) {
                $data['imagen'][$a] = $miwel['imagen'];
                $a++;
            }
            $i++;

            $marcas = $this->db->select('marcas.*')
                                ->join('producto_marca','producto_marca.marca_id=marcas.id')
                                ->where('producto_marca.producto_id', $rows['id'])
                                ->get('marcas');
            $e = 0;
            foreach ($marcas->result_array() as $mrc) {
                $data['marcas'][$e] = $mrc['imagen'];
                $e++;
            }

            $images = $this->db->where('producto_id', $rows['id'])->get('accesorios');
            $f = 0;

            foreach ($images->result_array() as $miwel) {
                $data['accesorio'][$f] = ['titulo'=>$miwel['titulo'], 'imagen'=>$miwel['imagen_accesorio']];
                $f++;
            }
            $i++;
        }

        return $data;
    }

    public function getMenu()
    {
        $this->db->select('*');
        $this->db->where('idparent', 2);
        $this->db->order_by('orden asc');
        $paginas = $this->db->get('paginas')->result_array();
        $pp = 0;
        foreach ( $paginas as $row) {
            $n = 0;
            $subcat = $this->db->where('idpagina', $row['idpagina'])
                                ->get('categorias')
                                ->result_array();
           if($subcat) {
               foreach ( $subcat as $value ) {
                   $s = 0;
                   $productos = $this->db->where('categoria_id', $value['id'])->where('active', 1)->get('productos');
                   $qry_productos = $productos->result_array();

                   $dat[$n] = ['titulo' => $value['titulo'], 'url'=>$value['url'], 'cantidad' => count($qry_productos)];
                   $n++;
               }
               $data['menu_list'][$pp] = [
                   'id' => $row['idpagina'],
                   'cat' => $row['pagina'],
                   'subcat' => isset($dat) ? $dat : 0 
               ]; 

               $dat = [] ;
               $pp++;

           }
            
                
        }
        return $data;

    }



    public function GetProdSlider()
    {
        $this->db->select('productos.*');
        $this->db->order_by('productos.id', 'asc');
        $qry = $this->db->get('productos', 6);
        $num = 0;

        foreach ($qry->result_array() as $row) {
            $imag = $this->db->where('producto_id', $row['id'])
                                ->get('imagenes', 1);

            if (isset($imag)) {
                $n = 0;
                foreach ($imag->result_array() as $value) {
                    $dta[$n] =['images' => $value['imagen']]; 
                    $n++;
                }
            }
            
            $data[$num] = [
                'titulo' => $row['titulo'],  
                'subtitulo' => $row['subtitulo'],  
                'contenido' => $row['contenido'],  
                'descripcion' => $row['descripcion'],  
                'imagen' => $dta,  
            ];
            $dta = [];
            $num++;
        }

        return $data;
    }


    public function getSlideReleace($id=0)
    {
        $this->db->select('productos.*');
        $this->db->where('categoria_id', $id);
        $this->db->order_by('productos.id', 'asc');
        $qry = $this->db->get('productos', 6);
        $num = 0;

        foreach ($qry->result_array() as $row) {
            $imag = $this->db->where('producto_id', $row['id'])
                                ->get('imagenes', 1);

            if (isset($imag)) {
                $n = 0;
                foreach ($imag->result_array() as $value) {
                    $dta[$n] =['images' => $value['imagen']]; 
                    $n++;
                }
            }
            
            $data[$num] = [
                'titulo' => $row['titulo'],  
                'url' => $row['prod_url'],  
                'subtitulo' => $row['subtitulo'],  
                'contenido' => $row['contenido'],  
                'descripcion' => $row['descripcion'],  
                'imagen' => $dta,  
            ];
            $dta = [];
            $num++;
        }

        return $data;
    }

    public function search_product($name='', $show=4)
    {
        $this->db->select('productos.*, categorias.url as subcat_url, sitemap.url as cat_url, imagenes.imagen');
        $this->db->like('productos.titulo', $name);
        $this->db->join('imagenes', 'imagenes.producto_id = productos.id', 'right');
        $this->db->join('categorias', 'categorias.id = productos.categoria_id', 'right');
        $this->db->join('paginas', 'paginas.idpagina = categorias.idpagina', 'right');
        $this->db->join('sitemap', 'sitemap.idsitemap = paginas.idsitemap', 'right');
        $this->db->group_by('productos.id');
        $qry = $this->db->get('productos', $show);

        return $qry->result_array();
    }


    public function getsubcat($id=0)
    {
        $this->db->select('*');
        $this->db->where('id',$id);
        $query=$this->db->get('categorias');
        return $query->row_array();
    }

    public function getcat($id = 0 )
    {
        $this->db->select('sitemap.*');
        $this->db->where('paginas.idpagina',$id);
        $this->db->join('paginas', 'paginas.idsitemap = sitemap.idsitemap');
        $query=$this->db->get('sitemap');
        return $query->row_array();
    }

    public function getBoxContent()
    {
        $where = array(11, 23, 28, 33, 37);
        $this->db->select('contenido.valor');
        $this->db->where_in('idcontenido', $where);
        $query=$this->db->get('contenido');
        return $query->result_array();
    }



}
