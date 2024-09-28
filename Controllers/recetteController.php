<?php
require_once('../Models/getRecetteModel.php');
require_once('../Models/getIngredientRecette.php');
require_once('../Models/getEtapes.php');


class recetteController
{
    public function getRecette($id){
        $gr=new getRecetteModel();
        $result=$gr->getRecetteById($id);
        return $result;
    }

    public function getIngredientsRecette($id){
        $gir= new getIngredientRecette();
        $result=$gir->getIngRec($id);
        return $result;
    }

    public function getSteps($id){
        $ge=new getEtapes();
        $result=$ge->getSteps($id);
        return $result;
    }
}