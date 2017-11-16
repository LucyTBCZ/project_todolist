<?php

session_start();

require __DIR__.'/../model/model.php';

if (isset($_POST['nickname'], $_POST['password'])){
	subscribe();
	header('Location:index.php');
}
require __DIR__.'/../view/login.php';