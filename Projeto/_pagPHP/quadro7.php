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
			<div id="interface" style="padding-top: 1px; padding-bottom: 50px; margin-top: 20px; margin-bottom: 5px">
			<section id="quadro" style="margin-left: 300px">
				<h2>Quadro de Punnett</h2>
				<table>
					<?php 					
						$contgen = isset($_GET["cont"]) ? $_GET["cont"] : 0;
						if($contgen==null){
							$contgen = 0;
						}
						$contgen *= 2;
						
						$pai = "";
						$mae = "";
						$g1 = isset($_GET["ge1"]) ? $_GET["ge1"] : "A";
						$g2 = isset($_GET["ge2"]) ? $_GET["ge2"] : "A";
						
						for($c=1;$c<=intval($contgen/2);$c++){
							$g = isset($_GET["ge$c"]) ? $_GET["ge$c"] : "A";
							if(isset($_GET["pgen$g"])){
								$pai = $pai.$_GET["pgen$g"];
							}
						}
						
						
						for($c=1;$c<=intval($contgen/2);$c++){
							$g = isset($_GET["ge$c"]) ? $_GET["ge$c"] : "A";
							if(isset($_GET["mgen$g"])){
								$mae = $mae.$_GET["mgen$g"];
							}
						}
						
						if($pai==null){
							$pai = 0;
						}
						$pai = str_split($pai);
						
						if($mae==null){
							$mae = 0;
						}
						$mae = str_split($mae);
						
						echo "<tr>";
						echo "<td class='geno'></td>";
						for($c=1;$c<=$contgen;$c++){
							echo "<td class='gen'>";
							if($contgen/2==1){
								$pga = $pai[0].",".$pai[1];
								$pga = explode(",", $pga);
								
								$mga = $mae[0].",".$mae[1];
								$mga = explode(",", $mga);
								
								
								echo $mga[$c-1];
							}elseif($contgen/2==2){
								$pga = $pai[0].$pai[2].",".$pai[0].$pai[3].",".$pai[1].$pai[2].",".$pai[1].$pai[3];
								$pga = explode(",", $pga);
								
								$mga = $mae[0].$mae[2].",".$mae[0].$mae[3].",".$mae[1].$mae[2].",".$mae[1].$mae[3];
								$mga = explode(",", $mga);
								
								echo $mga[$c-1];
							}
							echo "</td>";
						}
						echo "</tr>";
						
						$rg = 0;
						$dg = 0;
						$hg = 0;
						$i = 0;
						$ind = 1;

						
						for($ip=0;$ip<$contgen;$ip++){
							echo "<tr><td class='gen'>".$pga[$ip]."</td>";
							for($im=0;$im<$contgen;$im++){
								echo "<td class='genm' onmousemove='aumentaTexto(this)' onmouseout='diminuiTexto(this)' onclick='mostraDesc(this)'";
								
								$pp = str_split($pga[$ip].$mga[$im]);
								natcasesort($pp);
								arsort($pp, SORT_NUMERIC); 
								$pp = implode("",$pp);
								if($g1<$g2){
									$pp = strrev($pp);
								}
								
								if($pp==ctype_upper($pp)){
									echo "id='gd$dg'>";
									$dg++;
									$i++;
								}elseif($pp==ctype_lower($pp)){
									echo "id='gr$rg'>";
									$rg++;
									$i++;
								}else{
									echo "id='gh$hg'>";
									$hg++;
									$i++;
								}
								
								if($pp[0]==ctype_upper($pp[1])){
									$aux = $pp[0];
									$pp[0] = $pp[1];
									$pp[1] = $aux;
								}
								if(($contgen/2==2) && ($pp[2]==ctype_upper($pp[3]))){
									$aux = $pp[2];
									$pp[2] = $pp[3];
									$pp[3] = $aux;
								}
									

								echo $pp;
							}
							echo "</td></tr>";
						}
						
						$cad1 = isset($_GET["cad1"]) ? $_GET["cad1"] : "";
						$cad2 = isset($_GET["cad2"]) ? $_GET["cad2"] : "";
						$car1 = isset($_GET["car1"]) ? $_GET["car1"] : "";
						$car2 = isset($_GET["car2"]) ? $_GET["car2"] : "";
						$caract1 = isset($_GET["caract1"]) ? $_GET["caract1"] : "";
						$caract2 = isset($_GET["caract2"]) ? $_GET["caract2"] : "";
						
					?>
				</table> <br/>
				<input type="button" class="botao" onclick="relat()" value="Ver Relatório"/>
			</section>
			<aside id="relatorio" style="<?php if($contgen/2==2){ echo "margin-top: -425px;";}else{ echo "margin-top: -200px;" ;}?>">
				
			</aside>
			</div> 
			<script>
				
				if(<?php echo $contgen;?>==2){
					document.getElementById("interface").style.height = "560px";
				}
				
				function mostraDesc(ele){
					var re = document.getElementById("relatorio");
					var t = ele.innerHTML;
					var a = Array(<?php echo $contgen;?>);
					re.innerHTML = "<h3>Análisando o genótipo: <span style='color: "+ ele.style.color + "'>" + t + "</span></h3>"; 
					if(<?php echo $contgen;?>==4){
						for(c=0;c<2;c++){
							a[c] = t[c];
							if(a[c]==t[c].toUpperCase()){
								re.innerHTML = re.innerHTML + "<h3><?php echo $caract1;?>: <span class='focod'><?php echo  $cad1;?></span></h3>";
								break;
							}
							if((a[0]==t[0].toLowerCase()) && (a[1]==t[1].toLowerCase())){
								re.innerHTML = re.innerHTML + "<h3><?php echo $caract1;?>: <span class='focor'><?php echo $car1;?></span></h3>";
								break;
							}
						}
						for(c=2;c<4;c++){
							a[c] = t[c];
							if(a[c]==t[c].toUpperCase()){
								re.innerHTML = re.innerHTML + "<h3><?php echo $caract2;?>: <span class='focod'><?php echo $cad2;?></span></h3>";
								break;
							}
							if((a[2]==t[2].toLowerCase()) && (a[3]==t[3].toLowerCase())){
								re.innerHTML = re.innerHTML + "<h3><?php echo $caract2;?>: <span class='focor'><?php echo $car2;?></span></h3>";
								break;
							}
						}
					}else if(<?php echo $contgen;?>==2){
						for(c=0;c<2;c++){
							a[c] = t[c];
							if(a[c]==t[c].toUpperCase()){
								re.innerHTML = re.innerHTML + "<h3><?php echo $caract1;?>: <span class='focod'><?php echo $cad1;?></span></h3>";
								break;
							}
							if((a[0]==t[0].toLowerCase()) && (a[1]==t[1].toLowerCase())){
								re.innerHTML = re.innerHTML + "<h3><?php echo $caract1;?>: <span class='focor'><?php echo $car1;?></span></h3>";
								break;
							}
						}
					}
				}
				
				function aumentaTexto(ele){
					ele.style.padding = "30px";
					if(<?php echo intval($contgen/2);?>==2){
						ele.style.paddingBottom = "25px";
					}
					ele.style.backgroundColor = "rgba(0,180,0,0.8)";			
					ele.style.cursor = "pointer";
				}
				
				function diminuiTexto(ele){
					ele.style.padding = "0px";
					ele.style.backgroundColor = "rgba(0,120,0,0.5)";
				}
				
				function relat(){
					document.getElementById("quadro").style.marginLeft = "0px";
					document.getElementById("relatorio").style.opacity = "1";
					document.getElementById("relatorio").style.width = "300px";
					
					document.getElementsByTagName("ASIDE")[0].innerHTML = "<h2 style='font-size: 24pt; text-shadow: none; padding-bottom: 30px; margin-left: -10px; margin-right: -10px; border-bottom: 1px solid black'>Relatório</h2> <h4 style='border-bottom: 1px solid black; padding-bottom: 25px; margin-left: -10px; margin-right: -10px;'>Prole Total = "+<?php echo pow($contgen,2); ?> + "</h4> <h4><input type='text' size='1' class='fococd' disabled/> Todos os alelos dominantes</h4> <h4> <input type='text' size='1' class='fococr' disabled/> Todos os alelos recessivos</h4> <h4><input type='text' size='1' class='fococ' disabled/> Ao menos um par de alelos heterozigoto</h4>";
					
					if(<?php if($dg>0){echo "true";}else{echo "false";}?>){
						for(var c=0;c<<?php echo $dg; ?>;c++){
							var vermelho = "rgba(222,0,0,0.9)";
							document.getElementById("gd"+c).style.color = vermelho;
						}
					}
					
					if(<?php if($rg>0){echo "true";}else{echo "false";}?>){
						for(c=0;c<<?php echo $rg; ?>;c++){
							var azul = "rgba(0,0,222,0.9)";
							document.getElementById("gr"+c).style.color = azul;
						}
					}
					
					if(<?php if($hg>0){echo "true";}else{echo "false";}?>){
						for(c=0;c<<?php echo $hg; ?>;c++){
							document.getElementById("gh"+c).style.color = "yellow";
						}
					}
					
				}
			</script>
		</body>
	</html>