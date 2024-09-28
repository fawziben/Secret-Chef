<?php
require_once ('../Controllers/recetteListController.php');

class categorieAdmin
{
    public function showCategories(){
        $rlc=new recetteListController();
        $cols=$rlc->getRecetteColumns();
        $resultat=$rlc->getRecettelist();
        ?>
        <head>
            <style>
                .delete{
                    margin-right: 3px;

                }
                .edit{
                    margin-right: 3px;

                }
                .delete:hover{
                    color: red;
                }
                .edit:hover {
                    color: green;
                }
                .done:hover {
                    color: green;
                }
                body{
                    font-size:15px;
                }
                select{
                    height: 30px;
                    border-radius: 5px;
                }
                table{
                    table-layout: fixed;
                }
                .styled-table {
                    border-collapse: collapse;
                    margin: 25px 0;
                    font-size: 0.9em;
                    font-family: sans-serif;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                    width: 100%;
                }
                .styled-table thead tr {
                    background-color: #d7a6b3;
                    color: black;
                    text-align: left;
                }
                .styled-table th,
                .styled-table td {
                    padding: 12px 15px;
                }
                .styled-table tbody tr {
                    border-bottom: 1px solid #dddddd;
                }

                .styled-table tbody tr:nth-of-type(even) {
                    background-color: #f3f3f3;
                }

                i,a{
                    cursor:pointer;
                    color: black;
                    margin-left: 3px;
                    margin-top: 15px;
                    text-decoration: none;
                }
                #lastchild{
                    display: table-row-group;

                }

                #entete{
                    position: sticky;
                    top: 0;
                }
                #menu button{
                    margin-right:-4px;
                    width: 245px;
                    height:60px;
                    border: none;
                    font-size: 14px;
                    text-decoration:bold;
                }


                #menu a{
                    margin-right:-4px;
                }

            </style>
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">            <script src="../jQuery/jquery-3.6.0.js"></script>
            <link href="../CSS/saisoncard.css" rel="stylesheet">
            <script>
                    $(document).ready(function(){
                    $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#myTable tr").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });

            function remove(x,y) {
                let row=y.parentNode.parentNode.parentNode;
                row.remove();
                $.ajax({
                    url:"../Controllers/ajaxDeleteRecette.php",
                    type:"GET",
                    data: {
                        id:x,
                    },
                    cache:false,
                    success: function (dataResult){
                        alert('Recette Supprime');
                    }

                    })
                }
                function valider(x,y)
                {
                   y.remove();
                    $.ajax({
                        url:"../Controllers/ajaxValiderRecette.php",
                        type:"GET",
                        data: {
                            id:x,
                        },
                        cache:false,
                        success: function (dataResult){
                            alert('Recette Validee');
                        }

                    })
                }

                function news(){
                    $.ajax({
                        url:"../Controllers/ajaxGetNews.php",
                        type:"GET",
                        data: {
                        },
                        cache:false,
                        success: function (dataResult){
                            let button="<center><a class=\"btn btn-primary\" onclick=\"addnews()\">Ajouter News</a><center>";
                            let result=JSON.parse(dataResult);
                            let tb=document.getElementById('myTable');
                            let thead="<tr><th>titre</th><th>description</th><th>image</th><th>video</th><th style='width: 15%'>Actions</th><tr>";
                            let entete=document.getElementById('entete');
                            entete.innerHTML=thead;
                            let tr='';
                            for (let i = 0; i < result.length; i++) {
                                tr +="<tr><td>"+result[i]['titre']+"</td><td>"+result[i]['description'].substring(0,100)+"...</td><td style='word-wrap: break-word;'>"+result[i]['image']+"</td><td>"+result[i]['video']+"</td> <td ><div style=\"display: flex;justify-content: left\"><i onclick=\"deletenew("+result[i]['id']+",this)\" class=\"material-icons delete\" >&#xe92b;</i><i class=\"material-icons edit\" ><a href=\"../Routes/modifyNewsRoute.php?id="+result[i]['id']+"\" target=\"_blank\">&#xe3c9</a></i></td>"+"</tr>";
                            }
                            tb.innerHTML=tr;
                            document.getElementById('section').innerText='Gestion des news';
                            document.getElementById('addbutton').innerHTML=button;


                        }

                    })

                }
                function utilisateurs(){
                    $.ajax({
                        url:"../Controllers/ajaxGetUsers.php",
                        type:"GET",
                        data: {
                        },
                        cache:false,
                        success: function (dataResult){
                            let button="<center><a class=\"btn btn-primary\" onclick=\"showform()\">Ajouter un utilisateur</a><center>";
                            let result=JSON.parse(dataResult);
                            let tb=document.getElementById('myTable');
                            let thead="<tr><th>nom</th><th>prenom</th><th>Email</th><th>sexe</th><th>Date de naissance</th><th>Mot de passe</th><th>Valide</th><th style='width: 15%'>Actions</th><tr>";
                            let entete=document.getElementById('entete');
                            entete.innerHTML=thead;
                            let tr='';
                            for (let i = 0; i < result.length; i++) {
                                let valide='OUI';
                                let values=[result[i]['id'],result[i]['valide']];
                                if(result[i]['valide']==0) valide='NON';
                                tr +="<tr><td>"+result[i]['nom']+"</td><td>"+result[i]['prenom']+"</td><td>"+result[i]['mail']+"</td><td>"+result[i]['sexe']+"</td>"+"<td>"+result[i]['datenaissance']+"</td>"+"<td>"+result[i]['password']+"</td>"+"<td>"+valide+"</td>"+"<td><div style=\"display: flex;justify-content: left\"><i onclick=\"deleteuser("+result[i]['id']+",this)\" class=\"material-icons delete\" >&#xe92b;</i><i class=\"material-icons edit\" ><a href=\"../Routes/modifyProfileRoute.php?values="+values+"\" target=\"_blank\">&#xe3c9</a></i></td>";
                                tr+="</td>"
                            }
                            tb.innerHTML=tr;
                            document.getElementById('section').innerText='Gestion des utilisateurs';
                            document.getElementById('addbutton').innerHTML=button;

                        }

                    })

                }
                function deletenew(x,y){
                    y.parentNode.parentNode.parentNode.remove();
                    $.ajax({
                        url:"../Controllers/ajaxRemoveNews.php",
                        type:"GET",
                        data: {
                            id:x,
                        },
                        cache:false,
                        success: function (dataResult){
                            alert('News Supprime');
                        }

                    })
                }
                    function deleteuser(x,y){
                        y.parentNode.parentNode.parentNode.remove();
                        $.ajax({
                            url:"../Controllers/ajaxRemoveUser.php",
                            type:"GET",
                            data: {
                                id:x,
                            },
                            cache:false,
                            success: function (dataResult){
                                alert('Utilisateur supprime');
                            }

                        })
                    }
                    function showform(){
                        let table =document.getElementById('myTable');
                        let row="<tr><td contenteditable></td><td contenteditable></td><td contenteditable></td><td contenteditable><select><option>Masculin</option><option>Feminin</option></select></td><td contenteditable><input type='date'></td><td contenteditable></td><td contenteditable><select><option>Oui</option><option>Non</option></select></td><td><i onclick=\"adduser(this)\" class=\"material-icons done\" >done</i></td><tr>";
                        table.innerHTML+=row;
                    }

                    function adduser(x){
                        let b=0;
                        let row = x.parentNode.parentNode;
                        let nom=row.cells[0].innerHTML;
                        let prenom=row.cells[1].innerHTML;
                        let email=row.cells[2].innerHTML;
                        let sexe=row.cells[3].getElementsByTagName('select')[0].value;
                        let date=row.cells[4].getElementsByTagName('input')[0].value;
                        let password=row.cells[5].innerHTML;
                        let valide=row.cells[6].getElementsByTagName('select')[0].value;
                        if(valide=='OUI'){
                            b=1;
                        }

                        $.ajax({
                            url:"../Controllers/ajaxAdminAddUser.php",
                            type:"GET",
                            data: {
                                nom:nom,
                                prenom:prenom,
                                email:email,
                                sexe:sexe,
                                date:date,
                                password:password,
                                valid:b,
                            },
                            cache:false,
                            success: function (dataResult){
                                let values=[dataResult,b];
                                let test="<div style=\"display: flex;justify-content: left\"><i onclick=\"deleteuser("+dataResult+",this)\" class=\"material-icons delete\" >&#xe92b;</i><i class=\"material-icons edit\" ><a href=\"../Routes/modifyProfileRoute.php?values="+values+"\" target=\"_blank\">&#xe3c9</a></i>";
                                row.cells[7].innerHTML=test;
                            }


                        })
                    }
                    function addnews(){
                        let table =document.getElementById('myTable');
                        let row="<tr><td contenteditable></td><td contenteditable></td><td contenteditable></td><td contenteditable></td><td><i onclick=\"addn(this)\" class=\"material-icons done\" >done</i></td></tr>";
                        table.innerHTML+=row;
                    }

                    function addn(x)
                    {
                        let row = x.parentNode.parentNode;
                        let titre=row.cells[0].innerHTML;
                        let description=row.cells[1].innerHTML;
                        let image=row.cells[2].innerHTML;
                        let video=row.cells[3].innerHTML;
                        $.ajax({
                            url:"../Controllers/ajaxAddNews.php",
                            type:"GET",
                            data: {
                                titre:titre,
                                description:description,
                                image:image,
                                video:video,
                            },
                            cache:false,
                            success: function (dataResult){
                                let test="<div style=\"display: flex;justify-content: left\"><i onclick=\"deletenew("+dataResult+",this)\" class=\"material-icons delete\" >&#xe92b;</i><i class=\"material-icons edit\" ><a href=\"../Routes/modifyNewsRoute.php?id="+dataResult+"\" target=\"_blank\">&#xe3c9</a></i></div>";
                                row.cells[4].innerHTML=test;
                            }
                        })

                    }
                    function nutrition(){
                        $.ajax({
                            url:"../Controllers/ajaxGetIngredients.php",
                            type:"GET",
                            data: {
                            },
                            cache:false,
                            success: function (dataResult){
                                alert(dataResult);
                                let result=JSON.parse(dataResult);
                                let tb=document.getElementById('myTable');
                                let thead="<tr><th>nom</th><th>infos nutritionnelles</th><th>saison</th><th>calories</th><th>healthy</th><tr>";
                                let entete=document.getElementById('entete');
                                entete.innerHTML=thead;
                                let tr='';
                                for (let i = 0; i < result.length; i++) {
                                    let valide='OUI';
                                    if(result[i]['healthy']==0) valide='NON';
                                    tr +="<tr><td>"+result[i]['nom']+"</td><td>"+result[i]['info_nutrition']+"</td><td>"+result[i]['saison']+"</td><td>"+result[i]['nbr_calories']+"</td>"+"<td>"+valide+"</td></tr>";
                                    tr+="</td>"
                                }
                                tb.innerHTML=tr;
                                document.getElementById('section').innerText='Gestion de la Nutrition';

                            }

                        })


                    }

            </script>
        </head>
        <center>
            <div class="all" style="display:flex; width: 90%">
                <div class="container" onclick="location.reload()">
                    <img src="../images/CategoriesAdmin/recette.jpg" alt="Gestion de recettes" style="width:200px;height: 150px">
                    <h3 class="centered">Gestion de recettes</h3>
                </div>
                <div class="container" onclick="news()">
                    <img src="../images/CategoriesAdmin/news.jpg"  alt="Gestion de News" style="width:200px;height: 150px">
                    <h3 class="centered">Gestion de News</h3>
                </div>
                <div class="container" onclick="utilisateurs()">
                    <img src="../images/CategoriesAdmin/user.png" alt="Gestions des utilisateurs" style="width:200px;height: 150px">
                    <h3 class="centered">Gestions des utilisateurs</h3>
                </div>
                <div class="container" onclick="nutrition()">
                    <img src="../images/CategoriesAdmin/nutrition.jpg" alt="Gestion de la nutrition" style="width:200px;height: 150px">
                    <h3 class="centered">Gestion de la nutrition</h3>
                </div>
                <div class="container" onclick="">
                    <img src="../images/CategoriesAdmin/settings.png" alt="Parametres" style="width:200px;height: 150px">
                    <h3 class="centered">Parametres</h3>
                </div>
            </div>
        </center>
        <br>
            <center><h2 id="section">Gestion des recettes</h2></center>

            <center><input style="width: 500px" class="form-control" id="myInput" type="text" placeholder="Filtrer"></center>
            <br>
        <div id="addbutton">
        </div>
        <div id="form-field">

        </div>
        <div style="overflow-x:auto;">
        <table id='tb1' class="styled-table ">
                <thead id="entete">
                <tr>
                    <th>titre</th>
                    <th>Categorie</th>
                    <th>Temps de preparation</th>
                    <th>Temps de cuisson</th>
                    <th>Temps de repos</th>
                    <th>Temps total</th>
                    <th>Difficulte</th>
                    <th>Nombre de calories</th>
                    <th>Healthy</th>
                    <th>Notation</th>
                    <th style="width:11%">Actions</th>
                </tr>
                </thead>
                <tbody id="myTable">
        <?php
        foreach ($resultat as $r){
            ?>
                <tr>
                    <td><?php echo $r['titre']?></td>
                    <td><?php echo $r['categorie']?></td>
                    <td><?php echo $r['t_prepa']?></td>
                    <td><?php echo $r['t_cuisson']?></td>
                    <td><?php echo $r['t_repos']?></td>
                    <td><?php echo $r['t_total']?></td>
                    <td><?php echo $r['difficulte']?></td>
                    <td><?php echo $r['nbr_calories']?></td>
                    <td><?php if($r['healthy']==1) echo 'Oui'; else echo 'Non'?></td>
                    <td><?php echo $r['notation']?>/5</td>
                    <td>
                        <div style="display: flex;justify-content: left">
                        <i onclick="remove(<?php echo $r['id']?>,this)" class="material-icons delete" >&#xe92b;</i>
                        <i class="material-icons edit" ><a href="../Routes/modifyRecetteRoute.php?id=<?php echo $r['id']?>" target="_blank">&#xe3c9</a></i>
                            <?php if ($r['valide']==0) {?>
                        <i class="material-icons" onclick="valider(<?php echo $r['id']?>,this)">&#xe876</i>
                <?php
                            }
                ?>
                        </div>
                    </td>

                </tr>
            <?php
        }?>
                </tbody>
            </table>
        </div>
        <?php

    }


}