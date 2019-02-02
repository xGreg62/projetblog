<?php
//Début de la session
session_start();
//Appel du fichier de configuration de PHP
require_once "assets/config/init.conf.php" ;
//Appel du fichier de connexion à la BDD
require_once "assets/config/bdd.conf.php" ;
//Appel fonction utilisateur connecté ou non
require_once "assets/include/connexion.inc.php" ;
//Appel du fichier des fonctions
require_once "assets/include/fonction.inc.php";


/******************** ACTIONS SUR LES ARTICLES *********************/
/************************** Ajout article **************************/
//Si $_POST['ajouter'] est défini alors
if (isset($_POST['ajouter'])) {

    /* Requete SQL d'insertion dans la table "articles"*/
    $sql_insert = "INSERT INTO articles (titre,texte,date,publie,id_auteur) VALUES (:titre, :texte, :date, :publie, :auteur)";

    //Sécurisation des données envoyées
    $sth = $bdd->prepare($sql_insert);
    $sth->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
    $sth->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR);
    $sth->bindValue(':publie', $_POST['publie'], PDO::PARAM_BOOL);
    $sth->bindValue(':date', $_POST['datefr'], PDO::PARAM_STR);
    $sth->bindValue(':auteur', $_POST['auteur'], PDO::PARAM_INT);
    //Exécution de la requête
    $result = $sth->execute();

    //Récupération de l'id du dernier article inséré pour le lier à l'image
    $id_article = $bdd->lastInsertId();

    //Si une image est rajoutée alors
    if ($_FILES['image']['error'] == 0) {
        //Localisation du fichier et mise en minuscule du nom du fichier
        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        //Déplacement du fichier et renommage avec la bonne extension
        $result_img = move_uploaded_file($_FILES['image']['tmp_name'], 'assets/imgs/' . $id_article . '.' . $extension);
    }

    //Ajout du texte pour l'utilisateur dans une variable et de la valeur pour déterminer si c'est un succès ou une erreur
    $notification = "<b>Article ajouté avec succès !</b>";
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

    //Redirection à la page "index.php" après insertion de l'article
    echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
    exit();
}

/************************** Modification article **************************/
//Si $_POST['modifier'] est défini alors
if (isset($_POST['modifier'])) {

    $date = date("Y-n-d");

    /* Requete SQL Update de la table "articles" */
    $sql_update = "UPDATE articles SET titre=:titre, texte=:texte, date = DATE(STR_TO_DATE(:datefr, '%d/%m/%Y')), publie=:publie, id_auteur=:id_auteur WHERE id=:art_id";

    //Sécurisation des données envoyées
    $sth = $bdd->prepare($sql_update);
    $sth->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
    $sth->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR);
    $sth->bindValue(':datefr', $_POST['datefr'], PDO::PARAM_STR);
    $sth->bindValue(':publie', $_POST['publie'], PDO::PARAM_BOOL);
    $sth->bindValue(':art_id', $_POST['art_id'], PDO::PARAM_INT);
    $sth->bindValue(':id_auteur', $_POST['auteur'], PDO::PARAM_INT);
    //Exécution de la requête
    $result = $sth->execute();

    //Récupération de l'id de l'article inséré pour le lier à l'image
    $id_article = $_POST['art_id'];

    //Si une image est rajoutée alors
    if ($_FILES['image']['error'] == 0) {
        //Localisation du fichier et mise en minuscule du nom du fichier
        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        //Suppression de l'ancienne image
        unlink('assets/imgs/'.$id_article.'.'.$extension);

        //Déplacement du fichier et renommage avec la bonne extension
        $result_img = move_uploaded_file($_FILES['image']['tmp_name'], 'assets/imgs/'.$id_article.'.'.$extension);
    }

    //Ajout du texte pour l'utilisateur dans une variable et de la valeur pour déterminer si c'est un succès ou une erreur
    $notification = "<b>Article modifé avec succès !</b>";
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

    //Redirection à la page "index.php" après modification de l'article
    echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
    exit();
}

/************************** Suppression article **************************/
//Si $_POST['supprimer'] est défini alors
if (isset($_POST['supprimer'])) {

    /* Requete SQL Delete de la table "articles" */
    $sql_delete = "DELETE FROM articles WHERE id=:art_id";

    //Sécurisation des données envoyées
    $sth = $bdd->prepare($sql_delete);
    $sth->bindValue(':art_id', $_POST['art_id'], PDO::PARAM_INT);
    //Exécution de la requête
    $result = $sth->execute();

    //Récupération de l'id de l'article inséré pour le lier à l'image
    $id_article = $_POST['art_id'];

    //Suppression de l'ancienne image
    unlink('assets/imgs/'.$id_article.'.jpg');

    //Ajout du texte pour l'utilisateur dans une variable et de la valeur pour déterminer si c'est un succès ou une erreur
    $notification = "<b>Article supprimé avec succès !</b>";
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

    //Redirection à la page "index.php" après suppression de l'article
    echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
    exit();
}


/************************** Ajout commentaire **************************/
//Si $_POST['addComment'] est défini alors
if (isset($_POST['addComment'])) {
    /* Requete SQL Insert dans la table "commentaires" */
    $sql_insert = "INSERT INTO commentaires (id_article,pseudo,email,message,date) VALUES (:art_id, :pseudo, :email, :message, :datemsg)";

    //Sécurisation des données envoyées
    $sth = $bdd->prepare($sql_insert);
    $sth->bindValue(':art_id', $_POST['art_id'], PDO::PARAM_INT);
    $sth->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $sth->bindValue(':message', $_POST['message'], PDO::PARAM_STR);
    $sth->bindValue(':datemsg', $_POST['datemsg'], PDO::PARAM_INT);
    //Exécution de la requête
    $result = $sth->execute();

    //Ajout du texte pour l'utilisateur dans une variable et de la valeur pour déterminer si c'est un succès ou une erreur
    $notification = "<b>Commentaire ajouté avec succès !</b>";
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

    //On met le lien de la page dans une variable avec le bon id
    $page = "article.php?type=read&id=".$_POST['art_id'] ;

    //Redirection à la page "article.php" correspondante à l'article, après ajout du commentaire à celui-ci
    echo "<script type='text/javascript'>document.location.replace('$page');</script>";
    exit();
}



/*********************** ACTIONS SUR LES UTILISATEURS ************************/
/***************************** Ajout utilisateur *****************************/
if (isset($_POST['ajouter_usr'])) {

    /* Requete SQL Insert dans la table "users" */
    $sql_insert = "INSERT INTO users (nom,prenom,email,mdp) VALUES (:nom, :prenom, :email, :mdp)";

    //Sécurisation des données envoyées
    $sth = $bdd->prepare($sql_insert);
    $sth->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $sth->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $sth->bindValue(':mdp', cryptPassword($_POST['password']), PDO::PARAM_STR);
    //Exécution de la requête
    $result = $sth->execute();

    //Ajout du texte pour l'utilisateur dans une variable et de la valeur pour déterminer si c'est un succès ou une erreur
    $notification = "<b>Utilisateur ajouté avec succès !</b>";
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

    //Redirection à la page "users.php" après ajout de l'utilisateur
    echo "<script type='text/javascript'>document.location.replace('users.php');</script>";
    exit();
}

/************************** Suppression utilisateur **************************/
//Récup. du Submit 'supprimer_usr' et des paramètres envoyés
if (isset($_REQUEST['supprimer_usr'])) {
    $checkbox = $_REQUEST['checkbox'];

    //Boucle for pour parcourir l'ensemble des données reçues
    //en fonction du nombre d'éléments à supprimer
    for ($i=0;$i<count($checkbox);$i++) {
        $del_id = $checkbox[$i];

        //SQL_select pour vérifier si l'utilisateur connecté est sélectionné
        $sql_select = "SELECT * FROM users WHERE id=:id";
        //Sécurisation des données envoyées
        $sth = $bdd->prepare($sql_select);
        $sth->bindValue(':id', $del_id, PDO::PARAM_STR);
        //Exécution de la requête
        $sth->execute();

        //On met les valeurs récupérées dans un tableau
        $tab_result = $sth->fetchAll(PDO::FETCH_ASSOC);

        //'foreach' pour parcourir le tableau de données
        foreach ($tab_result as $value)
        {
          //On met la valeur sid du tableau dans $sid
          $sid = $value['sid'];
        }

        //Si le SID de la session actuelle correspond à $sid qui correspond à l'utilisateur qui va être supprimé
        if(($_COOKIE['sid']) == $sid)
        {
          //Suppression du cookie en mettant une durée de vie négative
          //Cette action, ici, ne se fait que lorsqu'on supprime le compte avec lequel on est connecté
          setcookie('sid', '', -1);

          //Remise à 0 des variables
          $is_logged_in = false ;
          $prenom_usr = '';
          $nom_usr = '' ;

          //Exécution de la suppression du compte utilisateur
          $sql_delete = "DELETE FROM users WHERE id='$del_id';";
          $sth = $bdd->prepare($sql_delete);
          $sth->execute();

          //Ajout du texte pour l'utilisateur dans une variable et de la valeur pour déterminer si c'est un succès ou une erreur
          $notification = "<b>Vous avez été déconnecté car votre compte a été supprimé !</b>";
          $result_notification = false ;

          //ajout des variables dans une variable de session pour l'index
          $_SESSION['notifications']['message'] = $notification ;
          $_SESSION['notifications']['result'] = $result_notification;

          //Choix de la couleur du message en fonction de réussite ou non
          if (null !== (['notifications'])) {
              $color_notification = $_SESSION['notifications']['result'] == true ? 'success' : 'danger';
          }

          //Ajout de la classe couleur dans $color_notification
          $_SESSION['notifications']['color'] = $color_notification;

          //Redirection à la page "index.php" après suppression du compte utilisateur sur lequel on est connecté
          echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
          exit();

        }
        //Sinon si le SID ne correpond à aucun utilisateur
        else
        {
          //Exécution de la suppression du/des compte(s) utilisateur(s)
          $sql_delete = "DELETE FROM users WHERE id='$del_id';";
          $sth = $bdd->prepare($sql_delete);
          $sth->execute();
        }
    }

    //Ajout du texte pour l'utilisateur dans une variable et de la valeur pour déterminer si c'est un succès ou une erreur
    $notification = "<b>Sélection d'utilisateur(s) supprimée avec succès !</b>";
    $result_notification = true ;

    //ajout des variables dans une variable de session pour l'index
    $_SESSION['notifications']['message'] = $notification ;
    $_SESSION['notifications']['result'] = $result_notification;

    //CHoix de la couleur du message en fonction de réussite ou non
    if (null !== (['notifications'])) {
        $color_notification = $_SESSION['notifications']['result'] == true ? 'success' : 'danger';
    }

    //Ajout de la classe couleur dans $color_notification
    $_SESSION['notifications']['color'] = $color_notification;

    //Redirection à la page "users.php" après suppression du/des comptes utilisateurs sélectionnés
    echo "<script type='text/javascript'>document.location.replace('users.php');</script>";
    exit();
}



/*********************** ACTIONS SUR LES AUTEURS ************************/
/************************** Ajout auteur **************************/
if (isset($_POST['ajouter_auteur'])) {
    //print_r2($_POST);
    //print_r2($_FILES);

    /* Requete SQL Insert dans la table "auteurs" */
    $sql_insert = "INSERT INTO auteurs (nom,prenom) VALUES (:nom, :prenom)";

    //Sécurisation des données envoyées
    $sth = $bdd->prepare($sql_insert);
    $sth->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $sth->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $result = $sth->execute();

    //Ajout du texte pour l'utilisateur dans une variable et de la valeur pour déterminer si c'est un succès ou une erreur
    $notification = "<b>Auteur ajouté avec succès !</b>";
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

    //Redirection à la page "authors.php" après ajout d'un auteur
    echo "<script type='text/javascript'>document.location.replace('authors.php');</script>";
    exit();
}

/************************** Suppression auteur **************************/
//Récup. du Submit 'supprimer_auteur' et des paramètres envoyés
if (isset($_REQUEST['supprimer_auteur'])) {
    $checkbox = $_REQUEST['checkbox'];

    //Boucle for pour parcourir l'ensemble des données reçues
    //en fonction du nombre d'éléments à supprimer
    for ($i=0;$i<count($checkbox);$i++) {
        $del_id = $checkbox[$i];
        $sql_delete = "DELETE FROM auteurs WHERE id='$del_id';";
        $sql_update = "UPDATE articles SET id_auteur = 0 WHERE id_auteur = '$del_id';";
        //Préparation à l'exécution des requêtes
        $sth = $bdd->prepare($sql_delete);
        $sth_update = $bdd->prepare($sql_update);
        //Exécution des requêtes
        $sth->execute();
        $sth_update->execute();
    }

    //Ajout du texte pour l'utilisateur dans une variable et de la valeur pour déterminer si c'est un succès ou une erreur
    $notification = "<b>Sélection d'auteur(s) supprimée avec succès !</b>";
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

    //Redirection à la page "authors.php" après suppression du/des auteurs sélectionnés
    echo "<script type='text/javascript'>document.location.replace('authors.php');</script>";
    exit();
}
