<?php
try{
  $bdd = new PDO('mysql:host=localhost;dbname=ASR_PROJ_PHP2_BLOG;charset=utf8','user','pass');
  $bdd->exec("set names utf8");
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
  die('Erreur : ' . $e->getMessage());
}
?>
