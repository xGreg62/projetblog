<?php
/* Smarty version 3.1.33, created on 2019-01-27 23:09:09
  from '/Applications/MAMP/htdocs/projetBlogV3/assets/smarty_tpl/users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c4e2c05ef8e31_07884076',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7dd33aa3b90a68813b7d90ba5fe440814d37d818' => 
    array (
      0 => '/Applications/MAMP/htdocs/projetBlogV3/assets/smarty_tpl/users.tpl',
      1 => 1547321236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c4e2c05ef8e31_07884076 (Smarty_Internal_Template $_smarty_tpl) {
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
      <h1 class="mt-5">Ajouter un utilisateur</h1>
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

        <div class="form-group">
          <label for="email" class="col-form-label">Adresse mail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Adresse mail" value="" required>
        </div>

        <div class="form-group">
          <label for="texte">Mot de passe</label>
          <input  type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" value="" required>
        </div>

        <button type="submit" class="btn btn-classic bg-red" name="ajouter_usr" value="Ajouter_usr">Ajouter l'utilisateur</button>
      </form>
    </div>
  </div>

  <div class="col-lg-12 text-center">
    <h1 class="mt-5">Supprimer un utilisateur</h1>
    <br>
  </div>

  <form class="col-lg-12 text-center" action="actions.php" method="POST">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Sélection des utilisateurs à supprimer</th>
          <th scope="col">Utilisateur</th>
          <th scope="col">Adresse mail</th>
          <th scope="col">SID</th>
        </tr>
      </thead>
      <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_utilisateurs']->value, 'utilisateur');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['utilisateur']->value) {
?>
        <tr>
          <td class="verticalAlCenter"><input type="checkbox" class="checkbox" name="checkbox[]" value="<?php echo $_smarty_tpl->tpl_vars['utilisateur']->value['id'];?>
"></input></td>
          <td><p class="bold" name="nom"><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['utilisateur']->value['prenom'];?>
</p></td>
          <td><p class="bold" name="email"><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value['email'];?>
</p></td>
          <td><p class="bold" name="sid"><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value['sid'];?>
</p></td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </tbody>
    </table>
    <button type="submit" class="btn btn-dark center" name="supprimer_usr" value="Delete">Supprimer la sélection</button>
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
