<?php

require_once('../Models/getCategoryModel.php');
require_once ('../vues/ideeDeRecette.php');
require_once ('../vues/libraries.php');
require_once ('../vues/header.php');
require_once ('../vues/navbar.php');





class ideeDeRecetteController
{
    public function showIdeeForm(){
        $libraries=new libraries();
        $libraries->importLibraries();
        $header= new header();
        $header->showHeader();
        ?>
        <br>
        <?php
        $navbar=new navbar();
        $navbar->showNavBar();
        ?>
        <br>
        <?php
        $idee=new ideeDeRecette();
        $idee->showForm();
    }

}