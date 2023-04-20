<?php
require_once('./classes/listeClass.php');
$blues = new Blues($db);
$listeblues = $blues->selectAll();
echo '<table class="table"><thead><tr><th>Titre du chapitre de blues</th><th></th><th></th></tr></thead><tbody>';
foreach($listeblues as $unBlues)
{
echo '<tr><td>'.$unBlues['titre_blues'].'</td><td><a class="btn btn-info" href=indexAdmin.php?page=modifierBlues&id='.$unBlues['num_blues'].'>Modifier</a></td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerBlues&id='.$unBlues['num_blues'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
