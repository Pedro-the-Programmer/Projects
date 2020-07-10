var ponteiro = 0;
var aulas = ["a0","a1","a2","a3","a4","a5","a6","a7","a8","a9","a10","a11","a12","a13","a14"];
var videos = ["https://www.youtube.com/embed/8mei6uVttho","https://www.youtube.com/embed/M2Af7gkbbro","https://www.youtube.com/embed/RDrfZ-7WE8c","https://www.youtube.com/embed/Ig4QZNpVZYs","https://www.youtube.com/embed/GrPkuk1ezyo","https://www.youtube.com/embed/v2nCgGSVCeE","https://www.youtube.com/embed/_g05aHdBAEY","https://www.youtube.com/embed/7gGFHzqh4d8","https://www.youtube.com/embed/U5PnCt58Q68","https://www.youtube.com/embed/fP49L1i_-HU","https://www.youtube.com/embed/WJQz20i7CyI","https://www.youtube.com/embed/KoNehy7rn8U","https://www.youtube.com/embed/-nNx7e8GzHQ","https://www.youtube.com/embed/j9473xQ39vY","https://www.youtube.com/embed/hkE9WrjpAAk"];

function abrirpag(pag){
	window.open(pag);
}

function redirec(pag) {
	window.location.href = pag;
}

function altImg(idImg, nomeImg) {
	document.getElementById(idImg).src =  "_imagens/" + nomeImg + ".jpg";
}

function verificaPont(){
	if(ponteiro==0){
		document.getElementById("anterior").style.visibility = "hidden";
	}else{
		document.getElementById("anterior").style.visibility = "visible";
	}
	if(ponteiro==14){
		document.getElementById("proximo").style.visibility = "hidden";
	}else{
		document.getElementById("proximo").style.visibility = "visible";
	}
}

function acessaVideos(op){
	document.getElementById("anterior").style.visibility = "hidden";
	document.getElementById("proximo").style.visibility = "hidden";
	if(ponteiro>=0 && ponteiro<15){
		if(op=="ant"){
			ponteiro--;
			if(ponteiro<0){
				ponteiro = 0;
			}
		}else if (op=="pro"){
			ponteiro++;
			if(ponteiro>14){
				ponteiro = 14;
			}
		}
		document.getElementById("player").src = videos[ponteiro];
		document.getElementById(aulas[ponteiro]).scrollIntoView(false);
		listaVideo(ponteiro);
	}
	
}

function listaVideo(indice){
	ponteiro = indice;
	for(var i = 0; i<=14; i++){
		if(i==indice){
			document.getElementById(aulas[indice]).style.color = "#ffffff";
			document.getElementById(aulas[indice]).style.backgroundColor = "rgb(0,160,0)";
		}else{
			document.getElementById(aulas[i]).style.color = "#000000";
			document.getElementById(aulas[i]).style.backgroundColor = "rgb(0,130,0)";
		} 
	}
	document.getElementById("player").src = videos[indice];
}

function tocaSom(){
	s = document.getElementById("som");
	s.pause();
	s.currentTime = 0;
	s.play();
}

function soma() {
	var num1 = parseInt(document.getElementById("n1").value);
	var num2 = parseInt(document.getElementById("n2").value);
	var soma = num1 + num2;
	tocaSom();
	document.getElementById("result").innerHTML = "Soma = " + soma;
}

function sub() {
	var num1 = parseInt(document.getElementById("n1").value);
	var num2 = parseInt(document.getElementById("n2").value);
	var subt = num1 - num2;
	tocaSom();
	document.getElementById("result").innerHTML = "Resto = " + subt;
}

function mult(){
	var a = parseInt(document.getElementById("n1").value);
	var b = parseInt(document.getElementById("n2").value);
	tocaSom();
	document.getElementById("result").innerHTML = "Produto = " + a*b;
}

function divi() {
	var a = parseFloat(document.getElementById("n1").value);
	var b = parseFloat(document.getElementById("n2").value);
	var di = a / b;
	tocaSom();
	if(a%b!=0){
		document.getElementById("result").innerHTML = "Quociente &cong; " + di.toFixed(2); 
	}else{
		document.getElementById("result").innerHTML = "Quociente &equals; " + di.toFixed(0);
	}
}

function geraPA(){
	var pa = "PA(";
	var prit = parseInt(document.getElementById("ptermo").value);
	var raz = parseInt(document.getElementById("razao").value);
	var nt = parseInt(document.getElementById("ntermos").value);
	var termo;
	for(var i=0; i<nt; i++){
		termo = prit+(raz*i);
		if(i<nt-1){
			pa += termo + ", ";
		}else{
			pa += termo;
		}
	}
	pa += ")";
	tocaSom();
	document.getElementById("result").innerHTML = pa;
}

function geraPG(){
	var pg = "PG(";
	var prit = parseInt(document.getElementById("ptermo").value);
	var q = parseInt(document.getElementById("razao").value);
	var nt = parseInt(document.getElementById("ntermos").value);
	var termo;
	if(nt>1){
	   pg = pg + prit + ', ';
	}
	for(var i=1; i<nt; i++){	
		termo = prit*Math.pow(q,i);
		if(i<nt-1){
			pg += termo + ", ";
		}else{
			pg += termo;
		}
	}
	pg += ")";
	tocaSom();
	document.getElementById("result").innerHTML = pg;
}
