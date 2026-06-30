<?php
require_once ROOT . "model/articleModel.php";

$liste = function() {
    $articles = getAllArticles();
    $total_articles = countTable("articles");
    
    loadView("article/liste", [
        "articles" => $articles,
        "total_articles" => $total_articles
    ]);
};

$ajout = function() {
    $errors = [];
    $categories = getCategories(); 

    if (isset($_POST["ajout"])) {
        isEmpty("libelle", $_POST["libelle"], $errors, "Veuillez renseigner le libellé de l'article");
        isEmpty("id_categorie", $_POST["id_categorie"] ?? "", $errors, "Veuillez sélectionner une catégorie");
        isEmpty("contenu", $_POST["contenu"], $errors, "Le contenu de l'article ne peut pas être vide");

        if (validate($errors)) {
            $article = [
                "libelle"   => $_POST["libelle"],
                "id_categorie" => (int)$_POST["id_categorie"],
                "contenu"   => $_POST["contenu"]
            ];
            
            addArticle($article);
            redirectTo("article", "liste"); 
        }
    }

    loadView("article/ajout", [
        "errors"     => $errors,
        "categories" => $categories
    ]);
};

$detail = function() {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $article = getArticleById($id);

    if (empty($article)) {
        http_response_code(404);
        echo "Article introuvable.";
        exit();
    }

    loadView("article/detail", [
        "article" => $article
    ]);
};

$supprimer = function() {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    if ($id > 0) {
        deleteArticle($id);
    }
    redirectTo("article", "liste");
};

$actions = [
    "liste"     => $liste,
    "ajout"     => $ajout,
    "detail"    => $detail,
    "supprimer" => $supprimer
];

$action = $_REQUEST["action"] ?? "liste";
 
if (array_key_exists($action, $actions)) {
    $actions[$action](); 
} else {
    http_response_code(404);
    echo "Action demandée introuvable dans le module Article";
    exit();
}
