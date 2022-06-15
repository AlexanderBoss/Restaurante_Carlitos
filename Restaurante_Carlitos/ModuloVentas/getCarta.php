<?php
    if(isset($_POST['bntActualizar']) or isset($_POST['btnRegresarEstado'])){
        include_once('controlActualizarCarta.php');
        $objCarta = new actualizarCarta;
        $objCarta->listarCarta();
    }elseif(isset($_POST['btnAActualizar'])){
        include_once('controlActualizarCarta.php');
        $objActualizar = new actualizarCarta;
        $objActualizar->listarProductos();
    }elseif(isset($_POST['btnActualizando'])){
        $id = $_POST['id'];
        $estado = $_POST['estado'];
        include_once('controlActualizarCarta.php');
        $objActualizando = new actualizarCarta;
        $objActualizando->actualizandoEstados($id,$estado);
    }
    else{
        include_once('../shared/formMensajeSistema.php');
        $nuevoMensaje = new formMensajeSistema;
        $nuevoMensaje -> formMensajeSistemaShow("Acceso no Permitido","<a href='../index.php'>Iniciar Sesion</a>");
    }
?>