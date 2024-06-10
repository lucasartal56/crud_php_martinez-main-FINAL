<?php
require_once 'Conexion.php';

class Aplicacion extends Conexion{
    public $ap_id;
    public $ap_nombre;
    public $ap_descripcion;    
    public $ap_situacion;


    public function __construct($args = [])
    {
        $this->ap_id = $args['ap_id'] ?? null;
        $this->ap_nombre = $args['ap_nombre'] ?? '';
        $this->ap_descripcion = $args['ap_descripcion'] ?? '';
        $this->ap_situacion = $args['ap_situacion'] ?? '';
    }

      // METODO PARA INSERTAR
      public function guardar(){
        $sql = "INSERT into aplicacion (ap_nombre, ap_descripcion) 
        values ('$this->ap_nombre', '$this->ap_descripcion')";

        //  var_dump($sql);
        //  exit;
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

      // METODO PARA CONSULTAR

      public static function buscarTodos(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM aplicacion where ap_situacion = 1 ";
        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscar(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM aplicacion where ap_situacion = 1 ";


        if($this->ap_nombre != ''){
            $sql .= " AND ap_nombre like '%$this->ap_nombre%' ";
        }
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarId($id){
        $sql = " SELECT * FROM aplicacion WHERE ap_situacion = 1 AND ap_id = '$id' ";
        $resultado = array_shift( self::servir($sql)) ;
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE aplicacion SET ap_nombre = '$this->ap_nombre', ap_descripcion = '$this->ap_descripcion'
         WHERE ap_id = $this->ap_id ";
     
        // var_dump($sql);
        // exit;
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

    public function eliminar(){
        // $sql = "DELETE FROM aplicacion WHERE ap_id = $this->ap_id ";

        // echo $sql;
        $sql = "UPDATE aplicacion SET ap_situacion = 0 WHERE ap_id = $this->ap_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }
}