<?php
include "../kon_db.php";
include "../zahtev.php";

if(!empty($_POST))  
 {  
      $zahtev = mysqli_real_escape_string($kon, $_POST["zahtev1"]);

      if($_POST["id_zahteva"] != '')  
      {  
           $query = "  
           UPDATE `zahtevi_korisnika`  
           SET zahtev='$zahtev'     
           WHERE id='".$_POST["id_zahteva"]."'";    
      }  

      mysqli_query($kon, $query); 
 }  

?>