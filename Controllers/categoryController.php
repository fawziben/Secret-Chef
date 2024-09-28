<?php
require_once('../Models/getCategoryModel.php');
require_once('../Models/getHealthyModel.php');
require_once('../Models/getNewsModel.php');

class categoryController
{
   public function recette($category){
       $mesPlats=new getCategoryModel();
       $result=$mesPlats->getCategory($category);
       return $result;
   }

    public function all(){
        $mesPlats=new getCategoryModel();
        $result=$mesPlats->getAll();
        return $result;
    }

   public function news(){
       $news=new getNewsModel();
       $result= $news->getNews();
       return $result;
   }

    public function healthy(){
        $healthy=new getHealthyModel();
        $result= $healthy->getHealthy();
        return $result;
    }

    public function fetes($fetes){
        $mesPlats=new getCategoryModel();
        $result=$mesPlats->getfetes($fetes);
        return $result;
    }

}