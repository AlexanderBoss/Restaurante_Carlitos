<?php
class controlCuenta{
    public function validarBotonEmitirCuenta(){
        include_once("../Modelo/entidadComanda.php");
        $objComanda = new entidadComanda;
        $respuesta = $objComanda -> verificarDatosComanda();
        if($respuesta == 0 ){
			include_once("../shared/formMensajeSistema.php");
			$nuevoMensaje = new formMensajeSistema;
			$nuevoMensaje -> formMensajeSistemaShow("Datos no encontrados","<a href = '../index.php'> ir al inicio</a>");
		}
		else
		{
			//echo "nice";
			include_once("../Modelo/entidadComanda.php");
			include_once("formListaComanda.php");
			$objComanda = new entidadComanda;
			$respuesta = $objComanda -> obtenerDatosComanda();
			//print_r($respuesta);
			//$a = array_count_values(); //intval($respuesta);
			//echo count($respuesta);
			$variable = new formListaComanda();
			$variable -> formListaComandaShow($respuesta);
			

		}


    }
    public function ListaDetalleCuenta($idComanda){ 
            
            include_once("../Modelo/entidadComanda.php");
            include_once("../Modelo/entidadProducto.php");
            include_once("../Modelo/entidadDetalleComanda.php");
            include_once("formConfirmarCuenta.php");
            $BuscarDetalleComanda = new entidadDetalleComanda;
            $objFormConfirmarCuenta = new formConfirmarCuenta;
            $BuscarComanda = new entidadComanda;
            $Comanda = $BuscarComanda -> buscarComandaPorid($idComanda);
            $DetalleCuenta = $BuscarDetalleComanda ->listarDetalleComanda($idComanda);
            $objFormConfirmarCuenta->formConfirmarCuentaShow($DetalleCuenta,$Comanda);
        }
        public function ListarComandaActualizada($idcom,$total){ 
            include_once("../Modelo/entidadComanda.php");
            
            $UPComanda = new entidadComanda;
            $UP = $UPComanda ->actualizarComanda($idcom,$total);
            
            include_once("formListaComanda.php");
			$objComanda = new entidadComanda;
			$respuesta = $objComanda -> obtenerDatosComanda();
			$variable = new formListaComanda();
			$variable -> formListaComandaShow($respuesta);

    
            
        }
}
?>