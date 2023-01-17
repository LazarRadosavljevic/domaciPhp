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
    
<form class="forma_zahtev" method="post">
    
    <div class="forma">
        <div class="alertPoruka">
            <div class="uspesno_poslato" style="display: none" role="alert">
                Poruka uspesno poslata.
            </div>
        </div>
    </div>
 
    <div class="forma">
        <div class="ime">
            <label for="ime">Ime:</label>
            <input name="name" type="text" class="rad-sa-formom" placeholder="Ime" required>
        </div>
        <div class="prezime">
            <label for="prezime">Prezime:</label>
            <input name="email" type="text" class="rad-sa-formom" placeholder="Prezime" required>
        </div>
        <div class="nacionalnost">
        <label for="nacionalnosti">Vasa nacionalnost:</label>
        <select name="nacionalnosti" id="nacionalnosti" onchange="prikaziGrad('gradovi1','gradovi2','gradovi3', this)">
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
            <input name="submit" type="submit" value="Posalji zahtev">
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