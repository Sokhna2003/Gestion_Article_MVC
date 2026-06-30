<?php
require_once(ROOT . "bd/database.php");

function getAllArticles(): array {
    $sql = "SELECT a.*, c.nom_categorie AS categorie 
            FROM articles a 
            INNER JOIN categories c ON a.id_categorie = c.id_categorie 
            ORDER BY a.created_at DESC";
    return executeSelect($sql);
}

function getArticleById(int $id) {
    $sql = "SELECT a.*, c.nom_categorie AS categorie 
            FROM articles a 
            INNER JOIN categories c ON a.id_categorie = c.id_categorie 
            WHERE a.id_article = :id";
    return executeSelect($sql, ["id" => $id], true);
}

function addArticle(array $article): int {
    $sql = "INSERT INTO articles(libelle, id_categorie, contenu) VALUES(:libelle, :id_categorie, :contenu)";
    return executeUpdate($sql, $article);
}

function deleteArticle(int $id): int {
    $sql = "DELETE FROM articles WHERE id_article = :id";
    return executeUpdate($sql, ["id" => $id]);
}

function getCategories(): array {
    $sql = "SELECT * FROM categories ORDER BY nom_categorie ASC";
    return executeSelect($sql);
}
