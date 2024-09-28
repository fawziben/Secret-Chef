<?php
require_once ('Model.php');

class getIngredientRecette extends Model
{
    public function getIngRec($id){
        $connect = $this->connect();
        $rqt = "SELECT ingredient_recette.qte_ingredient,ingredient.nom,ingredient_recette.unite FROM ingredient_recette JOIN ingredient ON ingredient_recette.id_ingredient = ingredient.id WHERE id_recette='$id'";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }
}