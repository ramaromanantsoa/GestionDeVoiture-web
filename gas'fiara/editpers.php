<?php 

require_once 'connector.php';

if(isset($_POST['editer'])){
	$CIN = $_POST['ciN'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$adresse = $_POST['adresse'];
	$ville = $_POST['ville'];

	$statement = $connect->prepare("UPDATE Proprio set Nom = :nom, Prenom = :prenom, Adresse = :adresse, Ville = :ville WHERE CIN = :cin");
	$statement->execute(array(':nom'=>$nom, ':prenom'=>$prenom, ':adresse'=>$adresse, ':ville'=>$ville, ':cin'=>$CIN));
	
	header('Location:index.php');

} else {

}

if(isset($_GET['CiN'])){
	$Cin = $_GET['CiN'];
	$statement = $connect->prepare("SELECT * FROM Proprio WHERE CIN = :CiN");
	$statement->execute(array(':CiN'=>$Cin));
	$row = $statement->fetch();
	$CIN = $row['CIN'];
	$nom = $row['Nom'];
	$prenom = $row['Prenom'];
	$adresse = $row['Adresse'];
	$ville = $row['Ville'];
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

<?php

if(isset($_GET['CiN'])){
	$Cin = $_GET['CiN'];

	$pers = $connect->prepare("SELECT Nom, Prenom FROM Proprio WHERE CIN=?");
	$pers->execute(array($CIN));
	echo '<div>';

	foreach($pers as $row){
		echo '<h4 class="carof"> Modifer les information concernant '.$row["Nom"].' '.$row["Prenom"].'</h4>';
	}
	echo '</div>';
}

?>

<div class="newreg">
	<form method="POST" action="" onsubmit="return Validate()" name="vform">
		<div class="enregistrement">
			<div>
				<p style="text-align:center;"><i style="font-size:70px;" class="material-icons">person</i></p>

				<div>
					<p>Nom</p>
					<input type="text" name="nom" value="<?=$nom;?>">
					<div id="nom_error"></div><br/>
				</div>

				<div>
					<p>Prénom</p>
					<input type="text" name="prenom" value="<?=$prenom;?>">
					<div id="prenom_error"></div><br/>
				</div>
					
				<div>
					<p>Adresse</p>
					<input type="text" name="adresse" value="<?=$adresse;?>">
					<div id="adresse_error"></div><br/>
				</div>

				<div>
					<p>Ville</p>
					<input type="text" name="ville" value="<?=$ville;?>">
					<div id="ville_error"></div><br/>
				</div>

			</div>
		</div>
		<div id="regbuton">
			<input type="hidden" name="ciN" value="<?=$CIN;?>">
			<input class="green btn" type="submit" name="editer" value="Valider">
		</div>
	</form>
</div>
</body>
</html>

<script src="js/script-edit.js"></script>