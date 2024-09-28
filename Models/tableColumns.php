<?php
require_once ('Model.php');

class tableColumns extends Model
{
    public function getRecetteColumns()
    {
        $connect = $this->connect();
        $rqt = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'recette'ORDER BY ORDINAL_POSITION";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }

}