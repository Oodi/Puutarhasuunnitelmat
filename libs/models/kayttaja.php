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
   
    public function getSposti() {
        return $this->sposti;
    }

    public function getNimimerkki() {
        return $this->nimimerkki;
    }

    public function getAdmin() {
        return $this->admin;
    }

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

}