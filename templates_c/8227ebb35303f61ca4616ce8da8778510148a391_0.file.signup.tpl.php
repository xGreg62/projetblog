<?php
/* Smarty version 3.1.33, created on 2019-01-13 11:11:38
  from '/Applications/MAMP/htdocs/projetBlogV2/assets/smarty_tpl/signup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c3b0eda4f0771_68280276',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8227ebb35303f61ca4616ce8da8778510148a391' => 
    array (
      0 => '/Applications/MAMP/htdocs/projetBlogV2/assets/smarty_tpl/signup.tpl',
      1 => 1547316796,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c3b0eda4f0771_68280276 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['is_logged_in']->value == FALSE) {?>
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


    <?php } elseif ($_smarty_tpl->tpl_vars['is_logged_in']->value == TRUE) {?>
  <!-- Page Content -->
  <div class="container div_maincontent">
    <div class="row">
      <div class="col-lg-12 text-center center">
        <h1>Vous êtes déjà inscrit, pas besoin de vous réinscrire !!</h1>
        <a href="index.php" class="btn btn-classic bg-red">Retour</a>
      </div>
    </div>
  </div>
  <?php }
}
}
