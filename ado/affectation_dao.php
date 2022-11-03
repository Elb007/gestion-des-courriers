<?php
include_once 'database.php';

//

function insertAffectation_dao($id_courrier,$service,$personne,$instructions){
    $queryInsert = "INSERT 
                    INTO affectation(id_courrier,service,personne,instructions) 
                    VALUES(:idcourrier,:service,:personne,:instructions);";

    $bdd=getConnectDB();
    $statement = $bdd->prepare($queryInsert);
    $statement->bindParam(':idcourrier', $id_courrier, PDO::PARAM_INT);
    $statement->bindParam(':service', $service, PDO::PARAM_STR);
    $statement->bindParam(':personne', $personne, PDO::PARAM_STR);
    $statement->bindParam(':instructions', $instructions, PDO::PARAM_STR);
    $statement->execute();
    $statement->fetch(PDO::FETCH_ASSOC);

}

function updateAffectation_dao($id_affectation,$id_courrier,$service,$personne,$instructions)
{
    $queryUpdate = "UPDATE affectation SET id_courrier=:idcourrier,service=:service,personne=:personne,instructions=:instructions WHERE id_affectation =:idaffectation";
    $bdd=getConnectDB();
    $statement = $bdd->prepare($queryUpdate);
    $statement->bindParam(':idcourrier', $id_courrier, PDO::PARAM_INT);
    $statement->bindParam(':service', $service, PDO::PARAM_STR);
    $statement->bindParam(':personne', $personne, PDO::PARAM_STR);
    $statement->bindParam(':instructions', $instructions, PDO::PARAM_STR);
    $statement->bindParam(':idaffectation', $id_affectation, PDO::PARAM_INT);
    $statement->execute();
}

function deleteAffectation_dao($id){
    $queryDelete = "DELETE FROM affectation WHERE id_affectation=:id";
    $bdd=getConnectDB();
    $statement = $bdd->prepare($queryDelete);
    $statement->bindParam(":id",$id,PDO::PARAM_INT);
    $statement->execute();
}

function getAllAffectation(){
    $bdd=getConnectDB();
    $reponse = $bdd->query('SELECT * FROM affectation');// a completer
    if ($donnees = $reponse->fetch())
        return $donnees;
    return null;
    $reponse->closeCursor();
}
/*
function getAffectationById_dao($id){
    $bdd=getConnectDB();
    $reponse = $bdd->query('SELECT * FROM courrier where id='.$id);// a completer
    if ($donnees = $reponse->fetch())
        return $donnees;
    return null;
    $reponse->closeCursor();
}




$rows=getAllAffectation();
foreach ($rows  as $row=>$key){
    echo $row ." ".$key;}
*/
