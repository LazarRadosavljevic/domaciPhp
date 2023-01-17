<?php


class Korisnik {

    public $id;
    public $username;
    public $password;

    public function __construct($id=null,$username=null,$password=null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    public static function ulogujKorisnika($usr, mysqli $kon)
    {
        $query = "SELECT * FROM korisnik WHERE korisnicko_ime='$usr->username' and sifra='$usr->password'";

        return $kon->query($query);
    }

}

?>