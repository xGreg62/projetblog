<?php
/* Smarty version 3.1.33, created on 2019-01-13 11:11:39
  from '/Applications/MAMP/htdocs/projetBlogV2/assets/smarty_tpl/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c3b0edb7c2da1_97887406',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fd799ec9fa86e4121ee28e5753a7dc42da87aa3' => 
    array (
      0 => '/Applications/MAMP/htdocs/projetBlogV2/assets/smarty_tpl/login.tpl',
      1 => 1547324351,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c3b0edb7c2da1_97887406 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
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
<?php }
}
