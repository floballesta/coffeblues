<?php
require_once('./classes/listeClass.php');
$morceau=new Morceau($db);
$liste=$morceau->selectAll();
echo '<table class="table"><thead><tr><th>Titre du morceau :</th><th></th><th></th></tr></thead><tbody>';
foreach($liste as $unMorceau)
{
echo '<tr><td>'.$unMorceau['titre_morceau'].'</td><td><a class="btn btn-info" href=indexAdmin.php?page=modifierMorceau&id='.$unMorceau['num_morceau'].'>Modifier</a></td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerMorceau&id='.$unMorceau['num_morceau'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
