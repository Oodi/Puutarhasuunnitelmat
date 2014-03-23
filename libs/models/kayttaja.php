<?php

require 'libs/tietokantayhteys.php';

class Kayttaja {

    private $nimimerkki;
    private $sposti;
    private $salasana;

    public function __construct($nimimerkki, $sposti, $salasana) {
        $this->nimimerkki = $nimimerkki;
        $this->sposti = $sposti;
        $this->salasana = $salasana;
    }

    public function __get($name) {
        ;
    }

    public function setNimimerkki($value) {
        $this->nimimerkki = $value;
    }

    public function setSposti($value) {
        $this->sposti = $value;
    }

    public function setSalasana($value) {
        $this->salasana = $value;
    }

    public function getNimimerkki() {
        return $this->nimimerkki;
    }

    public static function etsiKaikkiKayttajat() {
        $sql = "SELECT nimimerkki,sposti, salasana FROM Kayttaja";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $kayttaja = new Kayttaja();
            $kayttaja->setNimimerkki($tulos->nimimerkki);
            $kayttaja->setSposti($tulos->sposti);
            $kayttaja->setSalasana($tulos->salasana);

            //$array[] = $muuttuja; lisää muuttujan arrayn perään. 
            //Se vastaa melko suoraan ArrayList:in add-metodia.
            $tulokset[] = $kayttaja;
        }
        return $tulokset;
    }

}