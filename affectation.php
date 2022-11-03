<?php
ob_start();
include 'action.php';
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <title>Affectation des Courriers</title>
</head>
<body style="margin-top: 100px">

<!-- Modal -->
<form action="affectation.php" method="post" class="mb-5">
<div class="modal fade" id="affectercourrier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Affecter aux:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-label-group ">
                    <label for="">ID courrier:</label>
                    <input type="text" id="courrier" class="form-control" name="id_courrier" readonly>
                    <label for="">Services:</label>
                    <select name="services"  class="form-control">
                        <?php
                        $query = "select * from services";
                        $rows = $bdd->query($query);
                        foreach ($rows as $k ) {
                                echo "<option value='" . $k['libelle'] . "'>" . $k['libelle'] . "</option>";
                            }
                            echo "</select>";
                        ?>
                    </select>
                </div>
                <div class="form-label-group">
                    <label for="">Personnes:</label>
                    <select name="personnes" class="form-control">
                        <?php
                        $query = "select * from personnes";
                        $rows = $bdd->query($query);
                        foreach ($rows as $k )  {
                                echo "<option value='" . $k['nom'] . "'>" . $k['nom'] . "</option>";
                            }
                            echo "</select>";
                        ?>
                    </select>
                </div>
                <div class="form-label-group">
                    <label for="">Instructions:</label>
                    <textarea name="instructions" id="instructionsaf" class="form-control" cols="30" rows="2"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary rounded-pill" data-dismiss="modal" id="frm">Fermer</button>
                <form action="action.php" method="post">
         <button type="submit" name="confirmer"  class="btn btn-sm btn-primary rounded-pill conf" id="btnConf">Confimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
</form>
<!--tableau-->
<div class="container-fluid mt-5">
    <h4 class="">Tous les courriers: </h4>
        <table class="table table-hover table-bordered table-responsive w-100" id="myTable">
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
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="myTable">
        <?php
        $query = "select * from courrier";
        $rows = $bdd->query($query);
        foreach ($rows as $k ) {
        ?>
        <tr class="text-center bg-light">
            <td><?php echo $k['id'] ?></td>
            <td><?php echo $k['refExp'] ?></td>
            <td><?php echo $k['ref'] ?></td>
            <td><?php echo $k['objet'] ?></td>
            <td> <a href="<?php echo $k['contenu'] ?>" target="_blank"><img src="images/file-logo.png" width="25" height="28"><br>Voir le fichier</a></td>
            <td><?php echo $k['daterecu'] ?></td>
            <td><?php echo $k['dateajout'] ?></td>
            <td><?php echo $k['expediteur'] ?></td>
            <td><?php echo $k['souExpediteur'] ?></td>
            <td><?php echo $k['nature'] ?></td>
            <td><?php echo $k['typeCourrier'] ?></td>
           
                    <td><!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-info rounded-pill affect" data-toggle="modal" data-target="#affectercourrier">
                            Affecter
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        </table>
        <script type="text/javascript">
            jQuery( function () {
                jQuery('#myTable').DataTable(
                    {
                        "language": {
                            "lengthMenu": "Afficher _MENU_ enregistrements par page",
                            "zeroRecords": " Oups ! Rien n'a été trouvé",
                            "info": "Page _PAGE_ de _PAGES_",
                            "infoEmpty": "Aucun enregistrement disponible",
                            "infoFiltered": "(Filtrer à partir de _MAX_ enregistrements)",
                            search: "Rechercher: ",
                            "paginate": {
                                "previous": "Précédent",
                                "next":"Suivant"
                            }
                        }
                    }
                );
            });
        </script>
</div>


<div class="container-fluid table-bordered mt-5">
    <h4 class="">Courriers afféctés: </h4>
    <form action="affectation.php" method="post">
        <table class="table table-responsive table-hover table-bordered"  id="table">
            <thead>
            <tr style="font-size: 12px" class="bg-dark text-light text-center">
                <th>ID Affectation</th>
                <th>ID Courrier</th>
                <th>Services</th>
                <th>Personnes</th>
                <th>Intsructions</th>
                <th>Etat</th>
                <th>MàJ</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = "select * from affectation";
            $rows = $bdd->query($query);
            foreach ($rows as $k) {
            ?>
                <tr class="text-center bg-light">
                    <td style="width: 15%"><?php echo $k['id_affectation'] ; ?></td>
                    <td style="width: 15%"><?php echo $k['id_courrier'] ; ?></td>
                    <td style="width: 15%"><?php echo $k['service'] ; ?></td>
                    <td style="width: 15%"><?php echo $k['personne'] ; ?></td>
                    <td style="width: 20%"><?php echo $k['instructions'] ; ?></td>
                    <td class="text-success font-weight-bold">Courrier affécté</td>
                    <td>
                        <a class="modifCour badge text-primary"data-toggle="modal" data-target="#exampleModal" id="modif" style="cursor: pointer;" ><i class="fa fa-edit" style="font-size:22px"></i> Modifier</a>
                        <a href="action.php?del=<?php echo $k['id_affectation']?>" onclick="return confirm('Vous-êtes sûr?');" class="badge text-danger"><i class="fa fa-trash" style="font-size:22px"></i> Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <script type="text/javascript">
            $(document).ready( function () {
                $('#table').DataTable(
                    {
                        "language": {
                            "lengthMenu": "Afficher _MENU_ enregistrements par page",
                            "zeroRecords": " Oups ! Rien n'a été trouvé",
                            "info": "Page _PAGE_ de _PAGES_",
                            "infoEmpty": "Aucun enregistrement disponible",
                            "infoFiltered": "(Filtrer à partir de _MAX_ enregistrements)",
                            search: "Rechercher: ",
                            "paginate": {
                                "previous": "Précédent",
                                "next":"Suivant"
                            }
                        }
                    }
                );
            } );
        </script>
    </form>
</div>
<form action="action.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Modifier affectation:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times</span>
                    </button>
            </div>
            <div class="modal-body">
                <input type="text" name="id-affect" class="idaffect" id="idaffect" hidden>
                <div class="form-label-group">
                    <label for="">ID courrier</label>
                    <select id="idCourrier" class="form-control courrier" name="id_courrier">
                        <?php
                        $query = "select * from courrier";
                        $rows = $bdd->query($query);
                        foreach ($rows as $k ) {
                            echo "<option value='" . $k['id'] . "'>" . $k['id'] . "</option>";
                        }
                        echo "</select>";
                        ?>
                    </select>
                </div>
                <div class="form-label-group">
                    <label for="">Services</label>
                        <!--<input type="text" name="services" id="services" class="form-control">-->
                        <select name="services" id="services" class="form-control">
                        <?php
                            $query = "select * from services";
                            $rows = $bdd->query($query);
                            foreach ($rows as $k ) {
                                    echo "<option value='" . $k['libelle'] . "'>" . $k['libelle'] . "</option>";
                                }
                                echo "</select>";
                        ?>
                    </select>
                </div>
                <div class="form-label-group">
                    <label for="">Personnes</label>
                   <!--<input name="personnes" id="personnes" class="form-control">-->
                   <select name="personnes" id="personnes" class="form-control">
                        <?php
                        $query = "select * from personnes";
                        $rows = $bdd->query($query);
                        foreach ($rows as $k )  {
                                echo "<option value='" . $k['nom'] . "'>  " . $k['nom'] . "</option>";
                            }
                            echo "</select>";
                        ?>
                    </select>
                </div>
                <div class="form-label-group">
                    <label for="">Instructions</label>
                    <textarea name="instructions" id="instructions" class="form-control" cols="30" rows="2"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary rounded-pill" data-dismiss="modal" id="frm1">Fermer</button>
                <button type="submit" name="modifier" class="btn btn-sm btn-success rounded-pill" id="btnModif">Modifier</button>
                
                 <button type="button" onclick="sendData({test:'ok'})">Cliquez ici !</button>
            </div>
        </div>
    </div>
</div>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="javascript/jquery.js"></script>
<!--DataTables-->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<!--sweetAlert-->
<script src="sweetalert/sweetalert2.all.min.js"></script>

<script type="text/javascript" src=javascript/SEND_EMAIL.js ></script>


<?php
if(isset($_SESSION['message'])){
    ?>
    <script>
        Swal.fire("<?php echo $_SESSION['message']?>","","success")
    </script>
    <?php
    unset($_SESSION['message']);
}
?>
<!---->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php
require_once 'footer.php'
?>