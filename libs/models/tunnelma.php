<?php

class Tunnelma {

    private $nimi;
    private $tunnelmaID;

    public function __construct($nimi) {
        $this->nimi = $nimi;
    }

    public function setTunnelmaID($id) {
        $this->tunnelmaID = $id;
    }

    public function getNimi() {
        return $this->nimi;
    }

    public function getTunnelmaID() {
        return $this->tunnelmaID;
    }

    /* Hakee kaikki tunnelmat */

    public static function haeTunnelmat() {
        $sql = "SELECT * FROM Tunnelma";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();
        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $tunnelma = new Tunnelma($tulos->nimi);
            $tunnelma->setTunnelmaID($tulos->tunnelmaID);
            $tulokset[] = $tunnelma;
        }
        return $tulokset;
    }

    /* Hakee ID:tä vastaavan tunnelman */

    public static function haeTunnelmaByID($id) {
        $sql = "SELECT * FROM Tunnelma WHERE tunnelmaID = :id";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->bindParam(':id', $id, PDO::PARAM_INT);
        $kysely->execute();

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            $tunnelma = new Tunnelma($tulos->nimi);
            $tunnelma->setTunnelmaID($tulos->tunnelmaID);
            return $tunnelma;
        }
    }

}
