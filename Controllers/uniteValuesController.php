<?php
require_once ('../Models/getUniteValues.php');

class uniteValuesController
{
    public function getUnite(){
        $unite=new getUniteValues();
        $result=$unite->unite();
        return $result;
    }

}