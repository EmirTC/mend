function limpiar(){
	document.form.reset();
	document.form.identificador.focus();
}

function validar(){
	var form = document.form;
	if (form.identificador.value == 0) {
		alert("Ingresa el ID!!");
		form.identificador.value="";
		form.identificador.focus();
		return false;
	}
	form.submit();
}

function modificar(){
	form.submit();
}

function eliminar(){
	form.submit();
}