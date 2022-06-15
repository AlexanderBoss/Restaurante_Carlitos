<?php
    class formListarCarta{
        public function formListarCartaShow($entradas,$sopas,$segundos,$bebidas,$gaseosas){
            ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Carta</title>
                <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
                <link rel="stylesheet" href="../styles/gestionarUsuarios.css">
                <link rel="stylesheet" href="../styles/estilos_generales.css">
                <link rel="stylesheet" href="../styles/estilos_carta.css">
            </head>
            <body>
                <div class="div-header">
                    <img src="../img/logo_header.png" height="100" width="230">
                </div>
                <h1 class="titulo">Carta</h1>
                <p>Dia: 
                    <script>
                        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                        var f=new Date();
                        document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                    </script>
                </p>
                <div class="div-col">
                <?php
                    echo '<div>';
                    echo '<h3>Entradas</h3>';
                    for($e=0;$e<count($entradas);$e++){
                        echo '<p>'.$entradas[$e]['nombre'].'</p>';
                    }
                    echo'</div>';
                    echo '<div>';
                    echo '<h3>Sopas</h3>';
                    for($s=0;$s<count($sopas);$s++){
                        echo '<p>'.$sopas[$s]['nombre'].'</p>';
                    }
                    echo'</div>';
                    echo '<div>';
                    echo '<h3>Plato Principal</h3>';
                    for($p=0;$p<count($segundos);$p++){
                        echo '<p>'.$segundos[$p]['nombre'].'</p>';
                    }
                    echo'</div>';
                    echo '<div>';
                    echo '<h3>Bebidas</h3>';
                    for($b=0;$b<count($bebidas);$b++){
                        echo '<p>'.$bebidas[$b]['nombre'].'</p>';
                    }
                    echo'</div>';
                    echo '<div>';
                    echo '<h3>Gaseosas</h3>';
                    for($g=0;$g<count($gaseosas);$g++){
                        echo '<p>'.$gaseosas[$g]['nombre'].'</p>';
                    }
                    echo'</div>';
                ?>
                </div>
                <form action="getCarta.php" method="POST">
                    <input class="agregar" type="submit" value="Actualizar" name="btnAActualizar">
                </form>
            </body>
            </html>
            <?php
        }
    }
?>