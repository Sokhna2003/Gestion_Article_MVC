<?php
require_once(ROOT."bd/database.php");

function countTachesEnCours(): int {
    $sql = "SELECT COUNT(*) as total FROM taches WHERE statut = 'En cours'";
    return (int)executeSelect($sql, [], true)["total"];
}

function countTachesTerminees(): int {
    $sql = "SELECT COUNT(*) as total FROM taches WHERE statut = 'Terminee'";
    return (int)executeSelect($sql, [], true)["total"];
}


function get3LastTaches(){
    $sql="SELECT * FROM taches ORDER BY created_at DESC LIMIT 3";
    return executeSelect($sql);
}