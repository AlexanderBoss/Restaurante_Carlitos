<?php

include_once('../Modelo/entidadProforma.php');

function ejecutarAccion($accion = null) {
        
    switch($accion) {
        case 'buscarProforma':
            $idProforma = $_GET['idProforma'];
            $proforma = new Proforma;
            $datoProforma = $proforma->buscarProformaPorId($idProforma);

            include_once('generarPago.php');
            break;
        case 'insertarPago':
            
            $Pago = new Proforma;
            $Pago->actualizarProforma($_POST['idProforma']);
            
            include_once('getProforma.php');
            
            break;
    }
}

$accion = "";
if(isset($_GET['accion'])) {
    $accion = $_GET['accion'];
}
ejecutarAccion($accion);