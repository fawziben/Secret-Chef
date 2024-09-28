<?php
require_once ('../Models/removeUserModel.php');

$id=$_GET['id'];
$rum=new removeUserModel();
$result= $rum->removeUser($id);

echo json_encode($result);
