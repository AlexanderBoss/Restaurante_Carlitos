<?php
$accion = "";
if(isset($_GET['accion'])) {
    $accion = $_GET['accion'];

}
include_once('../Modelo/entidadProforma.php');
if(isset($_POST['btnEmitirPago'])) {
	require_once('controlComprobantePago.php');
	$nuevoControl = new controladorComprobantePago;
    $nuevoControl->ListarProformas();

    
}
elseif (isset($_POST['btnEmitirComprobatePago'])) {
	require_once('controlComprobantePago.php');
	$idproforma=$_POST['idPro'];
	$nuevoControl3 = new controladorComprobantePago;
	$nuevoControl3->ListarProformasActualizada($idproforma);
	
}elseif (isset($accion)=="buscarDetalle") {
	require_once('controlComprobantePago.php');
	$idProforma=$_GET['idproforma'];
	$nuevoControl2 = new controladorComprobantePago;
	$nuevoControl2->ComPago($idProforma);
	
}

else {
    include_once('../shared/formMensajeSistema.php');
    $nuevoMensaje = new formMensajeSistema;
    $nuevoMensaje -> formMensajeSistemaShow("Acceso no Permitido","<a href='../index.php'>Iniciar Sesion</a>");
}

?>
