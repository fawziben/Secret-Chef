<?php
require_once ('../Controllers/categoryController.php');
require_once ('../Controllers/recetteController.php');


class modifyRecette
{
    public function afficher($id){
        $rc=new recetteController();
        $result=$rc->getRecette($id);
        $ingredients = $rc->getIngredientsRecette($id);
        foreach ($result as $value) {


            ?>
            <head>
                <link href="../CSS/cardRecette.css" rel="stylesheet">
                <script src="../jQuery/jquery-3.6.0.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
                <script>
                    function addline(x){
                        let y=x.parentNode;
                        let html = "<div class='etape'><span contenteditable=\"true\">Ajouter texte ici</span> <img src=\"../images/icones/plus.png\" style=\"width: 25px;height: 25px;cursor: pointer\" onclick=\"addline(this)\"></div>";
                        y.insertAdjacentHTML("afterend", html);
                    }

                    function modify(id){
                        let steps = document.getElementsByClassName('etape');
                        let arr=[];
                        for (let i=0;i<steps.length;i++){
                            arr[i]=steps[i].innerText;
                        }
                        $.ajax({
                            url:"../Controllers/ajaxModifySteps.php",
                            type:"GET",
                            data: {
                                id:id,
                                data:arr,
                            },
                            cache:false,
                            success: function (dataResult){
                                alert('Les etapes ont bien ete modifiees');
                            }
                        })
                    }
                    function removeline(x){
                        x.parentNode.remove();
                    }
                    function edit(id){
                        let entete = document.getElementsByClassName('entete');
                        let arr=[];
                        for (let i=0;i<entete.length;i++){
                            arr[i]=entete[i].innerText;
                        }
                        $.ajax({
                            url:"../Controllers/ajaxModifyHeader.php",
                            type:"GET",
                            data: {
                                id:id,
                                data:arr,
                            },
                            cache:false,
                            success: function (dataResult){
                                if(dataResult=='true') {alert('Modification reussi');}
                                else {alert('Erreur: echec de la modification');}
                            }
                        })

                    }
                </script>
            </head>
            <div class="card mx-auto">
                <img src="<?php echo $value['image']?>" class="card-img-top" alt="..." style="height: 500px;">
                <div class="card-body">

                    <h5 class="card-title entete" contenteditable="true"><?php echo $value['titre']?></h5>

                    <hr>
                    <br>
                    <div class="info">
                        <img src="../images/icones/time.png">
                        <div class="niveau1">
                            <div>Preparation</div>
                            <div class="entete" contenteditable="true"><b><?php echo $value['t_prepa']?></b></div>
                        </div>
                        <div class="niveau1">
                            <div>Cuisson</div>
                            <div class="entete" contenteditable="true"><b><?php echo $value['t_cuisson']?></b></div>
                        </div>
                        <div class="niveau1">
                            <div>Repos</div>
                            <div class="entete" contenteditable="true"><b><?php echo $value['t_repos']?></b></div>
                        </div>
                        <div class="niveau1">
                            <div>Total</div>
                            <div class="entete" contenteditable="true"><b><?php echo $value['t_total']?></b></div>
                        </div>
                        <div class="niveau1">
                            <div>Kcal</div>
                            <div class="entete" contenteditable="true"><b><?php echo $value['nbr_calories']?></b></div>
                        </div>
                        <div class="niveau1">
                            <div>Healthy</div>
                            <div class="entete" contenteditable="true"><b><?php if ($value['healthy']==0)  echo 'non'; else echo 'oui';?></b></div>
                        </div>

                        <div class="niveau1">
                            <div>Note</div>
                            <div class="entete" contenteditable="true"><b><?php echo $value['notation']?></b></div>
                        </div>

                        </div>

                    </div>
                    <br>


                    <center>
                        <p class="entete" contenteditable="true" class="card-text"><?php echo $value['description']?></p>
                    </center>
                    <br>
                    <center><button style="margin-bottom: 30px;" class="btn btn-primary" onclick="edit(<?php echo $value['id']?>)">Modifier</button></center>

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
                    <div class="etape"><span contenteditable="true"><?php echo $step['description']?></span> <img src="../images/icones/plus.png" style="width: 25px;height: 25px;cursor: pointer" onclick="addline(this)"><img src="../images/icones/remove.png" style="width: 25px;height: 25px;cursor: pointer" onclick="removeline(this)"></div>
                    <?php
                }
                ?>
                    <center><button style="margin-bottom: 30px;" class="btn btn-primary" onclick="modify(<?php echo $value['id']?>)">Modifier</button></center>
                </div>
            <?php

        }
    }

}