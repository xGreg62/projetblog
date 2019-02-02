<?php
/* Smarty version 3.1.33, created on 2019-01-13 10:32:20
  from '/var/www/html/projetBlog/assets/smarty_tpl/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c3b13b4b8de87_66898875',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b0194527075541b921b0da6ab3ca5f12b7966f9' => 
    array (
      0 => '/var/www/html/projetBlog/assets/smarty_tpl/index.tpl',
      1 => 1547326287,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c3b13b4b8de87_66898875 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['is_logged_in']->value == TRUE) {?>
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
      <h1 class="mt-5">Bienvenue sur le Gerg Blog</h1>
      <p class="lead">Ci-dessous une petite liste des articles sur les livres lus qui se trouvent sur le blog.</p>
      <br>
    </div>

    <div class="col-lg-12 text-center">
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
          <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['nb_pages_connecte']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nb_pages_connecte']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
          <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
          <?php }
}
?>
        </ul>
      </nav>
    </div>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_articles']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
    <div class="col-sm-6 margin">
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
      <h1 class="mt-5">Bienvenue sur le Gerg Blog</h1>
      <p class="lead">Ci-dessous une petite liste des articles sur les livres lus qui se trouvent sur le blog.</p>
      <br>
    </div>

    <div class="col-lg-12 text-center">
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
          <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['nb_pages_non_connecte']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nb_pages_non_connecte']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
          <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
          <?php }
}
?>
        </ul>
      </nav>
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
  </div>
</div>
<?php }
}
}
