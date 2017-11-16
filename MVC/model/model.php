<?php
// fonction pour se connecter à la base de données.
function getDatabaseConnection() {
	// de base la variable connexion_database vaut null
	$connexion_database = null;
	// récupération des données sensibles
	require __DIR__."/../config.php";
	//j'essaie de me connecter à la base de données.
	try{

	$connexion_database = new PDO("mysql:host=$host;dbname=$dbn", $db_login, $db_pwd);

	}
	// sinon j'affiche Connexion failed et le message d'erreur.
	catch (PDOException $e) {
	    echo "Connection failed : " . $e->getMessage();
	}
	// je retourne l'instance de l'objet PDO ou null 
	return $connexion_database;
}
// fonction pour loguer un utilisateur
function getFirstUser(){
	$co_db_statement=getDatabaseConnection()->prepare("SELECT * FROM t_users WHERE userLogin= :login AND userPassword= :password");
	$user=$co_db_statement->execute([':login' => $_POST['login'], ':password' => $_POST['pwd']]);
	$user=$co_db_statement->fetch();

	return $user;
}

function subscribe(){
	$co_db_statement=getDatabaseConnection()->prepare("INSERT INTO t_users (userLogin, userPassword) VALUES (?,?)");
	$co_db_statement->execute(array(htmlspecialchars($_POST["nickname"]),htmlspecialchars($_POST["password"])));
}
// fonction pour afficher la liste de tâche
function browse(){
	$co_db_statement=getDatabaseConnection()->prepare("SELECT * FROM t_elements");
	$data=$co_db_statement->execute();
	$data=$co_db_statement->fetchAll();
	return $data;
}

function add(){

	$co_db_statement=getDatabaseConnection()->prepare("INSERT INTO t_elements (elementName, elementDescription, elementUserID) VALUES (?,?,?)");
	$co_db_statement->execute(array(htmlspecialchars($_POST["nom"]),htmlspecialchars($_POST["descri"]),$_SESSION["userid"]));
}

function read(){
	$co_db_statement=getDatabaseConnection()->prepare("SELECT * FROM t_elements WHERE elementId=?");
	$data=$co_db_statement->execute(array($_GET["id"]));
	$data=$co_db_statement->fetch();
	return $data;
}

function edit(){
		$co_db_statement=getDatabaseConnection()->prepare("UPDATE t_elements SET elementName=?, elementDescription=? WHERE elementId=?");
		$co_db_statement->execute(array($_POST["nom"], $_POST["descri"], $_GET["id"]));
}

function delete(){
	$co_db_statement=getDatabaseConnection()->
	prepare("DELETE FROM t_elements WHERE elementId=:id");
	$co_db_statement->execute([':id' => $_GET["id"]]);
}