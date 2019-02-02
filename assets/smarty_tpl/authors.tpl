{**********Page affichée que lorsqu'on est connecté**********}
{if $is_logged_in == TRUE}
<!-- Page Content -->
<div class="container div_maincontent margin">
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
      
      <h1 class="mt-5">Ajouter un auteur</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 text-center center">
      <form action="actions.php" method="post" enctype="multipart/form-data" id="form_users">
        <div class="form-group">
          <label for="nom" class="col-form-label">Nom</label>
          <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="" required>
        </div>

        <div class="form-group">
          <label for="prenom" class="col-form-label">Prénom</label>
          <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" value="" required>
        </div>

        <button type="submit" class="btn btn-classic bg-red" name="ajouter_auteur" value="Ajouter_auteur">Ajouter l'auteur</button>
      </form>
    </div>
  </div>

  <div class="col-lg-12 text-center">
    <h1 class="mt-5">Supprimer un auteur</h1>
    <br>
  </div>

  <form class="col-lg-12 text-center" action="actions.php" method="POST">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Sélection des auteurs à supprimer</th>
          <th scope="col">Nom</th>
          <th scope="col">Prénom</th>
        </tr>
      </thead>
      <tbody>
        {foreach $tab_auteurs as $auteur}
        <tr><td class="verticalAlCenter"><input type="checkbox" class="checkbox" name="checkbox[]" value="{$auteur.id}"></input></td>
        <td><p class="bold" name="nom">{$auteur.nom}</p></td>
        <td><p class="bold" name="email">{$auteur.prenom}</p></td></tr>
        {/foreach}
      </tbody>
    </table>
    <button type="submit" class="btn btn-dark center" name="supprimer_auteur" value="Delete">Supprimer la sélection</button>
  </form>
</div>


{**********Page affichée lorsqu'on n'est pas connecté**********}
{elseif $is_logged_in == FALSE}
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
