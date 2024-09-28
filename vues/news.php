<?php

class news
{
    public function showNews(){
        $cc1= new categoryController();
        $mesPlats = $cc1->all();
        $mesNews = $cc1->news();

        ?>
        <head>
            <meta charset="UTF-8">
            <link href="../CSS/card.css" rel="stylesheet">
            <script src="../jQuery/jquery-3.6.0.js"></script>

            <script>
                function test(id){
                    $.ajax({
                        url:"../Controllers/ajaxNewsController.php",
                        type:"GET",
                        data: {
                            id:id,
                        },
                        cache:false,
                        success: function (dataResult){
                            let result=JSON.parse(dataResult);
                            let x="<h2 class='mt-1'>"+result[0]+"</h2><br><center><img style='width: 600px;height: 400px' src='"+result[2]+"'></center><br><div style=\"font-family: 'Times New Roman'; font-size: 18px;margin-left: 200px;margin-right: 200px; \">"+result[1]+"</div>";
                            if (result[3]!=null)x+="<center><video width='650' height='500px' controls><source src='"+result[3]+"' type='video/mp4'></video></center>";
                            document.getElementById('news').innerHTML=x;
                            document.getElementById("news").scrollIntoView({behavior: 'smooth'});
                        }

                    })
                }
            </script>
        </head>
        <div class="category-container">

            <center><h2 class="mt-1">News</h2></center>

            <div class="scrolling-wrapper row flex-row flex-nowrap">
                <!-- col-3 le 3 specifie le width de la carte plus il est ptit plus la carte est ptite-->
                <?php
                foreach ($mesNews as $value)
                {
                    ?>
                    <div class="col-3">
                        <div class="card card-block">
                            <img src="<?php echo $value['image']?>"> <label><b><?php echo $value['titre']?></b></label><label><?php echo substr($value['description'],0,59)?>... <a href="#" onclick="test(<?php echo $value['id']?>)">Afficher plus</a></label>
                        </div>
                    </div>
                    <?php
                }

                foreach ($mesPlats as $value)
                {
                    ?>
                    <div class="col-3">
                        <div class="card card-block">
                            <img src="<?php echo $value['image']?>"> <label><b><?php echo $value['titre']?></b></label><label><?php echo substr($value['description'],0,59)?>... <a href="../Routes/recetteRoute.php?id=<?php echo $value['id']?>" target="_blank">Afficher plus</a></label>
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