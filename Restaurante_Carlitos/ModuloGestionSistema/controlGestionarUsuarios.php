<?php
    class controlGestionarUsuarios{
        public function obtenerUsuariosPrivilegios($idrolpriv){
            include_once("../Modelo/entidadUsuario.php");
            include_once("formGestionarUsuarios.php");
            $usuarios = new entidadUsuario;
            $gestionarUsuario = new formGestionarUsuarios;
            $listaUsuarios = $usuarios -> obtenerUsuarios();
            $gestionarUsuario -> formGestionarUsuariosShow($listaUsuarios, $idrolpriv);
        }
        public function modificarUsuarios($id,$idrolprivi){
            include_once("../Modelo/entidadUsuario.php");
            include_once("formModificarUsuario.php");
            $usuariosModificar = new entidadUsuario;
            $modificarUsuario = new formModificarUsuario;
            $user = $usuariosModificar->obteniendoUsuariosPorId($id);   
            $modificarUsuario->modificarUsuariosShow($user,$id,$idrolprivi);       
        }
        public function actualizanUsuariosPrivilegios($id,$nombre,$usuario,$dni,$email,$foto,$rol, $idrolprivi){
            include_once('../Modelo/entidadUsuario.php');
            include_once('../shared/formMensajeSistema.php');
            include_once('../Modelo/entidadUsuarioPrivilegio.php');
            include_once('../ModuloSeguridad/formBienvenida.php');
            $modUsuario = new entidadUsuario;
            $modPrivi = new entidadUsuarioPrivilegio;
            $nuevoMensaje = new formMensajeSistema;
            $inicio = new formBienvenida;
            $privilegios = $modPrivi->obtenerPrivilegios($idrolprivi);
            $actualizando = $modUsuario -> actualizandoUsuariosPrivilegios($id,$nombre,$usuario,$dni,$email,$foto,$rol);
            if($actualizando==TRUE){
                //$this->obtenerUsuariosPrivilegios($idrolpriv);
                $inicio->formBienvenidaShow($privilegios,$idrolprivi);
            }else{
                $nuevoMensaje -> formMensajeSistemaShow("Error al actualizar","<a href='../shared/formBienvenida.php'>Bienvenida</a>");
            }
        }
        public function habilitarInhabilitarUsuario($idusuario,$estado){
            include_once('../Modelo/entidadUsuario.php');
            include_once('../shared/formMensajeSistema.php');
            include_once('formGestionarUsuarios.php');
            $modHabilitar = new entidadUsuario;
            $modHabilitar -> habilitarInhabilitarUsuario($idusuario,$estado);
            $nuevoMensaje = new formMensajeSistema;
            $nuevoForm = new formGestionarUsuarios;
            if($modHabilitar==TRUE){
                $this->obtenerUsuariosPrivilegios($idrolpriv);
            }else{
                $nuevoMensaje -> formMensajeSistemaShow("Error al Inhabilitar","<a href='../shared/formBienvenida.php'>Bienvenida</a>");
            }
        }
        public function mostrarFormAddUsuario(){
            include_once('formRegistrarUsuario.php');
            $formAdd = new registrarUsuario;
            $formAdd->addUsuarioShow();
        }
        public function registrandoUsuario($nombre,$usuario,$dni,$foto,$rol,$estado,$pass,$email,$secreto){
            include_once('../Modelo/entidadUsuario.php');
            include_once('../shared/formMensajeSistema.php');
            include_once('formGestionarUsuarios.php');
            $addUsuario = new entidadUsuario;
            $addUsuario-> agregandoUsuario($nombre,$usuario,$dni,$foto,$rol,$estado,$pass,$email,$secreto);
            $nuevoMensaje = new formMensajeSistema;
            $inicio = new formGestionarUsuarios;
            if($addUsuario==TRUE){
                $this->obtenerUsuariosPrivilegios($idrolpriv);
            }else{
                $nuevoMensaje -> formMensajeSistemaShow("Error al Registrar","<a href='../shared/formBienvenida.php'>Bienvenida</a>");
            }
        }
    }
?>