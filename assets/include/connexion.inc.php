<?php

//Ajout de FALSE dans la variable $is_logged_in par défaut
$is_logged_in = false ;

//Vérification de l'existance de $_COOKIE['sid'] et s'il n'est pas vide
if(isset($_COOKIE['sid']) and !empty($_COOKIE['sid'])) {

    /* @var $bdd PDO*/
    $sql_select = "SELECT * FROM users WHERE sid = :sid";

    //Sécurisation des données envoyées
    $sth = $bdd->prepare($sql_select);
    $sth->bindValue(':sid', $_COOKIE['sid'], PDO::PARAM_STR);

    //Exécution de la requête
    $sth->execute();

    //Si le résultat retourné est supérieur à 0 (mini 1)
    if ($sth->rowCount() > 0) {
        //On met la valeur récupérée dans un tableau
        $tab_result_connexion = $sth->fetch(PDO::FETCH_ASSOC);

        //On passe la variable $is_logged_in à TRUE
        $is_logged_in = true ;

        //On rajoute le nom de l'utilisateur dans $nom_usr
        //afin de l'afficher dans la barre sur le site pour indiquer qui est connecté
        $nom_usr = $tab_result_connexion['nom'] ;

        //On rajoute le prénom de l'utilisateur dans $prenom_usr
        //afin de l'afficher dans la barre sur le site pour indiquer qui est connecté
        $prenom_usr = $tab_result_connexion['prenom'] ;
    }
}
