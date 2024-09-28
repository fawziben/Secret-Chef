<?php
require_once ('../Models/modifierRecette.php');

$arr=[];
$id=$_GET['id'];
$arr=$_GET['data'];
$mr=new modifierRecette();
$result=$mr->modifyHeader($id,$arr);

echo json_encode($result);

