<?php
require_once ('../Models/verifyFavoris.php');
class favorisController
{
    public function verify($id_recette,$id_user){
        $vf=new verifyFavoris();
        return($vf->verify($id_recette,$id_user));
    }

}