DROP DATABASE projetWeb;

CREATE DATABASE  IF NOT EXISTS  projetWeb;
USE projetWeb;

CREATE TABLE IF NOT EXISTS  role_user(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name_role VARCHAR(255) NOT NULL UNIQUE
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS image(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    chemin VARCHAR(255),
    date_ajout DATE
)ENGINE=INNODB;



/*
create table if not exists cordonneBancaire(
    id integer PRIMARY key AUTO_INCREMENT,
    #a reflechir a quoi mettre dedans
)ENGINE=INNODB;
*/


CREATE TABLE IF NOT EXISTS userDB(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    mdp VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE,
    date_inscription DATE,
    id_role_user INTEGER,
    /*id_cordonneBancaire INTEGER,*/
    FOREIGN KEY (id_role_user)
	REFERENCES  role_user(id) ON UPDATE CASCADE ON DELETE  NO ACTION
    

    
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS addresse(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    rue VARCHAR(255),
    numero VARCHAR(255),
    numBoite VARCHAR(255),
    cp VARCHAR(255),
    localite VARCHAR(255),
    pays VARCHAR(255),
    id_userdb INTEGER,
    FOREIGN KEY (id_userdb)
	REFERENCES userDB(id) ON UPDATE CASCADE ON DELETE NO ACTION
)ENGINE=INNODB;



CREATE TABLE IF NOT EXISTS avis(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255),
    commentaire TEXT,
    note INTEGER,
    id_image INTEGER,
    date_avis DATE,
    id_userdb INTEGER,
    FOREIGN KEY (id_image)
	REFERENCES  image(id) ON UPDATE CASCADE ON DELETE  NO ACTION,
    FOREIGN KEY (id_userdb)
	REFERENCES  userDB(id) ON UPDATE CASCADE ON DELETE  NO ACTION
)ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS statusCommande(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255)
)ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS categorie(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    categorie VARCHAR(255)
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS genre(
   id INTEGER PRIMARY KEY AUTO_INCREMENT,
   nom VARCHAR(255),
   def_genre TEXT
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS etat(
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(50)
)ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS item(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255),
    dessinateur VARCHAR(255),
    scenariste VARCHAR(255),
    editeur_oeuvre_origine VARCHAR(255),
    id_categorie INTEGER,
    id_etat INTEGER,
    FOREIGN KEY (id_categorie)
	REFERENCES  categorie(id) ON UPDATE CASCADE ON DELETE  NO ACTION,
    FOREIGN KEY (id_etat)
	REFERENCES etat(id) ON UPDATE CASCADE ON DELETE NO ACTION
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS genre_transition(
   id_item INTEGER,
   id_genre INTEGER,
   PRIMARY KEY(id_item,id_genre),
   FOREIGN KEY (id_genre)
	REFERENCES genre(id) ON UPDATE CASCADE ON DELETE NO ACTION,
FOREIGN KEY(id_item)
	REFERENCES item(id) ON UPDATE CASCADE ON DELETE NO ACTION
	
)ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS item_detail(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    numero_du_tome INTEGER,
    resume_du_tome TEXT,
    date_de_sortie DATE,
    price FLOAT,
    id_image INTEGER,
    quantite_stock INTEGER,
    id_item INTEGER,
    ean VARCHAR(20),
   FOREIGN KEY (id_image)
	REFERENCES  image(id) ON UPDATE CASCADE ON DELETE  NO ACTION,
    FOREIGN KEY (id_item)
	REFERENCES item(id) ON UPDATE CASCADE ON DELETE NO ACTION
)ENGINE=INNODB;



CREATE TABLE IF NOT EXISTS commande(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_user INTEGER,
    id_status INTEGER,
    price FLOAT,
    FOREIGN KEY (id_user)
	REFERENCES  userDB(id) ON UPDATE CASCADE ON DELETE  NO ACTION,
    FOREIGN KEY (id_status)
	REFERENCES  statusCommande(id) ON UPDATE CASCADE ON DELETE  NO ACTION
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS elementDeLaCommande(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_commande INTEGER,
    id_item INTEGER,
    date_de_la_commande DATE,
    prix FLOAT,
    FOREIGN KEY (id_item)
	REFERENCES  item_detail(id) ON UPDATE CASCADE ON DELETE  NO ACTION,
    FOREIGN KEY (id_commande)
	REFERENCES  commande(id) ON UPDATE CASCADE ON DELETE  NO ACTION
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS sell(
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	date_sell DATE,
	id_item_detail INTEGER,
	id_userdb INTEGER,
	FOREIGN KEY(id_userdb)
		REFERENCES userdb(id),
	FOREIGN KEY (id_item_detail)
		REFERENCES item_detail(id) ON UPDATE CASCADE ON DELETE NO ACTION
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS avis_transition(
	id_item_detail INTEGER,
	id_avis INTEGER,
	PRIMARY KEY(id_item_detail,id_avis),
	FOREIGN KEY (id_avis)
		REFERENCES avis(id) ON UPDATE CASCADE ON DELETE NO ACTION,
	FOREIGN KEY(id_item_detail)
		REFERENCES item_detail(id) ON UPDATE CASCADE ON DELETE NO ACTION
);


#drop database projetWeb;




/*peuple les table*/

INSERT INTO genre(nom,def_genre)VALUES('action',"Courses-poursuites, fusillades, combat... Il y en a pour tous les amateurs de rythmes soutenus et de sensations fortes !"),
	('animaux',"Chiens, chats, chevaux, dauphins... Cette catégorie regroupe les séries mettant à l'honneur les animaux."),
	('art martiaux',"Courses-poursuites, fusillades, combat... Il y en a pour tous les amateurs de rythmes soutenus et de sensations fortes !"),
	('aventure',"Pour les amateurs de quêtes bourrées d'obstacles et de péripéties inconnues."),
	('comedie',"Les séries visant à faire rire."),
	('conte',"Récit de faits imaginaires."),
	('documentaire',"Oeuvre à visée didactique ou culturelle, pour découvrir un pays, un peuple, un artiste, une technique..."),
	('drame',"Oeuvre relatant des événements tragiques, cruels..."),
	('emotion',"Pour stimuler vos sentiments : la joie, la peur..."),
	('enfants',"Oeuvres dédiées aux plus jeunes."),
	('erotique',"Oeuvres mettant en avant l'amour sensuel et les plaisirs sexuels."),
	('fantastique',"Quand des événements anormaux viennent briser un quotidien normal..."),
	('gastronomie',"Oeuvres axées sur la cuisine."),
	('gay-lesbien',"Oeuvres consacrées aux amours entre personnes du même sexe."),
	('heroic-fantasy',"Genre littéraire anglo-américain qui mêle, dans une atmosphère d'épopée, les mythes, les légendes et les thèmes de récit fantastique et de la science-fiction."),
	('histoire-courtes',"Des récits brefs, souvent réunis en recueil."),
	('historique',"Oeuvres revenant sur diverses facettes de l'Histoire : personne historique, grands faits, guerre..."),
	('horreur',"Récit visant à faire peur ou à susciter l'effroi."),
	('humour',"Oeuvres visant à faire rire ou sourire."),
	('jeux-video',"Adaptations de jeux vidéo."),
	('loisir','Le genre "Loisir" répertorie les séries ou ouvrages destinés à la pratique d\'un Loisir, qu\'il soit artistique (dessin, calligraphie, origami), culinaire ou axé sur le bien-être (relaxation, méthodes zen).'),
	('medical',"Oeuvres axées sur le thème de la médecine."),
	('musique',"Oeuvres axées sur le thème de la musique."),
	('parodie',"Oeuvres comiques tournant en dérision d'autres oeuvres."),
	('philosophique',"Oeuvres développant des idées, des manières de penser."),
	('policier',"Oeuvres qui prennent pour sujet l'enquête menée à l'occasion d'un crime ou d'un délit."),
	('romance','Oeuvres à caractère tendre et sentimental.'),
	('science-fiction',"Oeuvres inventant des mondes, des sociétés et des êtres situés dans des espaces-temps fictifs (souvent futurs), impliquant des sciences, des technologies et des situations radicalement différentes."),
	('sentai','Genre de "super-héros" typiquement nippons.'),
	('social','Récits souvent engagés, mettant en avant des problèmes de société.'),
	('sport',"Football, judo, tennis, rallye... Tous les sports sont ici."),
	('suspense',"Oeuvres prenant plaisir à mettre le lecteur dans des situations d'attente angoissantes."),
	('thriller',"Oeuvre à suspense, qui procure des sensations fortes."),
	('tranche-de-vie',"Récits consacrés généralement à la vie quotidienne.");
	
INSERT INTO categorie(categorie)VALUES("seinen"),
	("shojo"),
	("shonen");

INSERT INTO role_user(name_role)VALUES('admin'),('user');


INSERT INTO userdb(nom,prenom,email,date_inscription,id_role_user,mdp)VALUES
	("stevens","atanael","ata_@hotmail.fr",NOW(),1,"$2y$12$YRL/OOGOUliJiKgQTikypOiGiQBXp2DLDHLqoklDwekx8fMeb9Sz6"),#test
	("maurice","maurice","maurice@maurice.bf",NOW(),2,"$2y$12$YRL/OOGOUliJiKgQTikypOiGiQBXp2DLDHLqoklDwekx8fMeb9Sz6");

INSERT INTO addresse(rue,numero,numBoite,cp,localite,pays,id_userdb)VALUES
	("rue de bray","212","","7110","maurage","belgique",1),
	("avenue du test","1b","4","6000","charleroi","belgique",1),
	("rue des maurice","154","","1230","maurice","belgique",2);

INSERT INTO etat(nom) VALUES ('fini'),('en cours'),('stoppe');



INSERT INTO item(titre,dessinateur,scenariste,id_categorie,editeur_oeuvre_origine,id_etat)VALUES("Atelier des sorciers","SHIRAHAMA Kamome","SHIRAHAMA Kamome",1,"kodansha",2),
('Levius','NAKATA Haruhisa','NAKATA Haruhisa',1,'ikki',1),
("Errance","ASANO Inio","ASANO Inio",1,"Big Comic Superior",1);


#select * from genre;
INSERT INTO genre_transition(id_item,id_genre)VALUES(1,12),(1,4),(2,1),(2,28),(3,8),(3,34);


INSERT INTO item_detail(numero_du_tome,resume_du_tome,date_de_sortie,price,quantite_stock,ean,id_item)VALUES
(1,"Coco a toujours été fascinée par la magie. Hélas, seuls les sorciers peuvent pratiquer cet art et les élus sont choisis dès la naissance. Un jour, Kieffrey, un sorcier, arrive dans le village de la jeune fille. En l’espionnant,Coco comprend alors la véritable nature de la magie et se rappelle d’un livre de magie et d’un encrier qu’elle a acheté à un mystérieux inconnu quand elle était enfant. Elle s’exerce alors en cachette. Mais, dans son ignorance,Coco commet un acte tragique !Dès lors, elle devient la disciple de Kieffrey et va découvrir un monde dont elle ne soupçonnait pas l’existence !"
,"2018-03-07",7.50,1000,"9782811638771",1),
(2,"On naît sorcier, on ne le devient pas. C'est la règle. Pourtant, Kieffrey a pris Coco sous son aile et a fait d'elle sa disciple : d'humaine normale, la voilà devenue apprentie sorcière !Kieffrey, Coco et ses trois camarades se sont rendus à Carn, petite ville de sorciers, pour acheter des fournitures magiques. Mais soudain, les quatre fillettes tombent dans un piège tendu par un mystérieux sorcier encapuchonné : elles sont coincées dans une dimension parallèle et doivent échapper à un dragon !",
"2018-06-06",7.50,900,"9782811640897",1),
(3,"Pour sauver un jeune garçon, Coco a utilisé un sort pour transformer un rocher en sable. Mais catastrophe ! Son sort a eu bien plus de portée qu’elle ne le pensait, et tout le lit de la rivière s’est effondré en conséquence. Coco est accusée par la milice magique d’avoir eu recours à un sort interdit et condamnée à voir sa mémoire effacée. Elle est sur le point d’être bannie à jamais du monde des sorciers…",
"2018-10-03",7.50,800,"9782811643942",1),
(1,"Au XIXe siècle de la nouvelle ère, après une guerre dévastatrice qui a tué son père et plongé sa mère dans le coma, le jeune Levius Cromwell vit avec son oncle Zack. Dans la capitale, un nouvel art martial fait fureur : la boxe mécanique. Des lutteurs équipés de membres mécaniques s’affrontent violemment dans une arène. Levius va y révéler d’étonnantes prédispositions ! S’annonce alors un combat au sommet qui pourrait bien avoir des répercussions sur l’avenir de la civilisation…",
"2015-10-01",12.70,5,'9782505064343',2),
(2,"La boxe mécanique est un nouvel art martial dans lequel des lutteurs équipés de membres mécaniques s’affrontent. Levius, jeune lutteur, s’apprête à livrer un combat contre Hugo, son principal rival, et ainsi gagner son ticket pour le niveau I, la ligue professionnelle. Mais contre toute attente, Hugo est mis en pièce par A.J., une jolie guerrière soutenue par Amethyst, un groupe industriel obscur auquel Levius voue une profond haine.",
"2016-01-22",12.70,2,"9782505064350",2),
(3,"La boxe mécanique est un sport de combat dans lequel homme et machine ne font plus qu'un ! Levius un jeune combattant qui espère atteindre le niveau 1, est attaqué par A.J, une magnifique jeune fille utilisée comme arme par Amethyst, cette grande société spécialisée dans l’armement. Levius grimpe sur le ring, bien décidé à vaincre et a libérer A.J.",
"2016-03-18",12.70,1,"9782505064367",2),
(1,"Le mangaka Kaoru Fukazawa vient de terminer un manga qui a eu son petit succès et qui lui a demandé beaucoup d’énergie. Mais voilà qu’il sombre dans le doute et l’incertitude ! Qu’a-t-il envie de dessiner à présent !? Doit-il choisir de se lancer dans un manga qui va se vendre, ce que son éditeur le pousse à faire, ou dans un projet plus personnel qui lui tient à coeur ? Mais, au fond, a-t-il encore vraiment quelque chose à dire par le biais de ses mangas !?",
"2019-03-15",15.00,15,"9782505075479",3);
/* probleme avec wamp mais pas avec xamp pour le resume_du_tome*/


INSERT INTO sell(date_sell,id_item_detail,id_userdb) VALUES
(NOW(),1,1),(NOW(),2,1),(NOW(),2,2),(NOW(),1,2),(NOW(),1,2),(NOW(),3,1),(NOW(),3,2),(NOW(),1,1),(NOW(),1,1),(NOW(),1,2);

INSERT INTO avis(titre,commentaire,note,date_avis,id_userdb)VALUES("test","wesh ma geule",15,NOW(),1),
("test2","prout cacauhete",16,NOW(),2),
("test3","prout cacauhete",8,NOW(),1);
INSERT INTO avis_transition(id_item_detail,id_avis)VALUES(1,1),(2,1),(3,3);

INSERT INTO statuscommande(nom)VALUES("en cours"),("termine"),("annule");

INSERT INTO commande(id_user,id_status,price)VALUES(1,2,17),(2,3,7.7);
INSERT INTO elementdelacommande(id_commande,id_item,date_de_la_commande,prix)VALUES(1,1,NOW(),7.50),(1,2,NOW(),7.50),(1,1,NOW(),7.50),(1,3,NOW(),7.50),(2,1,NOW(),7.50);





/*
SELECT * FROM item_detail;
SELECT i.id,i.titre,i.dessinateur,i.scenariste,i.editeur_oeuvre_origine,c.categorie FROM item AS i,categorie AS c WHERE i.id_categorie=c.id;

select id,numero_du_tome,resume_du_tome,date_de_sortie,price,quantite_stock,id_item,ean from item_detail where id_item=1;

SELECT i.id,i.titre,i.dessinateur,i.scenariste,i.editeur_oeuvre_origine,c.categorie FROM item AS i,categorie AS c WHERE i.id_categorie=c.id and  i.titre like "Atelier des sorciers";

*/


/*
SELECT id,numero_du_tome,resume_du_tome,date_de_sortie,price,quantite_stock,id_item,ean FROM item_detail WHERE id_item=1;


SELECT i.id,i.titre,i.dessinateur,i.scenariste,i.editeur_oeuvre_origine,c.categorie
    FROM item AS i,categorie AS c
    WHERE i.id_categorie=c.id AND i.titre LIKE "Atelier des sorciers";


SELECT * FROM userDB;
DELETE FROM userDB WHERE id=3;

SELECT nom,prenom,email,date_inscription,name_role FROM userDB AS u, role_user AS r WHERE u.id_role_user=r.id AND email LIKE 'ata_@hotmail.fr' AND mdp LIKE 'test';

SELECT id,numero_du_tome,resume_du_tome,date_de_sortie,price,quantite_stock,id_item,ean 
            FROM item_detail 
            WHERE id_item = 3 AND numero_du_tome = 1;*/
            
           