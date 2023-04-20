<?php
require_once('./classes/listeClass.php');
$chanter=new Chanter($db);
$listeChanter=$chanter->selectAll();
echo '<table class="table"><thead><tr><th>Artiste</th><th>Nom du morceau</th><th></th></tr></thead><tbody>';
foreach($listeChanter as $unChant)
{
    $artiste = new Artiste($db);
    $unArtiste = $artiste->selectByTitre($unChant['num_artiste']);
    $morceau = new Morceau($db);
    $unmorceau = $morceau->selectByTitre($unChant['num_morceau']);
echo '<tr><td>'.$unArtiste['prenom_artiste'].' '.$unArtiste['nom_artiste'].'</td><td>'.$unmorceau['titre_morceau'].'</td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerChanter&idA='.$unChant['num_artiste'].'&idM='.$unChant['num_morceau'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
