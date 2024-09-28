<?php
require_once ('../Models/getNewsModel.php');

$gnm=new getNewsModel();
$result= $gnm->getNews();

echo json_encode($result);
