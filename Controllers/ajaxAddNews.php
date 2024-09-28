<?php
require_once ('../Models/addNewsModel.php');

$titre=$_GET['titre'];
$description=$_GET['description'];
$image=$_GET['image'];
$video=$_GET['video'];

$anm=new addNewsModel();
$anm->addNews($titre,$description,$image,$video);
