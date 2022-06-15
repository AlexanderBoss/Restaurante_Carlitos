<?php
class formAgregarProducto
{
    public function formAgregarProductoProformaShow($listaProductos)
    {
?>
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <h1>Lista de Productos</h1>

                    <form action="../ModuloVentas/getComanda.php" method="post">
                        <input type="submit" name="btnAgregarComanda" value="Atras">
                    </form>
                    <?php
                    if (!isset($listaProductos)) {
                        echo 'no se encontro datos';
                    } else {
                        var_dump($listaProductos);
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

                                foreach ($listaProductos as $productos) {

                                    echo "<tr>
                                                    <form action=../ModuloVentas/getEmitirProforma.php?idProducto=$productos[idProducto] method=post>
                                                    <input type=text value=$productos[idProducto] readonly hidden name=idProducto>
                                                    <input type=text value=$productos[precio] readonly hidden name=precio>
                                                    <td>" . $productos['idProducto'] . "</td>
                                                    <td>" . $productos['nombre'] . "</td> 
                                                    <td><input name=cantidadProducto type=number value=1 min=1 pattern=^[0-9]+/></td>
                                                    <td>" . $productos['precio'] . "</td>
                                                    <td><input type=submit name=btnAgregarProducto value=Agregar></td>
                                                    </form>
                                                </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

<?php
    }
}
?>