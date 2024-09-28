<?php
require_once ('Model.php');


class ideeDeRecette extends Model
{
    public function searchRecipee(){
        $connect = $this->connect();
        $rqt = "SELECT ingredient_recette.id_recette,GROUP_CONCAT( ingredient.nom ) as 'noms' FROM ingredient_recette JOIN ingredient ON ingredient_recette.id_ingredient = ingredient.id GROUP BY ingredient_recette.id_recette";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }
}