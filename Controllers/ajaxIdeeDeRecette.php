<?php
require_once('../Models/ideeDeRecette.php');
require_once('../Models/getRecetteModel.php');


$data=[];
$grm=new getRecetteModel();
$data=$_GET['data'];
$idr=new ideeDeRecette();
$dbresult=$idr->searchRecipee();
$finalresult=[];
$index=0;
$nbr=count($data);


foreach ($dbresult as $result){
    $cpt=0;
    for ($i=0;$i<count($data);$i++){
        if(preg_match("/{$data[$i]}/i",$result['noms'])) {
            $cpt++;
        }

        }
    if(($cpt/$nbr)>0.7)
    {
        $rs=$grm->getRecetteById($result['id_recette']);
        foreach ($rs as $r) {
            $finalresult[$index] = $r;
        }
        $index++;
    }
}


echo json_encode($finalresult);

