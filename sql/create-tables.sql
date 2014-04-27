CREATE TABLE if not exists Kayttaja 
(
nimimerkki varchar(20) NOT NULL,
salasana varchar(255) NOT NULL,
sposti varchar(100),
admin int(5) NOT NULL DEFAULT 0,
PRIMARY key (nimimerkki)
)ENGINE=InnoDB;  

CREATE TABLE if not exists Tunnelma 
(
tunnelmaID int NOT NULL AUTO_INCREMENT,
nimi varchar(70) NOT NULL,
kuvaus TEXT,
PRIMARY key (tunnelmaID)
)ENGINE=InnoDB;  

CREATE TABLE if not exists Kasvi_Kategoria 
(
kategoriaID int NOT NULL AUTO_INCREMENT,
nimi varchar(70) NOT NULL,
kuvaus TEXT,
PRIMARY key (kategoriaID)
)ENGINE=InnoDB;  

CREATE TABLE if not exists Kasvi 
(
kasviID int NOT NULL AUTO_INCREMENT,
nimi varchar(70) NOT NULL unique,
kuvaus TEXT,
valoisuus int,
kasvuvyohyke int,
kasvukorkeus int,
kukinta_alkaa int,
kukinta_paattyy int,
kasvuaika int,
kategoria int,
PRIMARY key (kasviID),
FOREIGN key (kategoria) REFERENCES Kasvi_Kategoria(kategoriaID)
)ENGINE=InnoDB;  

CREATE TABLE if not exists Kasvien_tunnelmat
(
tunnelmaID int NOT NULL,
kasviID int NOT NULL,
PRIMARY key (tunnelmaID,kasviID),
FOREIGN key (tunnelmaID) REFERENCES Tunnelma(tunnelmaID),
FOREIGN key (kasviID) REFERENCES Kasvi(kasviID) ON DELETE CASCADE
)ENGINE=InnoDB;  

CREATE TABLE if not exists Suunnitelma 
(
suunnitelmaID int NOT NULL AUTO_INCREMENT,
nimi varchar(70) NOT NULL,
kuvaus TEXT,
tila int,
tilan_koko int,
valoisuus int,
kasvuvyohyke int,
suunnitelmatyyppi int,
tunnelma int,
tekija varchar(20),
PRIMARY key (suunnitelmaID),
FOREIGN key (tekija) REFERENCES Kayttaja(nimimerkki) ON DELETE SET NULL,
FOREIGN key (tunnelma) REFERENCES Tunnelma(tunnelmaID)
)ENGINE=InnoDB;  

CREATE TABLE if not exists Suunnitelmien_kasvit 
(
kasviID int NOT NULL,
suunnitelmaID int NOT NULL,
PRIMARY key (kasviID,suunnitelmaID),
FOREIGN key (suunnitelmaID) REFERENCES Suunnitelma(suunnitelmaID) ON DELETE CASCADE,
FOREIGN key (kasviID) REFERENCES Kasvi(kasviID) ON DELETE CASCADE
)ENGINE=InnoDB;  

CREATE TABLE if not exists Suunnitelma_muistio
(
nimimerkki varchar(20) NOT NULL,
aktiivinensuunnitelma int,
suunnitelmaID int NOT NULL,
PRIMARY key (nimimerkki,suunnitelmaID),
FOREIGN key (nimimerkki) REFERENCES Kayttaja(nimimerkki) ON DELETE CASCADE,
FOREIGN key (suunnitelmaID) REFERENCES Suunnitelma(suunnitelmaID) ON DELETE CASCADE
)ENGINE=InnoDB;  