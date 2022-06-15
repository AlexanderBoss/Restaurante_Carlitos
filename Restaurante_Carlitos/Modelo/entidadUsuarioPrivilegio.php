<?php
// INCLUIMOS LA CLASE CONEXION
	include_once("Conexion.php");
	//CREAMOS LA CLASE ENTIDAD USUARIO PRIVILEGIO HEREDA DE LA CLASE CONEXION
	class entidadUsuarioPrivilegio extends Conexion
{
	public function obtenerPrivilegios($rol)
	{
		$consulta = "SELECT privilegio, url, nombre From privilegios where idrol = '$rol'";
		$resultado = mysqli_query($this->getConexion(),$consulta);
		$privilegios = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
		return $privilegios;
	}
}
?>