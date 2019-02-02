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

      <h1 class="mt-5">Connexion</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-3 text-center center">
      <form action="login.php" method="post" enctype="multipart/form-data" id="form_login">
        <div class="form-group">
          <input type="email" class="form-control" id="email" name="email" placeholder="Adresse mail" value="" required>
        </div>
        <div class="form-group">
          <input  type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" value="" required>
        </div>
        <button type="submit" class="btn btn-classic bg-red" name="connexion_usr" value="Connexion_usr">Se connecter</button>
      </form>
    </div>
  </div>
</div>
