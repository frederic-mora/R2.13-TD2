<?php


require("model.php");

/* Question

    La BDD comporte aussi des modèles de la collection Harry Potter.
    Mettre à jour les parties clientes et serveur pour donner accès à cette collection
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