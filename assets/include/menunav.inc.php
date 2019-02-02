<!-- Navigation -->
<div class="div_mainnav">
  <nav class="navbar navbar-expand-lg navbar-dark bg-red static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Gerg Blog | </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
          <input class="form-control mr-sm-2" name="rechercher" id="rechercher" type="search" placeholder="Rechercher un article, livre...">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Go !</button>
        </form>
        <ul class="navbar-nav ml-auto">
          <?php
          if(isset($_COOKIE['sid'])){
          echo "
                    <li class=\"nav-item\">
                      <a class=\"nav-link\" href=\"index.php\">Accueil</a>
                    </li>
                    <li class=\"nav-item\">
                      <a class=\"nav-link\" href=\"article.php\">Articles</a>
                    </li>
                    <li class=\"nav-item\">
                      <a class=\"nav-link\" href=\"authors.php\">Auteurs</a>
                    </li>
                    <li class=\"nav-item\">
                      <a class=\"nav-link\" href=\"users.php\">Utilisateurs</a>
                    </li>
                    <li class=\"nav-item\">
                      <a class=\"nav-link\" href=\"logout.php\">Déconnexion de ".$prenom_usr."</a>
                    </li>" ;
          }else{
            echo "
                    <li class=\"nav-item\">
                      <a class=\"nav-link\" href=\"index.php\">Accueil</a>
                    </li>";
                    /*<li class=\"nav-item\">
                      <a class=\"nav-link\" href=\"signup.php\">Inscription</a>
                    </li>";*/
            echo  "
                    <li class=\"nav-item\">
                      <a class=\"nav-link\" href=\"login.php\">Connexion</a>
                    </li>";
          }
          ?>

        </ul>
      </div>
    </div>
  </nav>
</div>
