<?php

class signIn
{
    public function showSignIn(){
        ?>
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700' src=""><link rel="stylesheet" href="../CSS/style.css">
        <script src="../jQuery/jquery-3.6.0.js"></script>

        <script>
            function creer(){
                let nom = document.getElementById('nom').value;
                let prenom = document.getElementById('prenom').value ;
                let date=document.getElementById('date').value;
                let sexe=document.getElementById('sexe').value;
                let email=document.getElementById('email').value;
                let password=document.getElementById('password').value;
                let confpassword=document.getElementById('confpassword').value;

                if(confpassword==password) {
                    $.ajax({
                        url: "../Controllers/ajaxSignIn.php",
                        type: "POST",
                        data: {
                            nom: nom,
                            prenom: prenom,
                            date: date,
                            sexe: sexe,
                            email: email,
                            password: password,
                        },
                        cache: false,
                        success: function (dataResult) {
                            if(dataResult=='false'){
                                alert('Un compte avec le meme Email existe deja')
                            }
                            else {
                                alert('Votre compte a ete cree avec succes');
                                window.location.href = "../Routes/loginRoute.php";
                            }
                        }
                    })
                }
                else {
                    alert('Veuiller saisir a nouveau le mot de passe');
                }
            }
        </script>


        <body>
        <img class="logo" src="../images/logo/finallogo.png" alt="Secretchef Logo">
        <div class="login-form">
            <h1>Creation de compte</h1>
            <div class="content">
                <div class="input-field">
                    <input id="nom" type="text" placeholder="Nom" autocomplete="nope">
                </div>
                <div class="input-field">
                    <input id="prenom" type="text" placeholder="Prenom" autocomplete="nope">
                </div>
                <div class="input-field">
                    <input placeholder="Date de naissance" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                </div>
                <div class="input-field">
                    <select id='sexe' class="form-select" required>
                        <option selected disabled hidden>Sexe</option>
                        <option>Masculin</option>
                        <option>Feminin</option>
                    </select>
                </div>
                <div class="input-field">
                    <input id="email" type="email" placeholder="Email" autocomplete="nope">
                </div>
                <div class="input-field">
                    <input id="password" type="password" placeholder="Mot de passe" autocomplete="new-password">
                </div>
                <div class="input-field">
                    <input id="confpassword" type="password" placeholder="Confirmer le mot de passe" autocomplete="new-password">
                </div>

            </div>
            <div class="action">
                <button style="background-color:silver;" onclick="creer()">Creer</button>
            </div>
        </div>
        </body>

        <?php
    }

}