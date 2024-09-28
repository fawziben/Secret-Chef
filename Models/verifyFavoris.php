<?php
require_once ('Model.php');

class verifyFavoris extends Model
{
    public function verify($id_recette,$id_user){
        $connect = $this->connect();
        $rqt = "SELECT * from favoris where id_user='$id_user' and id_recette='$id_recette'";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        if($result->rowCount()>0) return true;
        else return false;
    }
}