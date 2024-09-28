<?php

require_once('../vues/pageCategorie.php');
require_once('../vues/header.php');

require_once('../vues/libraries.php');



$cat=$_GET['cat'];
$import=new libraries();
$import->importLibraries();
$head=new header();
$head->showHeader();
$myPage=new pageCategorie();
$myPage->showPage($cat);
