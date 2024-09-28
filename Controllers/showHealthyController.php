<?php
require_once ('../vues/healthy.php');
require_once('../vues/header.php');
require_once('../vues/libraries.php');
require_once('../vues/navbar.php');

class showHealthyController
{
    public function show(){
        $libs=new libraries();
        $libs->importLibraries();
        $head=new header();
        $head->showHeader();
        ?>
        <br>
        <?php
        $nav=new navbar();
        $nav->showNavBar();
        $healthy=new healthy();
        $healthy->showHelathy();
    }

}