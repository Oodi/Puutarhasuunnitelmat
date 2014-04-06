<?php

class Kasvi {

    private $kasviID;
    private $nimi;
    private $kuvaus;
    private $valoisuus;
    private $kasvuvyohyke;
    private $kasvukorkeus;
    private $kukinta_alkaa;
    private $kukinta_paattyy;
    private $kasvuaika;
    private $kategoria;

    public function __construct($nimi, $kuvaus, $valoisuus, $kasvuvyohyke, $kasvukorkeus, $kukinta_alkaa, $kukinta_paattyy, $kasvuaika) {

        $this->nimi = $nimi;
        $this->kuvaus = $kuvaus;
        $this->valoisuus = $valoisuus;
        $this->kasvuvyohyke = $kasvuvyohyke;
        $this->kasvukorkeus = $kasvukorkeus;
        $this->kukinta_alkaa = $kukinta_alkaa;
        $this->kukinta_paattyy = $kukinta_paattyy;
        $this->kasvuaika = $kasvuaika;
        //  $this->kategoria = $kategoria;
    }

    public function getID() {
        return $this->kasviID;
    }

    public function getNimi() {
        return $this->nimi;
    }

    public function getKuvaus() {
        return $this->kuvaus;
    }

    public function getValoisuus() {
        return $this->valoisuus;
    }

    public function getKasvukorkeus() {
        return $this->kasvukorkeus;
    }

    public function setKasviID($id) {
        $this->kasviID = $id;
    }

    public static function haeKasvit($sivua) {
        $montako = 10;
        $testi = 0;
        $sql = "SELECT * FROM Kasvi ORDER by nimi LIMIT :monta OFFSET :apu ";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->bindParam(':monta', $montako, PDO::PARAM_INT);
        $kysely->bindParam(':apu', $testi, PDO::PARAM_INT);
        $kysely->execute();
        // $kysely->execute(array($montako, ($sivua - 1) * $montako));

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $kasvi = new Kasvi($tulos->nimi, $tulos->kuvaus, $tulos->valoisuus, $tulos->kasvuvyohyke,
                            $tulos->kasvukorkeus, $tulos->kukinta_alkaa, $tulos->kukinta_paattyy, $tulos->kasvuaika);
            $kasvi->setKasviID($tulos->kasviID);
            $tulokset[] = $kasvi;
        }
        return $tulokset;
    }

    public static function haeKasviByID($id) {
        $sql = "SELECT * FROM Kasvi WHERE kasviID = :id LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->bindParam(':id', $id, PDO::PARAM_INT);
        $kysely->execute();

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            $kasvi = new Kasvi($tulos->nimi, $tulos->kuvaus, $tulos->valoisuus, $tulos->kasvuvyohyke,
                            $tulos->kasvukorkeus, $tulos->kukinta_alkaa, $tulos->kukinta_paattyy, $tulos->kasvuaika);
            $kasvi->setKasviID($tulos->kasviID);
            return $kasvi;
        }
    }

    public function kasvuVyohyke($numero) {
        $kirjaimet = array('Ia', 'Ib', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII');
        if ($numero ==0 ){
            $numero = 1;
        }
        if ($numero == 1) {
            return $kirjaimet[0];
        } else {
            return 'I-' . $kirjaimet[$numero - 1];
        }
    }

    public function getKasvuvyohyke() {
        return $this->kasvuVyohyke($this->kasvuvyohyke);
    }

    public function getKasvuvyohykeNum() {
        return $this->kasvuvyohyke;
    }

    public static function lukumaara() {
        $sql = "SELECT count(*) FROM kasvit";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();
        return $kysely->fetchColumn();
    }

    public static function onkoKasviNimelta($nimi) {
        $sql = "SELECT count(*) from Kasvi where nimi = ? ";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($nimi));
        if ($kysely->fetchColumn() != 0) {
            return false;
        } else {
            return true;
        }
    }

    public function lisaaKantaan() {
        $sql = "INSERT INTO Kasvi(nimi, kuvaus, valoisuus, kasvuvyohyke, kasvukorkeus) VALUES(?,?,?,?,?)";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getNimi(), $this->getKuvaus(), $this->getValoisuus(), $this->getKasvuvyohykeNum(), $this->getKasvukorkeus()));
        if ($ok) {
            
        }
        return $ok;
    }

    public function paivitaKantaan() {
        $sql = "UPDATE Kasvi SET nimi = ?, kuvaus = ?, valoisuus = ?, kasvuvyohyke = ?, kasvukorkeus = ? where kasviID = ?";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getNimi(), $this->getKuvaus(), $this->getValoisuus(), $this->getKasvuvyohykeNum(), $this->getKasvukorkeus(), $this->getID()));
        if ($ok) {
            
        }
        return $ok;
    }
    
        public function poistaKannasta() {
        $sql = "DELETE FROM Kasvi where kasviID = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
         $kysely->execute(array($this->getID()));    
    }
    

    public static function getValoisuusArvo($array) {
        $a = false;
        $b = false;
        $c = false;
        foreach ($array as $value) {
            if ($value == 1)
                $a = true;
            if ($value == 2)
                $b = true;
            if ($value == 3)
                $c = true;
        }
        if ($a && $b && $c || ($a && $c)) {
            return 0;
        } elseif ($a && $b) {
            return 2;
        } elseif ($b && $c) {
            return 4;
        } elseif ($a) {
            return 1;
        } elseif ($b) {
            return 3;
        } elseif ($c) {
            return 5;
        }
    }

}