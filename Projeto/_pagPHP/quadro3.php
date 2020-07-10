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
			<form method="get" action="quadro4.php" autocomplete="off">
			
				<?php 
					$contaG = isset($_GET["numg"]) ? $_GET["numg"] : 0;
					for($c=1;$c<=$contaG;$c++){
						if(isset($_GET["gen$c"])){
							$i = $_GET["gen$c"];
							if($i==null){
								break;
							}
						} 
						echo "<span style='font-weight: bold'>Qual letra representa o gene para $i ? &nbsp;</span>"; 
						echo "<input type='text' size='1' maxlength='1' style='text-transform: uppercase; text-align: center' name='gene$c' required/> <br/><br/>";
						echo "<input type='text' name='carac$c' value='$i' hidden/>";
					}
					echo "<input type='number' name='numgen' value='$contaG' hidden/>";
				?>
				
				<input type="submit" class="botao" value="Próximo"/>
				
			</form>

		</div>
	</body>
</html>