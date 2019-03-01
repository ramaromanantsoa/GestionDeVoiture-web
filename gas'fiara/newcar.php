<?php 

require_once 'connector.php';

if(isset($_POST['registercar'])){
	$CIN = $_POST['ciN'];
	$marque = $_POST['marque'];
	$numero = $_POST['numero'];
	$connect->exec("INSERT INTO Voiture(Marque,Numero,Proprietaire) VALUES ('$marque','$numero','$CIN')");

	header('Location:voiture.php');

} else {

}

$CIN = '';

if(isset($_GET['CiN'])){
	$Cin = $_GET['CiN'];
	$statement = $connect->prepare("SELECT * FROM Proprio WHERE CIN = :CiN");
	$statement->execute(array(':CiN'=>$Cin));
	$row = $statement->fetch();
	$CIN = $row['CIN'];

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ajout voiture</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="CSS/materialize.min.css"/>
	<link rel="stylesheet" href="CSS/materialize.css"/>
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
		echo '<h4 class="carof"> Ajouter une voiture pour '.$row["Nom"].' '.$row["Prenom"].'</h4>';
	}
	echo '</div>';
}

?>

<div class="newcar">
	<form method="POST" action="" onsubmit="return Validate()" name="vform">

		<div>
		<p style="text-align:center;"><i style="font-size:50px;" class="material-icons">drive_eta</i></p>
			<div style="padding-right:5%; padding-left:5%;">
				<p>Marque</p>
				<input type="text" name="marque" placeholder="Marque de la voiture">
				<div id="marque_error"</div><br/>
			</div>
			<div style="padding-right:5%; padding-left:5%;">
				<p>Numéro d'Immatriculation</p>
				<input type="text" name="numero" placeholder="Imatricule de la voiture">
				<div id="numero_error"></div><br/>
			<div>
		</div>

		<div style="text-align:center; padding-top:7%; padding-bottom:5%;">
			<input type="hidden" name="ciN" value="<?=$CIN;?>">
			<input class="green btn" type="submit" name="registercar" value="Ajouter">
		</div>
	</form>
</div>
</body>
</html>

<script src="js/script-car.js"></script>