{**********Page affichée que lorsqu'on est connecté**********}
{if $is_logged_in == FALSE}
<!-- Page Content -->
  <div class="container div_maincontent">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">S'inscrire</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3 text-center center">
        <form action="signup.php" method="post" enctype="multipart/form-data" id="form_users">
          <div class="form-group">
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" value="" required>
          </div>

          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Adresse mail" value="" required>
          </div>

          <div class="form-group">
            <input  type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" value="" required>
          </div>

          <button type="submit" class="btn btn-classic bg-red" name="inscription_usr" value="Inscription_usr">S'inscrire</button>
        </form>
      </div>
    </div>
  </div>


  {**********Page affichée lorsqu'on est déjà connecté (signifie qu'on est inscrit)**********}
  {elseif $is_logged_in == TRUE}
  <!-- Page Content -->
  <div class="container div_maincontent">
    <div class="row">
      <div class="col-lg-12 text-center center">
        <h1>Vous êtes déjà inscrit, pas besoin de vous réinscrire !!</h1>
        <a href="index.php" class="btn btn-classic bg-red">Retour</a>
      </div>
    </div>
  </div>
  {/if}
