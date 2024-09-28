<?php
require_once ('../vues/navbar.php');
require_once ('../vues/libraries.php');
require_once ('../vues/header.php');
require_once ('../vues/navbar.php');
require_once ('../vues/saison.php');


class saisonController
{
    public function showSesasons(){
        $imports=new libraries();
        $imports->importLibraries();

        $myheader = new header();
        $myheader->showHeader();
        ?>
        <br>
        <?php
        $mynavbar=new navbar();
        $mynavbar->showNavBar();

        $saisons=new saison();
        $saisons->showSaison();

    }


}