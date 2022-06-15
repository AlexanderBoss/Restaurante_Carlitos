<?php
    class formActualizarCarta{
        public function formActualizandoCartaShow($entradas,$sopas,$segundos,$bebidas,$gaseosas){
            ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Actualizando Carta</title>
                <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
                <link rel="stylesheet" href="../styles/gestionarUsuarios.css">
                <link rel="stylesheet" href="../styles/estilos_generales.css">
                <link rel="stylesheet" href="../styles/actualizando_carta.css">
            </head>
            <body>
                <div class="div-header">
                     <img src="../img/logo_header.png" height="100" width="230">
                </div>
                <h1 class="titulo">Actualizando Carta del dia</h1>
                <div class="div-col">
                    <?php
                    echo '<div>';
                        echo '<h2>Entradas</h2>';
                        $i = 0;
                        foreach ($entradas as $entrada) {
                            echo '<form class="form-carta" action="getCarta.php" method="post">';
                                echo '<input type=hidden name=id value='.$entradas[$i]['idProducto'].'>';
                                echo '<input type=hidden name=estado value='.$entradas[$i]['estado'].'>';
                                echo '<input class="input" type=text name=nombre value='.$entradas[$i]['nombre'].'>';
                                $resultado = $entradas[$i]['estado'] == 1 ? 'Inhabilitado' : 'Habilitado';
                                echo '<input class="inhabilitar" type="submit" name="btnActualizando" value='.$resultado.'>';
                            echo '</form>';
                            $i++;
                        }
                    echo '</div>';
                    echo '<div>';
                    echo '<h2>Sopas</h2>';
                    $i = 0;
                    foreach ($sopas as $sopa) {
                        echo '<form class="form-carta" action="getCarta.php" method="post">';
                            echo '<input type=hidden name=id value='.$sopas[$i]['idProducto'].'>';
                            echo '<input type=hidden name=estado value='.$sopas[$i]['estado'].'>';
                            echo '<input class="input" type=text name=nombre value='.$sopas[$i]['nombre'].'>';
                            $resultado = $sopas[$i]['estado'] == 1 ? 'Habilitado' : 'Inhabilitado';
                            echo '<input class="inhabilitar" type="submit" name="btnActualizando" value='.$resultado.'>';
                        echo '</form>';
                        $i++;
                    }
                    echo '</div>';
                    echo '<div>';
                    echo '<h2>Segundos</h2>';
                    $i = 0;
                    foreach ($segundos as $segundo) {
                        echo '<form class="form-carta" action="getCarta.php" method="post">';
                            echo '<input type=hidden name=id value='.$segundos[$i]['idProducto'].'>';
                            echo '<input type=hidden name=estado value='.$segundos[$i]['estado'].'>';
                            echo '<input class="input" type=text name=nombre value='.$segundos[$i]['nombre'].'>';
                            $resultado = $segundos[$i]['estado'] == 1 ? 'Habilitado' : 'Inhabilitado';
                            echo '<input class="inhabilitar" type="submit" name="btnActualizando" value='.$resultado.'>';
                        echo '</form>';
                        $i++;
                    }
                    echo '</div>';
                    echo '<div>';
                    echo '<h2>Bebidas</h2>';
                    $i = 0;
                    foreach ($bebidas as $bebida) {
                        echo '<form class="form-carta" action="getCarta.php" method="post">';
                            echo '<input type=hidden name=id value='.$bebidas[$i]['idProducto'].'>';
                            echo '<input type=hidden name=estado value='.$bebidas[$i]['estado'].'>';
                            echo '<input class="input" type=text name=nombre value='.$bebidas[$i]['nombre'].'>';
                            $resultado = $bebidas[$i]['estado'] == 1 ? 'Habilitado' : 'Inhabilitado';
                            echo '<input class="inhabilitar" type="submit" name="btnActualizando" value='.$resultado.'>';
                        echo '</form>';
                        $i++;
                    }
                    echo '</div>';
                    echo '<div>';
                    echo '<h2>Gaseosas</h2>';
                    $i = 0;
                    foreach ($gaseosas as $gaseosa) {
                        echo '<form class="form-carta" action="getCarta.php" method="post">';
                            echo '<input type=hidden name=id value='.$gaseosas[$i]['idProducto'].'>';
                            echo '<input type=hidden name=estado value='.$gaseosas[$i]['estado'].'>';
                            echo '<input class="input" type=text name=nombre value='.$gaseosas[$i]['nombre'].'>';
                            $resultado = $gaseosas[$i]['estado'] == 1 ? 'Habilitado' : 'Inhabilitado';
                            echo '<input class="inhabilitar" type="submit" name="btnActualizando" value='.$resultado.'>';
                        echo '</form>';
                        $i++;
                    }
                    echo '</div>';
                    ?>
                    </div>
                <form action="getCarta.php" method="POST">
                    <input class="volver" type="submit" value="Regresar" name="btnRegresarEstado">
                </form>    
            </body>
            </html>
            <?php
        }
    }
?>