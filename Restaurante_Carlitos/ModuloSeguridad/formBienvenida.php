<?php 
	class formBienvenida
	{
		public function formBienvenidaShow($Privilegios,$rolidpriv)
		{
			?>
				<!DOCTYPE html>
				<html>
				<head>
					<title>Formulario Bienvenida</title>
					<link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
				    <link rel="stylesheet" href="../styles/estilos_generales.css">
				    <link rel="stylesheet" href="../styles/estilos_formbienvenida.css">
				</head>
				<body>
					<div class="logo">
							<img src="../img/logo_header.png" height="100" width="230">
					</div>
				   <div class="div-div">
				   		
						
						<div class="contenedor-privilegios">
							<?php
								for($i=0;$i<count($Privilegios);$i++){
									echo '<form class="form-url" action="'.$Privilegios[$i]['url'].'" method=POST>';
									echo '<input  class="input-campo" type="hidden" name="idrolpriv" value ="'.$rolidpriv.'">';
									echo '<input  class="input-campo" type="submit" name="'.$Privilegios[$i]['privilegio'].'" value ="'.$Privilegios[$i]['nombre'].'">';
									echo '</form>';
								}
							?>
						</div>
					</div>
				</body>
				</html>
			<?php 
		}
	}
 ?>