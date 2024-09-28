<?php
require_once ('Model.php');

class ajaxNewsModel extends Model
{
    public function getNews($id){
        $connect = $this->connect();
        $rqt = "SELECT * from news where id='$id'";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }


}