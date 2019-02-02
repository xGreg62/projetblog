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

if (isset($_POST['connexion_usr'])) {

    /* @var $bdd PDO*/
    $sql_select = "SELECT * FROM users WHERE email = :email AND mdp = :mdp";

    //Sécurisation des données envoyées
    $sth = $bdd->prepare($sql_select);
    $sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $sth->bindValue(':mdp', cryptPassword($_POST['password']), PDO::PARAM_STR);

    $sth->execute();

    //Si $sth ne retourne rien, alors soit le compte n'existe pas soit utilisateur incorrect
    if ($sth->rowCount() < 1) {
        $_SESSION['notifications']['message'] = '<b>Login / MDP incorrect !</b>';
        $_SESSION['notifications']['result'] = false ;
        $url_redirect='login.php';
    }
    //Sinon si $sth retourne au moins un élément
    else {

        //On met l'email dans la variable $sid en utilisant la fonction sid()
        //qui permet de hasher l'email en MD5 et donc rendre le SID unique
        $sid = sid($_POST['email']);

        //Requete SQL update pour mettre le SID dans la table où l'email correspond à l'utilisateur
        $sql_update = "UPDATE users SET sid = :sid WHERE email = :email ;";

        /* @var DBB PDO */
        $sth_update = $bdd->prepare($sql_update);

        /* Sécurisation des variables */
        $sth_update->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $sth_update->bindValue(':sid', $sid, PDO::PARAM_STR);

        $result_update = $sth_update->execute();

        //On crée le cookie avec le SID et une durée de vie au cookie
        setcookie('sid', $sid, time() + 86400);

        //On prépare le message de connexion réussie
        $_SESSION['notifications']['message'] = '<b>Connexion réussie !</b>';
        $_SESSION['notifications']['result'] = true ;
        $url_redirect = 'index.php';
    }

    //Choix de la couleur du message en fonction de réussite ou non
    if (null !== (['notifications'])) {
        $color_notification = $_SESSION['notifications']['result'] == true ? 'success' : 'danger';
    }

    //Ajout de la classe couleur dans $color_notification
    $_SESSION['notifications']['color'] = $color_notification;

    //Redirection à l'accueil
    echo "<script type='text/javascript'>document.location.replace('$url_redirect');</script>";
    exit();
}

/***** TRAITEMENT SMARTY  *****/

// Déclaration et conf de smarty
$smarty = new Smarty();
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');

// On donne les variables à smarty
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
$smarty->display('assets/smarty_tpl/login.tpl');


//Appel partie HTML du site (Footer)
include_once "assets/include/footer.inc.php" ;
