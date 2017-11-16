<?php
// Démmarage de session ou reprise d'une session existante
session_start();
// Destruction de toutes les variables de la session
session_unset();
// Destruction de la session
session_destroy();
// retour à l'accueil sans connexion
header('location:index.php');