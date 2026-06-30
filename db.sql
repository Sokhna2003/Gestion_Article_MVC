-- Création de la base de données
CREATE DATABASE `gestion_articles` ;
USE `gestion_articles`; 

--  Création de la table des catégories
CREATE TABLE `categories` (
  `id_categorie` INT NOT NULL AUTO_INCREMENT ,
  `nom_categorie` VARCHAR(100) NOT NULL UNIQUE,
  PRIMARY KEY (id_categorie)
)

INSERT INTO `categories` (`nom_categorie`) VALUES 
('Informatique'), 
('Design'), 
('Bureautique'), 
('Marketing');

-- Création de la table articles
CREATE TABLE `articles` (
  `id_article` INT NOT NULL AUTO_INCREMENT ,
  `libelle` VARCHAR(255) NOT NULL,
  `id_categorie` INT NOT NULL,
  `contenu` TEXT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id_article),
  CONSTRAINT fk_id_categorie_categorie FOREIGN KEY (id_categorie) REFERENCES categories(id_categorie)
) 

-- Insertion de quelques articles de test
INSERT INTO `articles` (`libelle`, `id_categorie`, `contenu`) VALUES
('Découverte de PHP MVC', 1, 'Le modèle MVC permet de séparer la logique de l\'affichage graphique.'),
('Les nouveautés de Tailwind CSS', 2, 'Tailwind apporte de nouvelles classes utilitaires magiques pour les grilles responsive.');

