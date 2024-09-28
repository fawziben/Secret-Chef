<?php
require_once ('Model.php');
require_once('../Models/getRecetteModel.php');


class saisonModel extends Model
{
    public function getRecetteSaison($saison){
        $connect = $this->connect();
        $rqt = "SELECT ingredient_recette.id_recette,GROUP_CONCAT( ingredient.saison ) as 'saison' FROM ingredient_recette JOIN ingredient ON ingredient_recette.id_ingredient = ingredient.id GROUP BY ingredient_recette.id_recette";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        $grm=new getRecetteModel();
        $i=0;
        $arr=[];
        foreach ($result as $value){
            if(preg_match("/{$saison}/i",$value['saison'])) {
                $rs=$grm->getRecetteById($value['id_recette']);
                foreach ($rs as $r) {
                    $arr[$i]=$r;
                }
                $i++;
            }
        }
        return $arr;
    }
}