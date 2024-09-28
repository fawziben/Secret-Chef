<?php
require_once ('../Models/fetesModel.php');

class getFetesController
{
    public function getAllF(){
        $fm=new fetesModel();
        $result=$fm->getFetes();
        return$result;
    }

}