<?php
require_once ('../Controllers/categoryController.php');



class pageCategorie
{
    public function showPage($category){
        $cc1= new categoryController();
        $mesPlats = $cc1->recette($category);
        ?>
        <head>
            <meta charset="UTF-8">

            <link href="../CSS/pageCategorie.css" rel="stylesheet">
            <script src="../jQuery/jquery-3.6.0.js"></script>

            <script>
                function search(){
                    let a=document.getElementById('t1').value;
                    let b=document.getElementById('t2').value;
                    let d=document.getElementById('t3').value;
                    let c=document.getElementById('note').value;
                    let e=document.getElementById('calories').value;
                    let f=document.getElementById('cat').innerText;

                    $.ajax({
                        url:"../Controllers/ajaxFilterController.php",
                        type:"GET",
                        data: {
                            t1:a,
                            t2:b,
                            note:c,
                            t3:d,
                            calories:e,
                            categorie:f,
                        },
                        cache:false,
                        success: function (dataResult){
                            let result=JSON.parse(dataResult);
                            let y1="<div class=\"col-3\">";
                            let y2="<div class=\"card card-block\" style=\"margin-bottom: 20px;\">";
                            let y3="<img src=\"";
                            let y4="\"> <label class=\"titre\"><b>";
                            let y5="</b></label><label>";
                            let y6="<a href=\"../Routes/recetteRoute.php?id=";
                            let y7="\" target=\"_blank\">Afficher plus</a></label>";
                            let y8="</div></div>";
                            let x='';
                            let description='';
                            for (let i = 0; i < result.length; i++) {
                                description= result[i]['description'].substring(0, 59);
                                x+=y1+y2+y3+result[i]['image']+y4+result[i]['titre']+y5+description+y6+result[i]['id']+y7+y8;
                            }
                            document.getElementById('affichage').innerHTML=x;
                        }
                    })
                }
            </script>

        </head>
        <center>
            <div>
            <br>
                <div class="form-group" >
                    <label for="nom">Temps de preparation</label>
                    <input type="time" class="form-control" id="t1">
                </div>
                <div class="form-group">
                    <label for="nom">Temps de cuisson</label>
                    <input type="time" class="form-control" id="t2" >
                </div>
                <div class="form-group">
                    <label for="nom">Temps total</label>
                    <input type="time" class="form-control" id="t3">
                </div>
                <div class="form-group">
                    <label for="nom">Notation</label>
                    <input type="number" class="form-control" id="note">
                </div>
                <div class="form-group">
                    <label for="nom">calories</label>
                    <input type="number" class="form-control" id="calories">
                </div>
                <button class="btn btn-primary" onclick="search()">Filtrer</button>
            </div>
        </center>
        <div id="abc" class="category-container" style="box-shadow: 0 0 0 0; border: none;">


            <center><h2 id="cat" class="mt-1" ><?php echo $category?></h2></center>


            <div id="affichage" class="scrolling-wrapper row flex-row">
                <!-- col-3 le 3 specifie le width de la carte plus il est ptit plus la carte est ptite-->
                <?php
                foreach ($mesPlats as $value)
                {
                    ?>
                    <div class="col-3">
                        <div class="card card-block" style="margin-bottom: 20px;">
                            <img src="<?php echo $value['image']?>"> <label class="titre"><b><?php echo $value['titre']?></b></label><label><?php echo substr($value['description'],0,59)?>... <a href="../Routes/recetteRoute.php?id=<?php echo $value['id']?>" target="_blank">Afficher plus</a></label>
                        </div>
                    </div>
                    <?php
                }


                ?>
            </div>
        </div>
        <div id="news"></div>

        <?php
    }

}