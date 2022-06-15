<?php 
    // INCLUIMOS LA CLASE CONEXION
    include_once("../Modelo/Conexion.php");
    //CREAMOS LA CLASE ENTIDAD COMANDA  HEREDA DE LA CLASE CONEXION
    class entidadComanda extends Conexion{
        //CREAMOS LA CLASE listarComandaPorEstado
        public function listarComandaPorEstado($estado){
            $queryComandas = "SELECT * from comanda where estado = '".$estado."'";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
            $resultados = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $resultados;
        }
        //CREAMOS LA CLASE insertarComanda
        public function insertarComanda($numeroComanda,$numMesa, $cliente, $total) {
            $query = "INSERT INTO comanda (`numeroComanda`,`fecha`,`NumeroMesa`, `cliente`, `total`, `estado`) VALUES ('$numeroComanda',CURDATE(),$numMesa,'$cliente',$total,'PorAtender')";
            $resultado = mysqli_query($this->getConexion(),$query);
            $this->cerrarConexion();
            
        }
        //CREAMOS LA CLASE obtenerIdMaxProforma
        public function obtenerIdMaxProforma(){
            $Conexion = new Conexion;
            $queryProforma = "SELECT MAX(idcomanda) AS idcomanda FROM comanda";
            $resultado = mysqli_query($Conexion->getConexion(),$queryProforma);
            $Conexion->cerrarConexion();
            $resultado = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            
            return $resultado;
         }

        //CREAMOS LA CLASE verificarDatosComanda
        public function verificarDatosComanda(){
            $queryComandas = "SELECT* from comanda WHERE fecha = CURDATE() and estado = 'activo'";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
            $resultados = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $resultados;
            
        }
        //CREAMOS LA CLASE obtenerDatosComanda
        public function obtenerDatosComanda(){
            $queryComandas = "SELECT* from comanda WHERE fecha = CURDATE() and estado = 'PorAtender'";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
            $resultados = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            return $resultados;

        }
        //CREAMOS LA CLASE buscarDetalleporid
        public function buscarDetalleporid($idCom) {

            $queryComandas = "SELECT * from detalleComanda where idcomanda = $idCom";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
            $resultado = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            
            return $resultado;
        }
        //CREAMOS LA CLASE buscarComandaPorid
        public function buscarComandaPorid($idCom) {

            $queryComandas = "SELECT * from comanda where idcomanda = $idCom";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
            $resultado = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            
            return $resultado;
        }
        //CREAMOS LA CLASE actualizarComanda
        public function actualizarComanda($idcom,$total){
            $queryComandas = "UPDATE comanda set estado = 'PorAtender', total =$total where idcomanda=$idcom";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
        }
        
        //CREAMOS LA CLASE modificarEstadoComanda
        public function modificarEstadoComanda($idComanda,$estado) {
            $queryComandas = "UPDATE comanda set estado = '$estado' where idcomanda=$idComanda";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
        }
        
        //CREAMOS LA CLASE actualizarComandaestado
        public function actualizarComandaestado($idcom){
            $queryComandas = "UPDATE comanda set estado = 'eliminada' where idcomanda=$idcom";
            $resultado = mysqli_query($this->getConexion(),$queryComandas);
            $this->cerrarConexion();
        }
    }
?>