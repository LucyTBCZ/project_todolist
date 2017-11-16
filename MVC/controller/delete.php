<?php
//Démarrage ou reprise d'une session
session_start();
// si les variables superglobales login et password sont remplies
if (isset($_SESSION['login'], $_SESSION['password'])){
	//alors on recquiert le model
	require __DIR__."/../model/model.php";
	// si l'input superglobal est remplie
	if (isset($_POST['delete'])){
		//on appelle la fonction delete
		delete();
		//et on renvoie l'utilisateur à la page browse
		header('Location:browse.php');
	}
	//et on recquiert le view delete
	require __DIR__."/../view/delete.php";
//sinon
} else {
	//on envoie le visiteur se loguer pour qu'il devienne utilisateur
	header('location:session.php');
	//on recquiert le view session
	require __DIR__.'/../view/session.php';

}