<?php

// Si les input superglobal du formulaire sont remplis
if(isset($_POST["login"], $_POST["pwd"])) {
// alors on recquiert le fichier model pour appeler la fonction getFirstUser
	require __DIR__."/../model/model.php";
//on stocke le résultat de la fonction getFirstUser dans la variable user
	$user = getFirstUser();
// s'il y a des donnees dans user alors on stocke les donnees de user dans des
// variables.
	if($user) {
		$login=$user["userLogin"];
		$password=$user["userPassword"];
		$userid=$user["userId"];
		// si les donnees de la base de donnees et celles de l'input sont equivalentes alors la session démarre.
		if($login==$_POST["login"] && $password==$_POST["pwd"]){
			session_start();
			//variables globales pour garder les données d'authentification
			$_SESSION["login"]=$login;
			$_SESSION["password"]=$password;
			$_SESSION["userid"]=$userid;
			//retour vers l'accueil
			header('location:index.php');
		}
	}
}
//sinon
else {
	// affichage du formulaire
	require __DIR__."/../view/session.php";
}