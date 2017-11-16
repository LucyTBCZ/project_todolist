<?php
//on recquiert le model pour appeler la fonction browse.
require __DIR__."/../model/model.php";
// on stocke le résultat de la fonction browse dans la variable element pour 
//pouvoir s'en servir dans le view browse.
$elements = browse();
//on recquiert le view browse
require __DIR__."/../view/browse.php";
