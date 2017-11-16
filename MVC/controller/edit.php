<?php
//Demarrage d'une session ou reprise d'une session
session_start();
// si les variables superglobales login et password sont remplies
if (isset($_SESSION['login'], $_SESSION['password'])){
	// alors on recquiert le model
	require __DIR__.'/../model/model.php';
	// et si les input superglobal sont remplis
	if (isset($_POST['nom'], $_POST['descri'])){
		//on appelle la fonction edit
		edit();
		//et on renvoie l'utilisateur à la page de la tache éditée
		header('location:read.php?id='.$_GET["id"].'');
	}
	//et on recquiert le view de edit
	require __DIR__.'/../view/edit.php';
//sinon
} else {
	//on renvoie le visiteur vers la page session pour se loguer et devenir utilisateur
	header('location:session.php');
	//on recquiert le view de session
	require __DIR__.'/../view/session.php';

}