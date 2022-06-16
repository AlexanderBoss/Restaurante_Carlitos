<?php
    $accion = "";
    if(isset($_GET['accion'])) {
        $accion = $_GET['accion'];
    }  
    if(isset($_POST["btnEmitirCuenta"])){
        include_once("controlCuenta.php");
        $accesoPrincipal = new controlCuenta;
        $accesoPrincipal -> validarBotonEmitirCuenta();
        
    }
    elseif(isset($_POST["btnConfirmarCuenta"])){
        include_once("controlCuenta.php");
        $idcom=$_POST['idcom'];
        $total=$_POST['total'];
        $nuevoControl = new controlCuenta;
        $nuevoControl->ListarComandaActualizada($idcom,$total);
        

    }elseif(isset($accion)=="buscarDetalle") {
        require_once('controlCuenta.php');
        $idComanda=0;
        $idComanda=$_GET['idCom'];
        $nuevoControl = new controlCuenta;
        $nuevoControl->ListaDetalleCuenta($idComanda);
    }
    
    else{
        include_once("../shared/formMensajeSistema.php");
        $nuevoMensaje = new formMensajeSistema;
        $nuevoMensaje -> formMensajeSistemaShow("Se ha detectado un acceso denegado","<a href='../index.php'>Iniciar Sesion</a>");

    }


 
?>