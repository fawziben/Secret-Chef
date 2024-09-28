<?php
require_once ('Model.php');

class getCategoryModel extends Model
{
    public function getCategory($category){
        $connect = $this->connect();
        $rqt = "SELECT * from recette where categorie='$category'";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }
    public function getAll(){
        $connect = $this->connect();
        $rqt = "SELECT * from recette";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }
    public function getfetes($fete){
        $connect = $this->connect();
        $rqt = "SELECT recette.id,image,titre,description FROM fetes_recettes JOIN recette ON fetes_recettes.id_recette = recette.id where fetes_recettes.id_fete='$fete'";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }





}