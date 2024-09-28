<?php
require_once ('../vues/modifyNews.php');
require_once ('../vues/libraries.php');



$id=$_GET['id'];
$libs=new libraries();
$libs->importLibraries();
$mn=new modifyNews();
$mn->modify($id);