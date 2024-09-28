<?php
require_once ('../Models/getUserData.php');
class profilController
{
    public function getData($id_user){
        $gud=new getUserData();
        $result=$gud->getData($id_user);
        return($result);
    }
}