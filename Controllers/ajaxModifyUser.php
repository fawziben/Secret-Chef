<?php
require_once ('../Models/modifyUserModel.php');
$id=$_GET['id'];
$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$sexe=$_GET['sexe'];
$date=$_GET['date'];
$mail=$_GET['mail'];
$password=$_GET['password'];

$mum=new modifyUserModel();
$result= $mum->modifyUserData($id,$nom,$prenom,$sexe,$date,$mail,$password);

echo json_encode($result);