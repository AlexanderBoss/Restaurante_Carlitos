<?php
include_once('controladorBoleta.php');

if(isset($_POST['btnEmitirBoleta'])) {

    $controlador = new controladorBoleta;
    $controlador->listarComandas();
    
} elseif(isset($_POST['btnGenerarBoleta'])) {
    
    $controlador = new controladorBoleta;
    $controlador->generarBoleta($_POST['idComanda'],$_POST['importe']);
} elseif(isset($_POST['btnInsertarBoleta'])) {

    $controlador = new controladorBoleta;
    $controlador->insertarBoleta($_POST['idComanda'],$_POST['importe'], $_POST['pago'], $_POST['vuelto']);
    
} else {
    include_once('../shared/formMensajeSistema.php');
    $nuevoMensaje = new formMensajeSistema;
    $nuevoMensaje->formMensajeSistemaShow("Se ha detectado un acceso no permitido", "<a href='../index.php'>Iniciar Sesion</a>");
}