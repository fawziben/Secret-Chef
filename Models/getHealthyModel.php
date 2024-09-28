<?php
require_once ('Model.php');

class getHealthyModel extends Model
{
    public function getHealthy(){
        $connect = $this->connect();
        $rqt = "SELECT * from recette where healthy=1";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }

}