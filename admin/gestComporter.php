<?php
require_once('./classes/listeClass.php');
$comporter=new Comporter($db);
$listeComporter=$comporter->selectAll();
echo '<table class="table"><thead><tr><th>Titre de l\'histoire</th><th>Nom de la video</th><th></th></tr></thead><tbody>';
foreach($listeComporter as $unComp)
{
    $histoire = new Histoire($db);
    $uneHistoire = $histoire->selectByTitre($unComp['num_histoire']);
    $video = new Video($db);
    $unvideo = $video->selectByTitre($unComp['num_video']);
echo '<tr><td>'.$uneHistoire['titre_histoire'].'</td><td>'.$unvideo['titre_video'].'</td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerComporter&idH='.$unComp['num_histoire'].'&idV='.$unComp['num_video'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
