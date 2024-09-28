<?php

class ideeDeRecette
{
    public function showForm(){
        ?>
        <head>
            <link href="../CSS/ideeDeRecette.css" rel="stylesheet">
            <link href="../CSS/pageCategorie.css" rel="stylesheet">

            <script src="../jQuery/jquery-3.6.0.js"></script>
            <script>
                class Example {
                    static count=1;
                    static data;
                }
                function search(){
                    let x=document.getElementsByTagName('input');
                    let data= [];
                    for (let i=0;i<x.length;i++){
                        data[i]=x[i].value;
                    }
                    $.ajax({
                        url:"../Controllers/ajaxIdeeDeRecette.php",
                        type:"GET",
                        data: {
                            data:data,
                        },
                        cache:false,
                        success: function (dataResult){
                            let result=JSON.parse(dataResult);
                            Example.data=result;
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
                function addIngredient(){
                    let div1= document.createElement('div');
                    let div2= document.createElement('div');
                    let button= document.createElement('button');
                    button.className='input-group-text'
                    button.innerText='Delete'
                    button.onclick = function(){removeIng(this);};
                    div2.appendChild(button);
                    let input = document.createElement("input");
                    div1.className='input-group mb-3'
                    input.type="text";
                    input.placeholder="ingredient ";
                    input.className="form-control";
                    let x=document.getElementById('ingredients');
                    div1.appendChild(input);
                    div1.appendChild(div2);
                    x.appendChild(div1);
                }
                function removeIng(x){
                    let y=x.parentElement.parentElement;
                    y.remove();
                }
                function filterbar(){
                    let x="<center><div><br><div class=\"form-group\" ><label for=\"nom\">Temps de preparation</label><input type=\"time\" class=\"form-control\" id=\"t1\"></div><div class=\"form-group\"><label for=\"nom\">Temps de cuisson</label><input type=\"time\" class=\"form-control\" id=\"t2\" ></div><div class=\"form-group\"><label for=\"nom\">Temps total</label><input type=\"time\" class=\"form-control\" id=\"t3\"></div><div class=\"form-group\"><label for=\"nom\">Notation</label><input type=\"number\" class=\"form-control\" id=\"note\"></div><div class=\"form-group\"><label for=\"nom\">calories</label><input type=\"number\" class=\"form-control\" id=\"calories\"></div><button class=\"btn btn-primary\" onclick=\"filter()\">Filtrer</button></div></center>";
                    let y=document.getElementById('part1');
                    y.innerHTML=x;
                    document.getElementById('idea').style.backgroundColor='lightgrey';
                    document.getElementById('idea').style.border='lightgrey';
                    document.getElementById('filtre').style.backgroundColor='';
                    document.getElementById('filtre').style.border='';
                }

                function filter(){
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
                    let a=document.getElementById('t1').value;
                    let b=document.getElementById('t2').value;
                    let d=document.getElementById('t3').value;
                    let c=document.getElementById('note').value;
                    let e=document.getElementById('calories').value;
                    alert(Example.data[0]['t_total']);
                    let bool;
                    for (let i=0;i<(Example.data).length;i++){
                        bool=true
                        if (a.trim() !== "") {
                            if(a.toString()+":00"!==Example.data[i]['t_prepa'].toString()) {bool=false;}
                        }
                        if (b.trim() !== "") {
                            if(b.toString()+":00"!==Example.data[i]['t_cuisson'].toString()) {bool=false;}
                        }
                        if (d.trim() !== "") {
                            if(d.toString()+":00"!==Example.data[i]['t_total'].toString()) {bool=false;}
                        }
                        if (c.trim() !== "") {
                            if(c.toString() !== Example.data[i]['notation'].toString()) {bool=false;}
                        }
                        if (e.trim() !== "") {
                            if(e.toString() !== Example.data[i]['nbr_calories'].toString()) {bool=false;}
                        }
                        if (bool==true) {
                            description= Example.data[i]['description'].substring(0, 59);
                            x+=y1+y2+y3+Example.data[i]['image']+y4+Example.data[i]['titre']+y5+description+y6+Example.data[i]['id']+y7+y8;
                        }
                    }
                    document.getElementById('affichage').innerHTML=x;
                }
            </script>
        </head>

        <center>
        <div>
            <button id="idea" class="btn btn-primary" onclick="document.location.reload(true)">Idee de recette</button>
            <button id="filtre" style="background-color: lightgray;border: lightgray;" class="btn btn-primary" onclick="filterbar()">Filtrer Resultat</button>
        </div>
        </center>
        <br>
        <br>
        <div id="part1">
        <center>
            <div id="searchform">
                <div id="ingredients">
                    <h4 class="mt-1">Ingredients</h4>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Ingredient">
                        <div class="input-group-append">
                            <button class="input-group-text" onclick="removeIng(this)">Delete</button>
                        </div>

                    </div>

                </div>
                <div>
                    <button class="btn btn-primary" onclick="search()">Rechercher</button>
                    <button class="btn btn-primary" onclick="addIngredient()">Ajouter Ingredient</button>
                </div>
            </div>
        </center>
        </div>

        <div id="affichage" class="scrolling-wrapper row flex-row">

        </div>
        <?php
    }

}