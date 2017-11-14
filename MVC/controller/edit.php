<?php

session_start();

require __DIR__.'/../model/model.php';

if (isset($_POST['nom'], $_POST['descri'])){
	edit();
	header('location:accueil.php');
}

require __DIR__.'/../view/edit.php';