<?php
require_once ('../vues/signIn.php');
require_once ('../vues/libraries.php');

$lib= new libraries();
$lib->importLibraries();
$si=new signIn();
$si->showSignIn();

