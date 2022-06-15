<?php 

class listaDetalleComprobante {

    public function listaDetalleComprobanteShow($datoCuenta) {

        ?>
        <!DOCTYPE html>
        <html>
        <head>
        <title>Comprobantes de Pago</title>
        </head>
        <body>
                <h1>DETALLE COMPROBANTE</h1>
                <table border="1" width="80%">
                
                <thead>
                <tr>
                <th>IDPROFORMA</th>
                <th>IDDETALLEPROFORMA</th>   
                <th>PRODUCTO</th>
                <th>CANTIDAD</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                                foreach($datoCuenta  as  $dato){   
                                    echo "
                                    <tr>
                                                            <td>". $dato['idproforma'] ."</td>
                                                            <td>". $dato['idDetalleProforma'] ."</td>
                                                            <td>".$dato['nombre']."</td>
                                                            <td>".$dato['cantidad']."</td>
                                                        </tr>
                                    
                                    ";
                                    
                                }
                    
                    ?>
                </tbody>
                </table>
                <form action="../ModuloVentas/getComprobanteReembolso.php" method="POST" >
                <input type="submit" value="Volver" name="regresar">
        </body>

        </html>

        <?php
    }
}
?>

