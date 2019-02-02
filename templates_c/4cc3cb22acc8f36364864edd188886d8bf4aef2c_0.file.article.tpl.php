<?php
/* Smarty version 3.1.33, created on 2019-01-27 15:21:42
  from '/Applications/MAMP/htdocs/projetBlog/assets/smarty_tpl/article.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c4dbe76eefb95_74204229',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4cc3cb22acc8f36364864edd188886d8bf4aef2c' => 
    array (
      0 => '/Applications/MAMP/htdocs/projetBlog/assets/smarty_tpl/article.tpl',
      1 => 1548598827,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c4dbe76eefb95_74204229 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['type']->value == 'read') {?>
<!-- Page Content -->
<div class="container div_maincontent">
  <div class="row">
    <div class="col-lg-12 text-center">
      <?php if (isset($_smarty_tpl->tpl_vars['session_var']->value['notifications'])) {?>
      <div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['session_var']->value['notifications']['color'];?>
 alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <?php echo $_smarty_tpl->tpl_vars['session_var']->value['notifications']['message'];?>

      </div>
      <?php }?>
    </div>

    <div class="col-lg-12 text-center">
      <h1><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_article']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
echo $_smarty_tpl->tpl_vars['article']->value['titre'];?>
</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 text-center margin">
        <div class="col-lg-7 text-center center">
            <p>Écrit par <b><?php echo $_smarty_tpl->tpl_vars['article']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['article']->value['prenom'];?>
</b> le <b><?php echo $_smarty_tpl->tpl_vars['article']->value['datefr'];?>
</b></p>
            <img class="card-img-top margin" src="assets/imgs/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
.jpg" alt="Pas d'image">
        </div>
        <div class="col-lg-10 text-center center">
          <p><?php echo $_smarty_tpl->tpl_vars['article']->value['texte'];?>
</p>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
                                            <?php if ($_smarty_tpl->tpl_vars['nb_result_coms']->value != 0) {?>
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_coms']->value, 'com');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['com']->value) {
?>
                        <li class="media">
                          <a class="pull-left" href="#">
                            <img class="media-object img-circle" src="assets/imgs/0000.png" alt="profile">
                          </a>
                          <div class="media-body">
                            <div class="well well-lg">
                                <h4 class="media-heading text-uppercase reviews"><?php echo $_smarty_tpl->tpl_vars['com']->value['pseudo'];?>
</h4>
                                <ul class="media-date text-uppercase reviews list-inline">
                                  <li class="dd"><?php echo $_smarty_tpl->tpl_vars['com']->value['date'];?>
</li>
                                </ul>
                                <p class="media-comment">
                                  <?php echo $_smarty_tpl->tpl_vars['com']->value['message'];?>

                                </p>
                            </div>
                          </div>
                        </li>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                <?php } else { ?>
                        <li class="media">
                          <div class="media-body">
                            <div class="well well-lg">
                              <p class="media-comment">Aucun commentaire trouvé.</p>
                              <p class="media-comment">Soyez le premier à laisser un commentaire sur cet article !</p>
                            </div>
                          </div>
                        </li>
                        <?php }?>
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
                              <label for="pseudo" class="col-sm-2 control-label">Pseudo*</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="pseudo" name="pseudo" value="">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="message" class="col-sm-2 control-label">Votre commentaire</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" name="message" id="message" rows="5"></textarea>
                              </div>
                          </div>

                          <input type="hidden" id="art_id" name="art_id" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">
                          <input type="hidden" value="<?php echo date('Y-m-d');?>
" class="form-control col-md-4 center text-center" id="datemsg" name="datemsg" required>

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
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['type']->value == 'default' && $_smarty_tpl->tpl_vars['is_logged_in']->value == TRUE) {?>
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
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_auteurs']->value, 'auteur');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['auteur']->value) {
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['auteur']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['auteur']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['auteur']->value['prenom'];?>

            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </select>
        </div>

        <div class="form-group">
          <label for="auteur" class="col-form-label">Date d'écriture de l'article</label>
          <input type="date" value="<?php echo date('Y-m-d');?>
" class="form-control col-md-4 center text-center" id="datefr" name="datefr" required>
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
<?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 'default' && $_smarty_tpl->tpl_vars['is_logged_in']->value == FALSE) {?>
<!-- Page Content -->
<div class="container div_maincontent">
  <div class="row">
    <div class="col-lg-12 text-center center">
      <h1>Connectez-vous pour accéder à cette page !!</h1>
      <a href="login.php" class="btn btn-classic bg-red">Se connecter</a>
    </div>
  </div>
</div>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['type']->value == 'edit' && $_smarty_tpl->tpl_vars['is_logged_in']->value == TRUE) {?>
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
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_article']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
          <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre de l'article" required value="<?php echo $_smarty_tpl->tpl_vars['article']->value['titre'];?>
">
        </div>

        <div class="form-group">
          <label for="texte">Texte</label>
          <textarea class="form-control" id="texte" name="texte" rows="3" required><?php echo $_smarty_tpl->tpl_vars['article']->value['texte'];?>
</textarea>
        </div>

        <div class="form-group">
          <label for="auteur" class="col-form-label">Auteur</label>
          <select id="auteur" name="auteur" value="" required>
            <option selected value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id_auteur'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['article']->value['prenom'];?>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_auteurs']->value, 'auteur');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['auteur']->value) {
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['auteur']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['auteur']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['auteur']->value['prenom'];?>

            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </select>
        </div>

        <div class="form-group ">
          <label for="auteur" class="col-form-label">Date d'écriture de l'article</label>
          <input type="text" class="form-control text-center center col-md-4" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['datefr'];?>
" id="datefr" name="datefr" required>
        </div>

        <div class="form-group">
          <label>Image actuelle</label>
          <img class="card-img-top margin" src="assets/imgs/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
.jpg" alt="Pas d'image">
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
              <input class="form-check-input" name="publie" id="publie" type="checkbox" <?php ob_start();
echo $_smarty_tpl->tpl_vars['article']->value['publie'];
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1 == 1) {?> value="1" checked<?php }?> > Publié ?</input>
            </label>
          </div>
        </div>

        <input type="hidden" id="art_id" name="art_id" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        <a href="index.php" class="btn btn-classic bg-red margin">Annuler</a>
        <button type="submit" class="btn btn-classic bg-red margin" name="modifier" value="Modifier">Modifier l'article</button>
      </form>
    </div>
  </div>
</div>
<?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 'edit' && $_smarty_tpl->tpl_vars['is_logged_in']->value == FALSE) {?>
<!-- Page Content -->
<div class="container div_maincontent">
  <div class="row">
    <div class="col-lg-12 text-center center">
      <h1>Connectez-vous pour accéder à cette page !!</h1>
      <a href="login.php" class="btn btn-classic bg-red">Se connecter</a>
    </div>
  </div>
</div>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['type']->value == 'delete' && $_smarty_tpl->tpl_vars['is_logged_in']->value == TRUE) {?>
<!-- Page Content -->
<div class="container div_maincontent">
  <div class="row">
    <div class="col-lg-6 text-center center">
      <form action="actions.php" method="post" enctype="multipart/form-data" id="form_article">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_article']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
        <div class="form-group">
          <h1>Êtes-vous sûr de vouloir supprimer "<?php echo $_smarty_tpl->tpl_vars['article']->value['titre'];?>
" ?</h1>
        </div>

        <input type="hidden" id="art_id" name="art_id" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        <a href="index.php" class="btn btn-classic bg-red">Non</a>
        <button type="submit" class="btn btn-classic bg-dark-red" name="supprimer" value="Modifier">Oui</button>
      </form>
    </div>
  </div>
</div>
<?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 'delete' && $_smarty_tpl->tpl_vars['is_logged_in']->value == FALSE) {?>
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
<?php }
}
}
