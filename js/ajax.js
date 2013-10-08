function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function msjConsultoria(){
	divResultado = document.getElementById('comentarios');
	id=document.comentario.identificador.value;
	nom=document.comentario.nombre.value;
	eml=document.comentario.email.value;
	msj=document.comentario.mensaje.value;
	cap=document.comentario.tmptxt.value;
	cod_cap=document.comentario.codigo_captcha.value;
	email=valEmail(eml);
	if(id=="" || nom=="" || email=="" || msj=="" || cap==""){
			return false;
		}else if(id!="" || nom!="" || email!="" || msj!="" || cod_cap==cap){
			ajax=objetoAjax();
			ajax.open("POST", "formularios/comentario-noticia.php",true);
			ajax.onreadystatechange=function() {
				if (ajax.readyState==4) {
					divResultado.innerHTML = ajax.responseText
					document.comentario.nombre.value="";
					document.comentario.email.value="";
					document.comentario.mensaje.value="";
					document.comentario.captcha.value="";
				}
			}
			ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			//enviando los valores
			ajax.send("id="+id+"&nombre="+nom+"&email="+eml+"&mensaje="+msj)
		}
	
}

function valEmail(valor){
    re=/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/
    if(!re.exec(valor))    {
        return false;
    }else{
        return true;
    }
}