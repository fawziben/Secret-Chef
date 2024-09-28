<?php

class Login
{
    public function showLogin(){
        ?>
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700' src=""><link rel="stylesheet" href="../CSS/style.css">
        <script src="../jQuery/jquery-3.6.0.js"></script>

        <script>
            function log(){
                let user= document.getElementById('email').value;
                let password= document.getElementById('password').value;
                $.ajax({
                    url:"../Controllers/ajaxLogin.php",
                    type:"POST",
                    data: {
                        user:user,
                        password: password,
                    },
                    cache:false,
                    success: function (dataResult){
                        if(dataResult=='false') alert("Cet utilisateur n'existe pas");
                        else {
                            window.location.href = "../Routes/acceuilRoute.php";
                        }
                    }
                    })


            }
        </script>


        <body>
        <img class="logo" src="../images/logo/finallogo.png" alt="Secretchef Logo">
        <div class="login-form">
            <h1>Authentification</h1>
            <div class="content">
                <div class="input-field">
                    <input id="email" type="email" placeholder="Email" autocomplete="nope">
                </div>
                <div class="input-field">
                    <input id="password" type="password" placeholder="Mot de passe" autocomplete="new-password">
                </div>
                <a href="../Routes/signInRoute.php" class="link">Creer un compte</a>
            </div>
            <div class="action">
                <button style="background-color:silver;" onclick="log()">Valider</button>
            </div>
        </div>
        </body>

        <?php
    }

}