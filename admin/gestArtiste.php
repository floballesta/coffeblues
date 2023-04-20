<?php
require_once('./classes/listeClass.php');
$artiste=new Artiste($db);
$liste=$artiste->selectAll();
echo '<table class="table"><thead><tr><th>Nom de l\'artiste</th><th></th><th></th></tr></thead><tbody>';
foreach($liste as $unArtiste)
{
echo '<tr><td>'.$unArtiste['prenom_artiste'].' '.$unArtiste['nom_artiste'].'</td><td><a class="btn btn-info" href=indexAdmin.php?page=modifierArtiste&id='.$unArtiste['num_artiste'].'>Modifier</a></td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerArtiste&id='.$unArtiste['num_artiste'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
