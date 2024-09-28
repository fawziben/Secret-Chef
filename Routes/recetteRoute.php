<?php
require_once('../vues/recette.php');


$id=$_GET['id'];
$recette = new recette();
$recette->showRecette($id);
