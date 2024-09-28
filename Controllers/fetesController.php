<?php
require_once ('../vues/header.php');
require_once ('../vues/navbar.php');
require_once ('../vues/libraries.php');
require_once ('../vues/categorie.php');
require_once ('../vues/fetes.php');


class fetesController
{
    public function showfetes(){
        $imports=new libraries();
        $imports->importLibraries();

        $myheader = new header();
        $myheader->showHeader();
        ?>
        <br>
        <?php
        $mynavbar=new navbar();
        $mynavbar->showNavBar();

        $myfetes=new fetes();
        $myfetes->showFetes();

    }

}