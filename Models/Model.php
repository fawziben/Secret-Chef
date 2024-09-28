<?php

class Model
{

    public function connect()
    {
        try {
            $connection = new PDO('mysql:dbname=projetweb;localhost;charset=utf-8','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $Exception) {
            echo "Unable to connect to database.";
        }
        return $connection;
    }

    public function disconnect(&$connect)
    {
        $connect = null;
    }

}