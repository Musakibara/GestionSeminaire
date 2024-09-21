drop database if exists gestion_Semin;
create database if not exists gestion_Semin;
use gestion_Semin;


CREATE TABLE msg (
  id int(4) auto_increment primary key,
  email varchar(50),
  msg varchar(400)
);

INSERT INTO msg (email, msg) VALUES
('Admin@gmail.com', 'Good morning'),
('moupefo@gmail.fr', 'good morning sir');

create table Administrateur (
    idAdministrateur int(4) auto_increment primary key,
    -- typeUser varchar(15),
    nom varchar(50),
    email varchar(50),
    mot_de_passe varchar(50)
);

INSERT INTO Administrateur(nom, email, mot_de_passe) VALUES ('ADMIN','Admin@gmail.com', '123');

create table Secretaire (
    idSecretaire int(4) auto_increment primary key,
    -- typeUser varchar(15),
    nomSecret varchar(50),
    email varchar(50),
    mot_de_passe varchar(50),
    idAdministrateur int(4)
);
INSERT INTO Secretaire(nomSecret, email, mot_de_passe, idAdministrateur) VALUES ('Moupefo', 'moupefo@gmail.fr', 'moupefoCENADI', 1),
('SAADAOUI','MOHAMMED@gmail.com','Chrysantheme',1),
('CHAABI','OMAR@gmail.com','Desert',1),
('SALIM','RACHIDA@gmail.com','Hortensias',1),
('FAOUZI','NABILA@gmail.com','Meduses',1),
('ETTAOUSSI','KAMAL@gmail.com','Penguins',1),
('EZZAKI','ABDELKARIM@gmail.com','Tulipes',1),
('SAADAOUI','MOHAMMED@gmail.com','Chrysantheme',1),
('CHAABI','OMAR','Desert@gmail.com',1);

create table Participant (
    idParticipant int(4) auto_increment primary key,
    -- typeUser varchar(15),
    nomParti varchar(50),
    email varchar(50),
    numTel int(15),
    nomStructure varchar(50),
    photo varchar(255),
    mot_de_passe varchar(50),
    etat int(1),  /*1 = active, 0 = desactive */
    idAdministrateur int(4)
);
INSERT INTO Participant(nomParti,email,numTel,nomStructure,photo,mot_de_passe,etat,idAdministrateur) 
VALUES('Samuel','samuel@gmail',289947752,'DIV','admin.png','3899dn7djkat',1,1),
('Mark Zuckerberg','zuckerberg@gmail.com',939958733,'FACEBOOK','adminN.png','HH8376EH89g',1,1),
('Bill Gates','billgate@gmail.cm',576974972,'MICROSOFT','job.png','6DY3yv395j',1,1),
('Steven Job','steven@gmail.com',376386020,'DELL','man.png','jd8dnh5sjd9',1,1),
('Leonardo','leonardo@gmail.cm',397207406,'HP','manC.png','hg37hr35c7h',1,1),
('Du Pont','pont@gmail.com',380909153,'Lenovo','user.jpg','je8n28x6nx',1,1);

create table Seminaire (
    idSeminaire int(4) auto_increment primary key,
    nomSemin varchar(1024),
    lieu varchar(50),
    date dateTime(6),
    duree varchar(50),
    programme varchar(50),
    listPart varchar(50),
    rapport varchar(50),
    kit varchar(50),
    supportCours varchar(50),
    idAdministrateur int(4),
    idSecretaire int(4)
);

-- INSERT INTO Seminaire(nomSemin,lieu,date,duree,programme,listPart,rapport,kit,supportCours,idAdministrateur,idSecretaire) 
-- VALUES ('Reseau','MINFI','','','ReseauProg.pdf','ReseauP.pdf','Rapport1.pdf','ReseauK.pdf','supportCours1.pdf',1,1),
-- ('CyberSecurite','','','','CyberSecuriteProg.pdf','CyberSecuriteP.pdf','Rapport2.pdf','CyberSecuriteK.pdf','supportCours2.pdf',1,1),
-- ('CCNA','','','','CCNAProg.pdf','CCNAP.pdf','Rapport3.pdf','CCNAK.pdf','',1,3),
-- ('CNPS','','','','CNPSProg.pdf','CNPSP.pdf','Rapport4','CNPSK.pdf','',1,1),
-- ('Développement','','','','DéveloppementProg.pdf','DéveloppementP.pdf','Rapport5.pdf','DéveloppementK.pdf','',1,3),
-- ('Linux','','','','LinuxProg.pdf','LinuxP.pdf','','LinuxK.pdf','',1),

create table Participer (
    lieu varchar(50),
    date dateTime(6),
    duree varchar(50),
    rapport varchar(50),
    idParticipant int(4),
    idSeminaire int(4)
);

create table Consultant (
    idConsultant int(4) auto_increment primary key,
    -- typeUser varchar(15),
    typeConsultant varchar(50), /*externe, interne, mixte*/
    denomination varchar(50),
    formateur1 varchar(50),
    formateur2 varchar(50),
    formateur3 varchar(50),
    numTel int(15),
    NIU varchar(20),
    email varchar(15),
    mot_de_passe varchar(50),
    etat int(1),  /* 1 = active, 0 = desactive */
    idAdministrateur int(4),
    idSeminaire int(4)
); 

INSERT INTO Consultant(typeConsultant,denomination,formateur1,formateur2,formateur3,numTel,NIU,email,mot_de_passe,etat,idAdministrateur) VALUES
('externe','HELIOS','Chrysantheme','charles','Timote',786876787,4762997654,'helios@gmail.com','jgjgj54535',1,1),
('externe','DIOR','Desert','SAADAO','FAOUZI',643435466,37736618374,'doir@gmail.com','hgj657657j',1,1),
('externe','LES NUMERIQUES','Hortensias','CHAABI','SALIM',657656576,83774553893,'llesnumeriques@gmail.com','vj785vj',1,1),
('externe','GOOGLE','Meduses','EZZAKI','Pekin',090909687,3764573832,'google@gmail.com','679vdfr79',1,1),
('externe','DELL','Penguins','Jesus','Francis',432326557,388873589177,'dell@gmail.com','fhj6rf78',1,1),
('mixte','CENADI et MINFI','Kierkegaard','Nifoutia','Simon',454678680,88366455914,'cenadi@gmail.cm','578ivryhrr',1,1),
('interne','CENADI','Chrysantheme','mohamad','jean du pond',576765657,9862009163,'cenadi@gmail.cm','cxhFEt389h',1,1),
('interne','CENADI','Theophile','Sigmund','Freud',657465464,9944100145,'cenadi@gmail.cm','fujhd579',1,1);

Alter table Participant add constraint
    foreign key (idAdministrateur) references Administrateur(idAdministrateur);

Alter table Seminaire add constraint
    foreign key (idSecretaire) references Secretaire(idSecretaire);
    
Alter table Seminaire add constraint
    foreign key (idAdministrateur) references Administrateur(idAdministrateur);
    

Alter table Participer add constraint
    foreign key (idParticipant) references Participant(idParticipant);
    
Alter table Participer add constraint
    foreign key (idSeminaire) references Seminaire(idSeminaire);
        
Alter table Secretaire add constraint
    foreign key (idAdministrateur) references Administrateur(idAdministrateur);

Alter table Consultant add constraint
    foreign key (idAdministrateur) references Administrateur(idAdministrateur);
    
Alter table Consultant add constraint
    foreign key (idSeminaire) references Seminaire(idSeminaire);
