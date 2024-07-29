<?php
require_once 'Conexion.php';

class Asignacion extends Conexion{
    public $asig_id;
    public $as_programador;
    public $as_aplicacion;    
    public $asig_situacion;


    public function __construct($args = [])
    {
        $this->asig_id = $args['asig_id'] ?? null;
        $this->as_programador = $args['as_programador'] ?? 0;
        $this->as_aplicacion = $args['as_aplicacion'] ?? 0;
        $this->asig_situacion = $args['asig_situacion'] ?? '';
    }

      // METODO PARA INSERTAR
      public function guardar(){
        $sql = "INSERT into asignacion (as_programador, as_aplicacion) 
        values ('$this->as_programador', '$this->as_aplicacion')";

        //  var_dump($sql);
        //  exit;
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

      // METODO PARA CONSULTAR

      public static function buscarTodos(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM asignacion where asig_situacion = 1 ";
        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscar(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM asignacion where asig_situacion = 1 ";


        if($this->as_programador != ''){
            $sql .= " AND as_programador like '%$this->as_programador%' ";
        }
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function MostrarAsignacion(){
        $sql = "SELECT asig_id, pro_nombre || ' ' || pro_apellido AS nombre_completo, ap_nombre FROM asignacion INNER JOIN programador ON as_programador = pro_id INNER JOIN aplicacion ON as_aplicacion = ap_id WHERE asig_situacion = 1";

        $resultado = self::servir($sql);
        return $resultado;
    }


   

    public function buscarId($id){
        $sql = " SELECT * FROM asignacion WHERE asig_situacion = 1 AND asig_id = '$id' ";
        $resultado = array_shift( self::servir($sql)) ;
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE asignacion SET as_programador = '$this->as_programador', as_aplicacion = '$this->as_aplicacion'
         WHERE asig_id = $this->asig_id ";
     
        // var_dump($sql);
        // exit;
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

    public function eliminar(){
        // $sql = "DELETE FROM asignacion WHERE asig_id = $this->asig_id ";

        // echo $sql;
        $sql = "UPDATE asignacion SET asig_situacion = 0 WHERE asig_id = $this->asig_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }
}