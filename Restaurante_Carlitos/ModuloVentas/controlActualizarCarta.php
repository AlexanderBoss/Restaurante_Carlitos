<?php
    class actualizarCarta{
        public function listarCarta(){
            include_once('../Modelo/entidadProducto.php');
            include_once('formListarCarta.php');
            $objListarCarta = new entidadProducto;
            $objFormCarta = new formlistarCarta;
            $entradas = $objListarCarta->listarEntradas();
            $sopas = $objListarCarta->listarSopas();
            $segundos = $objListarCarta->listarSegundos();
            $bebidas = $objListarCarta->listarBebidas();
            $gaseosas = $objListarCarta->listarGaseosas();
            $objFormCarta->formListarCartaShow($entradas,$sopas,$segundos,$bebidas,$gaseosas);
        }
        public function listarProductos(){
            include_once('../Modelo/entidadProducto.php');
            include_once('formActualizandoCarta.php');
            $objEnti = new entidadProducto;
            $formActualizando = new formActualizarCarta;
            //$productos = $objEnti->listarProductos();
            $entradas = $objEnti->listarEntradasAll();
            $sopas = $objEnti->listarSopasAll();
            $segundos = $objEnti->listarSegundosAll();
            $bebidas = $objEnti->listarBebidasAll();
            $gaseosas = $objEnti->listarGaseosasAll();
            $formActualizando->formActualizandoCartaShow($entradas,$sopas,$segundos,$bebidas,$gaseosas);
        }
        public function actualizandoEstados($id, $estado){
            include_once('../Modelo/entidadProducto.php');
            $entiActualizando = new entidadProducto;
            $entiActualizando->cambiarEstado($id,$estado);
            $this->listarProductos();
        }
    }
?>