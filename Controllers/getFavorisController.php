<?php
require_once ('../Models/getFavoris.php');

class getFavorisController
{
    public function getFav($id){
        $gf=new getFavoris();
        $result=$gf->fav($id);
        return ($result);
    }

}