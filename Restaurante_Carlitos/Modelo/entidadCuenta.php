<?php

include_once("Conexion.php");

class Cuenta extends Conexion{

    public function listarCuentas() {
        $queryCuentas = "SELECT * from cuenta";
        $resultado = mysqli_query($this->getConexion(),$queryCuentas);
        $this->cerrarConexion();
        $resultados = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
        return $resultados;
    }

    public function buscarCuentaPorId($idCuenta) {

        $queryCuentas = "SELECT * from cuenta where idCuenta=$idCuenta";
        $resultado = mysqli_query($this->getConexion(),$queryCuentas);
        $this->cerrarConexion();
        $resultado = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
        
        return $resultado;
    }

    public function modificarCuenta() {
        
    }
    
}

