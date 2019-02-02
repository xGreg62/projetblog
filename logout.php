<?php
//Début de la session
session_start();
//Appel du fichier de configuration de PHP
require_once "assets/config/init.conf.php" ;
//Appel du fichier de connexion à la BDD
require_once "assets/config/bdd.conf.php" ;
//Appel du fichier de fonctions
require_once "assets/include/fonction.inc.php" ;
//Appel fonction utilisateur connecté ou non
require_once "assets/include/connexion.inc.php" ;

//Suppression du cookie en mettant une durée de vie négative
setcookie('sid', '', -1);

//On prépare le message de connexion réussie
$_SESSION['notifications']['message'] = '<b>Déconnexion réussie !</b>';
$_SESSION['notifications']['result'] = true ;
$url_redirect = 'index.php';

//Choix de la couleur du message en fonction de réussite ou non
if (null !== (['notifications'])) {
    $color_notification = $_SESSION['notifications']['result'] == true ? 'success' : 'danger';
}

//Ajout de la classe couleur dans $color_notification
$_SESSION['notifications']['color'] = $color_notification;

//Redirection à l'accueil
echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
