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
			<form method="get" action="quadro5.php" autocomplete="off">
			
				<?php 
				   $contG = isset($_GET["numgen"]) ? $_GET["numgen"] : 0;
				   for($c=1;$c<=$contG;$c++){
					   if(isset($_GET["carac$c"])){
							$i = $_GET["carac$c"];
							$g = isset($_GET["gene$c"]) ? $_GET["gene$c"]: "A";
							if($i==null){
								break;
							}
							echo "<span style='font-weight: bold'>Qual é a característica <span class='focod'>dominante</span> para <span class='foco'>$i</span> ? &nbsp;</span>";
							echo "<input style='margin-right:-5px; text-align: center' type='text' name='cd$c' size='20' placeholder='".strtoupper($g)."' required/> <br/><br/>";
						
							echo "<span style='font-weight: bold'>Qual é a característica <span class='focor'>recessiva</span> para <span class='foco'>$i</span> ? &nbsp;</span>";
							echo "<input style='margin-right: -13px; text-align: center' type='text' name='cr$c' size='20' placeholder='".strtolower($g)."' required/> <br/><br/><br/>";
							
							echo "<input type='text' name='car$c' value='$i' hidden/>";
							echo "<input type='text' name='gen$c' value='$g' hidden/>";
					   }
				   }
				   echo "<input type='number' name='contGenes' value='$contG' hidden/>";
				?>
				
				<input type="submit" class="botao" value="Próximo"/>
				
			</form>

		</div> 
	</body>
</html>