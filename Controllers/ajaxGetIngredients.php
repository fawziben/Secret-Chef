<?php
require_once ('../Models/getIngredientsModel.php');

$gim=new getIngredientsModel();
$result= $gim->getIngredients();

echo json_encode($result);
