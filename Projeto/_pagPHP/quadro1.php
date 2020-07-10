<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8"/>
		<title>Quadro de Punnett</title>
		<link rel="stylesheet" type="text/css" href="../_css/estilos.css"/>
	    <link rel="stylesheet" type="text/css" href="../_css/form.css"/>
		<link rel="icon" href="../_imagens/iconebio.png"/>
		<?php 
			$ng = isset($_GET["gen"]) ? $_GET["gen"] : 1;
		?>
	</head>
	<body>
		<div id="interface" style="padding-top: 1px; padding-bottom: 50px;">
		
			<h2>Quadro de Punnett</h2>
			<form method="get" action="quadro2.php" autocomplete="off">
			
				<?php
					for($c=1;$c<=$ng;$c++){
						echo "<label style='font-weight: bold' for='idg$c'>O $c"."° gene expressa: </label>";
						echo "<input style='text-align: center' type='text' name='g$c' id='idg$c' size='21' placeholder='característica do fenótipo' required/> <br/><br/>";
					}
				?>
				
				<input type="submit" class="botao" value="Próximo"/>
				
			</form>

		</div>
	</body>
</html>