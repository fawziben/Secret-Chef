<?php

require_once ('../Models/modifyNewsModel.php');

$arr=[];
$id=$_GET['id'];
$v1=$_GET['v1'];
$v2=$_GET['v2'];
$v3=$_GET['v3'];
$v4=$_GET['v4'];



$mnm=new modifyNewsModel();
$result=$mnm->modifyNews($id,$v1,$v2,$v3,$v4);

echo json_encode($result);

