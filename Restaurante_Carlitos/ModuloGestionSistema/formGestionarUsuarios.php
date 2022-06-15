<?php

class formGestionarUsuarios
{
    public function formGestionarUsuariosShow($listaUsuarios, $idrolpriv)
    {
?>  
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
            <link rel="stylesheet" href="../styles/gestionarUsuarios.css">
             <link rel="stylesheet" href="../styles/estilos_generales.css">
            <title>Gestionar Usuarios</title>
        </head>

        <body>
            <div class="div-header">
                 <img src="../img/logo_header.png" height="100" width="230">
            </div>

            <h1 class="titulo">Gestionar Usuarios</h1>
            <div class="div-table">
                <p class="dia">
                    <script>
                        var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                        var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                        var f = new Date();
                        document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                    </script>
                </p>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="foto">Foto</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th class="accion">Accion</th>

                        </tr>
                    </thead>
                        <?php
                        foreach ($listaUsuarios as $user) {
                            echo '<tr class="tr">';
                            echo "<td><img src='$user[foto]' alt='foto usuario' class='fotoid'></td>";
                            echo "<td>$user[nombre]</td>";
                            echo "<td>$user[usuario]</td>";
                            echo "<td>$user[email]</td>";
                            echo "<td>$user[cargo]</td>";
                            echo '<td>';
                            echo        '<form action=getUsuarios.php method=post>';
                            echo            '<input type=hidden name=idusuario value='.$user['idusuario'].'>';
                            echo            '<input type=hidden name=estado value='.$user['estado'].'>';
                            echo            '<input class=volver type=hidden name=idrolpriv value='.$idrolpriv.'>';
                            echo            '<input class=modificar type=submit name=btnModificar value=Modificar>';
                            echo            '<input  class=inhabilitar  type=submit name=btnInhabilitar value=Inhabilitar>';
                            echo        '</form>';
                            echo '</td>';
                        }
                        ?>
                </table>
                <form action="getUsuarios.php" method="POST">
                    <input  class="volver" type="hidden" name="idrolpriv" value="<?php echo $idrolpriv ?>">
                    <input  class="volver" type="submit" name="btnRegistrarUsuario" value="Registrar">
                </form>
                <form action="../ModuloSeguridad/getUsuario.php" method="POST">
                    <input  class="volver" type="hidden" name="idrolpriv" value="<?php echo $idrolpriv ?>">
                    <input  class="volver" type="submit" name="btnInicio" value="Atras">
                </form>
            </div>
        </body>

        </html>
<?php
    }
}
?>