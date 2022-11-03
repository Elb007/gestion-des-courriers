<?php
ob_start();
include_once 'action.php';
require 'header.php';
if (!isset($_SESSION['id'])) {
    header('location: login.php');
} elseif ($_SESSION['username'] == 'directeur') {
    header('location: index.php');
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
</head>

<body style=" margin-top: 100px;">
    <!-- DISPLAY ERROR MESSAGES -->
    
    <div class="container bg-light pt-2">
        <div class="col-md-10 offset-md-1 ">
            <br> <br>
            <h3 class="text-center">Gestion des Courriers Entrants/Sortants</h3>
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
            </div>
            </form>
        </div>
    </div>
    <hr>
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