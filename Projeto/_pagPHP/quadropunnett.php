<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8"/>
		<meta name="Description" CONTENT="Gerador de Quadro de Punnett"/>
		<meta name="KeyWords" CONTENT="html,javascript,css,php,punnett,genes"/>
		<title>Quadro de Punnett</title>
		<link rel="stylesheet" type="text/css" href="../_css/estilos.css"/>
	    <link rel="stylesheet" type="text/css" href="../_css/form.css"/>
		<link rel="icon" href="../_imagens/iconebio.png"/>
	</head>
	<body>
		<div id="interface" style="padding-top: 1px; padding-bottom: 50px;">
			<h2>Quadro de Punnett</h2>
			<form method="get" action="quadro1.php">
			
				<span style="font-size: 12pt; font-weight: bold">Número de Genes:</span> 
				<select name="gen">
					<?php 
						for($c=1;$c<=2;$c++){
							echo "<option value='$c'>$c</option>";
						}
					?>
				</select> <br/>

				<input type="submit" class="botao" value="Proxímo"/>
				
			</form>
		</div>
		<script>

		</script>
	</body>
</html>