<?php
require_once ('Model.php');

class validateUserModel extends Model
{
    public function valider($id){
        $connect = $this->connect();
        $rqt = "UPDATE users SET  valide='1' where id='$id';";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }


}