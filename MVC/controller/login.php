<?php
//Démarrage ou reprise d'une session
session_start();
// on requiert le model
require __DIR__.'/../model/model.php';
// si les input superglobal nickname et password sont remplis
if (isset($_POST['nickname'], $_POST['password'])){
	//on appelle la fonction subscribe
	subscribe();
	//on renvoie le visiteur vers la page session pour se loguer
	header('Location:session.php');

}
//on recquiert le view de login
require __DIR__.'/../view/login.php';