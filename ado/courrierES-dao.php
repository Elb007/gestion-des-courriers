<?php
include_once 'database.php';



//$id=$refExp,$ref,$objet,$fileDesti,$daterecu,$dateajout,$expediteur,$souExpediteur,$naturecourrier,$typeCourrier,$motscle,$observation="";


function insertCE_dao($refexp,$ref,$objet,$fileDesti,$dtrecu,$dtajout,$expediteur,$sexpediteur,$naturecourrier,$typecourrier,$motscle,$observation){
    $queryInsert = "INSERT 
                    INTO courrier(refExp,ref,objet,contenu,daterecu,dateajout,expediteur,souExpediteur,nature,typeCourrier,motscle,observation) 
                    VALUES(:refexp,:ref,:objet,:fileDesti,:dtrecu,:dtajout,:expediteur,:souExpediteur,:nature,:typecour,:motscle,:observation);";

    $bdd=getConnectDB();
    $statement = $bdd->prepare($queryInsert);
    $statement->bindParam(':refexp', $refexp, PDO::PARAM_STR);
    $statement->bindParam(':ref', $ref, PDO::PARAM_STR);
    $statement->bindParam(':objet', $objet, PDO::PARAM_STR);
    $statement->bindParam(':fileDesti', $fileDesti, PDO::PARAM_STR);
    $statement->bindParam(':dtrecu', $dtrecu, PDO::PARAM_STR);
    $statement->bindParam(':dtajout', $dtajout, PDO::PARAM_STR);
    $statement->bindParam(':expediteur', $expediteur, PDO::PARAM_STR);
    $statement->bindParam(':souExpediteur', $sexpediteur, PDO::PARAM_STR);
    $statement->bindParam(':nature', $naturecourrier, PDO::PARAM_STR);
    $statement->bindParam(':typecour', $typecourrier, PDO::PARAM_STR);
    $statement->bindParam(':motscle', $motscle, PDO::PARAM_STR);
    $statement->bindParam(':observation', $observation, PDO::PARAM_STR);
    $statement->execute();

}

function updateCE_dao($id,$refExp,$ref,$objet,$fileDesti,$dtrecu,$dtajout,$expediteur,$sexpediteur,$naturecourrier,$typecourrier,$motscle,$observation)
{
    $queryUpdate = "UPDATE courrier SET refExp=:refexp,ref=:ref,objet=:objet,contenu=:fileDesti,daterecu=:dtrecu,dateajout=:dtajout,
                    expediteur=:expediteur,souExpediteur=:souExpediteur,nature=:nature,typeCourrier=:typecourr,motscle=:motscle,observation=:observation WHERE id =:idcourrier";
    $bdd=getConnectDB();
    $statement = $bdd->prepare($queryUpdate);
    $statement->bindParam(':refexp', $refExp, PDO::PARAM_STR);
    $statement->bindParam(':ref', $ref, PDO::PARAM_STR);
    $statement->bindParam(':objet', $objet, PDO::PARAM_STR);
    $statement->bindParam(':fileDesti', $fileDesti, PDO::PARAM_STR);
    $statement->bindParam(':dtrecu', $dtrecu, PDO::PARAM_STR);
    $statement->bindParam(':dtajout', $dtajout, PDO::PARAM_STR);
    $statement->bindParam(':expediteur', $expediteur, PDO::PARAM_STR);
    $statement->bindParam(':souExpediteur', $sexpediteur, PDO::PARAM_STR);
    $statement->bindParam(':nature', $naturecourrier, PDO::PARAM_STR);
    $statement->bindParam(':typecourr', $typecourrier, PDO::PARAM_STR);
    $statement->bindParam(':motscle', $motscle, PDO::PARAM_STR);
    $statement->bindParam(':observation', $observation, PDO::PARAM_STR);
    $statement->bindParam(':idcourrier', $id, PDO::PARAM_INT);
    $statement->execute();
}

function deleteCE_dao($id){
    $queryDelete = "DELETE FROM courrier WHERE id=:id";
    $bdd=getConnectDB();
    $statement = $bdd->prepare($queryDelete);
    $statement->bindParam(":id",$id,PDO::PARAM_INT);
    $statement->execute();
}

function getAllCE(){
    $bdd=getConnectDB();
    $reponse = $bdd->query('SELECT * FROM courrier');// a completer
    if ($donnees = $reponse->fetch())
        return $donnees;
    return null;
    $reponse->closeCursor();
}
function getCEById_dao($id){
     $bdd=getConnectDB();
     $reponse = $bdd->query('SELECT * FROM courrier where id='.$id);// a completer
     if ($donnees = $reponse->fetch())
         return $donnees;
     return null;
     $reponse->closeCursor();
}

/*
$rows=getAllCE();
foreach ($rows  as $row=>$key){
    echo $row ." ".$key;
}
*/