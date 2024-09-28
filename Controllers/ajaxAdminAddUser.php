<?php
require_once ('../Models/createUserModel.php');

$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$email=$_GET['email'];
$sexe=$_GET['sexe'];
$date=$_GET['date'];
$password=$_GET['password'];
$valide=$_GET['valid'];

$cum=new createUserModel();
$result=$cum->adminCreateUser($nom,$prenom,$email,$sexe,$date,$password,$valide);

echo json_encode($result);