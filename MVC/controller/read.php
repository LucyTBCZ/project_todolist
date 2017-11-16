<?php
//on recquiert le model pour appeler la fonction read
require __DIR__.'/../model/model.php';
//on stocke le résultat de la fonction read dans la variable élément
$element=read();
//on recquiert le view de read
require __DIR__.'/../view/read.php';