<?php
require_once('../Models/filterModel.php');


$t1=$_GET['t1'];
$t2=$_GET['t2'];
$note=$_GET['note'];
$t3=$_GET['t3'];
$calories=$_GET['calories'];
$categorie=$_GET['categorie'];


$filter= new filterModel();
$result=$filter->filter($categorie,$t1,$t2,$t3,$note,$calories);


echo json_encode($result);






