<?php

class caroussel{
    public function show_carou($img1,$img2){
?>

        <!-- Carousel -->
        <center>
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="http://localhost:63342/Projet_TDW/Recettes/Plats/boeuf1.jpg" alt="" class="d-block" >
                </div>
                <div class="carousel-item">
                    <img src="..\Recettes\Entrees\canape.jpg" alt="" class="d-block" >
                </div>
                <div class="carousel-item">
                    <img src="..\Recettes\Plats\Couscous.jpg" alt="" class="d-block">
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
        </center>

        <?php
    }
}
