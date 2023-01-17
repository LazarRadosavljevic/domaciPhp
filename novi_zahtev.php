<?php

require "kon_db.php";
require "zahtev.php";


if (isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['nacionalnosti'])) {
$fime = $_POST['ime'];
$fprezime = $_POST['prezime'];
$fnacionalnost = $_POST['nacionalnosti'];
$fgrad;
$fgrad1=filter_input(INPUT_POST,'gradovi11');
$fgrad2=filter_input(INPUT_POST,'gradovi21');
$fgrad3=filter_input(INPUT_POST,'gradovi31');
if ($fgrad1=='Beograd' || $fgrad1=='Valjevo' || $fgrad1=='Novi Sad')  {
$fgrad = $_POST['gradovi11'];
} else if ($fgrad2=='Sarajevo' || $fgrad2=='Brcko' || $fgrad2=='Doboj') {
$fgrad = $_POST['gradovi21'];
} else if ($fgrad3=='Podgorica' || $fgrad3=='Herceg Novi' || $fgrad3=='Niksic') {
$fgrad = $_POST['gradovi31'];
} else {
 echo "Niste popunili polje grad, poslata je default vrednost";
}
$fzahtev = $_POST['zahtev'];


if ($fgrad=='') {
    $zahtev1=new Zahtev(null,$fime,$fprezime,$fnacionalnost,"Nepoznato",$fzahtev);
    $status = Zahtev::dodajZahtev($zahtev1, $kon);
} else {
$zahtev1=new Zahtev(null,$fime,$fprezime,$fnacionalnost,$fgrad,$fzahtev);
 $status = Zahtev::dodajZahtev($zahtev1, $kon);
}
 if (!$status) {
    printf("%sn", $kon->error);
    exit();
 }

} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kreiranje zahteva</title>
    <link rel="stylesheet" href="css/novi_zahtev.css">
</head>
<body>
    

<form class="forma_zahtev" id="formaZahteva" method="post">
    <div class="forma">
        <div class="ime">
            <label for="ime">Ime:</label>
            <input name="ime" id="ime" type="text" class="rad-sa-formom" placeholder="Ime" required>
        </div>
        <div class="prezime">
            <label for="prezime">Prezime:</label>
            <input name="prezime" id="prezime" type="text" class="rad-sa-formom" placeholder="Prezime" required>
        </div>
        <div class="nacionalnost">
        <label for="nacionalnosti">Vasa nacionalnost:</label>
        <select name="nacionalnosti" id="nacionalnosti" onchange="prikaziGrad('gradovi1','gradovi2','gradovi3', this)" required>
        <option value=""><--Izaberite jednu od opcija ispod--></option>
            <option value="Srbin">Srbin</option>
            <option value="Bosanac">Bosanac</option>
            <option value="Crnogorac">Crnogorac</option>
            
        </select>
        </div>
        <div id="gradovi1">
        <label for="grad">Grad:</label>
        <select name="gradovi11" id="gradovi11">
            <option value=""><--Izaberite jednu od opcija ispod--></option>
            <option value="Beograd">Beograd</option>
            <option value="Valjevo">Valjevo</option>
            <option value="Novi Sad">Novi Sad</option>
            
        </select>
        </div>
        <div id="gradovi2">
        <label for="grad">Grad:</label>
        <select name="gradovi21" id="gradovi21">
            <option value=""><--Izaberite jednu od opcija ispod--></option>
            <option value="Sarajevo">Sarajevo</option>
            <option value="Brcko">Brcko</option>
            <option value="Doboj">Doboj</option>
            
        </select>
        </div>
        <div id="gradovi3">
        <label for="grad">Grad:</label>
        <select name="gradovi31" id="gradovi31">
            <option value=""><--Izaberite jednu od opcija ispod--></option>
            <option value="Podgorica">Podgorica</option>
            <option value="Herceg Novi">Herceg Novi</option>
            <option value="Niksic">Niksic</option>
            
        </select>
        </div>
        <div class="zahtev">
            <label for="zahtev">Zahtev:</label>
            <textarea name="zahtev" id="zahtev" class="rad-sa-formom" rows="3" placeholder="Zahtev" required></textarea>
        </div>
        <div class="posalji">
            <input name="submit2" id="submit2" type="submit" value="Posalji zahtev">
        </div>
    </div>
</form>

<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script src="js/novi_zahtev.js"></script>
    
</body>
</html>