<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8"/>
		<title>Quadro de Punnett</title>
		<link rel="stylesheet" type="text/css" href="../_css/estilos.css"/>
	    <link rel="stylesheet" type="text/css" href="../_css/form.css"/>
	<link rel="icon" href="../_imagens/iconebio.png"/>
	</head>
	<body>
		<div id="interface" style="padding-top: 1px; padding-bottom: 50px;">
		
			<h2>Quadro de Punnett</h2>
			<form method="get" action="quadro3.php" autocomplete="off">
			
				<?php 
					$contG = 0;
					echo "<h3 style='margin-bottom: 0px'>Características dos Genes recebidas:</h3> <br/><br/>";
					for($c=1;$c<=4;$c++){
						if(isset($_GET["g$c"])) {
							$i = $_GET["g$c"];
							if($i==null){
								break;
							}
							echo "<span style='font-weight: bold'>$i</span> <br/>";
							echo "<input type='text' name='gen$c' value='$i' hidden/>";
							$contG++;
						}
					}
					echo "<input type='number' name='numg' value='$contG' hidden/>";
				?>
				
				<input type="submit" class="botao" value="Próximo"/>
				
			</form>

		</div>
	</body>
</html>