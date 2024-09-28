<?php

require_once('../vues/modifyRecette.php');
require_once('../vues/libraries.php');




$id = $_GET['id'];
$lib=new libraries();
$lib->importLibraries();
$recette = new modifyRecette();
$recette->afficher($id);