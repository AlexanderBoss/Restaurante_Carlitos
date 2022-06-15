<?php
	if(isset($_POST['btnInicio'])){
		$idrolprivi = $_POST['idrolpriv'];
		include_once('../ModuloSeguridad/controlAutenticarUsuario.php');
		$accesoAtras = new controlAutenticarUsuario;
		$accesoAtras->obtenerPrivilegios($idrolprivi);
	}else{
		$botonAceptar=$_POST['btnAceptar'];
		if(isset($btnAtras)){
			include_once('../ModuloSeguridad/controlAutenticarUsuario.php');
			$accesoAtras = new controlAutenticarUsuario;
			$accesoAtras->obtenerPrivilegios($idrolprivi);
		}elseif(isset($botonAceptar)){
			$nombre = $_POST['nombre'];
			$pass = $_POST['pass'];
			if(strlen($nombre) < 4 or strlen($pass) < 4)
			{
				include_once("../shared/formMensajeSistema.php");
				$nuevoMensaje = new formMensajeSistema;
				$nuevoMensaje -> formMensajeSistemaShow("Los datos ingresados no son validos","<a href = '../index.php'>ir al inicio</a");
			}else{
				include_once("../ModuloSeguridad/controlAutenticarUsuario.php");
				$nuevoAcceso = new controlAutenticarUsuario;
				$nuevoAcceso -> verificarUsuario($nombre,$pass);
			}
		}else{
			include_once("../shared/formMensajeSistema.php");
			$nuevoMensaje = new formMensajeSistema;
			$nuevoMensaje -> formMensajeSistemaShow("Acceso no permitido","<a href = '../index.php'>ir al inicio</a");
		}
	}
?>