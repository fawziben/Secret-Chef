<?php
require_once ('Model.php');
class removeNewsModel extends Model
{
    public function removeNews($id){
        $connect = $this->connect();
        $rqt = "DELETE FROM news WHERE id = '$id'";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }

}