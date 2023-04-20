<?php
require_once('./classes/listeClass.php');
$catblues=new Catblues($db);
$liste=$catblues->selectAll();
echo '<table class="table"><thead><tr><th>Titre des catégories de l\'histoire du Blues :</th><th></th><th></th></tr></thead><tbody>';
foreach($liste as $uncatblues)
{
echo '<tr><td>'.$uncatblues['titre_catblues'].'</td><td><a class="btn btn-info" href=indexAdmin.php?page=modifierCatblues&id='.$uncatblues['num_catblues'].'>Modifier</a></td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimercatblues&id='.$uncatblues['num_catblues'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
