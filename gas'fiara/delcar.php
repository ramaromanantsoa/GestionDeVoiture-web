<?php

	require_once 'connector.php';

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		try{
			$statement = $connect->prepare("DELETE FROM Voiture WHERE V_id=?");
			$statement->execute(array($id));
			header('Location:voiture.php');
		}catch(PDOException $msg){
			echo $msg->getMessage();
		}
	}

?>