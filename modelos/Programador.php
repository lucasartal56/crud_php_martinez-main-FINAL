<?php
require_once 'Conexion.php';

class Programador extends Conexion{
    public $pro_id;
    public $pro_grado;
    public $pro_arma;    
    public $pro_nombre;
    public $pro_apellido;
    public $pro_catalogo;
    public $pro_situacion;


    public function __construct($args = [])
    {
        $this->pro_id = $args['pro_id'] ?? null;
        $this->pro_grado = $args['pro_grado'] ?? '';
        $this->pro_arma = $args['pro_arma'] ?? '';
        $this->pro_nombre = $args['pro_nombre'] ?? '';
        $this->pro_apellido = $args['pro_apellido'] ?? '';
        $this->pro_catalogo = $args['pro_catalogo'] ?? 0;
        $this->pro_situacion = $args['pro_situacion'] ?? '';


    }

      // METODO PARA INSERTAR
      public function guardar(){
        $sql = "INSERT into programador (pro_grado, pro_arma, pro_nombre,
         pro_apellido, pro_catalogo) values ('$this->pro_grado', '$this->pro_arma',
         '$this->pro_nombre', '$this->pro_apellido', $this->pro_catalogo)";

        //  var_dump($sql);
        //  exit;
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

      // METODO PARA CONSULTAR

      public static function buscarTodos(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM programador where pro_situacion = 1 ";
        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscar(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM programador where pro_situacion = 1 ";


        if($this->pro_nombre != ''){
            $sql .= " AND pro_nombre like '%$this->pro_nombre%' ";
        }
        if($this->pro_apellido != ''){
            $sql .= " AND pro_apellido like'%$this->pro_apellido%' ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarId($id){
        $sql = " SELECT * FROM programador WHERE pro_situacion = 1 AND pro_id = '$id' ";
        $resultado = array_shift( self::servir($sql)) ;

        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE programador SET pro_grado = '$this->pro_grado', pro_arma = '$this->pro_arma',
         pro_nombre = '$this->pro_nombre', pro_apellido = '$this->pro_apellido',
          pro_catalogo = $this->pro_catalogo WHERE pro_id = $this->pro_id ";
     
        
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

    public function eliminar(){
        // $sql = "DELETE FROM programador WHERE pro_id = $this->pro_id ";

        // echo $sql;
        $sql = "UPDATE programador SET pro_situacion = 0 WHERE pro_id = $this->pro_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }
}