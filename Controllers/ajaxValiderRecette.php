<?php

require_once('../Models/Validate.php');

$id = $_GET['id'];
$val = new Validate();
$res = $val->valider($id);

json_encode($res);
