{**********Type de lecture d'article**********}
{if $type == read}
<!-- Page Content -->
<div class="container div_maincontent">
  <div class="row">
    <div class="col-lg-12 text-center">
      {if isset($session_var.notifications)}
      <div class="alert alert-{$session_var.notifications.color} alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        {$session_var.notifications.message}
      </div>
      {/if}
    </div>

    <div class="col-lg-12 text-center">
      <h1>{$tab_article[0].titre}</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 text-center margin">
        <div class="col-lg-7 text-center center">
            <p>Écrit par <b>{$tab_article[0].nom} {$tab_article[0].prenom}</b> le <b>{$tab_article[0].datefr}</b></p>
            <img class="card-img-top margin" src="assets/imgs/{$tab_article[0].id}.jpg" alt="Pas d'image">
        </div>
        <div class="col-lg-10 text-center center">
          <p>{$tab_article[0].texte}</p>
        </div>
        <a href="index.php" class="btn btn-classic bg-red">Retour</a>
    </div>
  </div>

  <div class="container margin">
    <div class="row">
      <div class="col-lg-12">
          <div class="page-header">
              <h3 class="reviews">Laissez votre commentaire !</h3>
          </div>
          <div class="comment-tabs">
              <ul class="nav nav-tabs" role="tablist">
                  <li id="commentaires" class="active"><a href="#comments-display" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Commentaires</h4></a></li>
                  <li id="ajout_comm"><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Ajouter un commentaire</h4></a></li>
              </ul>
              <div class="tab-content">
                  <div class="tab-pane active" id="comments-display">
                      <ul class="media-list">
                      {**********Si $tab_article[0].id_article est différent de NULL/vide alors on affiche les commentaires**********}
                      {if {$tab_article[0].id_article} != NULL}
                      {foreach $tab_article as $com}
                        <li class="media">
                          <a class="pull-left" href="#">
                            <img class="media-object img-circle" src="assets/imgs/0000.png" alt="profile">
                          </a>
                          <div class="media-body">
                            <div class="well well-lg">
                                <h4 class="media-heading text-uppercase reviews">{if $com.pseudo == ''}{$com.email}{else}{$com.pseudo}{/if}</h4>
                                <ul class="media-date text-uppercase reviews list-inline">
                                  <li class="dd">{$com.datemsg}</li>
                                </ul>
                                <p class="media-comment">
                                  {$com.message}
                                </p>
                            </div>
                          </div>
                        </li>
                        {/foreach}
                        {**********Sinon cela signifie que $tab_article[0].id_article est à NULL/vide et donc aucun commentaire trouvé**********}
                        {else}
                        <li class="media">
                          <div class="media-body">
                            <div class="well well-lg">
                              <p class="media-comment">Aucun commentaire trouvé.</p>
                              <p class="media-comment">Soyez le premier à laisser un commentaire sur cet article !</p>
                            </div>
                          </div>
                        </li>
                        {/if}
                      </ul>
                  </div>
                  <div class="tab-pane" id="add-comment">
                      <form action="actions.php" onsubmit="return checkForm()" method="post" class="form-horizontal" id="commentForm">
                          <div class="form-group">
                              <label for="email" class="col-sm-2 control-label">E-mail*</label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="pseudo" class="col-sm-2 control-label">Pseudo</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="pseudo" name="pseudo" value="">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="message" class="col-sm-2 control-label">Votre commentaire*</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" name="message" id="message" rows="5"></textarea>
                              </div>
                          </div>

                          <input type="hidden" id="art_id" name="art_id" value="{$tab_article[0].id}">
                          <input type="hidden" value="{date('Y-m-d')}" class="form-control col-md-4 center text-center" id="datemsg" name="datemsg" required>

                          <div class="form-group">
                              <div class="col-sm-offset-2 col-lg-12 text-center">
                                  <button type="submit" id="submitComment" class="btn btn-classic bg-red" name="addComment" value="addComment">Ajouter un commentaire</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
  	    </div>
      </div>
  </div>
</div>
{/if}


{**********Type par défaut -> Ajout d'article**********}
{***********Page affichée si on est connecté***********}
{if $type == default && $is_logged_in == TRUE}
<!-- Page Content -->
<div class="container div_maincontent">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Ajouter un article</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 text-center center">
      <form action="actions.php" method="post" enctype="multipart/form-data" id="form_article">
        <div class="form-group">
          <label for="titre" class="col-form-label">Titre</label>
          <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre de l'article" value="" required>
        </div>

        <div class="form-group">
          <label for="texte">Texte</label>
          <textarea class="form-control" id="texte" name="texte" rows="3" required></textarea>
        </div>

        <div class="form-group">
          <label for="auteur" class="col-form-label">Auteur</label>
          <select id="auteur" name="auteur" value="" required>
            {foreach $tab_auteurs as $auteur}
              <option value="{$auteur.id}">{$auteur.nom} {$auteur.prenom}
            {/foreach}
          </select>
        </div>

        <div class="form-group">
          <label for="auteur" class="col-form-label">Date d'écriture de l'article</label>
          <input type="date" value="{date('Y-m-d')}" class="form-control col-md-4 center text-center" id="datefr" name="datefr" required>
        </div>

        <div class="form-group">
          <div class="custom-file">
            <input type="file" id="image" name="image" class="custom-file-input">
            <label class="custom-file-label" for="image">Ajouter une image(.jpg <2MB obligatoire)</label>
          </div>
        </div>

        <div class="form-group">
          <div class="form-check">
            <label for="publie" class="form-check-label">
              <input class="form-check-input" name="publie" id="publie" type="checkbox" value="1" checked>Publié ?</input>
            </label>
          </div>
        </div>

        <button type="submit" class="btn btn-classic bg-red" name="ajouter" value="Ajouter">Ajouter l'article</button>
      </form>
    </div>
  </div>
</div>
{***********Page affichée si on est pas connecté***********}
{elseif $type == default && $is_logged_in == FALSE}
<!-- Page Content -->
<div class="container div_maincontent">
  <div class="row">
    <div class="col-lg-12 text-center center">
      <h1>Connectez-vous pour accéder à cette page !!</h1>
      <a href="login.php" class="btn btn-classic bg-red">Se connecter</a>
    </div>
  </div>
</div>
{/if}


{**********Type d'édition d'article**********}
{******Page affichée si on est connecté******}
{if $type == edit && $is_logged_in == TRUE}
<!-- Page Content -->
<div class="container div_maincontent">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Modifier un article</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 text-center center">
      <form action="actions.php" method="post" enctype="multipart/form-data" id="form_article">
        <div class="form-group">
          <label for="titre" class="col-form-label">Titre</label>
          {foreach $tab_article as $article}
          <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre de l'article" required value="{$article.titre}">
        </div>

        <div class="form-group">
          <label for="texte">Texte</label>
          <textarea class="form-control" id="texte" name="texte" rows="3" required>{$article.texte}</textarea>
        </div>

        <div class="form-group">
          <label for="auteur" class="col-form-label">Auteur</label>
          <select id="auteur" name="auteur" value="" required>
            <option selected value="{$article.id_auteur}">{$article.nom} {$article.prenom}
            {foreach $tab_auteurs as $auteur}
            <option value="{$auteur.id}">{$auteur.nom} {$auteur.prenom}
            {/foreach}
          </select>
        </div>

        <div class="form-group ">
          <label for="auteur" class="col-form-label">Date d'écriture de l'article</label>
          <input type="text" class="form-control text-center center col-md-4" value="{$article.datefr}" id="datefr" name="datefr" required>
        </div>

        <div class="form-group">
          <label>Image actuelle</label>
          <img class="card-img-top margin" src="assets/imgs/{$article.id}.jpg" alt="Pas d'image">
        </div>

        <div class="form-group">
          <div class="custom-file">
            <input type="file" id="image" name="image" class="custom-file-input">
            <label class="custom-file-label" for="image">Modifier l'image (.jpg <2MB obligatoire)</label>
          </div>
        </div>

        <div class="form-group">
          <div class="form-check">
            <label for="publie" class="form-check-label">
              <input class="form-check-input" name="publie" id="publie" type="checkbox" {if {$article.publie} == 1} value="1" checked{/if} > Publié ?</input>
            </label>
          </div>
        </div>

        <input type="hidden" id="art_id" name="art_id" value="{$article.id}">
        {/foreach}

        <a href="index.php" class="btn btn-classic bg-red margin">Annuler</a>
        <button type="submit" class="btn btn-classic bg-red margin" name="modifier" value="Modifier">Modifier l'article</button>
      </form>
    </div>
  </div>
</div>
{******Page affichée si on est pas connecté******}
{elseif $type == edit && $is_logged_in == FALSE}
<!-- Page Content -->
<div class="container div_maincontent">
  <div class="row">
    <div class="col-lg-12 text-center center">
      <h1>Connectez-vous pour accéder à cette page !!</h1>
      <a href="login.php" class="btn btn-classic bg-red">Se connecter</a>
    </div>
  </div>
</div>
{/if}


{**********Type de suppression d'article**********}
{********Page affichée si on est connecté*********}
{if $type == delete && $is_logged_in == TRUE}
<!-- Page Content -->
<div class="container div_maincontent">
  <div class="row">
    <div class="col-lg-6 text-center center">
      <form action="actions.php" method="post" enctype="multipart/form-data" id="form_article">
        {foreach $tab_article as $article}
        <div class="form-group">
          <h1>Êtes-vous sûr de vouloir supprimer "{$article.titre}" ?</h1>
        </div>

        <input type="hidden" id="art_id" name="art_id" value="{$article.id}">
        {/foreach}

        <a href="index.php" class="btn btn-classic bg-red">Non</a>
        <button type="submit" class="btn btn-classic bg-dark-red" name="supprimer" value="Modifier">Oui</button>
      </form>
    </div>
  </div>
</div>
{******Page affichée si on est pas connecté********}
{elseif $type == delete && $is_logged_in == FALSE}
<!-- Page Content -->
<!-- Page Content -->
<div class="container div_maincontent">
  <div class="row">
    <div class="col-lg-12 text-center center">
      <h1>Connectez-vous pour accéder à cette page !!</h1>
      <a href="login.php" class="btn btn-classic bg-red">Se connecter</a>
    </div>
  </div>
</div>
{/if}
