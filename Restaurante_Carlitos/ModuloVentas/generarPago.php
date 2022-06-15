

	<h4>Formulario generar Pago</h4>

<form action="../ModuloVentas/getProforma.php" method="post">
    <input type="submit" name="btnEmitirPago" value="atras">
</form>
<form action="../ModuloVentas/controlComPago.php?accion=insertarPago" method="post">
    
    <input type="hidden" name="idProforma" id="idProforma" value="<?php echo $datoProforma[0]['idProforma'] ?>">
    <div>
        <label for="">Numero: </label>
        <?php echo $datoProforma[0]['Numero'] ?><br>
    </div>

    <div>
        <label for="">Cantidad: </label>
        <?php echo $datoProforma[0]['Cantidad'] ?><br>
    </div>

    <div>
        <label for="">Descripcion: </label>
        <?php echo $datoProforma[0]['Descripcion'] ?><br>
    </div>

    <div>
        <label for="">Valor: </label>
        <?php echo $datoProforma[0]['Valor'] ?><br>
    </div>

    <input type="submit" name="btnEmitirPago" value="Confirmar">
</form>