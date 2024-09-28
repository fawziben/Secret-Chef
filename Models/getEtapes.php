<?php
require_once ('Model.php');

class getEtapes extends Model
{
    public function getSteps($id)
    {
        $connect = $this->connect();
        $rqt = "SELECT * FROM etapes WHERE id_recette='$id' order by numero_etape asc ";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }

}