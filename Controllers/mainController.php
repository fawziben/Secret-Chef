<?php

require_once ('../vues/caroussel.php');
require_once ('../vues/header.php');
require_once ('../vues/navbar.php');
require_once ('../vues/categorie.php');
require_once ('../vues/libraries.php');
require_once ('../vues/loginButton.php');
require_once ('../vues/contact.php');
require_once ('../vues/logoutButton.php');





class mainController
{
    public function showAcceuil(){

        $lib=new libraries();
        $lib->importLibraries();
        ?>
        <body>
        <?php
        $myheader = new header();
        $myheader->showHeader();
        ?>
        <br>

        <?php
        $mynavbar=new navbar();
        $mynavbar->showNavBar();
        ?>

        <?php
        $mycar= new caroussel();
        $mycar->show_carou('sdf','sdf');


        $categorie1= new categorie();
        $categorie1->showCtegory('Entrees');
        $categorie1->showCtegory('Plats');
        $categorie1->showCtegory('Desserts');
        $categorie1->showCtegory('Boissons');


        if ( $_SESSION != null ){
            $boutton = new logoutButton();
            $boutton->showLogout();
        }
        else{
            $boutton = new loginButton();
            $boutton->showButton();

        }

        $con=new contact();
        $con->showContact();

        ?>

        </body>
        <?php
    }

}