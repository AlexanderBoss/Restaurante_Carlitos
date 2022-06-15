<?php

class listaCuentas {

    public function listaCuentasShow($listaComandasAtendidas) {

        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <title>Emitir Cuenta</title>
             <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
            <link rel="stylesheet" href="../styles/gestionarUsuarios.css">
            <link rel="stylesheet" href="../styles/estilos_generales.css">
            
        </head>
        <body>
             <div class="div-header">
                <img src="../img/logo_header.png" height="100" width="230">
            </div>
            <h1 class="titulo">Listado de Comandas atendidas</h1>
            <p class="dia">
                <script>
                    var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                    var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                    var f = new Date();
                    document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                </script>
            </p>
                <div align="center">


                    <table border="2" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>N° Comanda</th>
                                <th>N° Mesa</th>
                                <th>Estado</th>
                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listaComandasAtendidas as $comanda){
                                echo "<form action='getBoleta.php' method=POST>
                                <input name=idComanda value=$comanda[idcomanda] hidden>
                                <input name=importe value=$comanda[total] hidden>
                                <tr>
                                    <td>". $comanda['cliente'] ."</td>
                                    <td>". $comanda['fecha'] ."</td>
                                    <td>". $comanda['numeroComanda'] ."</td>
                                    <td>". $comanda['numeroMesa'] ."</td>
                                    <td>". $comanda['estado'] ."</td>
                                    <td><input class='detalle' type='submit' name=btnGenerarBoleta value='Ver detalles' ></td>
                                </tr>

                                </form>";
                            }
                            
                            ?>
                        </tbody>
                    </table>
                </div>
        
        </body>

        <?php
    }
}

    