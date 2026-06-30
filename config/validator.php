<?php
function isEmpty($key,$value,array &$errors,string $msg="Ce champs est obligatoire"){
     if (empty(trim($value))) {
        $errors[$key]=$msg;
     }
}

function isNumeric($value){
    return is_numeric($value);
}

function isString($value){
    return is_string($value);
}
   

function validate(array $errors):bool{
    return count($errors)==0;
}

function validDataArticle(array $data):array{
     $errors = [];
        if(empty($data["libelle"])){
            $errors["libelle"] ="Veuillez remplir le libelle";
        }
        if(empty($data["categorie"])){
            $errors["categorie"] ="Veuillez selectionner la categorie";
        }
        if(empty($data["contenue"])){
            $errors["contenue"] ="Veuillez remplir le contenue";
            }

        return $errors;
}