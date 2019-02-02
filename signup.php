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

$type = isset($_GET['type']) ? $_GET['type'] : 'default';

if (isset($_POST['inscription_usr'])) {
    //print_r2($_POST);
    //print_r2($_FILES);

    /* @var $bdd PDO*/
    $sql_insert = "INSERT INTO users (nom,prenom,email,mdp) VALUES (:nom, :prenom, :email, :mdp)";

    //Sécurisation des données envoyées
    $sth = $bdd->prepare($sql_insert);
    $sth->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $sth->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $sth->bindValue(':mdp', cryptPassword($_POST['password']), PDO::PARAM_STR);

    $result = $sth->execute();

    //var_dump($result);

    //Ajout du texte pour l'utilisateur dans une variable et de la valeur pour déterminer si c'est un succès ou une erreur
    $notification = "<b>Vous êtes maintenant inscrit ! Veuillez vous connecter</b>";
    $result_notification = true ;

    //ajout des variables dans une variable de session pour l'index
    $_SESSION['notifications']['message'] = $notification ;
    $_SESSION['notifications']['result'] = $result_notification;

    //Choix de la couleur du message en fonction de réussite ou non
    if (null !== (['notifications'])) {
        $color_notification = $_SESSION['notifications']['result'] == true ? 'success' : 'danger';
    }

    //Ajout de la classe couleur dans $color_notification
    $_SESSION['notifications']['color'] = $color_notification;

    //Redirection à l'accueil
    echo "<script type='text/javascript'>document.location.replace('login.php');</script>";
    exit();
}

/***** TRAITEMENT SMARTY  *****/

// Déclaration et conf de smarty
$smarty = new Smarty();
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');

//On envoie la variable $is_logged_in à Smarty pour vérifier si on est inscrit ou non
$smarty->assign('is_logged_in', $is_logged_in);

//Affichage de la page
//Appel parties HTML du site (Header et menu de nav)
include_once "assets/include/header.inc.php" ;
include_once "assets/include/menunav_nosearch.inc.php" ;

// Affichage de la vue connexion via smarty
$smarty->display('assets/smarty_tpl/signup.tpl');

//Appel partie HTML du site (Footer)
include_once "assets/include/footer.inc.php" ;
