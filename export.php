<?php  
//export.php  

$server="localhost";
$username="root";
$password="";
$db="gestioncourrier";
$conn = mysqli_connect($server,$username,$password,$db);
$output = '';	
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM courrier";
 $result = mysqli_query($conn, $query);

 if(mysqli_num_rows($result) > 0)
	 {
	  $output .= '
	   <table class="table" bordered="1">  
	     <tr>  
	        <th>ID</th>
	        <th>Reference Expediteur</th>
	        <th>Reference</th>
	        <th>Objet</th>
	        <th>Date de reception</th>
	        <th>Date ajout</th>
	        <th>Expediteur / Destinataire</th>
	        <th>Sous-Expéditeur</th>
	        <th>Nature</th>
	        <th>Type</th>
	        <th>Observation</th>
	    </tr>
	  ';
	  while($row = mysqli_fetch_array($result))
	 
	  {
	   $output .= '
	    <tr>  
	         <td>'.$row["id"].'</td>  
	         <td>'.$row["refExp"].'</td>  
	         <td>'.$row["ref"].'</td>  
	         <td>'.$row["objet"].'</td>  
	         <td>'.$row["daterecu"].'</td>
	         <td>'.$row["dateajout"].'</td>
	         <td>'.$row["expediteur"].'</td>
	         <td>'.$row["souExpediteur"].'</td>
	         <td>'.$row["nature"].'</td>
	         <td>'.$row["typeCourrier"].'</td>
	         <td>'.$row["observation"].'</td>
					        
	    </tr>
	   ';
	  }
	  $output .= '</table>';
	  header('Content-Type: application/xls');
	  header('Content-Disposition: attachment; filename=Liste Courriers.xls');
	  echo $output;
	 }
}
?> 
