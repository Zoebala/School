-- Création de la base de données
CREATE DATABASE IF NOT EXISTS `school`;
USE `school`;
-- Création des tables
CREATE TABLE IF NOT EXISTS `Option`(
    IdOption INT PRIMARY KEY AUTO_INCREMENT,
    LibOption VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS `Classe`(
    IdClasse INT PRIMARY KEY AUTO_INCREMENT,
    LibClasse VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS `Eleve`(
    IdEleve INT PRIMARY KEY AUTO_INCREMENT,
    Matricule VARCHAR(10),
    Nom VARCHAR(30) NOT NULL,
    Postnom VARCHAR(30) NOT NULL,
    Prenom VARCHAR(20) NOT NULL,
    Genre CHAR(1) NOT NULL,
    Datenais Date,
    Adresse VARCHAR(50) NOT NULL,
    IdOption INT NOT NULL,
    IdClasse INT NOT NULL,
    FOREIGN KEY (IdClasse) REFERENCES `Classe`(IdClasse),
    FOREIGN KEY (IdOption) REFERENCES `Option`(IdOption)
);