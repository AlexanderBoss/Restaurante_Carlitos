<?php
include_once('../Modelo/entidadComanda.php');
include_once('../Modelo/entidadCuenta.php');
include_once('../Modelo/entidadBoleta.php');

class controladorBoleta {

    public function listarComandas() {
        $comandas = new entidadComanda;
        $listaComandas = $comandas->listarComandaPorEstado("Atendido");

        require_once('listaCuentas.php');
        $vistaListaCuentas = new listaCuentas;
        $vistaListaCuentas->listaCuentasShow($listaComandas);
    }

    public function generarBoleta($idComanda,$importe) {
        include_once('generarBoleta.php');
        $vistaGenerarBoleta = new generarBoleta;
        $vistaGenerarBoleta->generarBoletaShow($idComanda,$importe);
    }

    public function insertarBoleta($idComanda,$importe,$pago,$vuelto) {
        $boleta = new Boleta;
        $boleta->insertarBoleta($idComanda,$importe,$pago,$vuelto);
        $this->listarComandas();
    }
}