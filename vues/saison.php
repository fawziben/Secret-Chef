<?php

class saison
{
    public function showSaison(){
?>
        <head>
            <script src="../jQuery/jquery-3.6.0.js"></script>
            <link href="../CSS/saisoncard.css" rel="stylesheet">
            <script>
                function show(x) {
                    alert(x);
                    $.ajax({
                        url:"../Controllers/ajaxRecetteSaison.php",
                        type:"GET",
                        data: {
                            x:x,
                        },
                        cache:false,
                        success: function (dataResult){
                            let result=JSON.parse(dataResult);
                            alert(result[0]['titre']);
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
            <div class="all" style="display:flex; width: 90%">
                <div class="container" onclick="show('Hiver')">
                    <img src="../images/saisons/hiver.jpg" alt="hiver" style="width:250px;height: 150px">
                    <h3 class="centered">Hiver</h3>
                </div>
                <div class="container" onclick="show('Automne')">
                    <img src="../images/saisons/automne.jpg" alt="automne" style="width:250px;height: 150px">
                    <h3 class="centered">Automne</h3>
                </div>
                <div class="container" onclick="show('Printemps')">
                    <img src="../images/saisons/printemps.jpg" alt="printemps" style="width:250px;height: 150px">
                    <h3 class="centered">Printemps</h3>
                </div>
                <div class="container" onclick="show('Ete')">
                    <img src="../images/saisons/ete.png" alt="ete" style="width:250px;height: 150px">
                    <h3 class="centered">Ete</h3>
                </div>
            </div>
        </center>
        <div id="affichage" class="scrolling-wrapper row flex-row">

        </div><?php
    }

}