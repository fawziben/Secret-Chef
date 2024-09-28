<?php
require_once ('../Models/getRecetteList.php');
require_once ('../Models/tableColumns.php');


class recetteListController
{
    public function getRecettelist(){
        $grl=new getRecetteList();
        $result=$grl->recettelist();
        return$result;
    }
    public function getRecetteColumns(){
        $tc=new tableColumns();
        $result=$tc->getRecetteColumns();
        return$result;
    }

}