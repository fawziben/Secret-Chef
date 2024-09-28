<?php
require_once ('Model.php');

class modifierRecette extends Model
{
    public function modifySteps($id,$arr){
        $connect = $this->connect();
        $rqt1 = "DELETE FROM etapes WHERE id_recette='$id';";
        $result = $connect->query($rqt1);
        for ($i=0;$i<count($arr);$i++){
            $j=$i+1;
            $rqt2 = "INSERT INTO etapes (id_recette, numero_etape, description) VALUES ('$id','$j','$arr[$i]');";
            $connect->query($rqt2);
        }
        $this->disconnect($connect);
        return($result);

    }
    public function modifyHeader($id,$arr){
        $heal=1;
        if($arr[6]=='non') $heal=0;
        $connect = $this->connect();
        $rqt1 = "UPDATE recette SET titre=?, t_prepa=?, t_cuisson=? , t_repos=?, t_total=?, nbr_calories=?,healthy=?, notation=?, description=? WHERE id=?";
        $stmt= $connect->prepare($rqt1);
        $result=$stmt->execute([$arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$heal,$arr[7],$arr[8], $id]);
        $this->disconnect($connect);
        return($result);

    }

}