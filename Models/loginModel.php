<?php
require_once ('Model.php');

class loginModel extends Model
{
    public function login($user,$password){
        $connect = $this->connect();
        $rqt = "SELECT * from users where mail='$user' and password='$password' and valide='1'";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        if($result->rowCount()>0)
        {
            foreach ($result as $r){
                session_start();
                $_SESSION["id"] = $r['id'];
                $_SESSION["username"] =$r['mail'];
            }
            return true;
        }
        else {
            return false;}
    }
}