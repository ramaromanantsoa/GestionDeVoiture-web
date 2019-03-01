<?php

	require_once 'connector.php';

	if(isset($_GET['CiN'])){
		$cin = $_GET['CiN'];
		try{

			$pers = $connect->prepare("SELECT * FROM Voiture WHERE Proprietaire=?");
			$pers->execute(array($cin));

			foreach($pers as $row){
				$condition = $row["Marque"];
			}

			if ($condition != '') {
				echo '<h3>Cette personne ne peut pas être supprimée car elle possède encore une voiture, veuillez cliquer <a href="index.php">ici</a> pour revenir à la page d acceuil</h3>';
			}else{
				$statement = $connect->prepare("DELETE FROM Proprio WHERE CIN=?");
				$statement->execute(array($cin));
				header('Location:index.php');
			}

		}catch(PDOException $msg){
			echo $msg->getMessage();
		}
	}

?>