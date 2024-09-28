<?php
require_once ('../vues/recettesFavoris.php');
require_once ('../vues/libraries.php');

$libs=new libraries();
$libs->importLibraries();
$fav=new recettesFavoris();
$fav->showFavoris();
