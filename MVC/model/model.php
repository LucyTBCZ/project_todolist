<?php

/**
* 
*@param : 
*@return:
*/


// fonction pour se connecter à la base de données.
function getDatabaseConnection() {
	// de base la variable connexion_database vaut null
	$connexion_database = null;
	// récupération des données sensibles
	require __DIR__."/../config.php";
	//j'essaie de me connecter à la base de données.
	try{
	//PDO: Connexion entre le php et la base de données
	$connexion_database = new PDO("mysql:host=$host;dbname=$dbn", 
		$db_login, $db_pwd);

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
	/*j'appelle la fonction getDatabaseConnection pour me connecter à la base
	de données avant de préparer une requête (selection de la table t_users
	 si les champs userLogin et userPassword sont égaux aux variables login
	et password) à l'execution.*/
	$co_db_statement=getDatabaseConnection()->prepare("SELECT * FROM t_users 
		WHERE userLogin= :login AND userPassword= :password");
	/*execution de la requête de selection sachant que les variables login et 
	password sont égales aux input login et password.*/
	$co_db_statement->execute([':login' => $_POST['login'], ':password' 
		=> $_POST['pwd']]);
	//récupération du résultat de l'execution de la requete SELECT
	$user=$co_db_statement->fetch();
	//retourne le résultat du fetch
	return $user;

}
//fonction pour inscrire dans la base de données un nouvel utilisateur
function subscribe(){
	/*j'appelle la fonction getDatabaseConnection pour me connecter à la base 
	de données avant de préparer une requête (insertion dans la table t_users
	les valeurs inconnues de userLogin et userPassword) à l'éxécution.*/
	$co_db_statement=getDatabaseConnection()->prepare("INSERT INTO t_users 
		(userLogin, userPassword) VALUES (?,?)");
	/*execution de la requete d'insertion sachant que les valeurs inconnues 
	sont égales aux input nickname et password protégé par un convertisseur 
	de caractères spéciaux en entité html*/
	$co_db_statement->execute([htmlspecialchars($_POST["nickname"]),
		htmlspecialchars($_POST["password"])]);

}
// fonction pour afficher la liste de tâche
function browse(){
	/*j'appelle la fonction getDatabaseConnection pour me connecter à la base 
	de données avant de préparer une requête (selection de tous les éléments 
	de la table t_elements) à l'execution.*/
	$co_db_statement=getDatabaseConnection()->prepare("SELECT * FROM 
		t_elements");
	//execution de la requete de selection
	$co_db_statement->execute();
	/*récupération du résultat de l'execution stocké dans un tableau contenant
	tous les éléments de de la requete*/ 
	$data=$co_db_statement->fetchAll();
	// retourne le resultat du fetchAll
	return $data;

}
// fonction pour ajouter des tâches à une liste
function add(){
	/*j'appelle la fonction getDatabaseConnection pour me connecter à la base
	de données avant de préparer une requête (insertion dans la table 
	t_elements les valeurs inconnues des éléments elementName, 
	elementDescription et elementUserID )*/
	$co_db_statement=getDatabaseConnection()->prepare("INSERT INTO t_elements
	 (elementName, elementDescription, elementUserID) VALUES (?,?,?)");
	/*execution de la requete d'insertion sachant que les valeurs inconnues 
	sont les input nom et descri protégés par un convertisseur de caractères
	spéciaux en entité html et la superglobale userid */
	$co_db_statement->execute([htmlspecialchars($_POST["nom"]),
		htmlspecialchars($_POST["descri"]),$_SESSION["userid"]]);

}
// fonction pour afficher la description d'une tache
function read(){
	/*j'appelle la fonction getDatabaseConnection pour me connecter à la base
	de données avant de préparer une requête (selection de tous les elements de
	la table t_elements de la tache X)*/
	$co_db_statement=getDatabaseConnection()->prepare("SELECT * FROM t_elements
	 WHERE elementId=?");
	/*execution de la requete en donnant à la requete le parametre URL de l'
	elementid*/
	$co_db_statement->execute([$_GET["id"]]);
	//récupération du résultat de l'execution 
	$data=$co_db_statement->fetch();
	//retourne le resultat du fetch
	return $data;

}
// fonction pour éditer une tache

function edit(){
	/*j'appelle la fonction getDatabaseConnection pour me connecter à la base de
	données avant de préparer une requete (modification dans la table t_elements
	des éléments elementName, elementDescription de la tache X. )*/
	$co_db_statement=getDatabaseConnection()->prepare("UPDATE t_elements SET 
		elementName=?, elementDescription=? WHERE elementId=?");
	/*execution de la requete en donnant à la requete les valeurs d'input nom et 
	descri ainsi que du parametre URL de id*/
	$co_db_statement->execute([$_POST["nom"], $_POST["descri"], $_GET["id"]]);

}
// fonction pour effacer une tache
function delete(){
	/*j'appelle la fonction getDatabaseConnection pour me connecter à la base de
	données avant de préparer une requete (supprimer de la table t_elements si 
	elementId est égal à la variable id)*/
	$co_db_statement=getDatabaseConnection()->prepare("DELETE FROM t_elements 
		WHERE elementId=:id");
	/*execution de la requete sachant que la variable id est égale au parametre 
	URL id*/
	$co_db_statement->execute([':id' => $_GET["id"]]);

}