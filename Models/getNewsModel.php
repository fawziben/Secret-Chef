<?php
require_once ('Model.php');


class getNewsModel extends Model
{
    public function getNews(){
        $connect = $this->connect();
        $rqt = "SELECT * from news";
        $result = $connect->query($rqt);

        $this->disconnect($connect);
        $i=0;
        $finalresult=[];
        foreach ($result as $res){
            $finalresult[$i]=$res;
            $i++;
        }
        return $finalresult;
    }

}