<?php

require_once ('../vues/caroussel.php');
require_once ('../vues/header.php');
require_once ('../vues/navbar.php');
require_once ('../vues/libraries.php');
require_once ('../vues/categorie.php');
require_once ('../vues/news.php');



class newsController
{
    public function showNews(){
        $imports=new libraries();
        $imports->importLibraries();

        $myheader = new header();
        $myheader->showHeader();
        ?>
        <br>
        <?php
        $mynavbar=new navbar();
        $mynavbar->showNavBar();

        $mynews=new news();
        $mynews->showNews();

    }

}