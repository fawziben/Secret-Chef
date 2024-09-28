<?php
require_once ('../Models/favorisModel.php');

$id=$_GET['id'];
$id_recette=$_GET['id_recette'];
$operation=$_GET['operation'];

$fav=new favorisModel();
$res=$fav->addremoveFavoris($id,$id_recette,$operation);

echo json_encode($res);



