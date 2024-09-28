<?php
require_once ('../Controllers/categoryController.php');
require_once ('../Controllers/recetteController.php');
require_once ('../Controllers/recetteController.php');
require_once ('../Controllers/favorisController.php');





class recette
{

    public function showRecette($id){
        session_start();
        $rc=new recetteController();
        $result=$rc->getRecette($id);
        $ingredients = $rc->getIngredientsRecette($id);
        foreach ($result as $value) {


            ?>
            <head>
                <script src="../jQuery/jquery-3.6.0.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <link href="../CSS/cardRecette.css" REL="stylesheet">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
                <script>
                    function addFavoris(id,id_recette){
                        let a=id;
                        let b=id_recette;
                        let x='';

                        if(document.getElementById('notation').style.color != 'orange'){
                            document.getElementById('notation').style.color='orange';
                            x='add';
                        }
                        else {
                            x='remove';
                            document.getElementById('notation').style.color='black';
                        }
                        $.ajax({
                            url:"../Controllers/ajaxFavoris.php",
                            type:"GET",
                            data: {
                                id:a,
                                id_recette:b,
                                operation:x,
                            },
                            cache:false,
                            success: function (dataResult){
                            }
                        })
                    }
                </script>
            </head>
            <div class="card mx-auto">
            <img src="<?php echo $value['image']?>" class="card-img-top" alt="..." style="height: 500px;">
            <div class="card-body">
                <?php
                if($_SESSION != null){
                    $fc=new favorisController();
                    $bool=$fc->verify($value['id'],$_SESSION['id']);
                    ?>
                    <div class="recette-head">
                        <h5 class="card-title"><?php echo $value['titre']?></h5>
                        <?php
                            if($bool){
                        ?>
                        <div class="favoris"><i class="fa fa-star checked" id="notation"  onclick="addFavoris(<?php echo $_SESSION['id']?>,<?php echo $value['id']?>)"></i></div>
                        <?php
                        }
                            else{
                        ?>
                        <div class="favoris"><i class="fa fa-star" id="notation"  onclick="addFavoris(<?php echo $_SESSION['id']?>,<?php echo $value['id']?>)"></i></div>
                        <?php
                            }
                        ?>
                    </div>
                    <?php
                }
                else{
                    ?>
                    <h5 class="card-title"><?php echo $value['titre']?></h5>
                    <?php
                }
                ?>
                <hr>
                <br>
                <div class="info">
                    <img src="../images/icones/time.png">
                    <div class="niveau1">
                        <div>Preparation</div>
                        <div><b><?php echo $value['t_prepa']?></b></div>
                    </div>
                    <div class="niveau1">
                        <div>Cuisson</div>
                        <div><b><?php echo $value['t_cuisson']?></b></div>
                    </div>
                    <div class="niveau1">
                        <div>Repos</div>
                        <div><b><?php echo $value['t_repos']?></b></div>
                    </div>
                    <div class="niveau1">
                        <div>Total</div>
                        <div><b><?php echo $value['t_total']?></b></div>
                    </div>
                    <div class="niveau1">
                        <div>Kcal</div>
                        <div><b><?php echo $value['nbr_calories']?></b></div>
                    </div>
                    <div class="niveau1">
                        <div>Healthy</div>
                        <div><b><?php if($value['healthy']==1) echo 'non'; else echo 'non';?></b></div>
                    </div>

                    <img src="../images/icones/hat.png">
                    <div style="margin-right: 40px">Facile</div>
                    <div>
                        <span>Note</span>
                        <?php
                        for($j=0;$j<$value['notation'];$j++){
                            ?>
                            <span class="fa fa-star checked"></span>
                            <?php
                        }
                        ?>
                        <?php
                        for($j=0;$j<5-$value['notation'];$j++){
                            ?>
                            <span class="fa fa-star"></span>
                            <?php
                        }
                        ?>

                    </div>

                </div>
                <br>


                <center>
                    <p class="card-text"><?php echo $value['description']?></p>
                </center>
                <br>
                <hr>

                <h5 class="card-title">Ingredients : </h5>
                <?php
                $count=$ingredients->rowCount();
                $array=$ingredients->fetchAll();

                for($i=0;$i<$count-1;$i+=2){

                    ?>
                    <div class="ingredient-container">
                        <div>
                            <div><?php echo $array[$i]['nom']?></div><div><b><?php echo $array[$i]['qte_ingredient']?>&nbsp;<?php echo $array[$i]['unite']?></b></div>
                        </div>
                        <div>
                            <div><?php echo $array[$i+1]['nom']?></div><div><b><?php echo $array[$i+1]['qte_ingredient']?>&nbsp;<?php echo $array[$i+1]['unite']?></b></div>
                        </div>
                    </div>
                    <hr>
                    <?php
                }

                if($count%2!=0){
                    ?>
                    <div class="ingredient-container">
                        <div>
                            <div><?php echo $array[$count-1]['nom']?></div><div><b><?php echo $array[$count-1]['qte_ingredient']?>&nbsp;<?php echo $array[$count-1]['unite']?></b></div>
                        </div>
                    </div>
                    <hr>

                    <?php

                }
                ?>
                <br>

                <h5 class="card-title">Etapes a suivre : </h5>
                <?php
                $steps=$rc->getSteps($id);
                foreach ($steps as $step){
                    ?>
                    <p><b><?php echo $step['numero_etape']?>)</b>&nbsp;<?php echo $step['description']?></p>
                    <?php
                }

                if($value['video']!=null){
                ?>
                    <video  height="500" class="card-img-bottom" controls>
                        <source src="<?php echo $value['video']?>" type="video/mp4">
                    </video>
<?php
                }
                ?>

            </div>
            <?php
        }
    }
}