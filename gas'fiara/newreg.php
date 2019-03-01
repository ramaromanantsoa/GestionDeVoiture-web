<?php

require_once 'connector.php';

if( isset($_POST['nom']) ) {

	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$adresse = $_POST['adresse'];
	$ville = $_POST['ville'];
	$cin = $_POST['cin'];
	$marque = $_POST['marque'];
	$numero = $_POST['numero'];
	$connect->exec("INSERT INTO Proprio(Nom,Prenom,Adresse,Ville,CIN) VALUES ('$nom','$prenom','$adresse','$ville','$cin')");
	$connect->exec("INSERT INTO Voiture(Marque,Numero,Proprietaire) VALUES ('$marque','$numero','$cin')");

	header('Location:index.php');

} else {
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Nouvel enregistrement</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="CSS/materialize.min.css"/>
	<link rel="stylesheet" href="CSS/materialize.css"/>
	<link rel="stylesheet" href="CSS/style2.css"/>
	<link rel="stylesheet" href="CSS/style1.css"/>
	<link rel="stylesheet" href="CSS/icon.css"/>
</head>
<body>

<div class="navig">
	<nav>
    	<div class="nav-wrapper" class="card-panel teal lighten-2">
      	<a href="index.php" class="brand-logo">Gestion de Voiture</a>
      	<ul id="nav-mobile" class="right hide-on-med-and-down">
        	<li><a href="index.php">Liste des propriétaires</a></li>
        	<li><a href="voiture.php">Liste des voitures</a></li>
        	<li><a href="newreg.php">Nouvel enregistrement</a></li>
      	</ul>
    	</div>
  	</nav>
</div>

<div class="proprio">
	<h3>NOUVEL ENREGISTREMENT</h3>
</div>

<div class="newreg">
	<form method="POST" action="" onsubmit="return Validate()" name="vform">
		<div class="enregistrementp">
			<div>
				<p><i style="font-size:50px;" class="material-icons">person</i></p>

				<div>
					<p>Nom</p>
					<input type="text" name="nom" placeholder="Nom">
					<div id="nom_error"></div><br/>
				</div>

				<div>
					<p>Prénom</p>
					<input type="text" name="prenom" placeholder="Prénom">
					<div id="prenom_error"></div><br/>
				</div>
					
				<div>
					<p>Adresse</p>
					<input type="text" name="adresse" placeholder="Adresse">
					<div id="adresse_error"></div><br/>
				</div>

				<div>
					<p>Ville</p>
					<input type="text" name="ville" placeholder="Ville">
					<div id="ville_error"></div><br/>
				</div>

				<div>
					<p>CIN</p>
					<input type="text" name="cin" placeholder="CIN">
					<div id="cin_error"></div><br/>
				</div>	
			</div>
		</div>

		<div class="enregistrementp">
			<p><i style="font-size:50px;" class="material-icons">drive_eta</i></p>
			<div>
				<p>Marque</p>	
				<input type="text" name="marque" placeholder="Marque de la voiture">
				<div id="marque_error"></div><br/>
			</div>

			<div>
				<p>Numéro d'immatriculation</p>
				<input type="text" name="numero" placeholder="Imatricul de la voiture">
				<div id="numero_error"></div><br/>
			</div>
		</div>

		<div id="regbuton">
			<input class="green btn" type="submit" name="register" value="Enregistrer">
		</div>
	</form>
</div>
</body>
</html>

<script src="js/script-reg.js"></script>