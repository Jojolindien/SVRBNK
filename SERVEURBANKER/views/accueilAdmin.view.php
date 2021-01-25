<?php ob_start(); ?>

<?php 
$content= ob_get_clean();
$titre = "Page Administrateur du site";
require "views/commons/template.php";