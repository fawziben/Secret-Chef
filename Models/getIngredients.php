<?php
require_once ('Model.php');

class getIngredients extends Model
{
    public function showIngredient(){
        $connect = $this->connect();
        $rqt = "SELECT id,nom from ingredient";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }
}