<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php 
			$contgen = isset($_GET["con"]) ? $_GET["con"] : 0;
			$cria = true;
			function cria_radio($s){	
				for($c=1;$c<=$GLOBALS["contgen"];$c++){
							if(isset($_GET["g$c"])){
								$g = $_GET["g$c"];
								$carac = $_GET["ca$c"];
								$cd = $_GET["cd$c"];
								$cr = $_GET["cr$c"];
								if($g==null){
									break;
								}
								echo "<input name='ge$c' value='$g' hidden/>";
								
								echo "<span style='font-weight: bold'>$carac</span> : ";
								
								echo "<label for='".$s."idgen1$g'>".strtolower($g).strtolower($g)."</label>";
								echo "<input type='radio' id='".$s."idgen1$g' name='".$s."gen$g' value='".strtolower($g).strtolower($g)."' checked/> &nbsp; ";
								
								echo "<label for='".$s."idgen2$g'>".strtoupper($g).strtolower($g)."</label>";
								echo "<input type='radio' id='".$s."idgen2$g' name='".$s."gen$g' value='".strtoupper($g).strtolower($g)."'/> &nbsp; ";
						
								echo "<label for='".$s."idgen3$g'>".strtoupper($g).strtoupper($g)."</label>";
								echo "<input type='radio' id='".$s."idgen3$g' name='".$s."gen$g' value='".strtoupper($g).strtoupper($g)."'/><br/>";
								
								if($c>2){	
									echo "<label for='".$s."idgen1$g'>".strtolower($g).strtolower($g)."</label>";
									echo "<input type='radio' id='".$s."idgen1$g' name='".$s."gen$g' value='".strtolower($g).strtolower($g)."' checked/> &nbsp; ";
								
									echo "<label for='".$s."idgen2$g'>".strtoupper($g).strtolower($g)."</label>";
									echo "<input type='radio' id='".$s."idgen2$g' name='".$s."gen$g' value='".strtoupper($g).strtolower($g)."'/> &nbsp; ";
						
									echo "<label for='".$s."idgen3$g'>".strtoupper($g).strtoupper($g)."</label>";
									echo "<input type='radio' id='".$s."idgen3$g' name='".$s."gen$g' value='".strtoupper($g).strtoupper($g)."'/>";
								}
								if($GLOBALS["cria"]==true){
									echo "<input type='text' name='caract$c' value='$carac' hidden/>";
									echo "<input type='text' name='cad$c' value='$cd' hidden/>";
									echo "<input type='text' name='car$c' value='$cr' hidden/>";
								}
						   }
						   
						}
						$GLOBALS["cria"] = false;
			}
		?>
		<meta charset="UTF-8"/>
		<title>Quadro de Punnett</title>
		<link rel="stylesheet" type="text/css" href="../_css/estilos.css"/>
	    <link rel="stylesheet" type="text/css" href="../_css/form.css"/>
		<link rel="icon" href="../_imagens/iconebio.png"/>
	</head>
	<body>
		<div id="interface" style="padding-top: 1px; padding-bottom: 50px;">
		
			<h2>Quadro de Punnett</h2>
			<form method="get" action="quadro7.php" autocomplete="off">
				

				
				<fieldset> <legend>Alelos da Mãe</legend>
					<?php		
						cria_radio("m");
					?>
					
				</fieldset> <br/>
				
				<fieldset> <legend>Alelos do Pai</legend>
					<?php
						cria_radio("p");
					?>
				</fieldset>
				
				
				<input type="submit" class="botao" value="Gerar Quadro de Punnett"/> 
				<input type='number' name='cont' value='<?php echo $contgen;?>' hidden/>
			</form>
		</div> 
	</body>
</html>