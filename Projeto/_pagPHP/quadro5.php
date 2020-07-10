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
			<form method="get" action="quadro6.php" autocomplete="off">
				<h3>Resumo</h3>
				<?php 
				  $contG = isset($_GET["contGenes"]) ? $_GET["contGenes"] : 0;
				  echo "<h4>Genes: "; 
				  for($c=1;$c<=$contG;$c++){
						if(isset($_GET["car$c"])){
							$carac = $_GET["car$c"];
							$g = isset($_GET["gen$c"]) ? $_GET["gen$c"] : "A";
							echo "<input name='ca$c' value='$carac' hidden/>";
							if($carac==null){
								break;
							}
							if($c==$contG){
								echo "<span class='foco'>$carac</span>(<span class='focod'>".strtoupper($g)."</span>, <span class='focor'>".strtolower($g)."</span>).";
							}else{
								echo "<span class='foco'>$carac</span>(<span class='focod'>".strtoupper($g)."</span>, <span class='focor'>".strtolower($g)."</span>), ";
							}
							
						}
	
				  }
				  echo "</h4>";
				  echo "<h4>Características <span class='focod'>Dominantes</span>: ";
				  for($c=1;$c<=$contG;$c++){
					  if(isset($_GET["cd$c"])){
						  $cd = $_GET["cd$c"];
						  $g = isset($_GET["gen$c"]) ? $_GET["gen$c"] : "A";
						  echo "<input type='text' name='g$c' value='$g' hidden/>";
						  if($cd==null){
							  break;
						  }
						  if($c==$contG){
							echo "$cd(<span class='focod'>".strtoupper($g)."</span>).";
						  }else{
							echo "$cd(<span class='focod'>".strtoupper($g)."</span>), ";
						  }
						  echo "<input type='text' name='cd$c' value='$cd' hidden/>";
					  }
				  }
				  echo "</h4>";
				  echo "<h4>Características <span class='focor'>Recessivas</span>: ";
				  for($c=1;$c<=$contG;$c++){
					  if(isset($_GET["cr$c"])){
						  $cr = $_GET["cr$c"];
						  $g = isset($_GET["gen$c"]) ? $_GET["gen$c"] : "A";
						  if($cr==null){
							  break;
						  }
						  if($c==$contG){
							echo "$cr(<span class='focor'>".strtolower($g)."</span>).";
						  }else{
							echo "$cr(<span class='focor'>".strtolower($g)."</span>), ";
						  }
						  echo "<input type='text' name='cr$c' value='$cr' hidden/>";
					  }
				  }
				  echo "</h4>";
				  echo "<input type='number' name='con' value='$contG' hidden/>";
				?>
				
				<input type="submit" class="botao" value="Finalizar"/>
				
			</form>

		</div> 
	</body>
</html>