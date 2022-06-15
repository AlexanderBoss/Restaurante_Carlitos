<?php


//incluimos el archivo donde haremos la llamada del formulario autenicar usuario 
include_once("ModuloSeguridad/formAutenticarUsuario.php");

//creamos un objeto para instanciar la clase formulario Autenticar Usuario
$objFormAutenticar = new formAutenticarUsuario;

//Llamar al formulario de autenticacion
$objFormAutenticar -> formAutenticarUsuarioShow();


?>