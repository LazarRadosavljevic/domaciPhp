<?php

include "../kon_db.php";
include "../zahtev.php";

if (isset($_POST['zahtev_id'])) {
    $rezultat=Zahtev::vratiOdredjeniZahtev($_POST["zahtev_id"],$kon);

    $red=mysqli_fetch_assoc($rezultat);

        echo json_encode($red);
}

?>