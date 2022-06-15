<?php
class formAgregarComanda
{
    public function formAgregarComandaShow()
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
            <link rel="stylesheet" href="../styles/estilos_agregarComanda.css">
            <title>Proforma</title>
        </head>

        <body>

            <div class="div-header">
                <img src="../img/logo_header.png" height="100" width="230">
            </div>
            
            <h1 class="titulo">Numero de mesa</h1>
            <div class="form-div">
                
                <form action="../moduloVentas/getComanda.php" method="post">
                    <input class="input" type="text" name="nombreProducto" required>
                    <input  class="agregar" type="submit" name="btnBuscarProducto" value="Buscar">
                    
                </form>

                
                <form class="form-f" action="../moduloVentas/getComanda.php" method="post">
                    <input class="input" type="text" name="NumeroComanda" placeholder="Numero de Comanda" required>
                    <input class="input" type="text" name="NumeroMesa" placeholder="Numero de mesa" required>
                    <input class="input" type="text" name="cliente" placeholder="Cliente">
                    <input class="agregar" type="submit" name="btnCrearComanda" value="Crear Comanda">
                </form>
            </div>
        
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['listaProductos'])) {
        ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                      
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio Unitario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($_SESSION['listaProductos'] as $productos) {

                        echo "<tr>
                                                    <form action=../moduloVentas/getComanda.php?idProducto=$productos[idProducto] method=post>
                                                    <input type=text value=$productos[idProducto] readonly hidden name=idProducto>
                                                    <td>" . $productos['idProducto'] . "</td>
                                                    <td>" . $productos['cantidad'] . "</td>
                                                    <td>" . $productos['precio'] . "</td>
                                                    <td><input class='buscar' type=submit name=btnEliminarProducto value=Eliminar></td>
                                                    <input type=hidden name=filaProductos value=$i>
                                                    </form>
                                                </tr>";
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table><form action="../moduloVentas/getComanda.php" method="post">
                        <input class='agregar' type="submit" name="btnEmitirComanda" value="Atras">
                </form>
            
            </body>
        <?php
        }
    }
    public function formDetalleComandaShow($listarDetalleComanda, $listaComandas)
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
            <link rel="stylesheet" href="../styles/estilos_agregarComanda.css">
            <title>Proforma</title>
        </head>

        <body>
            <h1 class="title">Modificar Comanda</h1>


            <div class="actualizaCarta">
                <center>
                    <div>
                        <h2 class="text">
                            <label for="">Numero de Comanda: </label>
                            <?php echo $listaComandas[0]['numeroComanda'] ?><br>
                            <label for="">Fecha: </label>
                            <?php echo $listaComandas[0]['fecha'] ?><br>
                            <label for="">Numero de Mesa: </label>
                            <?php echo $listaComandas[0]['numeroMesa'] ?><br>
                            <label for="">Cliente: </label>
                            <?php echo $listaComandas[0]['cliente'] ?><br>
                        </h2>
                    </div>
                </center>
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
                    $idcomanda = $listaComandas[0]['idcomanda'];

                    foreach ($listarDetalleComanda as $detalle) {
                        $idDetalleComanda=$detalle['idDetalleComanda'];
                    ?>
                        <tr>
                        <?php
                        $d = $detalle['idproducto'];
                        $obj = new entidadProducto();
                        $det = $obj->buscarProductoPorId($d);
                        foreach ($det as $de) {
                            
                            echo "
                                    <td>" . $de['nombre'] . "</td>
                                    <td>" . $de['tipo'] . "</td>
                                    <td>" . $de['precio'] . "</td>";
                        }
                            echo "<td>" . $detalle['cantidad'] . "</td>
                                    
                    				</tr>";
                    }

                        ?>

                                    <form action='getComanda.php' method='POST'>
                                    <input type='hidden' name='idComanda' value="<?php echo $idcomanda ?>">
                                    <input class='volver' type='submit' value='Eliminar' name='btnEliminarComanda'>
                                    </form>
                        <form action="../moduloVentas/getComanda.php" method="post">
                            <input  class="modificar" type="submit" name="btnEmitirComanda" value="Atras">
                        </form>


                
                        </body>

                <?php

            }
        }
                ?>
