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
    <div class="container">
    <table class="tabela">
        <thead>
        <tr>
        <th colspan="6"><h2>Zahtevi korisnika '<?php echo $_SESSION['korisnicko_ime'];?>'</h2></th>
        </tr>
        <tr>
        </thead>
            <td>Ime</td>
            <td>Prezime</td>
            <td>Nacionalnost</td>
            <td>Grad</td>
            <td>Zahtev</td>
        </tr>
       <?php
    while ($red=mysqli_fetch_assoc($podaci)) :
       ?>
       <tr>
        <td><?php echo $red['ime'];?></td>
        <td><?php echo $red['prezime'];?></td>
        <td><?php echo $red['nacionalnost'];?></td>
        <td><?php echo $red['grad'];?></td>
        <td><?php echo $red['zahtev'];?></td>
        <td><form action="" method="post">
                    <input type="submit" class="izmeni" name="submit" value="Izmeni">
                </form>
                </td>
        </tr>
        <?php endwhile; ?>

        </table>
</div>

    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script src="js/novi_zahtev.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>