<?php

class formConfirmarCuenta
{
    public function formConfirmarCuentaShow($DetalleCuenta,$Comanda)
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
            <h1>Emitir Cuenta</h1>
            
            
                <div class="actualizaCarta">
                	<center><div><h2>
        				<label for="">Nombre: </label>
        				<?php echo $Comanda[0]['cliente'] ?><br>
                        <label for="">N° Mesa: </label>
                        <?php echo $Comanda[0]['numeroMesa'] ?><br>
        				<label for="">Fecha: </label>
        				<?php echo $Comanda[0]['fecha'] ?><br>
        				</h2>
    				</div></center>
                    <table class="carta">
                        <thead>
                            <tr class="encabezado">
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                
                                
                            </tr>
                        </thead>
                        
                        <?php
                                $total=0;
                        		$forcom=$Comanda[0]['idcomanda'];
                                foreach ($DetalleCuenta as $detalle) {
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
                                                    $ps=$de['precio'];
                                                    $cd=$detalle['cantidad'];
                                                    $ttl=$ps*$cd;

                                                    $total=$total+$ttl;
                    						               
                                }
                            ?>
                            
                            
                        
                    
                    </table>
                    <center><div><h2>
                        <label for="">Total: </label>
                        <?php echo $total ?><br>
                        </h2>
                    </div></center> 
                </div>

            <form action="getCuenta.php" method="POST">
            	<input type="hidden" name="idcom" id="idcom" value="<?php echo $forcom ?>">
                <input type="hidden" name="total" id="total" value="<?php echo $total ?>">
                <input class="btnActualizarCarta" type="submit" value="Confirmar" name="btnConfirmarCuenta">
            </form>
            <form action="getCuenta.php" method="POST">
                <input class="btnActualizarCarta" type="submit" value="Regresar" name="btnEmitirCuenta">
            </form>
        </body>

        </html>
<?php
    }
}
?>
