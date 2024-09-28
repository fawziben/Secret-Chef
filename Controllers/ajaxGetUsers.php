<?php
require_once ('../Models/getUsersModel.php');

$gum= new getUsersModel();
$result=$gum->getUsers();

echo json_encode($result);
