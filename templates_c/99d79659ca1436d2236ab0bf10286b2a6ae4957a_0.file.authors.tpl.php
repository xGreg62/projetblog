<?php
/* Smarty version 3.1.33, created on 2019-01-13 11:10:31
  from '/Applications/MAMP/htdocs/projetBlogV2/assets/smarty_tpl/authors.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c3b0e9750c114_55128634',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99d79659ca1436d2236ab0bf10286b2a6ae4957a' => 
    array (
      0 => '/Applications/MAMP/htdocs/projetBlogV2/assets/smarty_tpl/authors.tpl',
      1 => 1547324357,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c3b0e9750c114_55128634 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['is_logged_in']->value == TRUE) {?>
<!-- Page Content -->
<div class="container div_maincontent margin">
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
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_auteurs']->value, 'auteur');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['auteur']->value) {
?>
        <tr><td class="verticalAlCenter"><input type="checkbox" class="checkbox" name="checkbox[]" value="<?php echo $_smarty_tpl->tpl_vars['auteur']->value['id'];?>
"></input></td>
        <td><p class="bold" name="nom"><?php echo $_smarty_tpl->tpl_vars['auteur']->value['nom'];?>
</p></td>
        <td><p class="bold" name="email"><?php echo $_smarty_tpl->tpl_vars['auteur']->value['prenom'];?>
</p></td></tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </tbody>
    </table>
    <button type="submit" class="btn btn-dark center" name="supprimer_auteur" value="Delete">Supprimer la sélection</button>
  </form>
</div>


<?php } elseif ($_smarty_tpl->tpl_vars['is_logged_in']->value == FALSE) {?>
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
