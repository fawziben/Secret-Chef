<?php

class navbar
{
    public function showNavBar(){
        ?>

        <nav class="navbar navbar-expand-lg bg-light justify-content-center sticky-top w-200">
            <ul class="navbar-nav ">
                <li><a class="nav-link" href="../Routes/acceuilRoute.php">acceuil</a></li>
                <li><a class="nav-link" href="../Routes/newsRoute.php">news</a></li>
                <li><a class="nav-link" href="../Routes/ideeDeRecetteRoute.php">idees de recettes</a></li>
                <li><a class="nav-link" href="../Routes/healthyRoute.php">healthy</a></li>
                <li><a class="nav-link" href="../Routes/saisonRoute.php">saison</a></li>
                <li><a class="nav-link" href="../Routes/fetesRoute.php">fetes</a></li>
                <li><a class="nav-link">nutrition</a></li>
                <li><a class="nav-link" href="../Routes/acceuilRoute.php#login-btn">contact</a></li>
            </ul>
        </div>
        </nav>

        <?php
    }

}