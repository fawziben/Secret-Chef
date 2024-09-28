<?php
require_once ('../Controllers/profilController.php');
class profile
{
    public function showProfile(){
        session_start();
        $pc=new profilController();
        $userdata= $pc->getData($_SESSION['id']);
        ?>
<center>
    <head>
        <script>

        </script>
    </head>
    <?php
        foreach ($userdata as $u){
    ?>
        <div class="container">
        <div class="card" style="width:400px">
            <img class="card-img-top" src="../images/icones/img_avatar1.png" style="width:100%;height: 350px">
            <div class="card-body">
                <h6 class="card-title" style="text-align: left">Nom: <?php echo $u['nom']?></h6>
                <hr>
                <h6 class="card-title" style="text-align: left">Prenom: <?php echo $u['prenom']?></h6>
                <hr>
                <h6 class="card-title" style="text-align: left">Sexe: <?php echo $u['sexe']?></h6>
                <hr>
                <h6 class="card-title" style="text-align: left">Date de Naissance: <?php echo $u['datenaissance']?></h6>
                <hr>
                <h6 class="card-title" style="text-align: left">Email: <?php echo $u['mail']?></h6>
                <hr>
                <div>
                <a class="btn btn-primary" href="../Routes/favorisRoute.php">Afficher favoris</a>
                <a class="btn btn-primary" onclick="">Ajouter recette</a>

                </div>
            </div>
        </div>
</center>
            <?php
        }
            ?>
        <br>


<?php
    }

}