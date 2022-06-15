<?php

include_once("Conexion.php");

class DetalleProforma extends Conexion{
 
    public function listarDetalleProforma($idProforma) {
        $queryProforma = "SELECT * from detalleproforma where idproforma=$idProforma";
        $resultado = mysqli_query($this->getConexion(),$queryProforma);
        $this->cerrarConexion();
        $listarDetalleProforma = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
        return $listarDetalleProforma;
    }

    public function insertarDetalleProforma($idProforma,$arrayProductos = []) {
            var_dump($arrayProductos);
            foreach($arrayProductos as $producto) {
                $query = "INSERT INTO detalleproforma (`idproforma`, `idproducto`,`cantidad`) 
                    VALUES ($idProforma,$producto[idProducto],$producto[cantidad])";
                $resultado = mysqli_query($this->getConexion(),$query);
    
                echo $query;
            }
            $this->cerrarConexion();
    }

} 