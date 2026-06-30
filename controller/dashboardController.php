<?php
require_once ROOT."/model/dashboardModel.php";

$dashboard = function() {
    $total    = countTable("taches");
    $enCours  = countTachesEnCours();
    $terminer = countTachesTerminees();

    $pourcentage = $total > 0 ? round(($terminer / $total) * 100) : 0;

    $recentTaches = get3LastTaches();

    loadView("dashboard/dashboard", [
        "total"        => $total,
        "enCours"      => $enCours,
        "terminer"     => $terminer,
        "pourcentage"  => $pourcentage,
        "recentTaches" => $recentTaches
    ]);
};

$actions = [
    "dashboard" => $dashboard
];

$action = $_REQUEST["action"] ?? "dashboard";
 
if (array_key_exists($action, $actions)) {
    $actions[$action]();
} else {
    http_response_code(404);
    echo "Action introuvable dans le tableau de bord";
    exit();
}
