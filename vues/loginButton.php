<?php

class loginButton
{
    public function showButton(){
        ?>
        <head>
            <script>
                function login(){
                    window.location.href = "../Routes/loginRoute.php";
                }
            </script>
        </head>
        <center><button id="login-btn" style="margin-bottom: 30px;" class="btn btn-primary" onclick="login()">S'authentifier</button></center>
        <?php
    }

}