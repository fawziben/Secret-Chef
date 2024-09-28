<?php
require_once ('Model.php');

class addNewsModel
{
    public function addNews($titre,$description,$image,$video,){
        $connect = $this->connect();
        $rqt = "insert into users (titre,description,image,video,) values ('$titre','$description','$image','$video');";
        $connect->query($rqt);
        $result=$connect->lastInsertId();
        $this->disconnect($connect);
        return $result;
    }

}