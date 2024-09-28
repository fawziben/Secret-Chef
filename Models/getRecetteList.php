<?php
require_once ('Model.php');

class getRecetteList extends Model
{
    public function recettelist()
    {
        $connect = $this->connect();
        $rqt = "SELECT * FROM recette";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }

}