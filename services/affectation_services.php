<?php
include_once 'affectation_dao.php';
include_once 'courrierES-dao.php';


function getAllAffectation_services(){
    $data_affec=getAllAffectation();
    foreach ($data_affec  as $id=>$val){
        if($id=='id_courrier') {
            $data_affec[$id] = getCEById_dao($val);
        }

    }
 return $data_affec;
}

$data_all_affetat=getAllAffectation_services();

echo $data_all_affetat['id_affectation'];

foreach ($data_all_affetat  as $key=>$val){
    $id=$key[0][$val];
    echo $id."";
    echo '<br>';
  //  print_r( $raw['id_courrier']);


}

