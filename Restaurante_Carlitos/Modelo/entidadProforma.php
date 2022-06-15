<?php

include_once("Conexion.php");

class Proforma extends Conexion{
 
    public function listarProforma() {
        $queryProforma = "SELECT * from proforma where Estado ='NoPagado'";
        $resultado = mysqli_query($this->getConexion(),$queryProforma);
        $this->cerrarConexion();
        $listaProforma = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
        return $listaProforma;
        
    }

    public function buscarProformaPorId($idProforma) {

        $queryProforma = "SELECT * from proforma where idproforma=$idProforma";
        $resultado = mysqli_query($this->getConexion(),$queryProforma);
        $this->cerrarConexion();
        $proforma = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
        
        return $proforma;
    }
    public function actualizarProforma($idProforma) {

        $queryProforma = "UPDATE proforma set Estado = 'Pagado' where idproforma=$idProforma";
        $resultado = mysqli_query($this->getConexion(),$queryProforma);
        $this->cerrarConexion();
        
    }public function insertarProforma($fechaEmision,$feechaEntrega, $nombre,$apellido,$dni, $total) {
            $query = "INSERT INTO comanda (`fechaEmision`,`fechaEntrega`,`nombre`, `apellido`, `DNI`, `total`,'estado') VALUES ('$fechaEmision','$feechaEntrega',$nombre,'$apellido','$dni','$total','PorAtender')";
            $resultado = mysqli_query($this->getConexion(),$query);
            $this->cerrarConexion();
            echo $query;
    }
    public function obtenerIdMaxProforma(){
            $Conexion = new Conexion;
            $queryProforma = "SELECT MAX(idproforma) AS idproforma FROM proforma";
            $resultado = mysqli_query($Conexion->getConexion(),$queryProforma);
            $Conexion->cerrarConexion();
            $resultado = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            var_dump($resultado);
            return $resultado;
         }


} 