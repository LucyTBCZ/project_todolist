<?php

session_start();

require __DIR__."/../model/model.php";

if (isset($_POST['delete'])){
	delete();
	header('Location:accueil.php');
}

require __DIR__."/../view/delete.php";