<?php
require_once ('Model.php');


class filterModel extends Model
{
    public function filter($categorie,$t1,$t2,$t3,$note,$calories){
        $connect = $this->connect();

        $rqt ="SELECT * from recette where categorie='$categorie'";

        if(!empty($t1)){
            $rqt .= " and t_prepa= '$t1'";
        }
        if(!empty($t2)){
            $rqt .= " and t_cuisson= '$t2'";
        }
        if(!empty($t3)){
            $rqt .= " and t_total= '$t3'";
        }
        if(!empty($note)){
            $rqt .= " and notation= '$note'";
        }
        if(!empty($calories)){
            $rqt .= " and nbr_calories= '$calories'";
        }

        $result = $connect->query($rqt);
        $this->disconnect($connect);
        $j=0;
        $parser=[];

        foreach ($result as $value){
            $parser[$j]=$value;
            $j++;
        }
        return $parser;
    }
}