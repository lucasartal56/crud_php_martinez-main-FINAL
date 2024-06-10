<?php
require_once 'Conexion.php';

class Asignacion extends Conexion{
    public $asig_id;
    public $asig_pro_id;
    public $asig_ap_id;    
    public $asig_situacion;


    public function __construct($args = [])
    {
        $this->asig_id = $args['asig_id'] ?? null;
        $this->asig_pro_id = $args['asig_pro_id'] ?? 0;
        $this->asig_ap_id = $args['asig_ap_id'] ?? 0;
        $this->asig_situacion = $args['asig_situacion'] ?? '';
    }

      // METODO PARA INSERTAR
      public function guardar(){
        $sql = "INSERT into asignacion (asig_pro_id, asig_ap_id) 
        values ('$this->asig_pro_id', '$this->asig_ap_id')";

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


        if($this->asig_pro_id != ''){
            $sql .= " AND asig_pro_id like '%$this->asig_pro_id%' ";
        }
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function MostrarAsignacion(){
        $sql = "SELECT asig_id, pro_nombre || ' ' || pro_apellido AS nombre_completo, ap_nombre FROM asignacion INNER JOIN programador ON asig_pro_id = pro_id INNER JOIN aplicacion ON asig_ap_id = ap_id WHERE asig_situacion = 1";

        $resultado = self::servir($sql);
        return $resultado;
    }


   

    public function buscarId($id){
        $sql = " SELECT * FROM asignacion WHERE asig_situacion = 1 AND asig_id = '$id' ";
        $resultado = array_shift( self::servir($sql)) ;
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE asignacion SET asig_pro_id = '$this->asig_pro_id', asig_ap_id = '$this->asig_ap_id'
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