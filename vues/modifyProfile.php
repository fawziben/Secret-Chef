<?php
require_once ('../Controllers/profilController.php');

class modifyProfile
{
    public function modifierProfil($id,$valide){
        $pc=new profilController();
        $userdata= $pc->getData($id);
        ?>
        <center>
        <head>
            <script src="../jQuery/jquery-3.6.0.js"></script>
            <script>
                function edituserdata(id){
                    let nom=document.getElementById('nom').innerText;
                    let prenom=document.getElementById('prenom').innerText;
                    let sexe=document.getElementById('sexe').value;
                    let date=document.getElementById('date').value;
                    let mail=document.getElementById('mail').innerText;
                    let password=document.getElementById('password').innerText;
                    $.ajax({
                        url:"../Controllers/ajaxModifyUser.php",
                        type:"GET",
                        data: {
                            id:id,
                            nom:nom,
                            prenom:prenom,
                            sexe:sexe,
                            date:date,
                            mail:mail,
                            password:password,
                        },
                        cache:false,
                        success: function (dataResult){
                        }
                    })
                }
                function validateuser(id){
                    $.ajax({
                        url:"../Controllers/ajaxValidateUser.php",
                        type:"GET",
                        data: {
                            id:id,
                        },
                        cache:false,
                        success: function (dataResult){
                            document.getElementById('validator').style.display='none';
                            alert('Utilisateur Valide');
                        }
                    })

                }
            </script>
        </head>
        <?php
        foreach ($userdata as $u){
            ?>
            <div class="container">
                <div class="card" style="width:400px">
                    <img class="card-img-top" src="../images/icones/img_avatar1.png" style="width:100%;height: 350px">
                    <div class="card-body">
                        <h6 class="card-title" style="text-align: left">Nom: <span id="nom" contenteditable="true"> <?php echo $u['nom']?></span></h6>
                        <hr>
                        <h6 class="card-title" style="text-align: left">Prenom: <span id="prenom" contenteditable="true"><?php echo $u['prenom']?></span></h6>
                        <hr>
                        <h6 class="card-title" style="text-align: left">Sexe: <span ><select id="sexe"><option selected disabled hidden><?php echo $u['sexe']?></option><option>Masculin</option><option>Feminin</option></select></span></h6>
                        <hr>
                        <h6 class="card-title" style="text-align: left">Date de Naissance: <span contenteditable="true"><input id="date" type="date" value="<?php echo $u['datenaissance']?>"></span></h6>
                        <hr>
                        <h6 class="card-title" style="text-align: left">Email: <span id="mail" contenteditable="true"><?php echo $u['mail']?></span></h6>
                        <hr>
                        <h6 class="card-title" style="text-align: left">Password: <span id="password" contenteditable="true"><?php echo $u['password']?></span></h6>
                        <hr>
                        <div>
                            <a class="btn btn-primary" onclick="edituserdata(<?php echo $id?>)">Modifier</a>
                            <?php if($u['valide']==0) {?>
                            <a id="validator" class="btn btn-primary" onclick="validateuser(<?php echo $id?>)">Valider</a>
                            <?php
                            }
                            ?>


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