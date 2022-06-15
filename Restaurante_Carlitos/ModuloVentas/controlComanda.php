<?php
class controlComanda
{
    public function listarComandaPorEstado()
    {
        include_once("../Modelo/entidadComanda.php");
        $entidadComanda = new entidadComanda;
        $listaComandas = $entidadComanda->listarComandaPorEstado("PorAtender");
        include_once("../ModuloVentas/formEmitirComanda.php");
        $formEmitirComandar = new formEmitirComanda;
        $formEmitirComandar->formEmitirComandaShow($listaComandas);
    }

    public function BuscarProducto($nombreProducto)
    {
        include_once("../Modelo/entidadProducto.php");
        $entidadProducto = new entidadProducto;
        $listaProductos = $entidadProducto->listarProductosPorNombre($nombreProducto);
        include_once("../ModuloVentas/formAgregarProducto.php");
        $formulario = new formAgregarProducto;
        $formulario->formAgregarProductoShow($listaProductos);
    }

    public function  detalleComanda($idComanda)
    {
        include_once("../Modelo/entidadComanda.php");
        include_once("../Modelo/entidadProducto.php");
        include_once("../Modelo/entidadDetalleComanda.php");
        $entidadComanda = new entidadComanda;
        $entidadDetalleComanda = new entidadDetalleComanda;
        $listarDetalleComanda = $entidadDetalleComanda -> listarDetalleComanda($idComanda);
        $listaComandas = $entidadComanda->buscarComandaPorid($idComanda);

        include_once("../ModuloVentas/formAgregarComanda.php");
        $formulario = new formAgregarComanda;
        $formulario->formDetalleComandaShow($listarDetalleComanda, $listaComandas);
    }
    public function CrearComanda($numeroComanda,$NumeroMesa, $cliente, $arrayProductos = [])
    {
        include_once('../Modelo/entidadComanda.php');
        include_once('../Modelo/entidadDetalleComanda.php');

        $comanda = new entidadComanda;
        $comanda->insertarComanda($numeroComanda,$NumeroMesa, $cliente, $this->calcularTotal($arrayProductos));

        $idMax = $comanda->obtenerIdMaxProforma();

        $detalleComanda = new entidadDetalleComanda;
        $detalleComanda->insertarDetalleComanda($idMax[0]["idcomanda"], $arrayProductos);
        unset($_SESSION['listaProductos']);

        $this->listarComandaPorEstado();
    }
    public function calcularTotal($arrayProductos = [])
    {
        $cantidadTotal = 0;

        foreach ($arrayProductos as $producto) {
            $cantidadTotal = $cantidadTotal + $producto['precio'] * $producto['cantidad'];
        }

        return $cantidadTotal;
    }
    public function AgregarComanda(){
        include_once("../ModuloVentas/formAgregarComanda.php");
        $formulario = new formAgregarComanda;
        $formulario->formAgregarComandaShow();
    }/////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////
    //////////////////////////////////////////////
    public function  EliminarComanda($idComanda)
    {
        include_once("../Modelo/entidadDetalleComanda.php");
        include_once("../Modelo/entidadComanda.php");
       
        $entidadComanda = new entidadComanda;
       
        $EliminarComanda = $entidadComanda -> actualizarComandaestado($idComanda);



        include_once("../Modelo/entidadComanda.php");
        $entidadComanda = new entidadComanda;
        $listaComandas = $entidadComanda->listarComandaPorEstado("PorAtender");
        include_once("../ModuloVentas/formEmitirComanda.php");
        $formEmitirComandar = new formEmitirComanda;
        $formEmitirComandar->formEmitirComandaShow($listaComandas);
    }

}