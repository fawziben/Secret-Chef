<?php
require_once ('Model.php');
class getIngredientsModel extends Model
{
    public function getIngredients(){
        $connect = $this->connect();
        $rqt = "SELECT * from ingredient";
        $arr=[];
        $i=0;
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        foreach ($result as $res){
            $arr[$i]=$res;
            $i++;
        }
        return($arr);

    }

}