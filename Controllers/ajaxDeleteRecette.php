<?php
require_once ('../Models/Delete.php');

$id=$_GET['id'];
$del=new Delete();
$res=$del->deleteRecette($id);

json_encode($res);