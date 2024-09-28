<?php
require_once ('../vues/modifyProfile.php');
require_once ('../vues/libraries.php');

$values=$_GET['values'];
$lib=new libraries();
$lib->importLibraries();
$mp=new modifyProfile();
$mp->modifierProfil($values[0],$values[1]);