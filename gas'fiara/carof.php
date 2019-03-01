<!DOCTYPE html>

<html>
<head>
	<title>Gas'Fiara</title>
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

<div class="proprio">
</div>

</body>
</html>

<?php

	require_once 'connector.php';

	if(isset($_GET['CiN'])){
		$CIN = $_GET['CiN'];
		try{

			$pers = $connect->prepare("SELECT Nom, Prenom FROM Proprio WHERE CIN=?");
			$pers->execute(array($CIN));
			echo '<div>';

			foreach($pers as $row){
				echo '<h4 class="carof"> Voiture(s) de : '.$row["Nom"].' '.$row["Prenom"].'</h4>';
			}
			echo '</div>';

			$statement = $connect->prepare("SELECT * FROM Voiture WHERE Proprietaire=?");
			$statement->execute(array($CIN));
			

			echo '<div id="tab">
				<table class="striped">
					<tr>
						<th>Id_Voiture</th>
						<th>Marque</th>
						<th>Immatricule</th>
						<th>Action</th>
					</tr>';

			foreach($statement as $rows){
				echo '<tr>
						<td>'.$rows["V_id"].'</td>
						<td>'.$rows["Marque"].'</td>
						<td>'.$rows["Numero"].'</td>
						<td><a class="red accent-4 btn-small" href="delcar.php?id='.$rows["V_id"].'"><i class="material-icons">delete_forever</i><i class="material-icons">drive_eta</i></a></td>
					</tr>';
			}

			echo '</table>
				</div>';

		}catch(PDOException $msg){
			echo $msg->getMessage();
		}
	}

?>
