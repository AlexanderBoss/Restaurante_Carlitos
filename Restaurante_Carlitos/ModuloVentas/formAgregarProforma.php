<?php
class formAgregarProforma
{
    public function formAgregarProformaShow($fechaEmision)
    {
?>
        <link rel="stylesheet" href="../styles/estilos_generales.css">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <h1>Numero de mesa</h1>
                    <form action="../ModuloVentas/getEmitirProforma.php" method="post">
                        <input type="submit" name="btnBuscarProducto" value="Buscar">
                        <input type="text" name="nombreProducto" required>
                    </form>

                  
                    <form action="../ModuloVentas/getEmitirProforma.php" method="POST">
                        <input type="text" name="fechaEmision" value="<?php

                            echo $fechaEmision;
                        ?>">
                        <input type="date" name="fechaEntrega"  required>
                        <input type="text" name="nombre" placeholder="nombre">

                        <input type="text" name="apellido" placeholder="Apellido">
                        <input type="text" name="dni" placeholder="DNI">
                        <input type="submit" name="btnCrearProforma" value="Crear Proforma">

                        <input type="submit" name="apellido" value="Crear Comanda">
                        <input class="" type="submit" name="dni" value="Crear Comanda">

                    </form>

                </div>
            </div>
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
                        <th scope="col">Descripcion</th>
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
                                                    <form action=../ModuloVentas/getEmitirProforma.php?idProducto=$productos[idProducto] method=post>
                                                    <input type=text value=$productos[idProducto] readonly hidden name=idProducto>
                                                    <td>" . $productos['idProducto'] . "</td>
                                                    <td></td> 
                                                    <td>" . $productos['cantidad'] . "</td>
                                                    <td>" . $productos['precio'] . "</td>
                                                    <td><input type=submit name=btnEliminarProducto value=Eliminar></td>
                                                    <input type=hidden name=filaProductos value=$i>
                                                    </form>
                                                </tr>";
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>
        <?php
        }
    }
    public function formModificarComandaShow($listarDetalleComanda, $listaComandas)
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
                <center>
                    <div>

                        <h2>

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
                    $forpro = $listaComandas[0]['idcomanda'];
                    foreach ($listarDetalleComanda as $detalle) {
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
                        <form action="../ModuloVentas/getComanda.php" method="post">
                            <input  class="btnActualizarCarta" type="submit" name="btnEmitirComanda" value="Atras">
                        </form>
                <?php

            }
}
                ?>