var marque = document.forms["vform"]["marque"];
var numero =  document.forms["vform"]["numero"];

var marque_error = document.getElementById("marque_error");
var numero_error = document.getElementById("numero_error");

function Validate(){
	if (marque.value == "") {
		marque.style.border = "1px solid #ffaaaa";
		marque_error.textContent = "Champ obligatoire";
		marque.focus();
		return false;
	}

	if (numero.value == "") {
		numero.style.border = "1px solid #ffaaaa";
		numero_error.textContent = "Champ obligatoire";
		numero.focus();
		return false;
	}

}