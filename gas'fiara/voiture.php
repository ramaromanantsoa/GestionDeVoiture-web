<!DOCTYPE html>
<html>
<head>
	<title>Liste des voitures</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="CSS/materialize.min.css"/>
	<link rel="stylesheet" href="CSS/materialize.css"/>
	<link rel="stylesheet" href="CSS/style1.css"/>
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

<div class="voitures">
	<h4>Voitures Dans la base de données </h4>
</div>

</body>
</html>


<?php

require_once 'connector.php';

$query = "SELECT * FROM Voiture";
$data = $connect->query($query);

echo '<div id="tabcar">
	<table class="striped">
		<tr>
			<th>Id</th>
			<th>Marque</th>
			<th>Immatricule</th>
			<th>CIN Proprio</th>
		</tr>';

foreach($data as $row){
	echo '<tr>
			<td>'.$row["V_id"].'</td>
			<td>'.$row["Marque"].'</td>
			<td>'.$row["Numero"].'</td>
			<td>'.$row["Proprietaire"].'</td>
		</tr>';
}

echo '</table>
	</div>';

?>