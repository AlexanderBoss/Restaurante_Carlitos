<?php

$accion = "";
if(isset($_GET['accion'])) {
    $accion = $_GET['accion'];
}
    if(isset($_POST['btnEmitirComprobante'])){
        include_once("controladorCReembolso.php");
        $nuevoControl= new controlReembolso;
        $datoControl = $nuevoControl->listarDisponibles();

    }elseif($accion=="buscarDetalle"){
        $id = $_GET['idCom'];
        include_once('controladorCReembolso.php');
        $nuevoControl= new controlReembolso;
        $datoControl=$nuevoControl->listarDetallesComprobante($id);



    }elseif(isset($_POST['Buscar'])){
    $dni = $_POST['dni'];
    include_once('controladorCReembolso.php');
    $nuevoControl= new controlReembolso;
    $datoControl=$nuevoControl->listarPorDNI($id);

    }elseif($accion=="AnularComp"){
        $id = $_GET['idCom'];
        include_once('controladorCReembolso.php');
        $nuevoControl = new controlReembolso;
        $datoControl = $nuevoControl ->AnularComprobante($id);

    }elseif(isset($_POST['volver'])){
        include_once("controladorCReembolso.php");
        $nuevoControl= new controlReembolso;
        $datoControl = $nuevoControl->regresarBienvenida();

    }
    elseif(isset($_POST['regresar'])){
        include_once("controladorCReembolso.php");
        $nuevoControl= new controlReembolso;
        $datoControl = $nuevoControl->regresarDisponibles();

    }
    else{
        include_once('../shared/formMensajeSistema.php');
        $nuevoMensaje = new formMensajeSistema;
        $nuevoMensaje -> formMensajeSistemaShow("Acceso no Permitido","<a href='../index.php'>Iniciar Sesion</a>");
    }
?>