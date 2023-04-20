<?php
require_once('./classes/listeClass.php');
$composer=new Composer($db);
$listeComposer=$composer->selectAll();
echo '<table class="table"><thead><tr><th>Artiste</th><th>Nom de la video</th><th></th></tr></thead><tbody>';
foreach($listeComposer as $unComp)
{
    $artiste = new Artiste($db);
    $unArtiste = $artiste->selectByTitre($unComp['num_artiste']);
    $video = new Video($db);
    $unvideo = $video->selectByTitre($unComp['num_video']);
echo '<tr><td>'.$unArtiste['prenom_artiste'].' '.$unArtiste['nom_artiste'].'</td><td>'.$unvideo['titre_video'].'</td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerComposer&idA='.$unComp['num_artiste'].'&idV='.$unComp['num_video'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
