<?php

require_once 'Conexion.php';

class Materia extends Conexion{

    public $materia_id;
    public $materia_nombre;
    public $materia_situacion;

    public function __construct( $args = [])
    {
        $this->materia_id = $args['materia_id'] ?? null;
        $this->materia_nombre = $args['materia_nombre'] ?? '';
        $this->materia_situacion = $args['materia_situacion'] ?? null;
    }
    
    
    public function guardar()
    {
        $sql = "INSERT into materias (materia_nombre) values ('$this->materia_nombre')";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    public function VerMaterias (){
        $sql = "SELECT * FROM materias WHERE materia_situacion =1";

        $resultado =  self::servir($sql);
        return $resultado;
    }

    public function BuscarID($ID){
            
        $sql = "SELECT * FROM materias  where materia_situacion = 1 AND materia_id = $ID ";

        $resultado =  array_shift(self::servir($sql));
        return $resultado;
    }

    
    public function modificar(){
        $sql = "UPDATE materias SET materia_nombre = '$this->materia_nombre' WHERE materia_situacion = 1 AND materia_id= $this->materia_id ";
  
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }
        
    public function eliminar(){
        $sql = "UPDATE materias SET materia_situacion = 0 WHERE materia_id = $this->materia_id ";

        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

    public function NotasAlumno($ID)
    {

        $sql = "SELECT materia_nombre, nota from notas INNER JOIN materias ON  nota_materia_id = materia_id WHERE nota_alu_id = $ID ";
        $resultado =  self::servir($sql);
        return $resultado;
    }


}
