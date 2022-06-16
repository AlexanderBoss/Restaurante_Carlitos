
<?php
session_start();
$accion = "";
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
}
if (isset($_POST['btnEmitirProforma'])) {

    include_once("controlEmitirProforma.php");
    $nuevoControl = new controlEmitirProforma;
    $nuevoControl->listarProformaPorEstado($_POST['btnEmitirProforma']); 
} elseif (isset($_POST['btnAgregarProforma'])) {
    include_once("controlEmitirProforma.php");
    $nuevoControl = new controlEmitirProforma;
    $nuevoControl->AgregarProforma();

    
} elseif (isset($_POST['btnBuscarProducto'])) {
    include_once("controlEmitirProforma.php");
    $nuevoControl = new controlEmitirProforma;
    $nuevoControl->BuscarProducto($_POST['nombreProducto']);

}
elseif (isset($_POST['btnCrearProforma'])) {
    include_once("controlEmitirProforma.php");
    $nuevoControl = new controlEmitirProforma;
    $nuevoControl->Crearproforma($_POST['fechaEmision'],$_POST['fechaEntrega'], $_POST['nombre'], $_POST['apellido'],$_POST['dni'],$_SESSION['listaProductos']);

}
 elseif (isset($_POST['btnAgregarProducto'])) {
    $productos = array("idProducto" => $_POST['idProducto'], "cantidad" => $_POST['cantidadProducto'], "precio"=> $_POST['precio']);
    if (empty($_SESSION["listaProductos"])) {
        $i = 0;
        $_SESSION["listaProductos"][$i] = $productos;
    } else {
        $i = count($_SESSION["listaProductos"]);
        $i++;
        $_SESSION["listaProductos"][$i] = $productos;
    }
    include_once("../ModuloVentas/formAgregarProforma.php");
    $formulario = new formAgregarProforma;
    date_default_timezone_set('America/Lima');
        $fechaEmision=date("Y-m-d");
    
    $formulario->formAgregarProformaShow($fechaEmision);
} 
// elseif (isset($_POST['btnModificarComanda'])) {
//     include_once("./controlEmitirProforma.php");
//     include_once("./controlComanda.php");
    
//     $nuevoControl = new controlComanda;

//     $nuevoControl->ModificarComandaShow($_POST['idComanda']);
//     //$nuevoControl->ModificarComandaShow($_POST['idComanda']);
// } 
elseif (isset($_POST['btnEliminarProducto'])) {
    $filaProductos = $_POST['filaProductos'];
    array_splice($_SESSION['listaProductos'], $filaProductos,1);
    include_once("controlEmitirProforma.php");
    $nuevoControl = new controlEmitirProforma;
    $nuevoControl->AgregarProforma();
} else {
    include_once('../shared/formMensajeSistema.php');
    $nuevoMensaje = new formMensajeSistema;
    $nuevoMensaje->formMensajeSistemaShow("Se ha detectado un acceso no permitido", "<a href='../index.php'>Iniciar Sesion</a>");
}
