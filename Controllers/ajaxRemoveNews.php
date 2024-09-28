<?php
require_once ('../Models/removeNewsModel.php');
$id=$_GET['id'];
$rnm=new removeNewsModel();
$result=$rnm->removeNews($id);

echo json_encode($result);