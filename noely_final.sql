create table  `categorie`(
	`idCategorie` bigint NOT NULL AUTO_INCREMENT,
	`nomCategorie` varchar(100) NOT NULL,
	PRIMARY KEY(`idCategorie`)
	)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

create table  `cadeau`(
	`idCadeau` bigint NOT NULL AUTO_INCREMENT,
	`nomCadeau` varchar(100) NOT NULL,
	`point` int(5) NOT NULL,
	`idCategorie` bigint NOT NULL,
	`image` varchar(100) NOT NULL,
	PRIMARY KEY(`idCadeau`),
	FOREIGN KEY(`idCategorie`) REFERENCES `categorie`(`idCategorie`)
	)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

create table  `enfant`(
	`idEnfant` bigint NOT NULL AUTO_INCREMENT,
	`emailEnfant` varchar(255) NOT NULL,
	`mdpEnfant` varchar(255) NOT NULL,
	`anneeNaissance` int(4) NOT NULL,
	`contact` varchar(20) NOT NULL,
	`bonPoints` int(3) NOT NULL,
	PRIMARY KEY(`idEnfant`),
  	UNIQUE KEY `emailEnfant` (`emailEnfant`)
	)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

create table  `souhait`(
	`idSouhait` bigint NOT NULL AUTO_INCREMENT,
	`idEnfant` bigint NOT NULL,
	`idCadeau` bigint NOT NULL,
	`quantite` int NOT NULL,
	`dateSouhait` date NOT NULL,
	`estValide` varchar(3) NOT NULL,
	PRIMARY KEY(`idSouhait`),
	FOREIGN KEY(`idEnfant`) REFERENCES `enfant`(`idEnfant`),
	FOREIGN KEY(`idCadeau`) REFERENCES `cadeau`(`idCadeau`)
	)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

create table  `administrateur`(
	`login` varchar(255) NOT NULL,
	`motdepasse` varchar(255) NOT NULL
	)ENGINE=InnoDB  DEFAULT CHARSET=latin1;

insert into categorie values(null,'jeux de société');
insert into categorie values(null,'console');
insert into categorie values(null,'poupee');
insert into categorie values(null,'jeux de strategie');
insert into categorie values(null,'jeux de carte');
insert into categorie values(null,'figurine');

insert into cadeau values(null,'PS5','250','2','ps5');
insert into cadeau values(null,'XBOX X series','230','2','xbox');
insert into cadeau values(null,'Nintendo Switch','200','2','nintendo');
insert into cadeau values(null,'Gameboy Advance','100','2','gba');
insert into cadeau values(null,'Brick game','10','2','brick');
insert into cadeau values(null,'Monopoly','90','1','monopoly');
insert into cadeau values(null,"Jeu de l'oie",'50','1','oie');
insert into cadeau values(null,'Scrabble','75','1','scrabble');
insert into cadeau values(null,'Miramis','110','1','miramis');
insert into cadeau values(null,'Serpents et Echelle','30','1','serpent');
insert into cadeau values(null,'Barbie','180','3','barbie');
insert into cadeau values(null,'Baby nurse','150','3','baby');
insert into cadeau values(null,'Les Triplets','170','3','triplets');
insert into cadeau values(null,'Action Man','130','3','man');
insert into cadeau values(null,'Nora','100','3','nora');
insert into cadeau values(null,'Echecs','100','4','echecs');
insert into cadeau values(null,'Dame','50','4','dame');
insert into cadeau values(null,'Jeu de Go','90','4','go');
insert into cadeau values(null,'Othello','90','4','othello');
insert into cadeau values(null,'Shogi','40','4','shogi');
insert into cadeau values(null,'UNO','60','5','uno');
insert into cadeau values(null,'Mille Bornes','120','5','mille');
insert into cadeau values(null,'Jeu des sept familles','50','5','famille');
insert into cadeau values(null,'Mon Coffret de Jeux','100','5','coffret');
insert into cadeau values(null,'Coffret Poker','130','5','poker');
insert into cadeau values(null,'Figurine Charlotte Katakuri','30','6','katakuri');
insert into cadeau values(null,'Lot de 6 figurines Naruto','90','6','naruto');
insert into cadeau values(null,'Goku Dragon Ball Z','30','6','goku');
insert into cadeau values(null,'Lot de figurines Bragon Ball Z','60','6','dbz');
insert into cadeau values(null,'Figurine Roronoa Zoro','30','6','zoro');

insert into administrateur values('admin',md5('password'));

insert into enfant values(null,'jean@gmail.com',md5('jean'),'2005','+261(0)323245670','500');
insert into enfant values(null,'jeanne@gmail.com',md5('jeanne'),'2007','+261(0)323245671','350');
insert into enfant values(null,'quentin@gmail.com',md5('quentin'),'2009','+261(0)323245672','100');
insert into enfant values(null,'marc@gmail.com',md5('marc'),'2002','+261(0)323245673','200');
insert into enfant values(null,'marcel@gmail.com',md5('marcel'),'2010','+261(0)323245674','500');
insert into enfant values(null,'ange@gmail.com',md5('ange'),'2011','+261(0)323245675','350');
insert into enfant values(null,'marie@gmail.com',md5('marie'),'2006','+261(0)323245676','500');
insert into enfant values(null,'jack@gmail.com',md5('jack'),'2008','+261(0)323245677','200');
insert into enfant values(null,'cindy@gmail.com',md5('cindy'),'2003','+261(0)323245678','200');
insert into enfant values(null,'peta@gmail.com',md5('peta'),'2004','+261(0)323245679','100');

