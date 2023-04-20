<?php
require_once('./classes/listeClass.php');
$histoire=new Histoire($db);
$liste=$histoire->selectAll();
echo '<table class="table"><thead><tr><th>Titre de l\'histoire</th><th></th><th></th></tr></thead><tbody>';
foreach($liste as $uneHistoire)
{
echo '<tr><td>'.$uneHistoire['titre_histoire'].'</td><td><a class="btn btn-info" href=indexAdmin.php?page=modifierHistoire&id='.$uneHistoire['num_histoire'].'>Modifier</a></td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerHistoire&id='.$uneHistoire['num_histoire'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
