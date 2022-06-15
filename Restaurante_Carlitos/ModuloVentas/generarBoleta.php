<?php

class generarBoleta {

    public function generarBoletaShow($idComanda,$importe) {

        ?>

         <!DOCTYPE html>
        <html lang="es">
        <head>
            <title>Emitir Cuenta</title>
            <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
            <link rel="stylesheet" href="../styles/gestionarUsuarios.css">
            <link rel="stylesheet" href="../styles/estilos_generales.css">
            <link rel="stylesheet" href="../styles/estilos_generarBoleta.css">
            
        </head>
        <body>
             <div class="div-header">
                <img src="../img/logo_header.png" height="100" width="230">
            </div>
            <div class="div-boleta">
                <h4 class="titulo">Formulario generar boleta</h4>

                <form action="../ModuloVentas/getBoleta.php" method="post">
                    <input type="submit" name="btnEmitirBoleta" value="Atras">
                </form>
                <form class="form-b" action="../ModuloVentas/getBoleta.php" method="post">
                    
                    <input type="hidden" name="idComanda" id="idComanda" value="<?php echo $idComanda ?>">
                    <div class="label-input">
                        <label for="importe">Importe: </label>
                        <input class="input-l" type="text" name="importe" id="importe" value="<?php echo $importe ?>" readonly>
                    </div>

                    <div class="label-input">
                        <label for="pago">Pago: </label>
                        <input class="input-l" type="text" name="pago" id="pago" required>
                    </div>

                    <div class="label-input">
                        <label for="vuelto">Vuelto: </label>
                        <input class="input-l" type="text" name="vuelto" id="vuelto" readonly>
                    </div>

                    <input class="agregar" type="submit" name="btnInsertarBoleta" value="Confirmar">
                </form>
                <script>
                    const valorImporte = document.querySelector('#importe').value;
                    let inputPago = document.querySelector('#pago');

                    inputPago.addEventListener('keyup', ()=>{
                        
                        let inputVuelto = document.querySelector('#vuelto');
                        inputVuelto.value = inputPago.value - valorImporte;
                    });
                </script>
            </div>
        </body>
            <?php
    }
}