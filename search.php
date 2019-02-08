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
//Appel fonction nb_total_art_publie pour calculer nb pages max
$nb_total_art_publie = nb_total_art_publie($bdd);
//Calcul nb pages
$nb_pages = ceil($nb_total_art_publie / _nb_art_page) ;



//Si $_POST['rechercher'] existe alors
if (isset($_GET['rechercher'])) {

    //On prend la valeur de recherche en la mettant dans une variable
    $val_search = "%".$_GET['rechercher']."%";

    //Si $_COOKIE['sid'] est défini (permet de définir si on est connecté ou pas)
    //car lorsqu'on est connecté, TOUS les articles sont affichés
    if (isset($_COOKIE['sid'])) {
        //Requête SQL permettant de rechercher TOUS les articles
        $sql_select_search =
        "SELECT t1.id,t1.titre,SUBSTRING(t1.texte, 1, 150) AS texte,t1.publie,t2.nom,t2.prenom,t3.id_article,COUNT(t3.message) as 'nb',
        DATE_FORMAT(t1.date, '%d/%m/%Y') AS datefr
        FROM articles t1
        INNER JOIN auteurs
        AS t2
        ON t1.id_auteur = t2.id
        LEFT JOIN commentaires
        AS t3
        ON t1.id = t3.id_article
        WHERE (titre LIKE :search
          OR texte LIKE :search
          OR nom LIKE :search
          OR prenom LIKE :search
          OR t1.date LIKE :search)
        GROUP BY t1.id
        ORDER BY t1.date";
        $sth = $bdd->prepare($sql_select_search);
        $sth->bindValue(':search', $val_search, PDO::PARAM_STR);
        $sth->execute();

        //On met les valeurs récupérées dans un tableau
        $tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC);

        //On compte le nombre de réultats de la recherche
        $count = $sth->rowCount();

        /***** TRAITEMENT SMARTY  *****/
        // Déclaration et conf de smarty
        $smarty = new Smarty();
        $smarty->setTemplateDir('templates/');
        $smarty->setCompileDir('templates_c/');

        $smarty->assign('tab_articles', $tab_articles);
        $smarty->assign('is_logged_in', $is_logged_in);
        $smarty->assign('count', $count);

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
        $smarty->display('assets/smarty_tpl/search.tpl');
    }

    //Sinon si $_COOKIE['sid'] n'est pas défini (permet de définir si on est connecté ou pas)
    //car lorsqu'on n'est pas connecté, seuls les articles publiés sont affichés
    elseif (!isset($_COOKIE['sid'])) {
        $sql_select_search =
        "SELECT t1.id,t1.titre,SUBSTRING(t1.texte, 1, 150) AS texte,t1.publie,t2.nom,t2.prenom,t3.id_article,COUNT(t3.message) as 'nb',
        DATE_FORMAT(t1.date, '%d/%m/%Y') AS datefr
        FROM articles t1
        INNER JOIN auteurs
        AS t2
        ON t1.id_auteur = t2.id
        LEFT JOIN commentaires
        AS t3
        ON t1.id = t3.id_article
        WHERE publie = 1
        AND (titre LIKE :search
          OR texte LIKE :search
          OR nom LIKE :search
          OR prenom LIKE :search
          OR t1.date LIKE :search)
        GROUP BY t1.id
        ORDER BY t1.date";
        $sth = $bdd->prepare($sql_select_search);
        $sth->bindValue(':search', $val_search, PDO::PARAM_STR);
        $sth->execute();

        //On met les valeurs récupérées dans un tableau
        $tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC);

        //On compte le nombre de réultats de la recherche
        $count = $sth->rowCount();


        /***** TRAITEMENT SMARTY  *****/
        // Déclaration et conf de smarty
        $smarty = new Smarty();
        $smarty->setTemplateDir('templates/');
        $smarty->setCompileDir('templates_c/');

        $smarty->assign('tab_articles', $tab_articles);
        $smarty->assign('is_logged_in', $is_logged_in);
        $smarty->assign('count', $count);

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
        $smarty->display('assets/smarty_tpl/search.tpl');
    }
}

//Appel partie HTML du site (Footer)
include_once "assets/include/footer.inc.php" ;
