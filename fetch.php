<?php  
 //fetch.php  
     include('include/connect.php'); 
     if(isset($_POST["project_id"]))  
     {  
          $query = "SELECT p.* , c.Nom FROM projet p , client c WHERE p.id_client = c.ID and  p.Id = '".$_POST["project_id"]."'";  
          $result = mysqli_query($connection, $query);  
          $roww = mysqli_fetch_array($result);  
          echo json_encode($roww);  
     }  
     ?>