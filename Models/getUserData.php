<?php
require_once ('Model.php');

class getUserData extends Model
{
    public function getData($id_user){
        $connect = $this->connect();
        $rqt = "SELECT * from users where id='$id_user'";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return($result);
    }

}