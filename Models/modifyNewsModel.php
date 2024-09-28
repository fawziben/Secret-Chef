<?php
require_once ('Model.php');

class modifyNewsModel extends Model
{
    public function modifyNews($id,$v1,$v2,$v3,$v4){
        $connect = $this->connect();
        $sql = "UPDATE news SET titre=?, image=?, description=? , video=? WHERE id=?";
        $stmt= $connect->prepare($sql);
        $result=$stmt->execute([$v1,$v2, $v3, $v4,$id]);
        $this->disconnect($connect);
        return($result);
    }

}