<?php
    class formModificarUsuario{
        public function modificarUsuariosShow($user, $id, $idrolprivi){
            ?>
                <!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Modificar Usuario</title>
                    <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
                    <link rel="stylesheet" href="../styles/gestionarUsuarios.css">
                    <link rel="stylesheet" href="../styles/estilos_generales.css">
                    <link rel="stylesheet" href="../styles/modificar_usuario.css">
                </head>
                <body>
                     <div class="div-header">
                         <img src="../img/logo_header.png" height="100" width="230">
                    </div>
                    <h1 class="titulo">Moficar Usuario</h1>
                    <form class="form-inputs" action="getUsuarios.php" method="POST">
                        <input type="hidden" name="id" value='<?php echo $id;?>'>
                        <label for="nombre">Nombres y Apellidos</label>
                        <input class="input" type="text" name="nombre" value='<?php echo $user[0]['nombre'];?>'>
                        <label for="usuario">Usuarios</label>
                        <input  class="input" type="text" name="usuario" value='<?php echo $user[0]['usuario'];?>'>
                        <label for="dni">DNI</label>
                        <input   class="input"type="text" name="dni" value='<?php echo $user[0]['dni'];?>'>
                        <label for="email">Email</label>
                        <input  class="input" type="text" name="email" value='<?php echo $user[0]['email'];?>'>
                        <label for="rol">Rol</label>
                        <div class="select">
                        <?php
                            if($user[0]['cargo']=='Cajero'){
                                echo '<select name="rol">';
                                echo '<option value="1">'.$user[0]['cargo'].'</option>';
                                echo '<option value="2">Recepcionista</option>';
                                echo '<option value="3">Administrador</option>';
                                echo '</select>';
                            }elseif($user[0]['cargo']=='Recepcionista'){
                                echo '<select name="rol">';
                                echo '<option value="2">'.$user[0]['cargo'].'</option>';
                                echo '<option value="1">Cajero</option>';
                                echo '<option value="3">Administrador</option>';
                                echo '</select>';
                            }elseif($user[0]['cargo']=='Administrador'){
                                echo '<select name="rol">';
                                echo '<option value="3">'.$user[0]['cargo'].'</option>';
                                echo '<option value="2">Recepcionista</option>';
                                echo '<option value="1">Cajero</option>';
                                echo '</select>';
                            }      
                            ?>
                            </div>
                        <input  class="volver" type="hidden" name="idrolpriv" value="<?php echo $idrolprivi?>">
                        <button  class="agregar" type="submit" name="btnActualizando">Actualizar</button>
                    </form>
                    <form action="getUsuarios.php" method="POST">
                    <input class="volver" type="submit" value="Regresar" name="btnRegresarModificar">
                </form>
                </body>
                </html>
            <?php
        }
    }
?>