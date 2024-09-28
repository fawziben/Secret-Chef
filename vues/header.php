<?php

class header
{
    public function showHeader(){
        session_start();
        ?>
        <head>
            <script>
                function test(){
                    window.location.href = "../Routes/profileRoutes.php";
                }
            </script>
        </head>
        <div class="myheader">
            <div class="logo">
                <img src="../images/logo/finallogo.png">
            </div>
            <div class="social-media-icons">
                <ul>
        <?php
        if ( $_SESSION != null){
            ?>
                    <li><img src="../images/icones/img_avatar1.png" style="border-radius: 100%" onclick="test()"></li>
            <?php
        }
            ?>
                    <li><img src="../images/socialmedia/facebook.png" ></li>
                    <li><img src="../images/socialmedia/insta.png" ></li>
                    <li><img src="../images/socialmedia/twitter.png" ></li>
                    <li><img onclick="" src="../images/socialmedia/whatsapp.png"></li>
                </ul>
            </div>
        </div>
<?php
    }

}