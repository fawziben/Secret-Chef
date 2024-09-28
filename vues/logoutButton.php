<?php

class logoutButton
{
    public function showLogout(){
        ?>
        <head>

            <script src="../jQuery/jquery-3.6.0.js"></script>

            <script>
                function logout() {
                $.ajax({
                    url:"../Controllers/ajaxlogout.php",
                    type:"GET",
                    data: {
                    },
                    cache:false,
                    success: function (dataResult){
                            window.location.href = "../Routes/acceuilRoute.php";
                        }
                })
                }
            </script>
        </head>
        <center><button id="login-btn" style="margin-bottom: 30px;" class="btn btn-primary" onclick="logout()">Se deconnecter</button></center>
        <?php
    }

}