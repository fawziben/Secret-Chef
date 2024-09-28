<?php
require_once ('../Models/createUserModel.php');

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$date=$_POST['date'];
$sexe=$_POST['sexe'];
$mail=$_POST['email'];
$password=$_POST['password'];

$cum=new createUserModel();
$res=$cum->createUser($nom,$prenom,$mail,$sexe,$date,$password);

echo json_encode($res);

