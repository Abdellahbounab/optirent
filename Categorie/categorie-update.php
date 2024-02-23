<?php
	extract($_POST);
	$r = "update categorie
	set idc = '".$idc."',
	titrec = '".$titrec."'
	where idc = '".$id."'";
	require("../connexion.php");
	mysqli_query($con, $r);
	require("../fonctions.php");
	redirection("categorie-list.php");
?>