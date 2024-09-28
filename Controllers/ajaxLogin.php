<?php
require_once('../Models/loginModel.php');
$user=$_POST['user'];
$password=$_POST['password'];



$log=new loginModel();
$result=$log->login($user,$password);

echo json_encode($result);