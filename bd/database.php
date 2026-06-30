<?php

function openConnexion() {
    $con = null;
try
{
    $con = new PDO('mysql:host=localhost;dbname=gestion_articles;charset=utf8', 'root', '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $con;

}catch (PDOException $e)
{
    echo ('Erreur : ' . $e->getMessage());
}


}

function closeConnexion($con){
    $con=null;
}

function executeSelect(string $sql,array $data=[],$one=false) {
        $result=null;
        $conn=openConnexion();
        $statement = $conn->prepare($sql);
      count($data)==0?$statement->execute():$statement->execute($data);
      $result=$one==true?$statement->fetch():$statement->fetchAll();
        closeConnexion($conn);
        return $result ;
  
}


function executeUpdate(string $sql, array $data): int {
    $conn = openConnexion();
    $statement = $conn->prepare($sql);
    $statement->execute($data);
    $res = $statement->rowCount();
    closeConnexion($conn);
    return $res;
}

