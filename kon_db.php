<?php

$host = "localhost";
$baza = "izdavanje_zahteva";
$user = "root";
$sifra = "";

$kon = new mysqli($host,$user,$sifra,$baza);

if ($kon->errno) {
    printf("Connect failed: %sn", $kon->errno);
    exit();
 }

?>