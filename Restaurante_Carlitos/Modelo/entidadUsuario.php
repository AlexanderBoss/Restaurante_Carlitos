<?php
// INCLUIMOS LA CLASE CONEXION
include_once("Conexion.php");

//CREAMOS LA CLASE  ENTIDAD USUARIO HEREDA DE LA CLASE CONEXION
class entidadUsuario extends Conexion{
	public function autenticarUsuario($nombre,$pass){
		$pass = md5($pass);
		$consulta = "SELECT usuario FROM usuario WHERE usuario = '$nombre' AND pass = '$pass' AND estado = 1";
		$this -> getConexion();
		$resultado = mysqli_query($this->getConexion(),$consulta);
		$this -> cerrarConexion();
		$aciertos = mysqli_num_rows($resultado);
		if($aciertos == 1)
			return(1);
		else
			return(0);
	}

	//CREAMOS LA FUNCIOON OBTENER ROL
	public function obtenerRol($nombre){
		$consulta = "SELECT idrol FROM usuario WHERE usuario = '$nombre'";
		$resultado = mysqli_query($this->getConexion(),$consulta);
		$this -> cerrarConexion();
		$rol = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
		$idrol = $rol[0]['idrol'];
		return $idrol;
	}

	//CREAMOS LA FUNCION OBTENER USUARIOS
	public function obtenerUsuarios(){
		$consulta = "SELECT u.idusuario, u.foto, u.nombre, u.usuario, u.email, u.estado, r.cargo FROM usuario u, roles r WHERE u.idrol=r.idrol AND u.estado = 1 ORDER BY u.idusuario";
		$resultado = mysqli_query($this->getConexion(),$consulta);
        $this->cerrarConexion();
        $listaUsuarios = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
		return $listaUsuarios;
	}
	//CREAMO LA FUNCION  OBTENIENDO USUARIO POR ID
	public function obteniendoUsuariosPorId($id){
		$consulta2 = "SELECT u.nombre, u.usuario, u.dni, u.pass, u.email, u.foto, r.cargo FROM usuario u, roles r WHERE u.idrol=r.idrol AND u.idusuario = $id";
		$resultado = mysqli_query($this->getConexion(),$consulta2);
        $this->cerrarConexion();
		$usuario = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
		return $usuario;
	}

	//CREAMOS LA FUNCION ACTUALIZADNO USUARIOS SUS PRIVILEGIOS
	public function actualizandoUsuariosPrivilegios($id,$nombre,$usuario,$dni,$email,$foto,$rol){
		$consult = "UPDATE usuario SET nombre='$nombre', usuario='$usuario',dni='$dni',email='$email',foto='$foto',idrol=$rol WHERE idusuario=$id";
		$resultado = mysqli_query($this->getConexion(),$consult);
		$this->cerrarConexion();
		return $resultado;
		
	}

	//CREAMOS LA FUNCION HABILITAR E INHABILITAR USUARIO
	public function habilitarInhabilitarUsuario($idusuario,$estado){
		$consulta3 = "UPDATE usuario SET estado=0 WHERE idusuario=$idusuario" ;
		$resultado = mysqli_query($this->getConexion(),$consulta3);
		$this->cerrarConexion();
	}

	//CREAMOS LA FUNCION INSERTANDO AGREGANDO USUARIO
	public function agregandoUsuario($nombre,$usuario,$dni,$foto,$rol,$estado,$pass,$email,$secreto){
		$consulta4 = "INSERT INTO usuario(nombre, usuario, dni, pass, email, foto, idrol, estado, secreto) VALUES ('$nombre', '$usuario', '$dni', '$pass', '$email', '$foto', '$rol', '$estado', '$secreto')";
		$resultado = mysqli_query($this->getConexion(),$consulta4);
		$this->cerrarConexion();
	}

	//CREAMOS LA FUNCION VERIFICAR DNI
	public function verificarDni($campoDni)
	{
		$consulta = "SELECT *
					 FROM usuario
					 WHERE dni = '$campoDni'";
		$resultado = mysqli_query($this->getConexion(),$consulta);
		$this->cerrarConexion();
		$aciertos = mysqli_num_rows($resultado);
		if($aciertos == 1)
			return(1);
		else 
			return(0); 
	}

	//CREAMOS LA FUNCION VALIDAR RESPUESTA
	public function validarRespuesta($campoRespuesta)
	{
		$consulta = "SELECT *
					 FROM usuario
					 WHERE secreto = '$campoRespuesta'";
		$resultado = mysqli_query($this->getConexion(),$consulta);
		$this->cerrarConexion();
		$aciertos = mysqli_num_rows($resultado);
		if($aciertos == 1)
			return(1);
		else 
			return(0);
	}
	
	//CREAOS LA FUNCION OBTENER PASSWORD
	public function obtenerPassword($campoRespuesta)
	{
		$consulta = "SELECT *
					 FROM usuario
					 WHERE secreto = '$campoRespuesta'";
		$resultado = mysqli_query($this->getConexion(),$consulta);
		$this->cerrarConexion();
		return $resultado -> fetch_all()[0]; 
	}

	//CREAMOS LA FUNCION REESTABLECER PASSWORD
	public function reestablecerPassword($originalPassword,$dni)
	{
		$consulta = "UPDATE 
					 usuario
					 SET pass = '$originalPassword'
					 WHERE dni = '$dni'";	
					 
		$resultado = mysqli_query($this->getConexion(),$consulta);
		$this->cerrarConexion();
		
	}
}

//FIN DE LA CLASE ENTIDAD USUARIO

?>