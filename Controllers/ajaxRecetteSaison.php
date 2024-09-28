<?php
require_once('../Models/saisonModel.php');


$saison=$_GET['x'];
$sm=new saisonModel();
$result=$sm->getRecetteSaison($saison);

echo json_encode($result);

