
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
    del BOOLEAN,
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


CREATE TABLE IF NOT EXISTS manga(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255),
    dessinateur VARCHAR(255),
    scenariste VARCHAR(255),
    editeur_oeuvre_origine VARCHAR(255),
    id_categorie INTEGER,
    id_etat INTEGER,
    img TEXT,
    del BOOL,
    FOREIGN KEY (id_categorie)
	REFERENCES  categorie(id) ON UPDATE CASCADE ON DELETE  NO ACTION,
    FOREIGN KEY (id_etat)
	REFERENCES etat(id) ON UPDATE CASCADE ON DELETE NO ACTION
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS genre_transition(
   id_manga INTEGER,
   id_genre INTEGER,
   PRIMARY KEY(id_manga,id_genre),
   FOREIGN KEY (id_genre)
	REFERENCES genre(id) ON UPDATE CASCADE ON DELETE NO ACTION,
FOREIGN KEY(id_manga)
	REFERENCES manga(id) ON UPDATE CASCADE ON DELETE NO ACTION
	
)ENGINE=INNODB;



CREATE TABLE IF NOT EXISTS manga_tome(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    numero_du_tome INTEGER,
    resume_du_tome TEXT,
    date_de_sortie DATE,
    price FLOAT,
    img TEXT,
    quantite_stock INTEGER,
    id_manga INTEGER,
    ean VARCHAR(20),
    del BOOL,
    FOREIGN KEY (id_manga)
	REFERENCES manga(id) ON UPDATE CASCADE ON DELETE NO ACTION
)ENGINE=INNODB;



CREATE TABLE IF NOT EXISTS commande(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_user INTEGER,
    id_status INTEGER,
    price FLOAT,
    date_de_la_commande DATE,
    FOREIGN KEY (id_user)
	REFERENCES  userDB(id) ON UPDATE CASCADE ON DELETE  NO ACTION,
    FOREIGN KEY (id_status)
	REFERENCES  statusCommande(id) ON UPDATE CASCADE ON DELETE  NO ACTION
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS elementDeLaCommande(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_commande INTEGER,
    id_manga INTEGER,
    prix FLOAT,
    quantite INT,
    FOREIGN KEY (id_manga)
	REFERENCES  manga_tome(id) ON UPDATE CASCADE ON DELETE  NO ACTION,
    FOREIGN KEY (id_commande)
	REFERENCES  commande(id) ON UPDATE CASCADE ON DELETE  NO ACTION
)ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS avis_transition(
	id_manga_tome INTEGER,
	id_avis INTEGER,
	PRIMARY KEY(id_manga_tome,id_avis),
	FOREIGN KEY (id_avis)
		REFERENCES avis(id) ON UPDATE CASCADE ON DELETE NO ACTION,
	FOREIGN KEY(id_manga_tome)
		REFERENCES manga_tome(id) ON UPDATE CASCADE ON DELETE NO ACTION
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
	("maurice","maurice","maurice@maurice.bf",NOW(),2,"$2y$12$YRL/OOGOUliJiKgQTikypOiGiQBXp2DLDHLqoklDwekx8fMeb9Sz6"),
	("admin","admin","admin@admin.admin",NOW(),1,"$2y$12$YRL/OOGOUliJiKgQTikypOiGiQBXp2DLDHLqoklDwekx8fMeb9Sz6");

INSERT INTO addresse(rue,numero,numBoite,cp,localite,pays,id_userdb,del)VALUES
	("rue de bray","212","","7110","maurage","belgique",1,TRUE),
	("avenue du test","1b","4","6000","charleroi","belgique",1,TRUE),
	("rue des maurice","154","","1230","maurice","belgique",2,TRUE);

INSERT INTO etat(nom) VALUES ('fini'),('en cours'),('stoppe');



INSERT INTO manga(titre,dessinateur,scenariste,id_categorie,editeur_oeuvre_origine,id_etat,del,img)VALUES("Atelier des sorciers","SHIRAHAMA Kamome","SHIRAHAMA Kamome",1,"kodansha",2,TRUE,"Atelier.png"),
('Levius','NAKATA Haruhisa','NAKATA Haruhisa',1,'ikki',1,TRUE,"Levius.png"),
("Errance","ASANO Inio","ASANO Inio",1,"Big Comic Superior",1,TRUE,"errance.jpg"),
("Death Note","OBATA Takeshi","OHBA Tsugumi",3,"Shûeisha",1,TRUE,"Death.jpg");

#select * from genre;
INSERT INTO genre_transition(id_manga,id_genre)VALUES(1,12),(1,4),(2,1),(2,28),(3,8),(3,34),(4,12),(4,32);


INSERT INTO manga_tome(numero_du_tome,resume_du_tome,date_de_sortie,price,quantite_stock,ean,id_manga,del,img)VALUES
(1,"Coco a toujours été fascinée par la magie. Hélas, seuls les sorciers peuvent pratiquer cet art et les élus sont choisis dès la naissance. Un jour, Kieffrey, un sorcier, arrive dans le village de la jeune fille. En l’espionnant,Coco comprend alors la véritable nature de la magie et se rappelle d’un livre de magie et d’un encrier qu’elle a acheté à un mystérieux inconnu quand elle était enfant. Elle s’exerce alors en cachette. Mais, dans son ignorance,Coco commet un acte tragique !Dès lors, elle devient la disciple de Kieffrey et va découvrir un monde dont elle ne soupçonnait pas l’existence !"
,"2018-03-07",7.50,1,"9782811638771",1,TRUE,"atelier1.jpg"),
(2,"On naît sorcier, on ne le devient pas. C'est la règle. Pourtant, Kieffrey a pris Coco sous son aile et a fait d'elle sa disciple : d'humaine normale, la voilà devenue apprentie sorcière !Kieffrey, Coco et ses trois camarades se sont rendus à Carn, petite ville de sorciers, pour acheter des fournitures magiques. Mais soudain, les quatre fillettes tombent dans un piège tendu par un mystérieux sorcier encapuchonné : elles sont coincées dans une dimension parallèle et doivent échapper à un dragon !",
"2018-06-06",7.50,900,"9782811640897",1,TRUE,"atelier2.jpg"),
(3,"Pour sauver un jeune garçon, Coco a utilisé un sort pour transformer un rocher en sable. Mais catastrophe ! Son sort a eu bien plus de portée qu’elle ne le pensait, et tout le lit de la rivière s’est effondré en conséquence. Coco est accusée par la milice magique d’avoir eu recours à un sort interdit et condamnée à voir sa mémoire effacée. Elle est sur le point d’être bannie à jamais du monde des sorciers…",
"2018-10-03",7.50,800,"9782811643942",1,TRUE,"atelierde3.jpg"),
(1,"Au XIXe siècle de la nouvelle ère, après une guerre dévastatrice qui a tué son père et plongé sa mère dans le coma, le jeune Levius Cromwell vit avec son oncle Zack. Dans la capitale, un nouvel art martial fait fureur : la boxe mécanique. Des lutteurs équipés de membres mécaniques s’affrontent violemment dans une arène. Levius va y révéler d’étonnantes prédispositions ! S’annonce alors un combat au sommet qui pourrait bien avoir des répercussions sur l’avenir de la civilisation…",
"2015-10-01",12.70,5,'9782505064343',2,TRUE,"levius1.jpg"),
(2,"La boxe mécanique est un nouvel art martial dans lequel des lutteurs équipés de membres mécaniques s’affrontent. Levius, jeune lutteur, s’apprête à livrer un combat contre Hugo, son principal rival, et ainsi gagner son ticket pour le niveau I, la ligue professionnelle. Mais contre toute attente, Hugo est mis en pièce par A.J., une jolie guerrière soutenue par Amethyst, un groupe industriel obscur auquel Levius voue une profond haine.",
"2016-01-22",12.70,2,"9782505064350",2,TRUE,"levius2.jpg"),
(3,"La boxe mécanique est un sport de combat dans lequel homme et machine ne font plus qu'un ! Levius un jeune combattant qui espère atteindre le niveau 1, est attaqué par A.J, une magnifique jeune fille utilisée comme arme par Amethyst, cette grande société spécialisée dans l’armement. Levius grimpe sur le ring, bien décidé à vaincre et a libérer A.J.",
"2016-03-18",12.70,1,"9782505064367",2,TRUE,"levius3.jpg"),
(1,"Le mangaka Kaoru Fukazawa vient de terminer un manga qui a eu son petit succès et qui lui a demandé beaucoup d’énergie. Mais voilà qu’il sombre dans le doute et l’incertitude ! Qu’a-t-il envie de dessiner à présent !? Doit-il choisir de se lancer dans un manga qui va se vendre, ce que son éditeur le pousse à faire, ou dans un projet plus personnel qui lui tient à coeur ? Mais, au fond, a-t-il encore vraiment quelque chose à dire par le biais de ses mangas !?",
"2019-03-15",15.00,15,"9782505075479",3,TRUE,"errance1.jpg"),
(1,"Light Yagami est un lycéen âgé de 17 ans, jeune homme brillant, fils d'un policier, il découvre un étrange carnet qui se révèle être le livre d'un dieu de la mort : Ryûk ! Light apprendra vite quels terribles pouvoirs renferment ce carnet : tous ceux dont le nom est inscrit dans le Death Note sont appelés à mourir dans les 40 secondes qui suivent !
Les implications sont énormes et en possession d'un tel carnet Light est potentiellement capable d'imposer sa loi à un monde qu'il estime perverti. Mais peut-on choisir qui va vivre et qui va mourir ? Certaines personnes méritent-elles de mourir par la seule volonté d'un adolescent, à la fois juge et bourreau pour une sentence irrévocable ?
En agissant de la sorte Light devient lui-même un criminel, il éveille ainsi l'attention de L, enquêteur mystérieux mandaté par Interpol. Un duel sans merci s'engage entre ces deux esprits exceptionnels !",
"2007-01-15",6.85,30,"9782505000327",4,TRUE,"Death1.jpg");
/* probleme avec wamp mais pas avec xamp pour le resume_du_tome*/



INSERT INTO avis(titre,commentaire,note,date_avis,id_userdb)VALUES("test","wesh ma geule",15,NOW(),1),
("test2","prout cacauhete",16,NOW(),2),
("test3","prout cacauhete",8,NOW(),1);
INSERT INTO avis_transition(id_manga_tome,id_avis)VALUES(1,1),(2,1),(3,3);

INSERT INTO statuscommande(nom)VALUES("en cours"),("termine"),("annule");

INSERT INTO commande(id_user,id_status,price,date_de_la_commande)VALUES(1,1,30.00,NOW()),(2,2,7.5,NOW()),(2,3,30,NOW());
INSERT INTO elementdelacommande(id_commande,id_manga,prix,quantite)VALUES(1,1,7.50,2),(1,2,7.50,1),(1,3,7.50,1),(2,1,7.50,1),(3,1,7.50,2),(3,2,7.50,1),(3,3,7.50,1);

/*

select c.id,u.email,max(c.price) from commande as c, userdb as u where c.id_user=u.id and c.date_de_la_commande>="2021-02-01" and c.date_de_la_commande<="2021-03-01" 

select  m.titre,mt.numero_du_tome,sum(quantite) as top 
	from elementdelacommande as e, manga_tome as mt, manga as m
	where e.id_manga=mt.id and m.id=mt.id_manga 
	group by  e.id_manga  ORDER BY sum(quantite) desc limit 3 #top des vente
	
select  m.titre,mt.numero_du_tome,sum(quantite)
	from elementdelacommande as e, manga_tome as mt, manga as m, commande as c 
	where e.id_manga=mt.id and m.id=mt.id_manga and e.id_commande=c.id and c.date_de_la_commande="2021-03-03"
	group by  e.id_manga ORDER BY sum(quantite) desc limit 3 #vente d'un jour precis
	
select  m.titre,mt.numero_du_tome,sum(quantite) as top,c.date_de_la_commande  
	from elementdelacommande as e, manga_tome as mt, manga as m, commande as c 
	where e.id_manga=mt.id and m.id=mt.id_manga and e.id_commande=c.id and c.date_de_la_commande>="2021-02-01" and c.date_de_la_commande<="2021-03-30" 
	group by  e.id_manga  ORDER BY sum(quantite) desc limit 3 #vente d'un entre 2 jour 

select count(*) from commande where date_de_la_commande="2021-03-03" #nombre de commande du jour donnée

select count(*) from commande where date_de_la_commande>="2021-02-22" and date_de_la_commande<="2021-02-24"  #nombre de commande entre 2 date

select avg(price) from commande  where date_de_la_commande="2021-02-22" 

select * from commande;
select * from elementdelacommande; 
select * from manga_tome where id_manga=1
select * from manga    

update

select * from userdb 


select c.id,u.email,max(c.price) as max from commande as c, userdb as u where c.id_user=u.id
and c.date_de_la_commande>='2021-02-30' and c.date_de_la_commande<='2021-03-30'         
            
            SELECT id,numero_du_tome,date_de_sortie,price,quantite_stock,id_manga 
        FROM manga_tome 
        WHERE del=true and id_manga =2
        
   SELECT g.nom FROM genre_transition AS gt, genre AS g WHERE gt.id_genre=g.id AND id_manga=2
     
        INSERT INTO manga(titre,dessinateur,scenariste,id_categorie,editeur_oeuvre_origine,id_etat,img,del)
        VALUES("test","test","test",1,"test",1,"test",1);
        
        
        
   select  m.id,m.titre,m.dessinateur,m.scenariste,m.img,c.categorie from manga as m,categorie as c where m.id_categorie=c.id and del=true group by id desc limit 3;
   select  id,numero_du_tome,resume_du_tome,date_de_sortie,price,img, id_manga from manga_tome where del=true group by id desc limit 3;
   
      UPDATE manga_tome
        SET  quantite_stock=-10
        WHERE id=1 
        
        
        select * from manga where titre like "a%"
          select * from manga where titre like :name  
          
          SELECT c.id,id_user,s.nom AS status,price,date_de_la_commande as date FROM commande AS c , statuscommande AS s WHERE c.id_status=s.id  AND c.id_status =1
          select id,id_commande,id_manga,prix,quantite 
       from elementdelacommande 
       where id_commande=1;
       SELECT c.id,id_user,s.nom AS status,price,date_de_la_commande as date FROM commande AS c , statuscommande AS s WHERE c.id_status=s.id and c.id=1
       
       
       
       
       SELECT i.id,i.titre,i.dessinateur,i.scenariste,c.categorie,i.img
        FROM manga AS i,categorie AS c
        WHERE i.id_categorie=c.id and del=true  and id_categorie=3
        
        
        
        select  m.id,m.titre,m.dessinateur,m.scenariste,m.img,c.categorie 
        from manga as m,categorie as c 
        where m.id_categorie=c.id and del=true group by id desc limit 3;
        
        select * from manga_tome
        
        select mt.id,mt.numero_du_tome,mt.img,mt.id_manga, m.titre from manga_tome as mt, manga as m where m.id=mt.id_manga group by id desc limit 3;
        select mt.id,mt.numero_du_tome,mt.img,mt.id_manga from manga_tome as mt group by id desc limit 3
        
        SELECT i.id,i.titre,i.dessinateur,i.scenariste,i.editeur_oeuvre_origine,c.categorie
            FROM manga AS i,categorie AS c
            WHERE i.id_categorie=c.id and i.id = 2

	
        INSERT INTO addresse(rue,numero,numBoite,cp,localite,pays,id_userdb)
        VALUES("rue de bray","212","b","7110","belgique","111",1);
        select * from addresse

	select * from userdb
	
	select nom,prenom,email from userDb where id=1
        
        */


