<?php
include('ado.database.php');

if(isset($_POST['vue'])){

if($_POST["vue"] != ''){
   $update_query = "UPDATE messages SET vue=1 WHERE vue=0";
   mysqli_query($conn, $update_query);
}

$query = "SELECT * FROM messages ORDER BY id DESC LIMIT 4";
$result = mysqli_query($conn, $query);
$output = '';

if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_array($result)){
    $output .= '
    <li>
    <a href="#">
    <b>'.$row["sujet"].'</b><br />
    <small>'.$row["message"].'</small>
    </a>
    </li>';
  }
}
else{
    $output .= '<li><a href="#">Aucune notification trouvée</a></li>';
}

$status_query = "SELECT * FROM messages WHERE vue=0";
$result_query = mysqli_query($conn, $status_query);
$count = mysqli_num_rows($result_query);

$data = array(
   'notification' => $output,
   'new_notification'  => $count
);

echo json_encode($data);
}
?>