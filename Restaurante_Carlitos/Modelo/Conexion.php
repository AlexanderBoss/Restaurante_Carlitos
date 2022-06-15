<?php


  //Creamos una clase conexion para poder conectar con la base de datos y hacer las consultas necesarias
  //nuestra base de datos se llama restaurante_carlitos 
  class Conexion{      
      private $conexion;
      function __construct(){
        $this->conexion = mysqli_connect("localhost","root","","restaurante_carlitos");
      }

  
      public function getConexion(){
        return $this->conexion;
      }

      public function cerrarConexion(){
        mysqli_close($this->conexion);
      } 
  }

?>