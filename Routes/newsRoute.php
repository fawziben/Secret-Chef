<?php
require_once ('../Controllers/newsController.php');


$myNews= new newsController();
$myNews->showNews();
