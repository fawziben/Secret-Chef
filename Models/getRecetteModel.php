<?php

require_once ('Model.php');

class getRecetteModel extends Model
{
    public function getRecetteById($id){
        $connect = $this->connect();
        $rqt = "SELECT * from recette where id='$id'";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }
}