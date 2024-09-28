<?php
require_once ('../vues/profile.php');
require_once ('../vues/libraries.php');

$libs=new libraries();
$libs->importLibraries();
$profil=new profile();
$profil->showProfile();
