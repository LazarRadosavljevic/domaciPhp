<?php
include "kon_db.php";
include "zahtev.php";

session_start();

$podaci = Zahtev::vratiZahteve($kon);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vasi zahtevi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/zahtevi.css">
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="novi_zahtev.php">Novi zahtev</a>
                    <a class="nav-link" href="#">Vasi zahtevi</a>
                    <a class="nav-link" href="index.php">Odjava</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container" id="container">
    <table class="tabela" id="tabela">
        <thead>
        <tr>
        <th colspan="7"><h2>Zahtevi korisnika '<?php echo $_SESSION['korisnicko_ime'];?>'</h2></th>
        </tr>
        <tr>
        </thead>
        <th></th>
            <th id="imeKorisnika1" >Ime</th>
            <th id="prezimeKorisnika1" >Prezime</th>
            <th>Nacionalnost</th>
            <th>Grad</th>
            <th>Zahtev</th>
        </tr>
        <tbody id="teloTabele">
       <?php
    while ($red=mysqli_fetch_assoc($podaci)) :
       ?>
       <tr>
       <td><input type="checkbox" name="cekboks" value=<?php echo $red["id"] ?>></td>
        <td id="imeKorisnika"><?php echo $red['ime'];?></td>
        <td id="prezimeKorisnika"><?php echo $red['prezime'];?></td>
        <td><?php echo $red['nacionalnost'];?></td>
        <td><?php echo $red['grad'];?></td>
        <td id="promeniZahtev"><?php echo $red['zahtev'];?></td>

        <td><input type="button" name="edit" value="Izmeni" id="<?php echo $red["id"]; ?>" class="btn btn-info edit_data" /></td>
        </tr>
        <?php endwhile; ?>
        </tbody>
        <tfoot>
            <tr>
        <td><button id="obrisiDugme" formmethod="post" class="dugmeBrisanje" style=" background-color: deepskyblue; color:white; border: 1px solid white; border-radius:20px;">Obrisi</button></td>
        </tr>
    </tfoot>

        </table>
</div>
<!-- PHP Ajax Update MySQL Data Through Bootstrap Modal -->
<div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                       <h4 class="modal-title">Izmeni zahtev</h4>  
                       <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Unesite novi zahtev</label>  
                          <input type="text" name="zahtev1" id="zahtev1" class="form-control" />  
                          <br />  
                          <input type="hidden" name="id_zahteva" id="id_zahteva" />  
                          <input type="submit" name="izmeni1" id="insert" value="Izmeni" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Zatvori</button>  
                </div>  
           </div>  
      </div>  
 </div>



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <!-- <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script> -->
<script src="js/zahtevi.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>