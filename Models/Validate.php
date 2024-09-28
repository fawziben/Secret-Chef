<?php
require_once ('Model.php');

class Validate extends Model
{
    public function valider($id){
            $connect = $this->connect();
            $rqt = "UPDATE recette SET  valide='1' where id='$id';";
            $result = $connect->query($rqt);
            $this->disconnect($connect);
            return $result;
    }

}