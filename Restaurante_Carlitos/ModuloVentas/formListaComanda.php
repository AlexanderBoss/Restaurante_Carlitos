<?php
class formListaComanda{
    public function formListaComandaShow($respuesta){
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <title>Emitir Cuenta</title>
            <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
            <link rel="stylesheet" href="../styles/gestionarUsuarios.css">
            <link rel="stylesheet" href="../styles/estilos_generales.css">
            <link rel="stylesheet" href="../styles/estilos_numero_mesa.css">
        </head>
        <body>
            <div class="div-header">
                     <img src="../img/logo_header.png" height="100" width="230">
            </div>
            <h1 class="titulo">Listado de Comandas Activas</h1>
            <p class="dia">
                <script>
                    var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                    var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                    var f = new Date();
                    document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                </script>
            </p>
            <form method="POST" action="getCuenta.php">
                <div align="center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>N° Comanda</th>
                                <th>N° Mesa</th>
                                <th>Estado</td>
                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($respuesta as $comanda){
                                echo "<tr>
                                        <td>". $comanda['cliente'] ."</td>
                                        <td>". $comanda['fecha'] ."</td>
                                        <td>". $comanda['numeroComanda'] ."</td>
                                        <td>". $comanda['numeroMesa'] ."</td>
                                        <td>". $comanda['estado'] ."</td>
                                        <td><a href='getCuenta.php?accion=buscarDetalle&idCom=$comanda[idcomanda]'>Ver</a></td>
                                      </tr>";
                            }
                            
                            ?>
                        </tbody>
                    </table>
                </div>
                
                   
                
            </form>
        </body>
        <?php
    }
}
?>