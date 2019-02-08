<?php
//Début de la session
session_start();
//Appel du fichier de configuration de PHP
require_once "assets/config/init.conf.php" ;
//Appel du fichier de connexion à la BDD
require_once "assets/config/bdd.conf.php" ;
//Appel de Smarty
require_once "assets/libs/Smarty.class.php" ;
//Appel du fichier de fonctions
require_once "assets/include/fonction.inc.php" ;
//Appel fonction utilisateur connecté ou non
require_once "assets/include/connexion.inc.php" ;


//Récupération de num de page dans l'URL, si pas défini, par défaut = 1
$page_courante = !empty($_GET['page']) ? $_GET['page'] : 1 ;
//Appel fonction indexPagination pour calcul de l'index de départ
$index_depart = indexPagination($page_courante, _nb_art_page);
//Appel fonction nb_total_art_publie pour calculer nb pages max -> art publie
$nb_total_art_publie = nb_total_art_publie($bdd);
//Appel fonction nb_total_art pour calculer nb pages max -> tous les articles
$nb_total_art = nb_total_art($bdd);
//Calcul nb pages non connecté
$nb_pages_non_connecte = ceil($nb_total_art_publie / _nb_art_page) ;
//Calcul nb pages connecté
$nb_pages_connecte = ceil($nb_total_art / _nb_art_page) ;



//Si la variable $_COOKIE['sid'] est définie alors
if (isset($_COOKIE['sid'])) {

    //Requête SQL d'utilisateur connecté avec calcul du nombre de commentaires
    $sql_select_connecte =
        "SELECT t1.id,t1.titre,SUBSTRING(t1.texte, 1, 150) AS texte,t1.publie,t2.nom,t2.prenom,t3.id_article, COUNT(t3.message) as 'nb',
          DATE_FORMAT(t1.date, '%d/%m/%Y') AS datefr
          FROM articles t1
          INNER JOIN auteurs
          AS t2
          ON t1.id_auteur = t2.id
          LEFT JOIN commentaires
          AS t3
          ON t1.id = t3.id_article
          GROUP BY t1.id
          ORDER BY t1.id
          LIMIT :index_depart, :nb_limit";

    //Sécurisation des données
    $sth = $bdd->prepare($sql_select_connecte);
    $sth->bindValue(':index_depart', $index_depart, PDO::PARAM_INT);
    $sth->bindValue(':nb_limit', _nb_art_page, PDO::PARAM_INT);
    $sth->execute();

    //On met les valeurs récupérées dans un tableau
    $tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC);

    /***** TRAITEMENT SMARTY  *****/
    // Déclaration et conf de smarty
    $smarty = new Smarty();
    $smarty->setTemplateDir('templates/');
    $smarty->setCompileDir('templates_c/');

    //Déclaration des variables à Smarty
    $smarty->assign('tab_articles', $tab_articles);
    $smarty->assign('is_logged_in', $is_logged_in);
    $smarty->assign('nb_pages_connecte', $nb_pages_connecte);
    $smarty->assign('nb_pages_non_connecte', $nb_pages_non_connecte);

    //Pour le message de réussite ou non
    if (isset($_SESSION['notifications'])) {
        $smarty->assign('session_var', $_SESSION);

        // On détruit la variable $_SESSION['notifications']
        unset($_SESSION['notifications']);
    }

    //Affichage de la page
    //Appel parties HTML du site (Header et menu de nav)
    include_once "assets/include/header.inc.php" ;
    include_once "assets/include/menunav.inc.php" ;

    // Affichage de la vue connexion via smarty
    $smarty->display('assets/smarty_tpl/index.tpl');
}
//Sinon si $_COOKIE['sid'] n'est pas définie alors
elseif (!isset($_COOKIE['sid'])) {

  //Requete SQL d'utilisateur non connecté avec calcul du nombre de commentaires
  $sql_select_non_connecte =
      "SELECT t1.id,t1.titre,SUBSTRING(t1.texte, 1, 150) AS texte,t1.publie,t2.nom,t2.prenom,t3.id_article, COUNT(t3.message) as 'nb',
        DATE_FORMAT(t1.date, '%d/%m/%Y') AS datefr
        FROM articles t1
        INNER JOIN auteurs
        AS t2
        ON t1.id_auteur = t2.id
        LEFT JOIN commentaires
        AS t3
        ON t1.id = t3.id_article
        WHERE publie = :publie
        GROUP BY t1.id
        ORDER BY t1.id
        LIMIT :index_depart, :nb_limit";

    $sth = $bdd->prepare($sql_select_non_connecte);
    $sth->bindValue(':publie', 1, PDO::PARAM_BOOL);
    $sth->bindValue(':index_depart', $index_depart, PDO::PARAM_INT);
    $sth->bindValue(':nb_limit', _nb_art_page, PDO::PARAM_INT);
    $sth->execute();

    //On met les valeurs récupérées dans un tableau
    $tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC);

    /***** TRAITEMENT SMARTY  *****/
    // Déclaration et conf de smarty
    $smarty = new Smarty();
    $smarty->setTemplateDir('templates/');
    $smarty->setCompileDir('templates_c/');


    //Déclaration des variables à Smarty
    $smarty->assign('tab_articles', $tab_articles);
    $smarty->assign('is_logged_in', $is_logged_in);
    $smarty->assign('nb_pages_connecte', $nb_pages_connecte);
    $smarty->assign('nb_pages_non_connecte', $nb_pages_non_connecte);

    //Pour le message de réussite ou non
    if (isset($_SESSION['notifications'])) {
        $smarty->assign('session_var', $_SESSION);

        // On détruit la variable $_SESSION['notifications']
        unset($_SESSION['notifications']);
    }

    //Affichage de la page
    //Appel parties HTML du site (Header et menu de nav)
    include_once "assets/include/header.inc.php" ;
    include_once "assets/include/menunav.inc.php" ;

    // Affichage de la vue connexion via smarty
    $smarty->display('assets/smarty_tpl/index.tpl');
}


//Appel partie HTML du site (Footer)
include_once "assets/include/footer.inc.php" ;
