<?php
require_once ('Model.php');

class removeUserModel extends Model
{
    public function removeUser($id){
        $connect = $this->connect();
        $rqt = "DELETE FROM users WHERE id = '$id'";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }

}