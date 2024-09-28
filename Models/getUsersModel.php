<?php
require_once ('Model.php');

class getUsersModel extends Model
{
    public function getUsers(){
        $connect = $this->connect();
        $rqt = "SELECT * from users";
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