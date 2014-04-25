<?php

class Suunnitelma {

    private $suunnitelmaID;
    private $nimi;
    private $kuvaus;
    private $tila;
    private $tilanKoko;
    private $valoisuus;
    private $kasvuvyohyke;
    private $suunnitelmaTyyppi;
    private $tunnelma;
    private $tekija;

    public function __construct($nimi, $kuvaus, $tila, $tkoko, $valoisuus, $kasvuvyohyke, $tunnelma, $styyppi, $tekija) {

        $this->nimi = $nimi;
        $this->kuvaus = $kuvaus;
        $this->tila = $tila;
        $this->tilanKoko = $tkoko;
        $this->valoisuus = $valoisuus;
        $this->kasvuvyohyke = $kasvuvyohyke;
        $this->tunnelma = $tunnelma;
        $this->suunnitelmaTyyppi = $styyppi;
        $this->tekija = $tekija;
    }

    public function setSuunnitelmaID($id) {
        $this->suunnitelmaID = $id;
    }

    public static function haeVastaavatSuunnitelmat($tila, $tkoko, $valoisuus, $vyohyke, $tunnelma) {
        $sql = "SELECT suunnitelmaID FROM Suunnitelma, Tunnelma 
            WHERE tila = :tila AND tilan_koko = :tkoko AND valoisuus = :valoisuus AND kasvuvyohyke = :vyohyke 
            AND tunnelmaID = :tunnelma AND tunnelma = tunnelmaID AND suunnitelmatyyppi = 4";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->bindParam(':tila', $tila, PDO::PARAM_INT);
        $kysely->bindParam(':tkoko', $tkoko, PDO::PARAM_INT);
        $kysely->bindParam(':valoisuus', $valoisuus, PDO::PARAM_INT);
        $kysely->bindParam(':vyohyke', $vyohyke, PDO::PARAM_INT);
        $kysely->bindParam(':tunnelma', $tunnelma);
        $kysely->execute();

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $id = $tulos->suunnitelmaID;
            $tulokset[] = $id;
        }
        return $tulokset;
    }

    public static function haeSuunnitelmaByID($id) {
        $sql = "SELECT suunnitelmaID, nimi, kuvaus, tila, tilan_koko, valoisuus, kasvuvyohyke, suunnitelmatyyppi, tunnelma, tekija 
            FROM Suunnitelma WHERE suunnitelmaID = :id LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->bindParam(':id', $id, PDO::PARAM_INT);
        $kysely->execute();

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            $suunnitelma = new Suunnitelma($tulos->nimi, $tulos->kuvaus, $tulos->tila, $tulos->tilan_koko, $tulos->valoisuus,
                            $tulos->kasvuvyohyke, $tulos->tunnelma, $tulos->suunnitelmatyyppi, $tulos->tekija);
            $suunnitelma->setSuunnitelmaID($tulos->suunnitelmaID);
            return $suunnitelma;
        }
    }

    public static function haeTyypinMukaanSuunnitelmat($tyyppi) {
        $sql = "select * from Suunnitelma where suunnitelmatyyppi = :tyyppi";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->bindParam(':tyyppi', $tyyppi, PDO::PARAM_INT);
        $kysely->execute();

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $suunnitelma = new Suunnitelma($tulos->nimi, $tulos->kuvaus, $tulos->tila, $tulos->tilan_koko, $tulos->valoisuus,
                            $tulos->kasvuvyohyke, $tulos->tunnelma, $tulos->suunnitelmatyyppi, $tulos->tekija);
            $suunnitelma->setSuunnitelmaID($tulos->suunnitelmaID);
            $tulokset[] = $suunnitelma;
        }
        return $tulokset;
    }

    public static function haeKayttajanSuunnitelmat($nimimerkki, $tyyppi) {
        $sql = "select *  from Suunnitelma, Suunnitelma_muistio where Suunnitelma_muistio.suunnitelmaID = Suunnitelma.suunnitelmaID
            AND suunnitelmatyyppi = :tyyppi AND nimimerkki = :nimi";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->bindParam(':nimi', $nimimerkki);
        $kysely->bindParam(':tyyppi', $tyyppi);
        $kysely->execute();



        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $suunnitelma = new Suunnitelma($tulos->nimi, $tulos->kuvaus, $tulos->tila, $tulos->tilan_koko, $tulos->valoisuus,
                            $tulos->kasvuvyohyke, $tulos->tunnelma, $tulos->suunnitelmatyyppi, $tulos->tekija);
            $suunnitelma->setSuunnitelmaID($tulos->suunnitelmaID);
            $tulokset[] = $suunnitelma;
        }
        return $tulokset;
    }

    public static function haeAktiivinenSuunnitelma($nimimerkki) {
        $sql = "SELECT * FROM Suunnitelma WHERE suunnitelmaID = 
            (SELECT suunnitelmaID FROM Suunnitelma_muistio WHERE aktiivinensuunnitelma = 1 AND nimimerkki = :nimi) LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->bindParam(':nimi', $nimimerkki);
        $kysely->execute();

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            $suunnitelma = new Suunnitelma($tulos->nimi, $tulos->kuvaus, $tulos->tila, $tulos->tilan_koko, $tulos->valoisuus,
                            $tulos->kasvuvyohyke, $tulos->tunnelma, $tulos->suunnitelmatyyppi, $tulos->tekija);
            $suunnitelma->setSuunnitelmaID($tulos->suunnitelmaID);
            return $suunnitelma;
        }
    }

    public function lisaaKantaan() {
        $sql = "INSERT INTO Suunnitelma(nimi, kuvaus, tila, tilan_koko, valoisuus, kasvuvyohyke, suunnitelmatyyppi, tunnelma, tekija) VALUES(?,?,?,?,?,?,?
            , ?,
            (select nimimerkki from Kayttaja where nimimerkki = ?))";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getNimi(), $this->getKuvaus(), $this->getTila(), $this->getTilanKoko(),
            $this->getValoisuus(), $this->getKasvuvyohyke(), $this->getSuunnitelmaTyyppi(), $this->getTunnelma(), $this->getTekija()));
        $this->setSuunnitelmaID(getTietokantayhteys()->lastInsertId("suunnitelmaID"));
    }

    public function paivitaKantaan() {
        $sql = "UPDATE Suunnitelma SET nimi = ?, kuvaus = ?, tila = ?, tilan_koko = ?, valoisuus = ?, kasvuvyohyke = ?, tunnelma = ? where suunnitelmaID = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getNimi(), $this->getKuvaus(), $this->getTila(), $this->getTilanKoko(), $this->getValoisuus(),
            $this->getKasvuvyohyke(), $this->getTunnelma(), $this->getID()));
    }

    public function poistaKannasta() {
        $sql = "DELETE FROM Suunnitelma where suunnitelmaID = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getID()));
    }

    public function lisaaMuistioon() {
        $sql = "insert into Suunnitelma_muistio(nimimerkki,suunnitelmaID) values ((SELECT nimimerkki from Kayttaja where nimimerkki = ?), ?)";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->getTekija(), $this->getID()));
    }

    public function muutaSuunnitelmaTyyppia($arvo) {
        $sql = "UPDATE Suunnitelma set suunnitelmatyyppi = :arvo where suunnitelmaID = :ID";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->bindParam(':arvo', $arvo, PDO::PARAM_INT);
        $kysely->bindParam(':ID', $this->suunnitelmaID, PDO::PARAM_INT);
        $kysely->execute();
    }

    public function aktivoiTaiDeaktivoiSuunnitelma($arvo) {
        $sql = "UPDATE Suunnitelma_muistio set aktiivinensuunnitelma = :arvo where suunnitelmaID = :ID AND nimimerkki = :nimi";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->bindParam(':arvo', $arvo, PDO::PARAM_INT);
        $kysely->bindParam(':ID', $this->suunnitelmaID, PDO::PARAM_INT);
        $kysely->bindParam(':nimi', $this->tekija);
        $kysely->execute();
    }

    public function lisaaKasviSuunnitelmaan($kasvinID) {
        $asql1 = "(SELECT suunnitelmaID from Suunnitelma where suunnitelmaID = ?)";
        $asql2 = "(SELECT kasviID from Kasvi where kasviID = ?)";
        $sql = "INSERT into Suunnitelmien_kasvit(kasviID,suunnitelmaID) VALUES(" . $asql2 . ", " . $asql1 . ")";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kasvinID, $this->suunnitelmaID));
    }

    public function onkoKasviSuunnitelmassa($kasvinID) {
        $sql = "SELECT * FROM Suunnitelmien_kasvit where kasviID = ? AND suunnitelmaID = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kasvinID, $this->suunnitelmaID));
        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return false;
        } else {
            return true;
        }
    }

    public function poistaKasviSuunnitelmasta($kasvinID) {
        $sql = "DELETE FROM Suunnitelmien_kasvit where kasviID = ? AND suunnitelmaID = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kasvinID, $this->suunnitelmaID));
    }

    public function getID() {
        return $this->suunnitelmaID;
    }

    public function getNimi() {
        return $this->nimi;
    }

    public function getTila() {
        return $this->tila;
    }

    public function getTilanKoko() {
        return $this->tilanKoko;
    }

    public function getTunnelma() {
        return $this->tunnelma;
    }

    public function getKasvuvyohyke() {
        return $this->kasvuvyohyke;
    }

    public function getSuunnitelmaTyyppi() {
        return $this->suunnitelmaTyyppi;
    }

    public function getValoisuus() {
        return $this->valoisuus;
    }

    public function getKuvaus() {
        return $this->kuvaus;
    }

    public function getTekija() {
        return $this->tekija;
    }

    public function setNimi($nimi) {
         $this->nimi = $nimi;
    }

    public function setTila() {
        return $this->tila;
    }

    public function setTilanKoko() {
        return $this->tilanKoko;
    }

    public function setTunnelma() {
        return $this->tunnelma;
    }

    public function setKasvuvyohyke() {
        return $this->kasvuvyohyke;
    }

    public function setSuunnitelmaTyyppi($tyyppi) {
       $this->suunnitelmaTyyppi = $tyyppi;
    }

    public function setValoisuus() {
        return $this->valoisuus;
    }

    public function setKuvaus() {
        return $this->kuvaus;
    }

    public function setTekija($tekija) {
        $this->tekija = $tekija;
    }

}
