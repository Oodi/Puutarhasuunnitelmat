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

    public function __construct($nimi, $kuvaus, $tila, $tkoko, $valoisuus, $kasvuvyohyke, $tunnelma, $styyppi, $id, $tekija) {

        $this->nimi = $nimi;
        $this->kuvaus = $kuvaus;
        $this->tila = $tila;
        $this->tilanKoko = $tkoko;
        $this->valoisuus = $valoisuus;
        $this->kasvuvyohyke = $kasvuvyohyke;
        $this->tunnelma = $tunnelma;
        $this->suunnitelmaTyyppi = $styyppi;
        $this->suunnitelmaID = $id;
        $this->tekija = $tekija;
    }

    public static function haeVastaavatSuunnitelmat($tila, $tkoko, $valoisuus, $vyohyke, $tunnelma) {
        $sql = "SELECT suunnitelmaID FROM Suunnitelma, Tunnelma 
            WHERE tila = :tila AND tilan_koko = :tkoko AND valoisuus = :valoisuus AND kasvuvyohyke = :vyohyke 
            AND Tunnelma.nimi = :tunnelma AND tunnelma = tunnelmaID";
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
                    $tulos->kasvuvyohyke, $tulos->tunnelma, $tulos->suunnitelmatyyppi, $tulos->suunnitelmaID, $tulos->tekija);
            return $suunnitelma;
        }
    }
    
    public function getNimi() {
        return $this->nimi;
    }
    
    public function getKuvaus(){
        return $this->kuvaus;
    }

}
