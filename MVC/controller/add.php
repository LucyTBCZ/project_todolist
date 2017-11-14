<?php

session_start();

require __DIR__."/../model/model.php";

if (isset($_POST["nom"], $_POST["descri"])){
	add();
	header('Location:accueil.php');
} 

require __DIR__."/../view/add.php";
