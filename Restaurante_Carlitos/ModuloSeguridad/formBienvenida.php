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
							<img src="../img/logo_header.png" style="margin-left: auto;margin-right: auto;margin-top: 85px;" height="230px" width="700px">
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
								echo '<a class="input-campo" style="padding-top: 40px; text-decoration:none ;text-align:center;color:black;height:100px;width:220px ;margin-top:50px ;margin-left:50px" href="../index.php">SALIR </a> ';
							?>
						</div>
					</div>
				</body>
				</html>
			<?php 
		}
	}
 ?>

