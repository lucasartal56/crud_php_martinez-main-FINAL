<?php
require_once 'Conexion.php';

class Tarea extends Conexion
{
    public $tarea_id;
    public $tarea_nombre;
    public $tarea_ap_id;
    public $tarea_fecha;
    public $tarea_estado;
    public $tarea_situacion;


    public function __construct($args = [])
    {
        $this->tarea_id = $args['tarea_id'] ?? null;
        $this->tarea_nombre = $args['tarea_nombre'] ?? '';
        $this->tarea_ap_id = $args['tarea_ap_id'] ?? 0;
        $this->tarea_fecha = $args['tarea_fecha'] ?? '';
        $this->tarea_estado = $args['tarea_estado'] ?? '';
        $this->tarea_situacion = $args['tarea_situacion'] ?? '';
    }

    // METODO PARA INSERTAR
    public function guardar()
    {
        $sql = "INSERT into tarea (tarea_nombre, tarea_ap_id, tarea_fecha, tarea_estado) 
        values ('$this->tarea_nombre', '$this->tarea_ap_id', '$this->tarea_fecha', '$this->tarea_estado')";

        //  var_dump($sql);
        //  exit;
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    // METODO PARA CONSULTAR

    public static function buscarTodos(...$columnas)
    {
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM tarea where tarea_situacion = 1 ";
        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscar(...$columnas)
    {
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM tarea where tarea_situacion = 1 ";


        if ($this->tarea_nombre != '') {
            $sql .= " AND tarea_nombre like '%$this->tarea_nombre%' ";
        }
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function MostrarTarea(...$columnas)
    {
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = " SELECT tarea_id, tarea_nombre, ap_nombre, tarea_fecha, tarea_estado FROM tarea
        INNER JOIN aplicacion ON tarea_ap_id = ap_id
        WHERE tarea_situacion =1";

        if ($this->tarea_nombre!= '') {
            $sql .= " AND tarea_nombre like '%$this->tarea_nombre%' ";
        }
        if ($this->tarea_id!= '') {
            $sql .= " AND tarea_id = $this->tarea_id ";
        }
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function MostrarTareaEncontradas($tarea_id)
    {
    
        $sql = " SELECT tarea_id, tarea_nombre, ap_nombre, tarea_fecha, tarea_estado FROM tarea
        INNER JOIN aplicacion ON tarea_ap_id = ap_id
        WHERE tarea_situacion =1 AND tarea_id = $tarea_id";

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarId($id)
    {
        $sql = " SELECT * FROM tarea WHERE tarea_situacion = 1 AND tarea_id = '$id' ";
        $resultado = array_shift(self::servir($sql));
        return $resultado;
    }

    public function modificar()
    {
        $sql = "UPDATE tarea SET tarea_nombre = '$this->tarea_nombre', tarea_ap_id = '$this->tarea_ap_id'
         WHERE tarea_id = $this->tarea_id ";

        // var_dump($sql);
        // exit;
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    public function eliminar()
    {
        // $sql = "DELETE FROM tarea WHERE tarea_id = $this->tarea_id ";

        // echo $sql;
        $sql = "UPDATE tarea SET tarea_situacion = 0 WHERE tarea_id = $this->tarea_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }
}
