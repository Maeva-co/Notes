create database gestion_notes;
use gestion_notes;

create table semestre(
    id int primary key auto_increment,
    label varchar(50)
);

create table parcours(
    id int primary key auto_increment,
    label varchar(50),
    responsable varchar(250)
);

create table ue(
    id varchar(50) primary key,
    label varchar(50),
    credits int not null,
    semestre_id int,

    foreign key (semestre_id) references semestre(id)
);

create table ue_parcours(
    id int primary key auto_increment,
    ue_id varchar(50) not null,
    parcours_id int not null,
    categorie varchar(50), --maths ou info (pour generer id INF2001 ... ou MAT2001...)
    statuts varchar(50), --optionnel ou obligatoire
    foreign key (ue_id) references ue(id),
    foreign key (parcours_id) references parcours(id)
);

create table etudiant(
    id varchar(50) primary key, --ETU004273 
    nom varchar(250),
    prenom varchar(250),
    promotion varchar(50)
);

create table notes(
    id int primary key auto_increment,
    etudiant_id varchar(50) not null,
    ue_id varchar(50) not null,
    note float,

    foreign key (etudiant_id) references etudiant(id),
    foreign key (ue_id) references ue(id)
);

create table utilisateur( 
    id int primary key auto_increment,
    username varchar(50) not null unique,
    password varchar(255) not null
);
