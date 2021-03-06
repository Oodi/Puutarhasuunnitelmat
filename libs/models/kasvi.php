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
    private $tunnelmat;

    /* Kasvin kontruktori */

    public function __construct($nimi, $kuvaus, $valoisuus, $kasvuvyohyke, $kasvukorkeus, $kukinta_alkaa, $kukinta_paattyy, $kasvuaika, $kategoria) {

        $this->nimi = $nimi;
        $this->kuvaus = $kuvaus;
        $this->valoisuus = $valoisuus;
        $this->kasvuvyohyke = $kasvuvyohyke;
        $this->kasvukorkeus = $kasvukorkeus;
        $this->kukinta_alkaa = $kukinta_alkaa;
        $this->kukinta_paattyy = $kukinta_paattyy;
        $this->kasvuaika = $kasvuaika;
        $this->kategoria = $kategoria;
    }

    /* Hakee viisi kasvia kerrallaan nimen avulla filtteröiden */

    public static function haeKasvit($sivua, $nimi) {
        $montako = 5;
        $testi = ($sivua - 1) * $montako;
        $sql = "SELECT * FROM Kasvi where nimi like :nimi ORDER by nimi LIMIT :monta OFFSET :apu ";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->bindParam(':nimi', $nimi);
        $kysely->bindParam(':monta', $montako, PDO::PARAM_INT);
        $kysely->bindParam(':apu', $testi, PDO::PARAM_INT);
        $kysely->execute();


        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $kasvi = new Kasvi($tulos->nimi, $tulos->kuvaus, $tulos->valoisuus, $tulos->kasvuvyohyke,
                            $tulos->kasvukorkeus, $tulos->kukinta_alkaa, $tulos->kukinta_paattyy, $tulos->kasvuaika, $tulos->kategoria);
            $kasvi->setKasviID($tulos->kasviID);
            $kasvi->setTunnelmat($kasvi->haeTunnelmat());
            $tulokset[] = $kasvi;
        }
        return $tulokset;
    }

    /* Hakee yhden kasvin ID:seen perustuen */

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
                            $tulos->kasvukorkeus, $tulos->kukinta_alkaa, $tulos->kukinta_paattyy, $tulos->kasvuaika, $tulos->kategoria);
            $kasvi->setKasviID($tulos->kasviID);
            $kasvi->setTunnelmat($kasvi->haeTunnelmat());
            return $kasvi;
        }
    }

    /* Hakee kaikki tiettyyn suunnitelmaan liittyvät kasvit */
    
    public static function haeSuunnitelmanKasvit($sID) {
        $sql = "SELECT * From Kasvi, Suunnitelmien_kasvit  WHERE Kasvi.kasviID = Suunnitelmien_kasvit.kasviID AND suunnitelmaID = :id";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->bindParam(':id', $sID, PDO::PARAM_INT);
        $kysely->execute();

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $kasvi = new Kasvi($tulos->nimi, $tulos->kuvaus, $tulos->valoisuus, $tulos->kasvuvyohyke,
                            $tulos->kasvukorkeus, $tulos->kukinta_alkaa, $tulos->kukinta_paattyy, $tulos->kasvuaika, $tulos->kategoria);
            $kasvi->setKasviID($tulos->kasviID);
            $kasvi->setTunnelmat($kasvi->haeTunnelmat());
            $tulokset[] = $kasvi;
        }
        return $tulokset;
    }
    
     /* Laskee kasvien lukumäärän */
    public static function lukumaara() {
        $sql = "SELECT count(*) FROM kasvit";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();
        return $kysely->fetchColumn();
    }
    
     /* Tarkistaa löytyyö kyseisellä nimellä olevaa kasvia */
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
    
     /* Lisää uuden kasvin tietokantaan */

    public function lisaaKantaan() {
        $sql = "INSERT INTO Kasvi(nimi, kuvaus, valoisuus, kasvuvyohyke, kasvukorkeus) VALUES(?,?,?,?,?)";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getNimi(), $this->getKuvaus(), $this->getValoisuus(), $this->getKasvuvyohykeNum(), $this->getKasvukorkeus()));
        $this->setKasviID(getTietokantayhteys()->lastInsertId("kasviID"));
        return $ok;
    }
    
     /* Päivittää tietyn kasvin tiedot tietokantaan */

    public function paivitaKantaan() {
        $sql = "UPDATE Kasvi SET nimi = ?, kuvaus = ?, valoisuus = ?, kasvuvyohyke = ?, kasvukorkeus = ? where kasviID = ?";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getNimi(), $this->getKuvaus(), $this->getValoisuus(), $this->getKasvuvyohykeNum(), $this->getKasvukorkeus(), $this->getID()));
        if ($ok) {
            
        }
        return $ok;
    }
    
    /* Poistaa tietyn kasvin tietokannasta*/

    public function poistaKannasta() {
        $sql = "DELETE FROM Kasvi where kasviID = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getID()));
    }
    
    /* Lisää tai poistaa kasvia vastaamaan tunnelman */

    public function lisaaTaiPoistaTunnelma($tunnelmaID, $lisaa) {
        if (!$this->onkoTunnelma($tunnelmaID) && $lisaa) {
            $sql = "INSERT INTO Kasvien_tunnelmat(tunnelmaID, kasviID) VALUES(?,?)";
            $kysely = getTietokantayhteys()->prepare($sql);
            $kysely->execute(array($tunnelmaID, $this->getID()));
        } else if ($this->onkoTunnelma($tunnelmaID) && !$lisaa) {
            $sql = "DELETE FROM Kasvien_tunnelmat where tunnelmaID = ? AND kasviID = ?";
            $kysely = getTietokantayhteys()->prepare($sql);
            $kysely->execute(array($tunnelmaID, $this->getID()));
        }
    }
    
    /* Tarkistaa liittyykö kyseinen tunnelma jo kasviin */

    public function onkoTunnelma($id) {
        $sql = "SELECT count(*) from Kasvien_tunnelmat where tunnelmaID = :tid  AND kasviID = :id";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->bindParam(':id', $this->getID(), PDO::PARAM_INT);
        $kysely->bindParam(':tid', $id, PDO::PARAM_INT);
        $kysely->execute();
        if ($kysely->fetchColumn() != 0) {
            return true;
        } else {
            return false;
        }
    }
    
    /* Hakee kaikki kasviin liittyvät tunnelmat */

    public function haeTunnelmat() {
        $sql = "SELECT tunnelmaID from Kasvien_tunnelmat where kasviID = :id";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->bindParam(':id', $this->getID(), PDO::PARAM_INT);
        $kysely->execute();

        $t = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $t[] = $tulos->tunnelmaID;
        }
        return $t;
    }
    
    /* Palauttaa halutun kasvuvyöhykkeen tekstinä */

    public function kasvuVyohyke($numero) {
        $kirjaimet = array('Ia', 'Ib', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII');
        if ($numero == 0) {
            $numero = 1;
        }
        if ($numero == 1) {
            return $kirjaimet[0];
        } else {
            return 'I-' . $kirjaimet[$numero - 1];
        }
    }
    
    /* Palauttaa kasvuvyöhykkeen tekstinä */

    public function getKasvuvyohyke() {
        return $this->kasvuVyohyke($this->kasvuvyohyke);
    }
    
    /* Palauttaa kasvuvyöhykkeen numerona */

    public function getKasvuvyohykeNum() {
        return $this->kasvuvyohyke;
    }
    
    /* Muodostaa valintojen perusteella valoisuus arvon 0-5 */

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

    public function getTunnelmat() {
        return $this->tunnelmat;
    }

    public function setKasviID($id) {
        $this->kasviID = $id;
    }

    public function setTunnelmat($tunnelmat) {
        $this->tunnelmat = $tunnelmat;
    }

}