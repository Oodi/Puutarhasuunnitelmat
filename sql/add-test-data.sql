insert into Kayttaja values('Testaaja','test','test@ff.fi',0);
insert into Kayttaja values('Admini','admin','admin@ff.fi',1);

insert into Tunnelma (nimi,kuvaus) values ('Romanttinen','');
insert into Tunnelma (nimi,kuvaus) values ('Japanilaistyylinen','');
insert into Tunnelma (nimi,kuvaus) values ('Luonnollinen','');
insert into Tunnelma (nimi,kuvaus) values ('Graafinen','');
insert into Tunnelma (nimi,kuvaus) values ('Kivikkoinen','');
insert into Tunnelma (nimi,kuvaus) values ('Hyötypuutarha','');

insert into Kasvi_Kategoria (nimi,kuvaus) values ('Perennat','');
insert into Kasvi_Kategoria (nimi,kuvaus) values ('Pensaat','');

insert into Kasvi (nimi, kuvaus, valoisuus, kasvuvyohyke, kasvukorkeus, 
kukinta_alkaa, kukinta_paattyy, kasvuaika, kategoria)
values ('Amerikankullero', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably.
', 0, 9,4,7,8,0,
(select kategoriaID from Kasvi_Kategoria where nimi = 'Perennat'));

insert into Kasvi (nimi, kuvaus, valoisuus, kasvuvyohyke, kasvukorkeus, 
kukinta_alkaa, kukinta_paattyy, kasvuaika, kategoria)
values ('Tyrni', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably.
', 1, 5,60,7,8,0,
(select kategoriaID from Kasvi_Kategoria where nimi = 'Pensaat'));

insert into Kasvi (nimi, kuvaus, valoisuus, kasvuvyohyke, kasvukorkeus, 
kukinta_alkaa, kukinta_paattyy, kasvuaika, kategoria)
values ('Amerikankulleroinen', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably.
', 2, 7,6,7,8,0,
(select kategoriaID from Kasvi_Kategoria where nimi = 'Perennat'));

insert into Kasvi (nimi, kuvaus, valoisuus, kasvuvyohyke, kasvukorkeus, 
kukinta_alkaa, kukinta_paattyy, kasvuaika, kategoria)
values ('Kasvi', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably.
', 3, 4,40,7,8,0,
(select kategoriaID from Kasvi_Kategoria where nimi = 'Perennat'));

insert into Kasvi (nimi, kuvaus, valoisuus, kasvuvyohyke, kasvukorkeus, 
kukinta_alkaa, kukinta_paattyy, kasvuaika, kategoria)
values ('Jokin kasvi', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably.
', 4, 2,70,7,8,0,
(select kategoriaID from Kasvi_Kategoria where nimi = 'Perennat'));

insert into Kasvi (nimi, kuvaus, valoisuus, kasvuvyohyke, kasvukorkeus, 
kukinta_alkaa, kukinta_paattyy, kasvuaika, kategoria)
values ('Pensas', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably.
', 5, 1,7,7,8,0,
(select kategoriaID from Kasvi_Kategoria where nimi = 'Pensaat'));


insert into Suunnitelma (nimi, kuvaus, tila, tilan_koko, valoisuus, kasvuvyohyke, suunnitelmatyyppi, tunnelma, tekija)
values ('Testisuunnitelma', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably '
, 1, 3,1,1,1,(select tunnelmaID from Tunnelma where nimi = 'Romanttinen'),
(select nimimerkki from Kayttaja where nimimerkki = 'Admini'));

insert into Suunnitelma_muistio(nimimerkki,suunnitelmaID) values ((SELECT nimimerkki from Kayttaja where nimimerkki = 'Admini'), 
(SELECT suunnitelmaID from Suunnitelma where nimi = 'Testisuunnitelma'));

insert into Suunnitelma (nimi, kuvaus, tila, tilan_koko, valoisuus, kasvuvyohyke, suunnitelmatyyppi, tunnelma, tekija)
values ('Suunnitelma', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably '
, 1, 3,1,1,4,(select tunnelmaID from Tunnelma where nimi = 'Romanttinen'),
(select nimimerkki from Kayttaja where nimimerkki = 'Admini'));

insert into Suunnitelma_muistio(nimimerkki,suunnitelmaID) values ((SELECT nimimerkki from Kayttaja where nimimerkki = 'Admini'), 
(SELECT suunnitelmaID from Suunnitelma where nimi = 'Suunnitelma'));

insert into Suunnitelma (nimi, kuvaus, tila, tilan_koko, valoisuus, kasvuvyohyke, suunnitelmatyyppi, tunnelma, tekija)
values ('Mahtava suunnitelma', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably 
', 2, 1,5,7,2,(select tunnelmaID from Tunnelma where nimi = 'Romanttinen'),
(select nimimerkki from Kayttaja where nimimerkki = 'Testaaja'));

insert into Suunnitelma_muistio(nimimerkki,suunnitelmaID) values ((SELECT nimimerkki from Kayttaja where nimimerkki = 'Testaaja'), 
(SELECT suunnitelmaID from Suunnitelma where nimi = 'Mahtava suunnitelma'));



