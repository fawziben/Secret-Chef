<?php
require_once ('Model.php');
class getUniteValues extends Model
{
    public function unite(){
        $array=[];
        $connect = $this->connect();
        $rqt = "SELECT SUBSTRING(COLUMN_TYPE,5) as 'unite'
FROM information_schema.COLUMNS
WHERE TABLE_SCHEMA='projetweb' 
    AND TABLE_NAME='ingredient_recette'
    AND COLUMN_NAME='unite'";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        foreach ($result as $r){
            $intermediaire=trim($r['unite'],"('");
            $intermediaire=trim($intermediaire,"')");

            $array=explode("','",$intermediaire);
        }
        return $array;
    }

}