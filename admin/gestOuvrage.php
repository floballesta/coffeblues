<?php
require_once('./classes/listeClass.php');
$ouvrage=new Ouvrage($db);
$liste=$ouvrage->selectAll();
echo '<table class="table"><thead><tr><th>Nom de l\'ouvrage</th><th></th><th></th></tr></thead><tbody>';
foreach($liste as $unOuvrage)
{
echo '<tr><td>'.$unOuvrage['titre_ouvrage'].'</td><td><a class="btn btn-info" href=indexAdmin.php?page=modifierOuvrage&id='.$unOuvrage['num_ouvrage'].'>Modifier</a></td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerOuvrage&id='.$unOuvrage['num_ouvrage'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
