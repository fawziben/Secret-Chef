<?php
require_once ('Model.php');

class createUserModel extends Model
{
    public function createUser($nom,$prenom,$mail,$sexe,$datenaissance,$password){
        $connect = $this->connect();
        $rqt = "insert into users (nom,prenom,mail,sexe,datenaissance,password,valide) values ('$nom','$prenom','$mail','$sexe','$datenaissance','$password',0);";
        $result = $connect->query($rqt);
        $this->disconnect($connect);
        return $result;
    }
    public function adminCreateUser($nom,$prenom,$mail,$sexe,$datenaissance,$password,$valid){
        $connect = $this->connect();
        $rqt = "insert into users (nom,prenom,mail,sexe,datenaissance,password,valide) values ('$nom','$prenom','$mail','$sexe','$datenaissance','$password','$valid');";
        $connect->query($rqt);
        $result=$connect->lastInsertId();
        $this->disconnect($connect);
        return $result;
    }
}