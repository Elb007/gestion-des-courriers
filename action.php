<?php
include 'ado/courrierES-dao.php';
include 'ado/affectation_dao.php';
include_once 'ado/uploadFile.php';
//ob_start();

$refexp = $objet = $ref = $contenu = $dtrecu = $dtajout = $expediteur = $sexpediteur = $naturecourrier = $typecourrier = $motscle = $observation = "";
$id = 0;

//a function to store the success message in a session to display it in the index page
function storeSuccessMessageInSession($message){
    session_start();
    $_SESSION['message'] = $message;
}

//Insert courrier
if (isset($_POST['submit'])) {

    $objet = $_POST["objet"];
    $refexp = $_POST["refexp"];
    $ref = $_POST['ref'];
    $dtrecu = $_POST["dtrecu"];
    $dtajout = $_POST['dtajout'];
    $expediteur = $_POST["expediteur"];
    $sexpediteur = $_POST['sexpediteur'];
    $naturecourrier = $_POST["naturecourrier"];
    $typecourrier = $_POST["typecourrier"];
    $motscle = $_POST['motscle'];
    $observation = $_POST['observation'];
    $fileDesti = uploadFile();// upload file script
    // insert script
    insertCE_dao($refexp, $ref, $objet, $fileDesti, $dtrecu, $dtajout, $expediteur, $sexpediteur, $naturecourrier, $typecourrier, $motscle, $observation);
    //call function
    storeSuccessMessageInSession("Courrier ajouté!");
    header('location: index.php');
}

//Delete courrier
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    //supp script
    deleteCE_dao($id);
    //call function
    storeSuccessMessageInSession("Courrier supprimé!");
    header('location: index.php');
}

//Update courrier
if (isset($_POST['modify'])) {
    $id = $_POST['idCourrier'];
    $objet = $_POST["objet"];
    $refExp = $_POST['refexp'];
    $ref = $_POST["ref"];
    $contenu = $_POST['contenu'];
    $dtrecu = $_POST['dtrecu'];
    $dtajout = $_POST["dtajout"];
    $expediteur = $_POST['expediteur'];
    $sexpediteur = $_POST["sexpediteur"];
    $naturecourrier = $_POST['naturecourrier'];
    $typecourrier = $_POST["typecourrier"];
    $motscle = $_POST['motscle'];
    $observation = $_POST['observation'];
    $fileDesti = uploadFile();// upload file script
    //update script
    updateCE_dao($id, $refExp, $ref, $objet, $fileDesti, $dtrecu, $dtajout, $expediteur, $sexpediteur, $naturecourrier, $typecourrier, $motscle, $observation);
    //call function
    storeSuccessMessageInSession("Courrier modifié!");
    header('location: index.php');
}

//insert courrier affecter
if (isset($_POST['confirmer'])) {


    $id_courrier = $_POST['id_courrier'];
    $service = $_POST['services'];
    $personne = $_POST['personnes'];
    $instructions = $_POST['instructions'];
    //insert script
    insertAffectation_dao($id_courrier, $service, $personne, $instructions);
    //call function
    storeSuccessMessageInSession("Courrier affecté!");
    header('location: affectation.php');
    exit();
}


//Delete courrier affecté
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    //delete script
    deleteAffectation_dao($id);
    //call function
    storeSuccessMessageInSession("Courrier supprimé!");
    header('location: affectation.php');
}
//update courrier affecté
if (isset($_POST['modifier'])) {
    $id_affectation = $_POST['id-affect'];
    $id_courrier = $_POST['id_courrier'];
    $service = $_POST['services'];
    $personne = $_POST['personnes'];
    $instructions = $_POST['instructions'];
    //update script
    updateAffectation_dao($id_affectation, $id_courrier, $service, $personne, $instructions);
    //call function
    storeSuccessMessageInSession("Courrier modifié!");
    header('location: affectation.php');
}