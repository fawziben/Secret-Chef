<?php
require_once('../Models/ajaxNewsModel.php');

$id = $_GET["id"];
$news=new ajaxNewsModel();
$result=$news->getNews($id);
foreach ($result as $value)
{
    $emparray[0] = $value['titre'];
    $emparray[1] = $value['description'];
    $emparray[2] = $value['image'];
    $emparray[3] = $value['video'];

}

echo json_encode($emparray);
