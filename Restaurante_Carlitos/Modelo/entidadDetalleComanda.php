<?php 

    include_once("../Modelo/Conexion.php");
    class entidadDetalleComanda extends conexion{
        public function insertarDetalleComanda($idComanda,$arrayProductos = []) {
            
            foreach($arrayProductos as $producto) {
                $query = "INSERT INTO detallecomanda (`idComanda`, `idProducto`,`cantidad`) 
                    VALUES ($idComanda,$producto[idProducto],$producto[cantidad])";
                $resultado = mysqli_query($this->getConexion(),$query);
    
            $resultado;
            }
            $this->cerrarConexion();
        }
        public function listarDetalleComanda($idComanda) {
            $queryProforma = "SELECT * from detallecomanda where idcomanda=$idComanda";
            $resultado = mysqli_query($this->getConexion(),$queryProforma);
            $this->cerrarConexion(); 
            $resultados = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $resultados;
        }
        public function EliminarDetalleComanda($idDetalleComanda){
             $queryProforma = "DELETE from detallecomanda where idcomanda=$idDetalleComanda";
            $resultado = mysqli_query($this->getConexion(),$queryProforma);
            $this->cerrarConexion(); 
            
        }
    }