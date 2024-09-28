<?php
require_once ('Model.php');

class getFavoris extends Model
{
    public function fav($id){
        $connect = $this->connect();
        $rqt = "SELECT recette.id,image,titre,description FROM favoris JOIN recette ON favoris.id_recette = recette.id WHERE id_user='$id'";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }
}