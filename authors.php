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



//Requête SQL Select des auteurs
//afin de les afficher plus tard
$sql_select =
"SELECT *
FROM auteurs
ORDER BY id;";

//Préparation à l'exécution de la requête en liant la config de la bdd
$sth = $bdd->prepare($sql_select);
//Exécution de la requête
$sth->execute();

//On met les données dans un tableau
$tab_auteurs = $sth->fetchAll(PDO::FETCH_ASSOC);


/********* TRAITEMENT SMARTY  *********/
// Déclaration et conf de smarty
$smarty = new Smarty();
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');

// On donne les variables pour l'affichage à smarty
$smarty->assign('is_logged_in', $is_logged_in);
$smarty->assign('tab_auteurs', $tab_auteurs);

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
$smarty->display('assets/smarty_tpl/authors.tpl');

//Appel partie HTML du site (Footer)
include_once "assets/include/footer.inc.php" ;
