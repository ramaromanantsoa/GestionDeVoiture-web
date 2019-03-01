var nom = document.forms["vform"]["nom"];
var prenom = document.forms["vform"]["prenom"];
var adresse = document.forms["vform"]["adresse"];
var ville = document.forms["vform"]["ville"];

var nom_error = document.getElementById("nom_error");
var prenom_error = document.getElementById("prenom_error");
var adresse_error = document.getElementById("adresse_error");
var ville_error = document.getElementById("ville_error");

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

}