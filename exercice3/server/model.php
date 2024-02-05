<?php

/*  getLegoCreator

    La fonction se connecte à la BDD, sélectionne tous les légos de la collection Creator
    et retourne un tableau contenant les Legos sélectionnés.
*/
function getLegoCreator(){
    // création du connexion à la (bonne) base de données
    $cnx = new PDO("mysql:host=localhost;dbname=morap01", "morap01", "morap01");
    // déclaration de la requête SQL à utiliser
    $sql = "SELECT *
            FROM Lego_Set JOIN Lego_Collection ON Lego_Set.idcollection=Lego_Collection.id
            WHERE Lego_Collection.collection='Creator'";
    // exécution de la requête SQL via la connexion à la bdd et récupération de la réponse sur serveur MySQL
    $answer = $cnx->query($sql);
    // conversion des lignes récupérées en tableau d'objets (chaque ligne devient un objet)
    $res = $answer->fetchAll(PDO::FETCH_OBJ);
    // et on renvoie le tout.
    return $res;
}


/*  getLegoCreatorExpert

    La fonction se connecte à la BDD, sélectionne tous les légos de la collection Creator Expert
    et retourne un tableau contenant les Legos sélectionnés.
*/
function getLegoCreatorExpert(){
    $cnx = new PDO("mysql:host=localhost;dbname=morap01", "morap01", "morap01");
    $sql = "SELECT *
            FROM Lego_Set JOIN Lego_Collection ON Lego_Set.idcollection=Lego_Collection.id
            WHERE Lego_Collection.collection='Creator Expert'";
    $answer = $cnx->query($sql);
    $res = $answer->fetchAll(PDO::FETCH_OBJ);
    return $res;
}

/*  getLegoStarWars

    La fonction se connecte à la BDD, sélectionne tous les légos de la collection Star Wars
    et retourne un tableau contenant les Legos sélectionnés.
*/
function getLegoStarWars(){
    $cnx = new PDO("mysql:host=localhost;dbname=morap01", "morap01", "morap01");
    $sql = "SELECT *
            FROM Lego_Set JOIN Lego_Collection ON Lego_Set.idcollection=Lego_Collection.id
            WHERE Lego_Collection.collection='Star Wars'";
    $answer = $cnx->query($sql);
    $res = $answer->fetchAll(PDO::FETCH_OBJ);
    return $res;
}


?>