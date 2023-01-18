<?php

include "../kon_db.php";

if($_POST["zahtev_id"] != '')  
      {  

     $query = "DELETE FROM `zahtevi_korisnika` WHERE id=".$_POST["zahtev_id"]."";

     $rez=mysqli_query($kon, $query); 

    if ($rez){
        echo "Da";
    }else{
        echo "Ne";
    }

    } 

?>