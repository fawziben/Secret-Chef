<?php
require_once ('Model.php');

class Delete extends Model
{
    public function deleteRecette($id){
        $connect = $this->connect();
        $rqt = "DELETE FROM recette WHERE id = '$id'";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
}
}