<?php
require_once ('Model.php');

class adminLoginModel extends Model
{
    public function login($user,$password){
        $connect = $this->connect();
        $rqt = "SELECT * from admins where username='$user' and password='$password'";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        if($result->rowCount()>0)
        {
            foreach ($result as $r){
                session_start();
                $_SESSION["id"] = $r['id'];
                $_SESSION["username"] =$r['email'];
            }
            return true;
        }
        else {
            return false;}
    }
}