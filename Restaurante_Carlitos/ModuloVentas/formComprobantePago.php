

<?php

class formComPago
{
    public function formComPagoShow($DetalleProforma,$Proforma)
    {
?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../styles/actualizarCarta.css">
            <title>Proforma</title>
        </head>

        <body>
            <h1>Comprobante De Pago</h1>       
                <div class="actualizaCarta">
                	<center><div><h2>
        				<label for="">Nombre: </label>
        				<?php echo $Proforma[0]['Nombre'] ?><br>
        				<label for="">Apellido: </label>
        				<?php echo $Proforma[0]['Apellido'] ?><br>
        				<label for="">DNI: </label>
        				<?php echo $Proforma[0]['DNI'] ?><br>
        				<label for="">Fecha de Emision: </label>
        				<?php echo $Proforma[0]['fechaEmision'] ?><br>
        				<label for="">Fecha de Entrega: </label>
        				<?php echo $Proforma[0]['fechaEntrega'] ?><br>
        				</h2>
    				</div></center>
                    <table class="carta">
                        <thead>
                            <tr class="encabezado">
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                
                                
                            </tr>
                        </thead>
                        
                        <?php
                        		$forpro=$Proforma[0]['idproforma'];
                                foreach ($DetalleProforma as $detalle) {
                         ?>
                                       <tr>
                                           <?php
                                                    $d=$detalle['idproducto'];
                    								$obj= new entidadProducto();
                    								$det=$obj->buscarProductoPorId($d); 
                    								foreach ($det as $de) {

                    								echo "
                                                    <td>". $de['nombre'] ."</td>
                                                    <td>". $de['tipo'] ."</td>
                                                    <td>". $de['precio'] ."</td>"
                                                    ;

                        		
                    								}
                    								echo"<td>".$detalle['cantidad']."</td>
                    								</tr>";
                    						               
                                }
                            ?>
       
                    </table>
                </div>

            <form action="getComprobantePago.php" method="POST">
            	<input type="hidden" name="idPro" id="idPro" value="<?php echo $forpro ?>">
                <input class="btnActualizarCarta" type="submit" value="Confirmar" name="btnEmitirComprobatePago">
            </form>
            <form action="getComprobantePago.php" method="POST">
                <input class="btnActualizarCarta" type="submit" value="Regresar" name="btnEmitirPago">
            </form>
        </body>

        </html>
<?php
    }
}
?>
