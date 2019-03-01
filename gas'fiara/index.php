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
	<h3>PROPRIÉTAIRES</h3>
</div>

</body>
</html>


<?php

require_once 'connector.php';

$query = "SELECT * FROM Proprio";

$data = $connect->query($query);

echo '<form action="newcar.php">
	<div id="tab">
	<table class="striped">
		<tr>
			<th>Id</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Adresse</th>
			<th>Ville</th>
			<th>CIN</th>
			<th>Actions</th>
		</tr>';

foreach($data as $row){
	echo '<tr>
			<td>'.$row["Pr_id"].'</td>
			<td>'.$row["Nom"].'</td>
			<td>'.$row["Prenom"].'</td>
			<td>'.$row["Adresse"].'</td>
			<td>'.$row["Ville"].'</td>
			<td>'.$row["CIN"].'</td>
			<td>
				<a class="light-blue darken-2 btn-small" href="carof.php?CiN='.$row["CIN"].'"><i class="material-icons">visibility</i><i class="material-icons">drive_eta</i></a> 
				<a class="green btn-small" href="newcar.php?CiN='.$row["CIN"].'"><i class="material-icons">add</i><i class="material-icons">drive_eta</i></a> 
				<a  class="green accent-2 btn-small" href="editpers.php?CiN='.$row["CIN"].'"><i class="material-icons">edit</i><i class="material-icons">account_circle</i></a>
				<a  class="red accent-4 btn-small" href="delpers.php?CiN='.$row["CIN"].'"><i class="material-icons">delete_forever</i><i class="material-icons">account_circle</i></a> 

			</td>
		</tr>';
}

echo '</table>
	</div>
	</form>';

?>