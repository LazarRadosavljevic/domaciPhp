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

 header('Location: zahtevi.php');
 exit();

} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kreiranje zahteva</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/novi_zahtev.css">
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Novi zahtev</a>
                    <a class="nav-link" href="zahtevi.php">Vasi zahtevi</a>
                    <a class="nav-link" href="index.php">Odjava</a>
                </div>
            </div>
        </div>
    </nav>
<div class="bezNavBara">
<div class="container">  

<form class="forma_zahtev" id="formaZahteva" method="post">
    <div class="forma">
        <div class="ime">
            <div class="labelKlasa"></div>
            <label for="ime">Ime:</label>
            </div>
            <input name="ime" id="ime" type="text" class="rad-sa-formom" placeholder="Ime" onblur="validacijaIme()" required>
        <p id="imePoruka"></p>
        </div>
        <div class="prezime">
        <div class="labelKlasa">
            <label for="prezime">Prezime:</label>
        </div>
        <input name="prezime" id="prezime" type="text" class="rad-sa-formom" placeholder="Prezime" onblur="validacijaPrezime()" required>
            <p id="prezimePoruka"></p>
        </div>
        <div class="nacionalnost">
            <div class="labelKlasa">
        <label for="nacionalnosti">Vasa nacionalnost:</label>
        </div>
        <select name="nacionalnosti" id="nacionalnosti" onchange="prikaziGrad('gradovi1','gradovi2','gradovi3', this)" required>
        <option value=""><--Izaberite jednu od opcija ispod--></option>
            <option value="Srbin">Srbin</option>
            <option value="Bosanac">Bosanac</option>
            <option value="Crnogorac">Crnogorac</option>
            
        </select>
        </div>
        <div id="gradovi1">
        <div class="labelKlasa">
        <label for="grad">Grad:</label>
</div>
        <select name="gradovi11" id="gradovi11">
            <option value=""><--Izaberite jednu od opcija ispod--></option>
            <option value="Beograd">Beograd</option>
            <option value="Valjevo">Valjevo</option>
            <option value="Novi Sad">Novi Sad</option>
            
        </select>
        </div>
        <div id="gradovi2">
        <div class="labelKlasa">
        <label for="grad">Grad:</label>
</div>
        <select name="gradovi21" id="gradovi21">
            <option value=""><--Izaberite jednu od opcija ispod--></option>
            <option value="Sarajevo">Sarajevo</option>
            <option value="Brcko">Brcko</option>
            <option value="Doboj">Doboj</option>
            
        </select>
        </div>
        <div id="gradovi3">
        <div class="labelKlasa">
        <label for="grad">Grad:</label>
</div>
        <select name="gradovi31" id="gradovi31">
            <option value=""><--Izaberite jednu od opcija ispod--></option>
            <option value="Podgorica">Podgorica</option>
            <option value="Herceg Novi">Herceg Novi</option>
            <option value="Niksic">Niksic</option>
            
        </select>
        </div>
        <div class="zahtev">
        <div class="labelKlasa">
            <label for="zahtev">Zahtev:</label>
</div>
            <textarea name="zahtev" id="zahtev" class="rad-sa-formom" rows="3" placeholder="Zahtev" required></textarea>
        </div>
        <div class="posalji">
            <input name="submit2" id="submit2" type="submit" value="Posalji zahtev">
        </div>
    </div>
</form>
</div>
</div>

<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script src="js/novi_zahtev.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>