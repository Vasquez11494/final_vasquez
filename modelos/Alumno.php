<?php

require 'Conexion.php';

class Alumno extends Conexion
{

    public  $alu_id;
    public  $alu_nombre;
    public  $alu_apellido;
    public  $alu_grado;
    public  $alu_arma;
    public  $alu_nacionalidad;
    public  $alu_situacion;


    public function __construct( $args = []){
        $this->alu_id = $args['alu_id'] ?? null ;
        $this->alu_nombre = $args['alu_nombre'] ?? '' ;
        $this->alu_apellido = $args['alu_apellido'] ?? '' ;
        $this->alu_grado = $args['alu_grado'] ?? '' ;
        $this->alu_arma = $args['alu_arma'] ?? '' ;
        $this->alu_nacionalidad = $args['alu_nacionalidad'] ?? '' ;
        $this->alu_situacion= $args['alu_sitacuion'] ?? 1 ;

    }


}
