{**********Affichage de la page lorsqu'on est connecté**********}
{if $is_logged_in == TRUE}
<!-- Page Content -->
<div class="container div_maincontent">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Résultat de la recherche</h1>
    </div>

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
      <p class="lead">{$count} résultat(s)</p>
    </div>

    {foreach $tab_articles as $article}
    <div class="col-lg-6 margin">
      <div class="card">
        <img class="card-img-top" src="assets/imgs/{$article.id}.jpg" alt="Pas d'image">
        <div class="card-body">
          <h5 class="card-title">{$article.titre}</h5>
          <p class="card-text"><b>Article publié ? {if {$article.publie} == 1}Oui{else}Non{/if}</b></p>
          <p>{$article.nom} {$article.prenom}</p>
          <p>{$article.texte}... <a href="article.php?type=read&id={$article.id}">Lire la suite</a></p>
          <p class="card-text">{$article.datefr}</p>
          <p class="card-text">{$article.nb} commentaire(s)</p>
          <a href="article.php?type=read&id={$article.id}" class="btn btn-classic bg-red">Lire l'article</a>
          <a href="article.php?type=edit&id={$article.id}" class="btn btn-warning">Modifier l'article</a>
          <a href="article.php?type=delete&id={$article.id}" class="btn btn-danger">Supprimer l'article</a>
        </div>
      </div>
    </div>
    {/foreach}

    <div class="col-lg-12 text-center margin">
      <a href="index.php" class="btn btn-classic bg-red">Retour</a>
    </div>
  </div>
</div>
</div>
{/if}


{**********Affichage de la page lorsqu'on n'est pas connecté**********}
{if $is_logged_in == FALSE}
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
      <h1 class="mt-5">Résultat de la recherche</h1>
    </div>


    <div class="col-lg-12 text-center">
      <p class="lead">{$count} résultat(s)</p>
    </div>


    {foreach $tab_articles as $article}
    <div class="col-md-6 margin">
      <div class="card">
        <img class="card-img-top" src="assets/imgs/{$article.id}.jpg" alt="Pas d'image">
        <div class="card-body">
          <h5 class="card-title">{$article.titre}</h5>
          <p>{$article.nom} {$article.prenom}</p>
          <p>{$article.texte}... <a href="article.php?type=read&id={$article.id}">Lire la suite</a></p>
          <p class="card-text">{$article.datefr}</p>
          <p class="card-text">{$article.nb} commentaire(s)</p>
          <a href="article.php?type=read&id={$article.id}" class="btn btn-classic bg-red">Lire l'article</a>
        </div>
      </div>
    </div>
    {/foreach}

    <div class="col-lg-12 text-center margin">
      <a href="index.php" class="btn btn-classic bg-red">Retour</a>
    </div>
  </div>
</div>
</div>
{/if}
