<?php

session_start();

if (isset($_SESSION['login'], $_SESSION['password'])){

	require __DIR__."/../model/model.php";

	if (isset($_POST['delete'])){
		delete();
		header('Location:index.php');
	}

	require __DIR__."/../view/delete.php";

} else {

	header('location:session.php');
	require __DIR__.'/../view/session.php';

}