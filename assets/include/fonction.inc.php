<?php

//Fontion de cryptage du MDP
function cryptPassword($mdp)
{
    $mdp_crypt = sha1($mdp);
    return $mdp_crypt;
}

//Fonction SID qui permet la création du SID
function sid($email)
{
    $sid = md5($email . time());
    return $sid;
}

//Fonction de retour d'index pour pagination
function indexPagination($page_courante, $nb_articles_pages)
{
    $index = ($page_courante - 1) * $nb_articles_pages ;
    return $index ;
}

//Fonction calcul art. total publiés
function nb_total_art_publie($bdd)
{
    $sql = "SELECT COUNT(*)
          AS nb_total_art_publie
          FROM articles
          WHERE publie = 1";
    $sth = $bdd->prepare($sql);
    $sth->execute();
    $tab_result = $sth->fetch(PDO::FETCH_ASSOC);
    return $tab_result['nb_total_art_publie'];
}

//Fonction calcul art. total publiés
function nb_total_art($bdd)
{
    $sql = "SELECT COUNT(*)
          AS nb_total_art
          FROM articles";
    $sth = $bdd->prepare($sql);
    $sth->execute();
    $tab_result = $sth->fetch(PDO::FETCH_ASSOC);
    return $tab_result['nb_total_art'];
}
