<?php
class formEmitirComanda
{
    public function formEmitirComandaShow($listaComandas)
    {
?>
     <!DOCTYPE html>
        <html lang="es">
        <head>
            <title>Emitir Comanda</title>
            <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
            <link rel="stylesheet" href="../styles/gestionarUsuarios.css">
            <link rel="stylesheet" href="../styles/estilos_generales.css">
        </head>
        <body>
            <div class="div-header">
                     <img src="../img/logo_header.png" height="100" width="230">
            </div>
                <h1 class="titulo">Lista de Comandas</h1>

                
                <form action="../ModuloVentas/getComanda.php" method="post">
                     <input  class="agregar" type="submit" name="btnAgregarComanda" value="Agregar Comanda">
                </form>
                  <?php
                     if (!isset($listaComandas)) {
                            echo 'no se encontro datos';
                        } else {
                     ?>
                        <table class="table table-hover">
                            <thead>
                                 <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Numero de Mesa</th>
                                    <th scope="col">estado</th>
                                    <th>Acciones</th>
                                 </tr>
                             </thead>
                             <tbody>
                                    <?php
                                    $i=0;
                                    foreach ($listaComandas as $comanda) {

                                    $i++;

                                    


                                    echo "<tr>
                                                    <td>" . $i . "</td>
                                                    <td>" . $comanda['fecha'] . "</td>
                                                    <td>" . $comanda['numeroMesa'] . "</td>";
                                                    if($comanda['estado']=="PorAtender"){
                                                        echo "<td>Por atender</td>";
                                                    }
                                                    echo "<td><form action=getComanda.php method=post><input type=submit name=btnModificarComanda value=detalle>
                                                              <input type=number name=idComanda value=$comanda[idcomanda] readonly required hidden>
                                                              </form></td>
                                
                                                </tr>";
                                
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    } }}?>