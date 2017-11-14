<?php

session_start();

require __DIR__."/../model/model.php";

$elements = browse();

require __DIR__."/../view/browse.php";
