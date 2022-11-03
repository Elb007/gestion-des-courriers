<?php
ob_start();
include_once 'action.php';
require 'header.php';
include_once 'ado/database.php';


if (!isset($_SESSION['id'])) {
    header('location: login.php');
} elseif ($_SESSION['username'] == 'directeur') {
    header('location: affectation.php');

}
echo 'Hello'

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listes des Courrriers</title>
</head>
<body>
 <div class="container bg-light pt-2">

        <div class="col-md-10 offset-md-1 ">
            <br> <br>
            <h3 class="text-center">Gestion des courriers Entrants/Sortants</h3>
            <!-- form complex example -->
            <form action="action.php" method="post" id="myForm" enctype="multipart/form-data">
                <input type="text" name="idCourrier" id="idCourrier" class="form-control" value="" hidden>
                <div class="form-row mt-4">
                    <div class="col-md-4 pb-1">
                        <label>Type du courrier : <span class="text-danger">*</span></label>
                        <select name="typecourrier" id="typecourrier" onchange="typeCourrier();" class="form-control" required>
                            <option value="Entrant">Entrant</option>
                            <option value="Sortant">Sortant</option>
                        </select>
                    </div>
                    <div class="col-md-4 pb-1">
                        <label>Référence expéditeur :</label>
                        <input type="text" name="refexp" id="refexp" value="" class="form-control" required>
                    </div>
                    <div class="col-md-4 pb-1">
                        <label>Référence : <span class="text-danger">*</span></label>
                        <input type="text" name="ref" id="ref" class="form-control" value="" required>
                    </div>
                    <div class="col-md-12 pb-1">
                        <label>Objet : <span class="text-danger">*</span></label>
                        <textarea name="objet" id="objet" class="form-control" required rows="2"></textarea>
                    </div>
                    <div class="col-md-12 pb-1">
                        <label>Contenu : <span class="text-danger">*</span></label>
                        <input type="file" name="contenu" id="contenu" class=" btn btn-light form-control" /><span style="border:none;" id="fiche" class="form-control bg-light"></span>
                    </div>
                 
                    <div class="col-md-3 pb-1 ">
                        <label>Reçu le : <span class="text-danger">*</span></label><br>
                        <input type="date" name="dtrecu" id="dtrecu" class="form-control" onchange="checkDate()" required>
                    </div>
                    <div class="col-md-3 pb-1">
                        <label>Ajouter le : <span class="text-danger">*</span></label>
                        <input type="date" name="dtajout" id="dtajout" class="form-control" onchange="checkDate()" required>
                    </div>
                    <div class="col-md-3 pb-1">
                        <label>Expéditeur/Destinataire<span class="text-danger">*</span></label>
                        <input list="listexpediteur" type="text" name="expediteur" id="expediteur" class="form-control" value="" />
                        <datalist id="listexpediteur" class="bg-light">

                        </datalist>
                    </div>
                    <div class="col-md-3 pb-1">
                        <label>Sous-Expéditeur/Destinataire</label>
                        <input list="listsexpediteur" type="text" name="sexpediteur" id="sexpediteur" class="form-control" value="" />
                        <datalist id="listsexpediteur" class="bg-light">

                        </datalist>
                    </div>
                    <div class="col-md-6 pb-1">
                        <label>Nature : <span class="text-danger">*</span></label>
                        <select name="naturecourrier" id="nature" class="form-control" required>
                            <option value="Personnelle">Personnelle</option>
                            <option value="Administrative" selected>Administrative</option>
                            <option value="Professionnelle">Professionnelle</option>
                        </select>
                    </div>
                    <div class="col-md-6 pb-1">
                        <label>Mots-clés : <span class="text-danger">* (Séparer les mots clés avec un point virgule)</span></label>
                        <input type="text" name="motscle" id="motscle" class="form-control" placeholder="exemple; exemple..." value="" required>
                    </div>
                    <div class="col-md-12 pb-4">
                        <label>Observation : <span class="text-danger">*</span></label>
                        <textarea name="observation" id="observation" class="form-control" rows="2"></textarea>
                    </div>

                    <div class="col-md-3 col-lg-2 col-sm-4 mx-auto text-center pb-4">
                        <button type="submit" name="submit" id="submit" class="btn btn-outline-dark form-control rounded-pill">
                            <i class="fa fa-plus-circle" style="margin-right: 3px"></i> Ajouter
                        </button>
                    </div>
                       
                    <div class="col-md-3 col-lg-2 col-sm-4  mx-auto text-center pb-4">
                        <button type="submit" name="modify" id="modify" class="btn btn-outline-info form-control rounded-pill" disabled>
                            <i class="fa fa-edit" style="margin-right: 3px"></i> Modifier
                        </button>
               
              
                </div>
             <br>         
            </div>
            </form>

        </div><br>             
            <div> <div class="col-md-3 col-lg-2 col-sm-4  mx-auto text-center pb-4">
                       <button type="submit" name="notify" id="notify" class="btn btn-outline-dark form-control rounded-pill" >
                            <i class="edge " style="margin-right: 3px"></i>
                              <a href="notify.html"></a>      
                         
                        Notifier </button> 
                </div>
      <button class="btn btn-outline-dark form-control rounded-pill" onclick="document.getElementById('demo').innerHTML=document('location: ###.php')">redirect vers Les courriers </button>
     
      <p id="demo"></p>
</div> 
</body>
</html>