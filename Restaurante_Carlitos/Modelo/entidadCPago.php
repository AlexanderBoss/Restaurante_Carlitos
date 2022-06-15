<?php

include_once("Conexion.php");

//CREAMOS LA CLASE CPago  HEREDA DE LA CLASE CONEXION
class CPago extends Conexion{

    //CREAMOS UN METODO PARA listarComprobantes
    public function listarComprobantes() {
        $queryCuentas = "Select* from proforma p where TIMESTAMPDIFF(day,CURDATE(),p.fechaEntrega)<3 and p.Estado='Pagado'";
        $resultado = mysqli_query($this->getConexion(),$queryCuentas);
        $this->cerrarConexion();
        $resultados = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
        
        return $resultados;
    }

    //CREAMOS UN METODO PARA buscarComprobanteDNI
    public function buscarComprobanteDNI($dni) {
        $queryCuentas = "Select* from proforma p where TIMESTAMPDIFF(day,CURDATE(),p.fechaEntrega)<3 and p.estado='Pagado' and p.dni LIKE '$dni%' ";
        $resultado = mysqli_query($this->getConexion(),$queryCuentas);
        
        $this->cerrarConexion();
        $resultados = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
       
        return $resultados;
    }

    //CREAMOS UN METODO PARA buscarDetalleporid
    public function buscarDetalleporid($idCom) {

        $queryCuentas = "select dp.idproforma,dp.idDetalleProforma,p.nombre,dp.cantidad from detalleproforma dp , producto p where dp.idproforma =$idCom and dp.idproducto = p.idProducto";
        $resultado = mysqli_query($this->getConexion(),$queryCuentas);
        $this->cerrarConexion();
        $resultado = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
        
        return $resultado;
    }

    //CREAMOS UN METODO PARA cambiarEstadoporid
    public function cambiarEstadoporid($idCom) {

        $queryCuentas = "update proforma set estado = 'Anulado' where idproforma=$idCom";
        $resultado = mysqli_query($this->getConexion(),$queryCuentas);
        $this->cerrarConexion();
    }

    public function modificarCuenta() {
        
    }
    
}
