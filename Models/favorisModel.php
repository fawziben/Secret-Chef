<?php
require_once ('Model.php');

class favorisModel extends Model
{
    public function addremoveFavoris($id,$id_recette,$operation){
        $connect = $this->connect();
        if($operation=='add'){
            $rqt = "insert into favoris (id_recette,id_user) values ('$id_recette','$id');";
        }
        else $rqt = "delete from favoris where id_user='$id' and id_recette='$id_recette';";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }

}