<?php
class controlEmitirProforma
{
    public function listarProformaPorEstado($btn)
    {
        include_once("../Modelo/entidadProforma.php");
        $entidadProforma = new Proforma;
        $listarProforma = $entidadProforma->listarProforma();
        include_once("../ModuloVentas/formListarProforma.php");
        $formListarProforma = new formListarProforma;
        $formListarProforma->formListarProformaShow($listarProforma,$btn);
    }

    public function BuscarProducto($nombreProducto)
    {
        include_once("../Modelo/entidadProducto.php");
        $entidadProducto = new entidadProducto;
        $listaProductos = $entidadProducto->listarProductosPorNombre($nombreProducto);
        include_once("../ModuloVentas/formAgregarProductoProforma.php");
        $formulario = new formAgregarProducto;
        $formulario->formAgregarProductoProformaShow($listaProductos);
    }

    // public function  ModificarComanda($idComanda)
    // {
    //     include_once("../Modelo/entidadComanda.php");
    //     include_once("../Modelo/entidadProducto.php");
    //     include_once("../Modelo/entidadDetalleComanda.php");
        
    //     $entidadComanda = new entidadComanda;
    //     $entidadDetalleComanda = new entidadDetalleComanda;
    //     $listarDetalleComanda = $entidadDetalleComanda -> listarDetalleComanda($idComanda);
    //     $listaComandas = $entidadComanda->buscarComandaPorid($idComanda);

    //     include_once("./formAgregarProforma.php");
    //     $formulario = new formAgregarComanda;
    //     $formulario -> formModificarComandaShow($listarDetalleComanda, $listaComandas);
    // }
    public function CrearProforma($fechaEmision,$fechaEntrega, $nombre,$apellido,$dni, $arrayProductos = [])
    {
        include_once('../Modelo/entidadProforma.php');
        include_once('../Modelo/entidadDetalleProforma.php');

     
        $cantidadTotal = 0;

        foreach ($arrayProductos as $producto) {
            $cantidadTotal = $cantidadTotal + $producto['precio'] * $producto['cantidad'];
        }

        return $cantidadTotal;
        $Proforma = new Proforma;

        $comanda->insertarProforma($fechaEmision,$fechaEntrega, $nombre,$apellido,$dni, $cantidadTotal);

        

        $detalleProforma = new DetalleProforma;
        $detalleproforma -> insertarDetalleProforma(1, $arrayProductos);
        unset($_SESSION['listaProductos']);
        $btn="Emitir Proforma";
        $this->listarProformaPorEstado($btn);
    }
    public function calcularTotal($arrayProductos = [])
    {
        $cantidadTotal = 0;

        foreach ($arrayProductos as $producto) {
            $cantidadTotal = $cantidadTotal + $producto['precio'] * $producto['cantidad'];
        }

        return $cantidadTotal;
    }
   
    public function AgregarProforma(){
        include_once("../ModuloVentas/formAgregarProforma.php");
        date_default_timezone_set('America/Lima');
        $fechaEmision=date("Y-m-d");
        $formulario = new formAgregarProforma;
        $formulario->formAgregarProformaShow($fechaEmision);

    }
}
