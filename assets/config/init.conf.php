<?php
//Affichage des erreurs et avertissements
error_reporting(E_ALL);
ini_set("display_errors", 1);

function print_r2($param) {
  echo '<pre>';
  print_r($param);
  echo '</pre>';
}

define('_nb_art_page',2);
?>
