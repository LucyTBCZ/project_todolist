<?php
session_start();

if (isset($_SESSION['login'], $_SESSION['password'])){

	require __DIR__.'/../model/model.php';

	if (isset($_POST['nom'], $_POST['descri'])){
		edit();
		header('location:read.php?id='.$_GET["id"].'');
	}

	require __DIR__.'/../view/edit.php';

} else {

	header('location:session.php');
	require __DIR__.'/../view/session.php';

}