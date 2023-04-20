<?php
require_once('./classes/listeClass.php');
$ville=new Ville($db);
$liste=$ville->selectAll();
echo '<table class="table"><thead><tr><th>Nom de la ville</th><th></th><th></th></tr></thead><tbody>';
foreach($liste as $uneville)
{
echo '<tr><td>'.$uneville['nom_ville'].'</td><td><a class="btn btn-info" href=indexAdmin.php?page=modifierVille&id='.$uneville['num_ville'].'>Modifier</a></td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerVille&id='.$uneville['num_ville'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
