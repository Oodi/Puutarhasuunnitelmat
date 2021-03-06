<?php

class Kayttaja {

    private $nimimerkki;
    private $sposti;
    private $salasana;
    private $admin;

    public function __construct($nimimerkki, $sposti, $salasana, $admin) {
        $this->nimimerkki = $nimimerkki;
        $this->sposti = $sposti;
        $this->salasana = $salasana;
        $this->admin = $admin;
    }

    /* Etsii tunnuksia vastaavan käyttäjän */
    public static function etsiKayttajaTunnuksilla($nimimerkki, $salasana) {
        $sql = "SELECT nimimerkki, sposti, salasana, admin from Kayttaja where nimimerkki = ? AND salasana = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($nimimerkki, $salasana));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            $kayttaja = new Kayttaja($tulos->nimimerkki, $tulos->sposti, $tulos->salasana, $tulos->admin);
            return $kayttaja;
        }
    }
    
    /* Etsii nimimerkkiä vastaavan käyttäjän */

    public static function etsiKayttajaNimimerkilla($nimimerkki) {
        $sql = "SELECT nimimerkki, sposti, salasana, admin from Kayttaja where nimimerkki = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($nimimerkki));
        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            $kayttaja = new Kayttaja($tulos->nimimerkki, $tulos->sposti, $tulos->salasana, $tulos->admin);
            return $kayttaja;
        }
    }
    
    /* Listaa kaikki käyttäjät */

    public static function etsiKaikkiKayttajat() {
        $sql = "SELECT nimimerkki, sposti, salasana, admin FROM Kayttaja";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $kayttaja = new Kayttaja($tulos->nimimerkki, $tulos->sposti, $tulos->salasana, $tulos->admin);
            $tulokset[] = $kayttaja;
        }
        return $tulokset;
    }
    
    /* Tarkistaa onko nimimerkki käytössä */

    public static function tarkistaOnkoNimimerkkiKaytossa($nimimerkki) {
        $sql = "SELECT nimimerkki FROM Kayttaja where nimimerkki = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($nimimerkki));
        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return false;
        } else {
            return true;
        }
    }
    
    /* Luo uuden käyttäjän tietokantaan*/

    public static function luoUusiKayttaja($nimimerkki, $email, $salasana) {
        $sql = "INSERT INTO Kayttaja(nimimerkki, salasana, sposti) VALUES(?,?,?)";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($nimimerkki, $salasana, $email));
        return $ok;
    }
    
    /* Poistaa kyseisen käyttäjän tietokannasta */

    public function poistaKannasta() {
        $sql = "DELETE FROM Kayttaja where nimimerkki = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getNimimerkki()));
    }
    
    /* Vaihtaa käyttäjän sähköposti osoitteen */

    public static function vaihdaSposti($uusi) {
        $sql = "UPDATE Kayttaja set sposti = ? where nimimerkki = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array($uusi, $this->getNimimerkki()));
        return $ok;
    }
    
    /* Alentaa tai ylentää käyttäjän 0 = normaalikäyttäjä, 1 = ylläpitäjä */
    public function muutaAdminKayttaja($arvo) {
        $sql = "UPDATE Kayttaja set admin = ? where nimimerkki = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array($arvo, $this->getNimimerkki()));
        return $ok;
    }

    public function getSposti() {
        return $this->sposti;
    }

    public function getNimimerkki() {
        return $this->nimimerkki;
    }

    public function getAdmin() {
        return $this->admin;
    }

}