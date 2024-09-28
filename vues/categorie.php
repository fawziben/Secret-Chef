<?php
require_once ('../Controllers/categoryController.php');


class categorie
{

    public function showCtegory($category){
        $cc1= new categoryController();
        $mesPlats = $cc1->recette($category);
        ?>
        <head>
            <meta charset="UTF-8">
            <link href="../CSS/card.css" rel="stylesheet">
        </head>
        <div class="category-container">

            <center><a href="../Routes/pageCategorieRoute.php?cat=<?php echo $category?>"><h2 class="mt-1"><?php echo $category?></h2></a></center>

            <div class="scrolling-wrapper row flex-row flex-nowrap">
                <!-- col-3 le 3 specifie le width de la carte plus il est ptit plus la carte est ptite-->
                <?php

                    foreach ($mesPlats as $value)
                    {
                        ?>
                        <div class="col-3">
                            <div class="card card-block">
                                <img src="<?php echo $value['image']?>"><div style="padding-top: 20px;"><center><label><b><?php echo $value['titre']?></b></label></center><label style="padding-left: 40px;padding-right: 40px;"><?php echo substr($value['description'],0,59)?>... <a href="../Routes/recetteRoute.php?id=<?php echo $value['id']?>" target="_blank">Afficher plus</a></label></div>
                            </div>
                        </div>
                        <?php
                    }


                ?>
            </div>
        </div>
<?php
    }

}