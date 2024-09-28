<?php
require_once ('../vues/categorieAdmin.php');
require_once ('../vues/libraries.php');


class adminMainController
{
    public function afficherCategorie(){
        $libs=new libraries();
        $libs->importLibraries();
        $ca=new categorieAdmin();
        $ca->showCategories();
    }
}