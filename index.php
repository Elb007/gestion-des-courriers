<?php
ob_start();
include_once 'action.php';

require 'header.php';
if (!isset($_SESSION['id'])) {
    header('location: login.php');
     } 
      
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des courriers</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
     
     <!--Sending email Notification-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="css/style3.css">
</head>
<body style=" margin-top: 100px; background-color: rgba(179, 174, 162, 0.7);" >
    <!-- DISPLAY ERROR MESSAGES -->
    <?php
   /* if(isset($_SESSION['addCourrier'])){
        echo'
        <script>
            window.onload = ()=>{ Swal.fire("Courrier ajouté!","","success") }
        </script>';
        unset($_SESSION['addCourrier']);
    }

        if(isset($_SESSION['deleteCourrier'])){
            echo'
                <script>
                    window.onload = ()=>{ Swal.fire("Courrier supprimé!","","error") }
                </script>';
            unset($_SESSION['deleteCourrier']);
        }

        if(isset($_SESSION['editCourrier'])){
            echo'
            <script>
                window.onload = ()=>{ Swal.fire("Courrier modifié!","","success") }
            </script>';
            unset($_SESSION['editCourrier']);
        }*/
    ?>

    <div class="col-md-10 offset-md-1" > 
       <br> 
         <div>  
          <form action="New Courrier.php" method="POST" >
              <button  type="submit"  name="New" id="nouveau" class="btn btn-outline-dark "  >
                    <i class="fa fa-edit "></i>Créer un Nouveau Courrier 
               </button> 
            </form> 
          </div> 
             <br>
          
            <form action="export.php" method="POST" style=" width: 6cm">
              <label > Choisi le format à Exporter : </label>
                 <select  name="export_file_type" class="form-control" >
                    <option value="xlsx" >XLSX</option>
                    <option value="xls" >XLS</option>
                 </select>   
                   <button type="submit" name="export" class="btn btn-outline-info mt-2" value="Export">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>  Exporter les Courrier en Excel</button>
         
              </form> 
              
              </div> 
               

           
            <!-- <div><form  action="modify"  method="POST" > 
            <button  type="submit"  name="New" id="nouveau" class="btn btn-info form-data"  >
                   Editer Courrier 
                  <a class="modifC btn text-primary modif" id="modif" onclick="enableButton(); topFunction();" style="cursor: pointer;"><i class="fa fa-edit" style="font-size:22px"></i></a> </button> 
                 </form></div><br>
 -->
    </div>

    <div  class="col-md-10 " style="font-family: initial;" >
        <h1 style= "margin-left:10 cm; text-align: center;color: rgba(114, 25, 204, 0.84);">  Gestion des Courriers  </h1>
         <h2 style= "margin-left: auto; text-align: center; color: rgba(35, 153, 76, 0.82);">  <b> BUREAU D'ORDRE</b></h2> </div>
 
 </div>
    
    <div class="container bootstrap pt-2  background-color: rgba(179, 174, 162, 0.7);">

        <div class="col-md-10 offset-md-1 ">
            <br> <br>
            <h3 class="text-center" >Courriers Entrants/Sortants</h3>
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
                        <textarea name="objet" id="objet" class="form-control" required rows="1"></textarea>
                    </div>
                    <div class="col-md-12 pb-1">
                        <label> Ajout des pièces jointes : <span class="text-danger">*</span></label>
                        <input type="file" name="contenu" id="contenu" class=" btn btn-light form-control" />
                             <span style="border:none;"id="fiche" class="form-control bg-light"></span>
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
                        <textarea name="observation" id="observation" class="form-control" rows="1"></textarea>
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
                      </form>
                       </div>
                 </div>
             </div>

           <div class="col-md-3  mx-auto text-center pb-1"> 
                         <form method="submit" action="form.html"> 
                            <button  name="confirmer" id="nouveau" class="btn btn-outline-dark rounded-pill"> Confirmation d'ajout</button> 
                        </form></div> 
                        
     <!-- 
           <div><form Action="export.php" ; method="post">     
                        <button  id="dataExport" name="Export" value="export"  class="btn btn-info">Export en excel
                          </button>
                  </form> </div> 

   <div class="well-sm col-sm-12">
                <div >
                    <form action="export.php" method="post" >   
                       <button type="submit" class="btn btn-outline-info form-control rounded-pill">Exporter les Courriers en EXCEL</button> 
                   </form>
               </div>
    </div> --> 
 

    <!--tableau des courriers-->
  
  <table class="table table-hover table-bordered table-responsive"  id="myTable">
            <thead>
                <tr class="bg-dark text-center text-white" style="font-size: 12px">
                    <th>ID</th>
                    <th>Référence Expéditeur</th>
                    <th>Référence</th>
                    <th>Objet</th>
                    <th>Contenu</th>
                    <th>Date de reception</th>
                    <th>Date d'ajout</th>
                    <th>Expéditeur / Destinataire</th>
                    <th>Sous-Expéditeur</th>
                    <th>Nature</th>
                    <th>Type</th> 
                    <th style="background: fixed;">Modification</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "select * from courrier";
                $bdd = getConnectDB();
                $rows = $bdd->query($query);
                foreach ($rows as $k) {
                ?>
                    <tr class="text-center ">
                        <td><?php echo $k['id'] ?></td>
                        <td><?php echo $k['refExp'] ?></td>
                        <td><?php echo $k['ref'] ?></td>
                        <td><?php echo $k['objet'] ?></td>
                        <td> <a href="<?php echo $k['contenu'] ?>" target="_blank"><img src="images/file-logo.png" width="25" height="28"></br>Voir le fichier</a></td>
                        <td><?php echo $k['daterecu'] ?></td>
                        <td><?php echo $k['dateajout'] ?></td>
                        <td><?php echo $k['expediteur'] ?></td>
                        <td><?php echo $k['souExpediteur'] ?></td>
                        <td><?php echo $k['nature'] ?></td>
                        <td><?php echo $k['typeCourrier'] ?></td>
                        
                        <td style="font-size: 20px;width: 6%;">
                            <a class="modifC btn text-primary modif" id="modify" onclick="enableButton(); topFunction();" style="cursor: pointer;" ><i class="fa fa-edit" style="font-size:22px"></i>éditer</a>
                            <a href="action.php?delete=<?php echo $k['id'] ?>" onclick="return confirm('Vous-êtes sûr?');" class="btn text-danger"><i class="fa fa-trash" style="font-size:22px"></i>Supr</a>
                        </td>
                    </tr>
       
                <?php
                }
                ?>
            </tbody> 
          
        </table>
   
    <!-- <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form> -->
    
        <script type="text/javascript">
            jQuery(function() {
                jQuery('#myTable').DataTable({
                    "language": {
                        "lengthMenu": "Afficher _MENU_ enregistrements par page",
                        "zeroRecords": " Oups ! Rien n'a été trouvé",
                        "info": "Page _PAGE_ de _PAGES_",
                        "infoEmpty": "Aucun enregistrement disponible",
                        "infoFiltered": "(Filtrer à partir de _MAX_ enregistrements)",
                        search: "Rechercher Courrier : ",
                        "paginate": {
                            "previous": "Précédent",
                            "next": "Suivant"
                        }
                    }
                });
            });
        </script>
    </div>


                   
                   
    <script>
        //Enable edit button
        function enableButton() {
            let buttonModifier = document.getElementById("modify");
            let buttonAjouter = document.getElementById("submit");
            buttonModifier.removeAttribute("disabled");
            buttonModifier.classList.remove("btn-outline-info");
            buttonModifier.classList.add("btn-info");
            buttonAjouter.setAttribute("disabled", "true");
        }

        // check if date greater than today's date
        function checkDate() {
            let currentDate = new Date();
            let dateRecu = new Date(document.getElementById("dtajout").value);
            let dateAjout = new Date(document.getElementById("dtrecu").value);

            if (dateRecu.getTime() > currentDate.getTime() || dateAjout.getTime() > currentDate.getTime()) {
                alert("Entrer une date valide!");
            }
        }

        //les extensions acquis
        $(function() {
            $('input[type=file]').change(function() {
                var val = $(this).val().toLowerCase(),
                    regex = new RegExp("(.*?)\.(xls|docx|doc|pdf|jpg|png|txt)$");

                if (!(regex.test(val))) {
                    $(this).val('');
                    alert('Veuillez selectionner un fichier des formats suivantes : xls ,docx, doc, pdf, jpg, png, txt');
                }
            });
        });
    </script>

    <script src="javascript/enable.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="javascript/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!--sweetAlert-->
    <script src="sweetalert/sweetalert2.all.min.js"></script>

      


    <!-- show success message after any operations -->
    <?php
    if (isset($_SESSION['message']) && $_SESSION['message'] != "") {
    ?>
        <script>
            Swal.fire("<?php echo $_SESSION['message'] ?>", "", "success")
        </script>
    <?php
        unset($_SESSION['message']);
    }
    ?>

</body>

</html>

<?php
require_once 'footer.php';
?>