<?php
require_once ('../Models/getIngredients.php');

class getIngredientController
{
    public function getIngredients(){
        $gi=new getIngredients();
        $result=$gi->showIngredient();
        return $result;
    }

}