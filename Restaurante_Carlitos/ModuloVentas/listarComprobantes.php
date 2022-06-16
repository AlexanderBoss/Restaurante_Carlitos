<?php 

class listarComprobantes {

    public function listarComprobantesShow($listaComprobante) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
        <title>Comprobantes de Pago</title>
            <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
            <link rel="stylesheet" href="../styles/gestionarUsuarios.css">
             <link rel="stylesheet" href="../styles/estilos_generales.css">
        </head>
        <body>
                <div class="div-header">
                     <img src="../img/logo_header.png" height="100" width="230">
                </div>
                <form action="../ModuloVentas/getComprobanteReembolso.php" method="POST" >
                    <h2 class="titulo">Comprobantes Disponibles</h2><br>
                    Dni:  <input  class="input-dato" type="text" name="dni">
                    <input class="buscar" type="submit" name="Buscar" value="Buscar">
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha Emision</th>
                            <th>Fecha Entrega</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DNI</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php
                        foreach($listaComprobante as  $dato){   
                            echo "
                            <tr>
                                                    <td>". $dato['idproforma'] ."</td>
                                                    <td>". $dato['fechaEmision'] ."</td>
                                                    <td>".$dato['fechaEntrega']."</td>
                                                    <td>".$dato['Nombre']."</td>
                                                    <td>".$dato['Apellido']."</td>
                                                    <td>".$dato['DNI']."</td>
                                                    <td>".$dato['Total']."</td>
                                                    <td>".$dato['Estado']."</td>
                                                    <td><a href='getComprobanteReembolso.php?accion=buscarDetalle&idCom=$dato[idproforma]'>Detalles</a>
                                                        <a href='getComprobanteReembolso.php?accion=AnularComp&idCom=$dato[idproforma]'>Anular</a>
                                                    </td>
                                                    
                                                </tr>
                            
                            ";

                        }
                    
                    ?>
                </tbody>
                </table>
                <!-- <form action="../moduloVentas/getComprobanteReembolso.php" method="POST" >
                <input class="volver" type="submit" name="volver" value="volver">
                </form> -->
        </body>
        </html>
<?php
    }
}
?>