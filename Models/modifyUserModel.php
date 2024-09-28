<?php
require_once ('Model.php');
class modifyUserModel extends Model
{
    public function modifyUserData($id,$nom,$prenom,$sexe,$date,$mail,$password){
        $connect = $this->connect();
        $sql = "UPDATE users SET nom=?, prenom=?, mail=? , sexe=?, datenaissance=?, password=? WHERE id=?";
        $stmt= $connect->prepare($sql);
        $result=$stmt->execute([$nom,$prenom, $mail, $sexe, $date, $password, $id]);
        $this->disconnect($connect);
        return($result);
    }

}