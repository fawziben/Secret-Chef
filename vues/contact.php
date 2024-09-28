<?php

class contact
{
    public function showContact(){
        ?>
        <head>
           <style>
               .form-group{
                   margin-right: 50px;
               }
                .niveau1 {
                    display: flex;
                    justify-content: center;
                    margin-top:20px
                }
                .niveau2{
                    display: flex;
                }

                .niveau2>img{
                    width: 30px;
                    height: 30px;
                    margin-right: 5px;
                }
                .niveau2>div{
                    margin-right: 50px
                }
                .contactsection{
                    background-color: #d7a6b3;
                    padding-top: 20px;
                }

            </style>
        </head>


<div class="contactsection">
        <center><h3 >Contact</h3></center>
        <div class="niveau1">
        <div class="niveau2">
            <img src="../images/icones/phone.png">
            <div>0775937796</div>
        </div>
        <div class="niveau2">
            <img src="../images/icones/adresse.png">
            <div>Oued Smar Alger</div>
        </div>
        <div class="niveau2">
            <img src="../images/icones/email.png">
            <div>SecretChef@gmail.com</div>
        </div>
        </div>

<div style="display: flex;margin-top: 35px;padding-bottom:35px;justify-content: center">
        <div class="form-group">
            <input type="email" placeholder="Votre Email" class="form-control" id="note">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Objet du message">
        </div>
    <div class="form-group">
        <input type="textarea" class="form-control" placeholder="Message">
    </div>
    <button class="btn btn-primary" onclick="search()">Envoyer</button>


</div>
</div>
<?php
    }

}