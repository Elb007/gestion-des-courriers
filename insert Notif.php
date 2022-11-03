<?php
if(isset($_POST["sujet"])){
  include("ado.database.php");

  $sujet = mysqli_real_escape_string($conn, $_POST["sujet"]);
  $message = mysqli_real_escape_string($conn, $_POST["message"]);

  $query = "INSERT INTO notification(sujet, message) VALUES ('$sujet', '$message')";

  if (!mysqli_query($conn, $query)) {
    printf("Message d'erreur: %s\n", mysqli_error($conn));
  }
}
?>