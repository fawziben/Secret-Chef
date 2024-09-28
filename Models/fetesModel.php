<?php
require_once ('Model.php');

class fetesModel extends Model
{
    public function getFetes(){
        $connect = $this->connect();
        $rqt = "SELECT * from fetes";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }

}