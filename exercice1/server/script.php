<?php


require("model.php");

/* 
    En vous basant sur votre compréhension de ce script serveur.
    Faites des requêtes HTTP depuis la barre d'adresse de votre navigateur
    pour interroger correctement ce script.

    Puis ouvrez index.html de la partie cliente et suivez les indications.

*/ 

$legos = [];

if ( isset($_REQUEST['collection'] ) ){

    $collec = $_REQUEST['collection'];

    if ($collec=="creator"){
        $legos = getLegoCreator();
    }
    else if ($collec=="creator expert"){
        $legos = getLegoCreatorExpert();
    }
    else if ($collec=="star wars"){
        $legos = getLegoStarWars();
    }
}

echo json_encode($legos);

?>