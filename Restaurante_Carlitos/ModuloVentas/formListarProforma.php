<?php
class formListarProforma
{
    public function formListarProformaShow($lista,$btn)
    {
        
?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../styles/actualizarCarta.css">
            <title>Proformas</title>
        </head>

        <body>
            <h1>Formulario Proforma</h1>
            <?php
                if ($btn=="Emitir Proforma") {
                    # code...
                    ?>
                        <form action="getEmitirProforma.php" method="POST">
                            <input class="btnActualizarCarta" type="submit" value="agregar" name="btnAgregarProforma">
                        </form>
                    <?php
                }
            ?>
            
                <div class="actualizaCarta">
                    <table class="carta"> 
                        <thead>
                            <tr class="encabezado">
                                <th>N°</th>
                                <th>Fecha de Emision</th>
                                <th>Cliente</th>
                                <th>DNI</th>
                                <th>Accion</th>
                                
                            </tr>
                        </thead>
                        
                        <?php      
                                $i=0;
                                
                                foreach ($lista as $proforma) {
                                        $i++;
                                            echo "<tr>
                                                    <td>". $i ."</td>
                                                    <td>". $proforma['fechaEmision'] ."</td>
                                                    <td>". $proforma['Nombre']."</td>
                                                    <td>". $proforma['DNI']."</td>
                                                    <td><a href='getComprobantePago.php?accion=buscarDetalle&idproforma=$proforma[idproforma]' >Detalles</a></td>
                                                  </tr>";
                                                    
                                }
                            
                            
                            
                        ?>
                    
                    </table>
                </div>
            
            
        </body>

        </html>
<?php
    }
}
/*<form action="../shared/formBienvenida.php" method="POST">
                <input class="btnActualizarCarta" type="submit" value="Regresar" name="btnEmitirPago">
            </form>*/
?>
