<?php
/* Smarty version 3.1.33, created on 2019-01-13 11:10:37
  from '/Applications/MAMP/htdocs/projetBlogV2/assets/smarty_tpl/search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c3b0e9d054cc0_07054772',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1645cc2962657e44c3215b3708e66cb74a6605b' => 
    array (
      0 => '/Applications/MAMP/htdocs/projetBlogV2/assets/smarty_tpl/search.tpl',
      1 => 1547326278,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c3b0e9d054cc0_07054772 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['is_logged_in']->value == TRUE) {?>
<!-- Page Content -->
<div class="container div_maincontent">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Résultat de la recherche</h1>
    </div>

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
      <p class="lead"><?php echo $_smarty_tpl->tpl_vars['count']->value;?>
 résultat(s)</p>
    </div>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_articles']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
    <div class="col-lg-6 margin">
      <div class="card">
        <img class="card-img-top" src="assets/imgs/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
.jpg" alt="Pas d'image">
        <div class="card-body">
          <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['article']->value['titre'];?>
</h5>
          <p class="card-text"><b>Article publié ? <?php ob_start();
echo $_smarty_tpl->tpl_vars['article']->value['publie'];
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1 == 1) {?>Oui<?php } else { ?>Non<?php }?></b></p>
          <p><?php echo $_smarty_tpl->tpl_vars['article']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['article']->value['prenom'];?>
</p>
          <p><?php echo $_smarty_tpl->tpl_vars['article']->value['texte'];?>
</p>
          <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['article']->value['datefr'];?>
</p>
          <a href="article.php?type=read&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="btn btn-classic bg-red">Voir l'article</a>
          <a href="article.php?type=edit&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="btn btn-warning">Modifier l'article</a>
          <a href="article.php?type=delete&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="btn btn-danger">Supprimer l'article</a>
        </div>
      </div>
    </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <div class="col-lg-12 text-center margin">
      <a href="index.php" class="btn btn-classic bg-red">Retour</a>
    </div>
  </div>
</div>
</div>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['is_logged_in']->value == FALSE) {?>
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
      <h1 class="mt-5">Résultat de la recherche</h1>
    </div>


    <div class="col-lg-12 text-center">
      <p class="lead"><?php echo $_smarty_tpl->tpl_vars['count']->value;?>
 résultat(s)</p>
    </div>


    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_articles']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
    <div class="col-md-6 margin">
      <div class="card">
        <img class="card-img-top" src="assets/imgs/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
.jpg" alt="Pas d'image">
        <div class="card-body">
          <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['article']->value['titre'];?>
</h5>
          <p><?php echo $_smarty_tpl->tpl_vars['article']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['article']->value['prenom'];?>
</p>
          <p><?php echo $_smarty_tpl->tpl_vars['article']->value['texte'];?>
</p>
          <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['article']->value['datefr'];?>
</p>
          <a href="article.php?type=read&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="btn btn-classic bg-red">Voir l'article</a>
        </div>
      </div>
    </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <div class="col-lg-12 text-center margin">
      <a href="index.php" class="btn btn-classic bg-red">Retour</a>
    </div>
  </div>
</div>
</div>
<?php }
}
}
