<?php
//Début de la session
session_start();
//Appel du fichier de configuration de PHP
require_once "assets/config/init.conf.php" ;
//Appel du fichier de connexion à la BDD
require_once "assets/config/bdd.conf.php" ;
//Appel de Smarty
require_once "assets/libs/Smarty.class.php" ;
//Appel fonction utilisateur connecté ou non
require_once "assets/include/connexion.inc.php" ;


//On met dans la variable $type le mode d'affichage de la page si $_GET['type'] existe
//sinon on met le "default" par défaut
$type = isset($_GET['type']) ? $_GET['type'] : 'default';


/*** Si type est vide ou n'existe pas -> affichage page pour ajouter/gérer article ***/
if($type == "default") {

  //Requête SQL afin de sélectionner tous les auteurs
  //afin de les afficher dans une liste de sélection
  $sql_select = "SELECT * FROM auteurs";

  //Préparation à l'exécution de la requête en liant la config de la bdd
  $sth = $bdd->prepare($sql_select);
  //Exécution de la requête
  $tab_auteurs = $sth->execute();

  //On met les valeurs récupérées dans un tableau
  $tab_auteurs = $sth->fetchAll(PDO::FETCH_ASSOC);


  /***** TRAITEMENT SMARTY  *****/
  // Déclaration et conf de smarty
  $smarty = new Smarty();
  $smarty->setTemplateDir('templates/');
  $smarty->setCompileDir('templates_c/');

  /*Envoie des variables à Smarty*/
  //Envoie de la variable $is_logged_in afin de vérifier si on est connecté ou non
  $smarty->assign('is_logged_in', $is_logged_in);
  //Envoie de la variable $type afin de permettre à Smarty d'afficher la bonne page
  $smarty->assign('type', $type);
  $smarty->assign('tab_auteurs', $tab_auteurs);

  //Affichage de la page
  //Appel parties HTML du site (Header et menu de nav)
  include_once "assets/include/header.inc.php" ;
  include_once "assets/include/menunav_nosearch.inc.php" ;

  // Affichage de la vue connexion via smarty
  $smarty->display('assets/smarty_tpl/article.tpl');

}


/*** Si type == read -> affichage page de lecture d'article ***/
if ($type == "read" ) {

    //Requête SQL de sélection d'article avec les commentaires liés à celui-ci
    //afin d'afficher l'ensemble des données récupérées sur une page de lecture d'article
    $sql_select = "SELECT t1.id,t1.titre,t1.texte,t1.publie,t2.nom,t2.prenom,t3.id_article,t3.pseudo,t3.email,t3.message,
    DATE_FORMAT(t3.date, '%d/%m/%Y') AS datemsg,
    DATE_FORMAT(t1.date, '%d/%m/%Y') AS datefr
    FROM articles t1
    INNER JOIN auteurs
    AS t2
    ON t1.id_auteur = t2.id
   LEFT JOIN commentaires
    AS t3
    ON t1.id = t3.id_article
    WHERE t1.id = :art_id
    ORDER BY datefr";

  //Préparation à l'exécution de la requête en liant la config de la bdd
  $sth = $bdd->prepare($sql_select);
  //Sécurisation des données envoyées
  $sth->bindValue(':art_id', $_GET['id'], PDO::PARAM_INT);
  //Exécution de la requête
  $tab_article = $sth->execute();

  //On met les valeurs récupérées dans un tableau
  $tab_article = $sth->fetchAll(PDO::FETCH_ASSOC);


  /***** TRAITEMENT SMARTY  *****/
  // Déclaration et conf de smarty
  $smarty = new Smarty();
  $smarty->setTemplateDir('templates/');
  $smarty->setCompileDir('templates_c/');

  /*Envoie des données à Smarty*/
  //Envoie de la variable $is_logged_in afin de vérifier si on est connecté ou non
  $smarty->assign('is_logged_in', $is_logged_in);
  //Envoie de la variable $type afin de permettre à Smarty d'afficher la bonne page
  $smarty->assign('type', $type);
  //Envoie du tableau pour l'affichage des données nécessaires
  $smarty->assign('tab_article', $tab_article);

  //Pour le message de réussite ou non
  if (isset($_SESSION['notifications'])) {
      $smarty->assign('session_var', $_SESSION);

      // On détruit la variable $_SESSION['notifications']
      unset($_SESSION['notifications']);
  }

  //Affichage de la page
  //Appel parties HTML du site (Header et menu de nav)
  include_once "assets/include/header.inc.php" ;
  include_once "assets/include/menunav_nosearch.inc.php" ;

  // Affichage de la vue connexion via smarty
  $smarty->display('assets/smarty_tpl/article.tpl');

}


/*** Si type == edit -> affichage page modifier article ***/
if ($type == "edit" ) {

  //Requête SQL de sélection d'article afin de l'afficher sur une page d'édition
  $sql_select_article = "SELECT t1.id,t1.titre,t1.texte,t1.publie,t1.id_auteur,t2.nom,t2.prenom,
  DATE_FORMAT(t1.date, '%d/%m/%Y') AS datefr
  FROM articles t1
  INNER JOIN auteurs
  AS t2
  ON t1.id_auteur = t2.id
  WHERE t1.id = :art_id
  ORDER BY date";

  //Requête SQL de sélection des auteurs
  $sql_select_auteurs = "SELECT * FROM auteurs";

  //Préparation à l'exécution des requêtes en liant la config de la bdd
  $sth_art = $bdd->prepare($sql_select_article);
  $sth_aut = $bdd->prepare($sql_select_auteurs);
  //Sécurisation des données envoyées
  $sth_art->bindValue(':art_id', $_GET['id'], PDO::PARAM_INT);
  //Exécution des requêtes
  $tab_articles = $sth_art->execute();
  $tab_auteurs = $sth_aut->execute();

  //On met les valeurs récupérées dans des tableaux
  $tab_article = $sth_art->fetchAll(PDO::FETCH_ASSOC);
  $tab_auteurs = $sth_aut->fetchAll(PDO::FETCH_ASSOC);

  /***** TRAITEMENT SMARTY  *****/
  // Déclaration et conf de smarty
  $smarty = new Smarty();
  $smarty->setTemplateDir('templates/');
  $smarty->setCompileDir('templates_c/');

  /*Envoie des variables à Smarty*/
  //Envoie de la variable $is_logged_in afin de vérifier si on est connecté ou non
  $smarty->assign('is_logged_in', $is_logged_in);
  //Envoie de la variable $type afin de permettre à Smarty d'afficher la bonne page
  $smarty->assign('type', $type);
  //Envoie des tableaux pour l'affichage des données nécessaires
  $smarty->assign('tab_article', $tab_article);
  $smarty->assign('tab_auteurs', $tab_auteurs);

  //Affichage de la page
  //Appel parties HTML du site (Header et menu de nav)
  include_once "assets/include/header.inc.php" ;
  include_once "assets/include/menunav_nosearch.inc.php" ;

  // Affichage de la vue connexion via smarty
  $smarty->display('assets/smarty_tpl/article.tpl');
}


/*** Si type == delete -> affichage page supprimer article ***/
if ($type == "delete" ) {

  //Requête SQL de sélection d'article
  $sql_select = "SELECT * FROM articles WHERE id= :art_id";

  //Préparation à l'exécution de la requête en liant la config de la bdd
  $sth = $bdd->prepare($sql_select);
  //Sécurisation des données envoyées
  $sth->bindValue(':art_id', $_GET['id'], PDO::PARAM_INT);
  //Exécution de la requête
  $tab_article = $sth->execute();

  //On met les valeurs récupérées dans un tableau
  $tab_article = $sth->fetchAll(PDO::FETCH_ASSOC);

  /***** TRAITEMENT SMARTY  *****/
  // Déclaration et conf de smarty
  $smarty = new Smarty();
  $smarty->setTemplateDir('templates/');
  $smarty->setCompileDir('templates_c/');

  /*Envoie des variables à Smarty*/
  //Envoie de la variable $is_logged_in afin de vérifier si on est connecté ou non
  $smarty->assign('is_logged_in', $is_logged_in);
  //Envoie de la variable $type afin de permettre à Smarty d'afficher la bonne page
  $smarty->assign('type', $type);
  //Envoie du tableau pour l'affichage des données nécessaires
  $smarty->assign('tab_article', $tab_article);

  //Affichage de la page
  //Appel parties HTML du site (Header et menu de nav)
  include_once "assets/include/header.inc.php" ;
  include_once "assets/include/menunav_nosearch.inc.php" ;

  // Affichage de la vue connexion via smarty
  $smarty->display('assets/smarty_tpl/article.tpl');

}


//Appel partie HTML du site (Footer)
include_once "assets/include/footer.inc.php" ;
