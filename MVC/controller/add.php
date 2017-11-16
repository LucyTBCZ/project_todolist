<?php
//Démarre une nouvelle session ou reprend une session existante.
session_start();

//si les variables superglobales session login et password sont remplies
if (isset($_SESSION['login'], $_SESSION['password'])){
	//alors on recquiert le model
	require __DIR__."/../model/model.php";
	// et si les input des variables superglobales sont remplies
	if (isset($_POST["nom"], $_POST["descri"])){
		//alors on appelle la fonction add()
		add();
		//et on redirige l'utilisateur vers la page browse.
		header('Location:browse.php');
	} 
	//et on recquiert le view de add.
	require __DIR__."/../view/add.php";
//sinon
} else {
	//on redirige le visiteur vers la page session pour qu'il se log pour devenir utilisateur.
	header('location:session.php');
	//et on recquiert le view de session.
	require __DIR__.'/../view/session.php';

}