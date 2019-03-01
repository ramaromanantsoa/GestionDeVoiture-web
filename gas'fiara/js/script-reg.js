var nom = document.forms["vform"]["nom"];
var prenom = document.forms["vform"]["prenom"];
var adresse = document.forms["vform"]["adresse"];
var ville = document.forms["vform"]["ville"];
var cin =  document.forms["vform"]["cin"];
var marque = document.forms["vform"]["marque"];
var numero =  document.forms["vform"]["numero"];

var nom_error = document.getElementById("nom_error");
var prenom_error = document.getElementById("prenom_error");
var adresse_error = document.getElementById("adresse_error");
var ville_error = document.getElementById("ville_error");
var cin_error = document.getElementById("cin_error");
var marque_error = document.getElementById("marque_error");
var numero_error = document.getElementById("numero_error");

function Validate(){

	if (nom.value == "") {
		nom.style.border = "1px solid #ffaaaa";
		nom_error.textContent = "Champ obligatoire";
		nom.focus();
		return false;
	}

	if (prenom.value == "") {
		prenom.style.border = "1px solid #ffaaaa";
		prenom_error.textContent = "Champ obligatoire";
		prenom.focus();
		return false;
	}

	if (adresse.value == "") {
		adresse.style.border = "1px solid #ffaaaa";
		adresse_error.textContent = "Champ obligatoire";
		adresse.focus();
		return false;
	}

	if (ville.value == "") {
		ville.style.border = "1px solid #ffaaaa";
		ville_error.textContent = "Champ obligatoire";
		ville.focus();
		return false;
	}

	if (cin.value == "") {
		cin.style.border = "1px solid #ffaaaa";
		cin_error.textContent = "Champ obligatoire";
		cin.focus();
		return false;
	}

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