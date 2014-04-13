-- insert into Kayttaja values('Testaaja','test','test@ff.fi',0);
-- insert into Kayttaja values('Admini','admin','admin@ff.fi',1);
-- 
-- insert into Tunnelma (nimi,kuvaus) values ('Romanttinen','');
-- insert into Tunnelma (nimi,kuvaus) values ('Japanilaistyylinen','');
-- insert into Tunnelma (nimi,kuvaus) values ('Luonnollinen','');
-- insert into Tunnelma (nimi,kuvaus) values ('Graafinen','');
-- insert into Tunnelma (nimi,kuvaus) values ('Kivikkoinen','');
-- insert into Tunnelma (nimi,kuvaus) values ('Hyötypuutarha','');
-- 
-- insert into Kasvi_Kategoria (nimi,kuvaus) values ('Perennat','');
-- insert into Kasvi_Kategoria (nimi,kuvaus) values ('Pensaat','');
-- 
-- insert into Kasvi (nimi, kuvaus, valoisuus, kasvuvyohyke, kasvukorkeus, 
-- kukinta_alkaa, kukinta_paattyy, kasvuaika, kategoria)
-- values ('Amerikankullero', 'Semmonen', 2, 9,40,7,8,0,
-- (select kategoriaID from Kasvi_Kategoria where nimi = 'Perennat'));


insert into Suunnitelma (nimi, kuvaus, tila, tilan_koko, valoisuus, kasvuvyohyke, suunnitelmatyyppi, tunnelma, tekija)
values ('Testisuunnitelma', 'Semmonen', 1, 3,1,1,1,(select tunnelmaID from Tunnelma where nimi = 'Romanttinen'),
(select nimimerkki from Kayttaja where nimimerkki = 'Admini'));

