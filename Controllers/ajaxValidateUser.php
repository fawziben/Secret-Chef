<?php
require_once ('../Models/validateUserModel.php');

$id=$_GET['id'];
$vum=new validateUserModel();
$result=$vum->valider($id);

echo json_encode($result);