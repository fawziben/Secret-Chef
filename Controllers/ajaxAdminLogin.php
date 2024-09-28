<?php
require_once('../Models/adminLoginModel.php');
$user=$_POST['user'];
$password=$_POST['password'];



$log=new adminLoginModel();
$result=$log->login($user,$password);

echo json_encode($result);