<?php
class Zahtev{
    public $id;   
    public $ime;   
    public $prezime;   
    public $nacionalnost;   
    public $grad;
    public $zahtev;

    public function __construct($id=null, $ime=null, $prezime=null,
     $nacionalnost=null, $grad=null, $zahtev=null)
    {
        $this->id = $id;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->nacionalnost = $nacionalnost;
        $this->grad = $grad;
        $this->zahtev=$zahtev;
    }


    public static function dodajZahtev(Zahtev $zahtev1, mysqli $kon)
    {
        $kveri = "INSERT INTO `zahtevi_korisnika`(`ime`,`prezime`,`nacionalnost`,`grad`,`zahtev`)
         VALUES('$zahtev1->ime','$zahtev1->prezime',
         '$zahtev1->nacionalnost','$zahtev1->grad','$zahtev1->zahtev')";
        return $kon->query($kveri);

    }

    public static function vratiZahteve(mysqli $kon)
    {
        $query = "SELECT * FROM `zahtevi_korisnika`";
        return $kon->query($query);
    }
}

?>